<?php
/**
 * Cuestionario Estratégico · Dikapsa
 * Preparado por Creative Web — creativeweb.com.ec
 *
 * Estructura:
 *  - GET  → muestra el formulario
 *  - POST → valida, guarda JSON en responses/, envía email, muestra thanks
 */

// ============== CONFIG ==============
$CLIENTE         = "Dikapsa";
$CLIENTE_URL     = "https://www.dikapsa.com";
$EMAIL_DESTINO   = "info@creativeweb.com.ec";
$EMAIL_FROM      = "noreply@creativeweb.com.ec";
$EMAIL_FROM_NOM  = "Cuestionario Creative Web";
$CW_URL          = "https://creativeweb.com.ec";
$RESPONSES_DIR   = __DIR__ . '/responses';
$ANIO            = date('Y');

// ============== HANDLER POST ==============
$submitted = false;
$error     = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // honeypot anti-spam
    if (!empty($_POST['website'] ?? '')) {
        http_response_code(400);
        exit('Spam detected');
    }

    // requeridos mínimos
    $nombre  = trim($_POST['respondente_nombre']  ?? '');
    $cargo   = trim($_POST['respondente_cargo']   ?? '');
    $correo  = trim($_POST['respondente_correo']  ?? '');

    if ($nombre === '' || $cargo === '' || $correo === '') {
        $error = 'Por favor completa nombre, cargo y correo electrónico.';
    } else {
        // Limpiar y armar payload
        $payload = [
            'meta' => [
                'cliente'    => $CLIENTE,
                'enviado_en' => date('Y-m-d H:i:s'),
                'ip'         => $_SERVER['REMOTE_ADDR']     ?? '',
                'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? '',
            ],
            'respondente' => [
                'nombre'   => $nombre,
                'cargo'    => $cargo,
                'correo'   => $correo,
                'telefono' => trim($_POST['respondente_telefono'] ?? ''),
            ],
            'respuestas' => array_diff_key($_POST, array_flip([
                'respondente_nombre','respondente_cargo','respondente_correo','respondente_telefono','website'
            ])),
        ];

        // Guardar JSON
        $timestamp = date('Y-m-d_H-i-s');
        $uniq      = substr(md5(uniqid('', true)), 0, 6);
        $filename  = $RESPONSES_DIR . "/{$timestamp}_{$uniq}.json";
        @file_put_contents($filename, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        // Armar HTML email
        $emailHtml = build_email_html($payload, $CLIENTE);
        $subject   = "[Cuestionario {$CLIENTE}] {$nombre} — {$cargo}";

        $headers   = [];
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Content-Type: text/html; charset=UTF-8";
        $headers[] = "From: {$EMAIL_FROM_NOM} <{$EMAIL_FROM}>";
        $headers[] = "Reply-To: {$nombre} <{$correo}>";

        @mail($EMAIL_DESTINO, $subject, $emailHtml, implode("\r\n", $headers));

        $submitted = true;
    }
}

