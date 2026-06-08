<?php
session_start();
if (empty($_SESSION['auth_bionext_plan'])) {
    header('Location: login.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$titulos_posts = [
    1 => 'BIONEXT CALCIO 21: cuándo y cómo aplicarlo',
    2 => 'BIONEXT POWER: bioestimulante para sequía y estrés',
    3 => 'BIONEXT SILICIO: cómo fortalece paredes celulares',
    4 => 'Línea completa Bionext: qué producto usar según necesidad',
    5 => 'Cómo combinar productos Bionext en un plan de nutrición',
    6 => 'Bioestimulantes para rosas en Cayambe',
    7 => 'Bioestimulantes para papa en la sierra ecuatoriana',
    8 => 'Bioestimulantes para banano en costa ecuatoriana',
    9 => 'Nutrición foliar para hortalizas',
    10 => 'Bioestimulantes para café especial en Ecuador',
    11 => 'Nutrición para aguacate hass en Imbabura',
    12 => 'Deficiencia de calcio en rosas: síntomas y solución',
    13 => 'Suelos ácidos en Ecuador: cómo corregirlos',
    14 => 'Estrés hídrico: proteger cultivo en sequía',
    15 => 'Botrytis y oidio en rosas: nutrición preventiva',
    16 => 'Caída prematura de fruta en mandarina y naranja',
    17 => 'Pudrición apical en tomate: el rol del calcio',
    18 => '¿Qué es un bioestimulante? Diferencia con fertilizante',
    19 => 'Quelatos vs sulfatos: cuál se absorbe mejor',
    20 => 'pH del suelo: cómo medirlo y por qué importa',
    21 => 'Nutrición foliar vs nutrición edáfica',
    22 => 'Análisis foliar: cómo interpretar el resultado',
    23 => 'Bioestimulante vs hormona vegetal',
    24 => 'Bioestimulantes orgánicos vs sintéticos',
    25 => 'Aplicación foliar vs drench',
    26 => 'Asesor agronómico vs consejo de vecino',
    27 => 'Calendario de aplicaciones para rosas (12 meses)',
    28 => 'Calendario de fertilización para papa',
    29 => 'Plan de nutrición personalizado por cultivo',
    30 => 'Errores comunes al aplicar bioestimulantes',
];

$aprobados = [];
$rechazados = [];
for ($i = 1; $i <= 30; $i++) {
    $val = $_POST["post_$i"] ?? 'si';
    if ($val === 'si') $aprobados[$i] = $titulos_posts[$i];
    else $rechazados[$i] = $titulos_posts[$i];
}

$comentarios = trim($_POST['comentarios'] ?? '');
$nombre = trim($_POST['nombre'] ?? 'Sin especificar');
$email = trim($_POST['email'] ?? '');
$email_valido = filter_var($email, FILTER_VALIDATE_EMAIL);

$asunto = "✅ Aprobación plan editorial — Bionext (" . count($aprobados) . "/30)";

$body_html = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body style="font-family: Arial, sans-serif; max-width: 700px; margin: 0 auto; color: #1e293b;">';
$body_html .= '<div style="background: linear-gradient(135deg, #0c4a6e 0%, #064e3b 100%); color: white; padding: 30px; border-radius: 12px 12px 0 0;">';
$body_html .= '<h1 style="margin: 0 0 8px 0; font-size: 24px;">Aprobación plan editorial</h1>';
$body_html .= '<p style="margin: 0; color: #bae6fd;">Bionext — Recibida el ' . date('d/m/Y H:i') . '</p>';
$body_html .= '</div>';
$body_html .= '<div style="background: white; padding: 30px; border: 1px solid #e2e8f0; border-top: none;">';
$body_html .= '<h2 style="color: #0c4a6e; margin: 0 0 8px 0;">Quien aprobó</h2>';
$body_html .= '<p style="margin: 0 0 4px 0;"><strong>Nombre:</strong> ' . htmlspecialchars($nombre) . '</p>';
$body_html .= '<p style="margin: 0 0 24px 0;"><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>';

$body_html .= '<div style="background: #f0fdf4; border: 1px solid #86efac; border-radius: 8px; padding: 16px; margin-bottom: 24px;">';
$body_html .= '<p style="margin: 0; font-size: 14px;">';
$body_html .= '<strong style="color: #14532d;">Resumen:</strong> ';
$body_html .= '<span style="color: #16a34a; font-weight: bold;">' . count($aprobados) . ' aprobados</span> · ';
$body_html .= '<span style="color: #dc2626; font-weight: bold;">' . count($rechazados) . ' rechazados</span>';
$body_html .= '</p></div>';

$body_html .= '<h3 style="color: #16a34a;">✓ Posts APROBADOS para producción (' . count($aprobados) . ')</h3>';
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
    $body_html .= '<h3 style="color: #0c4a6e; margin-top: 24px;">📝 Comentarios y sugerencias</h3>';
    $body_html .= '<div style="background: #fef3c7; border-left: 4px solid #f59e0b; padding: 16px; border-radius: 4px;">';
    $body_html .= nl2br(htmlspecialchars($comentarios));
    $body_html .= '</div>';
}

$body_html .= '<hr style="border: none; border-top: 1px solid #e2e8f0; margin: 30px 0;">';
$body_html .= '<p style="color: #64748b; font-size: 12px;">Aprobación recibida desde el portal de Bionext.<br>Creative Web · SEO & Contenido</p>';
$body_html .= '</div></body></html>';

$from = 'noreply@creativeweb.com.ec';
$destinatarios = ['santysos1@gmail.com'];
if ($email_valido) $destinatarios[] = $email;

$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: Bionext Portal <' . $from . '>',
    'Reply-To: ' . ($email_valido ? $email : $from),
    'X-Mailer: PHP/' . phpversion(),
];

$envio_ok = false;
foreach ($destinatarios as $dest) {
    if (@mail($dest, $asunto, $body_html, implode("\r\n", $headers))) {
        $envio_ok = true;
    }
}

$log_dir = __DIR__ . '/aprobaciones-recibidas';
if (!is_dir($log_dir)) @mkdir($log_dir, 0755, true);
$log_file = $log_dir . '/' . date('Y-m-d_His') . '_' . preg_replace('/[^a-z0-9]+/i', '-', strtolower($nombre)) . '.html';
@file_put_contents($log_file, $body_html);

$_SESSION['ultimo_envio'] = [
    'aprobados' => count($aprobados),
    'rechazados' => count($rechazados),
    'envio_ok' => $envio_ok,
    'nombre' => $nombre,
];

header('Location: gracias.php');
exit;
