<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

// Converting user data into a qr code to be shown on the page
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

$builder = new Builder(
    writer: new PngWriter(),
    writerOptions: [],
    validateResult: false,
    data: json_encode($_SESSION["user"]),
    encoding: new Encoding('UTF-8'),
    errorCorrectionLevel: ErrorCorrectionLevel::High,
    size: 300,
    margin: 10,
    roundBlockSizeMode: RoundBlockSizeMode::Margin,
    // logoPath: __DIR__ . '/assets/symfony.png',
    logoResizeToWidth: 50,
    logoPunchoutBackground: true,
    labelText: $_SESSION["user"]["username"],
    labelFont: new OpenSans(20),
    labelAlignment: LabelAlignment::Center
);

$result = $builder->build();

// Directly output the QR code
// header('Content-Type: ' . $result->getMimeType());
// echo $result->getString();

// Save it to a file
$result->saveToFile(BASE_PATH . "public/qrcodes/{$_SESSION['user']['username']}_qrcode.png");

// Generate a data URI to include image data inline (i.e. inside an <img> tag)
$qrCodeData = $result->getDataUri();

view('accounts/index.view.php', [
    'heading' => 'Account',
    'qrPath' =>  "/qrcodes/" . $_SESSION["user"]["username"] . "_qrcode.png"
]);
