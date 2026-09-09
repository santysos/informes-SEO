<?php
/**
 * Plugin Name: Creative Web — Yoast editable por API
 * Description: Deja que el título SEO y la meta descripción de Yoast se puedan leer y
 *              escribir por la API REST de WordPress.
 * Version:     1.0
 * Author:      Creative Web
 *
 * ─── POR QUÉ EXISTE ────────────────────────────────────────────────────────
 * WordPress descarta silenciosamente cualquier meta cuyo nombre empiece con «_»
 * en las escrituras por REST, aunque devuelva 200. Los campos de Yoast empiezan
 * todos con «_yoast_wpseo_», así que no hay forma de editarlos por API sin esto.
 *
 * Lo comprobamos el 2026-09-08: al cambiar el título de una entrada, el H1 del
 * sitio cambió de inmediato, pero el <title> y el og:title siguieron mostrando el
 * texto anterior — porque Yoast guarda su propio título aparte y es el que manda.
 *
 * Con este archivo en su sitio, esos campos quedan disponibles en
 * /wp-json/wp/v2/posts/{id} y /wp-json/wp/v2/pages/{id} dentro de «meta», y se
 * pueden actualizar con un POST normal.
 *
 * Solo puede escribirlos quien tenga permiso de editar esa entrada. No abre nada
 * a usuarios no autenticados ni a roles sin permisos de edición.
 * ───────────────────────────────────────────────────────────────────────────
 *
 * INSTALACIÓN — sin plugins ni activación
 *   Subir a: /public_html/wp-content/mu-plugins/cw-yoast-rest.php
 *   Si la carpeta mu-plugins no existe, crearla. Los mu-plugins se cargan solos.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'cw_registrar_meta_yoast_en_rest', 20 );
function cw_registrar_meta_yoast_en_rest() {

	// Campos de Yoast que nos interesa poder editar.
	$campos = array(
		'_yoast_wpseo_title'    => 'string',  // título SEO
		'_yoast_wpseo_metadesc' => 'string',  // meta descripción
		'_yoast_wpseo_focuskw'  => 'string',  // frase clave objetivo
		'_yoast_wpseo_canonical'=> 'string',  // canonical, por si hiciera falta
	);

	// Tipos de contenido públicos donde aplica.
	$tipos = array( 'post', 'page' );

	foreach ( $tipos as $tipo ) {
		foreach ( $campos as $clave => $formato ) {
			register_post_meta(
				$tipo,
				$clave,
				array(
					'type'              => $formato,
					'single'            => true,
					'show_in_rest'      => true,
					'sanitize_callback' => 'wp_strip_all_tags',
					'auth_callback'     => function ( $permitido, $meta_key, $post_id ) {
						return current_user_can( 'edit_post', $post_id );
					},
				)
			);
		}
	}
}

/**
 * Yoast guarda una copia de estos valores en su tabla de «indexables» y sirve
 * esa copia al pintar la página. Si solo se actualiza el meta, el sitio seguiría
 * mostrando el título viejo; esto obliga a Yoast a regenerar su copia.
 */
add_action( 'updated_post_meta', 'cw_refrescar_indexable_yoast', 10, 4 );
add_action( 'added_post_meta', 'cw_refrescar_indexable_yoast', 10, 4 );
function cw_refrescar_indexable_yoast( $meta_id, $post_id, $meta_key, $meta_value ) {

	if ( strpos( (string) $meta_key, '_yoast_wpseo_' ) !== 0 ) {
		return;
	}

	// Se borra el indexable para que Yoast lo reconstruya la próxima vez que lo lea.
	//
	// OJO: aquí NO va do_action( 'wpseo_save_indexable', $post_id ). Se probó el
	// 2026-09-08 y provoca un error fatal: Yoast engancha ese aviso a
	// Indexable_Ancestor_Watcher::reset_children(), que espera más argumentos.
	// El meta alcanzaba a guardarse, pero la petición devolvía un 500.
	global $wpdb;
	$tabla = $wpdb->prefix . 'yoast_indexable';
	if ( $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $tabla ) ) === $tabla ) {
		$wpdb->delete(
			$tabla,
			array( 'object_id' => (int) $post_id, 'object_type' => 'post' ),
			array( '%d', '%s' )
		);
	}
}

/*
 * ─── CÓMO COMPROBAR QUE FUNCIONA ───────────────────────────────────────────
 * Abrir en el navegador, ya con sesión iniciada en wp-admin:
 *   https://www.creativeweb.com.ec/wp-json/wp/v2/posts/3346?context=edit
 * En el bloque «meta» deben aparecer ahora _yoast_wpseo_title y
 * _yoast_wpseo_metadesc. Si aparecen, ya podemos escribirlos por API.
 * ───────────────────────────────────────────────────────────────────────────
 */
