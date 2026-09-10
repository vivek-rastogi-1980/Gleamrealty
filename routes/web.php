<?php

declare(strict_types=1);

/**
 * Web Routes Configuration
 *
 * @var Core\Router $router
 */

// -------------------------------------------------------------
// Public Frontend Routes
// -------------------------------------------------------------
$router->get('/', 'HomeController@index');
$router->get('/projects', 'ProjectController@index');
$router->get('/projects/{slug}', 'ProjectController@show');
$router->get('/project/{slug}', 'ProjectController@show'); // Dual route compatibility
$router->get('/about-us', 'PageController@aboutUs');
$router->get('/contact-us', 'PageController@contactUs');
$router->get('/residential-plots-in-vrindavan', 'PageController@residentialPlots');
$router->get('/property-in-vrindavan', 'PageController@propertyInVrindavan');
$router->get('/commercial-property-in-vrindavan', 'PageController@commercialProperty');
$router->get('/luxury-villas-in-vrindavan', 'PageController@luxuryVillas');
$router->get('/property-in-mathura', 'PageController@propertyInMathura');
$router->get('/plot-rate-vrindavan', 'PageController@plotRateVrindavan');
$router->get('/plot-rate-mathura', 'PageController@plotRateMathura');
$router->get('/flats-apartments-in-vrindavan', 'PageController@flatsApartments');
$router->get('/location/{city}', 'LocationController@show');
$router->get('/page/{slug}', 'PageController@show');

// Public Editorial & Blog Routes
$router->get('/blog', 'BlogController@index');
$router->get('/blogs', 'BlogController@index');
$router->get('/blog/{slug}', 'BlogController@show');

$router->post('/inquire', 'InquiryController@submit');
$router->post('/api/inquiry.php', function (\Core\Request $request) {
    require_once __DIR__ . '/../api/inquiry.php';
    exit;
});
$router->post('/api/inquiry', function (\Core\Request $request) {
    require_once __DIR__ . '/../api/inquiry.php';
    exit;
});

// -------------------------------------------------------------
// Admin Authentication Routes
// -------------------------------------------------------------
$router->get('/admin', function () {
    header('Location: ' . url('/admin/dashboard'));
    exit;
});
$router->get('/admin/login', 'Admin\AuthController@showLogin');
$router->post('/admin/login', 'Admin\AuthController@login');
$router->get('/admin/logout', 'Admin\AuthController@logout');
$router->post('/admin/logout', 'Admin\AuthController@logout');

// -------------------------------------------------------------
// Admin Dashboard & Management Routes
// -------------------------------------------------------------
$router->get('/admin/dashboard', 'Admin\DashboardController@index');

// Homepage Hero Section Manager
$router->get('/admin/hero', 'Admin\HeroController@index');
$router->post('/admin/hero', 'Admin\HeroController@update');
$router->post('/admin/hero/slides/{id}/delete', 'Admin\HeroController@deleteSlide');

// Homepage Content Sections Manager (except hero)
$router->get('/admin/home', 'Admin\HomeController@index');
$router->post('/admin/home', 'Admin\HomeController@update');

// Projects CRUD
$router->get('/admin/projects', 'Admin\ProjectController@index');
$router->get('/admin/projects/create', 'Admin\ProjectController@create');
$router->post('/admin/projects', 'Admin\ProjectController@store');
$router->get('/admin/projects/{id}/edit', 'Admin\ProjectController@edit');
$router->post('/admin/projects/{id}', 'Admin\ProjectController@update');
$router->post('/admin/projects/{id}/delete', 'Admin\ProjectController@delete');

// Project Media Manager
$router->get('/admin/projects/{id}/media', 'Admin\MediaController@index');
$router->post('/admin/projects/{id}/media', 'Admin\MediaController@upload');
$router->post('/admin/media/{id}/delete', 'Admin\MediaController@delete');

// Pages CRUD
$router->get('/admin/pages', 'Admin\PageController@index');
$router->get('/admin/pages/create', 'Admin\PageController@create');
$router->post('/admin/pages', 'Admin\PageController@store');
$router->get('/admin/pages/{id}/edit', 'Admin\PageController@edit');
$router->post('/admin/pages/{id}', 'Admin\PageController@update');
$router->post('/admin/pages/{id}/delete', 'Admin\PageController@delete');

// Blog & Editorial Articles CRUD
$router->get('/admin/blogs', 'Admin\BlogController@index');
$router->get('/admin/blogs/create', 'Admin\BlogController@create');
$router->post('/admin/blogs', 'Admin\BlogController@store');
$router->get('/admin/blogs/{id}/edit', 'Admin\BlogController@edit');
$router->post('/admin/blogs/{id}', 'Admin\BlogController@update');
$router->post('/admin/blogs/{id}/delete', 'Admin\BlogController@delete');

// Inquiry Leads & CSV Export
$router->get('/admin/inquiries', 'Admin\InquiryController@index');
$router->get('/admin/inquiries/export', 'Admin\InquiryController@export');
$router->post('/admin/inquiries/{id}/delete', 'Admin\InquiryController@delete');

// -------------------------------------------------------------
// Fallback CMS Dynamic Page Catch-All (placed last)
// -------------------------------------------------------------
$router->get('/{slug}', 'PageController@show');
