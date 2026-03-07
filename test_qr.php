<?php
// test_qr_simple.php
// require __DIR__ . 'phpqrcode/qrlib.php'; // Update path to phpqrcode library
require __DIR__ . '/phpqrcode/qrlib.php';

// Sample text to encode in QR code
$sample_text = 'CN-0001';

// Output directory
$qrPath = __DIR__ . '/uploads/qr_codes/';
if (!is_dir($qrPath)) mkdir($qrPath, 0777, true);

// File path for QR code PNG
$qrFile = $qrPath . 'CN-0002.png';

// Generate and save QR code
QRcode::png($sample_text, $qrFile, QR_ECLEVEL_L, 4);

echo "QR Code saved to: $qrFile\n";

echo $qrFile;