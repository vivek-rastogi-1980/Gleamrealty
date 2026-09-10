<?php

declare(strict_types=1);

/**
 * Gleamrealty — Front Controller Entry Point
 */

$basePath = __DIR__;

// Autoloader
require_once $basePath . '/core/Autoloader.php';
\Core\Autoloader::register($basePath);

// Environment
\Core\Dotenv::load($basePath . '/.env');

// Global Helpers
if (file_exists($basePath . '/core/helpers.php')) {
    require_once $basePath . '/core/helpers.php';
}

// Set Views Directory
\Core\View::setViewsPath($basePath . '/views');

// Initialize Router & Web Routes
$router = new \Core\Router();
$routesFile = $basePath . '/routes/web.php';
if (file_exists($routesFile)) {
    require $routesFile;
}

// Capture Request & Dispatch
$request = \Core\Request::capture();
$response = $router->dispatch($request);
$response->send();
