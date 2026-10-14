<?php

declare(strict_types=1);

echo "===============================================================\n";
echo "  GLEAMREALTY SITE-WIDE UNIFIED THEME & FONTS VERIFICATION     \n";
echo "===============================================================\n\n";

$baseUrl = 'http://localhost/Gleamrealty';

function fetch(string $url): array {
    $ctx = stream_context_create([
        'http' => [
            'timeout' => 8,
            'ignore_errors' => true,
        ]
    ]);
    $res = @file_get_contents($url, false, $ctx);
    $status = 0;
    if (isset($http_response_header) && !empty($http_response_header)) {
        if (preg_match('#HTTP/[0-9\.]+\s+([0-9]+)#', $http_response_header[0], $m)) {
            $status = (int)$m[1];
        }
    }
    return ['status' => $status, 'html' => $res ?: ''];
}

// 1. Lint all view PHP files
echo "1. Validating PHP Syntax of all templates in views/...\n";
$viewDir = realpath(__DIR__ . '/../views');
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewDir));
$lintErrors = 0;
$fileCount = 0;

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $fileCount++;
        $path = $file->getRealPath();
        $output = [];
        $ret = 0;
        exec('"c:\\xampp\\php\\php.exe" -l "' . $path . '" 2>&1', $output, $ret);
        if ($ret !== 0) {
            echo "   [-] Syntax error in {$path}: " . implode("\n", $output) . "\n";
            $lintErrors++;
        }
    }
}

echo "   [✓] {$fileCount} PHP view templates validated. Total syntax errors: {$lintErrors}\n\n";

// 2. Check for unwanted green background patterns across all view files
echo "2. Scanning all view templates for deprecated green backgrounds & tokens...\n";
$forbiddenPatterns = [
    '#284A24' => 'Legacy dark green section background',
    '#24431F' => 'Legacy forest green hover/border',
    '#1B3417' => 'Legacy deep green header/footer',
    '#0b1410' => 'Legacy green preloader',
    'bg-emerald-400' => 'Emerald pulse dot / badge',
    'bg-emerald-500' => 'Emerald button / alert / badge',
    'bg-emerald-600' => 'Emerald button hover',
    'bg-emerald-950' => 'Emerald badge background',
    'bg-green-' => 'Tailwind generic green background',
];

$patternViolations = 0;
foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $content = file_get_contents($file->getRealPath());
        foreach ($forbiddenPatterns as $pat => $desc) {
            if (str_contains($content, $pat)) {
                echo "   [-] Found forbidden pattern '{$pat}' ({$desc}) in " . $file->getFilename() . "\n";
                $patternViolations++;
            }
        }
    }
}

if ($patternViolations === 0) {
    echo "   [✓] ZERO deprecated green backgrounds found across all view files!\n\n";
} else {
    echo "   [-] Total forbidden pattern violations: {$patternViolations}\n\n";
}

// 3. HTTP Endpoints Testing
echo "3. Testing HTTP rendering of key site pages...\n";
$routes = [
    '/' => 'Home Page',
    '/residential-plots-in-vrindavan' => 'Residential Plots',
    '/property-in-mathura' => 'Property in Mathura',
    '/luxury-villas-in-vrindavan' => 'Luxury Villas',
    '/flats-apartments-in-vrindavan' => 'Flats & Apartments',
    '/commercial-property-in-vrindavan' => 'Commercial Property',
    '/plot-rate-vrindavan' => 'Plot Rate Vrindavan',
    '/plot-rate-mathura' => 'Plot Rate Mathura',
    '/contact-us' => 'Contact Us',
    '/about-us' => 'About Us',
    '/blog' => 'Blog Index',
];

$httpFailures = 0;
foreach ($routes as $route => $label) {
    $res = fetch($baseUrl . $route);
    if ($res['status'] !== 200) {
        echo "   [-] {$label} ({$route}): HTTP {$res['status']} FAIL\n";
        $httpFailures++;
        continue;
    }
    
    // Check key CSS variables and font styles
    $html = $res['html'];
    $hasCanvasBg = str_contains($html, '--theme-bg-canvas: #FFFFFF;');
    $hasAltBg = str_contains($html, '--theme-section-alt-bg: #FAF9F6;');
    $hasPlayfair = str_contains($html, 'Playfair Display') || str_contains($html, 'family=Playfair+Display');
    $hasJakarta = str_contains($html, 'Plus Jakarta Sans') || str_contains($html, 'family=Plus+Jakarta+Sans');
    $hasAlexBrush = str_contains($html, 'Alex Brush') || str_contains($html, 'family=Alex+Brush');
    $noOldGreenBg = !str_contains($html, '#284A24') && !str_contains($html, '#0b1410');

    $allPass = $hasCanvasBg && $hasAltBg && $hasPlayfair && $hasJakarta && $hasAlexBrush && $noOldGreenBg;
    echo "   [" . ($allPass ? "✓" : "!") . "] {$label} ({$route}): HTTP 200 | Canvas=#FFFFFF, Alt=#FAF9F6, Fonts=Playfair+Jakarta+AlexBrush\n";
    if (!$allPass) {
        $httpFailures++;
    }
}

echo "\n===============================================================\n";
if ($lintErrors === 0 && $patternViolations === 0 && $httpFailures === 0) {
    echo "  ALL VERIFICATION CHECKS PASSED PERFECTLY!\n";
} else {
    echo "  SOME CHECKS NEED ATTENTION: Lint={$lintErrors}, Violations={$patternViolations}, HTTP={$httpFailures}\n";
}
echo "===============================================================\n";
