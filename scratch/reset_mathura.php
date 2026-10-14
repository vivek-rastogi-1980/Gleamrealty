<?php
require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new \PDO('sqlite:' . __DIR__ . '/../database/database.sqlite');
$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("DELETE FROM settings WHERE key = 'plot_rate_mathura_sections'");
$stmt->execute();
echo "Successfully reset Mathura sections to default! FAQs will now show up.\n";
