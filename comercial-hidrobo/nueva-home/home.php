<?php
/**
 * Template Name: Home - Comercial Hidrobo
 *
 * Home rediseñada — UX max enfocada en conversión + SEO local Ecuador.
 * Estética: glassmorphism premium sobre fondos cálidos.
 *
 * Antes de publicar: reemplazar los placeholders marcados con CH_TODO.
 */

get_header();

// ============================================================
// CONFIGURACIÓN — Reemplazar antes de subir a producción
// ============================================================
$ch_whatsapp_number = '593XXXXXXXXX'; // CH_TODO: número WhatsApp asesor principal
$ch_inventario_url  = home_url( '/inventario/' );
$ch_marcas_url      = home_url( '/marcas/' );
$ch_taller_url      = home_url( '/agendar-cita-taller/' );
$ch_repuestos_url   = home_url( '/solicitar-repuestos/' );
$ch_blog_url        = home_url( '/blog/' );

// Helper para armar links de WhatsApp con mensaje prellenado
function ch_wa_link( $number, $message ) {
    return 'https://wa.me/' . esc_attr( $number ) . '?text=' . rawurlencode( $message );
}

// Portafolio real de marcas (12) — confirmado desde comercialhidrobo.com
$ch_marcas = array(
    array( 'slug' => 'nissan',   'nombre' => 'Nissan'   ),
    array( 'slug' => 'toyota',   'nombre' => 'Toyota'   ),
    array( 'slug' => 'renault',  'nombre' => 'Renault'  ),
    array( 'slug' => 'mazda',    'nombre' => 'Mazda'    ),
    array( 'slug' => 'jeep',     'nombre' => 'Jeep'     ),
    array( 'slug' => 'ram',      'nombre' => 'RAM'      ),
    array( 'slug' => 'fiat',     'nombre' => 'Fiat'     ),
    array( 'slug' => 'chery',    'nombre' => 'Chery'    ),
    array( 'slug' => 'changan',  'nombre' => 'Changan'  ),
    array( 'slug' => 'dongfeng', 'nombre' => 'DongFeng' ),
    array( 'slug' => 'baic',     'nombre' => 'BAIC'     ),
    array( 'slug' => 'foton',    'nombre' => 'Foton'    ),
);
foreach ( $ch_marcas as $i => $m ) {
    $ch_marcas[ $i ]['logo'] = get_stylesheet_directory_uri() . '/assets/marcas/' . $m['slug'] . '.svg';
    $ch_marcas[ $i ]['url']  = home_url( '/marcas/' . $m['slug'] . '/' );
}

// FAQ
$ch_faqs = array(
    array(
        'q' => '¿Qué necesito para financiar mi auto en Comercial Hidrobo?',
        'a' => 'Cédula vigente, planilla de servicios básicos del último mes y rol de pagos o certificado de ingresos de los últimos 3 meses. Si eres independiente, declaraciones del SRI también sirven. Aprobamos el crédito en 24 horas hábiles.',
    ),
    array(
        'q' => '¿Aceptan mi auto usado como parte de pago?',
        'a' => 'Sí. Hacemos avalúo gratuito de tu vehículo actual y descontamos su valor de la entrada o cuotas. Trae los documentos del auto (matrícula, último pago de impuestos) y lo evaluamos el mismo día.',
    ),
    array(
        'q' => '¿Qué garantía tiene un auto nuevo de Comercial Hidrobo?',
        'a' => 'Todos los vehículos nuevos llevan la garantía oficial del fabricante (entre 3 y 5 años o cierto kilometraje, según marca). Mantienes la garantía siempre que hagas los mantenimientos en taller certificado.',
    ),
    array(
        'q' => '¿Dónde están sus sucursales?',
        'a' => 'Tenemos tres puntos físicos: Ibarra (matriz), Otavalo y Quito. Si vives en otra ciudad, también te atendemos por WhatsApp y coordinamos la entrega del vehículo a tu localidad.',
    ),
    array(
        'q' => '¿Hacen entregas a otras ciudades del Ecuador?',
        'a' => 'Sí. Coordinamos transporte y trámites para entregar tu auto en cualquier ciudad del país. El servicio incluye matriculación y orientación sobre el taller más cercano.',
    ),
    array(
        'q' => '¿Tienen taller para vehículos de otras marcas?',
        'a' => 'Nuestro taller es certificado para las marcas que distribuimos. Para otras marcas podemos hacer servicios básicos (cambio de aceite, frenos, neumáticos), pero recomendamos taller especializado para mantenimientos mayores.',
    ),
);
?>

