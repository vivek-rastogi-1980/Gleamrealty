<?php

declare(strict_types=1);

$urls = [
    'Homepage' => 'http://localhost/Gleamrealty/',
    'Project Single' => 'http://localhost/Gleamrealty/projects/shri-vrinda-orchids-plots-and-villas',
    'Location Vrindavan (/location/vrindavan)' => 'http://localhost/Gleamrealty/location/vrindavan',
    'Location Mathura (/location/mathura)' => 'http://localhost/Gleamrealty/location/mathura',
];

echo "=== VERIFYING HTTP ENDPOINTS & HTML CONTENT ===\n";

foreach ($urls as $label => $url) {
    $ctx = stream_context_create(['http' => ['timeout' => 10]]);
    $html = @file_get_contents($url, false, $ctx);
    
    if ($html === false) {
        echo "[$label] FAILED to fetch $url\n";
        continue;
    }

    $hasBrochure = (stripos($html, 'Brochure') !== false);
    $hasFloorPlan = (stripos($html, 'Floor Plan') !== false);
    $hasPaymentPlan = (stripos($html, 'Payment') !== false);

    echo "[$label] OK (Length: " . strlen($html) . " bytes)\n";
    echo "  Contains 'Brochure': " . ($hasBrochure ? 'YES' : 'NO') . "\n";
    echo "  Contains 'Floor Plan': " . ($hasFloorPlan ? 'YES' : 'NO') . "\n";
    echo "  Contains 'Payment': " . ($hasPaymentPlan ? 'YES' : 'NO') . "\n";
}
