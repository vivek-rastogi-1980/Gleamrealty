<?php

declare(strict_types=1);

require_once __DIR__ . '/../core/Autoloader.php';
\Core\Autoloader::register(dirname(__DIR__));
\Core\Dotenv::load(dirname(__DIR__) . '/.env');

if (file_exists(dirname(__DIR__) . '/core/helpers.php')) {
    require_once dirname(__DIR__) . '/core/helpers.php';
}

use App\Models\Setting;
use App\Models\Project;
use App\Models\Blog;

echo "=== 1. Testing Setting::getHero() ===\n";
$hero = Setting::getHero();
assert(!empty($hero), "Hero settings should not be empty");
assert(!empty($hero['title_main']), "Hero title_main should not be empty");
assert(isset($hero['cards']) && count($hero['cards']) === 3, "Hero should have 3 cards");
echo "PASS: Hero settings loaded successfully. Title main: " . $hero['title_main'] . "\n";
echo "Cards count: " . count($hero['cards']) . "\n";

echo "\n=== 2. Testing Setting::getHomeSections() ===\n";
$homeSections = Setting::getHomeSections();
assert(!empty($homeSections), "Home sections should not be empty");
assert(!empty($homeSections['metrics']['m1_val']) && !empty($homeSections['metrics']['m5_val']), "Should have 5 metric values");
assert(!empty($homeSections['about']['title']), "About title should not be empty");
assert(isset($homeSections['about']['features']) && count($homeSections['about']['features']) === 4, "About should have 4 features");
assert(!empty($homeSections['about']['video_card']['title']), "About video card title should not be empty");
assert(isset($homeSections['highlights']['cards']) && count($homeSections['highlights']['cards']) === 4, "Highlights should have 4 cards");
assert(!empty($homeSections['properties_header']['title']), "Properties header title should not be empty");
assert(!empty($homeSections['news_header']['title']), "News header title should not be empty");
assert(!empty($homeSections['enquiry_banner']['title']), "Enquiry banner title should not be empty");
echo "PASS: Home sections loaded successfully.\n";
echo "- Metrics: " . count($homeSections['metrics']) . "\n";
echo "- About Features: " . count($homeSections['about']['features']) . "\n";
echo "- Highlights: " . count($homeSections['highlights']['cards']) . "\n";
echo "- Properties Title: " . $homeSections['properties_header']['title'] . "\n";
echo "- News Title: " . $homeSections['news_header']['title'] . "\n";
echo "- Enquiry Title: " . str_replace("\n", " ", $homeSections['enquiry_banner']['title']) . "\n";

echo "\n=== 3. Testing Public Homepage View Rendering ===\n";
// Emulate the controller rendering
ob_start();
try {
    $projects = Project::all();
    $metrics = Setting::getMetrics();
    $activeTheme = Setting::getActiveTheme();
    $latestBlogs = Blog::recent(3);

    // Extract variables as Core\View does
    extract([
        'seo_title' => 'Luxury Estates & Plots in Vrindavan Mathura',
        'seo_description' => 'Explore MVDA and RERA approved residential plots, luxury villas, and commercial real estate in Vrindavan and Mathura.',
        'projects' => $projects,
        'hero' => $hero,
        'metrics' => $metrics,
        'active_theme' => $activeTheme,
        'home_sections' => $homeSections,
        'latest_blogs' => $latestBlogs,
    ]);

    require __DIR__ . '/../views/public/home.php';
    $renderedHtml = ob_get_clean();
    assert(strlen($renderedHtml) > 5000, "Rendered HTML should be substantial");
    
    // Check for hero content in rendered HTML
    assert(strpos($renderedHtml, htmlspecialchars($hero['title_main'])) !== false, "Rendered HTML should contain hero title_main");
    assert(strpos($renderedHtml, htmlspecialchars($homeSections['about']['title'])) !== false, "Rendered HTML should contain about title");
    assert(strpos($renderedHtml, htmlspecialchars($homeSections['properties_header']['title'])) !== false, "Rendered HTML should contain properties title");
    assert(strpos($renderedHtml, htmlspecialchars($homeSections['news_header']['title'])) !== false, "Rendered HTML should contain news title");
    
    echo "PASS: Public homepage view rendered successfully without errors (" . strlen($renderedHtml) . " bytes).\n";
} catch (\Throwable $e) {
    ob_end_clean();
    echo "FAIL: Error rendering homepage view: " . $e->getMessage() . " on line " . $e->getLine() . "\n";
    echo $e->getTraceAsString() . "\n";
    exit(1);
}

echo "\n=== 4. Testing Admin Hero & Home Views Compilation ===\n";
ob_start();
try {
    // Admin Hero View
    extract([
        'hero' => $hero,
        'admin_user' => ['name' => 'Admin', 'role' => 'superadmin'],
    ]);
    require __DIR__ . '/../views/admin/hero/index.php';
    $adminHeroHtml = ob_get_clean();
    echo "PASS: Admin Hero view rendered successfully (" . strlen($adminHeroHtml) . " bytes).\n";

    // Admin Home View
    ob_start();
    extract([
        'sections' => $homeSections,
        'admin_user' => ['name' => 'Admin', 'role' => 'superadmin'],
    ]);
    require __DIR__ . '/../views/admin/home/index.php';
    $adminHomeHtml = ob_get_clean();
    echo "PASS: Admin Home sections view rendered successfully (" . strlen($adminHomeHtml) . " bytes).\n";
} catch (\Throwable $e) {
    ob_end_clean();
    echo "FAIL: Error rendering admin view: " . $e->getMessage() . " on line " . $e->getLine() . "\n";
    echo $e->getTraceAsString() . "\n";
    exit(1);
}

echo "\n=== 5. Testing Round-Trip Persistence of Hero and Home Sections ===\n";
$originalHero = Setting::getHero();
$testHero = $originalHero;
$testHero['title_main'] = 'Royal Braj Haveli (Test Edition)';
Setting::saveHero($testHero);

$reloadedHero = Setting::getHero();
assert($reloadedHero['title_main'] === 'Royal Braj Haveli (Test Edition)', "Hero title_main should match updated value");
echo "PASS: Setting::saveHero() persisted and reloaded successfully.\n";

// Restore original hero
Setting::saveHero($originalHero);
assert(Setting::getHero()['title_main'] === $originalHero['title_main'], "Hero should be restored");
echo "PASS: Setting::saveHero() restored original value.\n";

$originalHome = Setting::getHomeSections();
$testHome = $originalHome;
$testHome['properties_header']['title'] = 'Sanctuaries for the Discerning (Test Edition)';
Setting::saveHomeSections($testHome);

$reloadedHome = Setting::getHomeSections();
assert($reloadedHome['properties_header']['title'] === 'Sanctuaries for the Discerning (Test Edition)', "Home properties title should match updated value");
echo "PASS: Setting::saveHomeSections() persisted and reloaded successfully.\n";

// Restore original home sections
Setting::saveHomeSections($originalHome);
assert(Setting::getHomeSections()['properties_header']['title'] === $originalHome['properties_header']['title'], "Home sections should be restored");
echo "PASS: Setting::saveHomeSections() restored original value.\n";

echo "\n=== ALL CHECKS PASSED SUCCESSFULLY ===\n";