<!-- ============================================================
     SCHEMA JSON-LD — SEO LOCAL ECUADOR
     ============================================================ -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "<?php echo esc_url( home_url( '/#organization' ) ); ?>",
      "name": "Comercial Hidrobo",
      "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
      "logo": "<?php echo esc_url( home_url( '/wp-content/uploads/logo-comercial-hidrobo.png' ) ); ?>",
      "foundingDate": "1974",
      "description": "Concesionario de autos nuevos en el norte del Ecuador. Distribuidor oficial con sucursales en Ibarra, Otavalo y Quito.",
      "sameAs": [
        "https://www.facebook.com/comercialhidrobo",
        "https://www.instagram.com/comercialhidrobo"
      ]
    },
    {
      "@type": "AutoDealer",
      "@id": "<?php echo esc_url( home_url( '/#autodealer' ) ); ?>",
      "name": "Comercial Hidrobo",
      "image": "<?php echo esc_url( home_url( '/wp-content/uploads/concesionario-comercial-hidrobo.jpg' ) ); ?>",
      "url": "<?php echo esc_url( home_url( '/' ) ); ?>",
      "telephone": "+<?php echo esc_attr( $ch_whatsapp_number ); ?>",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Av. Mariano Acosta y Río Tahuando",
        "addressLocality": "Ibarra",
        "addressRegion": "Imbabura",
        "postalCode": "100150",
        "addressCountry": "EC"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "0.3469",
        "longitude": "-78.1226"
      },
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "08:00",
          "closes": "18:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": "Saturday",
          "opens": "09:00",
          "closes": "13:00"
        }
      ],
      "areaServed": {
        "@type": "Country",
        "name": "Ecuador"
      },
      "brand": [
        { "@type": "Brand", "name": "Nissan" },
        { "@type": "Brand", "name": "Toyota" },
        { "@type": "Brand", "name": "Renault" },
        { "@type": "Brand", "name": "Mazda" },
        { "@type": "Brand", "name": "Jeep" },
        { "@type": "Brand", "name": "RAM" },
        { "@type": "Brand", "name": "Fiat" },
        { "@type": "Brand", "name": "Chery" },
        { "@type": "Brand", "name": "Changan" },
        { "@type": "Brand", "name": "DongFeng" },
        { "@type": "Brand", "name": "BAIC" },
        { "@type": "Brand", "name": "Foton" }
      ]
    },
    {
      "@type": "LocalBusiness",
      "@id": "<?php echo esc_url( home_url( '/#localbusiness-ibarra' ) ); ?>",
      "name": "Comercial Hidrobo — Ibarra",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Av. Mariano Acosta y Río Tahuando",
        "addressLocality": "Ibarra",
        "addressRegion": "Imbabura",
        "addressCountry": "EC"
      },
      "telephone": "+<?php echo esc_attr( $ch_whatsapp_number ); ?>",
      "url": "<?php echo esc_url( home_url( '/' ) ); ?>"
    },
    {
      "@type": "FAQPage",
      "@id": "<?php echo esc_url( home_url( '/#faqpage' ) ); ?>",
      "mainEntity": [
        <?php
        $faq_items = array();
        foreach ( $ch_faqs as $faq ) {
            $faq_items[] = sprintf(
                '{
                    "@type": "Question",
                    "name": %s,
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": %s
                    }
                }',
                wp_json_encode( $faq['q'] ),
                wp_json_encode( $faq['a'] )
            );
        }
        echo implode( ",\n        ", $faq_items );
        ?>
      ]
    }
  ]
}
</script>

<!-- ============================================================
     TAILWIND CDN + CONFIG INLINE
     ============================================================ -->
