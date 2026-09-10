<?php
declare(strict_types=1);

require_once __DIR__ . '/../core/Autoloader.php';
\Core\Autoloader::register(dirname(__DIR__));
\Core\Dotenv::load(dirname(__DIR__) . '/.env');

$db = \Core\Database::getInstance();
$row = $db->fetch("SELECT * FROM `settings` WHERE `key` = 'hero_settings'");
echo "HERO SETTINGS IN DB:\n";
print_r(json_decode($row['value'] ?? '{}', true));
