<?php /* Tab Avance Mayo 2026 — incluido desde index.php */ ?>
<div id="tab-avance" class="tab-content space-y-8">

    <!-- Header del informe -->
    <div class="rounded-xl border border-brand-500/30 bg-gradient-to-br from-brand-500/10 to-purple-500/5 p-6">
        <div class="flex items-center gap-3 mb-2">
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-brand-500/20 text-brand-400">Informe Mes 1</span>
            <span class="text-xs text-slate-400">Periodo analizado: 1 enero – 22 mayo 2026</span>
        </div>
        <h2 class="text-3xl font-bold text-white mb-2">Informe SEO Mes 1 — Abril/Mayo 2026</h2>
        <p class="text-sm text-slate-400 leading-relaxed">Este documento presenta el avance del trabajo SEO ejecutado durante el primer mes del plan de 6 meses para <strong class="text-slate-300">Comercial Hidrobo</strong> y <strong class="text-slate-300">OKCars</strong>. Cubre métricas reales de Google Analytics 4 y Google Search Console del año en curso, el contenido publicado y en revisión, configuración técnica de medición (GTM) y un hallazgo clave: el despunte de búsquedas de autos eléctricos en Ecuador detectado en el sitio de Comercial Hidrobo.</p>
    </div>

    <!-- Sub-tabs internos -->
    <div class="flex gap-2 border-b border-slate-800 pb-2">
        <button onclick="subSwitch('avance', 'ch')" id="sub-avance-ch-btn" class="sub-btn active px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">Comercial Hidrobo</button>
        <button onclick="subSwitch('avance', 'ok')" id="sub-avance-ok-btn" class="sub-btn px-4 py-2 text-sm font-medium rounded-lg border border-slate-700/50 text-slate-400 hover:text-white transition">OKCars</button>
    </div>

    <!-- ================== SUB-SECCION CH ================== -->
    <div id="sub-avance-ch" class="sub-content active">

        <!-- Métricas headline CH -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Usuarios activos</p>
                <p class="text-3xl font-bold text-white">27.069</p>
                <p class="text-xs text-slate-500 mt-1">Ene 1 – May 22 2026</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics orgánicos</p>
                <p class="text-3xl font-bold text-emerald-400">8.952</p>
                <p class="text-xs text-slate-500 mt-1">871.854 impresiones</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Queries en Google</p>
                <p class="text-3xl font-bold text-brand-500">62.700</p>
                <p class="text-xs text-slate-500 mt-1">búsquedas únicas</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Páginas con tráfico</p>
                <p class="text-3xl font-bold text-purple-400">731</p>
                <p class="text-xs text-slate-500 mt-1">URLs con clics orgánicos</p>
            </div>
        </div>

        <!-- Trabajo realizado en el mes -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Trabajo realizado en el sitio</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-brand-500 mb-3">Contenido nuevo</h4>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>16 artículos publicados el 4 de mayo</strong> en el blog de Comercial Hidrobo. Cubren modelos clave (Renault Duster, Mazda CX-30, Fiat Pulse, Changan Hunter Plus, DongFeng Rich 6), comparativas, taller, financiamiento, seguros, trámites y matriculación.</div></li>
                        <li class="flex gap-2"><span class="text-amber-400">⏳</span><div><strong>35 artículos adicionales en revisión interna</strong>: 20 del plan de abril, 4 complementarios de mayo y 11 del cluster Híbridos/Eléctricos. Se publican una vez aprobados.</div></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-brand-500 mb-3">Configuración técnica</h4>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Google Tag Manager activo</strong> (contenedor GTM-WZDVLBX3) con dos eventos clave funcionando: <code class="text-xs bg-slate-800 px-1 rounded">whatsapp_click</code> y <code class="text-xs bg-slate-800 px-1 rounded">form_submit</code>.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Migración de GA4 directo a GA4 vía GTM completada sin pérdida de datos. Código duplicado eliminado.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Tracking de conversiones (cotización vehículos y citas taller) visible en GA4 en tiempo real.</div></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- DESPUNTE eléctricos -->
        <div class="rounded-xl border border-amber-500/30 bg-gradient-to-br from-amber-500/10 to-orange-500/5 p-6 mt-8">
            <div class="flex items-center gap-3 mb-3">
                <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                <h3 class="text-xl font-bold text-white">Hallazgo clave: despunte de búsquedas de autos eléctricos e híbridos</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">Del análisis combinado de Search Console y Google Analytics surge una oportunidad SEO de primer orden para Comercial Hidrobo: <strong class="text-amber-400">el 14,6 % de TODOS los clics orgánicos del sitio (1.305 de 8.952)</strong> vienen del cluster de búsquedas relacionadas con autos eléctricos e híbridos. Este cluster es el principal motor de tráfico no relacionado con la marca y representa una ventana de oportunidad para consolidar autoridad temática mientras la categoría sigue en crecimiento en Ecuador.</p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <div class="rounded-lg border border-amber-500/20 bg-amber-500/5 p-4">
                    <p class="text-xs text-amber-400 mb-1">Clics del cluster</p>
                    <p class="text-2xl font-bold text-white">1.305</p>
                    <p class="text-xs text-slate-400 mt-1">14,6% del total</p>
                </div>
                <div class="rounded-lg border border-amber-500/20 bg-amber-500/5 p-4">
                    <p class="text-xs text-amber-400 mb-1">Queries únicas</p>
                    <p class="text-2xl font-bold text-white">3.202</p>
                    <p class="text-xs text-slate-400 mt-1">búsquedas del cluster</p>
                </div>
                <div class="rounded-lg border border-amber-500/20 bg-amber-500/5 p-4">
                    <p class="text-xs text-amber-400 mb-1">Impresiones cluster</p>
                    <p class="text-2xl font-bold text-white">55.971</p>
                    <p class="text-xs text-slate-400 mt-1">apariciones en Google</p>
                </div>
                <div class="rounded-lg border border-amber-500/20 bg-amber-500/5 p-4">
                    <p class="text-xs text-amber-400 mb-1">Posición media</p>
                    <p class="text-2xl font-bold text-white">5-7</p>
                    <p class="text-xs text-slate-400 mt-1">margen amplio de mejora</p>
                </div>
            </div>

            <div class="mt-6">
                <h4 class="text-sm font-semibold text-amber-400 mb-3">Top queries del cluster eléctricos/híbridos (clics ene-may)</h4>
                <div class="h-72"><canvas id="chartEvQueries"></canvas></div>
            </div>

            <div class="mt-6 grid md:grid-cols-2 gap-4 text-sm">
                <div class="rounded-lg border border-slate-700/30 bg-slate-800/30 p-4">
                    <p class="text-xs text-emerald-400 uppercase tracking-wider mb-2">Página #1 del sitio</p>
                    <p class="text-white font-medium">"Autos eléctricos en Ecuador 2025"</p>
                    <p class="text-xs text-slate-400 mt-2">2.285 clics · 79.458 impresiones · pos. media 5,3</p>
                    <p class="text-xs text-slate-400 mt-1">Subir a posición 2-3 puede <strong class="text-emerald-400">duplicar los clics</strong> en pocos meses.</p>
                </div>
                <div class="rounded-lg border border-slate-700/30 bg-slate-800/30 p-4">
                    <p class="text-xs text-emerald-400 uppercase tracking-wider mb-2">Recomendación</p>
                    <p class="text-slate-300">Acelerar la publicación del cluster Híbridos/Eléctricos (11 posts en revisión: DongFeng Z9 PHEV, Chery Súper Hybrid CSH, Toyota RAV4 Híbrido, Mage EV, Hunter REEV, etc.) para capturar tráfico mientras la categoría crece.</p>
                </div>
            </div>
        </div>

        <!-- DESPUNTE autos chinos -->
        <div class="rounded-xl border border-red-500/30 bg-gradient-to-br from-red-500/10 to-amber-500/5 p-6 mt-8">
            <div class="flex items-center gap-3 mb-3">
                <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                <h3 class="text-xl font-bold text-white">Hallazgo clave 2: el cluster autos chinos crece más rápido todavía</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">El cluster de búsquedas relacionadas con autos chinos es <strong class="text-red-400">aún más grande que el de eléctricos</strong>: representa el <strong class="text-red-400">26,9 % de TODOS los clics orgánicos del sitio (2.405 de 8.952)</strong>. Es el principal motor de tráfico SEO de Comercial Hidrobo y se solapa parcialmente con el cluster eléctricos (muchos modelos chinos son híbridos/eléctricos). Esto convierte a CH en una referencia natural del mercado automotor chino en Ecuador.</p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
                <div class="rounded-lg border border-red-500/20 bg-red-500/5 p-4">
                    <p class="text-xs text-red-400 mb-1">Clics del cluster</p>
                    <p class="text-2xl font-bold text-white">2.405</p>
                    <p class="text-xs text-slate-400 mt-1">26,9% del total CH</p>
                </div>
                <div class="rounded-lg border border-red-500/20 bg-red-500/5 p-4">
                    <p class="text-xs text-red-400 mb-1">Queries únicas</p>
                    <p class="text-2xl font-bold text-white">10.632</p>
                    <p class="text-xs text-slate-400 mt-1">búsquedas del cluster</p>
                </div>
                <div class="rounded-lg border border-red-500/20 bg-red-500/5 p-4">
                    <p class="text-xs text-red-400 mb-1">Impresiones cluster</p>
                    <p class="text-2xl font-bold text-white">198.701</p>
                    <p class="text-xs text-slate-400 mt-1">apariciones en Google</p>
                </div>
                <div class="rounded-lg border border-red-500/20 bg-red-500/5 p-4">
                    <p class="text-xs text-red-400 mb-1">Página #1 del sitio</p>
                    <p class="text-2xl font-bold text-white">1.711</p>
                    <p class="text-xs text-slate-400 mt-1">clics: "marcas chinos confiables"</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mt-6">
                <div>
                    <h4 class="text-sm font-semibold text-red-400 mb-3">Distribución por marca china (clics)</h4>
                    <div class="h-72"><canvas id="chartChinaMarcas"></canvas></div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-red-400 mb-3">Top búsquedas del cluster</h4>
                    <div class="h-72"><canvas id="chartChinaQueries"></canvas></div>
                </div>
            </div>

            <div class="mt-6 rounded-lg border border-amber-500/20 bg-amber-500/5 p-4">
                <h4 class="text-sm font-semibold text-amber-400 mb-2">Lectura del dato</h4>
                <ul class="space-y-1 text-sm text-slate-300 list-disc list-inside">
                    <li><strong>Chery es la marca china #1 en clics orgánicos:</strong> 436 clics distribuidos en más de 4.000 queries (Tiggo 4 Pro, Tiggo 7, etc.).</li>
                    <li><strong>DongFeng está cerca con 340 clics</strong> y queries muy intencionadas (Deepal S05, Huge, Rich 6, T5L). El Deepal S05 solo aporta 136 clics con CTR 10,4 % y posición 2,0 — un modelo bandera SEO.</li>
                    <li><strong>Changan tiene gran impresión (19.657) pero baja captura (96 clics):</strong> hay oportunidad clara de optimizar títulos y meta description para subir CTR.</li>
                    <li><strong>Omoda, Geely, Haval, BYD están emergiendo:</strong> aún con poco contenido propio. Quien publique primero capturará la conversación.</li>
                    <li><strong>Genéricos pesan más que cualquier marca:</strong> 1.484 clics en queries tipo "carros chinos en ecuador", "marcas de autos chinos". Apuntar contenido pillar aquí escala todo el cluster.</li>
                </ul>
            </div>
        </div>

        <!-- Análisis Search Console CH -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Análisis de Search Console (Google) — Comercial Hidrobo</h3>
            <p class="text-sm text-slate-400 mb-4">Estas son las búsquedas que más tráfico están trayendo al sitio en lo corrido de 2026. Las cifras muestran clics orgánicos efectivos (no de pago) entre el 1 de enero y el 22 de mayo.</p>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-brand-500 mb-3">Top 10 búsquedas que más clics traen</h4>
                    <div class="h-80"><canvas id="chartChQueries"></canvas></div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-brand-500 mb-3">Top 10 páginas con más visitas orgánicas</h4>
                    <div class="h-80"><canvas id="chartChPages"></canvas></div>
                </div>
            </div>

            <div class="mt-6 rounded-lg border border-emerald-500/20 bg-emerald-500/5 p-4">
                <h4 class="text-sm font-semibold text-emerald-400 mb-2">Lectura del dato</h4>
                <ul class="space-y-1 text-sm text-slate-300 list-disc list-inside">
                    <li><strong>El término de marca "comercial hidrobo"</strong> es la búsqueda #1 con 1.258 clics y CTR del 10,7 % — gente que ya conoce la empresa y la busca por nombre.</li>
                    <li><strong>El segundo motor son los autos eléctricos</strong>: "autos electricos ecuador" (140), "carros electricos ecuador" (131) y derivados. Cluster bien establecido.</li>
                    <li><strong>Los autos chinos son una autoridad consolidada</strong>: "carros chinos en ecuador" (116 clics), "top 10 marcas chinos" (75), "Chery" (61). Es la línea con más topical authority orgánica.</li>
                    <li><strong>Renault Duster sigue dominando</strong> entre modelos específicos: 109 clics directo + 95 con "precio ecuador" + páginas con miles de clics.</li>
                </ul>
            </div>
        </div>

        <!-- Análisis GA4 CH -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Comportamiento de los visitantes — GA4</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                <div class="rounded-lg border border-slate-700/30 bg-slate-800/30 p-4">
                    <p class="text-xs text-slate-500 mb-1">Usuarios nuevos</p>
                    <p class="text-xl font-bold text-white">26.738</p>
                    <p class="text-xs text-slate-400 mt-1">98,7 % del total</p>
                </div>
                <div class="rounded-lg border border-slate-700/30 bg-slate-800/30 p-4">
                    <p class="text-xs text-slate-500 mb-1">Tiempo medio interacción</p>
                    <p class="text-xl font-bold text-white">56,67 s</p>
                    <p class="text-xs text-slate-400 mt-1">por usuario activo</p>
                </div>
                <div class="rounded-lg border border-slate-700/30 bg-slate-800/30 p-4">
                    <p class="text-xs text-slate-500 mb-1">Eventos disparados</p>
                    <p class="text-xl font-bold text-white">156.619</p>
                    <p class="text-xs text-slate-400 mt-1">5,8 por usuario</p>
                </div>
                <div class="rounded-lg border border-slate-700/30 bg-slate-800/30 p-4">
                    <p class="text-xs text-slate-500 mb-1">CTR orgánico medio</p>
                    <p class="text-xl font-bold text-white">1,03 %</p>
                    <p class="text-xs text-slate-400 mt-1">por encima del 0,5 % típico</p>
                </div>
            </div>
            <div class="rounded-lg border border-brand-500/20 bg-brand-500/5 p-4">
                <h4 class="text-sm font-semibold text-brand-500 mb-2">Lectura del dato</h4>
                <p class="text-sm text-slate-300 leading-relaxed">El 98,7 % de los usuarios son nuevos: hay buen flujo de tráfico pero <strong class="text-white">poca recurrencia</strong>. Esto se explica por el tipo de búsqueda (comparativas, precios, fichas) que se consume una vez y no vuelve. La estrategia correcta es <strong class="text-white">convertir esos visitantes en leads en su primera visita</strong> (WhatsApp, formulario o cita) en lugar de esperar a que regresen. Esa es exactamente la razón de los CTAs y la configuración de eventos clave del GTM.</p>
            </div>
        </div>

        <!-- Contenido publicado y en revisión -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Contenido del mes — publicado y en revisión</h3>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-1 rounded bg-emerald-500/20 text-emerald-400 text-xs font-semibold">Publicado</span>
                        <span class="text-sm text-slate-400">16 artículos · 4 de mayo</span>
                    </div>
                    <div class="space-y-1.5 text-xs text-slate-400 max-h-72 overflow-y-auto pr-2">
                        <p>· Renault Duster vs Chery Tiggo 4 Pro: SUV accesibles</p>
                        <p>· Mantenimiento de frenos en Ibarra</p>
                        <p>· Financiamiento automotriz sin entrada Ecuador 2026</p>
                        <p>· Taller automotriz en Tulcán</p>
                        <p>· Fiat Pulse 2026: precio Ecuador</p>
                        <p>· Mazda CX-30 vs Nissan Kicks</p>
                        <p>· Repuestos originales Renault en Ibarra</p>
                        <p>· Tabla mantenimiento Toyota por kilometraje</p>
                        <p>· Changan Hunter Plus 2026 Ecuador</p>
                        <p>· Seguro vehicular Ecuador 2026</p>
                        <p>· Concesionario en Tulcán</p>
                        <p>· Diagnóstico computarizado automotriz Ibarra</p>
                        <p>· Matriculación vehicular Imbabura 2026</p>
                        <p>· DongFeng Rich 6 vs Changan Hunter Plus</p>
                        <p>· Accesorios originales para camionetas</p>
                        <p>· Cuánto cuesta un Nissan Kicks al año</p>
                    </div>
                </div>

                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-1 rounded bg-amber-500/20 text-amber-400 text-xs font-semibold">En revisión</span>
                        <span class="text-sm text-slate-400">35 artículos</span>
                    </div>
                    <div class="space-y-1.5 text-xs text-slate-400 max-h-72 overflow-y-auto pr-2">
                        <p class="text-amber-400 font-semibold pt-1">Plan abril (20)</p>
                        <p>· Precios mantenimiento Nissan en Ibarra</p>
                        <p>· Chery Tiggo 4 Pro 2026: ficha técnica</p>
                        <p>· Nissan Kicks vs Renault Kardian</p>
                        <p>· Guía para comprar auto nuevo en Ecuador</p>
                        <p>· DongFeng Rich 6 2026 precio Ecuador</p>
                        <p>· Cambio de aceite en Ibarra</p>
                        <p>· Renault Kardian 2026 guía completa</p>
                        <p>· Crédito automotriz Ecuador 2026</p>
                        <p>· Toyota Hilux vs DongFeng Rich 6</p>
                        <p>· Mazda CX-30 2026: precio Ecuador</p>
                        <p>· (+10 títulos del plan abril)</p>

                        <p class="text-amber-400 font-semibold pt-2">Plan mayo restante (4)</p>
                        <p>· Nissan Frontier 2026</p>
                        <p>· Ram 1200 2026</p>
                        <p>· Nissan March vs Fiat Pulse</p>
                        <p>· Dodge Attitude 2026</p>

                        <p class="text-amber-400 font-semibold pt-2">Cluster Híbridos/Eléctricos (11) — prioridad alta</p>
                        <p>· DongFeng Z9 PHEV en Ecuador</p>
                        <p>· Changan Hunter REEV</p>
                        <p>· Toyota RAV4 Híbrido 2026</p>
                        <p>· Toyota Corolla Cross Híbrido</p>
                        <p>· DongFeng Mage EV (más barato)</p>
                        <p>· DongFeng Mage Hybrid</p>
                        <p>· Pillar Chery Súper Hybrid CSH</p>
                        <p>· Chery Tiggo 7 / 8 / 9 Súper Hybrid</p>
                        <p>· Changan CS55 R-EV</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sugerencias futuras CH (Visión experta SEO) -->
        <div class="rounded-xl border border-emerald-500/30 bg-gradient-to-br from-emerald-500/10 to-cyan-500/5 p-6 mt-8">
            <div class="flex items-center gap-3 mb-3">
                <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                <h3 class="text-xl font-bold text-white">Sugerencias de generación futura — visión SEO experta</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">Con base en los datos reales del año en curso, estas son las recomendaciones de contenido para los <strong class="text-emerald-400">próximos 3-6 meses</strong> orientadas a maximizar tráfico orgánico y conversión. Cada propuesta nace de búsquedas reales de Ecuador con demanda demostrada en Search Console.</p>

            <div class="grid md:grid-cols-2 gap-6 mt-4">
                <!-- Eje 1: Eléctricos / Híbridos -->
                <div class="rounded-lg border border-amber-500/20 bg-amber-500/5 p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xl">⚡</span>
                        <h4 class="text-sm font-bold text-amber-400">Eje 1 · Cluster Eléctricos/Híbridos</h4>
                    </div>
                    <ul class="space-y-2 text-sm text-slate-300 list-disc list-inside">
                        <li>Publicar de inmediato los <strong>11 posts del cluster Híbridos/Eléctricos</strong> ya redactados (DongFeng Z9 PHEV, Chery Súper Hybrid CSH, Toyota RAV4 Híbrido, Mage EV, etc.).</li>
                        <li>Crear pillar <strong>"Guía 2026 de autos eléctricos en Ecuador"</strong>: pillar que reemplace al actual del 2025 y absorba su autoridad (2.285 clics base).</li>
                        <li>Posts comparativos cruzados: <strong>RAV4 Híbrido vs Tiggo 8 CSH</strong>, <strong>Mage EV vs Deepal S05</strong>, <strong>Z9 PHEV vs Hunter REEV</strong>.</li>
                        <li>Contenido educativo: <strong>"¿Qué es PHEV, REEV, HEV?"</strong>, <strong>"Punto de carga en Ecuador"</strong>, <strong>"Mantenimiento de auto híbrido"</strong> (ya hay tracción pos 5).</li>
                        <li>Local SEO eléctricos: <strong>"Autos eléctricos en Quito"</strong> (36 clics actuales), Ibarra, Cuenca, Guayaquil — uno por ciudad.</li>
                    </ul>
                </div>

                <!-- Eje 2: Autos Chinos -->
                <div class="rounded-lg border border-red-500/20 bg-red-500/5 p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xl">🇨🇳</span>
                        <h4 class="text-sm font-bold text-red-400">Eje 2 · Cluster Autos Chinos</h4>
                    </div>
                    <ul class="space-y-2 text-sm text-slate-300 list-disc list-inside">
                        <li>Pillar pages por marca china con su árbol completo: <strong>Chery (4.033 queries, 436 clics)</strong>, <strong>DongFeng (978 queries, 340 clics)</strong>, <strong>Changan (974 queries)</strong>.</li>
                        <li>Contenido sobre marcas emergentes con queries crecientes y sin cobertura propia: <strong>Omoda, BYD, JAC, Haval, Great Wall, Geely</strong>. Quien publique primero, captura.</li>
                        <li>Posts comparativos intra-china muy buscados: <strong>Deepal S05 vs Chery Tiggo 7 Pro</strong>, <strong>DongFeng Huge vs Changan CS75</strong>, <strong>Omoda 5 vs Jaecoo 7</strong>.</li>
                        <li>Long-tail confiabilidad/durabilidad: <strong>"¿son confiables los autos chinos?"</strong>, <strong>"durabilidad chery 100.000 km"</strong>, <strong>"experiencias dongfeng en Ecuador"</strong>.</li>
                        <li>Local + marca: <strong>"Chery Ibarra"</strong>, <strong>"DongFeng Cayambe"</strong>, <strong>"taller chino Tulcán"</strong>.</li>
                    </ul>
                </div>

                <!-- Eje 3: Modelos específicos -->
                <div class="rounded-lg border border-brand-500/20 bg-brand-500/5 p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xl">🚗</span>
                        <h4 class="text-sm font-bold text-brand-500">Eje 3 · Modelos individuales con tracción</h4>
                    </div>
                    <ul class="space-y-2 text-sm text-slate-300 list-disc list-inside">
                        <li><strong>Renault Duster</strong> sigue dominando: 109 + 95 + más clics. Mantener actualizadas las fichas y crear posts derivados (versiones, comparativas, financiamiento, mantenimiento).</li>
                        <li><strong>Nissan Kicks</strong>: la comparativa con Tiggo es la #4 página del sitio (1.127 clics). Crear más comparativas (Kicks vs HR-V, Kicks vs Sportage, Kicks año a año).</li>
                        <li><strong>Deepal S05</strong>: ya genera 136 clics solo en query principal, posición 2,0. Crear ecosistema completo (versiones, comparativas, prueba de manejo, costo de propiedad).</li>
                        <li><strong>Toyota Hilux, Chevrolet D-Max</strong>: pickups con búsqueda alta, oportunidad de comparativas vs los modelos chinos (Rich 6, Hunter Plus).</li>
                    </ul>
                </div>

                <!-- Eje 4: Conversión y CTAs -->
                <div class="rounded-lg border border-purple-500/20 bg-purple-500/5 p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xl">🎯</span>
                        <h4 class="text-sm font-bold text-purple-400">Eje 4 · Conversión y optimización técnica</h4>
                    </div>
                    <ul class="space-y-2 text-sm text-slate-300 list-disc list-inside">
                        <li><strong>Optimizar Title + Meta Description</strong> de las 30 páginas con más impresiones y bajo CTR — varias tienen 80K-180K impresiones con CTR < 1 %. Mejorarlos puede sumar miles de clics.</li>
                        <li>Internal linking sistemático: <strong>cada modelo enlaza a su marca, comparativas y financiamiento</strong> para distribuir autoridad.</li>
                        <li>Schema markup adicional (FAQPage, Product, Vehicle) en todas las fichas para ganar rich snippets en Google.</li>
                        <li>CTAs específicos por intent: <strong>posts informativos → "Hablar con asesor"</strong>, <strong>fichas modelo → "Cotizar este auto"</strong>, <strong>comparativas → "Agendar test drive"</strong>.</li>
                        <li>Page speed: medir Core Web Vitals de las top 30 páginas y optimizar imágenes pesadas (afecta posicionamiento móvil).</li>
                    </ul>
                </div>

                <!-- Eje 5: Calendario sugerido -->
                <div class="md:col-span-2 rounded-lg border border-slate-700/30 bg-slate-800/30 p-5">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="text-xl">📅</span>
                        <h4 class="text-sm font-bold text-white">Eje 5 · Calendario sugerido — meses 2 a 6</h4>
                    </div>
                    <div class="grid md:grid-cols-5 gap-3 text-xs">
                        <div class="rounded-lg border border-slate-700/30 p-3">
                            <p class="text-emerald-400 font-semibold mb-2">Junio (Mes 2)</p>
                            <ul class="space-y-1 text-slate-400">
                                <li>· 11 posts cluster Híbridos/Eléctricos</li>
                                <li>· 5 posts comparativas chinos vs japoneses</li>
                                <li>· 4 posts pillar marcas chinas</li>
                            </ul>
                        </div>
                        <div class="rounded-lg border border-slate-700/30 p-3">
                            <p class="text-emerald-400 font-semibold mb-2">Julio (Mes 3)</p>
                            <ul class="space-y-1 text-slate-400">
                                <li>· 6 posts marcas emergentes (Omoda, BYD)</li>
                                <li>· 8 posts Renault y Nissan derivados</li>
                                <li>· 6 posts long-tail confiabilidad</li>
                            </ul>
                        </div>
                        <div class="rounded-lg border border-slate-700/30 p-3">
                            <p class="text-emerald-400 font-semibold mb-2">Agosto (Mes 4)</p>
                            <ul class="space-y-1 text-slate-400">
                                <li>· Pillar refresh "Eléctricos 2026"</li>
                                <li>· Local SEO por ciudad (10 landings)</li>
                                <li>· 10 posts informativos demanda data</li>
                            </ul>
                        </div>
                        <div class="rounded-lg border border-slate-700/30 p-3">
                            <p class="text-emerald-400 font-semibold mb-2">Septiembre (Mes 5)</p>
                            <ul class="space-y-1 text-slate-400">
                                <li>· Comparativas premium intra-segment</li>
                                <li>· Contenido financiamiento + crédito</li>
                                <li>· Refresh posts top con datos nuevos</li>
                            </ul>
                        </div>
                        <div class="rounded-lg border border-slate-700/30 p-3">
                            <p class="text-emerald-400 font-semibold mb-2">Octubre (Mes 6)</p>
                            <ul class="space-y-1 text-slate-400">
                                <li>· Posts estacionales (fin de año)</li>
                                <li>· Casos de éxito de clientes</li>
                                <li>· Auditoría completa + plan 2027</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recomendaciones CH -->
        <div class="rounded-xl border border-brand-500/30 bg-brand-500/5 p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Recomendaciones priorizadas para los próximos 30 días</h3>
            <ol class="space-y-3 text-sm text-slate-300">
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-600 text-white text-xs flex items-center justify-center font-bold">1</span><div><strong class="text-white">Acelerar publicación del cluster Híbridos/Eléctricos.</strong> Es el motor de crecimiento más claro: 14,6 % de los clics ya vienen de ahí, con posición media 5-7 y mucho margen. Los 11 posts del cluster en revisión deberían entrar primero.</div></li>
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-600 text-white text-xs flex items-center justify-center font-bold">2</span><div><strong class="text-white">Optimizar el post pillar "Autos eléctricos en Ecuador 2025".</strong> Recibe 2.285 clics con posición 5,3. Mejorar título, meta description e internal linking puede llevarlo a top 3 y duplicar el tráfico.</div></li>
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-600 text-white text-xs flex items-center justify-center font-bold">3</span><div><strong class="text-white">Agregar CTAs efectivos a las 10 páginas con más tráfico.</strong> Hoy generan miles de clics pero pocos van al formulario. Una llamada a la acción clara (WhatsApp + cita taller) puede convertir 1-2 % en leads adicionales.</div></li>
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-600 text-white text-xs flex items-center justify-center font-bold">4</span><div><strong class="text-white">Aprobar los 35 artículos en revisión.</strong> Una vez publicados, el sitio escala de ~16 artículos nuevos/mes a 50+ artículos nuevos en mes 2 — proporcionalmente más tráfico.</div></li>
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-brand-600 text-white text-xs flex items-center justify-center font-bold">5</span><div><strong class="text-white">Internal linking entre el cluster eléctricos.</strong> Hoy hay 30 URLs del cluster con tráfico desigual: enlazarlas entre sí aumenta autoridad temática y eleva el conjunto.</div></li>
            </ol>
        </div>
    </div>

    <!-- ================== SUB-SECCION OKCARS ================== -->
    <div id="sub-avance-ok" class="sub-content">

        <!-- Métricas headline OKCars -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Usuarios activos</p>
                <p class="text-3xl font-bold text-white">721</p>
                <p class="text-xs text-slate-500 mt-1">Ene 1 – May 22 2026</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Clics orgánicos</p>
                <p class="text-3xl font-bold text-emerald-400">217</p>
                <p class="text-xs text-slate-500 mt-1">6.860 impresiones</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Tiempo en sitio</p>
                <p class="text-3xl font-bold text-purple-400">116 s</p>
                <p class="text-xs text-slate-500 mt-1">2× más que CH</p>
            </div>
            <div class="rounded-xl border border-slate-800/50 glass p-5">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Páginas con tráfico</p>
                <p class="text-3xl font-bold text-amber-400">36</p>
                <p class="text-xs text-slate-500 mt-1">muy poca todavía</p>
            </div>
        </div>

        <!-- Trabajo realizado OKCars -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Trabajo realizado en el sitio</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">Contenido nuevo</h4>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>20 artículos publicados</strong> con fechas escalonadas entre abril 1 y mayo 28 (uno cada 3 días). 17 ya visibles, 3 programados.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>~30.000 palabras de contenido</strong> nuevo distribuido en 5 categorías: Guías de compra, Modelos y comparativas, Financiamiento, Trámites y Seminuevos en Ibarra.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Cada post incluye estructura SEO completa: lead 2 párrafos, H2 "¿qué es?", 5-7 secciones H2, tabla comparativa, sección FAQ con esquema JSON-LD para Google y CTAs hacia WhatsApp e inventario.</div></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">Configuración técnica</h4>
                    <ul class="space-y-2 text-sm text-slate-300">
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>Conexión API WordPress configurada</strong> con autenticación segura (Application Password) para automatizar publicación.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div><strong>5 categorías nuevas creadas</strong> y más de 80 tags SEO añadidos al sitio.</div></li>
                        <li class="flex gap-2"><span class="text-emerald-400">✓</span><div>Detección y documentación de URLs antiguas rotas (<code class="text-xs bg-slate-800 px-1 rounded">/usados/</code>) pendientes de redirección.</div></li>
                        <li class="flex gap-2"><span class="text-amber-400">⏳</span><div><strong>GTM en okcars.ec — pendiente</strong> de instalación; en programación para semana 4.</div></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Diagnóstico crítico OKCars -->
        <div class="rounded-xl border border-purple-500/30 bg-gradient-to-br from-purple-500/10 to-pink-500/5 p-6 mt-8">
            <div class="flex items-center gap-3 mb-3">
                <svg class="w-7 h-7 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                <h3 class="text-xl font-bold text-white">Hallazgo clave: OKCars depende casi totalmente de búsquedas de marca</h3>
            </div>
            <p class="text-sm text-slate-300 leading-relaxed mb-4">De los <strong class="text-purple-400">217 clics orgánicos</strong> que recibió OKCars en lo corrido del año, <strong class="text-purple-400">183 (84 %)</strong> provienen de búsquedas de marca como "ok cars", "okcars" o "autos ok" — gente que ya conoce el negocio y lo busca por nombre. Solo <strong class="text-purple-400">34 clics (16 %)</strong> son <strong>non-brand</strong>, es decir, gente que aún no conoce OKCars y llega al sitio buscando "deepal s05 precio", "autos seminuevos a crédito" o "autos usados Ibarra".</p>

            <div class="grid md:grid-cols-2 gap-6 mt-4">
                <div class="rounded-lg border border-purple-500/20 bg-purple-500/5 p-4">
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">Distribución actual del tráfico</h4>
                    <div class="h-56"><canvas id="chartOkBrand"></canvas></div>
                </div>
                <div class="rounded-lg border border-emerald-500/20 bg-emerald-500/5 p-4">
                    <h4 class="text-sm font-semibold text-emerald-400 mb-2">Lectura del dato y plan</h4>
                    <p class="text-sm text-slate-300 leading-relaxed">Esto es exactamente lo esperado para un sitio nuevo sin trabajo SEO previo: <strong class="text-white">Google solo lo muestra cuando alguien lo busca por su nombre</strong>. El plan SEO está diseñado para corregir esto. Los 20 artículos publicados este mes están orientados específicamente a búsquedas <strong>non-brand</strong>: "autos seminuevos Ibarra", "checklist comprar auto usado", "Toyota Hilux usada Ecuador", "crédito directo vs bancario", "garantía seminuevo Ibarra"… Buscamos pasar del 16 % non-brand actual a por lo menos un 50-60 % en los próximos 3-4 meses.</p>
                </div>
            </div>
        </div>

        <!-- Análisis Search Console OKCars -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Análisis Search Console — OKCars</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">Top 10 búsquedas de OKCars</h4>
                    <div class="h-72"><canvas id="chartOkQueries"></canvas></div>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-purple-400 mb-3">Top páginas con tráfico orgánico</h4>
                    <div class="h-72"><canvas id="chartOkPages"></canvas></div>
                </div>
            </div>
            <div class="mt-6 rounded-lg border border-purple-500/20 bg-purple-500/5 p-4">
                <h4 class="text-sm font-semibold text-purple-400 mb-2">Lectura del dato</h4>
                <ul class="space-y-1 text-sm text-slate-300 list-disc list-inside">
                    <li>El <strong>home (/)</strong> concentra 224 clics (40 % del total) — la mayoría busca el nombre OKCars y llega a la portada.</li>
                    <li>La ficha del <strong>Changan Deepal S05 Hybrid</strong> es la única ficha de vehículo con tracción orgánica real: 36 clics, 1.624 impresiones. Confirma que el SEO de vehículos eléctricos/híbridos también funcionará en OKCars.</li>
                    <li>El listado <strong>/vehiculos-okcars/</strong> y la página de financiamiento aparecen pero todavía con muy pocos clics. Los 20 posts publicados deben empezar a alimentar internal linking hacia estas páginas.</li>
                    <li>El tiempo de interacción medio es <strong>116 segundos por usuario</strong>, casi el doble que en Comercial Hidrobo (56 s). Quien llega a OKCars se queda más tiempo: el contenido del sitio engancha bien.</li>
                </ul>
            </div>
        </div>

        <!-- Contenido publicado y en revisión OKCars -->
        <div class="rounded-xl border border-slate-800/50 glass p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Contenido del mes — publicado y en revisión</h3>
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2 py-1 rounded bg-emerald-500/20 text-emerald-400 text-xs font-semibold">Publicado</span>
                        <span class="text-sm text-slate-400">17 artículos (visibles) + 3 programados = 20</span>
                    </div>
                    <div class="space-y-1.5 text-xs text-slate-400 max-h-80 overflow-y-auto pr-2">
                        <p>· Cómo comprar un seminuevo en Ecuador sin errores</p>
                        <p>· Concesionario vs comprar en la calle</p>
                        <p>· Autos seminuevos en Ibarra con garantía</p>
                        <p>· Checklist 20 puntos para revisar auto usado</p>
                        <p>· Cómo funciona el financiamiento para autos usados</p>
                        <p>· Top 10 autos usados más vendidos en Ecuador</p>
                        <p>· Comprar seminuevo en Imbabura con respaldo</p>
                        <p>· Traspaso de vehículo Ecuador 2026</p>
                        <p>· Cuánto cuesta mantener un auto usado al año</p>
                        <p>· Toyota Hilux usada: guía de compra</p>
                        <p>· Primer auto en Ecuador: guía primerizos</p>
                        <p>· Autos seminuevos desde $8.000</p>
                        <p>· Cómo verificar deudas legales del auto</p>
                        <p>· Chevrolet Sail usado: ¿vale la pena?</p>
                        <p>· Crédito directo vs crédito bancario</p>
                        <p>· Vende tu auto en parte de pago en Ibarra</p>
                        <p>· Seguro vehicular para autos usados</p>
                        <p class="text-amber-400 pt-1">· (Programados may 22, 25, 28)</p>
                        <p>· Kia Rio usado: precio y versiones</p>
                        <p>· 5 señales de concesionario confiable</p>
                        <p>· Autos seminuevos con garantía en Ibarra</p>
                    </div>
                </div>
                <div class="rounded-lg border border-amber-500/20 bg-amber-500/5 p-4">
                    <h4 class="text-sm font-semibold text-amber-400 mb-2">¿Por qué este contenido y no otro?</h4>
                    <p class="text-sm text-slate-300 leading-relaxed mb-2">Cada artículo del plan responde a una pregunta concreta que la gente busca en Google y que hoy OKCars <strong class="text-white">no aparece</strong>. Por ejemplo:</p>
                    <ul class="space-y-1 text-sm text-slate-400 list-disc list-inside">
                        <li>"autos seminuevos ibarra" (búsqueda local crítica)</li>
                        <li>"qué revisar antes de comprar un auto usado"</li>
                        <li>"toyota hilux usada Ecuador"</li>
                        <li>"traspaso vehículo Ecuador requisitos"</li>
                        <li>"financiamiento autos usados Ecuador"</li>
                    </ul>
                    <p class="text-sm text-slate-300 leading-relaxed mt-2">Cada uno está optimizado para Google y termina con un botón directo a WhatsApp y al inventario. El objetivo es <strong class="text-white">capturar tráfico no-marca</strong> y convertirlo en contactos.</p>
                </div>
            </div>
        </div>

        <!-- Recomendaciones OKCars -->
        <div class="rounded-xl border border-purple-500/30 bg-purple-500/5 p-6 mt-8">
            <h3 class="text-lg font-semibold text-white mb-4">Recomendaciones priorizadas para los próximos 30 días</h3>
            <ol class="space-y-3 text-sm text-slate-300">
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-600 text-white text-xs flex items-center justify-center font-bold">1</span><div><strong class="text-white">Instalar GTM en okcars.ec.</strong> Es el siguiente paso obligatorio para medir conversiones (clics a WhatsApp, formularios) igual que en Comercial Hidrobo.</div></li>
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-600 text-white text-xs flex items-center justify-center font-bold">2</span><div><strong class="text-white">Optimizar el copy del home.</strong> Recibe el 40 % del tráfico orgánico: cualquier mejora en el llamado a la acción se multiplica.</div></li>
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-600 text-white text-xs flex items-center justify-center font-bold">3</span><div><strong class="text-white">Corregir las URLs antiguas /usados/ con redirección 301.</strong> Hoy generan errores 404 cuando alguien intenta visitarlas desde Google.</div></li>
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-600 text-white text-xs flex items-center justify-center font-bold">4</span><div><strong class="text-white">Continuar el ritmo de 20 posts/mes.</strong> Los efectos SEO se ven entre 60 y 120 días después de publicar. El batch de junio ya está siendo planificado con base en los datos que estos primeros 20 generen.</div></li>
                <li class="flex gap-3"><span class="flex-shrink-0 w-6 h-6 rounded-full bg-purple-600 text-white text-xs flex items-center justify-center font-bold">5</span><div><strong class="text-white">Aprovechar el éxito del Deepal S05.</strong> Es la única ficha que ya posiciona; ese mismo patrón puede replicarse al resto del inventario optimizando títulos y meta descripciones de cada vehículo.</div></li>
            </ol>
        </div>
    </div>
</div>