// ============== HELPERS ==============
function build_email_html($payload, $cliente) {
    $r       = $payload['respondente'];
    $resp    = $payload['respuestas'];
    $fecha   = $payload['meta']['enviado_en'];

    ob_start();
    ?>
    <!doctype html>
    <html><body style="font-family:Arial,sans-serif;background:#f6f4ee;padding:20px;">
      <div style="max-width:680px;margin:0 auto;background:#fff;border-radius:12px;overflow:hidden;border:1px solid #e1ddd3;">
        <div style="background:linear-gradient(135deg,#0A0E27,#1B2347);color:#fff;padding:24px 28px;">
          <p style="margin:0;font-size:12px;letter-spacing:0.2em;color:#C9A96E;text-transform:uppercase;font-weight:600;">Creative Web · Cuestionario estratégico</p>
          <h1 style="margin:8px 0 4px;font-size:24px;font-weight:700;">Nueva respuesta — <?= htmlspecialchars($cliente) ?></h1>
          <p style="margin:0;font-size:13px;color:rgba(255,255,255,0.7);"><?= htmlspecialchars($fecha) ?></p>
        </div>

        <div style="padding:24px 28px;border-bottom:1px solid #e1ddd3;">
          <h2 style="font-size:15px;color:#0A0E27;margin:0 0 10px;text-transform:uppercase;letter-spacing:0.08em;">Datos de quien respondió</h2>
          <table style="width:100%;font-size:14px;color:#2D2F3B;border-collapse:collapse;">
            <tr><td style="padding:4px 0;width:130px;color:#5C5A55;">Nombre:</td><td style="padding:4px 0;"><strong><?= htmlspecialchars($r['nombre']) ?></strong></td></tr>
            <tr><td style="padding:4px 0;color:#5C5A55;">Cargo:</td><td style="padding:4px 0;"><?= htmlspecialchars($r['cargo']) ?></td></tr>
            <tr><td style="padding:4px 0;color:#5C5A55;">Correo:</td><td style="padding:4px 0;"><a href="mailto:<?= htmlspecialchars($r['correo']) ?>" style="color:#1E40AF;"><?= htmlspecialchars($r['correo']) ?></a></td></tr>
            <?php if (!empty($r['telefono'])): ?>
            <tr><td style="padding:4px 0;color:#5C5A55;">Teléfono:</td><td style="padding:4px 0;"><?= htmlspecialchars($r['telefono']) ?></td></tr>
            <?php endif; ?>
          </table>
        </div>

        <div style="padding:24px 28px;">
          <h2 style="font-size:15px;color:#0A0E27;margin:0 0 16px;text-transform:uppercase;letter-spacing:0.08em;">Respuestas</h2>
          <?php foreach ($resp as $key => $value):
              if ($value === '' || $value === null || (is_array($value) && empty($value))) continue;
              $label = ucfirst(str_replace('_', ' ', $key));
              ?>
              <div style="margin-bottom:18px;padding-bottom:14px;border-bottom:1px solid #f1ecde;">
                <p style="font-size:11px;text-transform:uppercase;letter-spacing:0.1em;color:#8B7239;font-weight:600;margin:0 0 6px;"><?= htmlspecialchars($label) ?></p>
                <?php if (is_array($value)): ?>
                  <ul style="margin:0;padding-left:20px;color:#0A0E27;font-size:14px;line-height:1.6;">
                    <?php foreach ($value as $item): ?>
                      <li><?= nl2br(htmlspecialchars($item)) ?></li>
                    <?php endforeach; ?>
                  </ul>
                <?php else: ?>
                  <div style="color:#0A0E27;font-size:14px;line-height:1.6;white-space:pre-wrap;"><?= nl2br(htmlspecialchars($value)) ?></div>
                <?php endif; ?>
              </div>
          <?php endforeach; ?>
        </div>

        <div style="background:#0A0E27;color:rgba(255,255,255,0.65);padding:18px 28px;font-size:12px;text-align:center;">
          Creative Web · creativeweb.com.ec<br>
          IP: <?= htmlspecialchars($payload['meta']['ip']) ?>
        </div>
      </div>
    </body></html>
    <?php
    return ob_get_clean();
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>Cuestionario estratégico · Creative Web</title>
<meta name="description" content="Cuestionario breve para entender mejor tu negocio y armar una estrategia de SEO realmente accionable.">
<meta name="author" content="Creative Web">
<meta name="robots" content="noindex, nofollow">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>
  :root {
    --navy: #0A0E27;
    --navy-deep: #050817;
    --navy-soft: #1B2347;
    --gold: #C9A96E;
    --gold-soft: #E6C988;
    --gold-deep: #8B7239;
    --ivory: #F8F6F2;
    --muted: #EFEBE3;
    --ink: #0A0E27;
    --ink-soft: #2D2F3B;
    --mut: #5C5A55;
    --border: #E1DDD3;
    --success: #10A37F;
    --error: #DC2626;
  }
  * { box-sizing: border-box; }
  html, body { margin: 0; padding: 0; }
  body {
    font-family: 'Outfit', system-ui, -apple-system, sans-serif;
    color: var(--ink);
    background: var(--ivory);
    line-height: 1.55;
    -webkit-font-smoothing: antialiased;
  }

  /* HERO */
  .hero {
    background: linear-gradient(135deg, var(--navy-deep) 0%, var(--navy) 100%);
    color: #FFF;
    padding: 56px 24px 72px;
    position: relative; overflow: hidden;
  }
  .hero::before, .hero::after {
    content: ""; position: absolute; border-radius: 50%; filter: blur(80px); pointer-events: none;
  }
  .hero::before { width: 360px; height: 360px; top: -120px; left: -100px; background: rgba(201,169,110,0.35); }
  .hero::after  { width: 360px; height: 360px; bottom: -120px; right: -100px; background: rgba(155,44,44,0.25); }
  .hero-inner { max-width: 760px; margin: 0 auto; position: relative; }
  .hero .eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 6px 14px; border-radius: 999px;
    background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.18);
    font-size: 11px; letter-spacing: 0.2em; text-transform: uppercase; font-weight: 500;
    margin-bottom: 20px;
  }
  .hero .dot { width: 6px; height: 6px; background: var(--gold); border-radius: 50%; }
  .hero h1 {
    font-size: clamp(28px, 5vw, 44px); line-height: 1.05; margin: 0 0 14px; font-weight: 700;
    letter-spacing: -0.025em;
  }
  .hero h1 .accent {
    background: linear-gradient(90deg, var(--gold), var(--gold-soft), var(--gold));
    -webkit-background-clip: text; background-clip: text; color: transparent;
  }
  .hero .lede { font-size: 16px; color: rgba(255,255,255,0.82); max-width: 580px; font-weight: 300; line-height: 1.6; margin: 0 0 22px; }
  .hero .meta-bar {
    display: flex; flex-wrap: wrap; gap: 18px;
    font-size: 12px; color: rgba(255,255,255,0.6);
  }
  .hero .meta-bar strong { color: var(--gold); font-weight: 600; }

  /* PROGRESO STICKY */
  .progress {
    position: sticky; top: 0; z-index: 50;
    background: rgba(248,246,242,0.92);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border-bottom: 1px solid var(--border);
    padding: 12px 16px;
    text-align: center;
    font-size: 13px;
    color: var(--mut);
  }
  .progress .save-status { font-weight: 500; color: var(--success); }

  /* FORM */
  form { max-width: 760px; margin: 0 auto; padding: 32px 24px 80px; }

  .block {
    background: linear-gradient(160deg, rgba(255,255,255,0.96) 0%, rgba(255,255,255,0.75) 100%);
    backdrop-filter: blur(14px);
    border: 1px solid rgba(255,255,255,0.85);
    border-radius: 20px;
    padding: 28px 26px;
    margin-bottom: 28px;
    box-shadow: 0 8px 28px -12px rgba(10,14,39,0.1);
  }
  .block-header {
    display: flex; align-items: center; gap: 14px;
    margin-bottom: 20px;
  }
  .block-num {
    width: 36px; height: 36px; border-radius: 50%;
    background: linear-gradient(135deg, var(--gold), var(--gold-deep));
    color: #FFF; display: inline-flex; align-items: center; justify-content: center;
    font-weight: 700; font-size: 16px;
    box-shadow: 0 4px 12px -4px rgba(201,169,110,0.5);
    flex-shrink: 0;
  }
  .block h2 {
    font-size: 20px; font-weight: 700; letter-spacing: -0.02em;
    color: var(--navy); margin: 0; line-height: 1.2;
  }
  .block .desc { color: var(--mut); font-size: 13px; margin: 6px 0 0 50px; }

  .field {
    margin-bottom: 22px;
  }
  .field label.q {
    display: block; font-weight: 600; color: var(--navy); font-size: 14px;
    margin-bottom: 8px; line-height: 1.4;
  }
  .field label.q .req { color: var(--error); font-weight: 700; }
  .field .help { font-size: 12px; color: var(--mut); margin: -4px 0 8px; line-height: 1.4; }

  .field input[type="text"],
  .field input[type="email"],
  .field input[type="tel"],
  .field input[type="number"],
  .field textarea {
    width: 100%;
    padding: 11px 13px;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    font-family: inherit; font-size: 14px;
    color: var(--ink);
    background: #FFF;
    transition: border-color 200ms, box-shadow 200ms;
  }
  .field textarea {
    min-height: 88px; resize: vertical;
    line-height: 1.55;
  }
  .field input:focus, .field textarea:focus {
    outline: none;
    border-color: var(--gold);
    box-shadow: 0 0 0 3px rgba(201,169,110,0.18);
  }
  .field input::placeholder, .field textarea::placeholder { color: #A8A29E; }

  /* CHECKBOXES / RADIOS */
  .options { display: flex; flex-direction: column; gap: 8px; }
  .options label {
    display: flex; align-items: flex-start; gap: 10px;
    padding: 11px 14px;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    cursor: pointer; transition: all 180ms;
    font-size: 14px;
    background: #FFF;
  }
  .options label:hover { border-color: var(--gold); background: #FAF7F0; }
  .options label.checked { border-color: var(--gold-deep); background: rgba(201,169,110,0.08); }
  .options input { margin-top: 3px; accent-color: var(--gold-deep); }
  .options span { flex: 1; line-height: 1.4; }

  /* GRID FOR CLIENT BLOCKS */
  .client-row {
    display: grid;
    grid-template-columns: 1fr;
    gap: 10px;
    padding: 16px;
    border: 1px dashed var(--border);
    border-radius: 12px;
    margin-bottom: 14px;
    background: rgba(255,255,255,0.5);
  }
  .client-row label.mini { font-size: 12px; font-weight: 600; color: var(--mut); margin-bottom: 4px; display: block; }
  @media (min-width: 640px) {
    .client-row { grid-template-columns: 1fr 1fr 1fr; gap: 14px; }
    .client-row .full { grid-column: 1 / -1; }
  }

  /* SUBMIT */
  .submit-area {
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-soft) 100%);
    color: #FFF;
    border-radius: 20px;
    padding: 32px 28px;
    margin-top: 36px;
    text-align: center;
    position: relative; overflow: hidden;
  }
  .submit-area::before {
    content: ""; position: absolute; top: -50px; right: -50px;
    width: 220px; height: 220px; border-radius: 50%;
    background: rgba(201,169,110,0.25); filter: blur(60px);
  }
  .submit-area h3 { font-size: 22px; margin: 0 0 6px; position: relative; }
  .submit-area p { margin: 0 0 18px; color: rgba(255,255,255,0.78); font-size: 14px; position: relative; }
  .btn-submit {
    background: linear-gradient(135deg, var(--gold), var(--gold-deep));
    color: var(--navy-deep); border: none; cursor: pointer;
    padding: 14px 32px; border-radius: 999px;
    font-family: inherit; font-weight: 700; font-size: 15px;
    box-shadow: 0 8px 24px -8px rgba(201,169,110,0.6);
    transition: all 200ms;
    position: relative;
  }
  .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 14px 32px -8px rgba(201,169,110,0.7); }
  .btn-submit:disabled { opacity: 0.6; cursor: not-allowed; }

  .error-msg {
    background: #FEE2E2; color: var(--error);
    padding: 12px 16px; border-radius: 10px;
    border: 1px solid #FECACA;
    font-size: 14px; margin-bottom: 20px;
  }

  /* HONEYPOT */
  .honey { position: absolute; left: -9999px; opacity: 0; pointer-events: none; }

  /* THANKS PAGE */
  .thanks {
    max-width: 600px; margin: 80px auto; padding: 48px 32px; text-align: center;
    background: linear-gradient(160deg, rgba(255,255,255,0.96), rgba(255,255,255,0.75));
    border-radius: 24px;
    border: 1px solid var(--border);
    box-shadow: 0 12px 40px -16px rgba(10,14,39,0.15);
  }
  .thanks-icon {
    width: 72px; height: 72px; margin: 0 auto 20px;
    background: linear-gradient(135deg, var(--gold), var(--gold-deep));
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: #FFF;
    box-shadow: 0 12px 32px -8px rgba(201,169,110,0.55);
  }
  .thanks h1 { font-size: 32px; color: var(--navy); margin: 0 0 12px; letter-spacing: -0.02em; }
  .thanks p { color: var(--mut); font-size: 15px; line-height: 1.6; margin: 0 auto 24px; max-width: 460px; }

  /* FOOTER */
  .pie {
    text-align: center; padding: 32px 24px;
    border-top: 1px solid var(--border);
    color: var(--mut); font-size: 12px;
    background: var(--muted);
  }
  .pie strong { color: var(--navy); }
  .pie a { color: var(--gold-deep); text-decoration: none; font-weight: 600; }

  @media (max-width: 640px) {
    .block { padding: 22px 20px; }
    form { padding: 24px 16px 60px; }
  }
