<?php /* Tab Avance Agosto 2026 — incluido desde index.php */ ?>
<div id="tab-agosto" class="tab-content space-y-8">

    <!-- Header -->
    <div class="rounded-xl border border-brand-500/30 bg-gradient-to-br from-brand-500/10 to-purple-500/5 p-6">
        <div class="flex items-center gap-3 mb-2">
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-brand-500/20 text-brand-400">Informe de avance</span>
            <span class="text-xs text-slate-400">Periodo analizado: 21 mayo – 18 agosto 2026 (90 días)</span>
        </div>
        <h2 class="text-3xl font-bold text-white mb-2">Avance del plan — corte de agosto 2026</h2>
        <p class="text-sm text-slate-400 leading-relaxed">Segundo corte del plan de seis meses. Cubre <strong class="text-slate-300">Comercial Hidrobo</strong> y <strong class="text-slate-300">OKCars</strong> con datos de Google Analytics 4 y Search Console del período. Trae dos hallazgos que cambian cómo hay que leer los resultados: uno sobre <strong class="text-slate-300">contactos que el sistema no está contando</strong> y otro sobre <strong class="text-slate-300">dónde se está perdiendo el tráfico que ya se ganó</strong>.</p>
    </div>

    <!-- Sub-tabs -->
    <div class="flex gap-2 border-b border-slate-800 pb-2">
        <button onclick="subSwitch('agosto', 'ch')" id="sub-agosto-ch-btn" class="sub-btn active px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Comercial Hidrobo</button>
        <button onclick="subSwitch('agosto', 'ok')" id="sub-agosto-ok-btn" class="sub-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">OKCars</button>
    </div>

    <!-- ══════════════ COMERCIAL HIDROBO ══════════════ -->
    <div id="sub-agosto-ch" class="sub-content active">

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Impresiones en Google</p>
                <p class="text-3xl font-bold text-white">999.521</p>
                <p class="text-xs text-slate-500 mt-1">veces que apareció el sitio</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics orgánicos</p>
                <p class="text-3xl font-bold text-emerald-400">12.810</p>
                <p class="text-xs text-slate-500 mt-1">CTR 1,28 %</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Usuarios</p>
                <p class="text-3xl font-bold text-brand-500">16.076</p>
                <p class="text-xs text-slate-500 mt-1">19.324 sesiones</p>
            </div>
            <div class="rounded-xl border border-emerald-500/40 bg-emerald-500/10 p-5">
                <p class="text-xs text-emerald-400 uppercase tracking-wider mb-1">Contactos generados</p>
                <p class="text-3xl font-bold text-emerald-400">288</p>
                <p class="text-xs text-slate-400 mt-1">WhatsApp y formularios</p>
            </div>
        </div>

        <div class="rounded-xl border border-emerald-500/30 bg-gradient-to-r from-emerald-500/10 to-transparent p-5 mt-4">
            <p class="text-sm text-slate-200 leading-relaxed"><strong class="text-emerald-400">Lo primero que hay que saber de este corte:</strong> el trabajo de posicionamiento está trayendo clientes. En 90 días <strong class="text-white">288 personas se pusieron en contacto</strong> desde el sitio —170 por WhatsApp y 118 por formulario—, y ocho de cada diez visitantes llegaron desde una búsqueda en Google. El panel de Analytics solo reporta 73 de esos contactos por un tema de configuración que se explica más abajo, así que <strong class="text-white">el retorno real del trabajo es bastante mayor de lo que muestran las cifras del sistema</strong>.</p>
        </div>

        <!-- ── Hallazgo 1: contactos sin contar ── -->
        <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-6 mt-8">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-xl">📞</span>
                <h3 class="text-lg font-semibold text-white">Hallazgo 1: su sitio genera cuatro veces más contactos de los que el sistema reporta</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">Al revisar la configuración de medición encontramos que Google Analytics está registrando solo una parte de los contactos reales. En estos 90 días el sitio generó <strong class="text-emerald-400">288 contactos</strong>, pero el panel de conversiones muestra <strong class="text-red-400">73</strong>.</p>

            <div class="grid md:grid-cols-3 gap-4 mb-4">
                <div class="rounded-lg border border-slate-800/50 bg-slate-900/40 p-4">
                    <p class="text-xs text-slate-500 mb-1">Clics al botón de WhatsApp</p>
                    <p class="text-2xl font-bold text-emerald-400">170</p>
                    <p class="text-xs text-slate-500 mt-1">de 150 personas distintas</p>
                </div>
                <div class="rounded-lg border border-slate-800/50 bg-slate-900/40 p-4">
                    <p class="text-xs text-slate-500 mb-1">Formularios enviados</p>
                    <p class="text-2xl font-bold text-emerald-400">118</p>
                    <p class="text-xs text-slate-500 mt-1">de 102 personas distintas</p>
                </div>
                <div class="rounded-lg border border-red-500/30 bg-red-500/5 p-4">
                    <p class="text-xs text-red-400 mb-1">Lo que reporta el panel</p>
                    <p class="text-2xl font-bold text-white">73</p>
                    <p class="text-xs text-slate-500 mt-1">falta el 75 %</p>
                </div>
            </div>

            <p class="text-sm text-slate-300 leading-relaxed mb-3">La causa es de configuración, no del sitio. El sitio ya mide correctamente <strong class="text-white">todos</strong> los envíos de formulario, pero en el panel solo están marcados como conversión dos formularios concretos: el de cita de taller y el de repuestos. Todo lo demás se registra y no se cuenta:</p>
            <div class="overflow-x-auto mb-4">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                            <th class="text-left py-2">Acción de contacto</th>
                            <th class="text-right py-2">Veces</th>
                            <th class="text-center py-2">¿Se cuenta hoy?</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr class="border-b border-slate-800/50"><td class="py-2">Clic al botón de WhatsApp</td><td class="text-right font-semibold">170</td><td class="text-center text-red-400">No</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Formulario enviado <span class="text-xs text-slate-500">(cualquier formulario del sitio)</span></td><td class="text-right font-semibold">118</td><td class="text-center text-red-400">No</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Formulario de cita de taller</td><td class="text-right">62</td><td class="text-center text-emerald-400">Sí</td></tr>
                        <tr><td class="py-2">Formulario de repuestos</td><td class="text-right">11</td><td class="text-center text-emerald-400">Sí</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-3">El más importante de la lista es <strong class="text-white">«formulario enviado»</strong>, con 118 envíos. Se dispara con <strong class="text-white">cualquier</strong> formulario del sitio, así que <strong class="text-white">ya incluye</strong> a los de taller (62) y repuestos (11). No son cifras que se sumen: los 73 que hoy se cuentan son una parte de esos 118.</p>
            <div class="rounded-lg border border-slate-800/50 bg-slate-900/40 p-4 mb-4">
                <p class="text-sm text-slate-300 leading-relaxed">Dicho en claro: al activar «formulario enviado» como conversión, el conteo de formularios pasa de <strong class="text-red-400">73</strong> a <strong class="text-emerald-400">118</strong>. Son <strong class="text-white">45 personas más</strong> que dejaron sus datos por otros formularios del sitio y que hoy no aparecen en ningún reporte. Sumando los 170 clics a WhatsApp, el total de contactos del período es <strong class="text-emerald-400">288</strong>.</p>
            </div>
            <p class="text-sm text-slate-400 leading-relaxed">Es un ajuste de minutos y no requiere tocar la web. <strong class="text-slate-300">Importante:</strong> las conversiones solo se cuentan desde el momento en que se corrigen; el histórico no se recalcula. Mientras antes se haga, antes empieza a medirse bien.</p>
        </div>

        <!-- ── Hallazgo 2: CTR ── -->
        <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-6 mt-8">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-xl">🎯</span>
                <h3 class="text-lg font-semibold text-white">Hallazgo 2: el sitio ya está en la primera página de Google, pero no se lo están llevando</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">Comercial Hidrobo aparece <strong class="text-white">casi un millón de veces</strong> en Google cada trimestre. De esas, solo 12.810 personas hacen clic. El problema ya no es posicionar: <strong class="text-amber-400">40 páginas están en posiciones 1 a 10 y aun así reciben menos del 2 % de los clics</strong>, cuando lo esperable en esas posiciones es entre 3 % y 6 %.</p>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                            <th class="text-left py-2">Página</th>
                            <th class="text-right py-2">Impresiones</th>
                            <th class="text-right py-2">Clics</th>
                            <th class="text-right py-2">CTR</th>
                            <th class="text-right py-2">Posición</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr class="border-b border-slate-800/50"><td class="py-2">Cilindrada del motor</td><td class="text-right">54.918</td><td class="text-right">254</td><td class="text-right text-red-400">0,46 %</td><td class="text-right">5,4</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Camionetas con mejor consumo</td><td class="text-right">31.418</td><td class="text-right">301</td><td class="text-right text-red-400">0,96 %</td><td class="text-right">6,2</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Cómo funciona la exoneración</td><td class="text-right">30.012</td><td class="text-right">268</td><td class="text-right text-red-400">0,89 %</td><td class="text-right">8,4</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Qué significa torque</td><td class="text-right">23.396</td><td class="text-right">88</td><td class="text-right text-red-400">0,38 %</td><td class="text-right">6,3</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Renault Duster (URL duplicada)</td><td class="text-right">22.356</td><td class="text-right">293</td><td class="text-right text-amber-400">1,31 %</td><td class="text-right">6,8</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Renault Duster 2025 precio</td><td class="text-right">21.713</td><td class="text-right">299</td><td class="text-right text-amber-400">1,38 %</td><td class="text-right">5,8</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Seguro auto nuevo</td><td class="text-right">20.730</td><td class="text-right">37</td><td class="text-right text-red-400">0,18 %</td><td class="text-right">9,9</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">DongFeng Huge 2025 precio</td><td class="text-right">17.102</td><td class="text-right">140</td><td class="text-right text-red-400">0,82 %</td><td class="text-right">6,2</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Renault Arkana 2025</td><td class="text-right">16.883</td><td class="text-right">107</td><td class="text-right text-red-400">0,63 %</td><td class="text-right">4,6</td></tr>
                        <tr><td class="py-2">Chery Arrizo 5</td><td class="text-right">16.169</td><td class="text-right">36</td><td class="text-right text-red-400">0,22 %</td><td class="text-right">7,8</td></tr>
                    </tbody>
                </table>
            </div>

            <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/5 p-4 mt-5">
                <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-emerald-400">La oportunidad, en números:</strong> esas 40 páginas suman <strong class="text-white">526.878 impresiones</strong>. Llevarlas a un CTR del 3 % —lo normal para su posición— significaría <strong class="text-emerald-400">unos 7.100 clics adicionales por trimestre</strong>, más de la mitad de todo lo que el sitio recibe hoy. Sin escribir un solo artículo nuevo.</p>
            </div>

            <p class="text-sm text-slate-400 leading-relaxed mt-4">¿Por qué no hacen clic? Al revisar los títulos aparecen tres patrones que se repiten:</p>
            <ul class="space-y-2 text-sm text-slate-300 mt-3">
                <li class="flex gap-2"><span class="text-amber-400">1.</span><div><strong>Títulos con el año vencido.</strong> Varias páginas dicen «2025» en pleno agosto de 2026. Quien busca un auto quiere el modelo del año en curso y descarta el resultado sin abrirlo.</div></li>
                <li class="flex gap-2"><span class="text-amber-400">2.</span><div><strong>Las descripciones son plantilla.</strong> Casi todas empiezan con «Descubre…». No dan un motivo concreto para entrar.</div></li>
                <li class="flex gap-2"><span class="text-amber-400">3.</span><div><strong>El título no responde lo que se busca.</strong> La página de la RAM 1500 habla de «lujo y motor HEMI», pero la gente busca <em>«ram 1500 precio ecuador»</em>. Son 1.018 impresiones con 4 clics.</div></li>
            </ul>
        </div>

        <!-- ── URL con typo ── -->
        <div class="rounded-xl border border-red-500/30 bg-red-500/5 p-6 mt-8">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-xl">🔧</span>
                <h3 class="text-lg font-semibold text-white">Detalle técnico: una dirección mal escrita acumula 22.356 impresiones</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-3">Existe una página en <code class="text-xs bg-slate-800 px-1 rounded">/<strong class="text-red-400">reanult</strong>/renault-duster/</code> — con la marca mal escrita en la dirección. No es un detalle menor: esa dirección recibe <strong class="text-white">22.356 impresiones</strong> y funciona con normalidad.</p>
            <p class="text-sm text-slate-300 leading-relaxed mb-3">Al verificarlo encontramos que la versión correcta, <code class="text-xs bg-slate-800 px-1 rounded">/renault/renault-duster/</code>, ya fue reorganizada y hoy redirige a <code class="text-xs bg-slate-800 px-1 rounded">/vehiculos/renault-duster/</code>. La versión con el error de tipeo quedó fuera de esa reorganización y sigue viva.</p>
            <p class="text-sm text-slate-400 leading-relaxed">Resultado: dos direcciones del mismo vehículo compitiendo entre sí en Google, que reparte la fuerza entre ambas en lugar de concentrarla. Se resuelve redirigiendo la dirección con el error a la correcta, conservando el historial acumulado.</p>
        </div>

        <!-- ── De dónde viene el tráfico ── -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">De dónde llegan sus visitantes</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                            <th class="text-left py-2">Canal</th>
                            <th class="text-right py-2">Sesiones</th>
                            <th class="text-right py-2">Peso</th>
                            <th class="text-right py-2">Se quedan a interactuar</th>
                            <th class="text-right py-2">Tiempo</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr class="border-b border-slate-800/50"><td class="py-2 text-emerald-400 font-semibold">Búsqueda en Google</td><td class="text-right">15.538</td><td class="text-right text-emerald-400 font-semibold">80,4 %</td><td class="text-right">54,7 %</td><td class="text-right">49 s</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Directo</td><td class="text-right">2.963</td><td class="text-right">15,3 %</td><td class="text-right">27,7 %</td><td class="text-right">16 s</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Sin asignar</td><td class="text-right">359</td><td class="text-right">1,9 %</td><td class="text-right">45,7 %</td><td class="text-right">35 s</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Redes sociales</td><td class="text-right">133</td><td class="text-right">0,7 %</td><td class="text-right">41,4 %</td><td class="text-right">32 s</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Redes de pago</td><td class="text-right">79</td><td class="text-right">0,4 %</td><td class="text-right">44,3 %</td><td class="text-right">46 s</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Enlaces de otros sitios</td><td class="text-right">74</td><td class="text-right">0,4 %</td><td class="text-right">70,3 %</td><td class="text-right">1 m 21 s</td></tr>
                        <tr><td class="py-2">Asistentes de IA</td><td class="text-right">48</td><td class="text-right">0,3 %</td><td class="text-right">64,6 %</td><td class="text-right">54 s</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-sm text-slate-400 leading-relaxed mt-4"><strong class="text-slate-300">Ocho de cada diez visitantes llegan por Google.</strong> Y son los que mejor se comportan después de entrar: interactúan más que el tráfico directo (54,7 % contra 27,7 %) y se quedan el triple de tiempo. Es el canal que sostiene el sitio.</p>
            <p class="text-sm text-slate-400 leading-relaxed mt-3">Aparece además un canal nuevo que vale seguir de cerca: <strong class="text-slate-300">48 sesiones desde asistentes de IA</strong> (ChatGPT, Gemini). Es poco volumen todavía, pero con un comportamiento notable: 64,6 % de interacción, muy por encima del promedio. Es tráfico de gente que llegó ya informada.</p>
        </div>

        <!-- ── Páginas que más traen ── -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Las páginas que más tráfico traen</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                            <th class="text-left py-2">Página</th>
                            <th class="text-right py-2">Clics</th>
                            <th class="text-right py-2">Impresiones</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr class="border-b border-slate-800/50"><td class="py-2">Autos eléctricos en Ecuador</td><td class="text-right text-emerald-400 font-semibold">1.700</td><td class="text-right">62.462</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Página principal</td><td class="text-right">1.016</td><td class="text-right">13.078</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Marcas de autos chinos más confiables</td><td class="text-right">859</td><td class="text-right">32.278</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Tabla de mantenimiento Toyota</td><td class="text-right">497</td><td class="text-right">26.191</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Matriculación vehicular Imbabura 2026</td><td class="text-right">361</td><td class="text-right">15.236</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Changan Deepal S05</td><td class="text-right">355</td><td class="text-right">15.294</td></tr>
                        <tr><td class="py-2">Camionetas con mejor consumo</td><td class="text-right">301</td><td class="text-right">31.418</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-sm text-slate-400 leading-relaxed mt-4">Los dos ejes que veníamos siguiendo se confirman: <strong class="text-slate-300">eléctricos e híbridos</strong> y <strong class="text-slate-300">autos chinos</strong> ocupan el primer y tercer puesto. La página de autos eléctricos sola trae el 13 % de todo el tráfico del sitio.</p>
        </div>

        <!-- ── Trabajo realizado ── -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Trabajo realizado en el período</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-brand-500 mb-3">Análisis y diagnóstico</h4>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Inventario completo de los 196 artículos publicados</strong>, para que todo contenido nuevo cubra territorio libre y no compita con lo existente.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Cruce de Search Console con los 27.651 términos de búsqueda</strong> del período, para priorizar por demanda medida en lugar de por intuición.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Auditoría de la configuración de medición</strong> en Analytics, de donde salió el hallazgo de los 288 contactos.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Detección de la dirección duplicada</strong> de Renault Duster y verificación de su estado actual.</div></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">Preparado y listo para ejecutar</h4>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li class="flex gap-2"><span class="text-amber-400">▸</span><div><strong>12 títulos y descripciones reescritos</strong> para las páginas de la tabla de arriba. Es la acción de mayor retorno del trimestre.</div></li>
                        <li class="flex gap-2"><span class="text-amber-400">▸</span><div><strong>20 artículos nuevos planificados</strong> y priorizados por demanda real: RAM (3), trámites y matriculación (5), exoneración (2), Renault y Nissan (4), marcas emergentes (2) y conversión local (4).</div></li>
                        <li class="flex gap-2"><span class="text-amber-400">▸</span><div><strong>Corrección de la configuración de conversiones</strong> en Analytics.</div></li>
                    </ul>
                    <p class="text-xs text-slate-500 mt-4 leading-relaxed">Sobre el bloque de marcas emergentes: el plan original contemplaba cinco artículos sobre Omoda, Geely, BYD y Jetour. Los datos mostraron que entre todas suman apenas 250 impresiones — la demanda todavía no existe. Se redujo a dos artículos de posicionamiento anticipado y el resto se reasignó a temas con demanda comprobada.</p>
                </div>
            </div>
        </div>

        <!-- ── Recomendaciones ── -->
        <div class="rounded-xl border border-brand-500/30 bg-brand-500/5 p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Qué hacer primero, en orden de retorno</h3>
            <ol class="space-y-3 text-sm text-slate-300">
                <li class="flex gap-3"><span class="text-brand-400 font-bold">1.</span><div><strong>Corregir la medición de conversiones.</strong> Minutos de trabajo y sin tocar la web. Sin esto no se puede saber cuántos clientes trae el trabajo SEO, y hoy se está subestimando en un 75 %.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">2.</span><div><strong>Reescribir los 12 títulos y descripciones.</strong> Potencial de ~7.100 clics adicionales por trimestre sobre tráfico que ya está ganado. No requiere contenido nuevo.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">3.</span><div><strong>Resolver la dirección duplicada de Renault Duster.</strong> Concentra 22.356 impresiones que hoy se reparten entre dos direcciones.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">4.</span><div><strong>Publicar los 20 artículos nuevos</strong>, escalonados a lo largo del mes.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">5.</span><div><strong>Actualizar los títulos que dicen «2025»</strong> en todo el sitio, no solo en las doce páginas prioritarias.</div></li>
            </ol>
        </div>
    </div>

    <!-- ══════════════ OKCARS ══════════════ -->
    <div id="sub-agosto-ok" class="sub-content">

        <div class="rounded-xl border border-slate-800/50 glass p-6">
            <p class="text-sm text-slate-300 leading-relaxed">OKCars es un sitio joven y su lectura es distinta a la de Comercial Hidrobo. Aquí todavía no se mide en ventas: se mide en <strong class="text-white">si el sitio está logrando que gente que no conocía la marca llegue a él</strong>. La estrategia es la correcta para esta etapa — primero atraer con contenido útil, después convertir.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Impresiones</p>
                <p class="text-3xl font-bold text-white">16.728</p>
                <p class="text-xs text-slate-500 mt-1">apariciones en Google</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics orgánicos</p>
                <p class="text-3xl font-bold text-emerald-400">222</p>
                <p class="text-xs text-slate-500 mt-1">CTR 1,33 %</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Páginas con tráfico</p>
                <p class="text-3xl font-bold text-brand-500">42</p>
                <p class="text-xs text-slate-500 mt-1">eran 36 en mayo</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Sesiones totales</p>
                <p class="text-3xl font-bold text-purple-400">783</p>
                <p class="text-xs text-slate-500 mt-1">43,7 % desde Google</p>
            </div>
        </div>

        <!-- ── El contenido funciona ── -->
        <div class="rounded-xl border border-emerald-500/30 bg-emerald-500/5 p-6 mt-8">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-xl">📈</span>
                <h3 class="text-lg font-semibold text-white">El contenido está trayendo un tercio del tráfico del sitio</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">De las 42 páginas de OKCars que reciben visitas desde Google, <strong class="text-emerald-400">las tres que siguen a la página principal son artículos del blog</strong>. Entre las tres suman 73 clics: el <strong class="text-white">33 % de todo el tráfico orgánico</strong> del sitio.</p>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                            <th class="text-left py-2">Página</th>
                            <th class="text-right py-2">Clics</th>
                            <th class="text-right py-2">Impresiones</th>
                            <th class="text-right py-2">Posición</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr class="border-b border-slate-800/50"><td class="py-2">Página principal</td><td class="text-right">138</td><td class="text-right">3.569</td><td class="text-right">9,2</td></tr>
                        <tr class="border-b border-slate-800/50 bg-emerald-500/5"><td class="py-2 text-emerald-400">Traspaso de vehículo: requisitos y pasos</td><td class="text-right">32</td><td class="text-right">5.901</td><td class="text-right">7,7</td></tr>
                        <tr class="border-b border-slate-800/50 bg-emerald-500/5"><td class="py-2 text-emerald-400">Checklist para revisar un auto usado</td><td class="text-right">31</td><td class="text-right">2.419</td><td class="text-right">8,4</td></tr>
                        <tr class="border-b border-slate-800/50 bg-emerald-500/5"><td class="py-2 text-emerald-400">Guía para comprar el primer auto</td><td class="text-right">10</td><td class="text-right">778</td><td class="text-right">6,5</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Listado de vehículos</td><td class="text-right">4</td><td class="text-right">264</td><td class="text-right">9,5</td></tr>
                        <tr><td class="py-2">Seguro vehicular para autos usados</td><td class="text-right">2</td><td class="text-right">2.487</td><td class="text-right">15,7</td></tr>
                    </tbody>
                </table>
            </div>
            <p class="text-xs text-slate-500 mt-3">En verde, artículos publicados dentro del plan de contenido.</p>

            <p class="text-sm text-slate-300 leading-relaxed mt-4">Y hay un dato que importa más que los clics: <strong class="text-white">esos artículos son las páginas donde la gente se queda</strong>. Los lectores del artículo de traspaso pasan <strong class="text-emerald-400">1 minuto 11 segundos</strong> en la página, y los del checklist <strong class="text-emerald-400">1 minuto 07</strong>. Para comparar, las páginas de marca retienen entre 13 y 16 segundos.</p>
        </div>

        <!-- ── Marca vs no marca ── -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">El cambio más importante del período</h3>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">En el informe anterior, <strong class="text-white">el 84 % del tráfico venía de gente que ya buscaba «OKCars» por su nombre</strong>. Es decir, el sitio recibía a quien ya conocía la marca, pero no atraía a nadie nuevo.</p>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="rounded-lg border border-slate-800/50 bg-slate-900/40 p-4">
                    <p class="text-xs text-slate-500 mb-1">Impresiones en mayo</p>
                    <p class="text-2xl font-bold text-slate-400">~6.900</p>
                    <p class="text-xs text-slate-500 mt-1">36 páginas con tráfico</p>
                </div>
                <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/5 p-4">
                    <p class="text-xs text-slate-500 mb-1">Impresiones ahora</p>
                    <p class="text-2xl font-bold text-emerald-400">16.728</p>
                    <p class="text-xs text-slate-500 mt-1">42 páginas con tráfico</p>
                </div>
            </div>
            <p class="text-sm text-slate-400 leading-relaxed mt-4">Las apariciones en Google se multiplicaron por 2,4. El CTR bajó de 3,16 % a 1,33 %, y eso <strong class="text-slate-300">es esperable y buena señal</strong>: cuando un sitio solo aparece para su propio nombre, casi todos hacen clic. Al empezar a aparecer para búsquedas como «traspaso de vehículo» o «revisar un auto usado» —donde compite contra muchos más resultados y está en posición 7 a 9— el porcentaje baja pero el alcance crece. Es el camino normal de un sitio que pasa de ser conocido a ser encontrado.</p>
        </div>

        <!-- ── El cuello de botella ── -->
        <div class="rounded-xl border border-amber-500/30 bg-amber-500/5 p-6 mt-8">
            <div class="flex items-center gap-2 mb-3">
                <span class="text-xl">🚪</span>
                <h3 class="text-lg font-semibold text-white">El cuello de botella: el 80 % del tráfico llega a páginas sin forma de contactar</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">Al revisar el sitio encontramos que <strong class="text-white">el botón de WhatsApp existe solo en las fichas de cada vehículo</strong>. La página principal, los artículos del blog, las páginas de marca, financiamiento y contacto no lo tienen.</p>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-slate-500 uppercase tracking-wider border-b border-slate-800">
                            <th class="text-left py-2">Página</th>
                            <th class="text-right py-2">Vistas</th>
                            <th class="text-right py-2">Tiempo</th>
                            <th class="text-center py-2">¿Botón de contacto?</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-300">
                        <tr class="border-b border-slate-800/50"><td class="py-2">Página principal</td><td class="text-right">649</td><td class="text-right">30 s</td><td class="text-center text-red-400">No</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Listado de vehículos</td><td class="text-right">267</td><td class="text-right">51 s</td><td class="text-center text-emerald-400">Sí</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Artículo de traspaso</td><td class="text-right">100</td><td class="text-right">1 m 11 s</td><td class="text-center text-red-400">No</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Artículo checklist</td><td class="text-right">67</td><td class="text-right">1 m 07 s</td><td class="text-center text-red-400">No</td></tr>
                        <tr class="border-b border-slate-800/50"><td class="py-2">Páginas de marca (Kia, Toyota, Hyundai, Ford)</td><td class="text-right">207</td><td class="text-right">13–34 s</td><td class="text-center text-red-400">No</td></tr>
                        <tr><td class="py-2">Ficha Hyundai Tucson</td><td class="text-right">53</td><td class="text-right">33 s</td><td class="text-center text-emerald-400">Sí</td></tr>
                    </tbody>
                </table>
            </div>

            <p class="text-sm text-slate-300 leading-relaxed mt-4">De las <strong class="text-white">1.659 vistas</strong> del período, alrededor de <strong class="text-white">320 ocurren en páginas con botón de contacto</strong>. Las otras 1.300 terminan en una página sin salida.</p>
            <p class="text-sm text-slate-300 leading-relaxed mt-3">Lo llamativo es que <strong class="text-amber-400">las páginas donde la gente más tiempo se queda son justamente las que no ofrecen nada al final</strong>: los dos artículos superan el minuto de lectura, frente a los 13 segundos de las páginas de marca. Son visitantes interesados, que leyeron completo, y que al terminar no encuentran un botón.</p>
            <div class="rounded-lg border border-emerald-500/30 bg-emerald-500/5 p-4 mt-4">
                <p class="text-sm text-slate-300 leading-relaxed"><strong class="text-emerald-400">Recomendación:</strong> agregar un botón flotante de WhatsApp en todo el sitio —como el que ya tiene Comercial Hidrobo— y un llamado al final de cada artículo. Es el cambio con mejor relación esfuerzo-resultado que tiene OKCars ahora mismo, y no depende de ganar más tráfico: aprovecha el que ya llega.</p>
            </div>
        </div>

        <!-- ── Medición ── -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Medición: instalada durante este período</h3>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">Hasta agosto, OKCars registraba visitas pero no contactos: no existía forma de saber cuántas personas escribían por WhatsApp o enviaban un formulario, porque el sitio <strong class="text-white">no tenía instalado el gestor de etiquetas</strong> que hace posible esa medición. <strong class="text-emerald-400">Durante este corte se creó e instaló</strong>, integrado con la configuración que ya existía para que no se dupliquen los datos.</p>
            <ul class="space-y-2 text-sm text-slate-300">
                <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Gestor de etiquetas instalado</strong> en el sitio, integrado con la configuración existente para no duplicar datos.</div></li>
                <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Seguimiento de clics a WhatsApp</strong> configurado.</div></li>
                <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Seguimiento de envío de formularios</strong> configurado. Los formularios del sitio envían sin recargar la página, lo que impide que se midan de forma automática; se resolvió con configuración específica.</div></li>
            </ul>
            <p class="text-sm text-slate-400 leading-relaxed mt-4">A partir del próximo corte se podrá reportar <strong class="text-slate-300">cuántos contactos genera cada artículo</strong>, y no solo cuántas visitas. Conviene tener presente que los primeros números serán bajos mientras el botón de contacto siga limitado a las fichas de vehículo.</p>
        </div>

        <!-- ── Próximos pasos OK ── -->
        <div class="rounded-xl border border-brand-500/30 bg-brand-500/5 p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Próximos pasos para OKCars</h3>
            <ol class="space-y-3 text-sm text-slate-300">
                <li class="flex gap-3"><span class="text-brand-400 font-bold">1.</span><div><strong>Agregar el botón de contacto</strong> en la página principal, los artículos y las páginas de marca. Es lo que desbloquea todo lo demás.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">2.</span><div><strong>20 artículos nuevos ya programados</strong> entre septiembre y octubre, enfocados en el hueco de mayor demanda detectado: financiamiento y crédito (8), seguros (4), trámites (4) y decisión de compra (4).</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">3.</span><div><strong>Mejorar el título de la página principal.</strong> Recibe 3.569 impresiones en posición 9,2 con 3,87 % de CTR: hay margen claro.</div></li>
                <li class="flex gap-3"><span class="text-brand-400 font-bold">4.</span><div><strong>Revisar la página de seguro vehicular:</strong> 2.487 impresiones y 2 clics. Google la muestra pero nadie entra.</div></li>
            </ol>
        </div>
    </div>
</div>
