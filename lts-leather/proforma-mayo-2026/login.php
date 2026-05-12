<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'LTS-Vanhove-2026') {
        $_SESSION['auth_lts'] = true;
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
<title>Proforma · Leather in the Skin</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Inter', sans-serif; background: #0a0a0a; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
    .font-display { font-family: 'Playfair Display', serif; }
    .glass-leather {
        background: linear-gradient(135deg, rgba(168,112,71,0.18), rgba(82,51,33,0.10));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(212,179,147,0.25);
    }
    .leather-gradient { background: linear-gradient(135deg, #1f140d 0%, #3a2418 50%, #523321 100%); }
    .gold-text {
        background: linear-gradient(135deg, #d4b393 0%, #bf906a 50%, #a87047 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .bg-pattern {
        position: fixed; inset: 0;
        background-image:
            radial-gradient(circle at 20% 30%, rgba(168,112,71,0.20) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(110,69,41,0.15) 0%, transparent 50%);
        pointer-events: none;
    }
    input:focus {
        outline: none;
        border-color: #d4b393;
        box-shadow: 0 0 0 3px rgba(212,179,147,0.25);
    }
</style>
</head>
<body>
<div class="bg-pattern"></div>
<div class="relative z-10 w-full max-w-md px-6">
    <div class="glass-leather rounded-3xl p-8 md:p-10 shadow-2xl">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl leather-gradient border border-leather-300/30 mb-5">
                <span class="font-display font-black text-2xl gold-text">LTS</span>
            </div>
            <h1 class="font-display text-2xl font-black text-white mb-2">Leather in the Skin</h1>
            <p class="text-leather-300 text-xs uppercase tracking-widest" style="color:#d4b393">Proforma · Devis</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-white/60 uppercase tracking-wider mb-2">Clave de acceso · Code d'accès</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-black/50 border border-white/15 text-white placeholder-white/40 text-sm transition-all">
            </div>
            <?php if ($error): ?>
            <div class="flex items-center gap-2 text-red-300 text-sm bg-red-500/10 border border-red-500/30 rounded-lg px-4 py-3">
                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>
            <button type="submit"
                class="w-full py-3 rounded-xl leather-gradient text-white font-bold text-sm transition hover:opacity-90 hover:shadow-lg hover:shadow-leather-700/40 border border-leather-400/30">
                Acceder a la propuesta
            </button>
        </form>
        <div class="mt-8 pt-6 border-t border-white/10 text-center">
            <p class="text-white/40 text-xs">Desarrollado por <span class="font-semibold" style="color:#d4b393">Creative Web</span></p>
            <p class="text-white/30 text-[10px] mt-1">creativeweb.com.ec · info@creativeweb.com.ec</p>
        </div>
    </div>
</div>
</body>
</html>
