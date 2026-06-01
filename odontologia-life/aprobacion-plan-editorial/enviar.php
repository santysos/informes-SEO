<?php
session_start();
if (empty($_SESSION['auth_olife_plan'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// ============================================================
// Procesar respuestas
// ============================================================
$titulos_posts = [
    1 => 'Implantes dentales en Otavalo: tipos, marcas y opciones de financiamiento',
    2 => 'Brackets en Otavalo: opciones reales de ortodoncia',
    3 => 'Limpieza dental en Otavalo: qué incluye y frecuencia',
    4 => 'Extracción de muelas en Otavalo: cuándo se necesita',
    5 => 'Endodoncia en Otavalo: cuántas citas se necesitan',
    6 => 'Dentista de urgencia en Otavalo',
    7 => 'Ortodoncista en Otavalo: cómo elegir',
    8 => 'Odontopediatra en Ibarra y Otavalo',
    9 => 'Implantes dentales en Cotacachi',
    10 => 'Limpieza dental en Atuntaqui',
    11 => 'Carillas de porcelana en Ecuador',
    12 => 'Ortodoncia invisible (alineadores) en Ecuador',
    13 => 'Prótesis fija vs prótesis removible',
    14 => 'Resina dental vs porcelana',
    15 => 'Brackets estéticos vs metálicos',
    16 => 'Dolor de muela del juicio',
    17 => 'Diente roto o fracturado: qué hacer',
    18 => 'Sangrado de encías al cepillarse',
    19 => 'Primera visita al dentista del bebé',
    20 => 'Brackets para adultos en Ecuador',
    21 => 'Cuidado dental en el embarazo',
    22 => 'Implante dental vs puente fijo',
    23 => 'Coronas dentales en Ecuador',
    24 => 'Mal aliento crónico (halitosis)',
    25 => 'Empastes dentales: cuándo se cambian',
    26 => 'Bruxismo: por qué aprietas los dientes',
    27 => 'Sensibilidad dental',
    28 => 'Manchas en los dientes',
    29 => 'Empaste vs endodoncia',
    30 => 'Dentadura postiza',
];

$aprobados = [];
$rechazados = [];

for ($i = 1; $i <= 30; $i++) {
    $val = $_POST["post_$i"] ?? 'si';
    if ($val === 'si') {
        $aprobados[$i] = $titulos_posts[$i];
    } else {
        $rechazados[$i] = $titulos_posts[$i];
    }
}

$comentarios = trim($_POST['comentarios'] ?? '');
$dr_nombre = trim($_POST['dr_nombre'] ?? 'Sin especificar');
$dr_email = trim($_POST['dr_email'] ?? '');

// Validar email
if (!filter_var($dr_email, FILTER_VALIDATE_EMAIL)) {
    $dr_email_valido = false;
    $dr_email = 'INVÁLIDO: ' . htmlspecialchars($dr_email);
} else {
    $dr_email_valido = true;
}

// ============================================================
// Construir email
// ============================================================
$asunto = "✅ Aprobación plan editorial — Odontología Life (" . count($aprobados) . "/30)";

$body_html = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body style="font-family: Arial, sans-serif; max-width: 700px; margin: 0 auto; color: #1e293b;">';
$body_html .= '<div style="background: linear-gradient(135deg, #042f2e 0%, #115e59 100%); color: white; padding: 30px; border-radius: 12px 12px 0 0;">';
$body_html .= '<h1 style="margin: 0 0 8px 0; font-size: 24px;">Aprobación plan editorial</h1>';
$body_html .= '<p style="margin: 0; color: #99f6e4;">Odontología Life — Recibida el ' . date('d/m/Y H:i') . '</p>';
$body_html .= '</div>';
$body_html .= '<div style="background: white; padding: 30px; border: 1px solid #e2e8f0; border-top: none;">';
$body_html .= '<h2 style="color: #0f766e; margin: 0 0 8px 0;">Doctor que aprobó</h2>';
$body_html .= '<p style="margin: 0 0 4px 0;"><strong>Nombre:</strong> ' . htmlspecialchars($dr_nombre) . '</p>';
$body_html .= '<p style="margin: 0 0 24px 0;"><strong>Email:</strong> ' . htmlspecialchars($dr_email) . '</p>';

$body_html .= '<div style="background: #f0fdfa; border: 1px solid #99f6e4; border-radius: 8px; padding: 16px; margin-bottom: 24px;">';
$body_html .= '<p style="margin: 0; font-size: 14px;">';
$body_html .= '<strong style="color: #0f766e;">Resumen:</strong> ';
$body_html .= '<span style="color: #059669; font-weight: bold;">' . count($aprobados) . ' aprobados</span>';
$body_html .= ' · ';
$body_html .= '<span style="color: #dc2626; font-weight: bold;">' . count($rechazados) . ' rechazados</span>';
$body_html .= '</p>';
$body_html .= '</div>';

$body_html .= '<h3 style="color: #059669;">✓ Posts APROBADOS para producción (' . count($aprobados) . ')</h3>';
if (count($aprobados) > 0) {
    $body_html .= '<ul style="padding-left: 20px;">';
    foreach ($aprobados as $num => $titulo) {
        $body_html .= '<li style="margin-bottom: 6px;"><strong>#' . $num . '</strong> ' . htmlspecialchars($titulo) . '</li>';
    }
    $body_html .= '</ul>';
} else {
    $body_html .= '<p style="color: #64748b; font-style: italic;">Ninguno aprobado.</p>';
}

if (count($rechazados) > 0) {
    $body_html .= '<h3 style="color: #dc2626; margin-top: 24px;">✗ Posts RECHAZADOS (' . count($rechazados) . ')</h3>';
    $body_html .= '<ul style="padding-left: 20px;">';
    foreach ($rechazados as $num => $titulo) {
        $body_html .= '<li style="margin-bottom: 6px; color: #64748b;"><strong>#' . $num . '</strong> ' . htmlspecialchars($titulo) . '</li>';
    }
    $body_html .= '</ul>';
}

if ($comentarios) {
    $body_html .= '<h3 style="color: #0f766e; margin-top: 24px;">📝 Comentarios y sugerencias del Dr.</h3>';
    $body_html .= '<div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 16px; border-radius: 4px;">';
    $body_html .= nl2br(htmlspecialchars($comentarios));
    $body_html .= '</div>';
}

$body_html .= '<hr style="border: none; border-top: 1px solid #e2e8f0; margin: 30px 0;">';
$body_html .= '<p style="color: #64748b; font-size: 12px;">Aprobación recibida desde el portal de Odontología Life.<br>';
$body_html .= 'Creative Web · SEO & Contenido</p>';
$body_html .= '</div></body></html>';

// ============================================================
// Enviar email
// ============================================================
$from = 'noreply@creativeweb.com.ec';
$destinatario_principal = 'santysos1@gmail.com';
$destinatarios = [$destinatario_principal];
if ($dr_email_valido) {
    $destinatarios[] = $dr_email;
}

$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: Odontología Life Portal <' . $from . '>',
    'Reply-To: ' . ($dr_email_valido ? $dr_email : $from),
    'X-Mailer: PHP/' . phpversion(),
];

$envio_ok = false;
$errores_envio = [];
foreach ($destinatarios as $dest) {
    $result = @mail($dest, $asunto, $body_html, implode("\r\n", $headers));
    if ($result) {
        $envio_ok = true;
    } else {
        $errores_envio[] = $dest;
    }
}

// Guardar copia en archivo log (siempre, por si falla el email)
$log_dir = __DIR__ . '/aprobaciones-recibidas';
if (!is_dir($log_dir)) {
    @mkdir($log_dir, 0755, true);
}
$log_file = $log_dir . '/' . date('Y-m-d_His') . '_' . preg_replace('/[^a-z0-9]+/i', '-', strtolower($dr_nombre)) . '.html';
@file_put_contents($log_file, $body_html);

// ============================================================
// Redirigir a gracias
// ============================================================
$_SESSION['ultimo_envio'] = [
    'aprobados' => count($aprobados),
    'rechazados' => count($rechazados),
    'envio_ok' => $envio_ok,
    'dr_nombre' => $dr_nombre,
];

header('Location: gracias.php');
exit;
