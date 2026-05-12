<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Jhosly-2026') {
        $_SESSION['auth_jhosly'] = true;
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
<title>Proforma · Jhosly</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Inter', sans-serif; background: #0a0a0a; min-height: 100vh; display: flex; align-items: center; justify-content: center; }
    .font-display { font-family: 'Playfair Display', serif; }
    .glass-rose {
        background: linear-gradient(135deg, rgba(246,51,102,0.15), rgba(159,15,64,0.08));
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255,155,177,0.25);
    }
    .rose-gradient { background: linear-gradient(135deg, #4d031c 0%, #86113c 50%, #bf0e47 100%); }
    .rose-text {
        background: linear-gradient(135deg, #ffc4d2 0%, #ff6087 50%, #f63366 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .bg-pattern {
        position: fixed; inset: 0;
        background-image:
            radial-gradient(circle at 20% 30%, rgba(246,51,102,0.20) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(159,15,64,0.15) 0%, transparent 50%);
        pointer-events: none;
    }
    input:focus {
        outline: none;
        border-color: #f63366;
        box-shadow: 0 0 0 3px rgba(246,51,102,0.25);
    }
</style>
</head>
<body>
<div class="bg-pattern"></div>
<div class="relative z-10 w-full max-w-md px-6">
    <div class="glass-rose rounded-3xl p-8 md:p-10 shadow-2xl">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl rose-gradient border border-rose_brand-300/30 mb-5">
                <span class="font-display font-black text-3xl rose-text">J</span>
            </div>
            <h1 class="font-display text-2xl font-black text-white mb-2">Jhosly</h1>
            <p class="text-xs uppercase tracking-widest" style="color:#ffc4d2">Proforma comercial</p>
        </div>
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-white/60 uppercase tracking-wider mb-2">Clave de acceso</label>
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
                class="w-full py-3 rounded-xl rose-gradient text-white font-bold text-sm transition hover:opacity-90 hover:shadow-lg hover:shadow-rose_brand-700/40 border border-rose_brand-400/30">
                Acceder a la propuesta
            </button>
        </form>
        <div class="mt-8 pt-6 border-t border-white/10 text-center">
            <p class="text-white/40 text-xs">Desarrollado por <span class="font-semibold" style="color:#ffc4d2">Creative Web</span></p>
            <p class="text-white/30 text-[10px] mt-1">creativeweb.com.ec · info@creativeweb.com.ec</p>
        </div>
    </div>
</div>
</body>
</html>
