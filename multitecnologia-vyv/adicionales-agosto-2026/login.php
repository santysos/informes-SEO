<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'VYV-2026') {
        $_SESSION['auth_vyv'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Clave incorrecta. Intenta nuevamente.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Trabajos adicionales &mdash; Multitecnolog&iacute;a VYV</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
:root{
  --noche:#0a0f1a; --carbon:#131c2e; --rojo:#e94560; --rojo-osc:#c81e43;
  --hueso:#eef2f8; --niebla:#94a3b8; --linea:rgba(255,255,255,.10);
}
*{box-sizing:border-box;margin:0;padding:0}
body{
  font-family:'Sora',system-ui,sans-serif;
  background:
    radial-gradient(900px 600px at 25% 8%, rgba(233,69,96,.14), transparent 60%),
    radial-gradient(700px 500px at 90% 100%, rgba(56,110,201,.10), transparent 55%),
    var(--noche);
  color:var(--hueso);
  min-height:100vh; display:flex; align-items:center; justify-content:center; padding:24px;
}
.caja{
  width:100%; max-width:400px; background:rgba(19,28,46,.72);
  border:1px solid var(--linea); border-radius:20px; padding:38px 32px;
  backdrop-filter:blur(14px); box-shadow:0 30px 80px rgba(0,0,0,.45); text-align:center;
}
.ico{width:54px;height:54px;margin:0 auto 18px;border-radius:14px;
  background:linear-gradient(135deg,var(--rojo),var(--rojo-osc));
  display:flex;align-items:center;justify-content:center;font-size:26px}
h1{font-size:20px;font-weight:700;margin-bottom:4px}
p.sub{color:var(--niebla);font-size:13.5px;margin-bottom:24px}
label{display:block;text-align:left;font-size:12px;color:var(--niebla);
  text-transform:uppercase;letter-spacing:.12em;margin-bottom:8px}
input[type=password]{width:100%;padding:13px 15px;border-radius:11px;
  border:1px solid var(--linea);background:rgba(0,0,0,.25);color:var(--hueso);
  font-family:'JetBrains Mono',monospace;font-size:15px;margin-bottom:16px}
input[type=password]:focus{outline:none;border-color:var(--rojo)}
button{width:100%;padding:13px;border:none;border-radius:11px;cursor:pointer;
  background:linear-gradient(135deg,var(--rojo),var(--rojo-osc));color:#fff;
  font-family:'Sora',sans-serif;font-weight:700;font-size:15px}
button:hover{filter:brightness(1.07)}
.err{background:rgba(240,90,90,.15);border:1px solid rgba(240,90,90,.4);
  color:#ffb4b4;font-size:13px;padding:10px;border-radius:10px;margin-bottom:16px}
.pie{margin-top:22px;color:var(--niebla);font-size:11.5px}
</style>
</head>
<body>
<div class="caja">
  <div class="ico">&#9889;</div>
  <h1>Multitecnolog&iacute;a VYV</h1>
  <p class="sub">Trabajos adicionales &mdash; acceso privado</p>
  <?php if ($error): ?><div class="err"><?= htmlspecialchars($error) ?></div><?php endif; ?>
  <form method="POST">
    <label for="password">Clave de acceso</label>
    <input type="password" id="password" name="password" autofocus required>
    <button type="submit">Ver documento</button>
  </form>
  <div class="pie">Creative Web &middot; Desarrollo y mantenimiento web</div>
</div>
</body>
</html>
