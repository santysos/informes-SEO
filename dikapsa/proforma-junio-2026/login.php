<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Dikapsa-2026') {
        $_SESSION['auth_dikapsa_proforma'] = true;
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
<title>Propuesta SEO 2026 — Dikapsa</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body {
    background: linear-gradient(135deg, #0a1929 0%, #0f172a 100%);
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
}
.glass { background: rgba(15, 35, 55, 0.7); backdrop-filter: blur(24px); border: 1px solid rgba(75, 170, 227, 0.18); }
.glow { box-shadow: 0 0 80px rgba(0, 135, 204, 0.18); }
input:focus { outline: none; border-color: #4baae3; box-shadow: 0 0 0 3px rgba(75, 170, 227, 0.2); }
.brand-grad { background: linear-gradient(135deg, #0087cc 0%, #4baae3 100%); }
</style>
</head>
<body>
<div class="w-full max-w-md px-6">
    <div class="glass glow rounded-2xl p-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl brand-grad mb-5">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <p class="text-cyan-300 text-xs font-bold uppercase tracking-widest mb-1">Creative Web · SEO</p>
            <h1 class="text-xl font-bold text-white">Propuesta 6 meses</h1>
            <p class="text-cyan-100/70 text-sm font-medium mt-1">Dikapsa — Quito / Otavalo</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-cyan-200/80 uppercase tracking-widest mb-2">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-900/60 border border-cyan-400/20 text-white placeholder-slate-500 text-sm">
            </div>
            <?php if ($error): ?>
            <div class="text-red-300 text-sm bg-red-500/15 border border-red-500/30 rounded-lg px-4 py-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <button type="submit" class="w-full py-3 rounded-xl brand-grad text-white font-bold text-sm hover:opacity-90 transition">Acceder a la propuesta</button>
        </form>
        <div class="mt-6 text-center text-slate-400 text-xs">Confidencial · Solo Dikapsa</div>
        <div class="mt-4 pt-4 border-t border-cyan-400/15 text-center text-slate-500 text-xs">Desarrollado por <span class="text-cyan-300 font-semibold">Creative Web</span></div>
    </div>
</div>
</body>
</html>
