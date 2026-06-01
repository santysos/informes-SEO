<?php
/**
 * Plugin Name: Luuma — Habilita Yoast SEO meta vía REST
 * Description: Registra los metas de Yoast (_yoast_wpseo_title, _metadesc, _focuskw, _canonical, _opengraph_*) con show_in_rest=true para que un admin pueda actualizar SEO de páginas y posts vía REST API. Auth: solo usuarios con capability edit_posts.
 * Version:     1.1.0
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

/**
 * Sincroniza wp_yoast_indexable cuando se actualiza un postmeta Yoast vía REST.
 *
 * Sin esto, Yoast Premium lee `title`, `description`, `canonical`, etc. desde la tabla
 * `wp_yoast_indexable` y NO desde postmeta. Así que aunque el postmeta se actualice,
 * el frontal sigue mostrando el title viejo (regenerado desde indexable en cada render).
 *
 * Mapeo postmeta → columna de indexable:
 *   _yoast_wpseo_title              → title
 *   _yoast_wpseo_metadesc           → description
 *   _yoast_wpseo_focuskw            → primary_focus_keyword
 *   _yoast_wpseo_canonical          → canonical
 *   _yoast_wpseo_meta-robots-noindex → is_robots_noindex (0/1)
 *   _yoast_wpseo_opengraph-title    → open_graph_title
 *   _yoast_wpseo_opengraph-description → open_graph_description
 *   _yoast_wpseo_opengraph-image    → open_graph_image
 *   _yoast_wpseo_twitter-title      → twitter_title
 *   _yoast_wpseo_twitter-description → twitter_description
 *   _yoast_wpseo_twitter-image      → twitter_image
 */
add_action( 'updated_post_meta', 'luuma_sync_yoast_indexable', 10, 4 );
add_action( 'added_post_meta',   'luuma_sync_yoast_indexable', 10, 4 );

function luuma_sync_yoast_indexable( $meta_id, $post_id, $meta_key, $meta_value ) {
    if ( strpos( $meta_key, '_yoast_wpseo_' ) !== 0 ) {
        return;
    }
    global $wpdb;
    $table = $wpdb->prefix . 'yoast_indexable';

    // Verificar que la tabla existe (Yoast Premium 14+).
    $exists = $wpdb->get_var( $wpdb->prepare(
        "SHOW TABLES LIKE %s", $table
    ) );
    if ( $exists !== $table ) {
        return;
    }

    $map = [
        '_yoast_wpseo_title'                => 'title',
        '_yoast_wpseo_metadesc'             => 'description',
        '_yoast_wpseo_focuskw'              => 'primary_focus_keyword',
        '_yoast_wpseo_canonical'            => 'canonical',
        '_yoast_wpseo_meta-robots-noindex'  => 'is_robots_noindex',
        '_yoast_wpseo_opengraph-title'      => 'open_graph_title',
        '_yoast_wpseo_opengraph-description'=> 'open_graph_description',
        '_yoast_wpseo_opengraph-image'      => 'open_graph_image',
        '_yoast_wpseo_twitter-title'        => 'twitter_title',
        '_yoast_wpseo_twitter-description'  => 'twitter_description',
        '_yoast_wpseo_twitter-image'        => 'twitter_image',
        '_yoast_wpseo_primary_category'     => 'primary_taxonomy_id',
    ];

    if ( ! isset( $map[ $meta_key ] ) ) {
        return;
    }
    $column = $map[ $meta_key ];

    // Convertir booleanos para is_robots_noindex.
    if ( $column === 'is_robots_noindex' ) {
        $meta_value = ( $meta_value === '1' || $meta_value === 1 || $meta_value === true ) ? 1 : 0;
    }

    // Update directo en la fila indexable de este post.
    // (Si no existe la fila, Yoast la creará al próximo render del post.)
    $wpdb->update(
        $table,
        [ $column => $meta_value ],
        [ 'object_id' => intval( $post_id ), 'object_type' => 'post' ]
    );

    // Borrar cualquier caché transient de Yoast para esta URL.
    $url = get_permalink( $post_id );
    if ( $url ) {
        wp_cache_delete( 'yoast_head:' . md5( $url ), 'yoast_head' );
    }
}
