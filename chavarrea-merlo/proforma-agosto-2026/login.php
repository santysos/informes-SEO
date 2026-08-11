<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Contadoras-2026') {
        $_SESSION['auth_contadoras_proforma'] = true;
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
<title>Propuesta de página web — Magui Chavarrea &amp; Leticia Merlo</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body {
    background: radial-gradient(circle at 30% 15%, #16324f 0%, #0a1828 60%);
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
}
.glass { background: rgba(19, 38, 58, 0.75); backdrop-filter: blur(24px); border: 1px solid rgba(212, 175, 55, 0.25); }
.glow { box-shadow: 0 0 90px rgba(212, 175, 55, 0.12); }
input:focus { outline: none; border-color: #d4af37; box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.22); }
.brand-grad { background: linear-gradient(135deg, #b8952e 0%, #e9c95c 100%); }
</style>
</head>
<body>
<div class="w-full max-w-md px-6">
    <div class="glass glow rounded-2xl p-10">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl brand-grad mb-5">
                <svg class="w-8 h-8 text-[#0a1828]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            </div>
            <p class="text-[#e9c95c] text-xs font-bold uppercase tracking-widest mb-1">Creative Web &middot; Propuesta</p>
            <h1 class="text-xl font-bold text-white">Su página web para llegar a todo el Ecuador</h1>
            <p class="text-slate-300 text-sm font-medium mt-1">Magui Chavarrea &amp; Leticia Merlo</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-widest mb-2">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-[#0a1828]/70 border border-[#d4af37]/25 text-white placeholder-slate-500 text-sm">
            </div>
            <?php if ($error): ?>
            <div class="text-red-300 text-sm bg-red-500/15 border border-red-500/30 rounded-lg px-4 py-3"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <button type="submit" class="w-full py-3 rounded-xl brand-grad text-[#0a1828] font-bold text-sm hover:opacity-90 transition">Ver la propuesta</button>
        </form>
        <div class="mt-6 text-center text-slate-400 text-xs">Confidencial &middot; Solo para ustedes dos</div>
        <div class="mt-4 pt-4 border-t border-[#d4af37]/15 text-center text-slate-400 text-xs">Preparado por <span class="text-[#e9c95c] font-semibold">Creative Web</span></div>
    </div>
</div>
</body>
</html>
