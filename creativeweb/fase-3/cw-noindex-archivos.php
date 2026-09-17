<?php
/**
 * Plugin Name: Creative Web — noindex de archivos de taxonomía
 * Description: Marca como noindex los archivos de categoría, etiqueta, autor y
 *              fecha, que son páginas delgadas que diluyen la autoridad del sitio
 *              y compiten con las páginas que sí venden.
 * Version:     1.0
 * Author:      Creative Web
 *
 * ─── POR QUÉ EXISTE ────────────────────────────────────────────────────────
 * En el triaje de contenido (Fase 1, 2026-09-09) los 43 archivos de
 * etiqueta/categoría/autor sumaban ~373 impresiones y 4 clics en un año: puro
 * contenido delgado que Google indexa y que reparte autoridad sin traer nada.
 * Con este archivo dejan de indexarse (se mantienen rastreables — noindex,follow —
 * para no cortar el flujo de enlaces internos).
 *
 * Es global: cubre los 43 de hoy y cualquier archivo nuevo que se cree.
 *
 * INSTALACIÓN — sin plugins ni activación
 *   Subir a: /public_html/wp-content/mu-plugins/cw-noindex-archivos.php
 *   Si la carpeta mu-plugins no existe, crearla. Los mu-plugins se cargan solos.
 *   Para revertir: borrar este archivo.
 * ───────────────────────────────────────────────────────────────────────────
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/** ¿Es un archivo que queremos sacar del índice? */
function cw_es_archivo_noindex() {
	return is_category() || is_tag() || is_tax() || is_author() || is_date();
}

/**
 * Yoast: filtro sobre el arreglo de robots que arma para cada página.
 * Se deja follow para no cortar el enlazado interno.
 */
add_filter( 'wpseo_robots_array', function ( $robots ) {
	if ( cw_es_archivo_noindex() ) {
		$robots['index'] = 'noindex';
	}
	return $robots;
}, 10, 1 );

/**
 * Respaldo por si el tema/otra capa usa el filtro de robots del core de WordPress
 * (WP 5.7+). No estorba si Yoast ya resolvió arriba.
 */
add_filter( 'wp_robots', function ( $robots ) {
	if ( cw_es_archivo_noindex() ) {
		$robots['noindex'] = true;
		unset( $robots['index'] );
	}
	return $robots;
}, 20 );
