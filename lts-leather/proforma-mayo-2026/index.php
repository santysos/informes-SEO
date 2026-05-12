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
<title>Proforma · Leather in the Skin — Creative Web</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
        leather: {
          50:  '#fbf7f3',
          100: '#f4ebe0',
          200: '#e6d2bb',
          300: '#d4b393',
          400: '#bf906a',
          500: '#a87047',
          600: '#8b5a37',
          700: '#6e4529',
          800: '#523321',
          900: '#3a2418',
          950: '#1f140d',
        },
      },
    },
  },
};
</script>
<style>
  body { font-family: 'Inter', sans-serif; background: #0a0a0a; color: #f5f5f5; }
  .font-display { font-family: 'Playfair Display', serif; }
  .glass {
    background: rgba(255,255,255,0.03);
    backdrop-filter: blur(20px) saturate(160%);
    -webkit-backdrop-filter: blur(20px) saturate(160%);
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
  }
  .tab-btn { transition: all 0.3s ease; }
  .tab-btn.active {
    background: linear-gradient(135deg, #a87047, #6e4529);
    color: white;
    box-shadow: 0 8px 24px rgba(168,112,71,0.35);
  }
  .feature-card { transition: all 0.3s ease; }
  .feature-card:hover {
    transform: translateY(-4px);
    border-color: rgba(212,179,147,0.4);
    background: rgba(168,112,71,0.06);
  }
  .price-row { border-bottom: 1px solid rgba(255,255,255,0.06); }
  .price-row:last-child { border-bottom: none; }
  .total-row {
    background: linear-gradient(135deg, rgba(168,112,71,0.15), rgba(110,69,41,0.08));
    border: 1px solid rgba(212,179,147,0.3);
  }
  .badge { font-size: 0.7rem; letter-spacing: 0.1em; text-transform: uppercase; }
  @media print {
    body { background: white !important; color: #1a1a1a !important; }
    .no-print { display: none !important; }
    .glass, .glass-leather { background: white !important; border: 1px solid #e5e5e5 !important; }
    .leather-gradient, .hero-bg { background: white !important; color: #1a1a1a !important; }
    h1, h2, h3, h4, p, span, td, th, li { color: #1a1a1a !important; }
    .gold-text { color: #8b5a37 !important; -webkit-text-fill-color: #8b5a37 !important; }
  }
</style>
</head>
<body class="hero-bg min-h-screen">

<!-- LANGUAGE TOGGLE -->
<div class="sticky top-0 z-50 backdrop-blur-xl bg-black/60 border-b border-white/5 no-print">
  <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
      <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-display font-black text-leather-200">LTS</div>
      <div>
        <p class="text-xs text-leather-300 tracking-widest uppercase">Proforma · Devis</p>
        <p class="text-sm font-semibold">Leather in the Skin</p>
      </div>
    </div>
    <div class="flex items-center gap-2">
      <button onclick="setLang('es')" id="btn-es" class="tab-btn active px-5 py-2 rounded-lg text-sm font-semibold">Español</button>
      <button onclick="setLang('fr')" id="btn-fr" class="tab-btn px-5 py-2 rounded-lg text-sm font-semibold bg-white/5 hover:bg-white/10">Français</button>
      <button onclick="window.print()" class="ml-2 px-4 py-2 rounded-lg text-sm font-semibold bg-white/5 hover:bg-white/10 border border-white/10">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
        PDF
      </button>
    </div>
  </div>
</div>

<!-- ====================== SPANISH ====================== -->
<div id="content-es">

<!-- HERO -->
<section class="max-w-6xl mx-auto px-6 pt-16 pb-20">
  <div class="glass-leather rounded-3xl p-10 md:p-16 relative overflow-hidden">
    <div class="absolute -top-20 -right-20 w-96 h-96 rounded-full bg-leather-700/20 blur-3xl"></div>
    <div class="relative z-10">
      <p class="badge text-leather-300 mb-4">Propuesta económica · 11 de mayo de 2026 · Válida 30 días</p>
      <h1 class="font-display text-5xl md:text-7xl font-black mb-6 leading-tight">
        Desarrollo de<br>
        <span class="gold-text">E-Commerce LTS</span>
      </h1>
      <p class="text-xl md:text-2xl text-leather-100 mb-8 max-w-3xl font-light">
        Tienda online especializada con configurador 3D-like de chompas de cuero personalizadas, optimizada para el mercado francés.
      </p>
      <div class="grid md:grid-cols-2 gap-6 mt-12">
        <div class="glass rounded-2xl p-6">
          <p class="badge text-leather-300 mb-2">Cliente</p>
          <p class="text-2xl font-bold mb-1">Martial Vanhove</p>
          <p class="text-leather-200">Leather in the Skin — The Spirit of Riding</p>
          <p class="text-sm text-white/60 mt-2">Marca de chompas de cuero artesanales para motociclistas, fabricadas a mano en Cotacachi, Ecuador.</p>
        </div>
        <div class="glass rounded-2xl p-6">
          <p class="badge text-leather-300 mb-2">Preparado por</p>
          <p class="text-2xl font-bold mb-1">Creative Web</p>
          <p class="text-leather-200">Agencia de desarrollo y marketing digital</p>
          <p class="text-sm text-white/60 mt-2">Santiago Pozo · info@creativeweb.com.ec · creativeweb.com.ec · Otavalo, Ecuador</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- RESUMEN EJECUTIVO -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">01 · Resumen ejecutivo</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">El proyecto en pocas palabras</h2>
  <div class="grid md:grid-cols-2 gap-6">
    <div class="glass rounded-2xl p-8">
      <p class="text-leather-100 leading-relaxed mb-4">
        Construimos una tienda online <strong class="text-white">moderna y enfocada en SEO Francia</strong> donde sus clientes pueden diseñar su propia chompa de cuero de moto en tiempo real, viendo el precio actualizarse con cada elemento que añaden — al estilo configurador de Apple, pero con drag-and-drop sobre la chompa.
      </p>
      <p class="text-leather-100 leading-relaxed">
        Cada chompa es <strong class="text-white">hecha a mano en Cotacachi</strong> por artesanos locales, lo que comunicamos con fuerza en la web como propuesta de valor única frente a las grandes marcas industriales europeas.
      </p>
    </div>
    <div class="glass-leather rounded-2xl p-8">
      <p class="badge text-leather-300 mb-4">¿Qué incluye?</p>
      <ul class="space-y-3 text-leather-100">
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Tienda online completa (WooCommerce sobre WordPress)</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Configurador 2D drag-and-drop con cálculo dinámico de precio</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> 5 modelos predefinidos + 1 modelo 100% a medida</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> SEO técnico y on-page en francés</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Hosting profesional 3 años</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Dominio .fr 3 años</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Checkout WooCommerce listo para conectar la pasarela de pago externa</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Capacitación + 30 días de soporte post-lanzamiento</li>
      </ul>
    </div>
  </div>
</section>

<!-- CONFIGURADOR -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">02 · El corazón del proyecto</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-4">Configurador interactivo de chompas</h2>
  <p class="text-xl text-leather-200 mb-10 max-w-3xl">El cliente arrastra los elementos sobre la chompa y ve el precio cambiar en tiempo real, exactamente como en su boceto.</p>
  <div class="grid md:grid-cols-2 gap-6">
    <div class="feature-card glass rounded-2xl p-8">
      <div class="w-12 h-12 rounded-xl leather-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">1</div>
      <h3 class="text-xl font-bold mb-3">Logos de marca</h3>
      <p class="text-leather-200 mb-3">Biblioteca de logos arrastrables (Pirelli, Michelin, Alpinestars, etc.). El cliente los suelta en cualquier zona de la chompa.</p>
      <p class="text-leather-300 font-semibold">+$10 por cada logo añadido</p>
    </div>
    <div class="feature-card glass rounded-2xl p-8">
      <div class="w-12 h-12 rounded-xl leather-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">2</div>
      <h3 class="text-xl font-bold mb-3">Marca de moto</h3>
      <p class="text-leather-200 mb-3">Selector con logos de BMW, Honda, Ducati, Yamaha y otras. Bordado oficial de marca.</p>
      <p class="text-leather-300 font-semibold">+$10 por cada bordado</p>
    </div>
    <div class="feature-card glass rounded-2xl p-8">
      <div class="w-12 h-12 rounded-xl leather-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">3</div>
      <h3 class="text-xl font-bold mb-3">Monograma</h3>
      <p class="text-leather-200 mb-3">El cliente escribe su nombre, número, equipo o iniciales. Selección de fuente y posición en la chompa.</p>
      <p class="text-leather-300 font-semibold">+$10 por bordado de texto</p>
    </div>
    <div class="feature-card glass rounded-2xl p-8">
      <div class="w-12 h-12 rounded-xl leather-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">4</div>
      <h3 class="text-xl font-bold mb-3">Color principal</h3>
      <p class="text-leather-200 mb-3">Selector de colores por zona de la chompa (paneles, mangas, cuello). Vista previa instantánea.</p>
      <p class="text-leather-300 font-semibold">Incluido en el precio base</p>
    </div>
  </div>

  <div class="glass-leather rounded-2xl p-8 mt-6">
    <div class="flex items-start gap-4">
      <div class="w-14 h-14 rounded-xl leather-gradient flex items-center justify-center text-3xl shrink-0">⚙</div>
      <div>
        <h3 class="text-xl font-bold mb-2">Modelo #6 — Chompa 100% a medida</h3>
        <p class="text-leather-200 mb-3">Para clientes que quieren una pieza única hecha a sus medidas exactas, ofrecemos un sexto modelo:</p>
        <ul class="space-y-2 text-leather-100">
          <li class="flex gap-2"><span class="text-leather-300">▸</span> El cliente descarga la plantilla oficial de medidas (PDF) que envían sus artesanos.</li>
          <li class="flex gap-2"><span class="text-leather-300">▸</span> Llena el formulario con sus medidas siguiendo la plantilla.</li>
          <li class="flex gap-2"><span class="text-leather-300">▸</span> Cada medida personalizada suma <strong class="text-white">+$10</strong> al pedido base.</li>
          <li class="flex gap-2"><span class="text-leather-300">▸</span> Las medidas viajan junto al pedido y llegan directamente al taller en Cotacachi.</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- BOTÓN DEMO INTERACTIVO -->
  <div class="mt-8 rounded-3xl overflow-hidden relative" style="background:linear-gradient(135deg, #523321 0%, #6e4529 50%, #a87047 100%);">
    <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle at 20% 50%, rgba(255,255,255,0.5) 0%, transparent 40%);"></div>
    <div class="relative p-8 md:p-12 grid md:grid-cols-2 gap-6 items-center">
      <div>
        <p class="badge text-leather-100 mb-3 uppercase tracking-widest text-xs font-bold">¿Quiere probarlo ahora?</p>
        <h3 class="font-display text-3xl md:text-4xl font-black mb-3 text-white">Bosquejo interactivo del configurador</h3>
        <p class="text-leather-100 mb-6">Hemos preparado un demo funcional para que vea cómo será la experiencia real: arrastre logos, cambie colores, escriba un monograma y vea el precio actualizarse en tiempo real.</p>
        <a href="demo.php" class="inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-white text-leather-900 font-black text-lg hover:scale-105 transition shadow-2xl">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
          Abrir demo interactivo
        </a>
        <p class="text-xs text-leather-200 mt-3 opacity-80">Se abre en la misma ventana. Para volver, use el botón "Volver a la proforma".</p>
      </div>
      <div class="hidden md:flex items-center justify-center">
        <div class="w-48 h-48 rounded-full bg-white/10 backdrop-blur-xl border-2 border-white/20 flex items-center justify-center">
          <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ALCANCE TÉCNICO -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">03 · Alcance técnico</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-10">Todo lo que entregamos</h2>

  <div class="space-y-4">
    <details class="glass rounded-2xl p-6 group" open>
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">A</div>
          <h3 class="text-xl font-bold">Diseño UX/UI premium en francés</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Diseño 100% responsivo (móvil, tablet, escritorio).</p>
        <p>· Estética alineada al brand LTS: cuero, motociclismo, lujo artesanal.</p>
        <p>· Páginas: Inicio, Catálogo, Producto + configurador, Modelo a medida, Sobre nosotros (historia de Cotacachi y artesanos), Blog, Contacto, Política de privacidad RGPD, Términos de venta.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">B</div>
          <h3 class="text-xl font-bold">E-commerce WooCommerce</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· WordPress + WooCommerce con plantilla optimizada.</p>
        <p>· Carga de 5 modelos predefinidos con fichas, fotos y precios.</p>
        <p>· Variantes (talla, color, modelo) configuradas.</p>
        <p>· Carrito persistente que guarda la configuración personalizada del cliente.</p>
        <p>· Sistema de cupones y descuentos.</p>
        <p>· Envíos y métodos de entrega configurables (DHL, La Poste, etc.).</p>
        <p>· Facturación electrónica adaptada a normativa francesa.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">C</div>
          <h3 class="text-xl font-bold">Configurador 2D drag-and-drop</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Vista frontal + trasera de cada modelo con zonas activas (front, mangas, espalda, cuello).</p>
        <p>· Biblioteca de logos de marca (cliente puede ampliarla en cualquier momento).</p>
        <p>· Arrastrar y soltar logos sobre la chompa.</p>
        <p>· Selector de color por panel.</p>
        <p>· Campo de monograma con vista previa.</p>
        <p>· Cálculo de precio en tiempo real con desglose visible al cliente.</p>
        <p>· La configuración final se adjunta como imagen + JSON al pedido (artesanos reciben el detalle exacto).</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">D</div>
          <h3 class="text-xl font-bold">Modelo a medida (#6)</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Página dedicada para chompa a medida.</p>
        <p>· Descarga de plantilla PDF de los artesanos.</p>
        <p>· Formulario con campos de medidas (pecho, cintura, espalda, brazo, etc.).</p>
        <p>· Cada medida añadida suma +$10 al pedido (regla configurable).</p>
        <p>· Las medidas viajan con el pedido al panel admin.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">E</div>
          <h3 class="text-xl font-bold">SEO Francia</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Investigación de palabras clave en francés: <em>"blouson cuir moto sur mesure", "veste moto personnalisée", "blouson cuir artisanal"</em>, etc.</p>
        <p>· Configuración Rank Math Pro: meta titles, descripciones, schema Product/LocalBusiness/Organization.</p>
        <p>· Estructura URL amigable en francés: /produits/, /sur-mesure/, /a-propos/, /blog/.</p>
        <p>· hreflang fr-FR + sitemap XML + robots.txt.</p>
        <p>· Velocidad de carga optimizada (lazy loading, WebP, caché).</p>
        <p>· Google Search Console + Google Analytics 4 + GTM configurados.</p>
        <p>· Schema rich snippets para fichas de producto (rating, precio, stock).</p>
        <p>· Optimización para Core Web Vitals.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">F</div>
          <h3 class="text-xl font-bold">Pasarela de pago (provista por terceros)</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Entregamos el checkout de WooCommerce <strong class="text-white">listo y preparado</strong> para conectar la pasarela de pago.</p>
        <p>· La configuración e integración del medio de pago la realiza el desarrollador externo de Andorra que contrata el cliente directamente.</p>
        <p>· No incluimos el costo ni el desarrollo de la pasarela en esta proforma.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">G</div>
          <h3 class="text-xl font-bold">Hosting + dominio</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Hosting profesional 3 años (servidor SSD, copia de seguridad diaria, SSL gratuito).</p>
        <p>· Dominio .fr durante 3 años, registrado en OVH (registrar francés, ideal para SEO Francia).</p>
        <p>· Configuración email profesional (3 cuentas @suempresa.fr).</p>
        <p>· Migración a nuevo proveedor incluida si en el futuro lo desea.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">H</div>
          <h3 class="text-xl font-bold">Capacitación y entrega</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Sesión de capacitación grabada para que pueda editar productos, precios, blog y pedidos.</p>
        <p>· Manual PDF en francés con los principales procesos.</p>
        <p>· 30 días de soporte post-lanzamiento gratis para correcciones y dudas.</p>
      </div>
    </details>
  </div>
</section>

<!-- TECNOLOGÍAS -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">04 · Tecnologías</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Stack moderno y probado</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">WordPress</p><p class="text-xs text-leather-200">CMS líder mundial</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">WooCommerce</p><p class="text-xs text-leather-200">E-commerce robusto</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Configurador 2D</p><p class="text-xs text-leather-200">Drag-and-drop dinámico</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Rank Math Pro</p><p class="text-xs text-leather-200">SEO técnico</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">OVH (.fr)</p><p class="text-xs text-leather-200">Registrar francés</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">GA4 + GTM</p><p class="text-xs text-leather-200">Analítica avanzada</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">SSL + RGPD</p><p class="text-xs text-leather-200">Seguridad UE</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Stripe-ready</p><p class="text-xs text-leather-200">Compatible con pago externo</p></div>
  </div>
</section>

<!-- INVERSIÓN -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">05 · Inversión</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Detalle económico</h2>

  <div class="glass-leather rounded-2xl p-8">
    <table class="w-full">
      <thead>
        <tr class="border-b border-leather-300/20">
          <th class="text-left pb-4 text-leather-300 badge">Concepto</th>
          <th class="text-right pb-4 text-leather-300 badge">USD</th>
          <th class="text-right pb-4 text-leather-300 badge hidden md:table-cell">EUR ≈</th>
        </tr>
      </thead>
      <tbody class="text-leather-100">
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Diseño UX/UI + e-commerce WooCommerce</p>
            <p class="text-sm text-leather-200">5 modelos, fichas, carrito, checkout, capacitación</p>
          </td>
          <td class="text-right font-mono">$ 440</td>
          <td class="text-right font-mono hidden md:table-cell">€ 410</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Configurador 2D drag-and-drop dinámico</p>
            <p class="text-sm text-leather-200">Logos, monograma, color, cálculo en tiempo real</p>
          </td>
          <td class="text-right font-mono">$ 690</td>
          <td class="text-right font-mono hidden md:table-cell">€ 640</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Modelo #6 a medida</p>
            <p class="text-sm text-leather-200">Plantilla PDF descargable + formulario medidas + regla +$10/medida</p>
          </td>
          <td class="text-right font-mono">$ 100</td>
          <td class="text-right font-mono hidden md:table-cell">€ 93</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">SEO Francia técnico + on-page</p>
            <p class="text-sm text-leather-200">Keywords FR, schema, hreflang, Core Web Vitals, GA4+GTM</p>
          </td>
          <td class="text-right font-mono">$ 150</td>
          <td class="text-right font-mono hidden md:table-cell">€ 140</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Hosting profesional (3 años)</p>
            <p class="text-sm text-leather-200">SSD, SSL, backups diarios, soporte</p>
          </td>
          <td class="text-right font-mono">$ 280</td>
          <td class="text-right font-mono hidden md:table-cell">€ 260</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Dominio .fr (3 años — OVH)</p>
            <p class="text-sm text-leather-200">Registrar francés nativo, mejor para SEO local · $24/año</p>
          </td>
          <td class="text-right font-mono">$ 72</td>
          <td class="text-right font-mono hidden md:table-cell">€ 67</td>
        </tr>
        <tr class="total-row rounded-xl">
          <td class="py-6 px-4">
            <p class="font-display text-2xl font-black gold-text">INVERSIÓN TOTAL</p>
            <p class="text-sm text-leather-200">Pago único · sin sorpresas</p>
          </td>
          <td class="text-right py-6 px-4">
            <p class="font-display text-3xl font-black gold-text">$ 1.732</p>
          </td>
          <td class="text-right py-6 px-4 hidden md:table-cell">
            <p class="font-display text-3xl font-black gold-text">€ 1.605</p>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- MANTENIMIENTO -->
  <div class="mt-8 grid md:grid-cols-2 gap-6">
    <div class="glass rounded-2xl p-8">
      <p class="badge text-leather-300 mb-2">Mantenimiento anual</p>
      <p class="font-display text-4xl font-black gold-text mb-3">$ 360 <span class="text-base text-leather-200 font-sans font-normal">/ año</span></p>
      <p class="text-sm text-leather-200 mb-4">≈ €335/año · ~$30/mes</p>
      <ul class="space-y-2 text-leather-100 text-sm">
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Actualizaciones de WordPress, WooCommerce y plugins</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Backups diarios automáticos</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Monitoreo de seguridad y uptime 24/7</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Hasta 2 horas/mes de cambios menores (textos, fotos, productos)</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Reporte mensual de performance + SEO</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Soporte por WhatsApp y email</li>
      </ul>
      <p class="mt-4 text-xs text-leather-300 italic">Primer año (12 meses) incluido como garantía. Se factura desde el mes 13.</p>
    </div>

    <div class="glass rounded-2xl p-8">
      <p class="badge text-leather-300 mb-2">Renovación post-3 años</p>
      <p class="font-bold mb-3">Costos referenciales después del año 3:</p>
      <ul class="space-y-3 text-leather-100 text-sm">
        <li class="flex justify-between"><span>Hosting (anual)</span><span class="font-mono text-leather-300">$ 120/año</span></li>
        <li class="flex justify-between"><span>Dominio .fr (OVH)</span><span class="font-mono text-leather-300">$ 24/año</span></li>
        <li class="flex justify-between"><span>Mantenimiento</span><span class="font-mono text-leather-300">$ 360/año</span></li>
      </ul>
      <p class="mt-6 text-xs text-leather-300 italic">Precios sujetos a inflación normal del mercado. Garantizamos un máximo de +5% anual durante los primeros 5 años.</p>
    </div>
  </div>
</section>

<!-- CRONOGRAMA -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">06 · Cronograma</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">8 semanas para lanzar</h2>
  <div class="space-y-4">
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">1-2</div>
      <div>
        <p class="font-bold">Semanas 1–2 · Discovery + diseño</p>
        <p class="text-leather-200 text-sm">Kickoff, recopilación de logos/marcas, plantilla de medidas, fotos de los 5 modelos, mockups de diseño aprobados.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">3-4</div>
      <div>
        <p class="font-bold">Semanas 3–4 · Desarrollo base</p>
        <p class="text-leather-200 text-sm">Instalación WordPress + WooCommerce, importación de productos, plantilla maquetada, páginas core.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">5-6</div>
      <div>
        <p class="font-bold">Semanas 5–6 · Configurador</p>
        <p class="text-leather-200 text-sm">Desarrollo del configurador drag-and-drop, motor de precio dinámico, sistema modelo a medida.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">7</div>
      <div>
        <p class="font-bold">Semana 7 · SEO + integración pago</p>
        <p class="text-leather-200 text-sm">SEO técnico, GA4/GTM, integración del módulo de pago provisto desde Andorra, pruebas.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">8</div>
      <div>
        <p class="font-bold">Semana 8 · QA + lanzamiento</p>
        <p class="text-leather-200 text-sm">Pruebas finales, capacitación al cliente, lanzamiento oficial, monitoreo intensivo primeros 7 días.</p>
      </div>
    </div>
  </div>
</section>

<!-- TÉRMINOS -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">07 · Forma de pago y términos</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Condiciones</h2>
  <div class="grid md:grid-cols-3 gap-4">
    <div class="glass rounded-xl p-6">
      <p class="text-leather-300 text-sm mb-2">50% al iniciar</p>
      <p class="font-display text-3xl font-black gold-text">$ 866</p>
      <p class="text-sm text-leather-200 mt-2">Al firmar la proforma. Arranca el discovery y diseño.</p>
    </div>
    <div class="glass rounded-xl p-6">
      <p class="text-leather-300 text-sm mb-2">30% a mitad del proyecto</p>
      <p class="font-display text-3xl font-black gold-text">$ 520</p>
      <p class="text-sm text-leather-200 mt-2">Al aprobar el configurador funcional (semana 6).</p>
    </div>
    <div class="glass rounded-xl p-6">
      <p class="text-leather-300 text-sm mb-2">20% al lanzar</p>
      <p class="font-display text-3xl font-black gold-text">$ 346</p>
      <p class="text-sm text-leather-200 mt-2">Una vez la web está online y aprobada.</p>
    </div>
  </div>
  <div class="glass rounded-2xl p-8 mt-6">
    <ul class="space-y-3 text-leather-100 text-sm">
      <li><strong class="text-white">Métodos de pago:</strong> transferencia bancaria internacional, Wise, Western Union, depósito en cuenta ecuatoriana.</li>
      <li><strong class="text-white">Moneda:</strong> precios en USD. Equivalencia EUR referencial al tipo de cambio del día de pago.</li>
      <li><strong class="text-white">Propiedad intelectual:</strong> al cierre del pago final, todo el código y los activos son propiedad de Leather in the Skin.</li>
      <li><strong class="text-white">No incluye:</strong> configuración de la pasarela de pago (la entrega el desarrollador externo contratado en Andorra), producción de fotografía profesional de las chompas, redacción de blog inicial, traducción al inglés/español, campañas de Google Ads o Meta Ads.</li>
      <li><strong class="text-white">Validez de la proforma:</strong> 30 días desde la fecha de emisión.</li>
    </ul>
  </div>
</section>

<!-- CONTACTO -->
<section class="max-w-6xl mx-auto px-6 pb-32">
  <div class="glass-leather rounded-3xl p-10 md:p-16 text-center">
    <p class="badge text-leather-300 mb-4">¿Listos para arrancar?</p>
    <h2 class="font-display text-4xl md:text-6xl font-black mb-6">Hagamos la mejor tienda de chompas de cuero de Francia</h2>
    <p class="text-xl text-leather-100 mb-8 max-w-2xl mx-auto">Respondemos en menos de 4 horas durante días laborables. Estamos en la misma ciudad — Otavalo — así que podemos vernos en persona cuando quiera.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20quiero%20avanzar%20con%20la%20proforma%20de%20Leather%20in%20the%20Skin" class="px-8 py-4 rounded-xl bg-leather-500 hover:bg-leather-400 text-white font-bold transition">WhatsApp +593 99 917 4980</a>
      <a href="mailto:info@creativeweb.com.ec?subject=Proforma%20LTS%20-%20Leather%20in%20the%20Skin" class="px-8 py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold transition">info@creativeweb.com.ec</a>
    </div>
  </div>
</section>

</div>

<!-- ====================== FRENCH ====================== -->
<div id="content-fr" class="hidden">

<!-- HERO -->
<section class="max-w-6xl mx-auto px-6 pt-16 pb-20">
  <div class="glass-leather rounded-3xl p-10 md:p-16 relative overflow-hidden">
    <div class="absolute -top-20 -right-20 w-96 h-96 rounded-full bg-leather-700/20 blur-3xl"></div>
    <div class="relative z-10">
      <p class="badge text-leather-300 mb-4">Proposition commerciale · 11 mai 2026 · Valable 30 jours</p>
      <h1 class="font-display text-5xl md:text-7xl font-black mb-6 leading-tight">
        Développement<br>
        <span class="gold-text">E-Commerce LTS</span>
      </h1>
      <p class="text-xl md:text-2xl text-leather-100 mb-8 max-w-3xl font-light">
        Boutique en ligne spécialisée avec configurateur drag-and-drop de blousons en cuir sur mesure, optimisée pour le marché français.
      </p>
      <div class="grid md:grid-cols-2 gap-6 mt-12">
        <div class="glass rounded-2xl p-6">
          <p class="badge text-leather-300 mb-2">Client</p>
          <p class="text-2xl font-bold mb-1">Martial Vanhove</p>
          <p class="text-leather-200">Leather in the Skin — The Spirit of Riding</p>
          <p class="text-sm text-white/60 mt-2">Marque de blousons en cuir artisanaux pour motards, fabriqués à la main à Cotacachi, Équateur.</p>
        </div>
        <div class="glass rounded-2xl p-6">
          <p class="badge text-leather-300 mb-2">Préparé par</p>
          <p class="text-2xl font-bold mb-1">Creative Web</p>
          <p class="text-leather-200">Agence de développement et marketing digital</p>
          <p class="text-sm text-white/60 mt-2">Santiago Pozo · info@creativeweb.com.ec · creativeweb.com.ec · Otavalo, Équateur</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- RÉSUMÉ EXÉCUTIF -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">01 · Résumé exécutif</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Le projet en quelques mots</h2>
  <div class="grid md:grid-cols-2 gap-6">
    <div class="glass rounded-2xl p-8">
      <p class="text-leather-100 leading-relaxed mb-4">
        Nous construisons une boutique en ligne <strong class="text-white">moderne et optimisée pour le SEO France</strong> où vos clients peuvent concevoir leur propre blouson en cuir moto en temps réel, et voir le prix se mettre à jour à chaque ajout — style configurateur Apple, mais en drag-and-drop sur le blouson.
      </p>
      <p class="text-leather-100 leading-relaxed">
        Chaque blouson est <strong class="text-white">fabriqué à la main à Cotacachi</strong> par des artisans locaux, un atout que nous mettons fortement en avant comme proposition de valeur unique face aux grandes marques industrielles européennes.
      </p>
    </div>
    <div class="glass-leather rounded-2xl p-8">
      <p class="badge text-leather-300 mb-4">Ce qui est inclus</p>
      <ul class="space-y-3 text-leather-100">
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Boutique en ligne complète (WooCommerce sur WordPress)</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Configurateur 2D drag-and-drop avec calcul de prix dynamique</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> 5 modèles prédéfinis + 1 modèle 100% sur mesure</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> SEO technique et on-page en français</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Hébergement professionnel 3 ans</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Nom de domaine .fr 3 ans</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Checkout WooCommerce prêt à connecter la passerelle de paiement externe</li>
        <li class="flex gap-3"><span class="text-leather-300 font-bold">✓</span> Formation + 30 jours de support post-lancement</li>
      </ul>
    </div>
  </div>
</section>

<!-- CONFIGURATEUR -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">02 · Le cœur du projet</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-4">Configurateur interactif de blousons</h2>
  <p class="text-xl text-leather-200 mb-10 max-w-3xl">Le client glisse les éléments sur le blouson et voit le prix changer en temps réel, exactement comme sur votre croquis.</p>
  <div class="grid md:grid-cols-2 gap-6">
    <div class="feature-card glass rounded-2xl p-8">
      <div class="w-12 h-12 rounded-xl leather-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">1</div>
      <h3 class="text-xl font-bold mb-3">Logos de marques</h3>
      <p class="text-leather-200 mb-3">Bibliothèque de logos glissables (Pirelli, Michelin, Alpinestars, etc.). Le client les dépose dans n'importe quelle zone du blouson.</p>
      <p class="text-leather-300 font-semibold">+10 $ par logo ajouté</p>
    </div>
    <div class="feature-card glass rounded-2xl p-8">
      <div class="w-12 h-12 rounded-xl leather-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">2</div>
      <h3 class="text-xl font-bold mb-3">Marque de moto</h3>
      <p class="text-leather-200 mb-3">Sélecteur avec logos BMW, Honda, Ducati, Yamaha et autres. Broderie officielle de marque.</p>
      <p class="text-leather-300 font-semibold">+10 $ par broderie</p>
    </div>
    <div class="feature-card glass rounded-2xl p-8">
      <div class="w-12 h-12 rounded-xl leather-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">3</div>
      <h3 class="text-xl font-bold mb-3">Monogramme</h3>
      <p class="text-leather-200 mb-3">Le client écrit son nom, numéro, équipe ou initiales. Choix de la police et de la position sur le blouson.</p>
      <p class="text-leather-300 font-semibold">+10 $ par broderie texte</p>
    </div>
    <div class="feature-card glass rounded-2xl p-8">
      <div class="w-12 h-12 rounded-xl leather-gradient flex items-center justify-center mb-4 font-display text-2xl font-black gold-text">4</div>
      <h3 class="text-xl font-bold mb-3">Couleur principale</h3>
      <p class="text-leather-200 mb-3">Sélecteur de couleurs par zone du blouson (panneaux, manches, col). Aperçu instantané.</p>
      <p class="text-leather-300 font-semibold">Inclus dans le prix de base</p>
    </div>
  </div>

  <div class="glass-leather rounded-2xl p-8 mt-6">
    <div class="flex items-start gap-4">
      <div class="w-14 h-14 rounded-xl leather-gradient flex items-center justify-center text-3xl shrink-0">⚙</div>
      <div>
        <h3 class="text-xl font-bold mb-2">Modèle #6 — Blouson 100% sur mesure</h3>
        <p class="text-leather-200 mb-3">Pour les clients qui veulent une pièce unique à leurs mesures exactes, nous offrons un sixième modèle :</p>
        <ul class="space-y-2 text-leather-100">
          <li class="flex gap-2"><span class="text-leather-300">▸</span> Le client télécharge le gabarit officiel de mesures (PDF) envoyé par vos artisans.</li>
          <li class="flex gap-2"><span class="text-leather-300">▸</span> Il remplit le formulaire avec ses mesures en suivant le gabarit.</li>
          <li class="flex gap-2"><span class="text-leather-300">▸</span> Chaque mesure personnalisée ajoute <strong class="text-white">+10 $</strong> à la commande de base.</li>
          <li class="flex gap-2"><span class="text-leather-300">▸</span> Les mesures partent avec la commande directement à l'atelier de Cotacachi.</li>
        </ul>
      </div>
    </div>
  </div>

  <!-- BOUTON DEMO INTERACTIVE -->
  <div class="mt-8 rounded-3xl overflow-hidden relative" style="background:linear-gradient(135deg, #523321 0%, #6e4529 50%, #a87047 100%);">
    <div class="absolute inset-0 opacity-10" style="background-image:radial-gradient(circle at 20% 50%, rgba(255,255,255,0.5) 0%, transparent 40%);"></div>
    <div class="relative p-8 md:p-12 grid md:grid-cols-2 gap-6 items-center">
      <div>
        <p class="badge text-leather-100 mb-3 uppercase tracking-widest text-xs font-bold">Envie de l'essayer maintenant ?</p>
        <h3 class="font-display text-3xl md:text-4xl font-black mb-3 text-white">Maquette interactive du configurateur</h3>
        <p class="text-leather-100 mb-6">Nous avons préparé une démo fonctionnelle pour que vous puissiez voir l'expérience réelle : glissez des logos, changez les couleurs, écrivez un monogramme et voyez le prix se mettre à jour en temps réel.</p>
        <a href="demo.php" class="inline-flex items-center gap-3 px-8 py-4 rounded-xl bg-white text-leather-900 font-black text-lg hover:scale-105 transition shadow-2xl">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
          Ouvrir la démo interactive
        </a>
        <p class="text-xs text-leather-200 mt-3 opacity-80">S'ouvre dans la même fenêtre. Pour revenir, utilisez le bouton « Retour à la proposition ».</p>
      </div>
      <div class="hidden md:flex items-center justify-center">
        <div class="w-48 h-48 rounded-full bg-white/10 backdrop-blur-xl border-2 border-white/20 flex items-center justify-center">
          <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PORTÉE -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">03 · Portée technique</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-10">Tout ce que nous livrons</h2>

  <div class="space-y-4">
    <details class="glass rounded-2xl p-6 group" open>
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">A</div>
          <h3 class="text-xl font-bold">Design UX/UI premium en français</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Design 100% responsive (mobile, tablette, bureau).</p>
        <p>· Esthétique alignée à la marque LTS : cuir, motocyclisme, luxe artisanal.</p>
        <p>· Pages : Accueil, Catalogue, Produit + configurateur, Sur mesure, À propos (histoire de Cotacachi et des artisans), Blog, Contact, Politique de confidentialité RGPD, CGV.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">B</div>
          <h3 class="text-xl font-bold">E-commerce WooCommerce</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· WordPress + WooCommerce avec template optimisé.</p>
        <p>· Chargement de 5 modèles prédéfinis avec fiches, photos et prix.</p>
        <p>· Variantes (taille, couleur, modèle) configurées.</p>
        <p>· Panier persistant qui sauvegarde la configuration personnalisée du client.</p>
        <p>· Système de coupons et de remises.</p>
        <p>· Expéditions et méthodes de livraison configurables (DHL, La Poste, etc.).</p>
        <p>· Facturation électronique adaptée à la réglementation française.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">C</div>
          <h3 class="text-xl font-bold">Configurateur 2D drag-and-drop</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Vue avant + arrière de chaque modèle avec zones actives (devant, manches, dos, col).</p>
        <p>· Bibliothèque de logos de marques (extensible par le client à tout moment).</p>
        <p>· Glisser-déposer les logos sur le blouson.</p>
        <p>· Sélecteur de couleur par panneau.</p>
        <p>· Champ monogramme avec aperçu.</p>
        <p>· Calcul du prix en temps réel avec détail visible pour le client.</p>
        <p>· La configuration finale est jointe en image + JSON à la commande (les artisans reçoivent le détail exact).</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">D</div>
          <h3 class="text-xl font-bold">Modèle sur mesure (#6)</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Page dédiée au blouson sur mesure.</p>
        <p>· Téléchargement du gabarit PDF des artisans.</p>
        <p>· Formulaire avec champs de mesures (poitrine, taille, dos, bras, etc.).</p>
        <p>· Chaque mesure ajoutée ajoute +10 $ à la commande (règle configurable).</p>
        <p>· Les mesures partent avec la commande vers le panneau admin.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">E</div>
          <h3 class="text-xl font-bold">SEO France</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Recherche de mots-clés en français : <em>"blouson cuir moto sur mesure", "veste moto personnalisée", "blouson cuir artisanal"</em>, etc.</p>
        <p>· Configuration Rank Math Pro : meta titles, descriptions, schema Product/LocalBusiness/Organization.</p>
        <p>· Structure d'URL conviviale en français : /produits/, /sur-mesure/, /a-propos/, /blog/.</p>
        <p>· hreflang fr-FR + sitemap XML + robots.txt.</p>
        <p>· Vitesse de chargement optimisée (lazy loading, WebP, cache).</p>
        <p>· Google Search Console + Google Analytics 4 + GTM configurés.</p>
        <p>· Schema rich snippets pour fiches produit (notation, prix, stock).</p>
        <p>· Optimisation pour Core Web Vitals.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">F</div>
          <h3 class="text-xl font-bold">Passerelle de paiement (fournie par un tiers)</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Nous livrons le checkout WooCommerce <strong class="text-white">prêt à connecter</strong> la passerelle de paiement.</p>
        <p>· La configuration et l'intégration du moyen de paiement sont assurées par le développeur externe d'Andorre engagé directement par le client.</p>
        <p>· Le coût et le développement de la passerelle ne sont pas inclus dans cette proposition.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">G</div>
          <h3 class="text-xl font-bold">Hébergement + nom de domaine</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Hébergement professionnel 3 ans (serveur SSD, sauvegarde quotidienne, SSL gratuit).</p>
        <p>· Domaine .fr pendant 3 ans, enregistré chez OVH (registrar français, idéal pour le SEO France).</p>
        <p>· Configuration emails professionnels (3 comptes @votreentreprise.fr).</p>
        <p>· Migration vers un nouveau fournisseur incluse si souhaitée plus tard.</p>
      </div>
    </details>

    <details class="glass rounded-2xl p-6 group">
      <summary class="flex items-center justify-between cursor-pointer list-none">
        <div class="flex items-center gap-4">
          <div class="w-10 h-10 rounded-lg leather-gradient flex items-center justify-center font-bold">H</div>
          <h3 class="text-xl font-bold">Formation et livraison</h3>
        </div>
        <span class="text-leather-300 group-open:rotate-180 transition">▾</span>
      </summary>
      <div class="mt-4 pl-14 text-leather-200 space-y-2">
        <p>· Session de formation enregistrée pour éditer produits, prix, blog et commandes.</p>
        <p>· Manuel PDF en français avec les principaux processus.</p>
        <p>· 30 jours de support post-lancement gratuit pour corrections et questions.</p>
      </div>
    </details>
  </div>
</section>

<!-- TECHNOLOGIES -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">04 · Technologies</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Stack moderne et éprouvée</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">WordPress</p><p class="text-xs text-leather-200">CMS leader mondial</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">WooCommerce</p><p class="text-xs text-leather-200">E-commerce robuste</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Configurateur 2D</p><p class="text-xs text-leather-200">Drag-and-drop dynamique</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Rank Math Pro</p><p class="text-xs text-leather-200">SEO technique</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">OVH (.fr)</p><p class="text-xs text-leather-200">Registrar français</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">GA4 + GTM</p><p class="text-xs text-leather-200">Analytique avancée</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">SSL + RGPD</p><p class="text-xs text-leather-200">Sécurité UE</p></div>
    <div class="glass rounded-xl p-5 text-center"><p class="font-bold mb-1">Stripe-ready</p><p class="text-xs text-leather-200">Compatible paiement externe</p></div>
  </div>
</section>

<!-- INVESTISSEMENT -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">05 · Investissement</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Détail financier</h2>

  <div class="glass-leather rounded-2xl p-8">
    <table class="w-full">
      <thead>
        <tr class="border-b border-leather-300/20">
          <th class="text-left pb-4 text-leather-300 badge">Poste</th>
          <th class="text-right pb-4 text-leather-300 badge">USD</th>
          <th class="text-right pb-4 text-leather-300 badge hidden md:table-cell">EUR ≈</th>
        </tr>
      </thead>
      <tbody class="text-leather-100">
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Design UX/UI + e-commerce WooCommerce</p>
            <p class="text-sm text-leather-200">5 modèles, fiches, panier, checkout, formation</p>
          </td>
          <td class="text-right font-mono">440 $</td>
          <td class="text-right font-mono hidden md:table-cell">410 €</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Configurateur 2D drag-and-drop dynamique</p>
            <p class="text-sm text-leather-200">Logos, monogramme, couleur, calcul en temps réel</p>
          </td>
          <td class="text-right font-mono">690 $</td>
          <td class="text-right font-mono hidden md:table-cell">640 €</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Modèle #6 sur mesure</p>
            <p class="text-sm text-leather-200">Gabarit PDF téléchargeable + formulaire mesures + règle +10 $/mesure</p>
          </td>
          <td class="text-right font-mono">100 $</td>
          <td class="text-right font-mono hidden md:table-cell">93 €</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">SEO France technique + on-page</p>
            <p class="text-sm text-leather-200">Mots-clés FR, schema, hreflang, Core Web Vitals, GA4+GTM</p>
          </td>
          <td class="text-right font-mono">150 $</td>
          <td class="text-right font-mono hidden md:table-cell">140 €</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Hébergement professionnel (3 ans)</p>
            <p class="text-sm text-leather-200">SSD, SSL, sauvegardes quotidiennes, support</p>
          </td>
          <td class="text-right font-mono">280 $</td>
          <td class="text-right font-mono hidden md:table-cell">260 €</td>
        </tr>
        <tr class="price-row">
          <td class="py-4">
            <p class="font-semibold text-white">Domaine .fr (3 ans — OVH)</p>
            <p class="text-sm text-leather-200">Registrar français natif, meilleur pour le SEO local · 24 $/an</p>
          </td>
          <td class="text-right font-mono">72 $</td>
          <td class="text-right font-mono hidden md:table-cell">67 €</td>
        </tr>
        <tr class="total-row rounded-xl">
          <td class="py-6 px-4">
            <p class="font-display text-2xl font-black gold-text">INVESTISSEMENT TOTAL</p>
            <p class="text-sm text-leather-200">Paiement unique · sans surprises</p>
          </td>
          <td class="text-right py-6 px-4">
            <p class="font-display text-3xl font-black gold-text">1 732 $</p>
          </td>
          <td class="text-right py-6 px-4 hidden md:table-cell">
            <p class="font-display text-3xl font-black gold-text">1 605 €</p>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- MAINTENANCE -->
  <div class="mt-8 grid md:grid-cols-2 gap-6">
    <div class="glass rounded-2xl p-8">
      <p class="badge text-leather-300 mb-2">Maintenance annuelle</p>
      <p class="font-display text-4xl font-black gold-text mb-3">360 $ <span class="text-base text-leather-200 font-sans font-normal">/ an</span></p>
      <p class="text-sm text-leather-200 mb-4">≈ 335 €/an · ~30 $/mois</p>
      <ul class="space-y-2 text-leather-100 text-sm">
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Mises à jour de WordPress, WooCommerce et plugins</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Sauvegardes quotidiennes automatiques</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Surveillance sécurité et uptime 24/7</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Jusqu'à 2 heures/mois de modifications mineures</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Rapport mensuel de performance + SEO</li>
        <li class="flex gap-2"><span class="text-leather-300">✓</span> Support WhatsApp et email</li>
      </ul>
      <p class="mt-4 text-xs text-leather-300 italic">Première année (12 mois) incluse comme garantie. Facturé à partir du mois 13.</p>
    </div>

    <div class="glass rounded-2xl p-8">
      <p class="badge text-leather-300 mb-2">Renouvellement après 3 ans</p>
      <p class="font-bold mb-3">Coûts indicatifs après l'an 3 :</p>
      <ul class="space-y-3 text-leather-100 text-sm">
        <li class="flex justify-between"><span>Hébergement (annuel)</span><span class="font-mono text-leather-300">120 $/an</span></li>
        <li class="flex justify-between"><span>Domaine .fr (OVH)</span><span class="font-mono text-leather-300">24 $/an</span></li>
        <li class="flex justify-between"><span>Maintenance</span><span class="font-mono text-leather-300">360 $/an</span></li>
      </ul>
      <p class="mt-6 text-xs text-leather-300 italic">Prix soumis à l'inflation normale du marché. Nous garantissons un maximum de +5 % par an pendant les 5 premières années.</p>
    </div>
  </div>
</section>

<!-- CALENDRIER -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">06 · Calendrier</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">8 semaines pour lancer</h2>
  <div class="space-y-4">
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">1-2</div>
      <div>
        <p class="font-bold">Semaines 1–2 · Discovery + design</p>
        <p class="text-leather-200 text-sm">Kickoff, collecte de logos/marques, gabarit de mesures, photos des 5 modèles, maquettes de design approuvées.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">3-4</div>
      <div>
        <p class="font-bold">Semaines 3–4 · Développement de base</p>
        <p class="text-leather-200 text-sm">Installation WordPress + WooCommerce, import des produits, template intégré, pages principales.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">5-6</div>
      <div>
        <p class="font-bold">Semaines 5–6 · Configurateur</p>
        <p class="text-leather-200 text-sm">Développement du configurateur drag-and-drop, moteur de prix dynamique, système modèle sur mesure.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">7</div>
      <div>
        <p class="font-bold">Semaine 7 · SEO + intégration paiement</p>
        <p class="text-leather-200 text-sm">SEO technique, GA4/GTM, intégration du module de paiement fourni depuis Andorre, tests.</p>
      </div>
    </div>
    <div class="glass rounded-xl p-6 flex items-center gap-6">
      <div class="w-16 h-16 rounded-xl leather-gradient flex items-center justify-center font-display font-black text-2xl gold-text shrink-0">8</div>
      <div>
        <p class="font-bold">Semaine 8 · QA + lancement</p>
        <p class="text-leather-200 text-sm">Tests finaux, formation du client, lancement officiel, monitoring intensif les 7 premiers jours.</p>
      </div>
    </div>
  </div>
</section>

<!-- CONDITIONS -->
<section class="max-w-6xl mx-auto px-6 pb-20">
  <p class="badge text-leather-300 mb-3">07 · Modalités de paiement</p>
  <h2 class="font-display text-4xl md:text-5xl font-black mb-8">Conditions</h2>
  <div class="grid md:grid-cols-3 gap-4">
    <div class="glass rounded-xl p-6">
      <p class="text-leather-300 text-sm mb-2">50 % au démarrage</p>
      <p class="font-display text-3xl font-black gold-text">866 $</p>
      <p class="text-sm text-leather-200 mt-2">À la signature de la proposition. Démarrage du discovery et du design.</p>
    </div>
    <div class="glass rounded-xl p-6">
      <p class="text-leather-300 text-sm mb-2">30 % à mi-projet</p>
      <p class="font-display text-3xl font-black gold-text">520 $</p>
      <p class="text-sm text-leather-200 mt-2">Après validation du configurateur fonctionnel (semaine 6).</p>
    </div>
    <div class="glass rounded-xl p-6">
      <p class="text-leather-300 text-sm mb-2">20 % au lancement</p>
      <p class="font-display text-3xl font-black gold-text">346 $</p>
      <p class="text-sm text-leather-200 mt-2">Une fois le site en ligne et approuvé.</p>
    </div>
  </div>
  <div class="glass rounded-2xl p-8 mt-6">
    <ul class="space-y-3 text-leather-100 text-sm">
      <li><strong class="text-white">Modes de paiement :</strong> virement bancaire international, Wise, Western Union, dépôt en compte équatorien.</li>
      <li><strong class="text-white">Devise :</strong> prix en USD. Équivalence EUR indicative au taux du jour de paiement.</li>
      <li><strong class="text-white">Propriété intellectuelle :</strong> au paiement final, tout le code et les actifs deviennent propriété de Leather in the Skin.</li>
      <li><strong class="text-white">Non inclus :</strong> configuration de la passerelle de paiement (livrée par le développeur externe d'Andorre engagé par le client), photographie professionnelle des blousons, rédaction du blog initial, traduction vers anglais/espagnol, campagnes Google Ads ou Meta Ads.</li>
      <li><strong class="text-white">Validité :</strong> 30 jours à compter de l'émission.</li>
    </ul>
  </div>
</section>

<!-- CONTACT -->
<section class="max-w-6xl mx-auto px-6 pb-32">
  <div class="glass-leather rounded-3xl p-10 md:p-16 text-center">
    <p class="badge text-leather-300 mb-4">Prêts à démarrer ?</p>
    <h2 class="font-display text-4xl md:text-6xl font-black mb-6">Construisons la meilleure boutique de blousons en cuir de France</h2>
    <p class="text-xl text-leather-100 mb-8 max-w-2xl mx-auto">Nous répondons en moins de 4 heures les jours ouvrés. Nous sommes dans la même ville — Otavalo — donc nous pouvons nous voir en personne quand vous voulez.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="https://wa.me/593999174980?text=Bonjour%20Santiago%2C%20je%20souhaite%20avancer%20avec%20la%20proposition%20Leather%20in%20the%20Skin" class="px-8 py-4 rounded-xl bg-leather-500 hover:bg-leather-400 text-white font-bold transition">WhatsApp +593 99 917 4980</a>
      <a href="mailto:info@creativeweb.com.ec?subject=Proposition%20LTS%20-%20Leather%20in%20the%20Skin" class="px-8 py-4 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold transition">info@creativeweb.com.ec</a>
    </div>
  </div>
</section>

</div>

<!-- FOOTER -->
<footer class="border-t border-white/5 py-10 text-center text-leather-300 text-sm">
  <p>© 2026 Creative Web · Otavalo, Ecuador · creativeweb.com.ec</p>
</footer>

<script>
function setLang(lang) {
  document.getElementById('content-es').classList.toggle('hidden', lang !== 'es');
  document.getElementById('content-fr').classList.toggle('hidden', lang !== 'fr');
  document.getElementById('btn-es').classList.toggle('active', lang === 'es');
  document.getElementById('btn-es').classList.toggle('bg-white/5', lang !== 'es');
  document.getElementById('btn-fr').classList.toggle('active', lang === 'fr');
  document.getElementById('btn-fr').classList.toggle('bg-white/5', lang !== 'fr');
  document.documentElement.lang = lang;
  window.scrollTo({top: 0, behavior: 'smooth'});
}
</script>
</body>
</html>
