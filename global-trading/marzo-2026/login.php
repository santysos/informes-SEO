<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = $_POST['password'] ?? '';
    if ($pass === 'GT-Salamea-2026') {
        $_SESSION['auth_gt'] = true;
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
<title>Informe SEO — Global Trading Asia</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    * { font-family: 'Inter', sans-serif; }
    body {
        background: #0f172a;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .glass-card {
        background: rgba(30, 41, 59, 0.7);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(148, 163, 184, 0.1);
    }
    .glow-ring {
        box-shadow: 0 0 80px rgba(59, 130, 246, 0.15), 0 0 160px rgba(59, 130, 246, 0.05);
    }
    input:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    }
    .bg-pattern {
        position: fixed;
        inset: 0;
        background-image:
            radial-gradient(circle at 20% 50%, rgba(59, 130, 246, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(14, 165, 233, 0.06) 0%, transparent 50%),
            radial-gradient(circle at 50% 80%, rgba(99, 102, 241, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }
    .grid-bg {
        position: fixed;
        inset: 0;
        background-image:
            repeating-linear-gradient(0deg, transparent, transparent 39px, rgba(148,163,184,0.03) 39px, rgba(148,163,184,0.03) 40px),
            repeating-linear-gradient(90deg, transparent, transparent 39px, rgba(148,163,184,0.03) 39px, rgba(148,163,184,0.03) 40px);
        pointer-events: none;
    }
</style>
</head>
<body>
<div class="bg-pattern"></div>
<div class="grid-bg"></div>

<div class="relative z-10 w-full max-w-md px-6">
    <div class="glass-card glow-ring rounded-2xl p-8 md:p-10">
        <!-- Logo / Brand -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-blue-500/10 border border-blue-500/20 mb-5">
                <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            <h1 class="text-xl font-bold text-white mb-1">Informe SEO & Estrategia de Contenidos</h1>
            <p class="text-slate-400 text-sm font-medium">Global Trading Asia</p>
        </div>

        <!-- Form -->
        <form method="POST" class="space-y-5">
            <div>
                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Clave de acceso</label>
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
                class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-500 text-white font-semibold text-sm transition-all duration-200 hover:shadow-lg hover:shadow-blue-500/25">
                Acceder al Informe
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-8 pt-6 border-t border-slate-700/50 text-center">
            <p class="text-slate-500 text-xs">Desarrollado por <span class="text-slate-400 font-medium">Creative Web</span></p>
        </div>
    </div>
</div>
</body>
</html>
