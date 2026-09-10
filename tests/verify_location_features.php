<?php

$basePath = dirname(__DIR__);
require_once $basePath . '/core/Autoloader.php';
\Core\Autoloader::register($basePath);
\Core\Dotenv::load($basePath . '/.env');
if (file_exists($basePath . '/core/helpers.php')) {
    require_once $basePath . '/core/helpers.php';
}

echo "=== GLEAMREALTY LOCATION & NAVIGATION VERIFICATION ===\n\n";

$allPassed = true;

// 1. Verify Page::published()
echo "1. Checking Page::published()...\n";
$pages = \App\Models\Page::published();
echo "Found " . count($pages) . " published pages.\n";
if (count($pages) > 0) {
    echo " [PASS] Published pages loaded successfully.\n";
} else {
    echo " [FAIL] No published pages found.\n";
    $allPassed = false;
}

// 2. Verify Project::byLocation('mathura') and Project::byLocation('vrindavan')
echo "\n2. Checking Project::byLocation()...\n";
$mathuraProjects = \App\Models\Project::byLocation('mathura');
echo "Mathura projects: " . count($mathuraProjects) . "\n";
foreach ($mathuraProjects as $p) {
    echo " - [{$p['id']}] {$p['name']} ({$p['location']})\n";
}
if (count($mathuraProjects) >= 1) {
    echo " [PASS] Mathura projects found.\n";
} else {
    echo " [FAIL] No Mathura projects found.\n";
    $allPassed = false;
}

$vrindavanProjects = \App\Models\Project::byLocation('vrindavan');
echo "Vrindavan projects: " . count($vrindavanProjects) . "\n";
foreach ($vrindavanProjects as $p) {
    echo " - [{$p['id']}] {$p['name']} ({$p['location']})\n";
}
if (count($vrindavanProjects) >= 1) {
    echo " [PASS] Vrindavan projects found.\n";
} else {
    echo " [FAIL] No Vrindavan projects found.\n";
    $allPassed = false;
}

// 3. Test HTTP Endpoints via cURL or stream_context
echo "\n3. Testing HTTP Endpoints on Apache (http://localhost/Gleamrealty/)...\n";

function checkUrl($url, $needleMustExist = [], $needleMustNotExist = []) {
    global $allPassed;
    echo "Testing: $url ... ";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        echo "[FAIL] HTTP Code: $httpCode\n";
        $allPassed = false;
        return;
    }

    echo "HTTP 200 OK. ";

    foreach ($needleMustExist as $needle) {
        if (strpos($response, $needle) === false) {
            echo "\n [FAIL] Missing expected content: '$needle'";
            $allPassed = false;
            return;
        }
    }

    foreach ($needleMustNotExist as $needle) {
        if (strpos($response, $needle) !== false) {
            echo "\n [FAIL] Found unexpected content: '$needle'";
            $allPassed = false;
            return;
        }
    }

    echo "[PASS]\n";
}

// Test Home page header
checkUrl(
    'http://localhost/Gleamrealty/',
    [
        'Location',
        '/location/mathura',
        '/location/vrindavan',
        'About US',
        'BOOK SITE VISIT'
    ],
    [
        '>Residences<',
        '>Portal<'
    ]
);

// Test Mathura location page
checkUrl(
    'http://localhost/Gleamrealty/location/mathura',
    [
        'Mathura',
        'Prime Freehold Properties &amp; Plots in Mathura',
        'Shri Vrinda Orchids Commercial Complex',
        'Shri Vrinda Vihaar Residential Plots',
        'BOOK SITE VISIT'
    ]
);

// Test Vrindavan location page
checkUrl(
    'http://localhost/Gleamrealty/location/vrindavan',
    [
        'Vrindavan',
        'Sacred Sanctuaries &amp; Luxury Properties in Vrindavan',
        'Shri Vasudhara Vaishaly',
        'BOOK SITE VISIT'
    ]
);

echo "\n============================================\n";
if ($allPassed) {
    echo "ALL TESTS PASSED SUCCESSFULLY! 🎯\n";
} else {
    echo "SOME TESTS FAILED. Please review output above.\n";
}
echo "============================================\n";
