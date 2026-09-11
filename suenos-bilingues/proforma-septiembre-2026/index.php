<?php
session_start();
if (empty($_SESSION['auth_suenos'])) {
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
<title>Sistema de matrícula y agenda &middot; Sueños Bilingües</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  body{font-family:'Poppins',system-ui,sans-serif;background:#f4fafb;color:#1f2a5e;scroll-behavior:smooth}
  h1,h2,h3,.disp{font-family:'Lexend',sans-serif}
  .mono{font-family:'JetBrains Mono',monospace}
  .anc{scroll-margin-top:5.5rem}
  .card{background:#fff;border:1px solid #dcedef;border-radius:14px}
  .navlink{transition:color .15s} .navlink:hover{color:#2f9aa2}
</style>
</head>
<body class="antialiased">

<!-- ══ nav ══ -->
<nav class="sticky top-0 z-50 bg-[#f4fafb]/92 backdrop-blur border-b border-[#dcedef]">
  <div class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between gap-4">
    <img src="/informes/assets/creativeweb-iso.png" alt="Creative Web" class="h-8 shrink-0">
    <div class="hidden md:flex items-center gap-7 text-sm text-[#5a6a9c]">
      <a href="#como"      class="navlink">Cómo funciona</a>
      <a href="#grupos"    class="navlink">Los grupos</a>
      <a href="#agenda"    class="navlink">La agenda</a>
      <a href="#inversion" class="navlink">Inversión</a>
    </div>
    <div class="flex items-center gap-3 shrink-0">
      <a href="pdf/cotizacion.pdf" target="_blank"
         class="text-xs font-semibold rounded-lg bg-[#263485] hover:bg-[#1b2668] text-white transition px-4 py-2">PDF</a>
      <a href="logout.php" class="text-xs text-[#93a1c4] hover:text-[#5a6a9c]">Salir</a>
    </div>
  </div>
</nav>

<div class="max-w-5xl mx-auto px-6">

<!-- ══ hero ══ -->
<header class="pt-16 pb-12">
  <p class="mono text-xs tracking-[.2em] uppercase text-[#2f9aa2] mb-4">Proforma 1-2-1329 &middot; 11 de septiembre de 2026</p>
  <h1 class="text-4xl md:text-5xl font-bold leading-[1.08] mb-5 text-[#263485]">
    Matrícula y agenda<br>para Sueños Bilingües
  </h1>
  <p class="text-lg text-[#5a6a9c] max-w-2xl leading-relaxed">
    Un sistema donde se registra al alumno con su representante, el grupo se asigna solo según
    la edad, y el horario se reserva respetando el cupo de siete por clase. Con aviso automático
    por WhatsApp.
  </p>
</header>

<!-- ══ 01 · qué resuelve ══ -->
<section class="py-12 border-t border-[#e4f1f2]">
  <p class="mono text-xs text-[#2f9aa2] mb-2">01</p>
  <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-[#263485]">Qué resuelve</h2>
  <div class="grid md:grid-cols-3 gap-4">
    <?php
    $puntos = [
      ['Un solo registro por alumno',
       'Datos del niño y de su representante en una sola ficha, con el parentesco y el WhatsApp de contacto.'],
      ['El grupo se asigna solo',
       'Con la fecha de nacimiento el sistema calcula la edad y muestra el grupo que corresponde. Sin tablas ni cuentas a mano.'],
      ['El cupo se respeta solo',
       'Cuando una hora llega a siete alumnos, deja de ofrecerse. No hay forma de sobrepasar el cupo por error.'],
    ];
    foreach ($puntos as $p): ?>
      <div class="card p-5">
        <p class="disp font-semibold text-[#263485] mb-2"><?= $p[0] ?></p>
        <p class="text-sm text-[#5a6a9c] leading-relaxed"><?= $p[1] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ══ 02 · cómo funciona ══ -->
<section id="como" class="anc py-12 border-t border-[#e4f1f2]">
  <p class="mono text-xs text-[#2f9aa2] mb-2">02</p>
  <h2 class="text-2xl md:text-3xl font-semibold mb-3 text-[#263485]">Cómo funciona la matrícula</h2>
  <p class="text-[#5a6a9c] mb-8 max-w-2xl">Cinco pasos, de principio a fin.</p>

  <div class="space-y-3">
    <?php
    $pasos = [
      ['Se registra al alumno',
       'Nombres, apellidos y <strong>fecha de nacimiento</strong>. Es el dato del que depende todo lo demás.'],
      ['Se registra al representante',
       'Nombre completo, <strong>parentesco</strong> —mamá, papá u otro— y el <strong>número de WhatsApp</strong> donde quiere recibir los avisos.'],
      ['El sistema propone el grupo',
       'Calcula la edad exacta a la fecha y muestra a qué grupo pertenece. <strong>Usted puede cambiarlo</strong> a uno menor o mayor si el caso lo amerita: la última palabra siempre es de la escuela.'],
      ['Se elige el horario',
       'Se muestran las cuatro horas disponibles con los cupos que quedan en cada una. Las que están llenas no se pueden elegir.'],
      ['Confirmación',
       'El sistema muestra el resumen de la matrícula y <strong>envía el mensaje de confirmación por WhatsApp</strong> al representante.'],
    ];
    foreach ($pasos as $i => $p): ?>
      <div class="card p-5 flex gap-5">
        <span class="mono text-sm text-[#2f9aa2] shrink-0 pt-0.5"><?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?></span>
        <div>
          <p class="disp font-semibold text-[#263485] mb-1"><?= $p[0] ?></p>
          <p class="text-sm text-[#5a6a9c] leading-relaxed"><?= $p[1] ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="card p-6 mt-6 border-l-4 border-l-[#88ccd0]">
    <p class="disp font-semibold text-[#263485] mb-2">Y si el alumno necesita cambiar de hora</p>
    <p class="text-sm text-[#5a6a9c] leading-relaxed">
      Se cambia desde la misma ficha. El sistema libera el cupo anterior, ocupa el nuevo y avisa
      al representante. No hay que borrar la matrícula ni volver a crearla.
    </p>
  </div>
</section>

<!-- ══ 03 · grupos ══ -->
<section id="grupos" class="anc py-12 border-t border-[#e4f1f2]">
  <p class="mono text-xs text-[#2f9aa2] mb-2">03</p>
  <h2 class="text-2xl md:text-3xl font-semibold mb-3 text-[#263485]">Los cuatro grupos</h2>
  <p class="text-[#5a6a9c] mb-7 max-w-2xl">
    El sistema los aplica tal como están definidos, contando años y meses cumplidos.
  </p>

  <div class="card overflow-hidden">
    <table class="w-full text-left">
      <thead class="bg-[#f0f9fa] text-xs uppercase tracking-wider text-[#5a6a9c]">
        <tr>
          <th class="px-6 py-4 disp font-semibold">Grupo</th>
          <th class="px-6 py-4 disp font-semibold">Edad</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-[#eaf5f6]">
        <?php
        $grupos = [
          ['Tiny Club', '4 años a 6 años 11 meses'],
          ['Junior Learners', '7 años a 8 años 11 meses'],
          ['Future Speakers', '9 años a 12 años 11 meses'],
          ['EFE &middot; English for Everyone', '13 años en adelante'],
        ];
        foreach ($grupos as $g): ?>
          <tr>
            <td class="px-6 py-4 disp font-medium text-[#263485]"><?= $g[0] ?></td>
            <td class="px-6 py-4 text-[#5a6a9c] mono text-sm"><?= $g[1] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="card p-6 mt-5 border-l-4 border-l-[#88ccd0]">
    <p class="disp font-semibold text-[#263485] mb-2">Un detalle que revisamos</p>
    <p class="text-sm text-[#5a6a9c] leading-relaxed">
      Los cuatro rangos encajan sin huecos ni superposiciones: un niño que cumple siete años sale
      de Tiny Club y entra a Junior Learners el mismo día. Eso importa, porque significa que
      <strong>ningún alumno puede quedar sin grupo asignado</strong> por una fecha de nacimiento
      que caiga en el borde.
    </p>
  </div>
</section>

<!-- ══ 04 · agenda ══ -->
<section id="agenda" class="anc py-12 border-t border-[#e4f1f2]">
  <p class="mono text-xs text-[#2f9aa2] mb-2">04</p>
  <h2 class="text-2xl md:text-3xl font-semibold mb-3 text-[#263485]">La agenda y el cupo</h2>
  <p class="text-[#5a6a9c] mb-7 max-w-2xl">
    Cuatro horas de clase, un máximo de siete alumnos en cada una.
  </p>

  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <?php foreach (['14:00 – 15:00','15:00 – 16:00','16:00 – 17:00','17:00 – 18:00'] as $hora): ?>
      <div class="card p-5 text-center">
        <p class="mono text-lg font-medium text-[#263485] mb-2"><?= $hora ?></p>
        <p class="text-xs uppercase tracking-wider text-[#2f9aa2]">máximo 7 alumnos</p>
      </div>
    <?php endforeach; ?>
  </div>

  <p class="text-sm text-[#5a6a9c] mt-6 max-w-3xl leading-relaxed">
    Al matricular se ve cuántos cupos quedan en cada hora. Cuando una llega a siete, deja de
    aparecer como opción. Ese control es del sistema, no de quien matricula, así que no depende
    de que alguien recuerde el conteo.
  </p>
</section>

<!-- ══ 05 · whatsapp ══ -->
<section class="py-12 border-t border-[#e4f1f2]">
  <p class="mono text-xs text-[#2f9aa2] mb-2">05</p>
  <h2 class="text-2xl md:text-3xl font-semibold mb-3 text-[#263485]">Aviso automático por WhatsApp</h2>
  <div class="grid md:grid-cols-12 gap-8 items-start">
    <div class="md:col-span-7 space-y-4 text-[#5a6a9c] leading-relaxed">
      <p>
        El representante recibe el mensaje en el número que registró, sin que nadie tenga que
        escribirlo. Se envía al confirmar la matrícula y también cuando se cambia el horario.
      </p>
      <p>
        Es el punto donde más tiempo se pierde hoy en cualquier escuela: confirmar uno por uno y
        volver a confirmar cuando algo cambia.
      </p>
    </div>
    <div class="md:col-span-5">
      <div class="card p-5 bg-[#f0f9fa]">
        <p class="text-xs uppercase tracking-wider text-[#2f9aa2] mb-3 disp">Ejemplo del mensaje</p>
        <p class="text-sm text-[#3a4a7c] leading-relaxed">
          Hola, María. La matrícula de <strong>Martín Suárez</strong> quedó confirmada en
          <strong>Junior Learners</strong>, los días de clase de <strong>15:00 a 16:00</strong>.
          Cualquier cambio nos escribe por acá. — Sueños Bilingües
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══ 06 · inversión ══ -->
<section id="inversion" class="anc py-12 border-t border-[#e4f1f2]">
  <p class="mono text-xs text-[#2f9aa2] mb-2">06</p>
  <h2 class="text-2xl md:text-3xl font-semibold mb-7 text-[#263485]">Inversión</h2>

  <div class="card overflow-hidden">
    <table class="w-full text-left">
      <thead class="bg-[#f0f9fa] text-xs uppercase tracking-wider text-[#5a6a9c]">
        <tr>
          <th class="px-6 py-4 disp font-semibold">Concepto</th>
          <th class="px-6 py-4 disp font-semibold text-right whitespace-nowrap">Valor</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-[#eaf5f6]">
        <tr>
          <td class="px-6 py-5">
            <p class="disp font-medium text-[#263485]">Sistema Quipuy &mdash; primer año</p>
            <p class="text-sm text-[#5a6a9c] mt-1">La base sobre la que corre todo. Se renueva cada año.</p>
          </td>
          <td class="px-6 py-5 text-right disp text-lg font-semibold whitespace-nowrap">$&nbsp;90,00</td>
        </tr>
        <tr>
          <td class="px-6 py-5">
            <p class="disp font-medium text-[#263485]">Módulo de matrícula y agenda</p>
            <p class="text-sm text-[#5a6a9c] mt-1">Alumno, representante, asignación por edad, agenda y control de cupo. Pago único.</p>
          </td>
          <td class="px-6 py-5 text-right disp text-lg font-semibold whitespace-nowrap">$&nbsp;120,00</td>
        </tr>
        <tr>
          <td class="px-6 py-5">
            <p class="disp font-medium text-[#263485]">Integración con WhatsApp</p>
            <p class="text-sm text-[#5a6a9c] mt-1">Envío automático de confirmaciones y avisos de cambio. Pago único.</p>
          </td>
          <td class="px-6 py-5 text-right disp text-lg font-semibold whitespace-nowrap">$&nbsp;50,00</td>
        </tr>
      </tbody>
      <tfoot class="bg-[#f0f9fa]">
        <tr>
          <td class="px-6 py-5 text-right disp font-semibold text-[#263485]">Total &middot; un solo pago</td>
          <td class="px-6 py-5 text-right disp text-2xl font-bold text-[#263485] whitespace-nowrap">$&nbsp;260,00</td>
        </tr>
      </tfoot>
    </table>
  </div>
  <p class="text-sm text-[#93a1c4] mt-4">Los precios no incluyen IVA. Pago único al iniciar.</p>

  <div class="card p-6 mt-6">
    <p class="disp font-semibold text-[#263485] mb-2">Desde el segundo año</p>
    <p class="text-[#5a6a9c] text-sm leading-relaxed">
      Solo se renueva el sistema Quipuy: <strong class="text-[#263485]">$90,00 + IVA al año</strong>.
      El módulo y la integración son desarrollo, se pagan una vez y quedan suyos.
    </p>
  </div>
</section>

<!-- ══ 07 · alcance ══ -->
<section class="py-12 border-t border-[#e4f1f2]">
  <p class="mono text-xs text-[#2f9aa2] mb-2">07</p>
  <h2 class="text-2xl md:text-3xl font-semibold mb-6 text-[#263485]">Qué incluye y qué no</h2>
  <div class="grid md:grid-cols-2 gap-5">
    <div class="card p-6">
      <p class="disp font-semibold text-[#263485] mb-4">Incluido</p>
      <ul class="space-y-2.5 text-sm text-[#5a6a9c]">
        <?php foreach ([
          'Ficha de alumno con fecha de nacimiento',
          'Ficha de representante con parentesco y WhatsApp',
          'Asignación automática de grupo por edad',
          'Cambio manual de grupo por el administrador',
          'Agenda de los cuatro horarios con control de cupo',
          'Cambio de horario del alumno',
          'Mensaje de confirmación en pantalla',
          'Envío automático por WhatsApp',
          'Capacitación para el equipo',
          'Un mes de soporte tras la entrega',
        ] as $i): ?>
          <li class="flex gap-3"><span class="text-[#2f9aa2] shrink-0">✓</span><span><?= $i ?></span></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="card p-6">
      <p class="disp font-semibold text-[#263485] mb-4">No incluido en este valor</p>
      <ul class="space-y-2.5 text-sm text-[#5a6a9c]">
        <?php foreach ([
          'Cobro de pensiones o matrículas en línea',
          'Control de asistencia diaria del alumno',
          'Calificaciones o informes de avance',
          'Aplicación para celular; se usa desde el navegador',
          'Migración de los alumnos que ya tienen registrados',
        ] as $i): ?>
          <li class="flex gap-3"><span class="text-[#c3ccdf] shrink-0">·</span><span><?= $i ?></span></li>
        <?php endforeach; ?>
      </ul>
      <p class="text-xs text-[#93a1c4] mt-4 leading-relaxed">
        Cualquiera de estos se puede sumar después. Lo ponemos por escrito ahora para que no
        aparezca un costo a mitad del trabajo.
      </p>
    </div>
  </div>
</section>

<!-- ══ 08 · plazos ══ -->
<section class="py-12 border-t border-[#e4f1f2]">
  <p class="mono text-xs text-[#2f9aa2] mb-2">08</p>
  <h2 class="text-2xl md:text-3xl font-semibold mb-3 text-[#263485]">Plazos</h2>
  <p class="text-[#5a6a9c] mb-7 max-w-2xl">Dos a tres semanas desde que arrancamos.</p>
  <div class="grid sm:grid-cols-3 gap-4">
    <?php
    $fases = [
      ['Semana 1', 'Sistema y grupos', 'Se deja Quipuy funcionando y se cargan los cuatro grupos con sus rangos de edad y los cuatro horarios.'],
      ['Semana 2', 'El módulo', 'Fichas de alumno y representante, asignación por edad, agenda y control de cupo.'],
      ['Semana 3', 'WhatsApp y entrega', 'Se conecta el envío automático, se prueba con casos reales y se capacita al equipo.'],
    ];
    foreach ($fases as $f): ?>
      <div class="card p-5">
        <p class="mono text-xs text-[#2f9aa2] mb-2"><?= $f[0] ?></p>
        <p class="disp font-semibold text-[#263485] mb-1.5"><?= $f[1] ?></p>
        <p class="text-sm text-[#5a6a9c] leading-relaxed"><?= $f[2] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
  <p class="text-sm text-[#93a1c4] mt-5">
    Lo único que necesitamos de ustedes para empezar es el número de WhatsApp desde el que se
    enviarán los avisos.
  </p>
</section>

<!-- ══ cierre ══ -->
<section class="py-12 border-t border-[#e4f1f2] pb-20">
  <div class="rounded-2xl bg-[#263485] text-white p-8 md:p-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
    <div>
      <h2 class="text-2xl font-semibold mb-2">¿Arrancamos?</h2>
      <p class="text-[#b8c4ea]">Dos o tres semanas y la matrícula deja de llevarse en papel.</p>
    </div>
    <div class="flex flex-wrap gap-3 shrink-0">
      <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20le%20escribo%20de%20Sue%C3%B1os%20Biling%C3%BCes.%20Revisamos%20la%20propuesta%20del%20sistema%20de%20matr%C3%ADcula."
         target="_blank"
         class="inline-flex items-center gap-2 rounded-lg bg-[#88ccd0] hover:bg-[#6fbfc4] text-[#1b2668] font-semibold px-6 py-3 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
        Escribir por WhatsApp
      </a>
      <a href="pdf/cotizacion.pdf" target="_blank"
         class="inline-flex items-center rounded-lg border border-[#5a6ab0] hover:border-[#88ccd0] font-semibold px-6 py-3 transition">
        Descargar el PDF
      </a>
    </div>
  </div>
</section>

</div>

<!-- ══ footer ══ -->
<footer class="border-t border-[#e4f1f2] bg-white">
  <div class="max-w-5xl mx-auto px-6 py-9 flex flex-col md:flex-row items-center justify-between gap-5">
    <img src="/informes/assets/creativeweb-iso.png" alt="Creative Web" class="h-9">
    <div class="text-sm text-[#93a1c4] text-center md:text-right leading-relaxed">
      info@creativeweb.com.ec &middot; 099 917 4980 &middot; 062 924 887<br>
      Modesto Jaramillo 3-60 y Abdón Calderón, 2do piso &middot; Otavalo
    </div>
  </div>
  <p class="text-center text-xs text-[#b8c4d6] pb-7 mono">PROFORMA 1-2-1329 &middot; VALIDEZ 30 DÍAS</p>
</footer>

</body>
</html>