</style>
</head>
<body>

<?php if ($submitted): ?>
  <!-- ============== THANKS PAGE ============== -->
  <div class="thanks">
    <div class="thanks-icon">
      <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
    </div>
    <h1>¡Listo, gracias!</h1>
    <p>Recibimos tus respuestas correctamente. En las próximas 48 horas el equipo de Creative Web revisará la información y te enviaremos una propuesta de SEO ajustada a tu realidad real, no genérica.</p>
    <p style="font-size:13px;color:var(--mut);">Mientras tanto puedes seguirnos en <a href="<?= $CW_URL ?>" style="color:var(--gold-deep);font-weight:600;">creativeweb.com.ec</a></p>
  </div>
  <div class="pie">
    <strong>Creative Web</strong> · creativeweb.com.ec<br>
    <span style="opacity:0.7;">Marketing digital · SEO · Sitios web · Cuestionario estratégico Dikapsa</span>
  </div>
<?php else: ?>

  <!-- ============== HERO ============== -->
  <header class="hero">
    <div class="hero-inner">
      <span class="eyebrow"><span class="dot"></span>Creative Web · Diagnóstico estratégico</span>
      <h1>Antes de armar tu <span class="accent">plan SEO</span>,<br>necesitamos entenderte bien</h1>
      <p class="lede">Este cuestionario nos ayuda a construir una estrategia de SEO realmente útil para Dikapsa — basada en tus clientes reales, no en suposiciones. Tarda 15–20 minutos. Las respuestas se guardan automáticamente mientras escribes.</p>
      <div class="meta-bar">
        <span><strong>Para:</strong> Propietario / Gerencia Dikapsa</span>
        <span><strong>Tiempo:</strong> 15–20 minutos</span>
        <span><strong>Privacidad:</strong> uso interno Creative Web</span>
      </div>
    </div>
  </header>

  <!-- ============== PROGRESO ============== -->
  <div class="progress">
    <span class="save-status" id="save-status">✓ Tus respuestas se guardan en tu navegador automáticamente</span>
  </div>

  <!-- ============== FORM ============== -->
  <form method="POST" id="quiz-form" autocomplete="on">

    <?php if ($error): ?>
      <div class="error-msg">⚠ <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <!-- Honeypot -->
    <div class="honey" aria-hidden="true">
      <label>Website: <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>

    <!-- ============== DATOS DEL QUE RESPONDE ============== -->
    <div class="block">
      <div class="block-header">
        <div class="block-num">0</div>
        <h2>Datos de quien responde</h2>
      </div>

      <div class="field">
        <label class="q" for="r_nombre">Nombre completo <span class="req">*</span></label>
        <input type="text" id="r_nombre" name="respondente_nombre" required placeholder="Ej. Juan Pérez">
      </div>

      <div class="field">
        <label class="q" for="r_cargo">Cargo en Dikapsa <span class="req">*</span></label>
        <input type="text" id="r_cargo" name="respondente_cargo" required placeholder="Ej. Propietario / Gerente Comercial">
      </div>

      <div class="field">
        <label class="q" for="r_correo">Correo electrónico <span class="req">*</span></label>
        <input type="email" id="r_correo" name="respondente_correo" required placeholder="ejemplo@dikapsa.com">
      </div>

      <div class="field">
        <label class="q" for="r_tel">WhatsApp / teléfono (opcional)</label>
        <input type="tel" id="r_tel" name="respondente_telefono" placeholder="+593 ...">
      </div>
    </div>

    <!-- ============== BLOQUE 1 ============== -->
    <div class="block">
      <div class="block-header">
        <div class="block-num">1</div>
        <h2>Los clientes que sí mueven la aguja</h2>
      </div>
      <p class="desc">Queremos enfocar el SEO hacia el tipo de cliente que más factura, no hacia keywords genéricas que traen pedidos pequeños.</p>

      <div class="field">
        <label class="q" for="b1_top_clientes">1.1 Lista los 5–10 clientes más grandes de Dikapsa en los últimos 2 años</label>
        <div class="help">Por ejemplo: Frutería Monserrath, Carl's Jr, Fybeca... uno por línea.</div>
        <textarea id="b1_top_clientes" name="b1_top_clientes" rows="6" placeholder="1. Frutería Monserrath&#10;2. Carl's Jr&#10;3. Fybeca&#10;..."></textarea>
      </div>

      <div class="field">
        <label class="q" for="b1_detalle_clientes">1.2 De los anteriores, cuéntanos brevemente</label>
        <div class="help">Por cada uno: <strong>qué les facturas, cuánto al año aprox., qué % de tu facturación total representa, hace cuánto son clientes, frecuencia de órdenes (mensual/trimestral/anual), cómo llegaron a Dikapsa</strong>.</div>
        <textarea id="b1_detalle_clientes" name="b1_detalle_clientes" rows="9" placeholder="Ej. Frutería Monserrath — packaging cajas para fruta — ~$30k/año — ~12% del total — 3 años — órdenes mensuales — llegó por referencia.&#10;Carl's Jr — POP para campañas — ~$15k/año — ~6% — 1 año — órdenes trimestrales — los buscamos por LinkedIn."></textarea>
      </div>

      <div class="field" style="background:rgba(201,169,110,0.08);border:1.5px solid rgba(201,169,110,0.3);border-radius:14px;padding:18px 18px 6px;">
        <label class="q" for="b1_casos_publicables">1.3 De tus clientes top, <strong>¿cuáles autorizarían un caso público con su nombre y logo</strong>? ⭐</label>
        <div class="help">Esto es <strong>oro puro para el SEO</strong>. Un caso de éxito documentado con marca reconocible vale 10× más que un post genérico. Por cada cliente que autorizaría, dinos: <strong>qué material tienen disponible</strong> (foto del producto terminado, testimonio escrito, cifras del proyecto, video, antes/después).</div>
        <textarea id="b1_casos_publicables" name="b1_casos_publicables" rows="6" placeholder="Ej.&#10;• Frutería Monserrath — autorizaría — tenemos fotos del packaging + testimonio del gerente + datos de volumen mensual.&#10;• Carl's Jr — habría que pedir permiso — solo fotos del POP, sin testimonio escrito.&#10;• Cliente Z — NO autoriza por política interna."></textarea>
      </div>

      <div class="field">
        <label class="q" for="b1_no_perder">1.4 ¿Cuáles clientes no pueden perder bajo ninguna circunstancia?</label>
        <textarea id="b1_no_perder" name="b1_no_perder" rows="3"></textarea>
      </div>

      <div class="field">
        <label class="q" for="b1_perdidos">1.5 ¿Hubo 3–5 cuentas grandes que se perdieron? ¿Por qué?</label>
        <textarea id="b1_perdidos" name="b1_perdidos" rows="4" placeholder="Ej. Empresa X — la perdimos porque entró un competidor con precio 20% menor."></textarea>
      </div>

      <div class="field">
        <label class="q">1.6 Aproximadamente, <strong>¿cómo se distribuye tu facturación por tipo de cliente?</strong></label>
        <div class="help">Estima en %. Suma 100. Esto nos dice si vamos a empujar SEO B2B grande o mantener mix con PYME e individuos.</div>
        <div style="display:grid;grid-template-columns:1fr 90px;gap:8px;align-items:center;max-width:420px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Corporates grandes (Fybeca, Carl's Jr, etc.)</label>
          <input type="number" name="b1_mix_corporates" min="0" max="100" step="1" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">PYMEs (10–200 empleados)</label>
          <input type="number" name="b1_mix_pymes" min="0" max="100" step="1" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Microempresas / emprendedores</label>
          <input type="number" name="b1_mix_micro" min="0" max="100" step="1" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Individuos / consumidor final</label>
          <input type="number" name="b1_mix_individuos" min="0" max="100" step="1" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Sector público / instituciones</label>
          <input type="number" name="b1_mix_publico" min="0" max="100" step="1" placeholder="%" style="padding:8px 10px;">
        </div>
      </div>
    </div>

    <!-- ============== BLOQUE 2 ============== -->
    <div class="block">
      <div class="block-header">
        <div class="block-num">2</div>
        <h2>Cómo te buscan los clientes premium</h2>
      </div>
      <p class="desc">Para escoger las keywords correctas necesitamos entender qué busca realmente un comprador profesional.</p>

      <div class="field">
        <label class="q">2.1 Cuando un comprador o gerente de marca grande necesita una imprenta, ¿qué hace primero? <span class="help" style="display:inline;color:var(--mut);">(puedes seleccionar varias)</span></label>
        <div class="options">
          <label><input type="checkbox" name="b2_como_buscan[]" value="referencias"> <span>Pregunta a colegas y referencias del sector</span></label>
          <label><input type="checkbox" name="b2_como_buscan[]" value="google"> <span>Busca en Google</span></label>
          <label><input type="checkbox" name="b2_como_buscan[]" value="llama_directo"> <span>Llama directo a proveedores conocidos</span></label>
          <label><input type="checkbox" name="b2_como_buscan[]" value="rfp_email"> <span>Envía solicitud de cotización (RFP) a 3–5 imprentas por email</span></label>
          <label><input type="checkbox" name="b2_como_buscan[]" value="ferias"> <span>Va a ferias / eventos de la industria</span></label>
          <label><input type="checkbox" name="b2_como_buscan[]" value="linkedin"> <span>Busca por LinkedIn / redes profesionales</span></label>
          <label><input type="checkbox" name="b2_como_buscan[]" value="otro"> <span>Otro (especificar abajo)</span></label>
        </div>
      </div>

      <div class="field">
        <label class="q" for="b2_busquedas_google">2.2 Si un comprador nuevo de Fybeca/Carl's Jr fuera a Google sin conocer Dikapsa, ¿qué crees que buscaría?</label>
        <div class="help">Escribe 5–10 búsquedas exactas que crees que haría. Una por línea.</div>
        <textarea id="b2_busquedas_google" name="b2_busquedas_google" rows="6" placeholder="proveedor de empaques alimentos Ecuador&#10;imprenta corporativa Quito&#10;packaging marcas Ecuador&#10;..."></textarea>
      </div>

      <div class="field">
        <label class="q" for="b2_jerga_tecnica">2.3 ¿Hay palabras o términos técnicos que SOLO usan compradores profesionales?</label>
        <div class="help">Ej. "BAT print", "Pantone matching", "FSC", "Master pack", "muestra impresa", "tirada", "barniz UV selectivo"...</div>
        <textarea id="b2_jerga_tecnica" name="b2_jerga_tecnica" rows="3"></textarea>
      </div>

      <div class="field">
        <label class="q">2.4 ¿De estos competidores del mercado ecuatoriano, <strong>cuáles conoces o has visto que un cliente compare con Dikapsa</strong>? ⭐</label>
        <div class="help">Marca todos los que aplique. Si hay otro no listado, agrégalo en la siguiente pregunta.</div>
        <div class="options">
          <label><input type="checkbox" name="b2_competidores[]" value="industrias_omega"> <span><strong>Industrias Omega</strong> (Quito, 80 años, ISO + FSC, packaging farma/alimentos/florícola)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="servigraf"> <span><strong>Servigraf Editores</strong> (Quito, 27 años, Heidelberg + AI sketch + loyalty)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="creativeprint"> <span><strong>CreativePrint</strong> (Quito, imprenta full-service con tienda online)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="elen_graphics"> <span><strong>Elen Graphics</strong> (Quito, 39 años, B2B tradicional)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="dreampack"> <span><strong>Dreampack</strong> (paper packaging eco — clientes públicos: KFC, Arcos Dorados, Sweet & Coffee)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="fullpacking"> <span><strong>Fullpacking</strong> (empaque eco alimentos/aerolíneas/florícola, BPM)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="level_print"> <span><strong>Level Print</strong> (Guayaquil, 35 años)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="graficentro"> <span><strong>Graficentro</strong> (Guayaquil, papelería corporativa)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="imprenta_la_mejor"> <span><strong>Imprenta La Mejor</strong> (Guayaquil)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="termopack"> <span><strong>Termopack</strong> (empaques eco)</span></label>
          <label><input type="checkbox" name="b2_competidores[]" value="industrias_omega"> <span>Otros (especificar abajo)</span></label>
        </div>
      </div>

      <div class="field">
        <label class="q" for="b2_competidor_top">2.5 ¿Cuál percibes como <strong>tu competidor #1 real</strong>, y por qué?</label>
        <div class="help">El que más te quita ventas. Cuéntanos en qué te gana (precio, tecnología, ubicación, marca, capacidad...) y dónde los superas tú.</div>
        <textarea id="b2_competidor_top" name="b2_competidor_top" rows="4" placeholder="Ej. Servigraf — nos gana porque tiene calculadora online y 27 años en Quito. Los superamos en cobertura nacional y precio."></textarea>
      </div>

      <div class="field">
        <label class="q" for="b2_motivo_perdida">2.6 Cuando un prospecto prefirió a un competidor, ¿cuál fue el motivo real (no la objeción dicha)?</label>
        <div class="help">A veces el prospecto dice "muy caro" pero la razón verdadera fue otra (referencia personal, tiempos, garantía, factura electrónica, etc.). Cuéntanos lo que averiguaste después.</div>
        <textarea id="b2_motivo_perdida" name="b2_motivo_perdida" rows="4"></textarea>
      </div>
    </div>

    <!-- ============== BLOQUE 3 ============== -->
    <div class="block">
      <div class="block-header">
        <div class="block-num">3</div>
        <h2>Servicios estratégicos a empujar</h2>
      </div>
      <p class="desc">El SEO va a empujar 3-4 líneas. Necesitamos saber cuáles.</p>

      <div class="field">
        <label class="q">3.1 ¿Cuáles 3–4 líneas queremos priorizar los próximos 6 meses? <span class="help" style="display:inline;color:var(--mut);">(elige varias)</span></label>
        <div class="options">
          <label><input type="checkbox" name="b3_lineas[]" value="packaging_corporativo"> <span>Packaging corporativo (cajas, etiquetas para marcas grandes)</span></label>
          <label><input type="checkbox" name="b3_lineas[]" value="pop_retail"> <span>POP de gran formato para retail (vibrines, exhibidores, displays)</span></label>
          <label><input type="checkbox" name="b3_lineas[]" value="material_campanas"> <span>Material publicitario para campañas (afiches, gigantografías, activaciones)</span></label>
          <label><input type="checkbox" name="b3_lineas[]" value="papeleria_institucional"> <span>Papelería corporativa institucional (tarjetas, sobres, hojas — pedidos masivos)</span></label>
          <label><input type="checkbox" name="b3_lineas[]" value="editorial"> <span>Editorial (catálogos, revistas, memorias institucionales)</span></label>
          <label><input type="checkbox" name="b3_lineas[]" value="recetarios"> <span>Recetarios médicos (línea retail)</span></label>
          <label><input type="checkbox" name="b3_lineas[]" value="servicio_integral"> <span>Servicio integral diseño + producción ("Dikapsa lo hace todo")</span></label>
          <label><input type="checkbox" name="b3_lineas[]" value="otro"> <span>Otro (especificar)</span></label>
        </div>
      </div>

      <div class="field" style="background:rgba(201,169,110,0.08);border:1.5px solid rgba(201,169,110,0.3);border-radius:14px;padding:18px;">
        <label class="q">3.2 <strong>¿Qué industria/sector quieres dominar primero?</strong> ⭐ <span class="help" style="display:inline;color:var(--mut);">(elige 1–2 prioritarios)</span></label>
        <div class="help">Esta es la decisión más importante: cada industria tiene keywords y casos distintos. Hay que enfocar el SEO en pocas verticales para ganar.</div>
        <div class="options">
          <label><input type="checkbox" name="b3_industria[]" value="alimentos_qsr"> <span><strong>Alimentos / QSR / fast food</strong> (Carl's Jr, KFC, restaurantes — packaging + POP)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="retail_supermercados"> <span><strong>Retail y supermercados</strong> (Supermaxi, Mi Comisariato — POP, etiquetas, displays)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="farmacia_salud"> <span><strong>Farmacia y salud</strong> (Fybeca, Sana Sana — cajas medicamentos, recetarios)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="cosmetica_belleza"> <span><strong>Cosmética y belleza</strong> (marcas Yanbal, Avon — packaging premium)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="floricola_agro"> <span><strong>Florícolas y agro</strong> (cajas exportación, etiquetas)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="hoteles_turismo"> <span><strong>Hoteles, turismo y restaurantes premium</strong> (papelería, menús, room amenities)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="inmobiliaria_construccion"> <span><strong>Inmobiliaria y construcción</strong> (folletos, planos, gran formato)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="sector_publico"> <span><strong>Sector público / instituciones</strong> (licitaciones, papelería oficial)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="educativo"> <span><strong>Educativo</strong> (libros, cuadernos, material universitario)</span></label>
          <label><input type="checkbox" name="b3_industria[]" value="medico_consultorios"> <span><strong>Médico/consultorios independientes</strong> (recetarios — la línea retail)</span></label>
        </div>
      </div>

      <div class="field">
        <label class="q" for="b3_cliente_sonado">3.3 ¿Qué tipo de cliente sueñas atraer? Da ejemplos concretos con nombres si es posible</label>
        <div class="help">Ej. "Quiero entrar a Supermaxi", "Quiero que Yanbal nos compre etiquetas"...</div>
        <textarea id="b3_cliente_sonado" name="b3_cliente_sonado" rows="3"></textarea>
      </div>

      <div class="field">
        <label class="q">3.4 <strong>% aproximado de tu facturación por línea HOY</strong> ⭐</label>
        <div class="help">Esto define cuántos posts del plan SEO van a cada línea. Suma 100.</div>
        <div style="display:grid;grid-template-columns:1fr 90px;gap:8px;align-items:center;max-width:420px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Packaging (cajas, empaques)</label>
          <input type="number" name="b3_fact_packaging" min="0" max="100" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">POP y gran formato (vibrines, roll-up, gigantografías)</label>
          <input type="number" name="b3_fact_pop" min="0" max="100" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Papelería corporativa (tarjetas, sobres, hojas, credenciales)</label>
          <input type="number" name="b3_fact_papeleria" min="0" max="100" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Etiquetas adhesivas</label>
          <input type="number" name="b3_fact_etiquetas" min="0" max="100" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Editorial (catálogos, libros, revistas)</label>
          <input type="number" name="b3_fact_editorial" min="0" max="100" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Recetarios médicos</label>
          <input type="number" name="b3_fact_recetarios" min="0" max="100" placeholder="%" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Otros / Diseño</label>
          <input type="number" name="b3_fact_otros" min="0" max="100" placeholder="%" style="padding:8px 10px;">
        </div>
      </div>

      <div class="field">
        <label class="q" for="b3_moq">3.5 Volumen mínimo (MOQ) y ticket promedio por línea</label>
        <div class="help">Importante: Dreampack exige 5.000+ unidades como MOQ. Si tu MOQ es menor, es una ventaja real ante mid-market.</div>
        <textarea id="b3_moq" name="b3_moq" rows="5" placeholder="Ej.&#10;Packaging: MOQ 500 cajas — ticket promedio $800&#10;Vibrines: MOQ 50 — ticket $400&#10;Tarjetas: MOQ 100 — ticket $35"></textarea>
      </div>

      <div class="field">
        <label class="q" for="b3_diferenciador">3.6 ¿Qué puedes ofrecer que tu competencia local NO puede?</label>
        <div class="help">Maquinaria específica, tiempos, volumen mínimo bajo, diseño incluido, cobertura nacional, sistema online (Printflash), años de experiencia, certificaciones, sede norte...</div>
        <textarea id="b3_diferenciador" name="b3_diferenciador" rows="4"></textarea>
      </div>
    </div>

    <!-- ============== BLOQUE 4 ============== -->
    <div class="block">
      <div class="block-header">
        <div class="block-num">4</div>
        <h2>Argumentos de venta y diferenciadores</h2>
      </div>

      <div class="field">
        <label class="q" for="b4_argumentos">4.1 Cuando un prospecto pregunta "¿por qué Dikapsa?", ¿qué responde el equipo comercial?</label>
        <div class="help">Escribe los 3–4 argumentos principales tal cual los dicen.</div>
        <textarea id="b4_argumentos" name="b4_argumentos" rows="5"></textarea>
      </div>

      <div class="field">
        <label class="q">4.2 ¿Qué objeciones escuchas más seguido del prospecto grande?</label>
        <div class="options">
          <label><input type="checkbox" name="b4_objeciones[]" value="precio"> <span>"Son muy caros"</span></label>
          <label><input type="checkbox" name="b4_objeciones[]" value="ubicacion"> <span>"Están muy lejos (no en Quito/Guayaquil)"</span></label>
          <label><input type="checkbox" name="b4_objeciones[]" value="capacidad"> <span>"No conozco su capacidad / volumen"</span></label>
          <label><input type="checkbox" name="b4_objeciones[]" value="proveedor_actual"> <span>"Mi proveedor actual ya funciona"</span></label>
          <label><input type="checkbox" name="b4_objeciones[]" value="tiempos"> <span>"Los tiempos de entrega no son competitivos"</span></label>
          <label><input type="checkbox" name="b4_objeciones[]" value="calidad_dudada"> <span>"Dudan de la calidad sin ver muestras"</span></label>
          <label><input type="checkbox" name="b4_objeciones[]" value="otro"> <span>Otra (especificar abajo)</span></label>
        </div>
      </div>

      <div class="field">
        <label class="q" for="b4_objeciones_otro">4.2.a Otras objeciones u observaciones</label>
        <textarea id="b4_objeciones_otro" name="b4_objeciones_otro" rows="3"></textarea>
      </div>

      <div class="field">
        <label class="q" for="b4_donde_nos_ganan">4.3 Por cada competidor que mencionaste antes, ¿en qué te gana?</label>
        <div class="help">Lista honestamente. Sirve para que el SEO ataque esas brechas (no las ignore).</div>
        <textarea id="b4_donde_nos_ganan" name="b4_donde_nos_ganan" rows="4" placeholder="Ej.&#10;Servigraf — calculadora online y app móvil&#10;Omega — certificaciones ISO + FSC&#10;Dreampack — relaciones directas con KFC/McDonald's"></textarea>
      </div>
    </div>

    <!-- ============== BLOQUE 5 ============== -->
    <div class="block">
      <div class="block-header">
        <div class="block-num">5</div>
        <h2>Operación y capacidad</h2>
      </div>

      <div class="field">
        <label class="q" for="b5_capacidad">5.1 Si entran mañana 5 clientes nuevos del tamaño de Fybeca, ¿pueden producir? ¿Cuál es el cuello de botella?</label>
        <textarea id="b5_capacidad" name="b5_capacidad" rows="4" placeholder="Ej. Sí podemos. El cuello sería la financiación de papel para tiradas grandes."></textarea>
      </div>

      <div class="field">
        <label class="q" for="b5_tiempo_cotizacion">5.2 Tiempo promedio para entregar una cotización (días)</label>
        <input type="number" id="b5_tiempo_cotizacion" name="b5_tiempo_cotizacion" min="0" max="30" placeholder="Ej. 2">
      </div>

      <div class="field">
        <label class="q" for="b5_tiempo_produccion">5.2 Tiempo promedio para producir + entregar un pedido grande (días)</label>
        <input type="number" id="b5_tiempo_produccion" name="b5_tiempo_produccion" min="0" max="180" placeholder="Ej. 10">
      </div>

      <div class="field">
        <label class="q">5.3 ¿Tienen ejecutivo de cuenta dedicado por cliente grande?</label>
        <div class="options">
          <label><input type="radio" name="b5_ejecutivo" value="si_dedicado"> <span>Sí, cada cliente grande tiene un ejecutivo dedicado</span></label>
          <label><input type="radio" name="b5_ejecutivo" value="parcial"> <span>Solo algunos clientes muy grandes</span></label>
          <label><input type="radio" name="b5_ejecutivo" value="general"> <span>Todo va por WhatsApp / canal general</span></label>
        </div>
      </div>

      <div class="field">
        <label class="q">5.4 <strong>¿Qué certificaciones tienen?</strong> ⭐ <span class="help" style="display:inline;color:var(--mut);">(marca todas las que apliquen)</span></label>
        <div class="help">Las certificaciones se usan como argumentos SEO en posts de autoridad — un cliente busca "proveedor con FSC" o "imprenta ISO 9001". Si no tienen ninguna, también es información valiosa.</div>
        <div class="options">
          <label><input type="checkbox" name="b5_certificaciones[]" value="iso_9001"> <span>ISO 9001 (calidad)</span></label>
          <label><input type="checkbox" name="b5_certificaciones[]" value="iso_14001"> <span>ISO 14001 (ambiente)</span></label>
          <label><input type="checkbox" name="b5_certificaciones[]" value="fsc"> <span>FSC (cadena de custodia forestal)</span></label>
          <label><input type="checkbox" name="b5_certificaciones[]" value="bpm"> <span>BPM (Buenas Prácticas de Manufactura)</span></label>
          <label><input type="checkbox" name="b5_certificaciones[]" value="inen"> <span>INEN (cumplimiento etiquetado Ecuador)</span></label>
          <label><input type="checkbox" name="b5_certificaciones[]" value="sri"> <span>Autorizada SRI (factura electrónica)</span></label>
          <label><input type="checkbox" name="b5_certificaciones[]" value="hazardous"> <span>Cumplimiento HACCP / contacto con alimentos</span></label>
          <label><input type="checkbox" name="b5_certificaciones[]" value="ninguna"> <span>Aún no tenemos certificaciones formales</span></label>
        </div>
      </div>

      <div class="field">
        <label class="q" for="b5_equipos">5.5 <strong>Equipos clave del taller y capacidad mensual</strong> ⭐</label>
        <div class="help">Marcas de máquinas y capacidad mensual aprox. Ejemplo: "Xerox Versant 80 — capacidad 100.000 A3/mes". Sirve para posts de autoridad técnica.</div>
        <textarea id="b5_equipos" name="b5_equipos" rows="5" placeholder="Ej.&#10;Xerox Versant 80 — digital color, 80 ppm, capacidad ~100k A3/mes&#10;Heidelberg Speedmaster — offset, capacidad ~250k pliegos/mes&#10;Roland VersaCAMM — gran formato eco-solvente, 1.6m ancho&#10;Plotter de corte/troquelado&#10;Pantone Color Manager"></textarea>
      </div>
    </div>

    <!-- ============== BLOQUE 6 ============== -->
    <div class="block">
      <div class="block-header">
        <div class="block-num">6</div>
        <h2>Visión y meta a 12 meses</h2>
      </div>

      <div class="field">
        <label class="q" for="b6_meta">6.1 En 12 meses, ¿qué te haría sentir que el SEO valió la pena? (cualitativo)</label>
        <textarea id="b6_meta" name="b6_meta" rows="3" placeholder="Ej. Tener 5 clientes nuevos del tamaño de Carl's Jr. / Pipeline B2B predecible."></textarea>
      </div>

      <div class="field" style="background:rgba(201,169,110,0.08);border:1.5px solid rgba(201,169,110,0.3);border-radius:14px;padding:18px;">
        <label class="q">6.2 <strong>Meta cuantificable a 12 meses</strong> ⭐ <span class="help" style="display:inline;color:var(--mut);">(rellena lo que aplique)</span></label>
        <div class="help">Define el ROI esperado. Esto nos sirve para calibrar si la inversión del plan SEO se va a pagar.</div>
        <div style="display:grid;grid-template-columns:1fr 130px;gap:10px;align-items:center;max-width:500px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Clientes nuevos B2B grandes en 12 meses</label>
          <input type="number" name="b6_meta_clientes" min="0" placeholder="Ej. 5" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Facturación adicional anual (USD)</label>
          <input type="number" name="b6_meta_facturacion" min="0" placeholder="Ej. 60000" style="padding:8px 10px;">
          <label class="q" style="font-weight:500;margin:0;font-size:13px;">Leads B2B cualificados / mes</label>
          <input type="number" name="b6_meta_leads" min="0" placeholder="Ej. 20" style="padding:8px 10px;">
        </div>
      </div>

      <div class="field">
        <label class="q" for="b6_quitar_competencia">6.3 ¿Hay algún cliente grande del competidor que te encantaría sacar?</label>
        <textarea id="b6_quitar_competencia" name="b6_quitar_competencia" rows="3" placeholder="Ej. Empresa X — actualmente con Servigraf / Industrias Omega."></textarea>
      </div>

      <div class="field">
        <label class="q" for="b6_extras">6.4 ¿Algo más que debamos saber antes de armar la propuesta?</label>
        <textarea id="b6_extras" name="b6_extras" rows="4" placeholder="Restricciones, prioridades especiales, observaciones..."></textarea>
      </div>
    </div>

    <!-- ============== BLOQUE 7 ============== -->
    <div class="block">
      <div class="block-header">
        <div class="block-num">7</div>
        <h2>Recursos para producir el SEO</h2>
      </div>
      <p class="desc">Para que el plan funcione necesitamos saber qué recursos internos hay disponibles.</p>

      <div class="field">
        <label class="q" for="b7_aprobador">7.1 ¿Quién revisa y aprueba el contenido antes de publicar?</label>
        <div class="help">Nombre + cargo. Idealmente UNA persona para no atrasar el ritmo de publicación.</div>
        <input type="text" id="b7_aprobador" name="b7_aprobador" placeholder="Ej. María González — Gerente de Marketing">
      </div>

      <div class="field">
        <label class="q">7.2 ¿Tienen material gráfico disponible? <span class="help" style="display:inline;color:var(--mut);">(marca lo que aplique)</span></label>
        <div class="options">
          <label><input type="checkbox" name="b7_material[]" value="fotos_taller"> <span>Fotos profesionales del taller, máquinas e instalaciones</span></label>
          <label><input type="checkbox" name="b7_material[]" value="fotos_productos"> <span>Fotos de productos terminados (cajas, vibrines, etc.)</span></label>
          <label><input type="checkbox" name="b7_material[]" value="fotos_proceso"> <span>Fotos del proceso productivo (impresión, corte, acabados)</span></label>
          <label><input type="checkbox" name="b7_material[]" value="fotos_equipo"> <span>Fotos del equipo humano (operarios, comercial, diseño)</span></label>
          <label><input type="checkbox" name="b7_material[]" value="video"> <span>Video del taller / institucional</span></label>
          <label><input type="checkbox" name="b7_material[]" value="logos_clientes"> <span>Logos de clientes (con permiso de uso)</span></label>
          <label><input type="checkbox" name="b7_material[]" value="manual_marca"> <span>Manual de marca / identidad gráfica formal</span></label>
          <label><input type="checkbox" name="b7_material[]" value="ninguno"> <span>Aún no tenemos material — Creative Web puede ayudar a producirlo</span></label>
        </div>
      </div>

      <div class="field">
        <label class="q" for="b7_wp_acceso">7.3 ¿Quién tiene acceso administrador a WordPress de dikapsa.com?</label>
        <div class="help">Lo necesitamos para instalar GTM, plugins SEO y publicar posts. Si no hay quién, lo coordinamos con tu desarrollador.</div>
        <input type="text" id="b7_wp_acceso" name="b7_wp_acceso" placeholder="Ej. Juan Pérez — IT Dikapsa / o 'gestionado por agencia externa'">
      </div>

      <div class="field">
        <label class="q">7.4 ¿Pueden disponer de 30 minutos al mes para reunión de avances?</label>
        <div class="options">
          <label><input type="radio" name="b7_reunion" value="si_mensual"> <span>Sí, una vez al mes</span></label>
          <label><input type="radio" name="b7_reunion" value="si_bimensual"> <span>Cada 2 meses está bien</span></label>
          <label><input type="radio" name="b7_reunion" value="solo_emails"> <span>Prefiero reportes por correo, sin reunión</span></label>
        </div>
      </div>

      <div class="field">
        <label class="q" for="b7_redes_externos">7.5 ¿Trabajan con agencia / freelance de redes sociales / publicidad?</label>
        <div class="help">Para no duplicar esfuerzos y coordinar mensajes (consistencia de marca).</div>
        <textarea id="b7_redes_externos" name="b7_redes_externos" rows="2" placeholder="Ej. Sí, Agencia X maneja Instagram y Facebook desde 2024."></textarea>
      </div>
    </div>

    <!-- ============== SUBMIT ============== -->
    <div class="submit-area">
      <h3>¿Todo listo?</h3>
      <p>Las respuestas se enviarán directamente al equipo de Creative Web.<br>Te contactaremos en las próximas 48 horas con la propuesta SEO ajustada.</p>
      <button type="submit" class="btn-submit" id="submit-btn">Enviar respuestas →</button>
    </div>

  </form>

  <div class="pie">
    <strong>Creative Web</strong> · creativeweb.com.ec<br>
    <span style="opacity:0.7;">Marketing digital · SEO · Sitios web · Diagnóstico estratégico</span>
  </div>

  <script>
    // ============== AUTOSAVE LOCALSTORAGE ==============
    (function() {
      const KEY = 'cw_dikapsa_quiz_v1';
      const form = document.getElementById('quiz-form');
      const status = document.getElementById('save-status');
      if (!form) return;

      // Restaurar
      try {
        const saved = JSON.parse(localStorage.getItem(KEY) || '{}');
        Object.keys(saved).forEach(name => {
          const value = saved[name];
          const els = form.querySelectorAll(`[name="${CSS.escape(name)}"], [name="${CSS.escape(name)}[]"]`);
          els.forEach(el => {
            if (el.type === 'checkbox' || el.type === 'radio') {
              const arr = Array.isArray(value) ? value : [value];
              if (arr.includes(el.value)) el.checked = true;
            } else {
              el.value = value;
            }
          });
        });
        updateCheckedClasses();
      } catch(e) { /* noop */ }

      let saveTimer = null;
      function save() {
        const data = {};
        const fd = new FormData(form);
        for (const [k, v] of fd.entries()) {
          if (k === 'website') continue;
          if (data[k]) {
            if (!Array.isArray(data[k])) data[k] = [data[k]];
            data[k].push(v);
          } else {
            data[k] = v;
          }
        }
        try {
          localStorage.setItem(KEY, JSON.stringify(data));
          if (status) {
            status.textContent = '✓ Guardado automáticamente · ' + new Date().toLocaleTimeString('es-EC', {hour:'2-digit', minute:'2-digit'});
          }
        } catch(e) {}
      }

      function scheduleSave() {
        clearTimeout(saveTimer);
        saveTimer = setTimeout(save, 600);
      }

      form.addEventListener('input', scheduleSave);
      form.addEventListener('change', () => { scheduleSave(); updateCheckedClasses(); });

      // Estilo de option seleccionada
      function updateCheckedClasses() {
        form.querySelectorAll('.options label').forEach(lbl => {
          const inp = lbl.querySelector('input');
          if (inp && inp.checked) lbl.classList.add('checked');
          else lbl.classList.remove('checked');
        });
      }

      // Limpiar localStorage al enviar exitoso
      form.addEventListener('submit', () => {
        // si hay error en POST, no se limpia (la página recarga con el error y los datos en localStorage siguen)
        setTimeout(() => { try { localStorage.removeItem(KEY); } catch(e) {} }, 4000);
      });
    })();
  </script>

<?php endif; ?>

</body>
</html>
