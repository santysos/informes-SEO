<?php
/**
 * Plugin Name: Luuma — Habilita Yoast SEO meta vía REST
 * Description: Registra los metas de Yoast (_yoast_wpseo_title, _metadesc, _focuskw, _canonical, _opengraph_*) con show_in_rest=true para que un admin pueda actualizar SEO de páginas y posts vía REST API. Auth: solo usuarios con capability edit_posts.
 * Version:     1.0.0
 * Author:      Creative Web
 *
 * Subir a: /wp-content/mu-plugins/luuma-yoast-rest.php
 * (Si la carpeta mu-plugins no existe, créala con permisos 755. Archivo permisos 644.)
 *
 * Una vez subido, los siguientes meta_keys son legibles y escribibles desde la WP REST API
 * por usuarios con capability `edit_posts`:
 *
 *   _yoast_wpseo_title              (SEO title — lo que aparece en Google)
 *   _yoast_wpseo_metadesc           (Meta description — snippet en Google)
 *   _yoast_wpseo_focuskw            (Focus keyword Yoast)
 *   _yoast_wpseo_canonical          (URL canónica)
 *   _yoast_wpseo_meta-robots-noindex
 *   _yoast_wpseo_meta-robots-nofollow
 *   _yoast_wpseo_opengraph-title
 *   _yoast_wpseo_opengraph-description
 *   _yoast_wpseo_opengraph-image
 *   _yoast_wpseo_twitter-title
 *   _yoast_wpseo_twitter-description
 *   _yoast_wpseo_twitter-image
 *
 * Por tipo: post, page (en luumarooftop.com los posts del blog son 'post' y las páginas /menu/, /menu-almuerzo/, /bebidas/, home son 'page').
 *
 * Cuando se termine la campaña SEO se puede quitar este archivo (eliminar de mu-plugins).
 * No afecta nada visible al frontend ni al admin.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', function () {
    $object_types = [ 'post', 'page' ];

    $yoast_meta_keys = [
        '_yoast_wpseo_title',
        '_yoast_wpseo_metadesc',
        '_yoast_wpseo_focuskw',
        '_yoast_wpseo_canonical',
        '_yoast_wpseo_meta-robots-noindex',
        '_yoast_wpseo_meta-robots-nofollow',
        '_yoast_wpseo_opengraph-title',
        '_yoast_wpseo_opengraph-description',
        '_yoast_wpseo_opengraph-image',
        '_yoast_wpseo_twitter-title',
        '_yoast_wpseo_twitter-description',
        '_yoast_wpseo_twitter-image',
        '_yoast_wpseo_primary_category',
    ];

    foreach ( $object_types as $type ) {
        foreach ( $yoast_meta_keys as $key ) {
            register_post_meta( $type, $key, [
                'type'          => 'string',
                'single'        => true,
                'show_in_rest'  => true,
                'auth_callback' => function () {
                    return current_user_can( 'edit_posts' );
                },
            ] );
        }
    }
}, 5 );
