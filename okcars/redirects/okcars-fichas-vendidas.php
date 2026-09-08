<?php
/**
 * Plugin Name: OKCars — fichas de vehículos vendidos
 * Description: Redirige con 301 las fichas de vehículos que ya se vendieron hacia el
 *              artículo más relevante, o hacia el listado si no hay equivalente.
 *              Evita que Google y los visitantes caigan en un 404.
 * Version:     1.0
 * Author:      Creative Web
 *
 * ─────────────────────────────────────────────────────────────────────────────
 * POR QUÉ EXISTE ESTE ARCHIVO
 *
 * Cuando en OKCars se vende un vehículo, su ficha pasa a borrador. En WordPress
 * un borrador devuelve 404: la página desaparece para el visitante y para Google.
 *
 * Medido en Search Console (180 días, corte 2026-09-05):
 *
 *   changan-deepal-s05-ac-1-5l-4x2-hybrid   865 impresiones · 17 clics · pos 6,9
 *   chery-tiggo-4-t-a                        51 impresiones ·  1 clic  · pos 9,9
 *   grand-vitara-sz-next-sport-...           19 impresiones ·  0 clics · pos 6,6
 *   citroen-c5-aircross-ac-1-6-5p-4x2-ta     13 impresiones ·  0 clics · pos 7,2
 *   ford-escape-t-a                          13 impresiones ·  0 clics · pos 4,5
 *
 * El 87 % de las impresiones de fichas de vehículo iban a páginas con error.
 *
 * Esto es la solución de primera etapa. La definitiva es mantener la ficha
 * publicada marcada como «Vendido» —devuelve 200 y conserva el posicionamiento—,
 * pero eso requiere tocar la plantilla de la ficha. Ver NOTAS al final.
 * ─────────────────────────────────────────────────────────────────────────────
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Mapa de ficha vendida → destino.
 *
 * La clave es el slug de la ficha. El valor es la ruta de destino, relativa a la
 * raíz del sitio. Se apunta al artículo que responde la misma búsqueda que hacía
 * posicionar a la ficha; cuando no existe uno, se deja fuera del mapa y cae en el
 * destino por defecto.
 */
function cw_okcars_mapa_fichas_vendidas() {
	return array(
		// El de mayor tráfico. La gente busca «deepal s05 precio ecuador» y llegaba acá.
		'changan-deepal-s05-ac-1-5l-4x2-hybrid' => '/modelos-y-comparativas/deepal-s05-ecuador-precio/',

		// Chinos: al artículo de categoría, que cubre la intención.
		'chery-tiggo-4-t-a'                     => '/guias-de-compra/autos-chinos-usados-ecuador-guia/',

		// SUV vendidas: al artículo del modelo cuando existe, si no a la guía SUV/sedán.
		'ford-escape-t-a'                       => '/guias-de-compra/suv-o-sedan-usado-cual-conviene/',
		'grand-vitara-sz-next-sport-ac-2-4-5p-4x2-ta' => '/guias-de-compra/suv-o-sedan-usado-cual-conviene/',
		'citroen-c5-aircross-ac-1-6-5p-4x2-ta'  => '/guias-de-compra/suv-o-sedan-usado-cual-conviene/',
		'x-trail-advance-cvt-ac-2-5-5p-4x2-ta'  => '/guias-de-compra/suv-o-sedan-usado-cual-conviene/',
		'kia-sorento-3-5-t-a'                   => '/guias-de-compra/suv-o-sedan-usado-cual-conviene/',
		'chevrolet-captiva-ltz-turbo-5-pas-ac-1-5-5p' => '/modelos-y-comparativas/chevrolet-captiva-turbo-usada-ecuador/',

		// Camionetas diésel.
		'bt-50-ac-3-2-cd-4x4-tm-diesel'         => '/guias-de-compra/camionetas-diesel-usadas-ecuador/',
		'terralord-hd-ac-2-8-cd-4x4-tm-diesel'  => '/guias-de-compra/camionetas-diesel-usadas-ecuador/',

		// Electrificados.
		'aion-ut-ac-5p-4x2-ta-ev'               => '/modelos-y-comparativas/byd-tang-electrico-usado-ecuador/',
		'toyota-prius-c-2013'                   => '/modelos-y-comparativas/toyota-prius-c-usado-ecuador-kilometraje/',
	);
}

