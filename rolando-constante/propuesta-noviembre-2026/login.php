<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'RolandoConstante-2026') {
        $_SESSION['auth_rolando_nov26'] = true;
        header('Location: index.php');
        exit;
    }
    $error = 'Clave incorrecta. Inténtelo nuevamente.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Propuesta web 2027 &middot; Rolando Constante</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Outfit',system-ui,sans-serif;background:#F7F4EE;color:#0E1A4A;min-height:100vh;display:grid;place-items:center;padding:24px}
  .caja{width:100%;max-width:400px;text-align:center}
  .logos{display:flex;align-items:center;justify-content:center;gap:18px;margin-bottom:34px}
  .logos img.cw{height:30px}
  .logos img.rc{height:18px}
  .logos span{width:1px;height:30px;background:#E4DCCD}
  .et{font-size:11px;letter-spacing:.22em;text-transform:uppercase;color:#B8892B;margin-bottom:12px;font-weight:500}
  h1{font-size:2.2rem;font-weight:300;letter-spacing:-.02em;line-height:1.1;margin-bottom:8px}
  .sub{color:#4A5378;font-size:.98rem;margin-bottom:34px;font-weight:300}
  form{text-align:left}
  label{display:block;font-size:.85rem;color:#4A5378;margin-bottom:8px}
  input{width:100%;padding:15px 18px;border:1px solid #E4DCCD;border-radius:999px;font-family:inherit;font-size:1rem;color:#0E1A4A;background:#fff}
  input:focus{outline:none;border-color:#B8892B;box-shadow:0 0 0 3px rgba(184,137,43,.18)}
  button{width:100%;margin-top:14px;padding:16px;border:0;border-radius:999px;background:#0E1A4A;color:#fff;font-family:inherit;font-size:1rem;font-weight:500;cursor:pointer}
  button:hover{background:#1B2C78}
  .err{margin-top:14px;color:#B42318;font-size:.88rem;text-align:center}
  .pie{margin-top:28px;font-size:.8rem;color:#4A5378}
</style>
</head>
<body>
  <div class="caja">
    <div class="logos">
      <img class="cw" src="/informes/assets/creativeweb-iso.png" alt="Creative Web">
      <span></span>
      <img class="rc" src="logo-constante.png" alt="Rolando Constante">
    </div>
    <p class="et">Proforma 1-2-1338</p>
    <h1>Rolando Constante</h1>
    <p class="sub">Diagnóstico y propuesta de la nueva web 2027</p>
    <form method="post">
      <label for="password">Clave de acceso</label>
      <input type="password" name="password" id="password" autofocus required placeholder="Ingrese la clave">
      <button type="submit">Ver la propuesta</button>
      <?php if ($error): ?><p class="err"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    </form>
    <p class="pie">¿No tiene la clave? Escríbanos al 099 917 4980</p>
  </div>
</body>
</html>
