<?php
// Itakda ang petsa ng pag-expire
$expiration_date = strtotime("2050-08-07 23:59:59"); // YYYY-MM-DD HH:MM:SS

// Kunin ang kasalukuyang oras
$current_time = time();

// Suriin kung ang kasalukuyang oras ay lumampas na sa petsa ng pag-expire
if ($current_time > $expiration_date) {
    // Kung lumampas na, ipakita ang mensahe at ihinto ang script
    die("This application has expired. Please contact the administrator.");
}

// Ilagay dito ang natitirang bahagi ng iyong PHP script
echo "Welcome to the application!";
// ...
?>
