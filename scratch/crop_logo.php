<?php
$src = 'c:/xampp/htdocs/Gleamrealty/public/uploads/gleam_logo_new.png';
$im = imagecreatefrompng($src);
$w = imagesx($im);
$h = imagesy($im);

$minX = $w; $minY = $h; $maxX = 0; $maxY = 0;

for ($y = 0; $y < $h; $y++) {
    for ($x = 0; $x < $w; $x++) {
        $rgba = imagecolorat($im, $x, $y);
        $c = imagecolorsforindex($im, $rgba);
        if ($c['alpha'] < 120) { // Not transparent
            if ($x < $minX) $minX = $x;
            if ($x > $maxX) $maxX = $x;
            if ($y < $minY) $minY = $y;
            if ($y > $maxY) $maxY = $y;
        }
    }
}

echo "Original: {$w}x{$h}\n";
echo "Bounding box: minX=$minX, minY=$minY, maxX=$maxX, maxY=$maxY\n";
$cropW = ($maxX - $minX) + 1;
$cropH = ($maxY - $minY) + 1;
echo "Cropped size: {$cropW}x{$cropH}\n";

$cropped = imagecreatetruecolor($cropW, $cropH);
imagealphablending($cropped, false);
imagesavealpha($cropped, true);
$trans = imagecolorallocatealpha($cropped, 0, 0, 0, 127);
imagefilledrectangle($cropped, 0, 0, $cropW, $cropH, $trans);
imagecopy($cropped, $im, 0, 0, $minX, $minY, $cropW, $cropH);

// Save both PNG and WEBP
imagepng($cropped, 'c:/xampp/htdocs/Gleamrealty/public/uploads/gleam_logo_cropped.png');
imagewebp($cropped, 'c:/xampp/htdocs/Gleamrealty/public/uploads/gleam_logo_cropped.webp', 95);

// Also create a white/light-colored version for dark backgrounds / dark theme / footer
$whiteLogo = imagecreatetruecolor($cropW, $cropH);
imagealphablending($whiteLogo, false);
imagesavealpha($whiteLogo, true);
imagefilledrectangle($whiteLogo, 0, 0, $cropW, $cropH, $trans);

for ($y = 0; $y < $cropH; $y++) {
    for ($x = 0; $x < $cropW; $x++) {
        $c = imagecolorsforindex($cropped, imagecolorat($cropped, $x, $y));
        if ($c['alpha'] < 125) {
            // If the color is dark teal/blue, map it to white/off-white #F8F9FA, keeping the gold parts gold
            // Gold in logo: let's check hue / saturation
            $isGold = ($c['red'] > 120 && $c['green'] > 80 && $c['blue'] < 80);
            if ($isGold) {
                // Keep vibrant gold
                $p = imagecolorallocatealpha($whiteLogo, $c['red'], $c['green'], $c['blue'], $c['alpha']);
            } else {
                // Turn to pure crisp white
                $p = imagecolorallocatealpha($whiteLogo, 255, 255, 255, $c['alpha']);
            }
            imagesetpixel($whiteLogo, $x, $y, $p);
        }
    }
}
imagepng($whiteLogo, 'c:/xampp/htdocs/Gleamrealty/public/uploads/gleam_logo_cropped_white.png');
imagewebp($whiteLogo, 'c:/xampp/htdocs/Gleamrealty/public/uploads/gleam_logo_cropped_white.webp', 95);

echo "Cropped and white logos generated!\n";
