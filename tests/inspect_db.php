<?php
declare(strict_types=1);

require_once __DIR__ . '/../core/Autoloader.php';
\Core\Autoloader::register(dirname(__DIR__));
\Core\Dotenv::load(dirname(__DIR__) . '/.env');

$db = \Core\Database::getInstance();

echo "--- project_media columns ---\n";
print_r($db->fetchAll("DESCRIBE project_media"));

echo "\n--- existing settings keys ---\n";
print_r($db->fetchAll("SELECT `key` FROM `settings`"));

echo "\n--- existing projects ---\n";
print_r($db->fetchAll("SELECT id, name, slug, location, starting_price FROM `projects`"));

echo "\n--- existing pages ---\n";
print_r($db->fetchAll("SELECT id, title, slug FROM `pages`"));
