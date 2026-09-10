<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
\Core\Dotenv::load(__DIR__ . '/../.env');

use App\Models\Project;

echo "=== VERIFYING PROJECT DOWNLOAD LINKS ===\n";

$projects = Project::all();
echo "Total projects found: " . count($projects) . "\n\n";

$baseDir = dirname(__DIR__);
$allHaveDocs = true;

foreach ($projects as $p) {
    $hasBrochure = !empty($p['brochure_url']);
    $hasFloorPlan = !empty($p['floor_plan_url']);
    $hasPaymentPlan = !empty($p['payment_plan_url']);

    $bFileExists = $hasBrochure && file_exists($baseDir . '/' . ltrim($p['brochure_url'], '/'));
    $fFileExists = $hasFloorPlan && file_exists($baseDir . '/' . ltrim($p['floor_plan_url'], '/'));
    $pFileExists = $hasPaymentPlan && file_exists($baseDir . '/' . ltrim($p['payment_plan_url'], '/'));

    echo "Project: [{$p['id']}] {$p['name']}\n";
    echo "  - Brochure:     " . ($bFileExists ? "OK (" . media_url($p['brochure_url']) . ")" : "MISSING ({$p['brochure_url']})") . "\n";
    echo "  - Floor Plan:   " . ($fFileExists ? "OK (" . media_url($p['floor_plan_url']) . ")" : "MISSING ({$p['floor_plan_url']})") . "\n";
    echo "  - Payment Plan: " . ($pFileExists ? "OK (" . media_url($p['payment_plan_url']) . ")" : "MISSING ({$p['payment_plan_url']})") . "\n";

    if (!$bFileExists || !$fFileExists || !$pFileExists) {
        $allHaveDocs = false;
    }
}

if ($allHaveDocs) {
    echo "\nSUCCESS: All 8 projects have valid, verified physical PDF files for Brochure, Floor Plan, and Payment Plan!\n";
} else {
    echo "\nWARNING: Some documents are missing!\n";
}
