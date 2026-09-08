<?php
/**
 * SEO para la tienda de Creative Web (WHMCS)
 * ------------------------------------------
 * Sube a: /public_html/ventas/includes/hooks/seo_tienda.php
 * No hay que activar nada: WHMCS carga solo lo que encuentra en esa carpeta.
 *
 * ─── POR QUÉ EXISTE ────────────────────────────────────────────────────────
 * Hoy todas las páginas de la tienda —catálogo, grupo de productos y ficha de
 * plan— comparten el mismo título: «Carrito - Creative Web». Ninguna tiene meta
 * descripción, ni canonical, ni H1 propio.
 *
 * Consecuencia medida en Search Console (16 meses, corte 2026-09-05):
 *   · Las páginas de producto: 0 apariciones.
 *   · /login?language=german, ?language=italian, ?language=dutch, ?language=arabic,
 *     ?language=farsi y compañía: 3.196 apariciones y 20 clics.
 *   · Posición media de la tienda: 11,8 en nov-2025 → 76,6 en mar-2026 → 74 hoy.
 *
 * Google no encontró nada mejor que indexar, así que indexó los inicios de sesión.
 *
 * Este archivo le da a cada página del catálogo un título, una descripción y un
 * canonical propios, y marca como noindex lo que no debe aparecer en búsqueda.
 * Se complementa con el robots.txt que va en la raíz del subdominio.
 * ───────────────────────────────────────────────────────────────────────────
 */

if (!defined('WHMCS')) {
    die('Acceso denegado.');
}

/**
 * Títulos y descripciones por página del catálogo.
 *
 * La clave es la ruta que WHMCS entrega en «templatefile» + el grupo de producto.
 * Ajustar los textos cuando cambien los planes; las cifras deben coincidir con lo
 * que efectivamente cobra la tienda.
 */
function cw_seo_tienda_mapa()
{
    return array(
        // ── catálogo general ─────────────────────────────────────────────
        'store' => array(
            'titulo' => 'Hosting y dominios en Ecuador — Creative Web',
            'desc'   => 'Planes de hosting con correos corporativos, certificado SSL y '
                      . 'cPanel en español, desde $59,99 al año. Soporte directo por WhatsApp desde Otavalo.',
        ),
        // ── grupo de hosting ─────────────────────────────────────────────
        'hosting-web' => array(
            'titulo' => 'Planes de hosting web en Ecuador desde $59,99 al año',
            'desc'   => 'Cuatro planes de alojamiento con correos corporativos, SSL incluido y '
                      . 'cPanel en español. Contrátalo en línea y tu cuenta queda activa el mismo día del pago.',
        ),
        // ── fichas de plan ───────────────────────────────────────────────
        'inicial' => array(
            'titulo' => 'Plan Inicial de hosting: 10 correos y 3 GB — $59,99/año',
            'desc'   => 'Alojamiento para un sitio con 10 cuentas de correo corporativo, 3 GB en '
                      . 'disco SSD y certificado SSL incluido. Ideal para tu primer sitio. $59,99 al año.',
        ),
        'webmaster' => array(
            'titulo' => 'Plan Webmaster de hosting: 20 correos y 10 GB — $83,88/año',
            'desc'   => 'Dominios y bases de datos ilimitados, 20 correos corporativos y 10 GB en '
                      . 'disco SSD. Pensado para quien administra varios sitios a la vez. $83,88 al año.',
        ),
        'pymes' => array(
            'titulo' => 'Plan Pymes: correos corporativos ilimitados — $95,88/año',
            'desc'   => 'Cuentas de correo corporativo sin tope, 20 GB en disco SSD y 200 GB de '
                      . 'transferencia mensual. Es el plan que eligen la mayoría de empresas. $95,88 al año.',
        ),
        'pro' => array(
            'titulo' => 'Plan Pro de hosting: recursos ilimitados — $239,88/año',
            'desc'   => 'Espacio y transferencia sin límite, correos ilimitados y soporte '
                      . 'prioritario. Para sitios con mucho tráfico o muchos proyectos a la vez. $239,88 al año.',
        ),
    );
}

