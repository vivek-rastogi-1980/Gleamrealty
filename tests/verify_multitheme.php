<?php

declare(strict_types=1);

echo "=== GLEAMREALTY 3-THEME SYSTEM VERIFICATION ===\n\n";

$baseUrl = 'http://localhost/Gleamrealty';

function testUrl(string $url, string $label): string {
    $ctx = stream_context_create([
        'http' => [
            'timeout' => 5,
            'ignore_errors' => true,
        ]
    ]);
    $content = @file_get_contents($url, false, $ctx);
    if ($content === false) {
        echo "[-] {$label}: FAILED (Could not connect to {$url})\n";
        return '';
    }
    echo "[+] {$label}: CONNECTED (" . strlen($content) . " bytes)\n";
    return $content;
}

// 1. Test Theme 1: Light Green & White
echo "\n--- 1. Testing Light Green & White Theme (?theme=green) ---\n";
$greenHtml = testUrl($baseUrl . '/?theme=green', 'GET /?theme=green');
if ($greenHtml !== '') {
    $hasGreenAttr = str_contains($greenHtml, 'data-theme="green"');
    $hasForestGreen = str_contains($greenHtml, '--theme-text-primary: #24431F;');
    $hasSignatureGreen = str_contains($greenHtml, '--theme-section-alt-bg: #284A24;');
    $hasCrispWhiteCanvas = str_contains($greenHtml, '--theme-bg-canvas: #FFFFFF;');
    $hasEyebrowPricing = str_contains($greenHtml, 'FLOOR PLANS &amp; PRICING');
    $hasResidencesCrafted = str_contains($greenHtml, 'Residences crafted for');
    $hasPoolAndBar = str_contains($greenHtml, 'POOL &amp; BAR');
    $hasWellnessYoga = str_contains($greenHtml, 'WELLNESS &amp; YOGA');
    $hasConcierge = str_contains($greenHtml, 'WESTIN CONCIERGE');
    $hasClubhouse = str_contains($greenHtml, 'DOME CLUBHOUSE');
    $hasFloatingWhatsApp = str_contains($greenHtml, 'aria-label="WhatsApp Concierge"');

    echo "    - data-theme=\"green\" on <html>: " . ($hasGreenAttr ? "PASS" : "FAIL") . "\n";
    echo "    - Deep Forest Green (#24431F): " . ($hasForestGreen ? "PASS" : "FAIL") . "\n";
    echo "    - Signature Resort Green (#284A24): " . ($hasSignatureGreen ? "PASS" : "FAIL") . "\n";
    echo "    - Pure White Canvas (#FFFFFF): " . ($hasCrispWhiteCanvas ? "PASS" : "FAIL") . "\n";
    echo "    - Eyebrow 'FLOOR PLANS & PRICING': " . ($hasEyebrowPricing ? "PASS" : "FAIL") . "\n";
    echo "    - Headline 'Residences crafted for...': " . ($hasResidencesCrafted ? "PASS" : "FAIL") . "\n";
    echo "    - Card 1 (POOL & BAR): " . ($hasPoolAndBar ? "PASS" : "FAIL") . "\n";
    echo "    - Card 2 (WELLNESS & YOGA): " . ($hasWellnessYoga ? "PASS" : "FAIL") . "\n";
    echo "    - Card 3 (WESTIN CONCIERGE): " . ($hasConcierge ? "PASS" : "FAIL") . "\n";
    echo "    - Card 4 (DOME CLUBHOUSE): " . ($hasClubhouse ? "PASS" : "FAIL") . "\n";
    echo "    - Floating WhatsApp Concierge button: " . ($hasFloatingWhatsApp ? "PASS" : "FAIL") . "\n";
}

// 2. Test Theme 2: Dark Theme with Yellow
echo "\n--- 2. Testing Dark Theme with Yellow (?theme=dark-yellow) ---\n";
$darkYellowHtml = testUrl($baseUrl . '/?theme=dark-yellow', 'GET /?theme=dark-yellow');
if ($darkYellowHtml !== '') {
    $hasDarkAttr = str_contains($darkYellowHtml, 'data-theme="dark-yellow"');
    $hasObsidianBg = str_contains($darkYellowHtml, '--theme-bg-canvas: #0B0B0B;');
    $hasAmberYellow = str_contains($darkYellowHtml, '--theme-accent: #F59E0B;');
    $hasGoldLight = str_contains($darkYellowHtml, '--theme-metric-value: #FBBF24;');
    echo "    - data-theme=\"dark-yellow\" on <html>: " . ($hasDarkAttr ? "PASS" : "FAIL") . "\n";
    echo "    - Obsidian Canvas (#0B0B0B): " . ($hasObsidianBg ? "PASS" : "FAIL") . "\n";
    echo "    - Radiant Amber Yellow Accent (#F59E0B): " . ($hasAmberYellow ? "PASS" : "FAIL") . "\n";
    echo "    - Gold Metric Highlight (#FBBF24): " . ($hasGoldLight ? "PASS" : "FAIL") . "\n";
}

