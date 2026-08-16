<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Quimera-2026') {
        $_SESSION['auth_quimera_b2b'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Clave incorrecta. Intenta nuevamente.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Propuesta Ventas por Mayor &mdash; Quimera Clothing</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body {
    background: radial-gradient(circle at 28% 18%, #123a33 0%, #0a1c19 58%);
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
}
.glass { background: rgba(14, 38, 34, .72); backdrop-filter: blur(24px); border: 1px solid rgba(98,171,157,.28); }
.glow { box-shadow: 0 0 90px rgba(98,171,157,.16); }
input:focus { outline: none; border-color: #62ab9d; box-shadow: 0 0 0 3px rgba(98,171,157,.25); }
.brand-grad { background: linear-gradient(135deg, #5DA08C 0%, #87CDB9 100%); }
</style>
</head>
<body>
<div class="w-full max-w-md px-6">
    <div class="glass glow rounded-2xl p-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl brand-grad mb-5">
                <svg class="w-8 h-8 text-[#0a1c19]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </div>
            <p class="text-[#87CDB9] text-xs font-bold uppercase tracking-widest mb-1">Creative Web &middot; Propuesta</p>
            <h1 class="text-xl font-bold text-white">Ventas por mayor B2B</h1>
            <p class="text-slate-300 text-sm font-medium mt-1">Quimera Clothing</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-widest mb-2">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingresa tu clave" required autofocus
                    class="w-full px-4 py-3 rounded-xl bg-[#0a1c19]/70 border border-[#62ab9d]/25 text-white placeholder-slate-500 text-sm">
            </div>
            <?php if ($error): ?>
            <div class="text-red-300 text-sm bg-red-500/15 border border-red-500/30 rounded-lg px-4 py-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <button type="submit" class="w-full py-3 rounded-xl brand-grad text-[#0a1c19] font-bold text-sm hover:opacity-90 transition">Ver la propuesta</button>
        </form>
        <div class="mt-6 text-center text-slate-400 text-xs">Documento confidencial</div>
        <div class="mt-4 pt-4 border-t border-[#62ab9d]/15 text-center text-slate-400 text-xs">
            Preparado por <span class="text-[#87CDB9] font-semibold">Creative Web</span>
        </div>
    </div>
</div>
</body>
</html>
