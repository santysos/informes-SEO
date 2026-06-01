<?php
/**
 * Plugin Name: Luuma — Schema Restaurant + LocalBusiness + Menu
 * Description: Inyecta JSON-LD estructurado en la home y en /menu/ para Restaurant, LocalBusiness, Menu con MenuItems reales parseados de la carta del sitio. Reemplaza/complementa lo que Yoast genera por defecto.
 * Version:     1.0.0
 * Author:      Creative Web
 *
 * Subir a: /wp-content/mu-plugins/luuma-schema-local.php
 *
 * Qué inyecta:
 *   1) <script type="application/ld+json"> con @type Restaurant en TODAS las páginas
 *      (incluye NAP, horarios, paymentAccepted, servesCuisine, priceRange, geo)
 *   2) En /menu/ (page id=26) además inyecta @type Menu con 9 MenuItems y precios.
 *   3) En /bebidas/ (page id=371) inyecta @type Menu con cocteles signature.
 *
 * Validación:
 *   - https://search.google.com/test/rich-results
 *   - https://validator.schema.org/
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ============================================================
// NAP CANÓNICO — fuente única de verdad
// ============================================================
// Si Luuma se muda o cambia teléfono, modificar acá y se actualiza en todos los Schema.
function luuma_nap() {
    return [
        'name'      => 'Luuma Rooftop',
        'url'       => 'https://www.luumarooftop.com',
        'logo'      => 'https://www.luumarooftop.com/wp-content/uploads/2025/07/luuma-rooftop-restaurante-playa-1.webp',
        'image'     => [
            'https://www.luumarooftop.com/wp-content/uploads/2025/10/luuma-rooftop-restaurant-manabi-manta-1.webp',
            'https://www.luumarooftop.com/wp-content/uploads/2025/10/luuma-rooftop-restaurant-manabi-manta-7.webp',
            'https://www.luumarooftop.com/wp-content/uploads/2025/10/luuma-rooftop-restaurant-manabi-manta-11.webp',
        ],
        'telephone' => '+593963485983',
        'address'   => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Av. Flavio Reyes',
            'addressLocality' => 'Manta',
            'addressRegion'   => 'Manabí',
            'postalCode'      => '130802',
            'addressCountry'  => 'EC',
        ],
        // TODO: confirmar coordenadas exactas con el cliente
        'geo'       => [
            '@type'     => 'GeoCoordinates',
            'latitude'  => -0.95,
            'longitude' => -80.72,
        ],
        // Horarios genéricos — ajustar con los reales del cliente
        'openingHoursSpecification' => [
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => [ 'Tuesday', 'Wednesday', 'Thursday' ],
                'opens'     => '12:30',
                'closes'    => '23:00',
            ],
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => [ 'Friday', 'Saturday' ],
                'opens'     => '12:30',
                'closes'    => '00:30',
            ],
            [
                '@type'     => 'OpeningHoursSpecification',
                'dayOfWeek' => [ 'Sunday' ],
                'opens'     => '12:30',
                'closes'    => '22:00',
            ],
        ],
        'servesCuisine'  => [ 'Manabita', 'Ecuatoriana', 'Mariscos', 'Cocteles de autor' ],
        'priceRange'     => '$$',
        'paymentAccepted'=> 'Cash, Credit Card, Debit Card',
        'acceptsReservations' => 'True',
        'sameAs' => [
            // TODO: completar con URLs reales de Facebook, Instagram, TripAdvisor, GBP cuando estén
        ],
    ];
}

// ============================================================
// MENÚ COMIDA — parseado de /menu/ el 2026-06-01
// ============================================================
function luuma_menu_food() {
    return [
        [
            'name'        => 'Entradas y aperitivos',
            'items'       => [
                [ 'name' => 'Tradicional (snack manabita)', 'price' => '8.50' ],
                [ 'name' => 'Jipijapa', 'price' => '9.50' ],
                [ 'name' => 'Nuggets de pollo', 'price' => '5.99' ],
                [ 'name' => 'Papa francesa de la casa con chorizo', 'price' => '4.99' ],
                [ 'name' => 'Mini pizza clásica de jamón y queso', 'price' => '5.99' ],
            ],
        ],
        [
            'name'        => 'Pastas',
            'items'       => [
                [ 'name' => 'Carbonara', 'price' => '13.60' ],
            ],
        ],
        [
            'name'        => 'Fuertes',
            'items'       => [
                [ 'name' => 'Pechuga de pollo', 'price' => '14.80' ],
                [ 'name' => 'Camarones', 'price' => '15.90' ],
                [ 'name' => 'Pesca blanca', 'price' => '17.80' ],
            ],
        ],
    ];
}

// ============================================================
// MENÚ BEBIDAS — top 15 cocteles + cervezas
// ============================================================
function luuma_menu_drinks() {
    return [
        [
            'name'  => 'Cocteles de autor y clásicos',
            'items' => [
                [ 'name' => 'Aperol spritz', 'price' => '13.80' ],
                [ 'name' => 'Negroni', 'price' => '11.50' ],
                [ 'name' => 'Espresso martini', 'price' => '10.90' ],
                [ 'name' => 'Manhattan', 'price' => '10.50' ],
                [ 'name' => 'Mai tai', 'price' => '11.95' ],
                [ 'name' => 'Piña colada', 'price' => '10.95' ],
                [ 'name' => 'Old fashion', 'price' => '9.50' ],
                [ 'name' => 'Cosmopolitan', 'price' => '9.85' ],
                [ 'name' => 'Moscú mule', 'price' => '9.90' ],
                [ 'name' => 'Gin basil smash', 'price' => '9.60' ],
                [ 'name' => 'Sex on the beach', 'price' => '9.95' ],
                [ 'name' => 'Mimosa', 'price' => '6.95' ],
                [ 'name' => 'Long Island ice tea', 'price' => '8.60' ],
            ],
        ],
        [
            'name'  => 'Cervezas',
            'items' => [
                [ 'name' => 'Club verde', 'price' => '5.00' ],
                [ 'name' => 'Heineken', 'price' => '6.00' ],
                [ 'name' => 'Corona', 'price' => '6.00' ],
                [ 'name' => 'Stella Artois', 'price' => '6.00' ],
            ],
        ],
    ];
}

// ============================================================
// BUILDERS de Schema
// ============================================================
function luuma_build_restaurant_schema() {
    $nap = luuma_nap();
    return array_merge(
        [
            '@context' => 'https://schema.org',
            '@type'    => 'Restaurant',
            '@id'      => $nap['url'] . '/#restaurant',
        ],
        $nap
    );
}

function luuma_build_menu_schema( $sections, $menu_url, $name ) {
    $built_sections = [];
    foreach ( $sections as $sec ) {
        $items = [];
        foreach ( $sec['items'] as $it ) {
            $items[] = [
                '@type'  => 'MenuItem',
                'name'   => $it['name'],
                'offers' => [
                    '@type'         => 'Offer',
                    'price'         => $it['price'],
                    'priceCurrency' => 'USD',
                ],
            ];
        }
        $built_sections[] = [
            '@type'       => 'MenuSection',
            'name'        => $sec['name'],
            'hasMenuItem' => $items,
        ];
    }
    return [
        '@context'       => 'https://schema.org',
        '@type'          => 'Menu',
        'name'           => $name,
        'inLanguage'     => 'es-EC',
        'url'            => $menu_url,
        'hasMenuSection' => $built_sections,
    ];
}

// ============================================================
// HOOK: imprimir JSON-LD en el head
// ============================================================
add_action( 'wp_head', function () {
    // Restaurant en todas las páginas (alto valor, no duplica con Yoast)
    echo "\n<!-- Luuma Schema: Restaurant -->\n";
    echo '<script type="application/ld+json">' . wp_json_encode( luuma_build_restaurant_schema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";

    // Menu sólo en /menu/ (id=26)
    if ( is_page( 26 ) ) {
        $menu = luuma_build_menu_schema( luuma_menu_food(), home_url( '/menu/' ), 'Carta de comida — Luuma Rooftop' );
        echo "<!-- Luuma Schema: Menu (comida) -->\n";
        echo '<script type="application/ld+json">' . wp_json_encode( $menu, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
    }

    // Menu de bebidas en /bebidas/ (id=371)
    if ( is_page( 371 ) ) {
        $menu = luuma_build_menu_schema( luuma_menu_drinks(), home_url( '/bebidas/' ), 'Carta de bebidas — Luuma Rooftop' );
        echo "<!-- Luuma Schema: Menu (bebidas) -->\n";
        echo '<script type="application/ld+json">' . wp_json_encode( $menu, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
    }
}, 99 );
