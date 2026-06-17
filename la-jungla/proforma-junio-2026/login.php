<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'LaJungla-2026') {
        $_SESSION['auth_lajungla_proforma'] = true;
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
<title>Propuesta integral — La Jungla</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body {
    background: radial-gradient(circle at 30% 20%, #0c3d24 0%, #07140d 55%);
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
}
.glass { background: rgba(12, 30, 20, 0.7); backdrop-filter: blur(24px); border: 1px solid rgba(74, 222, 128, 0.18); }
.glow { box-shadow: 0 0 80px rgba(34, 197, 94, 0.18); }
input:focus { outline: none; border-color: #4ade80; box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.2); }
.brand-grad { background: linear-gradient(135deg, #15803d 0%, #4ade80 100%); }
</style>
</head>
<body>
<div class="w-full max-w-md px-6">
    <div class="glass glow rounded-2xl p-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl brand-grad mb-5">
                <svg class="w-8 h-8 text-emerald-950" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 21c4-1 7-4 9-8m0 0c2-4 5-7 9-8-1 6-4 11-9 13M12 13C9 11 6 10 3 11c1 4 4 7 8 8"/></svg>
            </div>
            <p class="text-emerald-300 text-xs font-bold uppercase tracking-widest mb-1">Creative Web · Propuesta</p>
            <h1 class="text-xl font-bold text-white">Tienda online · B2B/B2C · TikTok · SEO</h1>
            <p class="text-emerald-100/70 text-sm font-medium mt-1">La Jungla — Otavalo</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-emerald-200/80 uppercase tracking-widest mb-2">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-emerald-950/60 border border-emerald-400/20 text-white placeholder-emerald-700/60 text-sm">
            </div>
            <?php if ($error): ?>
            <div class="text-red-300 text-sm bg-red-500/15 border border-red-500/30 rounded-lg px-4 py-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <button type="submit" class="w-full py-3 rounded-xl brand-grad text-emerald-950 font-bold text-sm hover:opacity-90 transition">Acceder a la propuesta</button>
        </form>
        <div class="mt-6 text-center text-emerald-100/40 text-xs">Confidencial · Solo La Jungla</div>
        <div class="mt-4 pt-4 border-t border-emerald-400/15 text-center text-emerald-100/40 text-xs">Desarrollado por <span class="text-emerald-300 font-semibold">Creative Web</span></div>
    </div>
</div>
</body>
</html>
