<?php
$src = 'c:/xampp/htdocs/Gleamrealty/public/uploads/gleam_logo_new.png';
$info = getimagesize($src);
echo "Dimensions: {$info[0]}x{$info[1]}\n";

$im = imagecreatefrompng($src);
$topLeft = imagecolorat($im, 0, 0);
$colors = imagecolorsforindex($im, $topLeft);
echo "Top-Left Color: R={$colors['red']} G={$colors['green']} B={$colors['blue']} Alpha={$colors['alpha']}\n";

// Let's create a version with transparent background if the corners are white
if ($colors['red'] > 245 && $colors['green'] > 245 && $colors['blue'] > 245 && $colors['alpha'] == 0) {
    echo "Image has white background. Creating transparent PNG version...\n";
    $w = imagesx($im);
    $h = imagesy($im);
    
    // Create new truecolor image with alpha
    $transIm = imagecreatetruecolor($w, $h);
    imagealphablending($transIm, false);
    imagesavealpha($transIm, true);
    $transparent = imagecolorallocatealpha($transIm, 255, 255, 255, 127);
    imagefilledrectangle($transIm, 0, 0, $w, $h, $transparent);
    imagealphablending($transIm, true);
    
    // Also let's find the bounding box of non-white pixels to trim any excess padding if needed
    $minX = $w; $minY = $h; $maxX = 0; $maxY = 0;
    
    for ($y = 0; $y < $h; $y++) {
        for ($x = 0; $x < $w; $x++) {
            $c = imagecolorsforindex($im, imagecolorat($im, $x, $y));
            // Check if pixel is white or near white
            if ($c['red'] > 250 && $c['green'] > 250 && $c['blue'] > 250) {
                // leave transparent
            } else {
                if ($x < $minX) $minX = $x;
                if ($x > $maxX) $maxX = $x;
                if ($y < $minY) $minY = $y;
                if ($y > $maxY) $maxY = $y;
                
                // Keep pixel color
                // If it's near the edge of white, smooth alpha
                $brightness = ($c['red'] + $c['green'] + $c['blue']) / 3;
                if ($brightness > 230) {
                    $alpha = (int)((($brightness - 230) / (255 - 230)) * 127);
                    $pCol = imagecolorallocatealpha($transIm, $c['red'], $c['green'], $c['blue'], $alpha);
                    imagesetpixel($transIm, $x, $y, $pCol);
                } else {
                    $pCol = imagecolorallocate($transIm, $c['red'], $c['green'], $c['blue']);
                    imagesetpixel($transIm, $x, $y, $pCol);
                }
            }
        }
    }
    
    // Save transparent version
    imagealphablending($transIm, false);
    imagesavealpha($transIm, true);
    imagepng($transIm, 'c:/xampp/htdocs/Gleamrealty/public/uploads/gleam_logo_transparent.png');
    echo "Saved transparent logo: gleam_logo_transparent.png\n";
    echo "Crop Box: minX=$minX, minY=$minY, maxX=$maxX, maxY=$maxY\n";
    
    // Also save a cropped transparent version for high-impact sharp rendering
    $cropW = ($maxX - $minX) + 1;
    $cropH = ($maxY - $minY) + 1;
    if ($cropW > 0 && $cropH > 0) {
        $cropped = imagecreatetruecolor($cropW, $cropH);
        imagealphablending($cropped, false);
        imagesavealpha($cropped, true);
        imagecopy($cropped, $transIm, 0, 0, $minX, $minY, $cropW, $cropH);
        imagepng($cropped, 'c:/xampp/htdocs/Gleamrealty/public/uploads/gleam_logo_cropped.png');
        echo "Saved tight-crop logo ({$cropW}x{$cropH}): gleam_logo_cropped.png\n";
    }
}
echo "Done!\n";
