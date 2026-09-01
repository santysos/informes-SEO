/**
 * reCAPTCHA v3 de Elementor en el registro nativo de WooCommerce
 * ---------------------------------------------------------------
 * El captcha de Elementor solo cubre los formularios que él mismo construye.
 * El registro de /mi-cuenta/ es el formulario nativo de WooCommerce y quedaba
 * sin proteger: por ahí entraron ~1.800 cuentas falsas entre dic-2024 y dic-2025.
 *
 * Este snippet reutiliza las MISMAS claves que ya tienes configuradas en
 * Elementor Pro. No hace falta instalar nada ni volver a pegar claves.
 *
 * Si las claves no están, el snippet no hace nada y el registro sigue
 * funcionando: nunca deja el formulario roto.
 */

// ── 1. Claves guardadas por Elementor Pro ────────────────────────────
function cw_recaptcha_v3_claves() {
	static $k = null;
	if ( $k !== null ) {
		return $k;
	}
	$k = array(
		'site'   => trim( (string) get_option( 'elementor_pro_recaptcha_v3_site_key', '' ) ),
		'secret' => trim( (string) get_option( 'elementor_pro_recaptcha_v3_secret_key', '' ) ),
	);
	return $k;
}

function cw_recaptcha_v3_activo() {
	$k = cw_recaptcha_v3_claves();
	return ( $k['site'] !== '' && $k['secret'] !== '' );
}

// ── 2. Widget y token en el formulario de registro ───────────────────
add_action( 'woocommerce_register_form', 'cw_recaptcha_v3_campo' );
function cw_recaptcha_v3_campo() {
	if ( ! cw_recaptcha_v3_activo() ) {
		return;
	}
	$k = cw_recaptcha_v3_claves();
	?>
	<input type="hidden" name="cw_recaptcha_token" id="cw_recaptcha_token" value="">
	<script src="https://www.google.com/recaptcha/api.js?render=<?php echo esc_attr( $k['site'] ); ?>"></script>
	<script>
	(function () {
		var sitio = <?php echo wp_json_encode( $k['site'] ); ?>;
		var form  = document.querySelector( 'form.woocommerce-form-register' );
		if ( ! form ) { return; }
		var enviando = false;
		form.addEventListener( 'submit', function ( e ) {
			// La segunda vuelta (ya con token) se deja pasar tal cual.
			if ( enviando ) { return; }
			e.preventDefault();
			if ( typeof grecaptcha === 'undefined' ) { form.submit(); return; }
			grecaptcha.ready( function () {
				grecaptcha.execute( sitio, { action: 'woocommerce_register' } )
					.then( function ( token ) {
						document.getElementById( 'cw_recaptcha_token' ).value = token;
						enviando = true;
						form.submit();
					} )
					.catch( function () {
						// Si Google falla, no dejamos al cliente encerrado.
						enviando = true;
						form.submit();
					} );
			} );
		} );
	})();
	</script>
	<?php
}

// ── 3. Validación en el servidor ─────────────────────────────────────
add_filter( 'woocommerce_registration_errors', 'cw_recaptcha_v3_validar', 10, 3 );
function cw_recaptcha_v3_validar( $errores, $usuario, $email ) {
	if ( ! cw_recaptcha_v3_activo() ) {
		return $errores;
	}
	$k     = cw_recaptcha_v3_claves();
	$token = isset( $_POST['cw_recaptcha_token'] ) ? sanitize_text_field( wp_unslash( $_POST['cw_recaptcha_token'] ) ) : '';

	if ( $token === '' ) {
		$errores->add( 'cw_recaptcha', __( 'No pudimos verificar que seas una persona. Recarga la página e inténtalo de nuevo.', 'woocommerce' ) );
		return $errores;
	}

	$r = wp_remote_post(
		'https://www.google.com/recaptcha/api/siteverify',
		array(
			'timeout' => 10,
			'body'    => array(
				'secret'   => $k['secret'],
				'response' => $token,
				'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
			),
		)
	);

	// Si Google no responde, se deja pasar: preferimos un registro de más
	// antes que bloquear a un cliente real por una caída ajena.
	if ( is_wp_error( $r ) ) {
		return $errores;
	}

	$d = json_decode( wp_remote_retrieve_body( $r ), true );
	if ( ! is_array( $d ) ) {
		return $errores;
	}

	$ok    = ! empty( $d['success'] );
	$score = isset( $d['score'] ) ? (float) $d['score'] : 0.0;

	// 0.5 es el umbral que recomienda Google. Por debajo, casi siempre es un bot.
	if ( ! $ok || $score < 0.5 ) {
		$errores->add( 'cw_recaptcha', __( 'Tu registro no pudo completarse. Si crees que es un error, escríbenos y lo hacemos por ti.', 'woocommerce' ) );
	}

	return $errores;
}
