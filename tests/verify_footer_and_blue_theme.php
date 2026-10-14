<?php
/**
 * Test Suite: Verify Footer Fix & Universal Blue Theme Applicability
 */

require_once __DIR__ . '/../core/helpers.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../app/Models/Setting.php';

echo "=== TESTING UNIVERSAL BLUE THEME & FOOTER FIX ===\n\n";

// Test 1: Setting::getActiveTheme() default
unset($_COOKIE['gleam_theme']);
unset($_GET['theme']);
$defaultTheme = \App\Models\Setting::getActiveTheme();
echo "1. Default active theme without cookie: {$defaultTheme} - " . ($defaultTheme === 'blue' ? "PASS" : "FAIL") . "\n";

// Test 2: Legacy green cookie migration
$_COOKIE['gleam_theme'] = 'green';
$migratedTheme = \App\Models\Setting::getActiveTheme();
echo "2. Active theme with legacy 'green' cookie: {$migratedTheme} - " . ($migratedTheme === 'blue' ? "PASS" : "FAIL") . "\n";

// Test 3: Legacy warm-ivory cookie migration
$_COOKIE['gleam_theme'] = 'warm-ivory';
$warmTheme = \App\Models\Setting::getActiveTheme();
echo "3. Active theme with legacy 'warm-ivory' cookie: {$warmTheme} - " . ($warmTheme === 'blue' ? "PASS" : "FAIL") . "\n";

// Test 4: Main layout footer icons
$layoutFile = file_get_contents(__DIR__ . '/../views/layouts/main.php');

$hasBrokenW45 = str_contains($layoutFile, 'w-4.5');
echo "4. No broken 'w-4.5' utility classes in main.php: " . (!$hasBrokenW45 ? "PASS" : "FAIL") . "\n";

$hasContactIcon = str_contains($layoutFile, 'footer-contact-icon') && str_contains($layoutFile, 'width="18"') && str_contains($layoutFile, 'height="18"');
echo "5. Footer contact icons have strict 18px dimensions: " . ($hasContactIcon ? "PASS" : "FAIL") . "\n";

$hasSocialIcon = str_contains($layoutFile, 'footer-social-icon') && str_contains($layoutFile, 'width="16"') && str_contains($layoutFile, 'height="16"');
echo "6. Footer social icons have strict 16px dimensions: " . ($hasSocialIcon ? "PASS" : "FAIL") . "\n";

$hasStrictCss = str_contains($layoutFile, 'footer svg.footer-contact-icon') && str_contains($layoutFile, 'width: 18px !important;');
echo "7. Strict CSS rules for footer icon sizing present: " . ($hasStrictCss ? "PASS" : "FAIL") . "\n";

$hasNavySection = str_contains($layoutFile, '--theme-section-alt-bg: #0F1D32;');
echo "8. Midnight navy (#0F1D32) section defined for theme: " . ($hasNavySection ? "PASS" : "FAIL") . "\n";

$hasSkyAccent = str_contains($layoutFile, '--theme-section-alt-accent: #38BDF8;');
echo "9. Sky blue (#38BDF8) alt accent defined for theme: " . ($hasSkyAccent ? "PASS" : "FAIL") . "\n";

echo "\nAll automated checks finished.\n";
