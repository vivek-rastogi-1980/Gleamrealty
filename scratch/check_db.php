<?php
$basePath = dirname(__DIR__);
require_once $basePath . '/core/Autoloader.php';
\Core\Autoloader::register($basePath);
\Core\Dotenv::load($basePath . '/.env');

$pdo = \Core\Database::connection();

$tables = ['pages', 'projects', 'blogs', 'settings', 'hero_slides'];
foreach ($tables as $t) {
    try {
        $cols = $pdo->query("SHOW COLUMNS FROM `$t`")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($cols as $c) {
            $field = $c['Field'];
            $stmt = $pdo->query("SELECT id FROM `$t` WHERE `$field` LIKE '%Braj Bhumi Sanctuary%'");
            $res = $stmt ? $stmt->fetchAll(PDO::FETCH_COLUMN) : [];
            if (!empty($res)) {
                echo "Found 'Braj Bhumi Sanctuary' in table $t column $field: IDs " . implode(',', $res) . "\n";
            }
        }
    } catch (Exception $e) {}
}
