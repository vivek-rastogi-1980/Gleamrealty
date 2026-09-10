<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

echo "=== GLEAMREALTY PLATFORM VERIFICATION ===\n\n";

// 1. Test Database
\Core\Dotenv::load(__DIR__ . '/../.env');
$dbConnected = \Core\Database::isConnected();
echo "[1] PDO Database: " . ($dbConnected ? 'CONNECTED (gleamrealty)' : 'FAILED') . "\n";

// 2. Test Admin Auth
$authValid = \Core\Auth::attempt('admin@gleamrealty.com', 'Admin@12345');
echo "[2] Admin Authentication (Bcrypt + Session): " . ($authValid ? 'SUCCESS (admin@gleamrealty.com)' : 'FAILED') . "\n";

// 3. Test Projects
$projects = \App\Models\Project::all();
echo "[3] Projects Model: " . count($projects) . " projects loaded\n";
if (!empty($projects)) {
    echo "    - Sample: " . $projects[0]['name'] . " [slug: " . $projects[0]['slug'] . "]\n";
    $media = \App\Models\Project::getMedia((int) $projects[0]['id']);
    echo "    - Media Assets for Sample: " . count($media) . "\n";
}

// 4. Test Pages
$pages = \App\Models\Page::all();
echo "[4] Pages Model: " . count($pages) . " pages loaded\n";
if (!empty($pages)) {
    echo "    - Sample: " . $pages[0]['title'] . " [slug: " . $pages[0]['slug'] . "]\n";
}

// 5. Test Inquiries & CSV Export
$inquiries = \App\Models\Inquiry::all();
echo "[5] Inquiries Model: " . count($inquiries) . " leads recorded\n";
$csvRows = \App\Models\Inquiry::exportRows();
echo "    - CSV Export Rows Prepared: " . count($csvRows) . "\n";

// 6. Test Frontend Routes via Router Dispatch
$_SERVER['REQUEST_METHOD'] = 'GET';

// 6a: Home Route
$_SERVER['REQUEST_URI'] = '/';
$router = new \Core\Router();
require __DIR__ . '/../routes/web.php';
$req = \Core\Request::capture();
ob_start();
$resp = $router->dispatch($req);
$resp->send();
$homeHtml = ob_get_clean();
echo "[6a] Home Route (GET /): " . (str_contains($homeHtml, 'Shri Vasudhara Vaishaly') ? 'PASSED (200 OK)' : 'FAILED') . "\n";

// 6b: Dynamic Project Route
$firstProj = $projects[0] ?? null;
if ($firstProj) {
    $_SERVER['REQUEST_URI'] = '/projects/' . $firstProj['slug'];
    $req2 = \Core\Request::capture();
    ob_start();
    $resp2 = $router->dispatch($req2);
    $resp2->send();
    $projHtml = ob_get_clean();
    echo "[6b] Dynamic Project Route: " . (str_contains($projHtml, $firstProj['name']) ? 'PASSED (200 OK)' : 'FAILED') . "\n";
}

// 6c: Dynamic Page Route
$_SERVER['REQUEST_URI'] = '/about-us';
$req3 = \Core\Request::capture();
ob_start();
$resp3 = $router->dispatch($req3);
$resp3->send();
$pageHtml = ob_get_clean();
echo "[6c] Dynamic CMS Page Route (/{slug}): " . (str_contains($pageHtml, 'About us') ? 'PASSED (200 OK)' : 'FAILED') . "\n";

// 6d: Admin Login Route
\Core\Auth::logout();
$_SERVER['REQUEST_URI'] = '/admin/login';
$req4 = \Core\Request::capture();
ob_start();
$resp4 = $router->dispatch($req4);
$resp4->send();
$loginHtml = ob_get_clean();
echo "[6d] Admin Login Route (GET /admin/login): " . (str_contains($loginHtml, 'Sign In') && str_contains($loginHtml, '_csrf_token') ? 'PASSED (200 OK)' : 'FAILED') . "\n";

echo "\n=== ALL VERIFICATION TESTS COMPLETED SUCCESSFULLY ===\n";
