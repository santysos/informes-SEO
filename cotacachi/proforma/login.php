<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'Cotacachi-2026') {
        $_SESSION['auth_cotacachi_proforma'] = true;
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
<title>Propuesta — Plataforma de Inscripciones · Municipio de Cotacachi</title>
<meta name="robots" content="noindex, nofollow">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
<style>
    :root {
      --bg-deep: #0A1410;
      --bg-base: #0F1B16;
      --bg-elevated: #1A2620;
      --bg-panel: #243430;
      --emerald-400: #34D399;
      --emerald-500: #10B981;
      --emerald-600: #059669;
      --emerald-deep: #064E3B;
      --amber-400: #FBBF24;
      --fg: #FAFAFA;
      --fg-mut: #9CA3AF;
    }
    * { font-family: 'Inter', sans-serif; }
    .font-display { font-family: 'Outfit', sans-serif; letter-spacing: -0.02em; }
    .font-mono { font-family: 'JetBrains Mono', monospace; }
    body {
        background: var(--bg-base);
        background-image:
          radial-gradient(900px 600px at 80% -10%, rgba(16,185,129,0.10), transparent 60%),
          radial-gradient(700px 500px at 10% 110%, rgba(6,78,59,0.20), transparent 55%);
        min-height: 100vh;
        display: flex; align-items: center; justify-content: center;
        color: var(--fg);
    }
    .glass-card {
        background: rgba(255,255,255,0.04);
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(255,255,255,0.10);
        box-shadow: 0 0 80px rgba(16,185,129,0.10), 0 24px 60px rgba(0,0,0,0.5);
    }
    input:focus {
        outline: none;
        border-color: var(--emerald-400);
        box-shadow: 0 0 0 3px rgba(52,211,153,0.25);
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
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-5"
                 style="background:linear-gradient(135deg,#10B981,#064E3B); box-shadow:0 0 30px rgba(52,211,153,0.4);">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                </svg>
            </div>
            <p class="font-mono text-xs uppercase tracking-widest text-emerald-400 mb-2">Propuesta confidencial</p>
            <h1 class="font-display text-2xl font-bold text-white mb-1 leading-tight">Plataforma de Inscripciones<br>Deportivas</h1>
            <p class="text-slate-400 text-sm font-medium">Municipio de Cotacachi · 2026</p>
        </div>

        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2 font-mono">Clave de acceso</label>
                <input type="password" name="password" placeholder="Ingrese su clave" required
                    class="w-full px-4 py-3 rounded-xl bg-slate-800/60 border border-slate-600/50 text-white placeholder-slate-500 text-sm transition-all duration-200">
            </div>

            <?php if ($error): ?>
            <div class="flex items-center gap-2 text-red-400 text-sm bg-red-500/10 border border-red-500/20 rounded-lg px-4 py-3">
                <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <button type="submit"
                class="w-full py-3 rounded-xl text-white font-semibold text-sm transition-all duration-200"
                style="background:linear-gradient(135deg,#10B981,#059669); box-shadow:0 4px 20px rgba(52,211,153,0.3);"
                onmouseover="this.style.boxShadow='0 8px 30px rgba(52,211,153,0.5)'"
                onmouseout="this.style.boxShadow='0 4px 20px rgba(52,211,153,0.3)'">
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
