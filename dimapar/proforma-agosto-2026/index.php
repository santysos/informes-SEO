<?php
session_start();
if (empty($_SESSION['auth_dimapar_prop'])) {
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
<title>Sitio web Besser + Plan SEO &mdash; Dimapar Ecuador</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<script>
tailwind.config={theme:{extend:{
  fontFamily:{sans:['Outfit','system-ui','sans-serif'],mono:['JetBrains Mono','monospace']},
  colors:{cyan2:{400:'#22d3ee',500:'#06b6d4',600:'#0891b2'}}
}}}
</script>
<style>
body{background:radial-gradient(1100px 720px at 25% 0%, rgba(6,182,212,.14), transparent 60%), #0a0f16;}
.glass{background:rgba(17,26,36,.55);backdrop-filter:blur(18px)}
.tachado{position:relative;color:#64748b}
.tachado::after{content:'';position:absolute;left:-4%;right:-4%;top:52%;height:2px;background:#ef4444;transform:rotate(-8deg)}
</style>
</head>
<body class="text-slate-200 font-sans antialiased">

<div class="max-w-4xl mx-auto px-5 py-12">

  <!-- Cabecera -->
  <div class="flex items-start justify-between gap-4 mb-10">
    <div>
      <p class="font-mono text-[10.5px] tracking-[.2em] uppercase text-cyan2-400 mb-2">Creative Web &middot; Propuesta</p>
      <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight">Sitio web para Besser<br>y plan de posicionamiento para Dimapar</h1>
      <p class="text-slate-400 mt-3 text-sm">Preparado para <strong class="text-slate-300">Dimapar Ecuador</strong> &middot; agosto de 2026</p>
    </div>
    <a href="logout.php" class="text-xs text-slate-500 hover:text-slate-300 whitespace-nowrap mt-2">Salir</a>
  </div>

  <!-- Resumen -->
  <div class="rounded-xl border border-cyan2-500/30 bg-cyan2-500/5 p-6 mb-10">
    <p class="text-sm text-slate-300 leading-relaxed">Esta propuesta cubre dos cosas distintas que se complementan:</p>
    <div class="grid md:grid-cols-2 gap-4 mt-4">
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="font-mono text-[10px] tracking-widest uppercase text-cyan2-400 mb-2">Parte 1</p>
        <p class="text-white font-semibold mb-1">Un sitio web para Besser</p>
        <p class="text-sm text-slate-400 leading-relaxed">Una sola página, informativa, con toda la marca y las formas de contacto. Hoy Besser no existe en internet.</p>
      </div>
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="font-mono text-[10px] tracking-widest uppercase text-cyan2-400 mb-2">Parte 2</p>
        <p class="text-white font-semibold mb-1">Posicionar dimaparecuador.com</p>
        <p class="text-sm text-slate-400 leading-relaxed">Trabajo de seis meses para que la gente los encuentre en Google buscando lo que venden, no solo su nombre.</p>
      </div>
    </div>
  </div>

  <!-- ══════════ DIAGNÓSTICO ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-2">Dónde están hoy</h2>
  <p class="text-sm text-slate-400 mb-6">Todo lo que sigue son datos reales de su sitio, tomados de Google entre el 27 de mayo y el 24 de agosto de 2026.</p>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
    <div class="rounded-xl border border-slate-800/50 glass p-5">
      <p class="text-[10px] font-mono uppercase tracking-wider text-slate-500 mb-1">Veces que aparecieron</p>
      <p class="text-3xl font-bold text-white">5.967</p>
      <p class="text-xs text-slate-500 mt-1">en 3 meses</p>
    </div>
    <div class="rounded-xl border border-slate-800/50 glass p-5">
      <p class="text-[10px] font-mono uppercase tracking-wider text-slate-500 mb-1">Visitas desde Google</p>
      <p class="text-3xl font-bold text-white">189</p>
      <p class="text-xs text-slate-500 mt-1">2 por día</p>
    </div>
    <div class="rounded-xl border border-slate-800/50 glass p-5">
      <p class="text-[10px] font-mono uppercase tracking-wider text-slate-500 mb-1">Buscan «dimapar»</p>
      <p class="text-3xl font-bold text-amber-400">45 %</p>
      <p class="text-xs text-slate-500 mt-1">ya los conocían</p>
    </div>
    <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-5">
      <p class="text-[10px] font-mono uppercase tracking-wider text-red-400 mb-1">Buscan «besser»</p>
      <p class="text-3xl font-bold text-white">2</p>
      <p class="text-xs text-slate-500 mt-1">veces · 0 visitas</p>
    </div>
  </div>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
    <h3 class="text-lg font-semibold text-white mb-3">Qué significan esos números</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Google mostró su sitio <strong class="text-white">5.967 veces</strong> en tres meses. Para que se haga una idea: eso es aparecer unas 66 veces al día en todo el Ecuador, para una empresa que vende equipamiento a talleres, llanteras y vulcanizadoras de todo el país. Es muy poco.</p>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">De las visitas que llegaron, <strong class="text-amber-400">casi la mitad son de gente que escribió «dimapar» en Google</strong>. Es decir, ya los conocían y solo buscaban su página. Eso está bien, pero significa que <strong class="text-white">el sitio casi no les está trayendo clientes nuevos</strong>: quien no conoce el nombre no los encuentra.</p>
    <div class="rounded-lg border border-red-500/30 bg-red-500/5 p-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-red-400">Y sobre Besser:</strong> en tres meses la palabra «besser» apareció <strong class="text-white">2 veces</strong> en Google asociada a su sitio, y nadie hizo clic. Siendo una marca propia, hoy es prácticamente invisible en internet.</p>
    </div>
  </div>

  <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-3">El problema de fondo: venden productos sueltos, no categorías</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Al revisar qué páginas reciben las visitas, aparece un patrón claro:</p>
    <div class="overflow-x-auto mb-4">
      <table class="w-full text-sm">
        <thead>
          <tr class="text-[11px] text-slate-500 uppercase tracking-wider border-b border-slate-800">
            <th class="text-left py-2">Tipo de página</th>
            <th class="text-right py-2">Cuántas hay</th>
            <th class="text-right py-2">Visitas que traen</th>
          </tr>
        </thead>
        <tbody class="text-slate-300">
          <tr class="border-b border-slate-800/50"><td class="py-2">Fichas de producto individual</td><td class="text-right">134</td><td class="text-right text-emerald-400 font-semibold">121</td></tr>
          <tr><td class="py-2">Páginas de categoría <span class="text-xs text-slate-500">(«balanceadoras», «elevadores»…)</span></td><td class="text-right">88</td><td class="text-right text-red-400 font-semibold">9</td></tr>
        </tbody>
      </table>
    </div>
    <p class="text-sm text-slate-300 leading-relaxed mb-3">Las páginas de categoría son 88 y entre todas traen <strong class="text-white">9 visitas</strong> en tres meses. Eso es un problema, porque <strong class="text-white">así es como busca la gente que todavía no sabe qué marca quiere</strong>.</p>
    <p class="text-sm text-slate-400 leading-relaxed">Un dueño de llantera no escribe en Google «Balanceadora B2P Besser». Escribe <em class="text-slate-300">«balanceadora de llantas precio Ecuador»</em>. Si esa búsqueda no los encuentra, ese cliente se lo lleva otro — y ese es exactamente el tipo de cliente nuevo que hoy no está llegando.</p>
  </div>

  <!-- ══════════ PARTE 1: BESSER ══════════ -->
  <div class="rounded-xl border border-cyan2-500/30 bg-gradient-to-br from-cyan2-500/10 to-transparent p-6 mb-6">
    <p class="font-mono text-[10px] tracking-widest uppercase text-cyan2-400 mb-2">Parte 1</p>
    <h2 class="text-2xl font-bold text-white mb-2">Sitio web para Besser</h2>
    <p class="text-sm text-slate-400">Una página informativa de empresa, pensada para que quien llegue entienda qué es Besser y sepa cómo contactarlos.</p>
  </div>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
    <h3 class="text-lg font-semibold text-white mb-4">Qué es un sitio de una sola página</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Es un sitio donde toda la información está en una misma página y el visitante va bajando por secciones, en lugar de tener que entrar y salir de páginas distintas. El menú de arriba no lleva a otras páginas: lo lleva directo a la sección que le interesa.</p>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Funciona muy bien para presentar una marca porque <strong class="text-white">el visitante recibe todo el mensaje en orden</strong>, sin perderse, y llega al contacto habiendo visto lo importante. Además carga rápido y se ve bien en el celular, que es donde la mayoría va a abrirlo.</p>
    <p class="text-sm text-slate-400 leading-relaxed">No es una «página de aterrizaje» de publicidad, que suele tener un solo mensaje y un botón. Es un <strong class="text-slate-300">sitio web de empresa</strong> completo, solo que resuelto en una página.</p>
  </div>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
    <h3 class="text-lg font-semibold text-white mb-4">Las secciones que va a tener</h3>
    <div class="space-y-3 text-sm text-slate-300">
      <div class="flex gap-3"><span class="font-mono text-cyan2-400 text-xs mt-1">01</span><div><strong class="text-white">Portada</strong> — el nombre Besser, qué es y a quién sirve, con un botón de contacto siempre visible.</div></div>
      <div class="flex gap-3"><span class="font-mono text-cyan2-400 text-xs mt-1">02</span><div><strong class="text-white">Quiénes somos</strong> — la historia de la marca y su respaldo. Aquí es donde se construye confianza con un comprador que no los conoce.</div></div>
      <div class="flex gap-3"><span class="font-mono text-cyan2-400 text-xs mt-1">03</span><div><strong class="text-white">Qué ofrecemos</strong> — las líneas de equipos, explicadas para que se entiendan sin ser técnico.</div></div>
      <div class="flex gap-3"><span class="font-mono text-cyan2-400 text-xs mt-1">04</span><div><strong class="text-white">Por qué Besser</strong> — respaldo, repuestos, servicio técnico, garantía. Lo que diferencia comprar aquí y no importar por cuenta propia.</div></div>
      <div class="flex gap-3"><span class="font-mono text-cyan2-400 text-xs mt-1">05</span><div><strong class="text-white">A quiénes servimos</strong> — talleres, llanteras, vulcanizadoras. Que cada uno se reconozca al entrar.</div></div>
      <div class="flex gap-3"><span class="font-mono text-cyan2-400 text-xs mt-1">06</span><div><strong class="text-white">Preguntas frecuentes</strong> — las que hoy les hacen por teléfono. Responderlas ahí ahorra llamadas y genera confianza.</div></div>
      <div class="flex gap-3"><span class="font-mono text-cyan2-400 text-xs mt-1">07</span><div><strong class="text-white">Contacto</strong> — formulario, WhatsApp con mensaje ya escrito, teléfono, correo, dirección y mapa.</div></div>
    </div>
    <p class="text-xs text-slate-500 mt-5 leading-relaxed">Las secciones se ajustan según lo que nos cuenten de la marca. Este es el esquema base.</p>
  </div>

  <div class="grid md:grid-cols-2 gap-4 mb-10">
    <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-5">
      <h4 class="text-sm font-semibold text-emerald-400 mb-3">Incluye</h4>
      <ul class="space-y-2 text-sm text-slate-300">
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Diseño propio, no una plantilla comprada</div></li>
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Redacción de todos los textos</div></li>
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Se ve bien en celular, tablet y computadora</div></li>
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Formulario de contacto que llega a su correo</div></li>
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Botón de WhatsApp con el mensaje ya escrito</div></li>
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Dominio propio y alojamiento por 12 meses</div></li>
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Certificado de seguridad (el candado del navegador)</div></li>
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Configuración inicial para Google</div></li>
        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Medición de visitas y de contactos recibidos</div></li>
      </ul>
    </div>
    <div class="rounded-xl border border-slate-700/50 bg-slate-900/30 p-5">
      <h4 class="text-sm font-semibold text-slate-400 mb-3">No incluye</h4>
      <ul class="space-y-2 text-sm text-slate-400">
        <li class="flex gap-2"><span class="text-slate-600">·</span><div>Tienda en línea ni carrito de compras</div></li>
        <li class="flex gap-2"><span class="text-slate-600">·</span><div>Catálogo de productos con buscador y filtros</div></li>
        <li class="flex gap-2"><span class="text-slate-600">·</span><div>Fotografía de producto ni sesión de fotos</div></li>
        <li class="flex gap-2"><span class="text-slate-600">·</span><div>Diseño de logotipo o manual de marca</div></li>
        <li class="flex gap-2"><span class="text-slate-600">·</span><div>Traducción a otros idiomas</div></li>
      </ul>
      <p class="text-xs text-slate-500 mt-4 leading-relaxed">Si más adelante quieren cualquiera de estos puntos, se cotizan aparte y el sitio está preparado para crecer.</p>
    </div>
  </div>

  <!-- ══════════ PARTE 2: SEO ══════════ -->
  <div class="rounded-xl border border-cyan2-500/30 bg-gradient-to-br from-cyan2-500/10 to-transparent p-6 mb-6">
    <p class="font-mono text-[10px] tracking-widest uppercase text-cyan2-400 mb-2">Parte 2</p>
    <h2 class="text-2xl font-bold text-white mb-2">Plan de posicionamiento para Dimapar</h2>
    <p class="text-sm text-slate-400">Seis meses de trabajo sobre dimaparecuador.com para que los encuentren buscando lo que venden.</p>
  </div>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
    <h3 class="text-lg font-semibold text-white mb-4">Qué es esto, en palabras simples</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Cuando alguien necesita una balanceadora, un elevador o una prensa hidráulica, lo primero que hace es escribirlo en Google. Aparecen unos diez resultados, y <strong class="text-white">casi todos entran a los tres primeros</strong>. Los que salen en la segunda página prácticamente no existen.</p>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Posicionamiento —o SEO, como se le dice— es <strong class="text-white">el trabajo de conseguir que su sitio salga arriba en esas búsquedas</strong>. No se compra: se gana. Y se gana de dos maneras.</p>
    <div class="grid md:grid-cols-2 gap-4 mb-4">
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-white font-semibold mb-2 text-sm">1. Arreglando el sitio</p>
        <p class="text-sm text-slate-400 leading-relaxed">Que cargue rápido, que Google entienda de qué trata cada página, que los títulos digan lo que la gente busca. Es trabajo técnico que se hace una vez y queda.</p>
      </div>
      <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
        <p class="text-white font-semibold mb-2 text-sm">2. Publicando contenido</p>
        <p class="text-sm text-slate-400 leading-relaxed">Artículos que responden lo que su cliente pregunta antes de comprar. Cada artículo es una puerta nueva por la que alguien puede llegar a su sitio.</p>
      </div>
    </div>
    <div class="rounded-lg border border-amber-500/30 bg-amber-500/5 p-4">
      <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-amber-400">Una advertencia honesta:</strong> esto no es inmediato. Google tarda entre <strong class="text-white">dos y cuatro meses</strong> en empezar a mostrar resultados de un trabajo nuevo. Por eso el plan es de seis meses: menos tiempo no alcanza para ver si funciona. Quien le prometa resultados en tres semanas le está vendiendo humo.</p>
    </div>
  </div>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
    <h3 class="text-lg font-semibold text-white mb-4">Qué hacemos, mes a mes</h3>
    <div class="space-y-4 text-sm">
      <div class="flex gap-4">
        <span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-14">Mes 1</span>
        <div class="text-slate-300"><strong class="text-white">Arreglar la base.</strong> Revisamos el sitio completo: velocidad, errores, páginas duplicadas, títulos. Y ordenamos las 88 páginas de categoría que hoy casi no traen visitas, que es donde está la mayor oportunidad.</div>
      </div>
      <div class="flex gap-4">
        <span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-14">Mes 1</span>
        <div class="text-slate-300"><strong class="text-white">Averiguar qué busca su cliente.</strong> Con herramientas de Google vemos exactamente qué escribe la gente cuando busca los equipos que ustedes venden, y cuántos lo buscan al mes. De ahí sale el plan de contenido — no de suposiciones.</div>
      </div>
      <div class="flex gap-4">
        <span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-14">Mes 1&ndash;6</span>
        <div class="text-slate-300"><strong class="text-white">20 artículos al mes.</strong> Escritos, publicados y optimizados por nosotros. Al final del plan son <strong class="text-white">120 artículos</strong> trabajando para ustedes las 24 horas.</div>
      </div>
      <div class="flex gap-4">
        <span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-14">Mes 1&ndash;6</span>
        <div class="text-slate-300"><strong class="text-white">Google Maps y ficha de empresa.</strong> Optimizamos su presencia local para que aparezcan cuando alguien busca proveedores cerca.</div>
      </div>
      <div class="flex gap-4">
        <span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-14">Cada mes</span>
        <div class="text-slate-300"><strong class="text-white">Un informe claro</strong> con cuánta gente llegó, qué buscaron, qué páginas funcionaron y qué se hizo ese mes. Sin tecnicismos.</div>
      </div>
    </div>
  </div>

  <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-3">Por qué 20 artículos al mes y no dos</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-3">Cada artículo responde <strong class="text-white">una</strong> pregunta concreta: «cuánto cuesta una balanceadora», «cómo elegir un elevador de dos postes», «cada cuánto se calibra una alineadora». Cada uno atrae a un tipo de comprador distinto.</p>
    <p class="text-sm text-slate-300 leading-relaxed">Con dos artículos al mes se cubren dos preguntas. Con veinte se cubre el abanico completo de lo que su cliente se pregunta antes de comprar un equipo de varios miles de dólares. En un negocio como el suyo, donde la decisión es meditada y se investiga mucho, <strong class="text-white">estar presente en toda esa investigación es lo que define quién recibe la llamada</strong>.</p>
  </div>

  <!-- ══════════ INVERSIÓN ══════════ -->
  <h2 class="text-2xl font-bold text-white mb-6">Inversión</h2>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
    <div class="flex items-start justify-between gap-4 flex-wrap">
      <div>
        <p class="font-mono text-[10px] tracking-widest uppercase text-cyan2-400 mb-1">Parte 1</p>
        <h3 class="text-lg font-semibold text-white">Sitio web de Besser</h3>
        <p class="text-sm text-slate-400 mt-1">Una página · dominio y alojamiento del primer año incluidos</p>
      </div>
      <div class="text-right">
        <p class="text-4xl font-bold text-white">$290</p>
        <p class="text-xs text-slate-500">+ IVA · pago único</p>
      </div>
    </div>
    <div class="border-t border-slate-800 mt-5 pt-5">
      <p class="text-sm text-slate-400 mb-3">Forma de pago</p>
      <div class="grid grid-cols-2 gap-4">
        <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
          <p class="text-xs text-slate-500 mb-1">Para empezar</p>
          <p class="text-2xl font-bold text-white">$170</p>
        </div>
        <div class="rounded-lg border border-slate-800/60 bg-slate-900/40 p-4">
          <p class="text-xs text-slate-500 mb-1">Al entregar funcionando</p>
          <p class="text-2xl font-bold text-white">$120</p>
        </div>
      </div>
    </div>
  </div>

  <div class="rounded-xl border border-cyan2-500/30 bg-cyan2-500/5 p-6 mb-6">
    <p class="font-mono text-[10px] tracking-widest uppercase text-cyan2-400 mb-1">Parte 2</p>
    <h3 class="text-lg font-semibold text-white mb-1">Plan de posicionamiento &middot; 6 meses</h3>
    <p class="text-sm text-slate-400 mb-5">120 artículos, arreglos técnicos, Google Maps e informe mensual</p>

    <div class="grid md:grid-cols-2 gap-4">
      <div class="rounded-xl border border-emerald-500/40 bg-emerald-500/10 p-5 flex flex-col">
        <div class="flex items-center gap-2 mb-2">
          <span class="text-[10px] font-mono uppercase tracking-widest bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded">Conviene</span>
        </div>
        <p class="text-sm text-slate-300 mb-2">Los 6 meses en un solo pago</p>
        <p class="text-4xl font-bold text-emerald-400 mb-1">$600</p>
        <p class="text-xs text-slate-400 mb-4">+ IVA</p>
        <p class="text-sm text-slate-300 mt-auto leading-relaxed">Ahorra <strong class="text-emerald-400">$300</strong> frente al pago mensual.</p>
      </div>
      <div class="rounded-xl border border-slate-700/50 bg-slate-900/40 p-5 flex flex-col">
        <div class="flex items-center gap-2 mb-2">
          <span class="text-[10px] font-mono uppercase tracking-widest bg-slate-700/40 text-slate-400 px-2 py-1 rounded">Mes a mes</span>
        </div>
        <p class="text-sm text-slate-300 mb-2">Pagando cada mes</p>
        <p class="text-4xl font-bold text-white mb-1">$150</p>
        <p class="text-xs text-slate-400 mb-4">+ IVA al mes</p>
        <p class="text-sm text-slate-400 mt-auto leading-relaxed">Suman <strong class="text-slate-300">$900</strong> en los seis meses.</p>
      </div>
    </div>
  </div>

  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-6">
    <h3 class="text-lg font-semibold text-white mb-4">Las dos partes juntas</h3>
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <tbody class="text-slate-300">
          <tr class="border-b border-slate-800/50"><td class="py-3">Sitio web de Besser</td><td class="text-right font-semibold text-white">$290</td></tr>
          <tr class="border-b border-slate-800/50"><td class="py-3">Plan de posicionamiento, 6 meses en un pago</td><td class="text-right font-semibold text-white">$600</td></tr>
          <tr><td class="py-3 font-semibold text-white">Total</td><td class="text-right text-2xl font-bold text-cyan2-400">$890</td></tr>
        </tbody>
      </table>
    </div>
    <p class="text-xs text-slate-500 mt-4">Todos los valores son sin IVA.</p>
  </div>

  <!-- Renovación -->
  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-3">Qué se paga el segundo año</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">El primer año de dominio y alojamiento va incluido en el precio del sitio. A partir del segundo año se renueva:</p>
    <div class="overflow-x-auto mb-4">
      <table class="w-full text-sm">
        <tbody class="text-slate-300">
          <tr class="border-b border-slate-800/50"><td class="py-2">Dominio <span class="text-xs text-slate-500">(la dirección en internet)</span></td><td class="text-right">$21,99</td></tr>
          <tr class="border-b border-slate-800/50"><td class="py-2">Alojamiento <span class="text-xs text-slate-500">(el servidor donde vive el sitio)</span></td><td class="text-right">$120,00</td></tr>
          <tr><td class="py-2 font-semibold text-white">Total al año</td><td class="text-right font-bold text-white">$141,99</td></tr>
        </tbody>
      </table>
    </div>
    <p class="text-sm text-slate-400 leading-relaxed">Menos de <strong class="text-slate-300">$12 al mes</strong> por mantener el sitio en línea. El plan de posicionamiento no se renueva automáticamente: al terminar los seis meses se evalúa con datos si conviene continuar.</p>
  </div>

  <!-- Cronograma -->
  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-4">Cuándo estaría listo</h3>
    <div class="space-y-3 text-sm">
      <div class="flex gap-4"><span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-20">Semana 1</span><div class="text-slate-300">Reunión de arranque, entrega de materiales y registro del dominio.</div></div>
      <div class="flex gap-4"><span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-20">Semana 2</span><div class="text-slate-300">Diseño y textos del sitio de Besser para su revisión.</div></div>
      <div class="flex gap-4"><span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-20">Semana 3</span><div class="text-slate-300">Ajustes según sus comentarios y sitio en línea.</div></div>
      <div class="flex gap-4"><span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-20">Semana 1&ndash;2</span><div class="text-slate-300">En paralelo: revisión técnica de dimaparecuador.com e investigación de búsquedas.</div></div>
      <div class="flex gap-4"><span class="font-mono text-xs text-cyan2-400 whitespace-nowrap mt-1 w-20">Mes 1</span><div class="text-slate-300">Arrancan los primeros 20 artículos.</div></div>
    </div>
    <div class="border-t border-slate-800 mt-5 pt-5">
      <p class="text-sm text-slate-400 mb-3">Qué necesitamos de ustedes para empezar</p>
      <ul class="space-y-2 text-sm text-slate-300">
        <li class="flex gap-2"><span class="text-cyan2-400">›</span><div>Logotipo de Besser en buena calidad</div></li>
        <li class="flex gap-2"><span class="text-cyan2-400">›</span><div>Fotos de los equipos y, si tienen, del taller o las instalaciones</div></li>
        <li class="flex gap-2"><span class="text-cyan2-400">›</span><div>Historia de la marca: cuándo nació, qué la distingue</div></li>
        <li class="flex gap-2"><span class="text-cyan2-400">›</span><div>Datos de contacto que quieren mostrar</div></li>
        <li class="flex gap-2"><span class="text-cyan2-400">›</span><div>Qué nombre quieren para el dominio</div></li>
        <li class="flex gap-2"><span class="text-cyan2-400">›</span><div>Acceso al panel de dimaparecuador.com para el trabajo de posicionamiento</div></li>
      </ul>
    </div>
  </div>

  <!-- Experiencia -->
  <div class="rounded-xl border border-slate-800/50 glass p-6 mb-10">
    <h3 class="text-lg font-semibold text-white mb-4">Ya nos conocen</h3>
    <p class="text-sm text-slate-300 leading-relaxed mb-4">Con Dimapar hemos trabajado la revisión técnica del sitio actual, donde documentamos 42 problemas y aplicamos la reorganización del catálogo en 51 categorías, además de la reclasificación de los 159 productos y el rediseño de la página principal.</p>
    <p class="text-sm text-slate-400 leading-relaxed mb-4">En posicionamiento manejamos hoy los planes de contenido de varios clientes en Ecuador, entre ellos un concesionario automotor del norte del país donde el trabajo de contenido llevó el sitio a cerca de un millón de apariciones en Google por trimestre.</p>
    <p class="text-sm text-slate-400 leading-relaxed">Todo lo que hacemos queda documentado en informes como este, con datos verificables y sin adornos.</p>
  </div>

  <!-- Cierre -->
  <div class="rounded-xl border border-cyan2-500/30 bg-cyan2-500/5 p-6 text-center">
    <p class="text-sm text-slate-300 mb-4">Cualquier duda sobre esta propuesta, con gusto la conversamos.</p>
    <a href="https://wa.me/593999174980?text=Hola%20Santiago%2C%20vi%20la%20propuesta%20de%20Besser%20y%20el%20plan%20SEO" class="inline-block px-6 py-3 rounded-xl bg-gradient-to-r from-cyan2-600 to-cyan2-500 text-slate-900 font-semibold text-sm hover:brightness-110 transition">Escribir por WhatsApp</a>
    <p class="text-xs text-slate-500 mt-5">Creative Web &middot; Otavalo, Ecuador &middot; agosto de 2026</p>
  </div>

</div>
</body>
</html>
