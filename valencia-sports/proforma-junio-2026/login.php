<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Valencia-2026') {
        $_SESSION['auth_valencia_proforma'] = true;
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
<title>Propuesta E-commerce — Valencia Sports</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body {
    background: radial-gradient(circle at 30% 20%, #14532d 0%, #0a0e1a 50%);
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
}
.glass { background: rgba(20, 35, 25, 0.7); backdrop-filter: blur(24px); border: 1px solid rgba(163, 230, 53, 0.18); }
.glow { box-shadow: 0 0 80px rgba(163, 230, 53, 0.15); }
input:focus { outline: none; border-color: #a3e635; box-shadow: 0 0 0 3px rgba(163, 230, 53, 0.2); }
.brand-grad { background: linear-gradient(135deg, #84cc16 0%, #a3e635 100%); }
</style>
</head>
<body>
<div class="w-full max-w-md px-6">
    <div class="glass glow rounded-2xl p-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl brand-grad mb-5">
                <svg class="w-8 h-8 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
            <p class="text-lime-300 text-xs font-bold uppercase tracking-widest mb-1">Creative Web · E-commerce</p>
            <h1 class="text-xl font-bold text-white">Propuesta de tienda online</h1>
            <p class="text-lime-100/70 text-sm font-medium mt-1">Valencia Sports — Otavalo</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-lime-200/80 uppercase tracking-widest mb-2">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-900/60 border border-lime-400/20 text-white placeholder-slate-500 text-sm">
            </div>
            <?php if ($error): ?>
            <div class="text-red-300 text-sm bg-red-500/15 border border-red-500/30 rounded-lg px-4 py-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <button type="submit" class="w-full py-3 rounded-xl brand-grad text-slate-900 font-bold text-sm hover:opacity-90 transition">Acceder a la propuesta</button>
        </form>
        <div class="mt-6 text-center text-slate-400 text-xs">Confidencial · Solo Valencia Sports</div>
        <div class="mt-4 pt-4 border-t border-lime-400/15 text-center text-slate-500 text-xs">Desarrollado por <span class="text-lime-300 font-semibold">Creative Web</span></div>
    </div>
</div>
</body>
</html>
