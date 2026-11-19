<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (($_POST['password'] ?? '') === 'Pauta-2026') {
        $_SESSION['auth_pauta_nov2026'] = true;
        header('Location: index.php');
        exit;
    }
    $error = 'Clave incorrecta. Intenta nuevamente.';
}
?>
<!DOCTYPE html>
<html lang="es-EC"><head><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Informe de pauta · Jomar · Noviembre 2026</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
*{font-family:'Inter',sans-serif} .font-display{font-family:'Outfit',sans-serif;letter-spacing:-.02em} .font-mono,.num{font-family:'JetBrains Mono',monospace}
body{background:#0b1016;background-image:radial-gradient(900px 600px at 85% -10%,rgba(59,130,246,.10),transparent 60%),radial-gradient(700px 500px at 0% 100%,rgba(52,211,153,.07),transparent 55%);color:#e5e7eb}
.card{background:rgba(255,255,255,.035);border:1px solid rgba(255,255,255,.08)}
.num{font-size:1.05rem;font-weight:600;color:#fff} .lbl{font-size:.7rem;color:#94a3b8;margin-top:2px;line-height:1.2}
html{scroll-behavior:smooth} section{scroll-margin-top:78px} .nav a.on{color:#fff;background:rgba(59,130,246,.18)}
@media (max-width:640px){.num{font-size:.9rem}}
</style></head>
<body class="min-h-screen flex items-center justify-center px-6">
<div class="card w-full max-w-md rounded-2xl p-8 md:p-10">
  <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" style="height:34px;width:auto;display:block;margin:0 auto 22px">
  <p class="font-mono text-xs uppercase tracking-widest text-sky-400 text-center mb-2">Informe confidencial</p>
  <h1 class="font-display text-2xl font-bold text-white text-center mb-1">Cómo invertir mejor la pauta en Meta</h1>
  <p class="text-slate-400 text-sm text-center mb-8">Jomar · Noviembre 2026</p>
  <form method="POST" class="space-y-4">
    <input type="password" name="password" placeholder="Clave de acceso" required autofocus
      class="w-full rounded-xl bg-slate-900/70 border border-slate-700 px-4 py-3 text-white focus:outline-none focus:border-sky-400">
    <?php if ($error): ?><p class="text-red-400 text-sm"><?= htmlspecialchars($error) ?></p><?php endif; ?>
    <button class="w-full rounded-xl bg-sky-500 hover:bg-sky-400 text-white font-semibold py-3 transition">Entrar</button>
  </form>
</div>
</body></html>
