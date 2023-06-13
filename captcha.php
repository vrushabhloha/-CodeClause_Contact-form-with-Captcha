<?php
session_start();
$rand_num = rand(11111, 99999);
$_SESSION['CODE'] = $rand_num;
$layer = imagecreatetruecolor(60, 30);
$captcha_bg = imagecolorallocate($layer, 255, 160, 120);
imagefill($layer, 0, 0, $captcha_bg);
$captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
imagestring($layer, 5, 5, 5, $rand_num, $captcha_text_color);

ob_start(); // Start output buffering
imagejpeg($layer); // Output the image
$image_data = ob_get_clean(); // Capture the output and clear the buffer

imagedestroy($layer); // Free up memory by destroying the image resource

// Set appropriate headers and output the image
header('Content-Type: image/jpeg');
header('Content-Length: ' . strlen($image_data));
echo $image_data;
?>
