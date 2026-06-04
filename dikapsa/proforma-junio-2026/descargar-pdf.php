<?php
session_start();
if (empty($_SESSION['auth_dikapsa_proforma'])) {
    header('Location: login.php');
    exit;
}
$pdf = __DIR__ . '/Cot-SEO-Dikapsa-2026.pdf';
if (!file_exists($pdf)) {
    header('Location: index.php');
    exit;
}
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Propuesta-SEO-Dikapsa-2026.pdf"');
header('Content-Length: ' . filesize($pdf));
header('Cache-Control: no-cache, no-store, must-revalidate');
readfile($pdf);
exit;