/** Destino cuando la ficha no está en el mapa. */
function cw_okcars_destino_por_defecto() {
	return '/vehiculos-okcars/';
}

/**
 * Intercepta los 404 bajo /vehiculos-okcars/ y redirige con 301.
 *
 * Se engancha en `template_redirect` porque en ese punto WordPress ya resolvió la
 * consulta y sabe que es un 404, pero todavía no envió nada al navegador.
 */
add_action( 'template_redirect', 'cw_okcars_redirigir_ficha_vendida' );
function cw_okcars_redirigir_ficha_vendida() {

	if ( ! is_404() || is_admin() ) {
		return;
	}

	$ruta = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( wp_unslash( $_SERVER['REQUEST_URI'] ), PHP_URL_PATH ) : '';
	$ruta = is_string( $ruta ) ? trim( $ruta, '/' ) : '';

	if ( '' === $ruta ) {
		return;
	}

	$partes = explode( '/', $ruta );

	// Solo actúa sobre /vehiculos-okcars/{slug}/ — nunca sobre el resto del sitio.
	if ( count( $partes ) < 2 || 'vehiculos-okcars' !== $partes[0] ) {
		return;
	}

	$slug  = sanitize_title( $partes[1] );
	$mapa  = cw_okcars_mapa_fichas_vendidas();
	$dest  = isset( $mapa[ $slug ] ) ? $mapa[ $slug ] : cw_okcars_destino_por_defecto();

	// Si el destino no existe, se cae al listado antes que generar otro 404.
	if ( ! url_to_postid( home_url( $dest ) ) && $dest !== cw_okcars_destino_por_defecto() ) {
		$dest = cw_okcars_destino_por_defecto();
	}

	wp_safe_redirect( home_url( $dest ), 301 );
	exit;
}

/*
 * ─────────────────────────────────────────────────────────────────────────────
 * NOTAS PARA LA SEGUNDA ETAPA
 *
 * Redirigir conserva parte del valor, pero no todo: Google termina tratando una
 * redirección masiva hacia contenido genérico como error suave y suelta la URL.
 * Lo que no pierde nada es mantener la ficha publicada, marcada como «Vendido».
 *
 * Para eso hacen falta tres cosas en el sitio:
 *
 *   1. Un campo o taxonomía «estado» en el CPT vehiculos-okcars, con el valor
 *      «vendido». Se agrega desde JetEngine.
 *
 *   2. Excluir del listado y de los filtros los vehículos con ese estado, para
 *      que no aparezcan como disponibles. Se configura en la consulta de
 *      JetSmartFilters / JetEngine Listing Grid.
 *
 *   3. En la plantilla de la ficha, mostrar condicionalmente:
 *        - un distintivo «Vendido» en lugar del precio,
 *        - los botones de contacto reemplazados por un aviso,
 *        - un bloque de «vehículos similares disponibles».
 *
 * Con eso la URL sigue devolviendo 200, conserva el posicionamiento y convierte
 * la visita en lugar de perderla. Cuando esa etapa esté lista, este archivo puede
 * quedarse solo para las fichas que ya se borraron por completo, como la del
 * Deepal S05.
 *
 * INSTALACIÓN
 *   Subir este archivo por cPanel → Administrador de archivos a:
 *     /public_html/wp-content/mu-plugins/okcars-fichas-vendidas.php
 *   Si la carpeta mu-plugins no existe, crearla. No hay que activar nada: los
 *   mu-plugins se cargan solos.
 *
 *   Ojo: ModSecurity del hosting bloquea la subida de .php por la API REST, así
 *   que este archivo va sí o sí por el Administrador de archivos.
 * ─────────────────────────────────────────────────────────────────────────────
 */
