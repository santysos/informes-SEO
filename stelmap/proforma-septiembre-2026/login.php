<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Stelmap-2026') {
        $_SESSION['auth_stelmap_proforma'] = true;
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Proforma STELMAP S.A.S. &middot; Creative Web</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  body { font-family: 'Outfit', system-ui, sans-serif; }
  .glass { background: rgba(255,255,255,.06); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,.10); }
</style>
</head>
<body class="min-h-screen bg-[#0b1626] text-slate-100 flex items-center justify-center px-5">

  <div class="w-full max-w-md">

    <div class="flex justify-center mb-8">
      <img src="/informes/assets/creativeweb-blanco.png" alt="Creative Web" class="h-10">
    </div>

    <div class="glass rounded-2xl p-8">
      <p class="text-xs uppercase tracking-[.2em] text-sky-400 font-semibold mb-2">Proforma 1-2-1327</p>
      <h1 class="text-2xl font-semibold mb-1">STELMAP S.A.S.</h1>
      <p class="text-slate-400 text-sm mb-7">Alojamiento web y correos corporativos</p>

      <form method="post" class="space-y-4">
        <div>
          <label for="password" class="block text-sm text-slate-300 mb-2">Clave de acceso</label>
          <input type="password" name="password" id="password" autofocus required
                 class="w-full rounded-lg bg-white/5 border border-white/15 px-4 py-3 text-slate-100
                        placeholder-slate-500 focus:outline-none focus:border-sky-400 focus:ring-1 focus:ring-sky-400"
                 placeholder="Ingrese la clave">
        </div>

        <?php if ($error): ?>
          <p class="text-sm text-rose-400"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <button type="submit"
                class="w-full rounded-lg bg-sky-500 hover:bg-sky-400 transition-colors
                       text-white font-semibold py-3">Ver la proforma</button>
      </form>
    </div>

    <p class="text-center text-slate-500 text-xs mt-6">
      &iquest;No tiene la clave? Escr&iacute;banos al 099 917 4980
    </p>

  </div>

</body>
</html>
