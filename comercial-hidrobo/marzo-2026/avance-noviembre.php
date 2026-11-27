<?php /* Tab Avance Noviembre 2026 — incluido desde index.php */ ?>
<div id="tab-noviembre" class="tab-content space-y-8">

    <!-- Header -->
    <div class="rounded-xl border border-brand-500/30 bg-gradient-to-br from-brand-500/10 to-purple-500/5 p-6">
        <div class="flex items-center gap-3 mb-2">
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-brand-500/20 text-brand-400">Informe de avance</span>
            <span class="text-xs text-slate-400">Trabajo de septiembre, octubre y noviembre 2026 · datos al 19 de noviembre, con actualización al 26</span>
        </div>
        <h2 class="text-3xl font-bold text-white mb-2">Avance del plan — corte de noviembre 2026</h2>
        <p class="text-sm text-slate-400 leading-relaxed">Tercer corte del plan de <strong class="text-slate-300">Comercial Hidrobo</strong> y <strong class="text-slate-300">OKCars</strong>, con datos de Search Console y Google Analytics 4. Cubre todo lo hecho desde el corte de agosto: <strong class="text-slate-300">el embudo hacia el taller</strong>, <strong class="text-slate-300">la recuperación de páginas que habían perdido posiciones</strong> y <strong class="text-slate-300">los 36 artículos nuevos</strong> con los que el blog llega a 240.</p>
    </div>

    <!-- Sub-tabs -->
    <div class="flex gap-2 border-b border-slate-800 pb-2">
        <button onclick="subSwitch('noviembre', 'ch')" id="sub-noviembre-ch-btn" class="sub-btn active px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Comercial Hidrobo</button>
        <button onclick="subSwitch('noviembre', 'ok')" id="sub-noviembre-ok-btn" class="sub-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">OKCars</button>
    </div>

    <!-- ══════════════ COMERCIAL HIDROBO ══════════════ -->
    <div id="sub-noviembre-ch" class="sub-content active space-y-8">

    <!-- KPIs -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="rounded-xl border border-slate-800/50 glass p-5">
            <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics desde Google</p>
            <p class="text-3xl font-bold text-white">11.884</p>
            <p class="text-xs text-emerald-400 mt-1">+38 % frente al mismo período de 2025</p>
        </div>
        <div class="rounded-xl border border-slate-800/50 glass p-5">
            <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Apariciones en Google</p>
            <p class="text-3xl font-bold text-white">923.082</p>
            <p class="text-xs text-emerald-400 mt-1">+51 % frente a 2025 · 90 días</p>
        </div>
        <div class="rounded-xl border border-slate-800/50 glass p-5">
            <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Artículos en el blog</p>
            <p class="text-3xl font-bold text-white">240</p>
            <p class="text-xs text-slate-500 mt-1">36 nuevos en noviembre</p>
        </div>
        <div class="rounded-xl border border-slate-800/50 glass p-5">
            <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Artículos con reserva de taller</p>
            <p class="text-3xl font-bold text-white">29</p>
            <p class="text-xs text-slate-500 mt-1">con el formulario dentro del texto</p>
        </div>
    </div>

    <div class="rounded-xl border border-emerald-500/30 bg-gradient-to-r from-emerald-500/10 to-transparent p-5">
        <p class="text-sm text-slate-200 leading-relaxed"><strong class="text-emerald-400">Lo primero que hay que saber de este corte:</strong> el formulario de reserva de taller estaba <strong class="text-white">rechazando a más de la mitad de las personas</strong> que intentaban agendar en noviembre. Ya está corregido. Y el sitio recibe <strong class="text-white">38 % más clics que hace un año</strong>: el trabajo de los meses anteriores sostiene el crecimiento.</p>
    </div>

    <!-- Hallazgo 1 -->
    <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-6">
        <div class="flex items-center gap-2 mb-3">
            <span class="text-xl">🛠️</span>
            <h3 class="text-lg font-semibold text-white">Hallazgo 1: el formulario de reserva rechazaba citas, y ya está corregido</h3>
        </div>
        <p class="text-sm text-slate-300 leading-relaxed mb-4">Para que el sitio cargue rápido, el servidor guarda una copia de cada página. La de reserva de taller incluía un código de seguridad que vence en unas horas: quien abría una copia vieja llenaba todo, tocaba «Agendar cita» y recibía un error. <strong class="text-white">La cita no llegaba al taller.</strong> El problema empezó en agosto y fue creciendo.</p>
        <div class="overflow-x-auto mb-4">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                        <th class="text-left py-2">Mes</th>
                        <th class="text-right py-2">Personas rechazadas por el error</th>
                        <th class="text-right py-2">Citas que sí llegaron</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">
                    <tr class="border-b border-slate-800/50"><td class="py-2">Agosto</td><td class="text-right">1</td><td class="text-right">7</td></tr>
                    <tr class="border-b border-slate-800/50"><td class="py-2">Octubre</td><td class="text-right text-red-400">7</td><td class="text-right">9</td></tr>
                    <tr><td class="py-2">Noviembre (1 al 18)</td><td class="text-right text-red-400 font-semibold">11</td><td class="text-right">7</td></tr>
                </tbody>
            </table>
        </div>
        <div class="rounded-lg border border-emerald-500/40 bg-emerald-500/10 p-4">
            <p class="text-sm text-slate-200 leading-relaxed"><strong class="text-emerald-400">✅ Corregido el 19 de noviembre</strong> en el formulario de taller y en el de cotización de repuestos, que tenía el mismo problema. La protección contra spam (reCAPTCHA) sigue activa.</p>
            <p class="text-sm text-slate-200 leading-relaxed mt-2"><strong class="text-emerald-400">Confirmado al 26 de noviembre:</strong> cero personas rechazadas desde el arreglo. En esos 8 días entraron 3 citas completas, el mismo ritmo de antes (unas 12 al mes), así que todavía no vemos más reservas; lo seguimos midiendo.</p>
        </div>
    </div>

    <!-- Hallazgo 2 -->
    <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-6">
        <div class="flex items-center gap-2 mb-3">
            <span class="text-xl">📉</span>
            <h3 class="text-lg font-semibold text-white">Hallazgo 2: el tráfico creció frente a 2025, pero dos temas habían perdido posiciones</h3>
        </div>
        <div class="overflow-x-auto mb-4">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                        <th class="text-left py-2">Mes</th><th class="text-right py-2">Clics 2026</th><th class="text-right py-2">Clics 2025</th><th class="text-right py-2">Apariciones 2026</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">
                    <tr class="border-b border-slate-800/50"><td class="py-2">Septiembre</td><td class="text-right font-semibold">4.132</td><td class="text-right">2.453</td><td class="text-right">320.579</td></tr>
                    <tr class="border-b border-slate-800/50"><td class="py-2">Octubre</td><td class="text-right font-semibold">4.028</td><td class="text-right">3.163</td><td class="text-right">311.857</td></tr>
                    <tr><td class="py-2">Noviembre (1 al 17)</td><td class="text-right font-semibold">1.988</td><td class="text-right">2.280</td><td class="text-right">159.020</td></tr>
                </tbody>
            </table>
        </div>
        <p class="text-sm text-slate-300 leading-relaxed mb-3">Septiembre y octubre superaron con holgura a 2025. Noviembre va un poco por debajo del año pasado, y la razón está en dos páginas que en marzo estaban entre las primeras y bajaron:</p>
        <ul class="space-y-2 text-sm text-slate-300 mb-3">
            <li class="flex gap-2"><span class="text-amber-400">▸</span><div><strong>Autos eléctricos en Ecuador</strong>, la página #1 del sitio: pasó de la posición 4 a la 10 (448 → 152 clics al mes). Seguía hablando de 2025, con precios viejos.</div></li>
            <li class="flex gap-2"><span class="text-amber-400">▸</span><div><strong>Autos chinos:</strong> cuatro artículos competían entre sí por la misma búsqueda, y los cuatro recomendaban marcas que Comercial Hidrobo no vende.</div></li>
        </ul>
        <p class="text-sm text-slate-400 leading-relaxed">El resto de la caída frente a marzo es tráfico que nunca iba a comprar (búsquedas sueltas como «chery», «1.6» o «exoneración» que Google dejó de mostrarnos). Los dos temas de arriba ya se trabajaron este mes.</p>
    </div>

    <!-- Actualización 26-nov -->
    <div class="rounded-xl border border-sky-500/30 bg-sky-500/5 p-6">
        <div class="flex items-center gap-2 mb-3">
            <span class="text-xl">🔎</span>
            <h3 class="text-lg font-semibold text-white">Actualización al 26 de noviembre: lo que revisamos después del corte</h3>
        </div>
        <ul class="space-y-3 text-sm text-slate-300">
            <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Noviembre viene más bajo.</strong> Del 12 al 24 de noviembre el sitio recibió 111 clics al día, frente a 128 entre mediados de octubre y comienzos de noviembre (−13 %). No es la época: el año pasado noviembre subió. La baja está repartida en muchas páginas que conservan su posición, es decir, aparecen en menos búsquedas, no bajaron en Google.</div></li>
            <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Autos eléctricos: dos páginas del sitio se disputan la misma búsqueda.</strong> Para «carros eléctricos Ecuador», Google ahora muestra el artículo del auto eléctrico más barato (posición 5) en lugar de la guía principal reescrita, que pasó de la posición 10 a la 32. Las páginas cambiadas necesitan unas 4 semanas para asentarse: el <strong>8 de diciembre</strong> decidimos si reforzamos la guía con enlaces desde ese artículo.</div></li>
            <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Autos chinos se sostiene:</strong> la guía principal mejoró de la posición 5,5 a la 4,5.</div></li>
            <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Los artículos nuevos ya aparecen en Google</strong>, varios en las primeras posiciones: Omoda E5 Next (3,7), autos nuevos por menos de $20.000 (3,8), mantenimiento Changan (5,7) y Nevo Q05.</div></li>
            <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Revisamos si los títulos reescritos en septiembre funcionaron</strong>, comparando cada página con el resto del sitio. La primera tanda (11 páginas) ganó 7 % de clics mientras el resto bajaba 6 %; la Duster pasó de 73 a 145 clics al mes. La segunda tanda (10 páginas) bajó 14 %, en páginas que ya venían cayendo antes del cambio. Desde ahora, a las páginas que más clics traen se les cambia una cosa a la vez y se mide 4 semanas antes de volver a tocarlas.</div></li>
            <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Dimos de alta el sitio en Bing.</strong> Es el segundo buscador y el que usan Copilot y ChatGPT para buscar en internet. En unos días tendremos sus datos para compararlos con Google.</div></li>
        </ul>
    </div>

    <!-- Lo que hicimos -->
    <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-6">
        <div class="flex items-center gap-2 mb-4">
            <span class="text-xl">✅</span>
            <h3 class="text-lg font-semibold text-white">Lo que hicimos</h3>
        </div>

        <h4 class="text-sm font-semibold text-emerald-400 uppercase tracking-wider mb-2">Septiembre · el embudo hacia el taller</h4>
        <ul class="space-y-2 text-sm text-slate-300 mb-6">
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Bloque de reserva de taller en los 47 artículos para dueños de auto</strong> (mantenimiento, garantía, consumo, cuidado), que suman 267.000 apariciones en Google. Antes terminaban en un enlace genérico a «Contacto».</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Enlaces internos</strong> desde esos 47 artículos hacia las tres páginas que más reservas generan.</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Ficha del taller para Google</strong> (datos estructurados) en 24 artículos y en la página de reserva: dirección, teléfono, sedes y servicios, para competir en búsquedas como «taller mecánico Ibarra».</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>21 títulos reescritos</strong> en las páginas con más apariciones y menos clics, y 4 artículos nuevos en temas con demanda.</div></li>
        </ul>

        <h4 class="text-sm font-semibold text-emerald-400 uppercase tracking-wider mb-2">Octubre · recuadro de WhatsApp a mitad del texto</h4>
        <ul class="space-y-2 text-sm text-slate-300 mb-6">
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div>El bloque de reserva estaba al final de los artículos y casi nadie llegaba hasta ahí. Pusimos un <strong>recuadro de WhatsApp a mitad del texto en 53 artículos</strong>, con un mensaje distinto por artículo para saber de dónde viene cada contacto. Generó pocos clics; en parte, porque llevaba a un formulario que fallaba (Hallazgo 1).</div></li>
        </ul>

        <h4 class="text-sm font-semibold text-emerald-400 uppercase tracking-wider mb-2">Noviembre · recuperación, taller y contenido</h4>
        <ul class="space-y-2 text-sm text-slate-300">
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Autos eléctricos en Ecuador</strong> reescrita completa (672 → 1.778 palabras): modelos, precios del catálogo actual, autonomía real y qué tecnología conviene según dónde vive el cliente.</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Autos chinos</strong>: la guía principal y la de «mejor marca china calidad precio» reescritas con las marcas que vende Comercial Hidrobo. Lo mismo con <strong>autos eléctricos chinos</strong>, que recomendaba BYD, JAC y Geely.</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>6 artículos que competían entre sí fusionados</strong> con el que mejor rendía (autos chinos, mantenimiento Renault, Ibarra, mitos de los eléctricos). Los viejos redirigen al nuevo, sin perder lo que ya habían ganado.</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Formulario de reserva dentro del texto</strong> en los 15 artículos de mantenimiento con más visitas (encabeza la tabla de mantenimiento Toyota, con 1.095 visitas en 90 días). El cliente reserva sin salir del artículo.</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Mantenimiento Toyota y Renault</strong> mejorados para subir en Google: título nuevo, preguntas frecuentes y, en Renault, contenido completo por kilometraje y por modelo.</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Eléctricos e híbridos al día</strong>: ya no queda «2025» en el texto. X-Trail e-Power con su precio actual ($41.990) y título 2026.</div></li>
            <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>36 artículos nuevos</strong>, detallados abajo. El blog llega a 240.</div></li>
        </ul>
    </div>

    <!-- 36 artículos -->
    <div class="rounded-xl border border-slate-800/50 glass p-6">
        <div class="flex items-center gap-2 mb-4">
            <span class="text-xl">📝</span>
            <h3 class="text-lg font-semibold text-white">Los 36 artículos nuevos de noviembre</h3>
        </div>
        <p class="text-sm text-slate-400 leading-relaxed mb-4">Elegidos con datos de Search Console: temas que la gente busca y que el sitio no respondía. Las especificaciones de cada modelo salen de la página oficial de la marca en Ecuador, y los precios del catálogo de Comercial Hidrobo.</p>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="rounded-lg border border-slate-800/50 bg-slate-900/40 p-4">
                <p class="text-sm font-semibold text-white mb-1">Mantenimiento por marca · 6</p>
                <p class="text-xs text-slate-400">Chery, DongFeng, Changan, Nissan, Mazda y Jeep/RAM. Calendario por kilometraje, costos referenciales y formulario de reserva.</p>
            </div>
            <div class="rounded-lg border border-slate-800/50 bg-slate-900/40 p-4">
                <p class="text-sm font-semibold text-white mb-1">Taller · 8</p>
                <p class="text-xs text-slate-400">Revisión técnica vehicular en Ibarra, alineación y balanceo, amortiguadores, aire acondicionado, embrague, escáner, correa de distribución y camionetas 4x4. Todos con formulario de reserva.</p>
            </div>
            <div class="rounded-lg border border-slate-800/50 bg-slate-900/40 p-4">
                <p class="text-sm font-semibold text-white mb-1">Modelos del portafolio · 17</p>
                <p class="text-xs text-slate-400">Omoda | Jaecoo, Jaecoo J7 vs Tiggo 7 Super Hybrid, Tiggo 9 Super Hybrid, Omoda E5 Next, Nevo Q05, BAIC, SUV por menos de $20.000, Foton Tunland, Deepal G318, Alsvin Plus vs Arrizo 5, Raize vs Yaris Cross, vans Changan, Fiat 600, Avenger vs Pulse, Rich 7 vs Rich 6 Pro, RAM 700 y Mazda CX-60.</p>
            </div>
            <div class="rounded-lg border border-slate-800/50 bg-slate-900/40 p-4">
                <p class="text-sm font-semibold text-white mb-1">Híbridos y decisión de compra · 5</p>
                <p class="text-xs text-slate-400">Autos híbridos en Ecuador 2026, los híbridos más baratos, autos nuevos por menos de $20.000, doble cabinas más baratas y SUV automáticas por menos de $25.000.</p>
            </div>
        </div>
    </div>

    <!-- Lo que necesitamos -->
    <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-6">
        <div class="flex items-center gap-2 mb-4">
            <span class="text-xl">🤝</span>
            <h3 class="text-lg font-semibold text-white">Lo que necesitamos de su equipo</h3>
        </div>
        <p class="text-sm text-slate-300 leading-relaxed mb-3"><strong class="text-white">1. Confirmar siete precios.</strong> El menú del catálogo y la página de cada modelo muestran valores distintos. Los artículos usan el del menú; con su confirmación los corregimos.</p>
        <div class="overflow-x-auto mb-4">
            <table class="w-full text-sm">
                <thead>
                    <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                        <th class="text-left py-2">Modelo</th><th class="text-right py-2">Menú del catálogo</th><th class="text-right py-2">Página del modelo</th>
                    </tr>
                </thead>
                <tbody class="text-slate-300">
                    <tr class="border-b border-slate-800/50"><td class="py-2">Toyota Raize</td><td class="text-right">$20.000</td><td class="text-right">$25.990</td></tr>
                    <tr class="border-b border-slate-800/50"><td class="py-2">Toyota Yaris Cross</td><td class="text-right">$31.990</td><td class="text-right">$28.999</td></tr>
                    <tr class="border-b border-slate-800/50"><td class="py-2">Toyota Hilux</td><td class="text-right">$33.390</td><td class="text-right">$43.990</td></tr>
                    <tr class="border-b border-slate-800/50"><td class="py-2">Nissan Frontier</td><td class="text-right">$46.990</td><td class="text-right">$42.490</td></tr>
                    <tr class="border-b border-slate-800/50"><td class="py-2">RAM 700</td><td class="text-right">$21.999</td><td class="text-right">$20.999</td></tr>
                    <tr class="border-b border-slate-800/50"><td class="py-2">BAIC X55 II</td><td class="text-right">$21.990</td><td class="text-right">$19.990</td></tr>
                    <tr><td class="py-2">Omoda E5 Next</td><td class="text-right">$19.990</td><td class="text-right">$21.990</td></tr>
                </tbody>
            </table>
        </div>
        <ul class="space-y-2 text-sm text-slate-300">
            <li class="flex gap-2"><span class="text-amber-400">2.</span><div><strong>Corregir la página del Mazda CX-60</strong>: dice motor 2.5 L de 185 HP, y Mazda Ecuador vende la versión 3.3 Turbo de 280 HP a ese precio.</div></li>
            <li class="flex gap-2"><span class="text-amber-400">3.</span><div><strong>Corregir la etiqueta del Omoda E5 Next y del Nevo Q05</strong> en el menú: son 100 % eléctricos, no «Super Hybrid».</div></li>
            <li class="flex gap-2"><span class="text-amber-400">4.</span><div><strong>Lista de precios por versión</strong> de DongFeng Z9 híbrida enchufable, Toyota RAV4 híbrida y Deepal S07 eléctrico: el catálogo solo muestra el precio más bajo de cada modelo.</div></li>
            <li class="flex gap-2"><span class="text-amber-400">5.</span><div><strong>Que el taller revise los costos referenciales</strong> publicados en los artículos de mantenimiento, para afinarlos con valores reales.</div></li>
        </ul>
    </div>

    <!-- Próximos pasos -->
    <div class="rounded-xl border border-brand-500/30 bg-brand-500/5 p-6">
        <div class="flex items-center gap-2 mb-4">
            <span class="text-xl">🎯</span>
            <h3 class="text-lg font-semibold text-white">Lo que sigue, en orden de retorno</h3>
        </div>
        <ol class="space-y-3 text-sm text-slate-300">
            <li class="flex gap-3"><span class="text-brand-400 font-bold">1.</span><div><strong>Medir las reservas de taller desde el 19 de noviembre</strong>, ya con el formulario corregido y dentro de los artículos. Es el número que más importa para el plan.</div></li>
            <li class="flex gap-3"><span class="text-brand-400 font-bold">2.</span><div><strong>Fusionar los 12 artículos de financiamiento.</strong> Las búsquedas de crédito vehicular suman unas 7.000 apariciones al trimestre, pero ningún artículo pasa de la posición 15 porque compiten entre sí. Consolidarlos en 2 o 3 páginas fuertes es la mayor oportunidad pendiente.</div></li>
            <li class="flex gap-3"><span class="text-brand-400 font-bold">3.</span><div><strong>Medir la recuperación</strong> de autos eléctricos y autos chinos a mediados de diciembre: Google tarda de 4 a 6 semanas en reflejar los cambios. El 8 de diciembre, decidir cómo resolver la disputa entre las dos páginas de autos eléctricos.</div></li>
            <li class="flex gap-3"><span class="text-brand-400 font-bold">4.</span><div><strong>Pasar a 2027 en enero</strong> los títulos de eléctricos, híbridos y modelos que tengan la versión 2027 en piso. Hoy la gente todavía busca «2026» 24 veces más que «2027».</div></li>
        </ol>
    </div>
    </div>

    <!-- ══════════════ OKCARS ══════════════ -->
    <div id="sub-noviembre-ok" class="sub-content space-y-8">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics desde Google</p>
                <p class="text-3xl font-bold text-white">991</p>
                <p class="text-xs text-emerald-400 mt-1">4,6 veces los 90 días anteriores (216)</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Apariciones en Google</p>
                <p class="text-3xl font-bold text-white">122.717</p>
                <p class="text-xs text-emerald-400 mt-1">7,5 veces los 90 días anteriores</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Artículos en el blog</p>
                <p class="text-3xl font-bold text-white">115</p>
                <p class="text-xs text-slate-500 mt-1">120 al 30 de diciembre</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics por búsquedas de marca</p>
                <p class="text-3xl font-bold text-white">31 %</p>
                <p class="text-xs text-emerald-400 mt-1">en mayo era 84 %</p>
            </div>
        </div>

        <div class="rounded-xl border border-emerald-500/30 bg-gradient-to-r from-emerald-500/10 to-transparent p-5">
            <p class="text-sm text-slate-200 leading-relaxed"><strong class="text-emerald-400">Lo primero que hay que saber de este corte:</strong> OKCars dejó de depender de quien ya conocía la marca. Hoy <strong class="text-white">siete de cada diez clics vienen de gente que no buscó «OKCars»</strong>, sino un trámite, un modelo o una duda de compra. El reto del próximo corte es convertir esas visitas en contactos.</p>
        </div>

        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <h3 class="text-lg font-semibold text-white mb-3">Cómo crecieron las visitas</h3>
            <div class="overflow-x-auto mb-3">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                            <th class="text-left py-2">Mes</th><th class="text-right py-2">Clics desde Google</th><th class="text-right py-2">Apariciones</th><th class="text-right py-2">Visitas desde buscadores</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr class="border-b border-slate-800/50"><td class="py-2">Agosto</td><td class="text-right">105</td><td class="text-right">7.924</td><td class="text-right">177</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Septiembre</td><td class="text-right">175</td><td class="text-right">16.145</td><td class="text-right">252</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Octubre</td><td class="text-right font-semibold">446</td><td class="text-right">61.272</td><td class="text-right">522</td></tr>
                        <tr><td class="py-2">Noviembre (1 al 17)</td><td class="text-right font-semibold">318</td><td class="text-right">41.851</td><td class="text-right">401</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-sm text-slate-400 leading-relaxed">Las páginas que más traen: <strong class="text-slate-300">traspaso de vehículos</strong> (160 clics en 90 días), la página principal (147), <strong class="text-slate-300">traspaso de moto</strong> (93), la lista para revisar un auto usado antes de comprarlo (63) y la guía del Chevrolet Sail usado (49).</p>
        </div>

        <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-6">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-xl">📞</span>
                <h3 class="text-lg font-semibold text-white">Hallazgo: las visitas crecen, los contactos todavía no</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-3">Entre septiembre y noviembre el sitio registró <strong class="text-white">7 clics a WhatsApp y 2 formularios</strong>. Con 1.175 visitas desde buscadores en ese tiempo, es muy poco. Dos razones:</p>
            <ul class="space-y-2 text-sm text-slate-300">
                <li class="flex gap-2"><span class="text-red-400">▸</span><div><strong>El botón de WhatsApp solo está en las fichas de vehículo.</strong> La página principal, las guías y las páginas de marca no tienen una salida visible para escribir.</div></li>
                <li class="flex gap-2"><span class="text-red-400">▸</span><div><strong>Las páginas con más tráfico son de trámites</strong> (traspaso de auto y de moto). Quien llega ahí está vendiendo o haciendo un papeleo, no necesariamente comprando. A esa persona hay que ofrecerle otra cosa: recibir su auto en parte de pago o comprárselo.</div></li>
            </ul>
        </div>

        <div class="rounded-xl border border-sky-500/30 bg-sky-500/5 p-6">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-xl">🔎</span>
                <h3 class="text-lg font-semibold text-white">Actualización al 26 de noviembre</h3>
            </div>
            <ul class="space-y-3 text-sm text-slate-300">
                <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Las visitas se mantienen en su nuevo nivel:</strong> 17,7 clics al día del 12 al 24 de noviembre, frente a 16,3 entre mediados de octubre y comienzos de noviembre. Las búsquedas de marca bajaron a 24 % de los clics: tres de cada cuatro llegan sin conocer OKCars.</div></li>
                <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Los contactos siguen sin moverse:</strong> 3 clics a WhatsApp por mes en septiembre, octubre y noviembre, mientras las visitas al sitio pasaron de 577 a 895 al mes. Confirma el hallazgo: la visita llega, pero no encuentra cómo escribir. En los tres meses, 2 de esos clics salieron de la guía de traspaso, que tiene un enlace a WhatsApp dentro del texto: donde hay salida, la gente la usa.</div></li>
                <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Los títulos reescritos en septiembre funcionaron:</strong> la guía de traspaso pasó de 28 a 54 clics al mes, y la lista para revisar un auto usado, de 12 a 25.</div></li>
                <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Blog:</strong> 112 artículos publicados y 3 programados. Los 5 de diciembre están listos y se publican a partir del 1 de diciembre para completar los 120.</div></li>
                <li class="flex gap-2"><span class="text-sky-400">▸</span><div><strong>Dimos de alta el sitio en Bing</strong>, el buscador que usan Copilot y ChatGPT. En unos días tendremos sus datos.</div></li>
            </ul>
        </div>

        <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-6">
            <div class="flex items-center gap-2 mb-4">
                <span class="text-xl">✅</span>
                <h3 class="text-lg font-semibold text-white">Lo que hicimos</h3>
            </div>
            <ul class="space-y-2 text-sm text-slate-300">
                <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Fichas de autos vendidos:</strong> al vender un vehículo, su ficha pasaba a borrador y Google encontraba una página con error. Era el destino del <strong>87 % de las apariciones de fichas</strong>. Instalamos 13 redirecciones (12 fichas vendidas y una regla general que manda al listado cualquier ficha que ya no existe) y dejamos un instructivo para su equipo.</div></li>
                <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Títulos y descripciones reescritos</strong> en las páginas con más apariciones y pocos clics, entre ellas traspaso y seguro vehicular.</div></li>
                <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Seguro vehicular:</strong> dos artículos competían por la misma búsqueda. Se fusionaron en uno de 1.722 palabras, se corrigió el nombre del seguro obligatorio (es SPPAT, no SOAT desde 2016) y se quitaron datos de descuentos que no estaban verificados.</div></li>
                <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>40 artículos nuevos</strong> en octubre y noviembre, elegidos con datos de búsqueda: modelos usados, trámites, seguros, financiamiento y guías de compra. El blog pasó a 115.</div></li>
                <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Todo el contenido en «usted»</strong>, el mismo tono de Comercial Hidrobo.</div></li>
                <li class="flex gap-2"><span class="text-emerald-400">▸</span><div><strong>Los últimos 5 artículos ya están escritos</strong> y salen en diciembre: Ford Escape, Kia Sorento, Toyota RAV4 y Hyundai Creta usados, y SUV usadas por menos de $15.000. Con ellos se completan los <strong>120 del plan</strong>.</div></li>
            </ul>
        </div>

        <div class="rounded-xl border border-brand-500/30 bg-brand-500/5 p-6">
            <div class="flex items-center gap-2 mb-4">
                <span class="text-xl">🎯</span>
                <h3 class="text-lg font-semibold text-white">Lo que sigue, en orden de retorno</h3>
            </div>
            <ol class="space-y-3 text-sm text-slate-300">
                <li class="flex gap-3"><span class="text-brand-400 font-bold">1.</span><div><strong>Botón de WhatsApp en todo el sitio</strong>, no solo en las fichas. Es lo que convierte en contactos las visitas que ya están llegando.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">2.</span><div><strong>En las guías de traspaso, ofrecer recibir o comprar el auto</strong> de quien está vendiendo. Son las páginas con más tráfico y hoy no le ofrecen nada a ese lector.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">3.</span><div><strong>Completar los 120 artículos</strong> en diciembre y medir en enero cuáles de los 45 nuevos traen visitas, para decidir el contenido de 2027.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">4.</span><div><strong>Mantener actualizadas las fichas</strong> con año y kilometraje. Para su equipo: cuando se vende un auto, la regla general ya lleva al listado; no hace falta hacer nada más.</div></li>
            </ol>
        </div>
    </div>
</div>
