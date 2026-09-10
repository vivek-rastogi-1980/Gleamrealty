<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
\Core\Dotenv::load(__DIR__ . '/../.env');

// Authenticate session
\Core\Auth::attempt('admin@gleamrealty.com', 'Admin@12345');

$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI'] = '/admin/inquiries/export';

$router = new \Core\Router();
require __DIR__ . '/../routes/web.php';

$req = \Core\Request::capture();
$resp = $router->dispatch($req);

echo "CSV Status Code: " . $resp->getStatusCode() . "\n";
echo "CSV First 200 Bytes:\n" . substr($resp->getContent(), 0, 200) . "\n";
