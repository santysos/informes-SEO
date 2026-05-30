<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'IntagTrail-2026') {
        $_SESSION['auth_intag_trail_proforma'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = 'Clave incorrecta. Intente nuevamente.';
    }
}
?>
<!DOCTYPE html>
<html lang="es-EC">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Propuesta · Arriendo de Plataforma · Intag Trail 2026</title>
<meta name="robots" content="noindex, nofollow">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&family=Anton&display=swap" rel="stylesheet">
<style>
    :root {
      --bg-base: #0F1B16;
      --emerald-400: #34D399;
      --emerald-500: #10B981;
      --gold-400: #D4A332;
      --fg: #FAFAFA;
    }
    * { font-family: 'Inter', sans-serif; }
    .font-display { font-family: 'Outfit', sans-serif; letter-spacing: -0.02em; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }
    .font-trail { font-family: 'Anton', sans-serif; }
    body {
        background: var(--bg-base);
        background-image:
          radial-gradient(900px 600px at 80% -10%, rgba(212,163,50,0.08), transparent 60%),
          radial-gradient(700px 500px at 10% 110%, rgba(16,185,129,0.10), transparent 55%);
        min-height: 100vh;
        display: flex; align-items: center; justify-content: center;
        color: var(--fg);
    }
    .glass-card {
        background: rgba(255,255,255,0.04);
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(255,255,255,0.10);
        box-shadow: 0 0 80px rgba(212,163,50,0.12), 0 24px 60px rgba(0,0,0,0.5);
    }
    input:focus {
        outline: none;
        border-color: var(--gold-400);
        box-shadow: 0 0 0 3px rgba(212,163,50,0.25);
    }
    .grid-bg {
        position: fixed; inset: 0;
        background-image:
            repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(255,255,255,0.03) 39px, rgba(255,255,255,0.03) 40px),
            repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(255,255,255,0.03) 39px, rgba(255,255,255,0.03) 40px);
        pointer-events: none;
    }
</style>
</head>
<body>
<div class="grid-bg"></div>

<div class="relative z-10 w-full max-w-md px-6">
    <div class="glass-card rounded-2xl p-8 md:p-10">
        <div class="text-center mb-8">
            <p class="font-mono text-xs uppercase tracking-widest text-yellow-400 mb-2">— Imbabura · Ecuador · Trail Running</p>
            <h1 class="font-trail text-3xl uppercase mb-2">
                <span class="text-yellow-500">INTAG</span> <span class="text-stone-100">TRAIL</span>
            </h1>
            <p class="text-slate-400 text-sm font-medium mt-3">Propuesta · Arriendo de Plataforma de Inscripciones</p>
        </div>

        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 font-mono">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/60 border border-slate-600/50 text-white placeholder-slate-500 text-sm transition-all duration-200">
            </div>

            <?php if ($error): ?>
            <div class="flex items-center gap-2 text-red-400 text-sm bg-red-500/10 border border-red-500/20 rounded-lg px-4 py-3">
                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <button type="submit"
                class="w-full py-3 rounded-xl text-stone-900 font-semibold text-sm uppercase tracking-widest font-trail transition-all duration-200"
                style="background:linear-gradient(135deg,#D4A332,#B08925);">
                Acceder a la Propuesta
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-slate-700/50 text-center">
            <p class="text-slate-500 text-xs">Elaborado por <span class="text-slate-400 font-medium">Creative Web</span></p>
        </div>
    </div>
</div>
</body>
</html>
