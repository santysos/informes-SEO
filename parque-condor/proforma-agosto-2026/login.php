<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Condor-2026') {
        $_SESSION['auth_condor'] = true;
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
<title>Propuesta &mdash; Parque Cóndor</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
:root{
  --verde:#4f9d63; --verde-osc:#3a7a4c; --verde-claro:#a7dcae;
  --noche:#0a1210; --carbon:#111f19; --gris:#8a9b90; --hielo:#d7e3da;
}
*{box-sizing:border-box;margin:0;padding:0}
body{
  font-family:'Outfit',system-ui,sans-serif;
  background:radial-gradient(950px 640px at 28% 10%, rgba(79,157,99,.22), transparent 62%), var(--noche);
  color:#e8f0ea; min-height:100vh;
  display:flex; align-items:center; justify-content:center; padding:24px;
}
.caja{
  width:100%; max-width:440px;
  background:rgba(17,31,25,.62); backdrop-filter:blur(22px);
  border:1px solid rgba(167,220,174,.16); border-radius:18px; padding:44px 38px;
  box-shadow:0 40px 90px rgba(0,0,0,.55);
}
.sello{
  width:60px;height:60px;margin:0 auto 20px;border-radius:16px;
  background:linear-gradient(135deg,var(--verde-osc),var(--verde));
  display:grid;place-items:center;
}
.sello svg{width:30px;height:30px;color:#06170e}
.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:10.5px;font-weight:700;
  letter-spacing:.2em;text-transform:uppercase;color:var(--verde-claro);
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
  background:rgba(10,18,16,.7);border:1px solid rgba(167,220,174,.18);
  color:#e8f0ea;font:inherit;font-size:14.5px;
}
input:focus{outline:none;border-color:var(--verde);box-shadow:0 0 0 3px rgba(79,157,99,.24)}
button{
  width:100%;margin-top:20px;padding:15px;border:0;border-radius:11px;
  background:linear-gradient(135deg,var(--verde-osc),var(--verde));
  color:#06170e;font:inherit;font-weight:700;font-size:14.5px;cursor:pointer;transition:filter .2s;
}
button:hover{filter:brightness(1.12)}
.err{
  margin-top:16px;padding:12px 15px;border-radius:10px;font-size:13.5px;
  background:rgba(255,120,120,.12);border:1px solid rgba(255,120,120,.32);color:#ffc2c2;
}
.pie{
  margin-top:26px;padding-top:20px;border-top:1px solid rgba(167,220,174,.12);
  text-align:center;color:var(--gris);font-size:12px;
}
.pie b{color:var(--hielo);font-weight:600}
</style>
</head>
<body>
<div class="caja">
  <div class="sello">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M16 7h.01M3.4 18a10 10 0 0 1 8.3-15.9 1 1 0 0 1 .8 1.7l-1.3 1.3 3.3 3.3a1 1 0 0 0 .7.3H21a1 1 0 0 1 .8 1.6l-2.5 3.2a10 10 0 0 1-8.1 4.1"/>
      <path d="M3.4 18h8.3"/>
    </svg>
  </div>
  <p class="eyebrow">Creative Web &middot; Propuesta</p>
  <h1>Sitio web nuevo para Parque Cóndor</h1>
  <p class="sub">Fundación Parque Cóndor &middot; agosto de 2026</p>
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
