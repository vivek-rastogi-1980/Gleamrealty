<?php

declare(strict_types=1);

require_once __DIR__ . '/../core/Autoloader.php';
\Core\Autoloader::register(dirname(__DIR__));
\Core\Dotenv::load(dirname(__DIR__) . '/.env');

if (file_exists(dirname(__DIR__) . '/core/helpers.php')) {
    require_once dirname(__DIR__) . '/core/helpers.php';
}

echo "=== GLEAMREALTY HERO & ADMIN MANAGEMENT VERIFICATION ===\n\n";

// 1. Check Default Hero & Metrics Model
echo "--- 1. Testing Setting::getHero() and HeroSlide Model ---\n";
$hero = \App\Models\Setting::getHero();
assert(!empty($hero['heading_line1']), "Hero headline line 1 must not be empty");
assert(!empty($hero['heading_line2']), "Hero headline line 2 must not be empty");
assert(!empty($hero['heading_line3']), "Hero headline line 3 must not be empty");
assert(!empty($hero['slides']), "Hero slides must not be empty");
assert(count($hero['slides']) >= 2, "Hero must have at least 2 slides");
echo "[+] Default Hero Headline:\n";
echo "    Line 1: " . $hero['heading_line1'] . "\n";
echo "    Line 2: " . $hero['heading_line2'] . "\n";
echo "    Line 3: " . $hero['heading_line3'] . "\n";
echo "[+] Slide 1: " . $hero['slides'][0]['title'] . " (" . $hero['slides'][0]['location_tag'] . ")\n";
echo "[+] Slide 2: " . $hero['slides'][1]['title'] . " (" . $hero['slides'][1]['location_tag'] . ")\n";

$metrics = \App\Models\Setting::getMetrics();
assert(count($metrics) === 4, "Must have 4 metrics");
echo "[+] Metric 1: " . $metrics[0]['value'] . " - " . $metrics[0]['label'] . "\n";
echo "    -> PASS\n\n";

// 2. Test Setting::saveHero Persistence
echo "--- 2. Testing Hero Update Persistence ---\n";
$testUpdate = [
    'is_enabled' => true,
    'badge_text' => '✦ BRAJ BHUMI PRIVATE ESTATES • VRINDAVAN & MATHURA',
    'heading_line1' => 'Timeless Sanctuaries',
    'heading_line2' => 'in the Sacred Soil',
    'heading_line3' => 'of Braj',
    'heading' => 'Timeless Sanctuaries in the Sacred Soil of Braj',
    'subtitle' => 'in the Sacred Soil',
    'subheading' => 'Curated freehold estates and luxury residences, where timeless architecture meets the spiritual landscape of Vrindavan and Mathura.',
    'cta_primary_text' => 'Explore Sanctuaries',
    'cta_primary_link' => '#residences',
    'cta_secondary_text' => 'Schedule a Private Visit',
    'cta_secondary_link' => '#inquire',
    'trust_seal_text' => '100% MVDA & RERA Approved • Immediate Freehold Registry',
    'background_type' => 'image',
    'background_media' => asset('uploads/hero/hero-braj-sanctuary.webp'),
    'experience_bar_items' => ['Sacred Locations', 'Luxury Estates', 'Investment Opportunities'],
];
\App\Models\Setting::saveHero($testUpdate);
$reloaded = \App\Models\Setting::getHero();
assert($reloaded['heading_line1'] === 'Timeless Sanctuaries', "Headline line 1 must match");
assert($reloaded['heading_line2'] === 'in the Sacred Soil', "Headline line 2 must match");
assert($reloaded['heading_line3'] === 'of Braj', "Headline line 3 must match");
echo "[+] Hero Settings Persistence Verified: PASS\n\n";

// 3. Test HTTP Routes for Admin Hero
echo "--- 3. Testing Admin Hero Routes ---\n";
$baseUrl = env('APP_URL', 'http://localhost/Gleamrealty');

// Unauthenticated GET /admin/hero -> should redirect
$ch = curl_init($baseUrl . '/admin/hero');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "[+] Unauthenticated GET /admin/hero HTTP Code: $httpCode (Expected 302)\n";
assert($httpCode === 302, "Must redirect unauthenticated user to login");

// Login and get session cookie
$cookieFile = sys_get_temp_dir() . '/gleam_admin_test_cookie.txt';
if (file_exists($cookieFile)) @unlink($cookieFile);

// First fetch CSRF from login page
$ch = curl_init($baseUrl . '/admin/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
$loginHtml = curl_exec($ch);
curl_close($ch);

preg_match('/name="_csrf_token"\s+value="([^"]+)"/', $loginHtml, $matches);
$csrfToken = $matches[1] ?? '';

// Post login
$ch = curl_init($baseUrl . '/admin/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    '_csrf_token' => $csrfToken,
    'login' => 'admin@gleamrealty.com',
    'password' => 'Admin@12345',
]));
curl_exec($ch);
curl_close($ch);

