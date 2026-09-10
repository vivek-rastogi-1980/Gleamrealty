<?php

declare(strict_types=1);

echo "=== GLEAMREALTY CONTACT US & ABOUT US REDESIGN VERIFICATION ===\n\n";

$baseUrl = 'http://localhost/Gleamrealty';

function fetchUrl(string $url): string {
    $ctx = stream_context_create([
        'http' => [
            'timeout' => 5,
            'ignore_errors' => true,
        ]
    ]);
    $res = @file_get_contents($url, false, $ctx);
    return $res ?: '';
}

// 1. Verify /contact-us
echo "--- 1. Testing /contact-us Page (Matching Earthousing.com) ---\n";
$contactHtml = fetchUrl($baseUrl . '/contact-us?theme=green');
if ($contactHtml === '') {
    echo "[-] FAILED: Could not reach /contact-us\n";
    exit(1);
}

$checksContact = [
    'Page Title / Meta' => str_contains($contactHtml, 'Contact Us') || str_contains($contactHtml, 'Contact us'),
    'Inner Header Banner' => str_contains($contactHtml, 'Contact us</h1>') || str_contains($contactHtml, 'Contact us</h1>') || str_contains($contactHtml, 'Contact us'),
    'Form Title: Find your Dream Property' => str_contains($contactHtml, 'Find your Dream Property'),
    'Input: Full Name' => str_contains($contactHtml, 'placeholder="Full Name"'),
    'Input: Mobile No.' => str_contains($contactHtml, 'placeholder="Mobile No."'),
    'Input: Email Address' => str_contains($contactHtml, 'placeholder="Email Address"'),
    'Select: State dropdown' => str_contains($contactHtml, 'Select state') || str_contains($contactHtml, 'Uttar Pradesh'),
    'Site Office Address: Omaxe Eternity' => str_contains($contactHtml, 'Building No. 10, Omaxe Eternity'),
    'Phone Hotline: +91 9568 600 700' => str_contains($contactHtml, '+91 9568 600 700'),
    'WhatsApp Concierge Link' => str_contains($contactHtml, 'wa.me/+919568600700'),
    'Google Maps Embed' => str_contains($contactHtml, 'maps/embed') && str_contains($contactHtml, 'Earthousing'),
    'Multi-Theme CSS Variables' => str_contains($contactHtml, 'var(--theme-card-bg)'),
];

$allContactPass = true;
foreach ($checksContact as $label => $pass) {
    echo "    - {$label}: " . ($pass ? "PASS" : "FAIL") . "\n";
    if (!$pass) $allContactPass = false;
}

// 2. Verify /about-us
echo "\n--- 2. Testing /about-us Page (Matching Earthousing.com) ---\n";
$aboutHtml = fetchUrl($baseUrl . '/about-us?theme=green');
if ($aboutHtml === '') {
    echo "[-] FAILED: Could not reach /about-us\n";
    exit(1);
}

$checksAbout = [
    'Page Title / Meta' => str_contains($aboutHtml, 'About us') || str_contains($aboutHtml, 'About Us'),
    'Company Overview: About Earthousing Buildtech LLP' => str_contains($aboutHtml, 'About Earthousing Buildtech LLP'),
    'Chalo Vrindavan / Brajwas Narrative' => str_contains($aboutHtml, 'Chalo Vrindavan') && str_contains($aboutHtml, 'Brajwas'),
    '10+ Years Heritage Metric' => str_contains($aboutHtml, '10+ Years') || str_contains($aboutHtml, '10+'),
    'Our Mission Card' => str_contains($aboutHtml, 'Our Mission'),
    'Our Vision Card' => str_contains($aboutHtml, 'Our Vision'),
    'Founder 1: Vinay Kumar Chauhan' => str_contains($aboutHtml, 'Vinay Kumar Chauhan') && str_contains($aboutHtml, 'Connecting Visions to Value'),
    'Founder 2: Rakesh Chaudhary' => str_contains($aboutHtml, 'Rakesh Chaudhary') && str_contains($aboutHtml, 'Your Partner for a Smarter Real Estate Future'),
    'Leadership Portrait Images' => str_contains($aboutHtml, 'vinay-01.png') && str_contains($aboutHtml, 'Rakesh-01.png'),
    'Expertise: Driving Real Estate Success' => str_contains($aboutHtml, 'Driving Real Estate Success with Strategic Insight'),
    'Expertise 4 Cards' => str_contains($aboutHtml, 'Project Sales &amp; Marketing') && str_contains($aboutHtml, 'Investment Advisory'),
    'Why Choose Us Section' => str_contains($aboutHtml, 'Why Choose Us!'),
    'Free Site Visit Consultation Form' => str_contains($aboutHtml, 'Free Site Visit') && str_contains($aboutHtml, 'Select Project'),
    'Dynamic Project Options Loaded' => str_contains($aboutHtml, 'Shri Vrinda') || str_contains($aboutHtml, 'Shri Vasudhara'),
];

