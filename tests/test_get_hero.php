<?php
declare(strict_types=1);

require_once __DIR__ . '/../core/Autoloader.php';
\Core\Autoloader::register(dirname(__DIR__));
\Core\Dotenv::load(dirname(__DIR__) . '/.env');
if (file_exists(dirname(__DIR__) . '/core/helpers.php')) {
    require_once dirname(__DIR__) . '/core/helpers.php';
}

$hero = \App\Models\Setting::getHero();
echo "Line 1: " . $hero['heading_line1'] . "\n";
echo "Line 2: " . $hero['heading_line2'] . "\n";
echo "Line 3: " . $hero['heading_line3'] . "\n";
echo "Active Slides: " . count($hero['slides']) . "\n";
foreach ($hero['slides'] as $s) {
    echo "  - " . $s['title'] . " (" . $s['location_tag'] . ")\n";
}
