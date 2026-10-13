<?php
session_start();
if (empty($_SESSION['auth_vyv_ruc'])) {
    header('Location: login.php');
    exit;
}
$PROFORMA = '1-2-1335';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Verificación automática de RUC &mdash; Multitecnología VYV</title>
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
  .navlink.on{color:#e94560}
</style>
</head>
<body class="antialiased">

<!-- ══ nav ══ -->
<nav class="sticky top-0 z-50 bg-[#0a0f1a]/92 backdrop-blur border-b border-[#1b2740]">
  <div class="max-w-5xl mx-auto px-6 h-16 flex items-center justify-between gap-4">
    <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-7 shrink-0">
    <div class="flex-1 min-w-0 flex items-center md:justify-center gap-5 md:gap-7 text-sm text-[#94a3b8] overflow-x-auto whitespace-nowrap">
      <a href="#diagnostico" class="navlink">Diagnóstico</a>
      <a href="#solucion"    class="navlink">La solución</a>
      <a href="#registrados" class="navlink">Clientes registrados</a>
      <a href="#inversion"   class="navlink">Inversión</a>
      <a href="#plazos"      class="navlink">Plazos</a>
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
  <p class="mono text-xs tracking-[.22em] uppercase text-[#e94560] mb-4">Proforma <?= $PROFORMA ?> &middot; 13 de octubre de 2026</p>
  <h1 class="text-4xl md:text-5xl font-bold leading-[1.08] mb-5">
    Verificación automática<br>de RUC en el registro
  </h1>
  <p class="text-lg text-[#94a3b8] max-w-2xl leading-relaxed">
    Que solo se registren empresas reales, con su RUC activo, y que su razón social llegue
    sola, sin errores de tipeo.
  </p>

  <div class="grid sm:grid-cols-2 gap-4 mt-10">
    <a href="#solucion" class="card p-6 hover:border-[#e94560]/60 transition block">
      <p class="mono text-xs uppercase tracking-wider text-[#e94560] mb-2">Propuesta</p>
      <p class="font-semibold mb-1">Verificación automática de RUC en el registro</p>
      <p class="text-3xl font-extrabold mono mt-3">$&nbsp;150</p>
    </a>
    <a href="#registrados" class="card p-6 hover:border-[#94a3b8]/60 transition block">
      <p class="mono text-xs uppercase tracking-wider text-[#94a3b8] mb-2">Opcional</p>
      <p class="font-semibold mb-1">Actualización de los clientes ya registrados</p>
      <p class="text-3xl font-extrabold mono mt-3">$&nbsp;60</p>
    </a>
  </div>
  <p class="text-sm text-[#5c6b84] mt-4">Valores sin IVA.</p>
</header>

<!-- ══ 01 · diagnóstico ══ -->
<section id="diagnostico" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">01</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-6">Por qué llegan registros falsos</h2>

  <p class="text-[#94a3b8] mb-6 max-w-3xl leading-relaxed">
    Revisamos el formulario de <span class="mono text-[#cbd5e1]">/registro-clientes-b2b/</span>,
    que es la única puerta de registro de la tienda. Esto es lo que encontramos:
  </p>

  <div class="grid sm:grid-cols-3 gap-4">
    <?php foreach ([
      ['Sin captcha', 'El reCAPTCHA de la página solo protege el formulario de suscripción del pie, no el de registro.'],
      ['Cualquier texto pasa como RUC', 'No se revisa que el número tenga la forma de un RUC ecuatoriano, ni que exista.'],
      ['Sin filtro de bots', 'Un programa puede enviar el formulario miles de veces sin abrir la página.'],
    ] as $c): ?>
      <div class="card p-6">
        <p class="font-semibold mb-2 text-[#e94560]"><?= $c[0] ?></p>
        <p class="text-sm text-[#94a3b8] leading-relaxed"><?= $c[1] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ══ 02 · la solución ══ -->
<section id="solucion" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">02</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-3">Cada cliente nuevo, verificado con el SRI</h2>
  <p class="text-[#94a3b8] mb-8 max-w-3xl leading-relaxed">
    Desarrollamos un complemento a medida para su tienda: al registrarse, el RUC se verifica con
    los datos públicos del SRI y la razón social llega sola. Además, el formulario queda
    blindado contra bots y registros falsos.
  </p>

  <h3 class="text-lg font-semibold mb-4">Así lo vive su cliente</h3>
  <div class="grid md:grid-cols-4 gap-3 mb-8">
    <?php foreach ([
      ['Escribe su RUC', 'En el formulario de registro, como hoy.'],
      ['Se consulta solo', 'En uno o dos segundos, sin salir de la página.'],
      ['Ve su razón social', 'Aparece con el estado del RUC. El campo Empresa se llena solo.'],
      ['Se registra', 'Si el RUC no existe o no está activo, el registro no avanza y se le explica por qué.'],
    ] as $i => $p): ?>
      <div class="card p-5">
        <p class="mono text-xs text-[#e94560] mb-2"><?= str_pad($i+1,2,'0',STR_PAD_LEFT) ?></p>
        <p class="font-semibold mb-1.5"><?= $p[0] ?></p>
        <p class="text-sm text-[#94a3b8] leading-relaxed"><?= $p[1] ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <h3 class="text-lg font-semibold mb-4">Incluye protección contra registros falsos</h3>
  <div class="grid sm:grid-cols-2 gap-3 mb-8">
    <?php foreach ([
      'reCAPTCHA invisible: el cliente no resuelve nada',
      'Campo trampa que solo los bots llenan',
      'Rechazo de envíos hechos en menos de 4 segundos',
      'RUC con formato y dígito verificador válidos',
      'Un mismo RUC no puede abrir dos cuentas',
      'Bloqueo de correos temporales y de enlaces en los campos',
    ] as $i): ?>
      <div class="card p-4 flex gap-3 items-start">
        <span class="text-[#34d39e] shrink-0">✓</span>
        <span class="text-sm text-[#cbd5e1]"><?= $i ?></span>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="grid md:grid-cols-2 gap-4">
    <div class="card p-6">
      <p class="font-semibold mb-3">Queda guardado en la ficha del cliente</p>
      <ul class="text-sm text-[#94a3b8] space-y-1.5">
        <li>· Razón social y nombre comercial</li>
        <li>· Estado del RUC y tipo de contribuyente</li>
        <li>· Actividad económica</li>
        <li>· Fecha en que se verificó</li>
      </ul>
      <p class="text-sm text-[#5c6b84] mt-3 leading-relaxed">
        Al aprobar una cuenta mayorista, su equipo ve estos datos sin tener que consultar el SRI
        a mano.
      </p>
    </div>
    <div class="card p-6">
      <p class="font-semibold mb-3">Cuidados incluidos</p>
      <ul class="text-sm text-[#94a3b8] space-y-1.5">
        <li>· Registro de cada intento bloqueado, con fecha, motivo, correo y RUC</li>
        <li>· Un RUC ya consultado no vuelve a descontar del paquete</li>
        <li>· Los bots no gastan consultas: solo se consulta tras el reCAPTCHA</li>
        <li>· Consultas disponibles visibles en el panel, con aviso cuando queden 100</li>
        <li>· Si la consulta no responde, el registro sigue protegido y la cuenta queda «por verificar»</li>
      </ul>
    </div>
  </div>
</section>

<!-- ══ 03 · clientes registrados ══ -->
<section id="registrados" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#94a3b8] mb-2">03 &middot; Opcional</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-3">Actualización de los clientes ya registrados</h2>
  <p class="text-[#94a3b8] mb-6 max-w-3xl leading-relaxed">
    Los clientes que ya tienen cuenta quedan con la razón social oficial del SRI, igual que los
    nuevos. Se hace una sola vez:
  </p>
  <div class="grid md:grid-cols-4 gap-3 mb-5">
    <?php foreach ([
      ['Respaldo', 'Copia de los datos actuales de todos los clientes.'],
      ['Consulta', 'Se verifica el RUC de cada cliente registrado.'],
      ['Excel de revisión', 'Razón social actual frente a la del SRI y estado de cada RUC.'],
      ['Actualización', 'Con su visto bueno, cada ficha queda con los datos del SRI.'],
    ] as $i => $p): ?>
      <div class="card p-5">
        <p class="mono text-xs text-[#e94560] mb-2"><?= str_pad($i+1,2,'0',STR_PAD_LEFT) ?></p>
        <p class="font-semibold mb-1.5"><?= $p[0] ?></p>
        <p class="text-sm text-[#94a3b8] leading-relaxed"><?= $p[1] ?></p>
      </div>
    <?php endforeach; ?>
  </div>
  <p class="text-sm text-[#5c6b84] max-w-3xl leading-relaxed">
    Incluye las consultas de todos los clientes. No se cambia ni se borra nada sin su
    aprobación: las cuentas con RUC inexistente o no activo quedan señaladas en el Excel para
    que usted decida qué hacer con ellas.
  </p>
</section>

<!-- ══ 04 · inversión ══ -->
<section id="inversion" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">04</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-7">Inversión</h2>

  <div class="card overflow-hidden mb-8">
    <table class="w-full text-left">
      <tbody class="divide-y divide-[#141d30]">
        <tr>
          <td class="px-6 py-5">
            <p class="font-semibold">a &middot; Verificación automática de RUC en el registro</p>
            <p class="text-sm text-[#94a3b8] mt-1">Complemento propio: razón social y estado del RUC en el registro, datos en la ficha del cliente, protección contra registros falsos, pruebas e instalación. <strong class="text-[#e8edf5]">Incluye las primeras 1.000 consultas.</strong></p>
          </td>
          <td class="px-6 py-5 text-right text-lg font-bold mono whitespace-nowrap">$&nbsp;150</td>
        </tr>
      </tbody>
      <tfoot class="bg-[#111a2c]">
        <tr>
          <td class="px-6 py-4 text-right font-semibold">Total</td>
          <td class="px-6 py-4 text-right text-xl font-extrabold mono whitespace-nowrap">$&nbsp;150</td>
        </tr>
        <tr>
          <td class="px-6 py-3 text-right text-sm text-[#94a3b8]">b &middot; Opcional: actualización de los clientes ya registrados</td>
          <td class="px-6 py-3 text-right mono text-[#94a3b8] whitespace-nowrap">+ $&nbsp;60</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <h3 class="text-base font-semibold mb-3 text-[#94a3b8]">Después de las primeras 1.000 consultas</h3>
  <div class="card p-6">
    <div class="grid sm:grid-cols-3 gap-5 mb-4">
      <div><p class="text-2xl font-extrabold mono">$&nbsp;10</p><p class="text-sm text-[#94a3b8]">paquete de 1.000 consultas adicionales</p></div>
      <div><p class="text-2xl font-extrabold mono">1&nbsp;centavo</p><p class="text-sm text-[#94a3b8]">por cada empresa verificada</p></div>
      <div><p class="text-2xl font-extrabold mono">$&nbsp;0</p><p class="text-sm text-[#94a3b8]">de mensualidad</p></div>
    </div>
    <p class="text-sm text-[#94a3b8] leading-relaxed">
      Las consultas no caducan y solo se descuentan las que responden bien. Cuando queden 100,
      le avisamos para renovar el paquete. Si llegaran a agotarse, el registro sigue protegido
      contra registros falsos: ninguna venta se detiene.
    </p>
  </div>
  <p class="text-sm text-[#5c6b84] mt-5">Todos los valores no incluyen IVA.</p>
</section>

<!-- ══ 05 · plazos ══ -->
<section id="plazos" class="anc py-12 border-t border-[#141d30]">
  <p class="mono text-xs text-[#e94560] mb-2">05</p>
  <h2 class="text-2xl md:text-3xl font-bold mb-6">Plazos y alcance</h2>
  <div class="grid sm:grid-cols-3 gap-4 mb-8">
    <?php foreach ([
      ['Día 0', 'Aprobación', 'Usted aprueba la proforma y realiza el pago.'],
      ['Días 1 a 5', 'Desarrollo', 'Protección del formulario, conexión con el servicio de consulta, ficha del cliente y pruebas.'],
      ['Día 5', 'Entrega', 'Instalado en la tienda y probado con RUC reales, activos y no activos.'],
    ] as $f): ?>
      <div class="card p-5">
        <p class="mono text-xs text-[#e94560] mb-2"><?= $f[0] ?></p>
        <p class="font-semibold mb-1.5"><?= $f[1] ?></p>
        <p class="text-sm text-[#94a3b8] leading-relaxed"><?= $f[2] ?></p>
      </div>
    <?php endforeach; ?>
  </div>

  <h3 class="text-lg font-semibold mb-3">No incluye</h3>
  <div class="grid sm:grid-cols-2 gap-3">
    <?php foreach ([
      'Paquetes de consultas adicionales a las 1.000 incluidas',
      'Verificación del RUC en el checkout para compras sin cuenta',
      'Nueva verificación automática y periódica de los clientes existentes',
      'Cambios de diseño del formulario de registro',
    ] as $i): ?>
      <div class="card p-4 flex gap-3 items-start">
        <span class="text-[#5c6b84] shrink-0">·</span>
        <span class="text-sm text-[#94a3b8]"><?= $i ?></span>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ══ cierre ══ -->
<section class="py-12 border-t border-[#141d30] pb-20">
  <div class="rounded-2xl bg-gradient-to-br from-[#e94560]/15 to-[#0e1626] border border-[#e94560]/30 p-8 md:p-10
              flex flex-col md:flex-row md:items-center justify-between gap-6">
    <div>
      <h2 class="text-2xl font-bold mb-2">¿Avanzamos?</h2>
      <p class="text-[#94a3b8]">Con su aprobación, lo entregamos en cinco días hábiles.</p>
    </div>
    <div class="flex flex-wrap gap-3 shrink-0">
      <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20le%20escribo%20de%20Multitecnolog%C3%ADa%20VYV.%20Revisamos%20la%20proforma%20de%20verificaci%C3%B3n%20de%20RUC."
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
  <p class="text-center text-xs text-[#3c4a63] pb-7 mono">PROFORMA <?= $PROFORMA ?> &middot; VALIDEZ 30 DÍAS</p>
</footer>

<script>
const secs=[...document.querySelectorAll('section[id]')];
const links=new Map([...document.querySelectorAll('.navlink')].map(a=>[a.getAttribute('href').slice(1),a]));
const obs=new IntersectionObserver(es=>{
  const vis=es.filter(e=>e.isIntersecting).sort((a,b)=>a.boundingClientRect.top-b.boundingClientRect.top)[0];
  if(!vis) return;
  const a=links.get(vis.target.id);
  if(a){links.forEach(l=>l.classList.remove('on'));a.classList.add('on');}
},{rootMargin:'-78px 0px -55% 0px'});
secs.forEach(s=>obs.observe(s));
</script>

</body>
</html>
