<?php
session_start();
if (empty($_SESSION['auth_bionext_plan'])) {
    header('Location: login.php');
    exit;
}
$envio = $_SESSION['ultimo_envio'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="noindex, nofollow">
<title>Aprobación recibida — Bionext</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
* { font-family: 'Outfit', sans-serif; }
body { background: linear-gradient(135deg, #0c4a6e 0%, #064e3b 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
.glass { background: rgba(255, 255, 255, 0.07); backdrop-filter: blur(24px); border: 1px solid rgba(125, 211, 252, 0.18); }
</style>
</head>
<body>
<div class="w-full max-w-lg px-6">
    <div class="glass rounded-2xl p-10 text-center">
        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-emerald-500/20 border border-emerald-400/30 mb-6">
            <svg class="w-10 h-10 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h1 class="text-3xl font-extrabold text-white mb-3">¡Aprobación recibida!</h1>
        <p class="text-sky-100 text-base mb-8">
            <?php if ($envio): ?>
            <strong><?= htmlspecialchars($envio['nombre']) ?></strong>, su decisión ya llegó al equipo de Creative Web.
            <?php else: ?>
            Su decisión ya llegó al equipo de Creative Web.
            <?php endif; ?>
        </p>

        <?php if ($envio): ?>
        <div class="bg-slate-900/30 rounded-xl p-6 mb-6 border border-sky-400/20">
            <div class="grid grid-cols-2 gap-4 text-center">
                <div>
                    <div class="text-4xl font-extrabold text-emerald-300"><?= $envio['aprobados'] ?></div>
                    <p class="text-sky-200/80 text-xs uppercase font-bold tracking-wider mt-1">Aprobados</p>
                </div>
                <div>
                    <div class="text-4xl font-extrabold text-red-300"><?= $envio['rechazados'] ?></div>
                    <p class="text-sky-200/80 text-xs uppercase font-bold tracking-wider mt-1">Rechazados</p>
                </div>
            </div>
        </div>

        <?php if ($envio['envio_ok']): ?>
        <p class="text-sky-200 text-sm">Le enviamos también una copia a su email para que tenga registro.</p>
        <?php else: ?>
        <p class="text-amber-300 text-sm">⚠ Su decisión quedó registrada. El equipo de Creative Web la recibirá.</p>
        <?php endif; ?>
        <?php endif; ?>

        <div class="mt-8 space-y-3">
            <p class="text-sky-200/70 text-sm">Próximo paso: Creative Web empieza a redactar los artículos aprobados. Se publican escalonadamente (4-5 por semana) para que Google los procese de forma natural.</p>
        </div>

        <div class="mt-8 pt-6 border-t border-sky-400/20">
            <a href="logout.php" class="text-sky-300 hover:text-white text-sm font-semibold">Cerrar sesión</a>
        </div>
    </div>
</div>
</body>
</html>
<?php unset($_SESSION['ultimo_envio']); ?>
