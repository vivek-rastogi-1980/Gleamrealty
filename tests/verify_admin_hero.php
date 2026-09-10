<?php

require 'c:/xampp/htdocs/Gleamrealty/core/Autoloader.php';
$base = 'c:/xampp/htdocs/Gleamrealty';
\Core\Autoloader::register($base);
\Core\Dotenv::load($base . '/.env');
require $base . '/core/helpers.php';
\Core\View::setViewsPath($base . '/views');

echo "=== TESTING ADMIN HERO CONTROLLER & VIEW RENDERING ===\n";

$hero = \App\Models\Setting::getHero();
$slides = \App\Models\HeroSlide::all();
$projects = \App\Models\Project::all();
$metrics = \App\Models\Setting::getMetrics();

ob_start();
extract([
    'seo_title' => 'Homepage Hero Section Manager',
    'hero' => $hero,
    'metrics' => $metrics,
    'slides' => $slides,
    'projects' => $projects,
]);
include $base . '/views/admin/hero/index.php';
$adminHtml = ob_get_clean();

echo "Admin Hero View Rendered Length: " . strlen($adminHtml) . " bytes\n";

$checks = [
    'Header Title' => 'Full-Screen Properties Slideshow Manager',
    'Autoplay Interval Input' => 'name="autoplay_interval"',
    'Rotation Style Selector' => 'name="rotation_style"',
    'Overlay Opacity Input' => 'name="overlay_opacity"',
    'Slide Title Input' => 'slide_title_',
    'Slide Badge Input' => 'slide_badge_',
    'Project Selector Dropdown' => 'slide_project_id_',
    'Add Slide Drawer' => 'new_slide_title',
    'Save Button' => 'Save All Changes',
];

$allPassed = true;
foreach ($checks as $label => $needle) {
    $found = strpos($adminHtml, $needle) !== false;
    echo "[" . ($found ? "PASS" : "FAIL") . "] $label\n";
    if (!$found) $allPassed = false;
}

if ($allPassed) {
    echo "\n>>> ALL ADMIN HERO MANAGER VERIFICATION CHECKS PASSED!\n";
} else {
    echo "\n>>> SOME ADMIN CHECKS FAILED!\n";
    exit(1);
}
