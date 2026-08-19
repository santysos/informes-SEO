<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Soporte-CH-2026') {
        $_SESSION['auth_ch_soporte'] = true;
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
<title>Plan de Soporte Web Anual 2026-2027 &mdash; Comercial Hidrobo</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
:root{
  --azul:#003383; --azul-osc:#00256a; --azul-claro:#3656a5;
  --hielo:#c5d4ed; --noche:#0e1a2e; --tinta:#001144;
  --papel:#ffffff; --gris:#8494b4;
}
*{box-sizing:border-box;margin:0;padding:0}
body{
  font-family:'Inter',system-ui,sans-serif;
  background:radial-gradient(900px 620px at 30% 12%, rgba(54,86,165,.28), transparent 62%), var(--noche);
  color:#eaf0fa; min-height:100vh;
  display:flex; align-items:center; justify-content:center; padding:24px;
}
.caja{
  width:100%; max-width:430px;
  background:rgba(0,37,106,.42); backdrop-filter:blur(22px);
  border:1px solid rgba(197,212,237,.18); border-radius:18px; padding:44px 38px;
  box-shadow:0 40px 90px rgba(0,0,0,.5);
}
.sello{
  width:60px;height:60px;margin:0 auto 20px;border-radius:16px;
  background:linear-gradient(135deg,var(--azul),var(--azul-claro));
  display:grid;place-items:center;
}
.sello svg{width:30px;height:30px;color:#fff}
.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:10.5px;font-weight:700;
  letter-spacing:.2em;text-transform:uppercase;color:var(--hielo);
  text-align:center;margin-bottom:10px;
}
h1{font-size:20px;font-weight:700;text-align:center;line-height:1.3;letter-spacing:-.02em}
.sub{color:var(--gris);font-size:13.5px;text-align:center;margin-top:7px;margin-bottom:32px}
label{
  display:block;font-family:'JetBrains Mono',monospace;font-size:10px;
  letter-spacing:.16em;text-transform:uppercase;color:var(--gris);margin-bottom:9px;
}
input{
  width:100%;padding:14px 16px;border-radius:11px;
  background:rgba(0,17,68,.6);border:1px solid rgba(197,212,237,.2);
  color:#eaf0fa;font:inherit;font-size:14.5px;
}
input:focus{outline:none;border-color:var(--azul-claro);box-shadow:0 0 0 3px rgba(54,86,165,.28)}
button{
  width:100%;margin-top:20px;padding:15px;border:0;border-radius:11px;
  background:linear-gradient(135deg,var(--azul),var(--azul-claro));
  color:#fff;font:inherit;font-weight:700;font-size:14.5px;cursor:pointer;transition:filter .2s;
}
button:hover{filter:brightness(1.14)}
.err{
  margin-top:16px;padding:12px 15px;border-radius:10px;font-size:13.5px;
  background:rgba(255,120,120,.12);border:1px solid rgba(255,120,120,.32);color:#ffc2c2;
}
.pie{
  margin-top:26px;padding-top:20px;border-top:1px solid rgba(197,212,237,.14);
  text-align:center;color:var(--gris);font-size:12px;
}
.pie b{color:var(--hielo);font-weight:600}
</style>
</head>
<body>
<div class="caja">
  <div class="sello">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
      <path d="M12 3l8 3.5v5c0 4.5-3.3 8-8 9.5-4.7-1.5-8-5-8-9.5v-5z"/><path d="M9 12l2 2 4-4"/>
    </svg>
  </div>
  <p class="eyebrow">Creative Web &middot; Renovación anual</p>
  <h1>Plan de Soporte y Mantenimiento Web</h1>
  <p class="sub">Comercial Hidrobo &middot; oct 2026 – oct 2027</p>
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