<script src="https://cdn.tailwindcss.com?plugins=forms"></script>
<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'ch-primary':      '#00628f',
                'ch-primary-dark': '#004b70',
                'ch-primary-soft': '#cae6ff',
                'ch-surface':      '#faf8fe',
                'ch-surface-2':    '#f4f3f8',
                'ch-ink':          '#1a1b1f',
                'ch-ink-soft':     '#3f4850',
                'ch-line':         '#bec8d2',
            },
            fontFamily: {
                'headline': ['Montserrat', 'sans-serif'],
                'body':     ['Plus Jakarta Sans', 'sans-serif'],
                'label':    ['Inter', 'sans-serif'],
            },
            backdropBlur: {
                'xs': '4px',
            },
        },
    },
};
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Inter:wght@400;500;600&family=Material+Symbols+Outlined&display=swap" rel="stylesheet">

<style>
/* ============================================================
   GLASSMORPHISM + ESTILOS ESPECÍFICOS
   ============================================================ */
:root {
    --ch-glass-bg:          rgba(255, 255, 255, 0.12);
    --ch-glass-bg-strong:   rgba(255, 255, 255, 0.22);
    --ch-glass-border:      rgba(255, 255, 255, 0.28);
    --ch-glass-shadow:      0 8px 32px 0 rgba(0, 75, 112, 0.18);
}
.ch-glass {
    background: var(--ch-glass-bg);
    backdrop-filter: blur(16px) saturate(140%);
    -webkit-backdrop-filter: blur(16px) saturate(140%);
    border: 1px solid var(--ch-glass-border);
    box-shadow: var(--ch-glass-shadow);
}
.ch-glass-strong {
    background: var(--ch-glass-bg-strong);
    backdrop-filter: blur(22px) saturate(160%);
    -webkit-backdrop-filter: blur(22px) saturate(160%);
    border: 1px solid var(--ch-glass-border);
    box-shadow: var(--ch-glass-shadow);
}
.ch-glass-light {
    background: rgba(255, 255, 255, 0.55);
    backdrop-filter: blur(10px) saturate(140%);
    -webkit-backdrop-filter: blur(10px) saturate(140%);
    border: 1px solid rgba(255, 255, 255, 0.6);
    box-shadow: 0 6px 24px rgba(0, 98, 143, 0.08);
}
.ch-hero-gradient {
    background: linear-gradient(180deg, rgba(26, 27, 31, 0.45) 0%, rgba(26, 27, 31, 0.1) 40%, rgba(26, 27, 31, 0.85) 100%);
}
.ch-cta-gradient {
    background:
        radial-gradient(ellipse at 30% 20%, rgba(0, 124, 180, 0.55) 0%, transparent 50%),
        radial-gradient(ellipse at 70% 80%, rgba(140, 205, 255, 0.35) 0%, transparent 55%),
        #0a1b2e;
}
.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
    vertical-align: middle;
}
.ch-home { font-family: 'Plus Jakarta Sans', sans-serif; color: #1a1b1f; }
.ch-home h1, .ch-home h2, .ch-home h3 { font-family: 'Montserrat', sans-serif; letter-spacing: -0.02em; }

/* FAQ acordeón con CSS puro */
.ch-faq details[open] summary .ch-faq-icon { transform: rotate(180deg); }
.ch-faq-icon { transition: transform 0.3s ease; }
.ch-faq summary { list-style: none; cursor: pointer; }
.ch-faq summary::-webkit-details-marker { display: none; }
</style>

<main class="ch-home bg-ch-surface">

<!-- ============================================================
     1. HERO
     ============================================================ -->
<section class="relative min-h-[92vh] w-full flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <!-- CH_TODO: reemplazar imagen hero con foto profesional real -->
        <img
            src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/hero-comercial-hidrobo.jpg' ); ?>"
            alt="Concesionario Comercial Hidrobo en Ibarra, autos nuevos del norte del Ecuador"
            class="w-full h-full object-cover"
            loading="eager"
        />
        <div class="absolute inset-0 ch-hero-gradient"></div>
    </div>

    <div class="relative z-10 text-center px-6 max-w-5xl mx-auto py-24">
        <span class="inline-block ch-glass-strong px-6 py-2 rounded-full text-white text-xs uppercase tracking-[0.25em] mb-8 font-label font-semibold">
            Desde 1974 · Distribuidor oficial
        </span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white mb-6 leading-[1.05]">
            Concesionario de autos nuevos<br/>en el norte del Ecuador
        </h1>
        <p class="text-lg md:text-xl text-white/85 mb-10 max-w-3xl mx-auto leading-relaxed">
            Distribuidor oficial de 12 marcas: Nissan, Toyota, Renault, Mazda, Jeep, RAM, Fiat, Chery, Changan, DongFeng, BAIC y Foton.<br class="hidden md:inline"/>
            Sucursales en Ibarra, Otavalo y Quito. Más de 50 años acompañándote en la carretera.
        </p>

        <div class="flex flex-col sm:flex-row gap-4 justify-center items-stretch sm:items-center mb-16">
            <a
                href="<?php echo esc_url( ch_wa_link( $ch_whatsapp_number, 'Hola, vi su página web y quiero cotizar un auto. ¿Me pueden ayudar?' ) ); ?>"
                target="_blank"
                rel="noopener"
                class="inline-flex items-center justify-center gap-3 bg-[#25D366] hover:bg-[#1ebe5d] text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl shadow-emerald-900/30 transition-all hover:scale-105"
            >
                <span class="material-symbols-outlined">chat</span>
                Cotizar por WhatsApp
            </a>
            <a
                href="<?php echo esc_url( $ch_inventario_url ); ?>"
                class="ch-glass-strong inline-flex items-center justify-center gap-3 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-ch-primary transition-all hover:scale-105"
            >
                Ver inventario
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>

        <div class="ch-glass inline-flex flex-wrap justify-center gap-x-10 gap-y-3 px-8 py-4 rounded-full">
            <span class="flex items-center gap-2 text-white text-sm font-label">
                <span class="material-symbols-outlined text-base">verified</span> Desde 1974
            </span>
            <span class="flex items-center gap-2 text-white text-sm font-label">
                <span class="material-symbols-outlined text-base">workspace_premium</span> Distribuidor oficial
            </span>
            <span class="flex items-center gap-2 text-white text-sm font-label">
                <span class="material-symbols-outlined text-base">shield</span> Garantía de fábrica
            </span>
        </div>
    </div>
</section>

<!-- ============================================================
     2. TRUST BAR
     ============================================================ -->
<section class="bg-ch-surface py-20 px-6 md:px-12 border-b border-ch-line/30">
    <div class="max-w-7xl mx-auto grid grid-cols-2 lg:grid-cols-4 gap-10 text-center">
        <div>
            <div class="text-5xl md:text-6xl font-black text-ch-primary font-headline">50+</div>
            <div class="text-xs uppercase tracking-[0.2em] text-ch-ink-soft font-label mt-3">Años de trayectoria<br/>desde 1974</div>
        </div>
        <div>
            <div class="text-5xl md:text-6xl font-black text-ch-primary font-headline">12</div>
            <div class="text-xs uppercase tracking-[0.2em] text-ch-ink-soft font-label mt-3">Marcas oficiales<br/>que distribuimos</div>
        </div>
        <div>
            <div class="text-5xl md:text-6xl font-black text-ch-primary font-headline">100%</div>
            <div class="text-xs uppercase tracking-[0.2em] text-ch-ink-soft font-label mt-3">Repuestos genuinos<br/>de fábrica</div>
        </div>
        <div>
            <div class="text-5xl md:text-6xl font-black text-ch-primary font-headline">3</div>
            <div class="text-xs uppercase tracking-[0.2em] text-ch-ink-soft font-label mt-3">Sucursales:<br/>Ibarra · Otavalo · Quito</div>
        </div>
    </div>
</section>

<!-- ============================================================
     3. PORTAFOLIO DE MARCAS
     ============================================================ -->
<section class="bg-ch-surface-2 py-28 px-6 md:px-12">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <span class="inline-block text-ch-primary font-label font-bold tracking-[0.3em] uppercase text-xs mb-4">12 marcas oficiales</span>
            <h2 class="text-4xl md:text-5xl font-black mb-4">El portafolio más completo del norte del Ecuador</h2>
            <p class="text-lg text-ch-ink-soft max-w-2xl mx-auto">
                Somos concesionario autorizado por 12 casas matrices. Desde compactos y SUVs hasta camionetas de trabajo, tenemos la marca y el modelo que necesitas.
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 md:gap-6">
            <?php foreach ( $ch_marcas as $marca ) : ?>
            <a
                href="<?php echo esc_url( $marca['url'] ); ?>"
                class="group ch-glass-light aspect-square rounded-2xl flex flex-col items-center justify-center p-5 text-center transition-all duration-500 hover:-translate-y-1.5 hover:shadow-2xl hover:shadow-ch-primary/10 hover:bg-white"
                aria-label="Ver modelos <?php echo esc_attr( $marca['nombre'] ); ?> en Comercial Hidrobo"
            >
                <div class="flex-1 flex items-center justify-center w-full mb-3">
                    <!-- CH_TODO: subir logos SVG reales a /assets/marcas/[slug].svg -->
                    <img
                        src="<?php echo esc_url( $marca['logo'] ); ?>"
                        alt="Logo <?php echo esc_attr( $marca['nombre'] ); ?> — distribuidor oficial Comercial Hidrobo"
                        class="max-w-[80%] max-h-16 object-contain group-hover:scale-110 transition-transform duration-500"
                        loading="lazy"
                    />
                </div>
                <h3 class="text-sm md:text-base font-bold text-ch-ink group-hover:text-ch-primary transition-colors">
                    <?php echo esc_html( $marca['nombre'] ); ?>
                </h3>
            </a>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-16">
            <a
                href="<?php echo esc_url( $ch_inventario_url ); ?>"
                class="inline-flex items-center gap-2 bg-ch-primary hover:bg-ch-primary-dark text-white px-8 py-4 rounded-full font-bold transition-all hover:scale-105 shadow-xl shadow-ch-primary/20"
            >
                Explorar todo el inventario
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     4. FINANCIAMIENTO
     ============================================================ -->
<section class="bg-ch-surface py-28 px-6 md:px-12 overflow-hidden">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">
        <div>
            <span class="inline-block text-ch-primary font-label font-bold tracking-[0.3em] uppercase text-xs mb-4">Crédito vehicular</span>
            <h2 class="text-4xl md:text-5xl font-black mb-6 leading-tight">Financiamiento que se ajusta a tu realidad</h2>
            <p class="text-lg text-ch-ink-soft mb-10 leading-relaxed">
                No tienes que pagar todo al contado. Trabajamos con la banca nacional y planes propios para que estrenes tu auto con cuotas que sí te alcanzan.
            </p>

            <ul class="space-y-5 mb-10">
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-ch-primary mt-1 flex-shrink-0">check_circle</span>
                    <div>
                        <div class="font-bold text-base">Tasa preferencial</div>
                        <div class="text-ch-ink-soft text-sm">Convenios exclusivos con bancos del Ecuador.</div>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-ch-primary mt-1 flex-shrink-0">check_circle</span>
                    <div>
                        <div class="font-bold text-base">Aprobación en 24 horas</div>
                        <div class="text-ch-ink-soft text-sm">Te respondemos al día hábil siguiente.</div>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-ch-primary mt-1 flex-shrink-0">check_circle</span>
                    <div>
                        <div class="font-bold text-base">Plazos de hasta 60 meses</div>
                        <div class="text-ch-ink-soft text-sm">Cuotas cómodas según tu perfil de ingresos.</div>
                    </div>
                </li>
                <li class="flex items-start gap-4">
                    <span class="material-symbols-outlined text-ch-primary mt-1 flex-shrink-0">check_circle</span>
                    <div>
                        <div class="font-bold text-base">Entrada desde 0%</div>
                        <div class="text-ch-ink-soft text-sm">Planes seleccionados sin cuota inicial.</div>
                    </div>
                </li>
            </ul>

            <a
                href="<?php echo esc_url( ch_wa_link( $ch_whatsapp_number, 'Hola, quiero información sobre el financiamiento para un auto nuevo.' ) ); ?>"
                target="_blank"
                rel="noopener"
                class="inline-flex items-center gap-2 bg-ch-primary hover:bg-ch-primary-dark text-white px-8 py-4 rounded-full font-bold transition-all hover:scale-105 shadow-xl shadow-ch-primary/20"
            >
                Solicitar asesoría de financiamiento
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>

        <div class="relative">
            <!-- CH_TODO: foto real de entrega de llaves / cliente firmando -->
            <img
                src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/financiamiento.jpg' ); ?>"
                alt="Asesor de Comercial Hidrobo entregando las llaves de un auto nuevo a un cliente en Ibarra"
                class="rounded-3xl shadow-2xl w-full"
                loading="lazy"
            />
            <div class="absolute -bottom-8 -left-8 ch-glass-light p-6 rounded-2xl hidden md:block">
                <div class="text-ch-primary font-black text-5xl leading-none">0%</div>
                <div class="text-xs uppercase tracking-widest text-ch-ink-soft font-label mt-2">Entrada en planes<br/>seleccionados</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     5. TALLER CERTIFICADO
     ============================================================ -->
<section class="relative min-h-[80vh] w-full flex items-center overflow-hidden py-20">
    <div class="absolute inset-0 z-0">
        <!-- CH_TODO: foto real del taller -->
        <img
            src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/taller.jpg' ); ?>"
            alt="Taller certificado de Comercial Hidrobo con técnicos capacitados en Ibarra"
            class="w-full h-full object-cover"
            loading="lazy"
        />
        <div class="absolute inset-0 bg-gradient-to-r from-ch-ink/85 via-ch-ink/40 to-ch-ink/10"></div>
    </div>

    <div class="relative z-10 max-w-7xl w-full mx-auto px-6 md:px-12 flex justify-start">
        <div class="ch-glass-strong p-10 md:p-14 rounded-3xl max-w-xl text-white">
            <span class="inline-block text-ch-primary-soft font-label font-bold tracking-[0.3em] uppercase text-xs mb-4">Servicio postventa</span>
            <h2 class="text-4xl md:text-5xl font-black mb-6 leading-tight">Taller certificado por las marcas que vendemos</h2>
            <p class="text-lg text-white/85 mb-10 leading-relaxed">
                Tus mantenimientos los hace gente capacitada directamente por las casas matrices. Conservas la garantía de fábrica y la tranquilidad de saber que tu auto está en manos correctas.
            </p>

            <ul class="space-y-3 mb-10">
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-ch-primary-soft">check_circle</span> Diagnóstico computarizado</li>
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-ch-primary-soft">check_circle</span> Repuestos genuinos</li>
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-ch-primary-soft">check_circle</span> Garantía en cada servicio</li>
                <li class="flex items-center gap-3"><span class="material-symbols-outlined text-ch-primary-soft">check_circle</span> Técnicos certificados por la marca</li>
            </ul>

            <a
                href="<?php echo esc_url( $ch_taller_url ); ?>"
                class="inline-flex items-center gap-2 bg-white hover:bg-ch-primary hover:text-white text-ch-primary px-8 py-4 rounded-full font-bold transition-all hover:scale-105"
            >
                Agendar cita en el taller
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     6. REPUESTOS GENUINOS
     ============================================================ -->
<section class="bg-ch-surface-2 py-28 px-6 md:px-12">
    <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-16 items-center">
        <div class="order-2 lg:order-1">
            <!-- CH_TODO: foto real de repuestos genuinos en estantería -->
            <img
                src="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/repuestos.jpg' ); ?>"
                alt="Repuestos genuinos para autos en bodega de Comercial Hidrobo"
                class="rounded-3xl shadow-xl w-full"
                loading="lazy"
            />
        </div>

        <div class="order-1 lg:order-2">
            <span class="inline-block text-ch-primary font-label font-bold tracking-[0.3em] uppercase text-xs mb-4">Garantía de origen</span>
            <h2 class="text-4xl md:text-5xl font-black mb-6 leading-tight">Repuestos genuinos para tu vehículo</h2>
            <p class="text-lg text-ch-ink-soft mb-10 leading-relaxed">
                Cada componente que vendemos cumple las especificaciones exactas del fabricante. Las alternativas genéricas pueden anular tu garantía y comprometer la seguridad. Aquí no.
            </p>

            <a
                href="<?php echo esc_url( $ch_repuestos_url ); ?>"
                class="inline-flex items-center gap-2 bg-ch-primary hover:bg-ch-primary-dark text-white px-8 py-4 rounded-full font-bold transition-all hover:scale-105 shadow-xl shadow-ch-primary/20"
            >
                Solicitar un repuesto
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================================
     7. TESTIMONIOS
     ============================================================ -->
<section class="bg-ch-surface py-28 px-6 md:px-12">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <span class="inline-block text-ch-primary font-label font-bold tracking-[0.3em] uppercase text-xs mb-4">Lo que dicen nuestros clientes</span>
            <h2 class="text-4xl md:text-5xl font-black">Clientes que ya manejan con nosotros</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php
            // CH_TODO: reemplazar con testimonios reales + fotos reales
            $ch_testimonios = array(
                array(
                    'texto'  => 'Compré mi Duster acá hace tres años. La atención fue clara desde el primer día y el taller siempre me cumple los tiempos. Vale la pena la lealtad.',
                    'nombre' => 'María Andrade',
                    'rol'    => 'Ingeniera Agrónoma',
                    'foto'   => get_stylesheet_directory_uri() . '/assets/testimonios/maria.jpg',
                ),
                array(
                    'texto'  => 'Me ayudaron a estructurar el crédito en cuotas que sí podía pagar. Sin sorpresas, sin letra chica.',
                    'nombre' => 'Carlos Pozo',
                    'rol'    => 'Comerciante',
                    'foto'   => get_stylesheet_directory_uri() . '/assets/testimonios/carlos.jpg',
                ),
                array(
                    'texto'  => 'El servicio post-venta es lo que los diferencia. Cualquier consulta por WhatsApp y me contestan el mismo día.',
                    'nombre' => 'Fernanda Cevallos',
                    'rol'    => 'Médica',
                    'foto'   => get_stylesheet_directory_uri() . '/assets/testimonios/fernanda.jpg',
                ),
            );
            foreach ( $ch_testimonios as $t ) : ?>
            <div class="ch-glass-light p-10 rounded-3xl flex flex-col">
                <span class="material-symbols-outlined text-ch-primary text-5xl mb-6">format_quote</span>
                <p class="text-lg leading-relaxed italic text-ch-ink mb-8 flex-1">"<?php echo esc_html( $t['texto'] ); ?>"</p>
                <div class="flex items-center gap-4">
                    <img src="<?php echo esc_url( $t['foto'] ); ?>" alt="Foto de <?php echo esc_attr( $t['nombre'] ); ?>" class="w-14 h-14 rounded-full object-cover" loading="lazy"/>
                    <div>
                        <div class="font-bold text-base"><?php echo esc_html( $t['nombre'] ); ?></div>
                        <div class="text-xs uppercase tracking-widest text-ch-ink-soft font-label"><?php echo esc_html( $t['rol'] ); ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     8. FAQ
     ============================================================ -->
<section class="bg-ch-surface-2 py-28 px-6 md:px-12">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <span class="inline-block text-ch-primary font-label font-bold tracking-[0.3em] uppercase text-xs mb-4">Resolvemos tus dudas</span>
            <h2 class="text-4xl md:text-5xl font-black">Preguntas frecuentes</h2>
        </div>

        <div class="ch-faq space-y-4">
            <?php foreach ( $ch_faqs as $i => $faq ) : ?>
            <details class="ch-glass-light rounded-2xl overflow-hidden" <?php echo 0 === $i ? 'open' : ''; ?>>
                <summary class="flex justify-between items-center p-6 md:p-8">
                    <span class="font-bold text-base md:text-lg pr-4"><?php echo esc_html( $faq['q'] ); ?></span>
                    <span class="material-symbols-outlined ch-faq-icon text-ch-primary flex-shrink-0">expand_more</span>
                </summary>
                <div class="px-6 md:px-8 pb-8 text-ch-ink-soft leading-relaxed">
                    <?php echo esc_html( $faq['a'] ); ?>
                </div>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============================================================
     9. BLOG / NOVEDADES (dinámico)
     ============================================================ -->
<section class="bg-ch-surface py-28 px-6 md:px-12">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4 mb-12">
            <div>
                <span class="inline-block text-ch-primary font-label font-bold tracking-[0.3em] uppercase text-xs mb-3">Blog</span>
                <h2 class="text-4xl md:text-5xl font-black">Novedades del sector</h2>
                <p class="text-ch-ink-soft mt-3 max-w-xl">Información útil para conductores en Ecuador: lanzamientos, mantenimiento, financiamiento y más.</p>
            </div>
            <a href="<?php echo esc_url( $ch_blog_url ); ?>" class="inline-flex items-center gap-1 text-ch-primary font-bold border-b-2 border-ch-primary pb-1 self-start md:self-end">
                Ver todo el blog
                <span class="material-symbols-outlined text-base">arrow_forward</span>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php
            $latest = new WP_Query( array(
                'posts_per_page' => 3,
                'post_status'    => 'publish',
                'ignore_sticky_posts' => true,
            ) );
            if ( $latest->have_posts() ) :
                while ( $latest->have_posts() ) : $latest->the_post();
                    $cats = get_the_category();
                    $cat_name = ! empty( $cats ) ? $cats[0]->name : '';
                ?>
                <a href="<?php the_permalink(); ?>" class="group block">
                    <div class="overflow-hidden rounded-2xl mb-5 aspect-[16/10]">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'large', array(
                                'class'   => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-700',
                                'loading' => 'lazy',
                                'alt'     => get_the_title(),
                            ) ); ?>
                        <?php else : ?>
                            <div class="w-full h-full bg-ch-primary-soft"></div>
                        <?php endif; ?>
                    </div>
                    <?php if ( $cat_name ) : ?>
                        <span class="text-xs uppercase tracking-widest text-ch-primary font-bold"><?php echo esc_html( $cat_name ); ?></span>
                    <?php endif; ?>
                    <h3 class="text-xl font-bold mt-3 mb-3 leading-tight group-hover:text-ch-primary transition-colors"><?php the_title(); ?></h3>
                    <p class="text-ch-ink-soft line-clamp-2 text-sm leading-relaxed"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
                </a>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- ============================================================
     10. CTA FINAL
     ============================================================ -->
