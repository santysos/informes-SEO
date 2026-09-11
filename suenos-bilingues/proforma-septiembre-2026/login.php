<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Suenos-2026') {
        $_SESSION['auth_suenos'] = true;
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
<title>Propuesta &middot; Sueños Bilingües</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Poppins',system-ui,sans-serif;background:#f4fafb;color:#263485;
       min-height:100vh;display:grid;place-items:center;padding:24px}
  .caja{width:100%;max-width:420px;background:#fff;border-radius:14px;padding:38px 34px;
        box-shadow:0 10px 40px rgba(38,52,133,.10);border:1px solid #dceef0}
  .logo{display:block;height:42px;margin:0 auto 26px}
  .et{font-family:'Lexend',sans-serif;font-size:11px;letter-spacing:.18em;text-transform:uppercase;
      color:#3aa7ae;margin-bottom:8px;text-align:center}
  h1{font-family:'Lexend',sans-serif;font-size:1.45rem;text-align:center;margin-bottom:6px;line-height:1.2}
  .sub{text-align:center;color:#6b7aa8;font-size:.9rem;margin-bottom:26px}
  label{display:block;font-size:.85rem;color:#4a5a92;margin-bottom:7px}
  input{width:100%;padding:13px 15px;border:1px solid #cfe3e6;border-radius:9px;
        font-family:inherit;font-size:1rem;color:#263485;background:#fbfeff}
  input:focus{outline:none;border-color:#88ccd0;box-shadow:0 0 0 3px rgba(136,204,208,.28)}
  button{width:100%;margin-top:16px;padding:13px;border:0;border-radius:9px;background:#263485;
         color:#fff;font-family:'Lexend',sans-serif;font-size:.98rem;font-weight:600;cursor:pointer;
         transition:background .15s}
  button:hover{background:#1b2668}
  .err{margin-top:14px;color:#c0392b;font-size:.86rem;text-align:center}
  .pie{text-align:center;margin-top:22px;font-size:.78rem;color:#93a1c4}
</style>
</head>
<body>
  <div class="caja">
    <img class="logo" src="/informes/assets/creativeweb-iso.png" alt="Creative Web">
    <p class="et">Proforma 1-2-1329</p>
    <h1>Sueños Bilingües</h1>
    <p class="sub">Sistema de matrícula y agenda de clases</p>
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
