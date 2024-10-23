<?php

$qrcodeUrl = $_SESSION["user"]["username"] . "_qrcode.png";

if (file_exists($qrcodeUrl)) {
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="' . basename($qrcodeUrl) . '"');
    header('Content-Length: ' . filesize($qrcodeUrl));
    readfile($qrcodeUrl);
}

view('accounts/index.view.php', [
    'heading' => 'Account',
    'qrPath' => $_SESSION["user"]["username"] . "_qrcode.png"
]);
