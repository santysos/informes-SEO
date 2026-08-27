<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Vaslink-2026') {
        $_SESSION['auth_vaslink'] = true;
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
<title>Propuesta Propuesta &mdash; Dimapar Ecuadormdash; Vaslink</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
<style>
:root{
  --cyan:#06b6d4; --cyan-osc:#0891b2; --cyan-claro:#67e8f9;
  --noche:#0a0f16; --carbon:#111a24; --gris:#7d8fa3; --hielo:#cbd5e1;
}
*{box-sizing:border-box;margin:0;padding:0}
body{
  font-family:'Outfit',system-ui,sans-serif;
  background:radial-gradient(950px 640px at 28% 10%, rgba(6,182,212,.20), transparent 62%), var(--noche);
  color:#e8eef6; min-height:100vh;
  display:flex; align-items:center; justify-content:center; padding:24px;
}
.caja{
  width:100%; max-width:440px;
  background:rgba(17,26,36,.62); backdrop-filter:blur(22px);
  border:1px solid rgba(103,232,249,.16); border-radius:18px; padding:44px 38px;
  box-shadow:0 40px 90px rgba(0,0,0,.55);
}
.sello{
  width:60px;height:60px;margin:0 auto 20px;border-radius:16px;
  background:linear-gradient(135deg,var(--cyan-osc),var(--cyan));
  display:grid;place-items:center;
}
.sello svg{width:30px;height:30px;color:#03202b}
.eyebrow{
  font-family:'JetBrains Mono',monospace;font-size:10.5px;font-weight:700;
  letter-spacing:.2em;text-transform:uppercase;color:var(--cyan-claro);
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
  background:rgba(10,15,22,.7);border:1px solid rgba(103,232,249,.18);
  color:#e8eef6;font:inherit;font-size:14.5px;
}
input:focus{outline:none;border-color:var(--cyan);box-shadow:0 0 0 3px rgba(6,182,212,.22)}
button{
  width:100%;margin-top:20px;padding:15px;border:0;border-radius:11px;
  background:linear-gradient(135deg,var(--cyan-osc),var(--cyan));
  color:#03202b;font:inherit;font-weight:700;font-size:14.5px;cursor:pointer;transition:filter .2s;
}
button:hover{filter:brightness(1.12)}
.err{
  margin-top:16px;padding:12px 15px;border-radius:10px;font-size:13.5px;
  background:rgba(255,120,120,.12);border:1px solid rgba(255,120,120,.32);color:#ffc2c2;
}
.pie{
  margin-top:26px;padding-top:20px;border-top:1px solid rgba(103,232,249,.12);
  text-align:center;color:var(--gris);font-size:12px;
}
.pie b{color:var(--hielo);font-weight:600}
</style>
</head>
<body>
<div class="caja">
  <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" style="height:34px;width:auto;display:block;margin:0 auto 22px">
  <p class="eyebrow">Propuesta</p>
  <h1>Tienda en línea y facturación electrónica</h1>
  <p class="sub">Vaslink &middot; agosto de 2026</p>
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
