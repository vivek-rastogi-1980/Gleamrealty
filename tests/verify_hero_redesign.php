<?php

$url = 'http://localhost/Gleamrealty/';
$html = @file_get_contents($url);

if (!$html) {
    echo "FAILED to connect to $url\n";
    exit(1);
}

echo "=== GLEAMREALTY HERO REDESIGN VERIFICATION ===\n";
echo "Response Length: " . strlen($html) . " bytes\n";
if (preg_match('/hero-section.*?<\/section>/s', $html, $matches)) {
    echo "Hero section HTML length: " . strlen($matches[0]) . "\n";
    if (strpos($matches[0], 'Approved') !== false) {
        preg_match('/<div class="flex items-center gap-2.5 text-xs text-white.*?<\/div>/s', $matches[0], $trustMatch);
        echo "Found trust match: " . ($trustMatch[0] ?? 'partial match') . "\n";
    } else {
        echo "Trust seal text not found in hero section HTML!\n";
    }
}

$checks = [
    'Hero 3D Stage Container' => 'hero-stage-3d',
    '3D Page Slide Elements' => 'hero-slide-3d',
    '3D Page Turn Left Class' => 'is-turning-left',
    '3D Page Turn Right Class' => 'is-turning-right',
    '3D Perspective Styling' => 'perspective: 2000px',
    'Alpine 3D Slider Controller' => 'hero3dSlider',
    'Circular SVG Progress Timer Ring' => 'stroke-dashoffset',
    '3D Page Turn Prev/Next Buttons' => 'Previous Property Slide',
    'Interactive Bottom Property Tabs' => 'goToSlide',
    'Starting Price Investment Badge' => 'Starting ₹',
    'Prestige Trust Seal' => '100% MVDA &amp; RERA Approved',
    'VIP Callback Modal Trigger' => 'vipModalOpen = true',
];

$allPassed = true;
foreach ($checks as $label => $needle) {
    $found = strpos($html, $needle) !== false;
    echo "[" . ($found ? "PASS" : "FAIL") . "] $label\n";
    if (!$found) $allPassed = false;
}

$slideCount = substr_count($html, 'hero-slide-3d');
echo "Rendered Property Slides in Hero: $slideCount\n";

if ($allPassed) {
    echo "\n>>> ALL FRONTEND HERO VERIFICATION CHECKS PASSED!\n";
} else {
    echo "\n>>> SOME CHECKS FAILED!\n";
    exit(1);
}