/** Páginas que nunca deben aparecer en búsqueda. */
function cw_seo_tienda_privadas()
{
    return array(
        'login', 'logout', 'register', 'clientarea', 'password', 'pwreset',
        'supporttickets', 'viewticket', 'submitticket', 'affiliates',
        'serverstatus', 'invoices', 'quotes', 'domains', 'services',
        'announcements', 'knowledgebase', 'download', 'contact',
    );
}

/**
 * Detecta a qué página del catálogo corresponde la petición actual.
 * Se apoya en la URL porque es lo único estable entre versiones de WHMCS.
 */
function cw_seo_tienda_clave()
{
    $ruta = isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '';
    $ruta = trim((string) $ruta, '/');

    if ($ruta === '') {
        return null;
    }

    $partes = explode('/', $ruta);

    if ($partes[0] !== 'store') {
        return null;
    }

    // /store/{grupo}/{producto}  →  se prefiere lo más específico
    if (isset($partes[2]) && $partes[2] !== '') {
        return strtolower($partes[2]);
    }
    if (isset($partes[1]) && $partes[1] !== '') {
        return strtolower($partes[1]);
    }

    return 'store';
}

/** ¿Es una página privada, que no debe indexarse? */
function cw_seo_tienda_es_privada()
{
    $ruta = isset($_SERVER['REQUEST_URI']) ? strtolower((string) $_SERVER['REQUEST_URI']) : '';

    // Cualquier variante de idioma es contenido duplicado.
    if (strpos($ruta, 'language=') !== false) {
        return true;
    }

    foreach (cw_seo_tienda_privadas() as $p) {
        if (strpos($ruta, $p) !== false) {
            return true;
        }
    }

    return false;
}

/**
 * Cambia el título de la página.
 * ClientAreaPage permite reescribir las variables que usa la plantilla.
 */
add_hook('ClientAreaPage', 1, function ($vars) {
    $clave = cw_seo_tienda_clave();
    if ($clave === null) {
        return array();
    }

    $mapa = cw_seo_tienda_mapa();
    if (!isset($mapa[$clave])) {
        return array();
    }

    return array(
        'pagetitle'    => $mapa[$clave]['titulo'],
        'displayTitle' => $mapa[$clave]['titulo'],
    );
});

/**
 * Inyecta descripción, canonical y robots en la cabecera.
 */
add_hook('ClientAreaHeadOutput', 1, function ($vars) {
    $salida = '';

    if (cw_seo_tienda_es_privada()) {
        return '<meta name="robots" content="noindex,follow">' . "\n";
    }

    $clave = cw_seo_tienda_clave();
    if ($clave === null) {
        return '';
    }

    $mapa = cw_seo_tienda_mapa();
    if (!isset($mapa[$clave])) {
        return '';
    }

    $desc = htmlspecialchars($mapa[$clave]['desc'], ENT_QUOTES, 'UTF-8');
    $salida .= '<meta name="description" content="' . $desc . '">' . "\n";

    // Canonical sin parámetros: evita que ?language= y ?currency= dupliquen la página.
    $ruta = isset($_SERVER['REQUEST_URI']) ? parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) : '/';
    $canonical = 'https://ventas.creativeweb.com.ec' . $ruta;
    $salida .= '<link rel="canonical" href="' . htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8') . '">' . "\n";

    $salida .= '<meta name="robots" content="index,follow">' . "\n";

    return $salida;
});

/*
 * ─── DESPUÉS DE SUBIRLO ────────────────────────────────────────────────────
 * 1. Abrir https://ventas.creativeweb.com.ec/store/hosting-web y ver el código
 *    fuente: el <title> ya no debe decir «Carrito».
 * 2. Comprobar que /login sigue funcionando con normalidad y que ahora lleva
 *    <meta name="robots" content="noindex,follow">.
 * 3. En Search Console, pedir la indexación de /store y /store/hosting-web.
 *
 * Si el título siguiera diciendo «Carrito», es que la plantilla del formulario de
 * pedido no usa la variable «pagetitle». En ese caso hay que tocar la plantilla
 * del orderform; avisar y lo resolvemos.
 * ───────────────────────────────────────────────────────────────────────────
 */