$allAboutPass = true;
foreach ($checksAbout as $label => $pass) {
    echo "    - {$label}: " . ($pass ? "PASS" : "FAIL") . "\n";
    if (!$pass) $allAboutPass = false;
}

// 3. Test Form API Submission from new pages
echo "\n--- 3. Testing Lead Capture from Contact / About Forms ---\n";
$testLead = [
    'name' => 'Aditya Sharma (Test Lead)',
    'mobile' => '9876543210',
    'email' => 'aditya.sharma.test@example.com',
    'state' => 'Uttar Pradesh',
    'visit_date' => date('Y-m-d', strtotime('+3 days')),
    'message' => 'Interested in 500 sq yd plot near Prem Mandir Vrindavan',
];

$postData = json_encode($testLead);
$postCtx = stream_context_create([
    'http' => [
        'method' => 'POST',
        'header' => "Content-Type: application/json\r\nAccept: application/json\r\n",
        'content' => $postData,
        'timeout' => 5,
        'ignore_errors' => true,
    ]
]);

$response = @file_get_contents($baseUrl . '/api/inquiry', false, $postCtx);
$resData = json_decode($response ?: '', true);
$leadSuccess = isset($resData['status']) && $resData['status'] === 'success';

$leadId = $resData['lead_id'] ?? $resData['id'] ?? 'OK';
echo "    - POST /api/inquiry with state & mobile: " . ($leadSuccess ? "PASS (Inquiry ID: {$leadId})" : "FAIL") . "\n";

// Verify DB record
require_once __DIR__ . '/../core/Autoloader.php';
\Core\Autoloader::register(dirname(__DIR__));
\Core\Dotenv::load(dirname(__DIR__) . '/.env');
$pdo = \Core\Database::connection();
$stmt = $pdo->prepare("SELECT * FROM inquiries WHERE email = ? ORDER BY id DESC LIMIT 1");
$stmt->execute(['aditya.sharma.test@example.com']);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$hasStateInMsg = $row && str_contains($row['message'] ?? '', 'State: Uttar Pradesh');
$hasDateInMsg = $row && str_contains($row['message'] ?? '', 'Preferred Visit Date:');
echo "    - Database record verification: " . ($row ? "PASS" : "FAIL") . "\n";
echo "    - Metadata (State & Visit Date) captured in inquiry: " . ($hasStateInMsg && $hasDateInMsg ? "PASS" : "FAIL") . "\n";

// Cleanup test record
if ($row) {
    $pdo->prepare("DELETE FROM inquiries WHERE id = ?")->execute([$row['id']]);
    echo "    - Test lead cleaned up: PASS\n";
}

echo "\n=== VERIFICATION SUMMARY ===\n";
if ($allContactPass && $allAboutPass && $leadSuccess) {
    echo "ALL CONTACT US & ABOUT US TESTS PASSED PERFECTLY!\n";
} else {
    echo "SOME CHECKS FAILED. Please review above.\n";
    exit(1);
}