<section class="relative ch-cta-gradient py-32 px-6 overflow-hidden">
    <div class="relative z-10 max-w-4xl mx-auto">
        <div class="ch-glass-strong rounded-[2.5rem] p-12 md:p-20 text-center text-white">
            <h2 class="text-4xl md:text-6xl font-black mb-6 leading-tight">¿Listo para llevarte tu próximo auto?</h2>
            <p class="text-lg md:text-xl text-white/85 mb-12 max-w-2xl mx-auto leading-relaxed">
                Habla directo con un asesor o recorre nuestro inventario completo. Estamos para ayudarte.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-stretch sm:items-center">
                <a
                    href="<?php echo esc_url( ch_wa_link( $ch_whatsapp_number, 'Hola, quiero hablar con un asesor sobre los autos disponibles.' ) ); ?>"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center justify-center gap-3 bg-[#25D366] hover:bg-[#1ebe5d] text-white px-10 py-5 rounded-full font-bold text-lg shadow-xl transition-all hover:scale-105"
                >
                    <span class="material-symbols-outlined">chat</span>
                    Cotizar por WhatsApp
                </a>
                <a
                    href="<?php echo esc_url( $ch_inventario_url ); ?>"
                    class="ch-glass inline-flex items-center justify-center gap-3 text-white px-10 py-5 rounded-full font-bold text-lg hover:bg-white hover:text-ch-primary transition-all hover:scale-105"
                >
                    Ver inventario completo
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
        </div>
    </div>
</section>

</main>

<?php get_footer(); ?>
