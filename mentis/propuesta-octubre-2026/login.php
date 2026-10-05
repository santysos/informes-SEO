<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Mentis-2026') {
        $_SESSION['auth_mentis'] = true;
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
<title>Propuesta &middot; Mentis Psicología</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Inter',system-ui,sans-serif;background:#0d1626;color:#e8e1d4;
       min-height:100vh;display:grid;place-items:center;padding:24px;
       background-image:radial-gradient(circle at 20% 10%,rgba(30,74,150,.35),transparent 55%)}
  .caja{width:100%;max-width:420px;background:rgba(255,255,255,.04);border:1px solid rgba(232,225,212,.12);
        border-radius:16px;padding:38px 34px;backdrop-filter:blur(10px)}
  .logos{display:flex;align-items:center;justify-content:center;gap:16px;margin-bottom:24px}
  .logos img.cw{height:30px}
  .logos img.me{height:58px;border-radius:50%}
  .logos span{width:1px;height:34px;background:rgba(232,225,212,.2)}
  .et{font-family:'Outfit',sans-serif;font-size:11px;letter-spacing:.2em;text-transform:uppercase;
      color:#c9b48f;margin-bottom:8px;text-align:center}
  h1{font-family:'Outfit',sans-serif;font-size:1.5rem;text-align:center;margin-bottom:6px;color:#fff}
  .sub{text-align:center;color:#9aa6bd;font-size:.9rem;margin-bottom:26px}
  label{display:block;font-size:.85rem;color:#b9c2d4;margin-bottom:7px}
  input{width:100%;padding:13px 15px;border:1px solid rgba(232,225,212,.18);border-radius:10px;
        font-family:inherit;font-size:1rem;color:#fff;background:rgba(255,255,255,.05)}
  input:focus{outline:none;border-color:#4f7fd0;box-shadow:0 0 0 3px rgba(79,127,208,.25)}
  button{width:100%;margin-top:16px;padding:13px;border:0;border-radius:10px;background:#1e4a96;
         color:#fff;font-family:'Outfit',sans-serif;font-size:1rem;font-weight:600;cursor:pointer}
  button:hover{background:#25579f}
  .err{margin-top:14px;color:#f19a8e;font-size:.86rem;text-align:center}
  .pie{text-align:center;margin-top:22px;font-size:.78rem;color:#7d889e}
</style>
</head>
<body>
  <div class="caja">
    <div class="logos">
      <img class="cw" src="/informes/assets/creativeweb-blanco.png" alt="Creative Web">
      <span></span>
      <img class="me" src="logo-mentis.jpg" alt="Mentis Psicología">
    </div>
    <p class="et">Proformas 1-2-1333 y 1-2-1334</p>
    <h1>Mentis Psicología</h1>
    <p class="sub">Sistema para sus sedes y sitio web</p>
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