// 3. Test Theme 3: Blue & White
echo "\n--- 3. Testing Blue & White Theme (?theme=blue) ---\n";
$blueHtml = testUrl($baseUrl . '/?theme=blue', 'GET /?theme=blue');
if ($blueHtml !== '') {
    $hasBlueAttr = str_contains($blueHtml, 'data-theme="blue"');
    $hasPorcelainBg = str_contains($blueHtml, '--theme-bg-canvas: #F8FAFC;');
    $hasNavyText = str_contains($blueHtml, '--theme-text-primary: #0F172A;');
    $hasAzureAccent = str_contains($blueHtml, '--theme-accent: #0284C7;');
    echo "    - data-theme=\"blue\" on <html>: " . ($hasBlueAttr ? "PASS" : "FAIL") . "\n";
    echo "    - Clean Porcelain Canvas (#F8FAFC): " . ($hasPorcelainBg ? "PASS" : "FAIL") . "\n";
    echo "    - Deep Navy Primary (#0F172A): " . ($hasNavyText ? "PASS" : "FAIL") . "\n";
    echo "    - Royal Azure Accent (#0284C7): " . ($hasAzureAccent ? "PASS" : "FAIL") . "\n";
}

// 4. Test Theme Controls & Selectors
echo "\n--- 4. Testing Theme Controls & WhatsApp Button Placement ---\n";
if ($greenHtml !== '') {
    $hasNoHeaderPills = !str_contains($greenHtml, "aria-label=\"Select Theme\"");
    $hasPaletteButton = str_contains($greenHtml, "aria-label=\"Change Theme\"");
    $hasPalettePopover = str_contains($greenHtml, "x-show=\"themeMenuOpen\"");
    $hasGreenBtn = str_contains($greenHtml, "setTheme('green')");
    $hasDarkBtn = str_contains($greenHtml, "setTheme('dark-yellow')");
    $hasBlueBtn = str_contains($greenHtml, "setTheme('blue')");
    $hasNoOldStickyBar = !str_contains($greenHtml, "WhatsApp Desk");
    $hasFloatingWhatsApp = str_contains($greenHtml, "aria-label=\"WhatsApp Concierge\"");

    echo "    - Theme plate removed from header: " . ($hasNoHeaderPills ? "PASS" : "FAIL") . "\n";
    echo "    - Floating Palette theme button present: " . ($hasPaletteButton ? "PASS" : "FAIL") . "\n";
    echo "    - Palette Popover dropdown with 3 themes: " . ($hasPalettePopover && $hasGreenBtn && $hasDarkBtn && $hasBlueBtn ? "PASS" : "FAIL") . "\n";
    echo "    - Old sticky bar with 'WhatsApp Desk' removed: " . ($hasNoOldStickyBar ? "PASS" : "FAIL") . "\n";
    echo "    - Clean floating WhatsApp button present: " . ($hasFloatingWhatsApp ? "PASS" : "FAIL") . "\n";
}

// 5. Test Project Page & Page Route Theming
echo "\n--- 5. Testing Subpages & Subcomponents ---\n";
$projHtml = testUrl($baseUrl . '/projects/shri-vasudhara-vaishaly-premium-residential-plots?theme=blue', 'Project Detail (?theme=blue)');
if ($projHtml !== '') {
    $hasProjTheming = str_contains($projHtml, 'data-theme="blue"');
    $hasThemeTab = str_contains($projHtml, 'var(--theme-accent)');
    echo "    - Project page rendered with data-theme=\"blue\": " . ($hasProjTheming ? "PASS" : "FAIL") . "\n";
    echo "    - Project tabs/cards bound to theme variables: " . ($hasThemeTab ? "PASS" : "FAIL") . "\n";
}

$pageHtml = testUrl($baseUrl . '/about-us?theme=dark-yellow', 'CMS Page /about-us (?theme=dark-yellow)');
if ($pageHtml !== '') {
    $hasPageTheming = str_contains($pageHtml, 'data-theme="dark-yellow"');
    $hasArticleThemed = str_contains($pageHtml, 'var(--theme-section-card-bg)');
    echo "    - CMS page rendered with data-theme=\"dark-yellow\": " . ($hasPageTheming ? "PASS" : "FAIL") . "\n";
    echo "    - CMS article bound to theme variables: " . ($hasArticleThemed ? "PASS" : "FAIL") . "\n";
}

echo "\n=== MULTI-THEME VERIFICATION FINISHED ===\n";
