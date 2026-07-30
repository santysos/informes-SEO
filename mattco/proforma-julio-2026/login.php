<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Mattco-2026') {
        $_SESSION['auth_mattco_proforma'] = true;
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
<title>Sistema de control de combustible — Mattco</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body {
    background: radial-gradient(circle at 30% 15%, #2e2e33 0%, #121214 60%);
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
}
.glass { background: rgba(30, 30, 34, 0.72); backdrop-filter: blur(24px); border: 1px solid rgba(232, 35, 46, 0.22); }
.glow { box-shadow: 0 0 90px rgba(232, 35, 46, 0.16); }
input:focus { outline: none; border-color: #e8232e; box-shadow: 0 0 0 3px rgba(232, 35, 46, 0.22); }
.brand-grad { background: linear-gradient(135deg, #b8121c 0%, #ff4f58 100%); }
</style>
</head>
<body>
<div class="w-full max-w-md px-6">
    <div class="glass glow rounded-2xl p-10">
        <div class="text-center mb-8">
            <img src="assets/logo-mattco.png" alt="Mattco" class="h-12 mx-auto mb-6">
            <p class="text-red-400 text-xs font-bold uppercase tracking-widest mb-1">Creative Web &middot; Propuesta</p>
            <h1 class="text-xl font-bold text-white">Sistema de control de combustible, peajes y viajes</h1>
            <p class="text-neutral-400 text-sm font-medium mt-1">Mattco &mdash; Otavalo</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-neutral-400 uppercase tracking-widest mb-2">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-neutral-900/70 border border-red-500/20 text-white placeholder-neutral-600 text-sm">
            </div>
            <?php if ($error): ?>
            <div class="text-red-300 text-sm bg-red-500/15 border border-red-500/30 rounded-lg px-4 py-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <button type="submit" class="w-full py-3 rounded-xl brand-grad text-white font-bold text-sm hover:opacity-90 transition">Acceder a la propuesta</button>
        </form>
        <div class="mt-6 text-center text-neutral-500 text-xs">Confidencial &middot; Solo Mattco</div>
        <div class="mt-4 pt-4 border-t border-red-500/15 text-center text-neutral-500 text-xs">Desarrollado por <span class="text-red-400 font-semibold">Creative Web</span></div>
    </div>
</div>
</body>
</html>
