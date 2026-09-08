<?php
session_start();
if (empty($_SESSION['auth_stelmap_proforma'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Proforma STELMAP S.A.S. &middot; Creative Web</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Outfit', system-ui, sans-serif; scroll-behavior: smooth; }
  .glass { background: rgba(255,255,255,.05); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,.09); }
  .nav-link { transition: color .15s; }
  .nav-link:hover { color: #38bdf8; }
</style>
</head>
<body class="bg-[#0b1626] text-slate-100 antialiased">

<!-- ══ header ══ -->
<header class="sticky top-0 z-50 bg-[#0b1626]/90 backdrop-blur border-b border-white/10">
  <div class="max-w-6xl mx-auto px-5 h-16 flex items-center justify-between gap-4">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-7 shrink-0">
    <nav class="hidden md:flex items-center gap-7 text-sm text-slate-300">
      <a href="#incluye"   class="nav-link">Qu&eacute; incluye</a>
      <a href="#inversion" class="nav-link">Inversi&oacute;n</a>
      <a href="#renovacion" class="nav-link">Renovaci&oacute;n</a>
      <a href="#arranque"  class="nav-link">C&oacute;mo empezamos</a>
    </nav>
    <div class="flex items-center gap-3 shrink-0">
      <a href="pdf/cotizacion.pdf" target="_blank"
         class="text-xs font-semibold rounded-lg bg-sky-500 hover:bg-sky-400 transition-colors px-4 py-2">
         Descargar PDF</a>
      <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300">Salir</a>
    </div>
  </div>
</header>

<!-- ══ hero ══ -->
<section class="max-w-6xl mx-auto px-5 pt-16 pb-12">
  <p class="text-xs uppercase tracking-[.2em] text-sky-400 font-semibold mb-3">Proforma 1-2-1327 &middot; 8 de septiembre de 2026</p>
  <h1 class="text-4xl md:text-5xl font-semibold leading-[1.1] mb-5">
    Correos corporativos y alojamiento<br class="hidden md:block"> para STELMAP S.A.S.
  </h1>
  <p class="text-lg text-slate-400 max-w-2xl leading-relaxed">
    Dalila: esto es lo que conversamos por WhatsApp, puesto por escrito. El plan Pymes con
    correos ilimitados, m&aacute;s el registro de su dominio propio.
  </p>
</section>

<!-- ══ qué resuelve ══ -->
<section class="max-w-6xl mx-auto px-5 pb-16">
  <div class="glass rounded-2xl p-7 md:p-9">
    <h2 class="text-xl font-semibold mb-5">Lo que se resuelve con esto</h2>
    <div class="grid md:grid-cols-3 gap-6 text-slate-300">
      <div>
        <p class="text-sky-400 font-semibold mb-1.5">Correos con su marca</p>
        <p class="text-sm leading-relaxed">Direcciones del tipo <span class="text-slate-100">nombre@suempresa.com</span>
        en lugar de una cuenta de Gmail. Sin l&iacute;mite de cu&aacute;ntas crea.</p>
      </div>
      <div>
        <p class="text-sky-400 font-semibold mb-1.5">Su dominio, a su nombre</p>
        <p class="text-sm leading-relaxed">La direcci&oacute;n de internet queda registrada a nombre de
        STELMAP S.A.S., no del proveedor. Es suya.</p>
      </div>
      <div>
        <p class="text-sky-400 font-semibold mb-1.5">Espacio para su sitio</p>
        <p class="text-sm leading-relaxed">El mismo plan aloja su p&aacute;gina web cuando decida armarla,
        sin pagar nada aparte.</p>
      </div>
    </div>
  </div>
</section>

<!-- ══ qué incluye ══ -->
<section id="incluye" class="max-w-6xl mx-auto px-5 pb-16">
  <h2 class="text-2xl font-semibold mb-2">Plan Pymes &mdash; qu&eacute; incluye</h2>
  <p class="text-slate-400 mb-7">Es el plan intermedio, y el &uacute;nico que no pone tope al n&uacute;mero de correos.</p>

  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php
    $items = [
      ['Correos ilimitados',      'Cree las cuentas que necesite, sin costo adicional por usuario.'],
      ['20 GB en disco SSD',      'Espacio para los correos y para el sitio web.'],
      ['200 GB de transferencia', 'Es el tr&aacute;fico mensual que soporta. De sobra para una empresa.'],
      ['Certificado SSL',         'El candado de seguridad del navegador, incluido.'],
      ['Panel cPanel en espa&ntilde;ol','Desde ah&iacute; crea y administra los correos usted misma.'],
      ['Instalador de plantillas','WordPress, Joomla y m&aacute;s de 150 aplicaciones en un clic.'],
      ['Antispam avanzado',       'Filtro de correo basura, autocontestadores y reenviadores.'],
      ['Correo en todo lado',     'Configurable en Outlook, en el celular y por webmail.'],
      ['Soporte por 12 meses',    'Atenci&oacute;n directa por WhatsApp, tambi&eacute;n por Zoom si hace falta.'],
    ];
    foreach ($items as $i): ?>
      <div class="glass rounded-xl p-5">
        <p class="font-semibold text-slate-100 mb-1.5"><?= $i[0] ?></p>
        <p class="text-sm text-slate-400 leading-relaxed"><?= $i[1] ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="mt-5 glass rounded-xl p-5 border-l-2 border-sky-500">
    <p class="text-sm text-slate-300 leading-relaxed">
      <span class="text-slate-100 font-semibold">Sobre el sitio web:</span> s&iacute;, el plan le permite
      armarlo con plantillas. Si prefiere WordPress, <span class="text-slate-100">se lo instalamos sin costo</span>
      y usted carga el contenido. Si m&aacute;s adelante quiere que lo desarrollemos nosotros, eso se cotiza aparte.
    </p>
  </div>
</section>

<!-- ══ inversión ══ -->
<section id="inversion" class="max-w-6xl mx-auto px-5 pb-16">
  <h2 class="text-2xl font-semibold mb-7">Inversi&oacute;n</h2>

  <div class="glass rounded-2xl overflow-hidden">
    <table class="w-full text-left">
      <thead class="bg-white/5 text-xs uppercase tracking-wider text-slate-400">
        <tr>
          <th class="px-6 py-4 font-semibold">Concepto</th>
          <th class="px-6 py-4 font-semibold text-right whitespace-nowrap">Valor anual</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-white/8">
        <tr>
          <td class="px-6 py-5">
            <p class="font-semibold">Plan de alojamiento Pymes &mdash; 12 meses</p>
            <p class="text-sm text-slate-400 mt-1">Pago anual. Equivale a menos de $8 al mes. Incluye soporte t&eacute;cnico por los 12 meses.</p>
          </td>
          <td class="px-6 py-5 text-right text-lg font-semibold whitespace-nowrap">$&nbsp;95,99</td>
        </tr>
        <tr>
          <td class="px-6 py-5">
            <p class="font-semibold">Registro del dominio .com &mdash; 12 meses</p>
            <p class="text-sm text-slate-400 mt-1">A nombre de STELMAP S.A.S. Falta definir cu&aacute;l.</p>
          </td>
          <td class="px-6 py-5 text-right text-lg font-semibold whitespace-nowrap">$&nbsp;21,99</td>
        </tr>
      </tbody>
      <tfoot class="bg-white/5">
        <tr class="text-sky-300">
          <td class="px-6 py-4 text-right font-semibold">Total sin IVA</td>
          <td class="px-6 py-4 text-right text-2xl font-bold whitespace-nowrap">$&nbsp;117,98</td>
        </tr>
        <tr class="text-slate-400">
          <td class="px-6 py-3 text-right text-sm">Con IVA 15&nbsp;% incluido</td>
          <td class="px-6 py-3 text-right text-sm whitespace-nowrap">$&nbsp;135,68</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <p class="text-sm text-slate-500 mt-4">
    Los precios no incluyen IVA. Pago anual por anticipado; la cuenta queda activa el mismo
    d&iacute;a del pago. Validez de esta proforma: 10 d&iacute;as.
  </p>
</section>

<!-- ══ renovación ══ -->
<section id="renovacion" class="max-w-6xl mx-auto px-5 pb-16">
  <div class="glass rounded-2xl p-7 md:p-9">
    <h2 class="text-2xl font-semibold mb-3">Qu&eacute; se paga el a&ntilde;o que viene</h2>
    <p class="text-slate-400 mb-6 max-w-2xl leading-relaxed">
      Lo decimos ahora para que no sea sorpresa: son los mismos dos rubros, sin costos ocultos ni
      recargos por renovar.
    </p>
    <div class="grid sm:grid-cols-3 gap-4">
      <div class="rounded-xl bg-white/5 p-5">
        <p class="text-sm text-slate-400 mb-1">Alojamiento</p>
        <p class="text-2xl font-semibold">$&nbsp;95,99</p>
      </div>
      <div class="rounded-xl bg-white/5 p-5">
        <p class="text-sm text-slate-400 mb-1">Dominio</p>
        <p class="text-2xl font-semibold">$&nbsp;21,99</p>
      </div>
      <div class="rounded-xl bg-sky-500/10 border border-sky-500/25 p-5">
        <p class="text-sm text-sky-300 mb-1">Total anual sin IVA</p>
        <p class="text-2xl font-semibold text-sky-300">$&nbsp;117,98</p>
      </div>
    </div>
  </div>
</section>

<!-- ══ arranque ══ -->
<section id="arranque" class="max-w-6xl mx-auto px-5 pb-16">
  <h2 class="text-2xl font-semibold mb-7">C&oacute;mo empezamos</h2>
  <div class="grid md:grid-cols-4 gap-4">
    <?php
    $pasos = [
      ['1', 'Elige el dominio',   'Nos dice qu&eacute; direcci&oacute;n quiere y verificamos que est&eacute; libre. Ej.: stelmap.com'],
      ['2', 'Confirma el pago',   'Con el pago se activa la cuenta el mismo d&iacute;a.'],
      ['3', 'Creamos los correos','Nos pasa la lista de direcciones y las dejamos funcionando.'],
      ['4', 'Le enseñamos',       'Una sesi&oacute;n corta por Zoom para que administre el panel sin depender de nadie.'],
    ];
    foreach ($pasos as $p): ?>
      <div class="glass rounded-xl p-5">
        <div class="w-8 h-8 rounded-lg bg-sky-500 text-white font-bold grid place-items-center mb-3"><?= $p[0] ?></div>
        <p class="font-semibold mb-1.5"><?= $p[1] ?></p>
        <p class="text-sm text-slate-400 leading-relaxed"><?= $p[2] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
  <p class="text-sm text-slate-500 mt-5">
    Lo &uacute;nico que necesitamos de usted para arrancar es el nombre del dominio y la lista de correos.
  </p>
</section>

<!-- ══ quiénes somos ══ -->
<section class="max-w-6xl mx-auto px-5 pb-16">
  <div class="glass rounded-2xl p-7 md:p-9">
    <h2 class="text-xl font-semibold mb-4">Con qui&eacute;n est&aacute; trabajando</h2>
    <p class="text-slate-400 leading-relaxed max-w-3xl">
      Creative Web tiene oficina en Otavalo y m&aacute;s de 60 sitios web y cuentas de alojamiento
      administradas en el pa&iacute;s. El soporte lo damos por WhatsApp directo, no por un sistema de
      tickets: cuando escribe, le contesta alguien que conoce su cuenta.
    </p>
  </div>
</section>

<!-- ══ cierre ══ -->
<section class="max-w-6xl mx-auto px-5 pb-20">
  <div class="rounded-2xl bg-gradient-to-br from-sky-600/20 to-sky-900/10 border border-sky-500/25 p-8 md:p-10
              flex flex-col md:flex-row md:items-center justify-between gap-6">
    <div>
      <h2 class="text-2xl font-semibold mb-2">&iquest;Avanzamos?</h2>
      <p class="text-slate-300">Con el nombre del dominio ya podemos reservarlo.</p>
    </div>
    <div class="flex flex-wrap gap-3 shrink-0">
      <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20soy%20Dalila%20de%20STELMAP.%20Revis%C3%A9%20la%20proforma%20de%20alojamiento%20y%20correos."
         target="_blank"
         class="inline-flex items-center gap-2 rounded-lg bg-emerald-500 hover:bg-emerald-400 transition-colors
                text-white font-semibold px-5 py-3">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
        Escribir por WhatsApp
      </a>
      <a href="pdf/cotizacion.pdf" target="_blank"
         class="inline-flex items-center rounded-lg border border-white/20 hover:border-white/40 transition-colors
                font-semibold px-5 py-3">Descargar el PDF</a>
    </div>
  </div>
</section>

<!-- ══ footer ══ -->
<footer class="border-t border-white/10">
  <div class="max-w-6xl mx-auto px-5 py-9 flex flex-col md:flex-row items-center justify-between gap-5">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-8 opacity-80">
    <div class="text-sm text-slate-500 text-center md:text-right leading-relaxed">
      info@creativeweb.com.ec &middot; 099 917 4980 &middot; 062 924 887<br>
      Modesto Jaramillo 3-60 y Abd&oacute;n Calder&oacute;n, 2do piso &middot; Otavalo
    </div>
  </div>
  <p class="text-center text-xs text-slate-600 pb-7">Proforma 1-2-1327 &middot; validez 30 d&iacute;as</p>
</footer>

</body>
</html>