// Authenticated GET /admin/hero
$ch = curl_init($baseUrl . '/admin/hero');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
$adminHeroHtml = curl_exec($ch);
$adminHeroCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "[+] Authenticated GET /admin/hero HTTP Code: $adminHeroCode (Expected 200)\n";
assert($adminHeroCode === 200, "Must return 200 OK for authenticated admin");
assert(str_contains($adminHeroHtml, 'Homepage Hero Section Manager'), "Must contain page title");
assert(str_contains($adminHeroHtml, 'name="heading_line1"'), "Must contain heading_line1 input");
assert(str_contains($adminHeroHtml, 'name="heading_line2"'), "Must contain heading_line2 input");
assert(str_contains($adminHeroHtml, 'name="heading_line3"'), "Must contain heading_line3 input");
assert(str_contains($adminHeroHtml, 'name="background_type"'), "Must contain background_type select");
assert(str_contains($adminHeroHtml, 'name="exp_item_0"'), "Must contain experience bar input");
echo "[+] Admin Hero Form Elements Verified: PASS\n\n";

// 4. Test Authenticated POST /admin/hero Form Submission
echo "--- 4. Testing POST /admin/hero Form Submission ---\n";
preg_match('/name="_csrf_token"\s+value="([^"]+)"/', $adminHeroHtml, $hMatches);
$heroCsrf = $hMatches[1] ?? '';

$allSlides = \App\Models\HeroSlide::all();
$slide1 = $allSlides[0] ?? null;

$postData = [
    '_csrf_token' => $heroCsrf,
    'is_enabled' => '1',
    'badge_text' => '✦ BRAJ BHUMI PRIVATE ESTATES • VRINDAVAN & MATHURA',
    'heading_line1' => 'Timeless Sanctuaries',
    'heading_line2' => 'in the Sacred Soil',
    'heading_line3' => 'of Braj',
    'subheading' => 'Curated freehold estates and luxury residences, where timeless architecture meets the spiritual landscape of Vrindavan and Mathura.',
    'cta_primary_text' => 'Explore Sanctuaries',
    'cta_primary_link' => '#residences',
    'cta_secondary_text' => 'Schedule a Private Visit',
    'cta_secondary_link' => '#inquire',
    'trust_seal_text' => '100% MVDA & RERA Approved • Immediate Freehold Registry',
    'background_type' => 'image',
    'background_media' => asset('uploads/hero/hero-braj-sanctuary.webp'),
    'exp_item_0' => 'Sacred Locations',
    'exp_item_1' => 'Luxury Estates',
    'exp_item_2' => 'Investment Opportunities',
    'metric_value_0' => '100%',
    'metric_label_0' => 'MVDA & RERA Approved',
    'metric_value_1' => '5 Lakh+',
    'metric_label_1' => 'Sq. Yds Delivered',
    'metric_value_2' => '10+ Years',
    'metric_label_2' => 'Generational Trust',
    'metric_value_3' => '3,000+',
    'metric_label_3' => 'Happy Devotee Families',
];

if ($slide1) {
    $sId = $slide1['id'];
    $postData['slide_ids'] = [$sId];
    $postData["slide_title_{$sId}"] = 'Shri Vasudhara Lotus Estates';
    $postData["slide_location_{$sId}"] = 'Chhatikara–Vrindavan Corridor • NH-19';
    $postData["slide_description_{$sId}"] = 'Freehold Sanctuaries • 250 – 1,200 Sq. Yds.';
    $postData["slide_badge_{$sId}"] = 'Phase II Now Open';
    $postData["slide_featured_label_{$sId}"] = 'Featured Sanctuary';
    $postData["slide_image_{$sId}"] = $slide1['image_url'];
    $postData["slide_price_{$sId}"] = 'Starting ₹ 45 Lakhs*';
    $postData["slide_cta_text_{$sId}"] = 'View Sanctuary';
    $postData["slide_cta_url_{$sId}"] = '#residences';
    $postData["slide_sort_{$sId}"] = '0';
    $postData["slide_active_{$sId}"] = '1';
}

$ch = curl_init($baseUrl . '/admin/hero');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_exec($ch);
$postCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "[+] POST /admin/hero HTTP Code: $postCode (Expected 302 redirect on success)\n";
assert($postCode === 302, "Must redirect after saving hero");

// 5. Test Public Homepage Renders Hero
echo "--- 5. Testing Public Homepage Hero Rendering ---\n";
$ch = curl_init($baseUrl . '/?theme=green');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$homeHtml = curl_exec($ch);
curl_close($ch);

assert(stripos($homeHtml, 'Timeless Sanctuaries') !== false, "Homepage must contain Line 1: Timeless Sanctuaries");
assert(stripos($homeHtml, 'in the Sacred Soil') !== false, "Homepage must contain Line 2: in the Sacred Soil");
assert(stripos($homeHtml, 'of Braj') !== false, "Homepage must contain Line 3: of Braj");
assert(stripos($homeHtml, 'Explore Sanctuaries') !== false, "Homepage must contain primary CTA");
assert(stripos($homeHtml, 'Schedule a Private Visit') !== false, "Homepage must contain secondary CTA");
assert(stripos($homeHtml, 'Discover Braj Living') !== false, "Homepage must contain bottom experience bar");
echo "[+] Homepage 3-Part Headline, CTAs & Experience Bar Verified: PASS\n\n";

echo "=== ALL HERO & ADMIN MANAGEMENT TESTS PASSED ===\n";
