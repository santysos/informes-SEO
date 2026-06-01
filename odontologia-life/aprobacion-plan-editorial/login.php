<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'LifeDental-2026') {
        $_SESSION['auth_olife_plan'] = true;
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
<title>Plan editorial 2026 — Odontología Life</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
* { font-family: 'Inter', sans-serif; }
body {
    background: linear-gradient(135deg, #042f2e 0%, #0f172a 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.glass {
    background: rgba(20, 83, 76, 0.5);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(45, 212, 191, 0.15);
}
.glow {
    box-shadow: 0 0 80px rgba(45, 212, 191, 0.15);
}
input:focus { outline: none; border-color: #2dd4bf; box-shadow: 0 0 0 3px rgba(45, 212, 191, 0.2); }
</style>
</head>
<body>
<div class="relative z-10 w-full max-w-md px-6">
    <div class="glass glow rounded-2xl p-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-teal-500/15 border border-teal-400/30 mb-5">
                <svg class="w-8 h-8 text-teal-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h1 class="text-xl font-bold text-white mb-1">Plan editorial 2026</h1>
            <p class="text-teal-200/80 text-sm font-medium">Odontología Life — Aprobación del Dr.</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-teal-200/80 uppercase tracking-wider mb-2">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-900/60 border border-teal-400/20 text-white placeholder-slate-500 text-sm">
            </div>
            <?php if ($error): ?>
            <div class="text-red-300 text-sm bg-red-500/15 border border-red-500/30 rounded-lg px-4 py-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <button type="submit" class="w-full py-3 rounded-xl bg-teal-500 hover:bg-teal-400 text-slate-900 font-bold text-sm transition">Acceder al plan</button>
        </form>
        <div class="mt-6 text-center text-slate-400 text-xs">Confidencial · Solo Odontología Life</div>
        <div class="mt-4 pt-4 border-t border-teal-400/20 text-center text-slate-500 text-xs">Desarrollado por <span class="text-teal-300 font-semibold">Creative Web</span></div>
    </div>
</div>
</body>
</html>
