<?php
session_start();
if (empty($_SESSION['auth_mentis'])) { header('Location: login.php'); exit; }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Propuesta &middot; Mentis Psicología</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{fontFamily:{d:['Outfit','sans-serif'],s:['Inter','sans-serif']},
colors:{tinta:'#1b2a4e',suave:'#5a6683',azul:{50:'#eef3fb',100:'#dde7f7',500:'#2f63b8',600:'#1e4a96',700:'#183d7c'},crema:{50:'#fbf8f3',100:'#f5efe5',200:'#ebe1d0',500:'#a8875a'},verde:{50:'#eaf6ef',600:'#1f7a4d'},rojo:{50:'#fbefec',600:'#b4513f'}}}}}
</script>
<style>
html{scroll-behavior:smooth;-webkit-text-size-adjust:100%}
body{font-family:'Inter',sans-serif;background:#fbf8f3;color:#1b2a4e;overflow-x:hidden}
section{scroll-margin-top:64px}
.card{background:#fff;border:1px solid #ebe1d0;border-radius:20px;box-shadow:0 1px 2px rgba(27,42,78,.04)}
.eyebrow{font-family:'Outfit',sans-serif;font-size:12px;letter-spacing:.18em;text-transform:uppercase;font-weight:600}
.nav a.on{color:#1e4a96;background:#dde7f7}
.nav-scroll{scrollbar-width:none}.nav-scroll::-webkit-scrollbar{display:none}
.precio{font-family:'Outfit',sans-serif;font-weight:700;line-height:1;color:#1b2a4e}
.ico{width:48px;height:48px;border-radius:14px;display:grid;place-items:center;flex:none}
.ico svg{width:24px;height:24px}
.paso-n{width:30px;height:30px;border-radius:999px;background:#1e4a96;color:#fff;font-family:'Outfit';font-weight:700;display:grid;place-items:center;font-size:14px;flex:none}
.tel{width:270px;border-radius:38px;background:#1b2a4e;padding:10px;box-shadow:0 30px 60px -20px rgba(27,42,78,.45)}
.tel .pant{border-radius:30px;background:#fbf8f3;overflow:hidden}
</style>
</head>
<body class="antialiased text-[17px] pb-24 lg:pb-0">

<nav class="nav sticky top-0 z-50 border-b border-crema-200 bg-crema-50/95 backdrop-blur">
  <div class="max-w-6xl mx-auto px-4 sm:px-6">
    <div class="nav-scroll flex gap-1 overflow-x-auto py-2.5 text-[15px] font-medium">
      <a href="#resumen" class="px-3.5 py-2 rounded-lg text-suave hover:text-tinta whitespace-nowrap">Resumen</a>
      <a href="#sistema" class="px-3.5 py-2 rounded-lg text-suave hover:text-tinta whitespace-nowrap">El sistema</a>
      <a href="#web" class="px-3.5 py-2 rounded-lg text-suave hover:text-tinta whitespace-nowrap">La página web</a>
      <a href="#google" class="px-3.5 py-2 rounded-lg text-suave hover:text-tinta whitespace-nowrap">Aparecer en Google</a>
      <a href="#empezar" class="px-3.5 py-2 rounded-lg text-suave hover:text-tinta whitespace-nowrap">Cómo empezamos</a>
      <a href="#preguntas" class="px-3.5 py-2 rounded-lg text-suave hover:text-tinta whitespace-nowrap">Preguntas</a>
    </div>
  </div>
</nav>

<main class="max-w-6xl mx-auto px-4 sm:px-6">

<!-- ═════════ PORTADA + RESUMEN ═════════ -->
<section id="resumen" class="pt-8 sm:pt-12 pb-12">
  <div class="flex items-center gap-4 mb-7">
    <img src="/informes/assets/creativeweb-iso.png" alt="Creative Web" class="h-9 w-auto">
    <span class="font-d text-lg font-semibold text-tinta">creative web</span>
    <span class="w-px h-8 bg-crema-200"></span>
    <img src="logo-mentis.jpg" alt="Mentis Psicología" class="h-14 w-14 rounded-full border border-crema-200">
  </div>

  <p class="eyebrow text-crema-500 mb-3">Propuesta para Mentis Psicología &middot; octubre 2026</p>
  <h1 class="font-d text-[30px] leading-[1.15] sm:text-[44px] font-bold mb-4 max-w-3xl">Dos herramientas para que Mentis trabaje más ordenado y llegue a más pacientes</h1>
  <p class="text-suave text-lg max-w-2xl mb-8">Puede elegir una o las dos. Todos los valores son en dólares y <strong class="text-tinta">no incluyen IVA</strong>.</p>

  <div class="grid md:grid-cols-2 gap-4 sm:gap-5">
    <a href="#sistema" class="card p-6 sm:p-8 block hover:border-azul-500 transition">
      <div class="flex items-center gap-4 mb-4">
        <div class="ico bg-azul-50 text-azul-600"><svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="17" rx="3"/><path d="M3 9h18M8 2v4M16 2v4M8 13h3M8 17h6"/></svg></div>
        <div><p class="eyebrow text-azul-600">Para el equipo</p><p class="font-d text-2xl font-bold">El sistema</p></div>
      </div>
      <p class="text-suave mb-6">Un solo lugar para las <strong class="text-tinta">citas, las fichas de los pacientes, los cobros y las facturas</strong> de las dos sedes. Funciona en la computadora y en el celular, sin instalar nada.</p>
      <div class="flex items-end justify-between gap-4 border-t border-crema-200 pt-5">
        <div><p class="text-sm text-suave">Para dejarlo listo</p><p class="precio text-4xl">$1.200<span class="text-sm font-medium text-suave align-top ml-1">+ IVA</span></p></div>
        <div class="text-right"><p class="text-sm text-suave">Luego, cada mes</p><p class="precio text-2xl">$59 <span class="text-base font-normal text-suave">+ IVA por sede</span></p></div>
      </div>
    </a>
    <a href="#web" class="card p-6 sm:p-8 block hover:border-azul-500 transition">
      <div class="flex items-center gap-4 mb-4">
        <div class="ico bg-crema-100 text-crema-500"><svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.5 3 2.5 15 0 18M12 3c-2.5 3-2.5 15 0 18"/></svg></div>
        <div><p class="eyebrow text-crema-500">Para los pacientes</p><p class="font-d text-2xl font-bold">La página web</p></div>
      </div>
      <p class="text-suave mb-6">Su consultorio abierto en internet las 24 horas: los pacientes <strong class="text-tinta">conocen sus servicios, hacen un test, agendan su cita y compran un curso</strong> sin escribir a nadie.</p>
      <div class="flex items-end justify-between gap-4 border-t border-crema-200 pt-5">
        <div><p class="text-sm text-suave">Pago único</p><p class="precio text-4xl">$1.000<span class="text-sm font-medium text-suave align-top ml-1">+ IVA</span></p></div>
        <div class="text-right"><p class="text-sm text-suave">Desde el 2.º año</p><p class="precio text-2xl">$141,99 <span class="text-base font-normal text-suave">+ IVA al año</span></p></div>
      </div>
    </a>
  </div>
</section>

<!-- ═════════ EL SISTEMA ═════════ -->
<section id="sistema" class="py-12 sm:py-16 border-t border-crema-200">
  <p class="eyebrow text-azul-600 mb-2">Proforma 1-2-1333 &middot; El sistema</p>
  <h2 class="font-d text-[28px] sm:text-4xl font-bold leading-tight mb-3 max-w-3xl">Así sería un día en Mentis con el sistema</h2>
  <p class="text-suave text-lg max-w-2xl mb-8">Es el mismo programa que vio en la reunión, adaptado a la psicología y a sus dos sedes.</p>

  <div class="grid sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-10">
    <div class="card p-5">
      <div class="flex items-center gap-3 mb-3"><span class="paso-n">1</span><p class="font-d font-semibold text-lg leading-tight">El paciente agenda</p></div>
      <p class="text-[15px] text-suave">Por la página web o en recepción. La cita aparece en la agenda de su psicóloga.</p>
    </div>
    <div class="card p-5">
      <div class="flex items-center gap-3 mb-3"><span class="paso-n">2</span><p class="font-d font-semibold text-lg leading-tight">Le llega un recordatorio</p></div>
      <p class="text-[15px] text-suave">Antes de la cita recibe un WhatsApp automático y confirma con un clic. Menos citas perdidas.</p>
    </div>
    <div class="card p-5">
      <div class="flex items-center gap-3 mb-3"><span class="paso-n">3</span><p class="font-d font-semibold text-lg leading-tight">La psicóloga abre su ficha</p></div>
      <p class="text-[15px] text-suave">Ve el historial completo y escribe las notas de la sesión. Nada se pierde en cuadernos.</p>
    </div>
    <div class="card p-5">
      <div class="flex items-center gap-3 mb-3"><span class="paso-n">4</span><p class="font-d font-semibold text-lg leading-tight">Recepción cobra</p></div>
      <p class="text-[15px] text-suave">Registra el pago y la factura electrónica sale en un clic, con el RUC de esa sede.</p>
    </div>
    <div class="card p-5 border-azul-500/40">
      <div class="flex items-center gap-3 mb-3"><span class="paso-n">5</span><p class="font-d font-semibold text-lg leading-tight">Usted ve los números</p></div>
      <p class="text-[15px] text-suave">Cuánto ingresó Quito y cuánto Ibarra, por separado. Cada sede ve solo lo suyo.</p>
    </div>
  </div>

  <!-- Antes / después -->
  <div class="grid md:grid-cols-2 gap-4 mb-10">
    <div class="card p-6 sm:p-7 bg-rojo-50/40">
      <p class="font-d text-xl font-bold mb-4 text-rojo-600">Sin sistema</p>
      <ul class="space-y-3 text-[16px]">
        <li class="flex gap-3"><span class="text-rojo-600 font-bold">✕</span>Las citas se coordinan una por una por WhatsApp.</li>
        <li class="flex gap-3"><span class="text-rojo-600 font-bold">✕</span>Recordar a cada paciente depende de que alguien lo haga.</li>
        <li class="flex gap-3"><span class="text-rojo-600 font-bold">✕</span>Las notas y los saldos quedan repartidos en papeles y archivos.</li>
        <li class="flex gap-3"><span class="text-rojo-600 font-bold">✕</span>Separar lo que factura cada sede es trabajo manual.</li>
      </ul>
    </div>
    <div class="card p-6 sm:p-7 bg-verde-50/50">
      <p class="font-d text-xl font-bold mb-4 text-verde-600">Con el sistema</p>
      <ul class="space-y-3 text-[16px]">
        <li class="flex gap-3"><span class="text-verde-600 font-bold">✓</span>Cada psicóloga tiene su agenda, con feriados y vacaciones marcados.</li>
        <li class="flex gap-3"><span class="text-verde-600 font-bold">✓</span>Los recordatorios salen solos por WhatsApp.</li>
        <li class="flex gap-3"><span class="text-verde-600 font-bold">✓</span>Cada paciente tiene su ficha y lo que debe, siempre al día.</li>
        <li class="flex gap-3"><span class="text-verde-600 font-bold">✓</span>Cada sede factura con su propio RUC, sin límite de facturas.</li>
      </ul>
    </div>
  </div>

  <!-- Ficha -->
  <div class="card p-6 sm:p-8 mb-10 lg:grid lg:grid-cols-5 lg:gap-8 lg:items-center">
    <div class="lg:col-span-2 mb-5 lg:mb-0">
      <p class="eyebrow text-azul-600 mb-2">Hecha para psicología</p>
      <p class="font-d text-2xl font-bold mb-2">La ficha de cada paciente</p>
      <p class="text-suave text-[16px]">La diseñamos con ustedes en una reunión, a partir de la ficha que usan hoy.</p>
    </div>
    <div class="lg:col-span-3 grid grid-cols-2 gap-2.5 text-[15px]">
      <div class="rounded-xl bg-azul-50 px-4 py-3">Motivo de consulta</div>
      <div class="rounded-xl bg-azul-50 px-4 py-3">Historia personal y familiar</div>
      <div class="rounded-xl bg-azul-50 px-4 py-3">Evaluación del estado mental</div>
      <div class="rounded-xl bg-azul-50 px-4 py-3">Diagnóstico</div>
      <div class="rounded-xl bg-azul-50 px-4 py-3">Plan de terapia</div>
      <div class="rounded-xl bg-azul-50 px-4 py-3">Notas de cada sesión</div>
    </div>
  </div>

  <!-- Precio sistema -->
  <div class="grid md:grid-cols-2 gap-4">
    <div class="card p-6 sm:p-8">
      <p class="text-suave">Para dejarlo listo · <strong class="text-tinta">se paga una vez</strong></p>
      <p class="precio text-5xl mt-2 mb-4">$1.200<span class="text-sm font-medium text-suave align-top ml-1">+ IVA</span></p>
      <ul class="space-y-2 text-[15px] text-suave">
        <li>✓ Adaptarlo a psicología y a sus dos sedes</li>
        <li>✓ Pasar sus pacientes actuales al sistema</li>
        <li>✓ Enseñar a usarlo a todo el equipo</li>
        <li>✓ Se paga 60 % al empezar ($720) y 40 % al entregar ($480)</li>
      </ul>
    </div>
    <div class="card p-6 sm:p-8">
      <p class="text-suave">Para usarlo · <strong class="text-tinta">cada mes</strong></p>
      <p class="precio text-5xl mt-2 mb-1">$59 <span class="text-xl font-normal text-suave">+ IVA por sede</span></p>
      <p class="text-suave mb-4">Quito + Ibarra = <strong class="text-tinta">$118 + IVA al mes</strong>, desde la entrega.</p>
      <ul class="space-y-2 text-[15px] text-suave">
        <li>✓ Psicólogas y pacientes sin límite</li>
        <li>✓ Facturas electrónicas sin límite</li>
        <li>✓ Sus datos guardados y respaldados en internet</li>
        <li>✓ Soporte cuando lo necesiten</li>
      </ul>
    </div>
  </div>
  <p class="text-sm text-suave mt-4 max-w-3xl">Aparte, y no lo cobramos nosotros: los mensajes de WhatsApp tienen un costo de Meta de aprox. $0,01 cada uno, y cada sede necesita su firma electrónica para facturar. La ficha se diseña una vez; los cambios que se pidan después de aprobada se cobran por hora.</p>
</section>

<!-- ═════════ LA WEB ═════════ -->
<section id="web" class="py-12 sm:py-16 border-t border-crema-200">
  <p class="eyebrow text-crema-500 mb-2">Proforma 1-2-1334 &middot; La página web</p>
  <h2 class="font-d text-[28px] sm:text-4xl font-bold leading-tight mb-3 max-w-3xl">Tienen 14 mil seguidores en Instagram, pero ningún lugar donde puedan agendar solos</h2>
  <p class="text-suave text-lg max-w-2xl mb-10">La página web es ese lugar. Esto es lo que podrá hacer quien la visite:</p>

  <div class="lg:grid lg:grid-cols-12 lg:gap-12 lg:items-center">
    <!-- Celular -->
    <div class="lg:col-span-5 flex justify-center mb-10 lg:mb-0">
      <div class="tel">
        <div class="pant">
          <div class="px-5 pt-5 pb-3 flex items-center justify-between border-b border-crema-200">
            <img src="logo-mentis.jpg" alt="" class="h-9 w-9 rounded-full">
            <span class="text-[11px] text-suave">Quito · Ibarra</span>
          </div>
          <div class="px-5 py-5">
            <p class="font-d font-bold text-[19px] leading-tight mb-2">Te acompañamos a sentirte mejor</p>
            <p class="text-[12px] text-suave mb-4">Terapia para niños, adolescentes, adultos, parejas y familias.</p>
            <div class="rounded-xl bg-azul-600 text-white text-center text-[13px] font-semibold py-2.5 mb-2">Agendar cita</div>
            <div class="rounded-xl border border-azul-600 text-azul-600 text-center text-[13px] font-semibold py-2.5 mb-4">Hacer un test gratis</div>
            <div class="rounded-xl bg-white border border-crema-200 p-3 mb-2">
              <p class="text-[11px] text-crema-500 font-semibold uppercase tracking-wider">Taller</p>
              <p class="text-[13px] font-semibold">Manejo de la ansiedad</p>
              <p class="text-[11px] text-suave">Inscríbete y paga aquí</p>
            </div>
            <div class="rounded-xl bg-white border border-crema-200 p-3">
              <p class="text-[11px] text-crema-500 font-semibold uppercase tracking-wider">Test</p>
              <p class="text-[13px] font-semibold">¿Cómo está tu nivel de estrés?</p>
              <p class="text-[11px] text-suave">Gratis</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Qué puede hacer -->
    <div class="lg:col-span-7 space-y-4">
      <div class="card p-5 sm:p-6 flex gap-4">
        <div class="ico bg-azul-50 text-azul-600"><svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="17" rx="3"/><path d="M3 9h18M8 2v4M16 2v4M9 15l2 2 4-4"/></svg></div>
        <div><p class="font-d font-semibold text-lg">Agendar su cita</p><p class="text-[15px] text-suave">Elige sede, psicóloga y horario. La cita entra directo a la agenda del sistema.</p></div>
      </div>
      <div class="card p-5 sm:p-6 flex gap-4">
        <div class="ico bg-azul-50 text-azul-600"><svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M9 5h10M9 12h10M9 19h10"/><path d="M4 5l1 1 2-2M4 12l1 1 2-2M4 19l1 1 2-2"/></svg></div>
        <div><p class="font-d font-semibold text-lg">Hacer un test gratis</p><p class="text-[15px] text-suave">Hasta 3 tests (por ejemplo, estrés o ansiedad). Deja su nombre y WhatsApp, el resultado les llega a ustedes y ve el botón para agendar.</p></div>
      </div>
      <div class="card p-5 sm:p-6 flex gap-4">
        <div class="ico bg-crema-100 text-crema-500"><svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><rect x="2" y="6" width="20" height="13" rx="2.5"/><path d="M2 10h20M6 15h4"/></svg></div>
        <div><p class="font-d font-semibold text-lg">Inscribirse y pagar un curso</p><p class="text-[15px] text-suave">Cada taller con su página: fecha, temas y quién lo dicta. Paga con tarjeta y recibe la confirmación por correo.</p></div>
      </div>
      <div class="card p-5 sm:p-6 flex gap-4">
        <div class="ico bg-crema-100 text-crema-500"><svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M12 21s-7-6.1-7-11a7 7 0 1 1 14 0c0 4.9-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg></div>
        <div><p class="font-d font-semibold text-lg">Conocerlos y encontrarlos</p><p class="text-[15px] text-suave">Servicios, equipo, testimonios y las dos sedes con su mapa y WhatsApp. Se ve bien en el celular.</p></div>
      </div>
    </div>
  </div>

  <!-- Precio web -->
  <div class="card p-6 sm:p-8 mt-10">
    <div class="lg:grid lg:grid-cols-2 lg:gap-10">
      <div class="mb-6 lg:mb-0">
        <p class="text-suave">La página web · <strong class="text-tinta">pago único</strong></p>
        <p class="precio text-5xl mt-2 mb-5">$1.000<span class="text-sm font-medium text-suave align-top ml-1">+ IVA</span></p>
        <div class="space-y-2.5 text-[16px]">
          <div class="flex justify-between gap-4 border-b border-crema-200 pb-2.5"><span>Página web completa</span><strong>$500 + IVA</strong></div>
          <div class="flex justify-between gap-4 border-b border-crema-200 pb-2.5"><span>Tests gratuitos en línea</span><strong>$200 + IVA</strong></div>
          <div class="flex justify-between gap-4"><span>Cursos con pago en línea</span><strong>$300 + IVA</strong></div>
        </div>
        <p class="text-sm text-suave mt-4">Se paga 60 % al empezar ($600) y 40 % al entregar ($400).</p>
      </div>
      <div class="rounded-2xl bg-crema-50 border border-crema-200 p-5 sm:p-6">
        <p class="font-d font-semibold text-lg mb-3">El primer año ya está incluido</p>
        <ul class="space-y-3 text-[15px]">
          <li><strong>El dominio:</strong> <span class="text-suave">la dirección de su página. Proponemos <strong class="text-tinta whitespace-nowrap">mentispsicologiaecuador.com</strong>, igual a su Instagram.</span></li>
          <li><strong>El hosting:</strong> <span class="text-suave">el espacio en internet donde vive la página, encendido las 24 horas.</span></li>
          <li><strong>Correos con su nombre,</strong> <span class="text-suave">como citas@mentispsicologiaecuador.com.</span></li>
        </ul>
        <div class="mt-4 pt-4 border-t border-crema-200 text-[15px]">
          <p class="font-semibold mb-2">Desde el segundo año, cada año:</p>
          <div class="flex justify-between gap-4"><span class="text-suave">Hosting y correos corporativos</span><strong>$120,00 + IVA</strong></div>
          <div class="flex justify-between gap-4 mt-1"><span class="text-suave">Dominio</span><strong>$21,99 + IVA</strong></div>
          <div class="flex justify-between gap-4 mt-2 pt-2 border-t border-crema-200"><span class="font-semibold">Total al año</span><strong>$141,99 + IVA</strong></div>
          <p class="text-suave text-sm mt-2">Menos de $12 al mes por mantener la página, la dirección y los correos.</p>
        </div>
      </div>
    </div>
  </div>
  <p class="text-sm text-suave mt-4 max-w-3xl">La pasarela de pago cobra una pequeña comisión por cada curso vendido. Los tests orientan, no reemplazan una evaluación profesional, y así se indica en la página. No incluye fotos, videos ni manejo de redes sociales.</p>
</section>

<!-- ═════════ GOOGLE ═════════ -->
<section id="google" class="py-12 sm:py-16 border-t border-crema-200">
  <div class="lg:grid lg:grid-cols-12 lg:gap-12 lg:items-center">
    <div class="lg:col-span-6 mb-8 lg:mb-0">
      <p class="eyebrow text-crema-500 mb-2">Opcional &middot; cuando la web esté lista</p>
      <h2 class="font-d text-[28px] sm:text-4xl font-bold leading-tight mb-4">Aparecer cuando alguien busca «psicólogo en Quito»</h2>
      <p class="text-suave text-lg mb-5">La página ya sale preparada para Google. Para subir más rápido, publicamos artículos que responden lo que la gente busca, cada uno con el botón de agendar.</p>
      <div class="space-y-2 text-[15px]">
        <p class="rounded-xl bg-white border border-crema-200 px-4 py-2.5">🔎 ¿Cómo saber si necesito terapia?</p>
        <p class="rounded-xl bg-white border border-crema-200 px-4 py-2.5">🔎 Terapia de pareja en Ibarra</p>
        <p class="rounded-xl bg-white border border-crema-200 px-4 py-2.5">🔎 Señales de ansiedad en niños</p>
      </div>
    </div>
    <div class="lg:col-span-6">
      <div class="card p-6 sm:p-8">
        <p class="font-d text-xl font-bold mb-1">Plan de 6 meses</p>
        <p class="text-suave text-[15px] mb-5">20 artículos al mes, 120 en total · un informe y una reunión cada mes para ver el avance</p>
        <div class="grid grid-cols-2 gap-3">
          <div class="rounded-2xl bg-azul-50 p-5"><p class="text-sm text-suave">Un solo pago</p><p class="precio text-4xl mt-1">$600<span class="text-sm font-medium text-suave align-top ml-1">+ IVA</span></p></div>
          <div class="rounded-2xl bg-crema-50 border border-crema-200 p-5"><p class="text-sm text-suave">Mes a mes</p><p class="precio text-4xl mt-1">$150<span class="text-sm font-medium text-suave align-top ml-1">+ IVA</span></p><p class="text-xs text-suave mt-1">al mes · $900 en total</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═════════ CÓMO EMPEZAMOS ═════════ -->
<section id="empezar" class="py-12 sm:py-16 border-t border-crema-200">
  <p class="eyebrow text-azul-600 mb-2">Cómo empezamos</p>
  <h2 class="font-d text-[28px] sm:text-4xl font-bold leading-tight mb-8">De la aprobación a funcionar</h2>
  <div class="grid md:grid-cols-2 gap-4 mb-6">
    <div class="card p-6 sm:p-7">
      <p class="font-d font-bold text-xl mb-1">El sistema</p>
      <p class="text-azul-600 font-semibold mb-4">3 a 4 semanas</p>
      <ol class="space-y-3 text-[16px]">
        <li class="flex gap-3"><span class="paso-n">1</span>Reunión para diseñar la ficha</li>
        <li class="flex gap-3"><span class="paso-n">2</span>Lo adaptamos y configuramos las dos sedes</li>
        <li class="flex gap-3"><span class="paso-n">3</span>Pasamos sus pacientes y probamos las facturas</li>
        <li class="flex gap-3"><span class="paso-n">4</span>Capacitamos al equipo y lo entregamos</li>
      </ol>
    </div>
    <div class="card p-6 sm:p-7">
      <p class="font-d font-bold text-xl mb-1">La página web</p>
      <p class="text-crema-500 font-semibold mb-4">4 a 5 semanas</p>
      <ol class="space-y-3 text-[16px]">
        <li class="flex gap-3"><span class="paso-n">1</span>Aprueban el diseño</li>
        <li class="flex gap-3"><span class="paso-n">2</span>Armamos las páginas, los tests y los cursos</li>
        <li class="flex gap-3"><span class="paso-n">3</span>La conectamos con la agenda y el pago con tarjeta</li>
        <li class="flex gap-3"><span class="paso-n">4</span>La publicamos y la damos de alta en Google</li>
      </ol>
    </div>
  </div>
  <div class="card p-6 sm:p-7">
    <p class="font-d font-bold text-lg mb-4">Lo que necesitamos de ustedes</p>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-3 text-[16px]">
      <p>📋 La ficha que usan hoy</p>
      <p>👥 Las psicólogas y tarifas de cada sede</p>
      <p>🧾 RUC y firma electrónica de cada sede</p>
      <p>📸 Fotos del equipo y de las sedes</p>
      <p>📝 Los tests que quieren publicar</p>
      <p>🎓 Sus cursos y talleres con precios</p>
    </div>
  </div>
</section>

<!-- ═════════ PREGUNTAS ═════════ -->
<section id="preguntas" class="py-12 sm:py-16 border-t border-crema-200">
  <p class="eyebrow text-azul-600 mb-2">Preguntas frecuentes</p>
  <h2 class="font-d text-[28px] sm:text-4xl font-bold leading-tight mb-8">Lo que suelen preguntarnos</h2>
  <div class="grid md:grid-cols-2 gap-4">
    <div class="card p-6"><p class="font-d font-semibold text-lg mb-2">¿Hay que instalar algo?</p><p class="text-suave text-[16px]">No. Se abre desde el navegador de la computadora, la tablet o el celular, con usuario y contraseña.</p></div>
    <div class="card p-6"><p class="font-d font-semibold text-lg mb-2">¿Puedo contratar solo una de las dos?</p><p class="text-suave text-[16px]">Sí. Son independientes. Si tienen las dos, la página agenda directo en el sistema.</p></div>
    <div class="card p-6"><p class="font-d font-semibold text-lg mb-2">¿Una sede ve el dinero de la otra?</p><p class="text-suave text-[16px]">No. Cada sede ve solo sus ingresos y sus cobros. Usted, como propietaria, ve las dos por separado.</p></div>
    <div class="card p-6"><p class="font-d font-semibold text-lg mb-2">¿Quiénes están detrás?</p><p class="text-suave text-[16px]">Creative Web, de Otavalo. Hicimos DentiLab (el sistema que vio), Quipuy (facturación electrónica) y más de 60 páginas web en Ecuador.</p></div>
  </div>
</section>

<!-- ═════════ DESCARGAS (escritorio) ═════════ -->
<section id="descargas" class="py-10 border-t border-crema-200 hidden lg:block">
  <div class="flex flex-wrap gap-3">
    <a href="pdf/proforma-1-2-1333-sistema.pdf" download="Proforma-1-2-1333-Sistema-Mentis.pdf" class="px-6 py-3.5 rounded-xl bg-azul-600 hover:bg-azul-700 text-white font-d font-semibold transition">Proforma del sistema (PDF)</a>
    <a href="pdf/proforma-1-2-1334-web.pdf" download="Proforma-1-2-1334-Web-Mentis.pdf" class="px-6 py-3.5 rounded-xl border border-azul-600 text-azul-600 hover:bg-azul-50 font-d font-semibold transition">Proforma de la web (PDF)</a>
    <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20revis%C3%A9%20la%20propuesta%20de%20Mentis%20Psicolog%C3%ADa." class="px-6 py-3.5 rounded-xl border border-crema-200 bg-white hover:bg-crema-100 font-d font-semibold transition">Escribir por WhatsApp</a>
  </div>
</section>

<footer class="py-8 border-t border-crema-200 text-sm text-suave">
  <p>Ing. Santiago Oña Sánchez &middot; Creative Web &middot; 099 917 4980 &middot; info@creativeweb.com.ec</p>
  <div class="flex items-center gap-3 mt-3">
    <img src="/informes/assets/creativeweb-iso.png" alt="Creative Web" class="h-6 w-auto">
    <p>Otavalo, Ecuador &middot; octubre de 2026 &middot; <a href="logout.php" class="hover:text-tinta underline">Salir</a></p>
  </div>
</footer>
</main>

<!-- Barra fija en celular -->
<div class="lg:hidden fixed bottom-0 inset-x-0 z-50 border-t border-crema-200 bg-white/95 backdrop-blur px-3 py-3" style="padding-bottom:max(12px,env(safe-area-inset-bottom))">
  <div class="grid grid-cols-3 gap-2 text-[14px] font-d font-semibold">
    <a href="pdf/proforma-1-2-1333-sistema.pdf" download="Proforma-1-2-1333-Sistema-Mentis.pdf" class="text-center py-3 rounded-xl border border-crema-200 text-tinta">PDF sistema</a>
    <a href="pdf/proforma-1-2-1334-web.pdf" download="Proforma-1-2-1334-Web-Mentis.pdf" class="text-center py-3 rounded-xl border border-crema-200 text-tinta">PDF web</a>
    <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20revis%C3%A9%20la%20propuesta%20de%20Mentis%20Psicolog%C3%ADa." class="text-center py-3 rounded-xl bg-azul-600 text-white">WhatsApp</a>
  </div>
</div>

<script>
const secs=[...document.querySelectorAll('section')];
const links=new Map([...document.querySelectorAll('.nav a')].map(a=>[a.getAttribute('href').slice(1),a]));
const obs=new IntersectionObserver(es=>{
  const vis=es.filter(e=>e.isIntersecting).sort((a,b)=>a.boundingClientRect.top-b.boundingClientRect.top)[0];
  if(!vis) return;
  const a=links.get(vis.target.id);
  if(a){links.forEach(l=>l.classList.remove('on'));a.classList.add('on');a.parentElement.scrollTo({left:a.offsetLeft-40,behavior:'smooth'});}
},{rootMargin:'-64px 0px -55% 0px'});
secs.forEach(s=>obs.observe(s));
</script>
</body>
</html>
