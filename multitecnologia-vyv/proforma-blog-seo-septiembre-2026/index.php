<?php
session_start();
if (empty($_SESSION['auth_vyv_blog'])) {
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
<title>Blog y plan SEO &mdash; Multitecnología VYV</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  body{font-family:'Sora',system-ui,sans-serif;background:#0a0f1a;color:#e8edf5;scroll-behavior:smooth}
  .mono{font-family:'JetBrains Mono',monospace}
  .anc{scroll-margin-top:5.5rem}
  .card{background:#0e1626;border:1px solid #1b2740;border-radius:12px}
  .navlink{transition:color .15s} .navlink:hover{color:#e94560}
</style>
</head>
<body class="antialiased">

<!-- ══ nav ══ -->
<nav class="sticky top-0 z-50 bg-[#0a0f1a]/92 backdrop-blur border-b border-[#1b2740]">
  <div class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between gap-4">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-7 shrink-0">
    <div class="hidden md:flex items-center gap-7 text-sm text-[#94a3b8]">
      <a href="#hallazgos" class="navlink">Lo que encontramos</a>
      <a href="#blog"      class="navlink">El blog</a>
      <a href="#seo"       class="navlink">Plan SEO</a>
      <a href="#inversion" class="navlink">Inversión</a>
    </div>
    <div class="flex items-center gap-3 shrink-0">
      <a href="pdf/cotizacion.pdf" target="_blank"
         class="text-xs font-semibold rounded-lg bg-[#e94560] hover:bg-[#c81e43] transition px-4 py-2">PDF</a>
      <a href="logout.php" class="text-xs text-[#5c6b84] hover:text-[#94a3b8]">Salir</a>
    </div>
  </div>
</nav>

<div class="max-w-5xl mx-auto px-6">

<!-- ══ hero ══ -->
<header class="pt-16 pb-12">
  <p class="mono text-xs tracking-[.22em] uppercase text-[#e94560] mb-4">Proforma 1-2-1330 &middot; 14 de septiembre de 2026</p>
  <h1 class="text-4xl md:text-5xl font-bold leading-[1.08] mb-5">
    Blog y plan de<br>posicionamiento
  </h1>
  <p class="text-lg text-[#94a3b8] max-w-2xl leading-relaxed">
    Antes de escribir esta propuesta revisamos qué está pasando hoy con su sitio en Google.
    Lo que encontramos cambia el orden de las prioridades, así que empezamos por ahí.
  </p>
</header>

<!-- ══ 01 · hallazgos ══ -->
<section id="hallazgos" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">01</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-6">Lo que encontramos</h2>

  <div class="grid sm:grid-cols-3 gap-4 mb-8">
    <?php
    $cifras = [
      ['12.984', 'apariciones en Google que hoy caen en una página de error', 'mal'],
      ['5.083', 'apariciones las generó <em>un solo</em> artículo del blog anterior', 'bien'],
      ['50 %', 'de sus clics vienen de gente que ya busca «Multitecnología» por nombre', 'neutro'],
    ];
    foreach ($cifras as $c):
      $col = $c[2]==='mal' ? '#e94560' : ($c[2]==='bien' ? '#34d39e' : '#e8edf5'); ?>
      <div class="card p-6">
        <p class="text-3xl font-extrabold mb-2 mono" style="color:<?= $col ?>"><?= $c[0] ?></p>
        <p class="text-sm text-[#94a3b8] leading-relaxed"><?= $c[1] ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <h3 class="text-lg font-semibold mb-3">La migración dejó direcciones rotas</h3>
  <p class="text-[#94a3b8] mb-5 max-w-3xl leading-relaxed">
    Al pasar de la tienda anterior a WordPress, las direcciones viejas no se redirigieron.
    Google las sigue mostrando y quien hace clic llega a un error. Estas son las que más pesan:
  </p>

  <div class="card overflow-hidden mb-4">
    <div class="overflow-x-auto">
      <table class="w-full text-left text-sm" style="min-width:520px">
        <thead class="bg-[#111a2c] text-xs uppercase tracking-wider text-[#5c6b84]">
          <tr><th class="px-5 py-3">Página del sitio anterior</th>
              <th class="px-5 py-3 text-right">Apariciones</th>
              <th class="px-5 py-3 text-right">Posición</th></tr>
        </thead>
        <tbody class="divide-y divide-[#141d30]">
          <?php
          $rotas = [
            ['Artículo: importancia de la fuente de poder', '5.083', '13,7'],
            ['Sobre nosotros', '4.393', '1,7'],
            ['Contáctanos', '2.696', '1,6'],
            ['Artículo: ventilador para portátiles', '364', '28,8'],
            ['Términos y condiciones', '273', '1,9'],
            ['Artículo: mitos sobre baterías', '85', '17,2'],
          ];
          foreach ($rotas as $r): ?>
            <tr>
              <td class="px-5 py-3 text-[#cbd5e1]"><?= $r[0] ?></td>
              <td class="px-5 py-3 text-right mono"><?= $r[1] ?></td>
              <td class="px-5 py-3 text-right mono text-[#94a3b8]"><?= $r[2] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <p class="text-sm text-[#5c6b84] mb-8">
    «Sobre nosotros» aparece en <strong class="text-[#e8edf5]">posición 1,7</strong> y
    «Contáctanos» en <strong class="text-[#e8edf5]">1,6</strong>. Es decir: quien busca a
    Multitecnología por su nombre y hace clic en esos resultados, aterriza en un error.
  </p>

  <h3 class="text-lg font-semibold mb-3">El blog anterior sí funcionaba</h3>
  <p class="text-[#94a3b8] max-w-3xl leading-relaxed mb-4">
    Este es el dato que más nos llamó la atención. El artículo sobre la fuente de poder generó
    <strong class="text-[#34d39e]">5.083 apariciones</strong> &mdash; más que la mayoría de sus
    páginas de categoría. Y trajo gente buscando cosas como
    <span class="mono text-[#cbd5e1]">«fuente de poder»</span>,
    <span class="mono text-[#cbd5e1]">«qué es la fuente de poder»</span> o
    <span class="mono text-[#cbd5e1]">«cómo funciona la fuente de poder»</span>.
  </p>
  <p class="text-[#94a3b8] max-w-3xl leading-relaxed">
    Eso es exactamente su cliente: alguien que todavía no sabe qué comprar y está averiguando.
    Un solo artículo lo demostró. Hoy ese contenido no existe y no hay dónde publicar más.
  </p>
</section>

<!-- ══ 02 · el blog ══ -->
<section id="blog" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">02</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-3">El blog que hay que construir</h2>
  <p class="text-[#94a3b8] mb-7 max-w-3xl leading-relaxed">
    WordPress ya trae el blog por dentro: se pueden crear artículos desde el primer día. Lo que
    no existe es <strong class="text-[#e8edf5]">cómo se ven</strong>. Eso es lo que hay que
    diseñar, y son tres piezas.
  </p>

  <div class="grid md:grid-cols-3 gap-4">
    <?php
    $piezas = [
      ['La plantilla del artículo',
       'Cómo se muestra un artículo cuando alguien entra: título, imagen, texto, y los enlaces a los productos que menciona.'],
      ['El listado en la página de inicio',
       'Una sección en el home con los últimos artículos, para que quien llega a comprar también los vea.'],
      ['La página de blog',
       'El listado completo, con todos los artículos ordenados y navegables.'],
    ];
    foreach ($piezas as $i => $p): ?>
      <div class="card p-6">
        <p class="mono text-xs text-[#e94560] mb-3"><?= str_pad($i+1,2,'0',STR_PAD_LEFT) ?></p>
        <p class="font-semibold mb-2"><?= $p[0] ?></p>
        <p class="text-sm text-[#94a3b8] leading-relaxed"><?= $p[1] ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="card p-6 mt-5 border-l-2 border-l-[#34d39e]">
    <p class="mono text-xs uppercase tracking-wider text-[#34d39e] mb-2">Por qué importa el tercer punto</p>
    <p class="text-sm text-[#94a3b8] leading-relaxed">
      Cada artículo enlaza a los productos de los que habla. El de la fuente de poder llevaría a
      las fuentes que ustedes venden. Así el contenido no queda como un adorno: se convierte en
      una entrada más a la tienda, para gente que llegó buscando información y termina comprando.
    </p>
  </div>
</section>

<!-- ══ 03 · redirecciones ══ -->
<section class="py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">03</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-3">Recuperar lo que quedó roto</h2>
  <p class="text-[#94a3b8] mb-6 max-w-3xl leading-relaxed">
    Las diez direcciones del sitio anterior que hoy dan error se redirigen a donde corresponde:
    «Sobre nosotros» a su página actual, «Contáctanos» a la suya, y los artículos del blog a su
    versión nueva o a la categoría del producto que trataban.
  </p>
  <p class="text-[#94a3b8] max-w-3xl leading-relaxed">
    Es un trabajo corto y el efecto es inmediato: esas apariciones dejan de perderse. Lo
    separamos como ítem propio porque es una corrección de la migración, no parte del blog.
  </p>
</section>

<!-- ══ 04 · plan seo ══ -->
<section id="seo" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">04</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-3">El plan de posicionamiento</h2>
  <p class="text-[#94a3b8] mb-7 max-w-3xl leading-relaxed">
    Su sitio tiene una base buena: de cada cien personas que lo ven en Google, seis entran.
    Eso está por encima de lo normal. El problema es otro.
  </p>

  <div class="card p-6 mb-6">
    <p class="font-semibold mb-3">La mitad de sus visitas ya los conocía</p>
    <p class="text-sm text-[#94a3b8] leading-relaxed mb-4">
      De los clics del último año, cerca de la mitad vienen de buscar «multitecnología» o «vyv»
      por nombre. Esa gente ya era cliente o ya los conocía. El posicionamiento sirve para
      traer a la que todavía no.
    </p>
    <p class="text-sm text-[#94a3b8] leading-relaxed">
      Y ahí hay una oportunidad clara: ustedes ya aparecen bien por términos de producto
      &mdash;<span class="mono text-[#cbd5e1]">pila grande</span> en posición 1,
      <span class="mono text-[#cbd5e1]">faceplate hdmi</span> en 2,7,
      <span class="mono text-[#cbd5e1]">hub usb</span> en 5,2&mdash; pero cada uno trae apenas
      un clic al año. Están en la vitrina y nadie entra.
    </p>
  </div>

  <h3 class="text-lg font-semibold mb-4">Qué incluye cada mes</h3>
  <div class="grid sm:grid-cols-2 gap-3 mb-6">
    <?php foreach ([
      '20 artículos al mes &mdash; 120 en los seis meses',
      'Reescritura de títulos y descripciones de las páginas que ya posicionan',
      'Medición instalada y funcionando',
      'Informe mensual del trabajo, las métricas y la estrategia del mes siguiente',
    ] as $i): ?>
      <div class="card p-4 flex gap-3 items-start">
        <span class="text-[#34d39e] shrink-0">✓</span>
        <span class="text-sm text-[#cbd5e1]"><?= $i ?></span>
      </div>
    <?php endforeach; ?>
  </div>

  <h3 class="text-lg font-semibold mb-3 mt-8">El informe mensual</h3>
  <p class="text-[#94a3b8] mb-5 max-w-3xl leading-relaxed">
    Cada mes reciben un informe con tres cosas, y lo conversamos en una reunión. No es una
    planilla de números sueltos: es lo que se hizo, qué resultado dio y qué sigue.
  </p>

  <div class="grid md:grid-cols-3 gap-4">
    <div class="card p-6">
      <p class="mono text-xs text-[#e94560] mb-3">01</p>
      <p class="font-semibold mb-2">El trabajo realizado</p>
      <p class="text-sm text-[#94a3b8] leading-relaxed">
        Qué artículos se publicaron, qué títulos y descripciones se reescribieron, qué se
        corrigió en el sitio. Con el detalle de cada pieza, no un resumen.
      </p>
    </div>
    <div class="card p-6">
      <p class="mono text-xs text-[#e94560] mb-3">02</p>
      <p class="font-semibold mb-2">Las métricas</p>
      <p class="text-sm text-[#94a3b8] leading-relaxed">
        Cuánta gente los vio en Google y cuánta entró, en qué posición aparecen por las
        búsquedas que importan, y cómo se movió cada cifra frente al mes anterior.
      </p>
    </div>
    <div class="card p-6">
      <p class="mono text-xs text-[#e94560] mb-3">03</p>
      <p class="font-semibold mb-2">La estrategia del mes que viene</p>
      <p class="text-sm text-[#94a3b8] leading-relaxed">
        Qué vamos a atacar y por qué, decidido con los datos del mes que cerró. Si algo no
        funcionó, se cambia el enfoque y se dice.
      </p>
    </div>
  </div>

  <div class="card p-6 mt-5 border-l-2 border-l-[#34d39e]">
    <p class="text-sm text-[#94a3b8] leading-relaxed">
      Ese tercer punto es el que hace que el plan no sea siempre lo mismo. Los primeros meses
      suelen ir a corregir lo que ya está posicionado, porque es lo que rinde más rápido;
      después el peso se mueve hacia el contenido nuevo. <strong class="text-[#e8edf5]">Las
      decisiones se toman con los números del mes anterior</strong>, no con un calendario
      escrito de antemano.
    </p>
  </div>
</section>

<!-- ══ 05 · inversión ══ -->
<section id="inversion" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">05</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-7">Inversión</h2>

  <h3 class="text-base font-semibold mb-3 text-[#94a3b8]">Desarrollo &middot; pago único</h3>
  <div class="card overflow-hidden mb-8">
    <table class="w-full text-left">
      <tbody class="divide-y divide-[#141d30]">
        <tr>
          <td class="px-6 py-5">
            <p class="font-semibold">Implementación del blog</p>
            <p class="text-sm text-[#94a3b8] mt-1">Plantilla del artículo, listado en el inicio y página de blog.</p>
          </td>
          <td class="px-6 py-5 text-right text-lg font-bold mono whitespace-nowrap">$&nbsp;100</td>
        </tr>
        <tr>
          <td class="px-6 py-5">
            <p class="font-semibold">Recuperación de las direcciones rotas</p>
            <p class="text-sm text-[#94a3b8] mt-1">Las diez direcciones del sitio anterior, redirigidas y verificadas.</p>
          </td>
          <td class="px-6 py-5 text-right text-lg font-bold mono whitespace-nowrap">$&nbsp;40</td>
        </tr>
      </tbody>
      <tfoot class="bg-[#111a2c]">
        <tr>
          <td class="px-6 py-4 text-right font-semibold">Total desarrollo</td>
          <td class="px-6 py-4 text-right text-xl font-extrabold mono whitespace-nowrap">$&nbsp;140</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <h3 class="text-base font-semibold mb-3 text-[#94a3b8]">Plan de posicionamiento &middot; 6 meses</h3>
  <div class="grid md:grid-cols-2 gap-4">
    <div class="card p-7 border-[#e94560]/40">
      <p class="mono text-xs uppercase tracking-wider text-[#e94560] mb-3">Un solo pago</p>
      <p class="text-4xl font-extrabold mono mb-1">$&nbsp;600</p>
      <p class="text-sm text-[#94a3b8] mb-4">+ IVA, por los seis meses completos</p>
      <p class="text-sm text-[#cbd5e1]">Es la opción más conveniente.</p>
    </div>
    <div class="card p-7">
      <p class="mono text-xs uppercase tracking-wider text-[#94a3b8] mb-3">Mes a mes</p>
      <p class="text-4xl font-extrabold mono mb-1">$&nbsp;150</p>
      <p class="text-sm text-[#94a3b8] mb-4">+ IVA cada mes &mdash; $&nbsp;900 en total</p>
      <p class="text-sm text-[#cbd5e1]">$&nbsp;300 más caro, por la comodidad de pagar mes a mes.</p>
    </div>
  </div>
  <p class="text-sm text-[#5c6b84] mt-5">Todos los valores no incluyen IVA.</p>
</section>

<!-- ══ 06 · alcance ══ -->
<section class="py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">06</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-6">Qué no está incluido</h2>
  <div class="grid sm:grid-cols-2 gap-3">
    <?php foreach ([
      'Publicidad pagada en Google o redes',
      'Rediseño del sitio',
      'Fotografía de producto',
      'Manejo de redes sociales',
      'Alojamiento y dominio',
      'Carga o corrección del catálogo',
    ] as $i): ?>
      <div class="card p-4 flex gap-3 items-start">
        <span class="text-[#5c6b84] shrink-0">·</span>
        <span class="text-sm text-[#94a3b8]"><?= $i ?></span>
      </div>
    <?php endforeach; ?>
  </div>
  <p class="text-sm text-[#5c6b84] mt-5 max-w-3xl leading-relaxed">
    Lo ponemos por escrito para que nadie descubra un costo a mitad del trabajo. Si algo de esta
    lista hace falta, se cotiza aparte y con anticipación.
  </p>
</section>

<!-- ══ 07 · plazos ══ -->
<section class="py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">07</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-6">Plazos</h2>
  <div class="grid sm:grid-cols-3 gap-4">
    <?php
    $fases = [
      ['Semana 1', 'Direcciones rotas', 'Se redirigen las diez del sitio anterior. Es lo primero porque el efecto es inmediato.'],
      ['Semana 1 y 2', 'El blog', 'Plantilla del artículo, listado en el inicio y página de blog.'],
      ['Desde el mes 1', 'El plan', 'Arranca la publicación y la reescritura de títulos. Primer reporte al mes.'],
    ];
    foreach ($fases as $f): ?>
      <div class="card p-5">
        <p class="mono text-xs text-[#e94560] mb-2"><?= $f[0] ?></p>
        <p class="font-semibold mb-1.5"><?= $f[1] ?></p>
        <p class="text-sm text-[#94a3b8] leading-relaxed"><?= $f[2] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ══ cierre ══ -->
<section class="py-12 border-t border-[#141d30] pb-20">
  <div class="rounded-2xl bg-gradient-to-br from-[#e94560]/15 to-[#0e1626] border border-[#e94560]/30 p-8 md:p-10
              flex flex-col md:flex-row md:items-center justify-between gap-6">
    <div>
      <h2 class="text-2xl font-bold mb-2">¿Arrancamos?</h2>
      <p class="text-[#94a3b8]">Lo de las direcciones rotas se puede hacer esta misma semana.</p>
    </div>
    <div class="flex flex-wrap gap-3 shrink-0">
      <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20le%20escribo%20de%20Multitecnolog%C3%ADa%20VYV.%20Revisamos%20la%20propuesta%20del%20blog%20y%20el%20plan%20de%20posicionamiento."
         target="_blank"
         class="inline-flex items-center gap-2 rounded-lg bg-[#e94560] hover:bg-[#c81e43] font-semibold px-6 py-3 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
        Escribir por WhatsApp
      </a>
      <a href="pdf/cotizacion.pdf" target="_blank"
         class="inline-flex items-center rounded-lg border border-[#2b3a57] hover:border-[#e94560] font-semibold px-6 py-3 transition">
        Descargar el PDF
      </a>
    </div>
  </div>
</section>

</div>

<footer class="border-t border-[#141d30]">
  <div class="max-w-5xl mx-auto px-6 py-9 flex flex-col md:flex-row items-center justify-between gap-5">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 opacity-75">
    <div class="text-sm text-[#5c6b84] text-center md:text-right leading-relaxed">
      info@creativeweb.com.ec &middot; 099 917 4980 &middot; 062 924 887<br>
      Modesto Jaramillo 3-60 y Abdón Calderón, 2do piso &middot; Otavalo
    </div>
  </div>
  <p class="text-center text-xs text-[#3c4a63] pb-7 mono">PROFORMA 1-2-1330 &middot; VALIDEZ 30 DÍAS</p>
</footer>

</body>
</html>
