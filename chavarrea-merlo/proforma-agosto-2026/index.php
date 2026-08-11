<?php
session_start();
if (empty($_SESSION['auth_contadoras_proforma'])) {
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
<title>Su página web para todo el Ecuador &mdash; Magui Chavarrea &amp; Leticia Merlo</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: #0a1828; color: #e8edf3; }
.mono { font-family: 'JetBrains Mono', monospace; }
.brand-grad { background: linear-gradient(135deg, #b8952e 0%, #e9c95c 100%); }
.brand-grad-soft { background: linear-gradient(135deg, rgba(212,175,55,0.12) 0%, rgba(233,201,92,0.03) 100%); }
.glass { background: rgba(19, 38, 58, 0.55); backdrop-filter: blur(20px); border: 1px solid rgba(212, 175, 55, 0.15); }
.glass-strong { background: rgba(16, 32, 50, 0.85); backdrop-filter: blur(20px); border: 1px solid rgba(212, 175, 55, 0.28); }
.text-grad { background: linear-gradient(135deg, #e9c95c 0%, #ffffff 100%); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent; }
html { scroll-behavior: smooth; scroll-padding-top: 90px; }
@media print {
    body { background: white; color: #16324f; }
    .no-print, header nav { display: none !important; }
    .glass, .glass-strong { background: #f8f8f5 !important; border: 1px solid #ddd !important; backdrop-filter: none !important; }
    .text-grad { -webkit-text-fill-color: #b8952e !important; }
    section { page-break-inside: avoid; }
}
</style>
</head>
<body>

<!-- MENU SUPERIOR -->
<header class="no-print sticky top-0 z-50 glass-strong border-b border-[#d4af37]/10">
    <div class="max-w-6xl mx-auto px-6 py-3 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl brand-grad flex items-center justify-center">
                <svg class="w-5 h-5 text-[#0a1828]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <p class="text-[10px] font-bold text-[#e9c95c] uppercase tracking-widest">Creative Web &middot; Propuesta</p>
                <p class="text-white font-semibold text-xs">Magui Chavarrea &amp; Leticia Merlo &middot; Agosto 2026</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <a href="#inversion" class="hidden md:inline text-slate-300 hover:text-white text-sm font-semibold">Inversión</a>
            <a href="logout.php" class="text-[#e9c95c] hover:text-white text-sm font-semibold">Salir</a>
        </div>
    </div>
</header>

<!-- PORTADA -->
<section class="pt-16 pb-14">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="text-[#e9c95c] font-bold text-sm uppercase tracking-widest mb-4">Propuesta de página web profesional</p>
        <h1 class="text-4xl md:text-6xl font-black mb-6 leading-tight text-white">
            De su oficina<br><span class="text-grad">a todo el Ecuador</span>
        </h1>
        <p class="text-slate-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-10">
            Ustedes dos llevan años resolviendo la contabilidad de sus clientes. Lo que falta es que las encuentren en todo el país. Esta propuesta es exactamente eso: una página web profesional donde cualquier persona, desde Tulcán hasta Loja, pueda conocerlas, escribirles y contratar sus declaraciones en línea.
        </p>
        <div class="grid grid-cols-3 gap-4 mb-12 max-w-2xl mx-auto">
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">1</div>
                <p class="text-slate-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">página web<br>completa</p>
            </div>
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">24/7</div>
                <p class="text-slate-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">recibiendo<br>clientes</p>
            </div>
            <div class="glass rounded-xl px-4 py-5">
                <div class="text-3xl font-black text-grad">1 año</div>
                <p class="text-slate-400 text-[11px] uppercase tracking-widest mt-1 leading-tight">todo incluido<br>sin pagos extra</p>
            </div>
        </div>
        <a href="#inversion" class="no-print inline-flex items-center gap-2 px-8 py-4 rounded-xl brand-grad text-[#0a1828] font-bold text-base hover:opacity-90 transition shadow-2xl">
            Ver el precio
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
        </a>
    </div>
</section>

<!-- POR QUE -->
<section class="py-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-[#e9c95c] font-bold text-sm uppercase tracking-widest mb-2">Por qué ahora</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Sus futuros clientes ya las están buscando</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-5">
            <div class="glass rounded-2xl p-6">
                <div class="w-11 h-11 rounded-xl brand-grad-soft border border-[#d4af37]/25 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-[#e9c95c]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">La gente busca en Google</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Todos los días hay personas y negocios escribiendo en Google cosas como &laquo;contadora para mi negocio&raquo; o &laquo;quién me ayuda con mi declaración&raquo;. Hoy, esas búsquedas encuentran a otros. Con su página, las pueden encontrar a ustedes.</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <div class="w-11 h-11 rounded-xl brand-grad-soft border border-[#d4af37]/25 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-[#e9c95c]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Su trabajo ya es en línea</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Las declaraciones se hacen por internet. Eso significa que su cliente puede estar en Guayaquil, Cuenca o Galápagos — no necesita ir a una oficina. Su servicio ya no tiene fronteras; solo falta que su presencia tampoco las tenga.</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <div class="w-11 h-11 rounded-xl brand-grad-soft border border-[#d4af37]/25 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-[#e9c95c]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">La página da confianza</h3>
                <p class="text-slate-400 text-sm leading-relaxed">En temas de impuestos, nadie contrata a un desconocido. Una página seria, con sus nombres, su experiencia y sus servicios claros, es lo que convierte a una desconocida en &laquo;mi contadora&raquo;. Es su carta de presentación trabajando día y noche.</p>
            </div>
        </div>
    </div>
</section>

<!-- QUE INCLUYE -->
<section class="py-14">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-[#e9c95c] font-bold text-sm uppercase tracking-widest mb-2">Qué incluye</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Todo lo necesario, sin letra pequeña</h2>
            <p class="text-slate-400 mt-3 max-w-2xl mx-auto">Entregamos la página funcionando y lista para recibir clientes. Ustedes no tienen que contratar nada más por separado.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-5">
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-2">Diseño completo de la página</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Una página elegante y profesional, hecha a la medida de su nueva empresa. Se ve perfecta en <strong class="text-white">celular, tableta y computadora</strong> — porque la mayoría de sus clientes las va a ver desde el teléfono.</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-2">Su dirección en internet (dominio)</h3>
                <p class="text-slate-400 text-sm leading-relaxed">El dominio es el nombre de su página: <span class="mono text-[#e9c95c]">www.suempresa.com</span>. Es como la dirección de su oficina, pero en internet. <strong class="text-white">Incluido el primer año.</strong></p>
            </div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-2">El espacio donde vive la página (hosting)</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Toda página necesita un servidor donde funcionar — el &laquo;local&raquo; que la mantiene abierta las 24 horas. <strong class="text-white">Incluido el primer año</strong>, con respaldos de seguridad.</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-2">Correos corporativos</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Correos con el nombre de su empresa: <span class="mono text-[#e9c95c]">magui@suempresa.com</span> y <span class="mono text-[#e9c95c]">leticia@suempresa.com</span>. Escribir desde un correo propio — y no desde un Gmail — cambia por completo la primera impresión.</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-2">Formularios de contacto directos</h3>
                <p class="text-slate-400 text-sm leading-relaxed">El visitante llena un formulario corto y ustedes reciben el mensaje al instante en su correo y su WhatsApp. Además, un <strong class="text-white">botón de WhatsApp siempre visible</strong> — porque en Ecuador, el cliente que quiere algo, lo quiere por WhatsApp.</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-2">Preparada para aparecer en Google (SEO)</h3>
                <p class="text-slate-400 text-sm leading-relaxed">La página sale optimizada desde el primer día: textos pensados para lo que la gente busca, registro en Google y estructura correcta. Así, cuando alguien busque sus servicios, su página tiene con qué competir.</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-2">Las últimas tendencias para captar clientes</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Sección de preguntas frecuentes, testimonios de clientes reales, y llamados a la acción claros en cada pantalla. La página no solo informa: <strong class="text-white">invita a escribirles</strong>.</p>
            </div>
            <div class="glass rounded-2xl p-6">
                <h3 class="text-white font-bold text-lg mb-2">Soporte técnico y actualizaciones por 1 año</h3>
                <p class="text-slate-400 text-sm leading-relaxed">Si algo falla, lo arreglamos. Si hay que cambiar un texto, un precio o una foto, lo cambiamos. Durante todo el primer año, <strong class="text-white">ustedes se dedican a sus clientes y nosotros a la página</strong>.</p>
            </div>
        </div>

        <!-- REGALO LOGO -->
        <div class="glass-strong rounded-2xl p-7 mt-6 border-[#d4af37]/40">
            <div class="flex flex-wrap items-center justify-between gap-5">
                <div class="flex-1 min-w-[260px]">
                    <p class="text-[#e9c95c] text-xs font-bold uppercase tracking-widest mb-2">Incluido de regalo</p>
                    <h3 class="text-white font-bold text-xl mb-2">Diseño de logotipo + manual de marca</h3>
                    <p class="text-slate-300 text-sm leading-relaxed">Como su empresa está naciendo, necesita una imagen propia. Diseñamos su logotipo profesional y les entregamos el <strong class="text-white">manual de marca</strong>: el documento que define sus colores, letras y usos correctos del logo — para que tarjetas, firmas de correo y redes sociales se vean siempre iguales y siempre profesionales.</p>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-black text-slate-500 line-through mono">$200</div>
                    <div class="text-4xl font-black text-grad mono">$0</div>
                    <p class="text-slate-400 text-xs font-semibold mt-1">incluido en el proyecto</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- COMO TRABAJAMOS -->
<section class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-[#e9c95c] font-bold text-sm uppercase tracking-widest mb-2">Cómo trabajamos</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Del sí a la página en línea</h2>
        </div>
        <div class="space-y-4">
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl brand-grad flex items-center justify-center text-[#0a1828] font-black">1</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Conversamos y definimos su marca</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Nos cuentan sus servicios, su estilo y el nombre que elijan para la empresa. Con eso diseñamos el logotipo y les presentamos opciones hasta que digan &laquo;ese es&raquo;.</p>
                </div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl brand-grad flex items-center justify-center text-[#0a1828] font-black">2</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Diseñamos y armamos la página</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Escribimos los textos con ustedes, organizamos los servicios y montamos todo: página, correos, formularios y WhatsApp. Les mostramos avances para que opinen antes de que esté todo listo.</p>
                </div>
            </div>
            <div class="glass rounded-2xl p-6 flex items-start gap-5">
                <div class="flex-shrink-0 w-12 h-12 rounded-xl brand-grad flex items-center justify-center text-[#0a1828] font-black">3</div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Salimos en línea y las enseñamos a volar</h3>
                    <p class="text-slate-400 text-sm leading-relaxed">Publicamos la página, la registramos en Google y les enseñamos lo básico: cómo llegan los mensajes, cómo usar sus correos nuevos y cómo compartir su página con orgullo.</p>
                </div>
            </div>
        </div>
        <div class="glass rounded-2xl p-6 mt-6 text-center">
            <p class="text-slate-300 text-sm"><strong class="text-white">Tiempo de entrega: 3 a 4 semanas</strong> desde que nos entreguen el nombre de la empresa, sus fotos y la información de sus servicios.</p>
        </div>
    </div>
</section>

<!-- INVERSION -->
<section id="inversion" class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-[#e9c95c] font-bold text-sm uppercase tracking-widest mb-2">Inversión</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Cuánto cuesta</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-6">
            <div class="glass-strong rounded-2xl p-7 border-[#d4af37]/40">
                <p class="text-[#e9c95c] text-xs font-bold uppercase tracking-widest mb-2">Proyecto completo</p>
                <h3 class="text-white font-bold text-xl mb-1">Página web + logotipo + 1 año incluido</h3>
                <p class="text-slate-400 text-sm mb-5">Todo lo descrito arriba: diseño, dominio, hosting, correos, formularios, Google y soporte por un año.</p>
                <div class="flex items-baseline gap-3 mb-1">
                    <span class="text-2xl font-black text-slate-500 line-through mono">$680</span>
                    <span class="text-5xl font-black text-grad mono">$500</span>
                    <span class="text-slate-400 font-semibold">+ IVA</span>
                </div>
                <p class="text-emerald-400 text-sm font-semibold mb-5">Precio especial de lanzamiento para su nueva empresa</p>
                <div class="border-t border-white/10 pt-4 space-y-1.5 text-sm text-slate-300">
                    <div class="flex justify-between"><span>Para empezar (60%)</span><span class="mono font-bold text-white">$300</span></div>
                    <div class="flex justify-between"><span>Al entregar la página lista (40%)</span><span class="mono font-bold text-white">$200</span></div>
                </div>
                <div class="mt-5 pt-4 border-t border-white/10">
                    <p class="text-white font-semibold text-sm mb-1">Sin costos escondidos</p>
                    <p class="text-slate-400 text-sm leading-relaxed">Durante el primer año no pagan nada más: ni dominio, ni hosting, ni soporte. El precio es el precio.</p>
                </div>
            </div>

            <div class="glass rounded-2xl p-7">
                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest mb-2">A partir del segundo año</p>
                <h3 class="text-white font-bold text-xl mb-1">Renovación anual</h3>
                <p class="text-slate-400 text-sm mb-5">Desde el segundo año, la página solo necesita renovar dos cosas para seguir en línea:</p>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between gap-4">
                        <div>
                            <p class="text-slate-200 font-semibold">Dominio (su dirección web)</p>
                            <p class="text-slate-500 text-xs">Se renueva una vez al año</p>
                        </div>
                        <span class="mono font-bold text-white whitespace-nowrap">$21,99</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <div>
                            <p class="text-slate-200 font-semibold">Hosting (donde vive la página)</p>
                            <p class="text-slate-500 text-xs">Incluye los correos corporativos</p>
                        </div>
                        <span class="mono font-bold text-white whitespace-nowrap">$120,00</span>
                    </div>
                    <div class="flex justify-between gap-4 border-t border-white/10 pt-3">
                        <p class="text-white font-bold">Total por año</p>
                        <span class="mono font-black text-grad whitespace-nowrap">$141,99</span>
                    </div>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mt-5 pt-4 border-t border-white/10">Es decir, mantener su página el segundo año cuesta <strong class="text-white">menos de $12 al mes</strong> — menos que un almuerzo ejecutivo mensual para tener su oficina abierta en internet todo el año.</p>
            </div>
        </div>

        <!-- OPCIONAL SEO MENSUAL -->
        <div class="glass rounded-2xl p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex-1 min-w-[260px]">
                    <p class="text-[#e9c95c] text-xs font-bold uppercase tracking-widest mb-1">Opcional &middot; para más adelante</p>
                    <p class="text-white font-bold text-lg mb-1">Plan de artículos mensuales para crecer en Google</p>
                    <p class="text-slate-400 text-sm leading-relaxed">Cuando la página ya esté rodando, se puede crecer más rápido publicando cada mes artículos que responden lo que la gente pregunta en Google: &laquo;¿cuándo vence mi declaración?&raquo;, &laquo;¿qué gastos puedo deducir?&raquo;. Cada artículo es una puerta más de entrada de clientes. <strong class="text-white">No es obligatorio y se puede activar cuando quieran.</strong></p>
                </div>
                <div class="text-right">
                    <div class="text-3xl font-black text-grad mono">$150</div>
                    <p class="text-slate-400 text-sm font-semibold">+ IVA / mes &middot; 4 artículos</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QUE NECESITAMOS -->
<section class="py-14">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-10">
            <p class="text-[#e9c95c] font-bold text-sm uppercase tracking-widest mb-2">Para arrancar</p>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white">Lo que necesitamos de ustedes</h2>
            <p class="text-slate-400 mt-3 max-w-2xl mx-auto">Nada complicado — lo recogemos juntos en la primera reunión.</p>
        </div>
        <div class="grid md:grid-cols-2 gap-5">
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">El nombre de la empresa</p>
                <p class="text-slate-400 text-sm">El que elijan para su nueva sociedad. Con él reservamos el dominio y diseñamos el logotipo.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">La lista de sus servicios</p>
                <p class="text-slate-400 text-sm">Declaraciones, contabilidad mensual, asesorías — tal como se los explican a un cliente. Nosotros los convertimos en textos para la página.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">Fotos de ustedes dos</p>
                <p class="text-slate-400 text-sm">Profesionales o de buena calidad con el celular. En servicios de confianza, ponerle rostro a la empresa vale oro.</p>
            </div>
            <div class="glass rounded-xl p-5">
                <p class="text-white font-semibold mb-1">2 o 3 testimonios de clientes</p>
                <p class="text-slate-400 text-sm">Unas líneas de clientes actuales contando cómo les ha ido con ustedes. Es lo que más convence a los que llegan por primera vez.</p>
            </div>
        </div>
    </div>
</section>

<!-- CONDICIONES -->
<section class="py-10">
    <div class="max-w-5xl mx-auto px-6">
        <div class="glass rounded-2xl p-7">
            <p class="text-[#e9c95c] text-xs font-bold uppercase tracking-widest mb-5">Condiciones</p>
            <div class="grid md:grid-cols-2 gap-x-10 gap-y-4 text-sm">
                <div>
                    <p class="text-white font-semibold mb-1">Validez de la propuesta</p>
                    <p class="text-slate-400">30 días desde la fecha de entrega.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Impuestos</p>
                    <p class="text-slate-400">Los valores indicados son antes de IVA.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Entrega</p>
                    <p class="text-slate-400">3 a 4 semanas desde que recibamos el nombre, las fotos y la información de servicios.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">La página es de ustedes</p>
                    <p class="text-slate-400">El dominio, la página y los correos quedan a nombre de su empresa. Son suyos.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Alcance</p>
                    <p class="text-slate-400">Esta propuesta cubre lo descrito. Si más adelante quieren sumar algo nuevo, se cotiza aparte y por escrito.</p>
                </div>
                <div>
                    <p class="text-white font-semibold mb-1">Renovación año 2</p>
                    <p class="text-slate-400">$141,99 + IVA por año (dominio + hosting). Les avisamos con un mes de anticipación.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">¿Empezamos?</h2>
        <p class="text-slate-400 text-lg mb-8 max-w-2xl mx-auto">Cualquier duda sobre la propuesta, escríbannos y la resolvemos con gusto. Sin compromiso.</p>
        <a href="https://wa.me/593999174980?text=Hola%20Santi%2C%20somos%20Magui%20y%20Leticia.%20Revisamos%20la%20propuesta%20de%20la%20p%C3%A1gina%20web%20y%20queremos%20conversar."
           target="_blank" rel="noopener"
           class="no-print inline-flex items-center gap-3 px-8 py-4 rounded-xl brand-grad text-[#0a1828] font-bold text-base hover:opacity-90 transition shadow-2xl">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.71.306 1.263.489 1.695.625.712.227 1.36.195 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>
            Escribir por WhatsApp
        </a>
        <p class="text-slate-500 text-sm mt-4">+593 99 917 4980 &middot; Creative Web</p>
    </div>
</section>

<!-- PIE -->
<footer class="border-t border-white/8 py-10">
    <div class="max-w-6xl mx-auto px-6 flex flex-wrap items-center justify-between gap-6">
        <div>
            <p class="text-white text-sm font-semibold">Propuesta de página web profesional</p>
            <p class="text-slate-500 text-xs">Para Magui Chavarrea &amp; Leticia Merlo &middot; Agosto 2026</p>
        </div>
        <div class="text-right">
            <p class="text-slate-400 text-sm">Preparado por <span class="text-[#e9c95c] font-semibold">Creative Web</span></p>
            <p class="text-slate-600 text-xs mt-1">Documento confidencial</p>
        </div>
    </div>
</footer>

</body>
</html>
