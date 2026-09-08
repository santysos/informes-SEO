<?php
session_start();
if (empty($_SESSION['auth_compuzero'])) {
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
<title>Tienda en línea &mdash; CompuZero</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
  body { font-family:'Outfit',system-ui,sans-serif; background:#080d14; color:#e2e8f0; }
  .mono { font-family:'JetBrains Mono',monospace; }
  .anc { scroll-margin-top: 6rem; }
  html { scroll-behavior: smooth; }
  .card { background:rgba(255,255,255,.035); border:1px solid rgba(255,255,255,.075); }
  .num { font-family:'JetBrains Mono',monospace; color:#22d3ee; }
  .navlink { transition:color .15s } .navlink:hover { color:#22d3ee }
</style>
</head>
<body class="antialiased">

<!-- ══════ nav ══════ -->
<nav class="sticky top-0 z-50 border-b border-slate-800/60 backdrop-blur-xl bg-[#080d14]/85">
  <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between gap-4">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-7 shrink-0">
    <div class="hidden lg:flex items-center gap-7 text-sm text-slate-400">
      <a href="#punto"     class="navlink">Punto de partida</a>
      <a href="#tienda"    class="navlink">La tienda</a>
      <a href="#incluye"   class="navlink">Qué incluye</a>
      <a href="#inversion" class="navlink">Inversión</a>
      <a href="#plazos"    class="navlink">Plazos</a>
      <a href="#nosotros"  class="navlink">Nosotros</a>
    </div>
    <div class="flex items-center gap-3 shrink-0">
      <a href="pdf/cotizacion.pdf" target="_blank"
         class="text-xs font-semibold rounded-lg bg-cyan-500 hover:bg-cyan-400 text-slate-900 transition px-4 py-2">PDF</a>
      <a href="logout.php" class="text-xs text-slate-600 hover:text-slate-400">Salir</a>
    </div>
  </div>
</nav>

<div class="max-w-6xl mx-auto px-6">

<!-- ══════ hero ══════ -->
<header class="pt-20 pb-16">
  <p class="mono text-xs tracking-[.25em] text-cyan-400 mb-5">PROFORMA 1-2-1328 &middot; 8 DE SEPTIEMBRE DE 2026</p>
  <h1 class="text-4xl md:text-6xl font-extrabold leading-[1.05] tracking-tight mb-6">
    Tienda en línea<br>para CompuZero
  </h1>
  <p class="text-lg md:text-xl text-slate-400 max-w-2xl leading-relaxed">
    Fabián: un catálogo de laptops y computadoras que la gente pueda ver desde el celular,
    con carrito y con WhatsApp. Esto es lo que cuesta y lo que incluye.
  </p>
</header>

<!-- ══════ 01 · punto de partida ══════ -->
<section id="punto" class="anc py-16 border-t border-slate-800/50">
  <div class="md:grid md:grid-cols-12 md:gap-10">
    <div class="md:col-span-4 mb-8 md:mb-0">
      <div class="md:sticky md:top-24">
        <p class="mono text-xs text-cyan-400 mb-2">01</p>
        <h2 class="text-3xl font-bold leading-tight">El punto de partida</h2>
      </div>
    </div>
    <div class="md:col-span-8 space-y-5 text-slate-300 leading-relaxed">
      <p>
        CompuZero vende laptops y computadoras de escritorio, y hoy toda esa venta pasa por
        WhatsApp: el cliente pregunta, alguien busca el precio, se lo manda por mensaje. Funciona,
        pero tiene un techo — se atiende de a uno y solo en horario de trabajo.
      </p>
      <p>
        Un catálogo en línea no reemplaza el WhatsApp. Lo alimenta: el cliente llega ya sabiendo
        qué modelo quiere y cuánto cuesta, y el mensaje que les escribe es «quiero esta»,
        no «¿qué tienen?».
      </p>

      <div class="card rounded-xl p-6 border-l-2 border-l-amber-400 mt-8">
        <p class="text-sm font-semibold text-amber-300 mb-2">Un aviso, antes de que sea un problema</p>
        <p class="text-sm text-slate-300 leading-relaxed">
          <span class="mono text-slate-100">compuzero.com</span> ya está tomado. No lo tiene otra
          empresa de computadoras: lo tiene un revendedor que lo ofrece como
          <em>dominio premium</em>, y esos suelen pedir cifras de cuatro dígitos.
        </p>
        <p class="text-sm text-slate-400 leading-relaxed mt-3">
          La salida razonable es un <span class="mono text-slate-100">.com.ec</span> o un
          <span class="mono text-slate-100">.ec</span>, que además le dice a Google y al cliente
          que ustedes son de acá. Hay que verificar disponibilidad antes de reservarlo; lo hacemos
          el mismo día que nos den luz verde.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══════ 02 · la tienda ══════ -->
<section id="tienda" class="anc py-16 border-t border-slate-800/50">
  <div class="md:grid md:grid-cols-12 md:gap-10">
    <div class="md:col-span-4 mb-8 md:mb-0">
      <div class="md:sticky md:top-24">
        <p class="mono text-xs text-cyan-400 mb-2">02</p>
        <h2 class="text-3xl font-bold leading-tight">Qué proponemos</h2>
        <p class="text-slate-500 text-sm mt-3">Una tienda propia, no una plantilla comprada.</p>
      </div>
    </div>
    <div class="md:col-span-8">
      <div class="grid sm:grid-cols-2 gap-4">
        <?php
        $bloques = [
          ['Catálogo que se puede filtrar',
           'El cliente filtra por marca, procesador, memoria, disco y precio. En computadoras eso no es un lujo: es como la gente decide.'],
          ['Fichas con la ficha técnica',
           'Cada equipo con sus especificaciones, fotos y precio. Sin PDFs, sin «consulte disponibilidad».'],
          ['Carrito y pedido',
           'El cliente arma su pedido y lo envía. Ustedes lo reciben por correo y por el panel.'],
          ['WhatsApp en cada producto',
           'Botón que abre el chat con el modelo ya escrito en el mensaje. No hay que preguntar «¿cuál era?».'],
          ['Hecha para el celular',
           'La mayoría va a entrar desde el teléfono. Se diseña pensando en esa pantalla primero.'],
          ['Panel para manejarla ustedes',
           'Subir un equipo, cambiar un precio o marcar algo como agotado se hace sin llamarnos.'],
        ];
        foreach ($bloques as $b): ?>
          <div class="card rounded-xl p-5">
            <p class="font-semibold text-slate-100 mb-1.5"><?= $b[0] ?></p>
            <p class="text-sm text-slate-400 leading-relaxed"><?= $b[1] ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ══════ 03 · qué incluye ══════ -->
<section id="incluye" class="anc py-16 border-t border-slate-800/50">
  <div class="md:grid md:grid-cols-12 md:gap-10">
    <div class="md:col-span-4 mb-8 md:mb-0">
      <div class="md:sticky md:top-24">
        <p class="mono text-xs text-cyan-400 mb-2">03</p>
        <h2 class="text-3xl font-bold leading-tight">Qué incluye</h2>
        <p class="text-slate-500 text-sm mt-3">Todo esto está dentro del valor. No hay extras después.</p>
      </div>
    </div>
    <div class="md:col-span-8">
      <div class="grid sm:grid-cols-2 gap-x-8 gap-y-3">
        <?php
        $items = [
          'Diseño propio para CompuZero',
          'Dominio .com.ec o .ec por 1 año',
          'Hosting por 1 año',
          'Certificado de seguridad SSL',
          'Correos corporativos con el dominio',
          'Carga inicial de hasta 60 productos',
          'Buscador con filtros técnicos',
          'Carrito y proceso de pedido',
          'Botón de WhatsApp por producto',
          'Adaptada a celular y tablet',
          'Optimización de velocidad e imágenes',
          'Títulos y descripciones para Google',
          'Medición de visitas con Analytics',
          'Panel de administración',
          'Capacitación para manejarla',
          'Soporte por 1 mes tras la entrega',
        ];
        foreach ($items as $i): ?>
          <div class="flex items-start gap-3 py-1.5 border-b border-slate-800/40">
            <span class="text-cyan-400 mt-0.5 shrink-0">✓</span>
            <span class="text-sm text-slate-300"><?= $i ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="card rounded-xl p-6 mt-8 border-l-2 border-l-slate-600">
        <p class="text-sm font-semibold text-slate-200 mb-3">Qué no entra en este valor</p>
        <ul class="text-sm text-slate-400 space-y-2 leading-relaxed">
          <li>› <span class="text-slate-300">Pasarela de pagos en línea</span> (tarjeta o Payphone).
              Se puede sumar después; el trámite con el banco lo hacen ustedes y tiene su propio costo.</li>
          <li>› <span class="text-slate-300">Fotografía de producto.</span> Trabajamos con las fotos
              que ustedes nos pasen o con las del proveedor.</li>
          <li>› <span class="text-slate-300">Redacción de fichas técnicas.</span> Cargamos los datos
              que nos entreguen; no los investigamos equipo por equipo.</li>
          <li>› <span class="text-slate-300">Carga de más de 60 productos.</span> Sobre esa cantidad
              se cotiza aparte o lo hacen ustedes desde el panel.</li>
          <li>› <span class="text-slate-300">Facturación electrónica</span> y conexión con sistemas
              contables.</li>
        </ul>
        <p class="text-xs text-slate-500 mt-4 leading-relaxed">
          Lo ponemos por escrito ahora para que nadie descubra un costo a mitad del proyecto.
          Si algo de esta lista les hace falta, díganlo y lo cotizamos antes de arrancar.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══════ 04 · inversión ══════ -->
<section id="inversion" class="anc py-16 border-t border-slate-800/50">
  <div class="md:grid md:grid-cols-12 md:gap-10">
    <div class="md:col-span-4 mb-8 md:mb-0">
      <div class="md:sticky md:top-24">
        <p class="mono text-xs text-cyan-400 mb-2">04</p>
        <h2 class="text-3xl font-bold leading-tight">Inversión</h2>
      </div>
    </div>
    <div class="md:col-span-8">

      <div class="card rounded-2xl p-8 border-cyan-500/25">
        <p class="text-sm text-slate-400 mb-1">Desarrollo completo de la tienda</p>
        <div class="flex items-baseline gap-3 mb-1">
          <span class="num text-5xl md:text-6xl font-bold">$1.200</span>
          <span class="text-slate-500 text-lg">+ IVA</span>
        </div>
        <p class="text-sm text-slate-500">Todo lo listado arriba, con dominio y hosting del primer año incluidos.</p>

        <div class="grid sm:grid-cols-2 gap-4 mt-8">
          <div class="rounded-xl bg-white/5 p-5">
            <p class="text-xs uppercase tracking-wider text-slate-500 mb-1">Al empezar &middot; 60 %</p>
            <p class="num text-2xl font-bold">$720</p>
          </div>
          <div class="rounded-xl bg-white/5 p-5">
            <p class="text-xs uppercase tracking-wider text-slate-500 mb-1">A la entrega &middot; 40 %</p>
            <p class="num text-2xl font-bold">$480</p>
          </div>
        </div>
      </div>

      <div class="card rounded-xl p-6 mt-6">
        <p class="text-sm font-semibold text-slate-200 mb-3">Desde el segundo año</p>
        <div class="space-y-2 text-sm">
          <div class="flex justify-between border-b border-slate-800/50 pb-2">
            <span class="text-slate-400">Renovación del dominio</span>
            <span class="mono text-slate-200">según extensión</span>
          </div>
          <div class="flex justify-between border-b border-slate-800/50 pb-2">
            <span class="text-slate-400">Hosting anual</span>
            <span class="mono text-slate-200">$95,99</span>
          </div>
        </div>
        <p class="text-xs text-slate-500 mt-4 leading-relaxed">
          El dominio <span class="mono">.com.ec</span> y el <span class="mono">.ec</span> tienen
          tarifas distintas; el valor exacto se confirma al reservarlo. La tienda es suya: si algún
          día quieren llevársela a otro proveedor, se entrega completa.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- ══════ 05 · plazos ══════ -->
<section id="plazos" class="anc py-16 border-t border-slate-800/50">
  <div class="md:grid md:grid-cols-12 md:gap-10">
    <div class="md:col-span-4 mb-8 md:mb-0">
      <div class="md:sticky md:top-24">
        <p class="mono text-xs text-cyan-400 mb-2">05</p>
        <h2 class="text-3xl font-bold leading-tight">Plazos</h2>
        <p class="text-slate-500 text-sm mt-3">3 a 4 semanas desde el abono inicial.</p>
      </div>
    </div>
    <div class="md:col-span-8">
      <div class="space-y-4">
        <?php
        $fases = [
          ['Semana 1', 'Dominio y hosting', 'Reservamos el dominio, montamos el servidor y creamos los correos. Ustedes nos pasan logo, fotos y la lista de equipos con precios.'],
          ['Semana 2', 'Diseño', 'Les mostramos la portada y una ficha de producto. Ajustamos hasta que les guste antes de seguir.'],
          ['Semana 3', 'Carga y armado', 'Se cargan los productos, se arman los filtros, el carrito y los botones de WhatsApp.'],
          ['Semana 4', 'Pruebas y entrega', 'Velocidad, celular, pedidos de prueba. Capacitación y salida a producción.'],
        ];
        foreach ($fases as $f): ?>
          <div class="card rounded-xl p-5 flex flex-col sm:flex-row sm:items-start gap-4">
            <span class="mono text-xs text-cyan-400 shrink-0 sm:w-24 pt-1"><?= $f[0] ?></span>
            <div>
              <p class="font-semibold text-slate-100 mb-1"><?= $f[1] ?></p>
              <p class="text-sm text-slate-400 leading-relaxed"><?= $f[2] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <p class="text-sm text-slate-500 mt-6 leading-relaxed">
        El plazo corre desde que tengamos el abono <em>y</em> el material. Lo que más suele demorar
        un proyecto así es esperar las fotos y la lista de precios, así que mientras antes lleguen,
        antes sale.
      </p>
    </div>
  </div>
</section>

<!-- ══════ 06 · nosotros ══════ -->
<section id="nosotros" class="anc py-16 border-t border-slate-800/50">
  <div class="md:grid md:grid-cols-12 md:gap-10">
    <div class="md:col-span-4 mb-8 md:mb-0">
      <div class="md:sticky md:top-24">
        <p class="mono text-xs text-cyan-400 mb-2">06</p>
        <h2 class="text-3xl font-bold leading-tight">Por qué nosotros</h2>
      </div>
    </div>
    <div class="md:col-span-8 space-y-5 text-slate-300 leading-relaxed">
      <p>
        Creative Web tiene oficina en Otavalo y más de diez años haciendo páginas y tiendas en línea.
        Administramos más de 60 sitios y sus servidores, así que el hosting y el dominio no se
        subcontratan: los manejamos nosotros.
      </p>
      <p>
        Trabajamos con WordPress y WooCommerce, que es la plataforma de tienda más usada del mundo.
        Eso importa por una razón práctica: si mañana quieren cambiar de proveedor, cualquiera puede
        seguir el trabajo. No quedan amarrados a nosotros.
      </p>
      <p class="text-slate-400">
        El soporte lo damos por WhatsApp directo, no por un sistema de tickets. Cuando escriben,
        contesta alguien que conoce su tienda.
      </p>
    </div>
  </div>
</section>

<!-- ══════ cierre ══════ -->
<section class="py-16 border-t border-slate-800/50">
  <div class="rounded-2xl bg-gradient-to-br from-cyan-600/15 to-cyan-900/5 border border-cyan-500/25 p-8 md:p-12
              flex flex-col md:flex-row md:items-center justify-between gap-8">
    <div>
      <h2 class="text-3xl font-bold mb-2">¿Arrancamos?</h2>
      <p class="text-slate-400">Con el abono inicial reservamos el dominio el mismo día.</p>
    </div>
    <div class="flex flex-wrap gap-3 shrink-0">
      <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20soy%20Fabi%C3%A1n%20de%20CompuZero.%20Revis%C3%A9%20la%20propuesta%20de%20la%20tienda%20en%20l%C3%ADnea."
         target="_blank"
         class="inline-flex items-center gap-2 rounded-lg bg-emerald-500 hover:bg-emerald-400 text-slate-900 font-semibold px-6 py-3 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
        Escribir por WhatsApp
      </a>
      <a href="pdf/cotizacion.pdf" target="_blank"
         class="inline-flex items-center rounded-lg border border-slate-600 hover:border-slate-400 font-semibold px-6 py-3 transition">
        Descargar el PDF
      </a>
    </div>
  </div>
</section>

</div>

<!-- ══════ footer ══════ -->
<footer class="border-t border-slate-800/60 mt-8">
  <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col md:flex-row items-center justify-between gap-6">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 opacity-70">
    <div class="text-sm text-slate-500 text-center md:text-right leading-relaxed">
      info@creativeweb.com.ec &middot; 099 917 4980 &middot; 062 924 887<br>
      Modesto Jaramillo 3-60 y Abdón Calderón, 2do piso &middot; Otavalo
    </div>
  </div>
  <p class="text-center text-xs text-slate-700 pb-8 mono">PROFORMA 1-2-1328 &middot; VALIDEZ 30 DÍAS</p>
</footer>

</body>
</html>
