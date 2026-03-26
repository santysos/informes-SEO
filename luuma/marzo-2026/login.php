<?php
session_start();

$PASSWORD = 'Luuma-SEO-2026';

if (isset($_POST['password'])) {
    if ($_POST['password'] === $PASSWORD) {
        $_SESSION['auth_luuma'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = true;
    }
}

if (isset($_SESSION['auth_luuma']) && $_SESSION['auth_luuma'] === true) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe SEO — Luuma Rooftop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: { sans: ['Inter', 'sans-serif'] },
                colors: {
                    brand: { 50: '#fdf4ff', 100: '#fae8ff', 500: '#a855f7', 600: '#9333ea', 700: '#7e22ce', 800: '#6b21a8', 900: '#581c87' }
                }
            }
        }
    }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-brand-600/20 border border-brand-500/30 mb-4">
                <svg class="w-8 h-8 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-white">Informe SEO</h1>
            <p class="text-slate-400 mt-1">Luuma Rooftop — Manta, Ecuador</p>
        </div>

        <div class="bg-slate-800/50 backdrop-blur-xl rounded-2xl border border-slate-700/50 p-8 shadow-2xl">
            <?php if (isset($error)): ?>
            <div class="mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/20 text-red-400 text-sm">
                Contrasena incorrecta. Intenta de nuevo.
            </div>
            <?php endif; ?>

            <form method="POST" class="space-y-6">
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-300 mb-2">Contrasena de acceso</label>
                    <input type="password" name="password" id="password" required autofocus
                        class="w-full px-4 py-3 bg-slate-900/50 border border-slate-600/50 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition"
                        placeholder="Ingresa la contrasena">
                </div>
                <button type="submit"
                    class="w-full py-3 px-4 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl transition duration-200 shadow-lg shadow-brand-600/25">
                    Acceder al informe
                </button>
            </form>

            <p class="text-center text-slate-500 text-xs mt-6">Este informe es confidencial y de uso exclusivo para Luuma Rooftop.</p>
        </div>

        <p class="text-center text-slate-600 text-xs mt-6">Desarrollado por Creative Web</p>
    </div>
</body>
</html>
