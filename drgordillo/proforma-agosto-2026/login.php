<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Gordillo-2026') {
        $_SESSION['auth_gordillo'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Clave incorrecta. Intente nuevamente.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Propuesta web y SEO &mdash; Dr. Ren&eacute; Gordillo</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=Instrument+Serif:ital@0;1&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
  --noche:#04121A; --carbon:#0E2A35; --aqua:#2ED3C6; --aqua-osc:#12A99C;
  --ambar:#F0A14B; --hueso:#F4F7F7; --niebla:#9FB5BD; --linea:rgba(255,255,255,.10);
}
*{box-sizing:border-box;margin:0;padding:0}
body{
  font-family:'Sora',system-ui,sans-serif;
  background:
    radial-gradient(900px 600px at 30% 10%, rgba(46,211,198,.10), transparent 60%),
    var(--noche);
  color:var(--hueso);
  min-height:100vh; display:flex; align-items:center; justify-content:center;
  padding:24px;
}
.caja{
  width:100%; max-width:430px;
  background:rgba(14,42,53,.62);
  backdrop-filter:blur(22px);
  border:1px solid var(--linea);
  border-radius:20px; padding:44px 38px;
  box-shadow:0 40px 90px rgba(0,0,0,.55), 0 0 100px rgba(46,211,198,.07);
}
.marca{text-align:center; margin-bottom:34px}
.sello{
  width:62px;height:62px;margin:0 auto 20px;border-radius:18px;
  background:linear-gradient(135deg,var(--aqua),var(--aqua-osc));
  display:grid;place-items:center;
}
.sello svg{width:30px;height:30px;color:var(--noche)}
.eyebrow{
  font-family:'JetBrains Mono',monospace; font-size:10.5px;
  letter-spacing:.2em; text-transform:uppercase; color:var(--aqua);
  margin-bottom:10px;
}
.marca h1{font-size:21px;font-weight:700;letter-spacing:-.02em;line-height:1.25}
.marca h1 em{font-family:'Instrument Serif',serif;font-style:italic;color:var(--aqua);font-weight:400}
.marca p{color:var(--niebla);font-size:13.5px;margin-top:7px}
label{
  display:block;font-family:'JetBrains Mono',monospace;font-size:10px;
  letter-spacing:.16em;text-transform:uppercase;color:var(--niebla);margin-bottom:9px;
}
input{
  width:100%;padding:14px 16px;border-radius:12px;
  background:rgba(4,18,26,.7);border:1px solid var(--linea);
  color:var(--hueso);font:inherit;font-size:14.5px;
}
input:focus{outline:none;border-color:var(--aqua);box-shadow:0 0 0 3px rgba(46,211,198,.18)}
button{
  width:100%;margin-top:20px;padding:15px;border:0;border-radius:12px;
  background:linear-gradient(135deg,var(--aqua),var(--aqua-osc));
  color:var(--noche);font:inherit;font-weight:700;font-size:14.5px;
  letter-spacing:.02em;cursor:pointer;transition:filter .2s;
}
button:hover{filter:brightness(1.08)}
.err{
  margin-top:16px;padding:12px 15px;border-radius:10px;font-size:13.5px;
  background:rgba(240,161,75,.12);border:1px solid rgba(240,161,75,.35);color:var(--ambar);
}
.pie{
  margin-top:26px;padding-top:20px;border-top:1px solid var(--linea);
  text-align:center;color:var(--niebla);font-size:12px;
}
.pie b{color:var(--aqua);font-weight:600}
</style>
</head>
<body>
<div class="caja">
  <div class="marca">
    <div class="sello">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
        <path d="M12 5v14M5 12h14"/>
      </svg>
    </div>
    <p class="eyebrow">Creative Web &middot; Propuesta</p>
    <h1>Sitio web y posicionamiento <em>en Google</em></h1>
    <p>Dr. Ren&eacute; Gordillo &middot; Cirujano bari&aacute;trico</p>
  </div>
  <form method="POST">
    <label for="p">Clave de acceso</label>
    <input id="p" type="password" name="password" placeholder="Ingrese su clave" required autofocus>
    <?php if ($error): ?><div class="err"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <button type="submit">Ver la propuesta</button>
  </form>
  <div class="pie">Documento confidencial &middot; preparado por <b>Creative Web</b></div>
</div>
</body>
</html>
