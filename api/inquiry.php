<?php

declare(strict_types=1);

/**
 * Gleamrealty — Public Lead Capture API Endpoint
 * Handles AJAX and direct form submissions to /api/inquiry.php
 */

require_once __DIR__ . '/../core/Autoloader.php';
\Core\Autoloader::register(dirname(__DIR__));
\Core\Dotenv::load(dirname(__DIR__) . '/.env');

if (file_exists(dirname(__DIR__) . '/core/helpers.php')) {
    require_once dirname(__DIR__) . '/core/helpers.php';
}

header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
if (strtoupper($method) !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed. Only POST is accepted.']);
    exit;
}

// Read JSON input or POST form data
$rawBody = file_get_contents('php://input');
$inputData = [];

if (!empty($rawBody)) {
    $decoded = json_decode($rawBody, true);
    if (is_array($decoded)) {
        $inputData = $decoded;
    }
}

if (empty($inputData)) {
    $inputData = $_POST;
}

$name = trim(strip_tags((string) ($inputData['name'] ?? '')));
$phone = trim(strip_tags((string) ($inputData['phone'] ?? $inputData['mobile'] ?? '')));
$email = trim(strip_tags((string) ($inputData['email'] ?? '')));
$projectId = !empty($inputData['project_id']) ? (int) $inputData['project_id'] : (!empty($inputData['pro_id']) ? (int) $inputData['pro_id'] : null);
$budget = trim(strip_tags((string) ($inputData['budget_range'] ?? '')));
$state = trim(strip_tags((string) ($inputData['state'] ?? '')));
$visitDate = trim(strip_tags((string) ($inputData['visit_date'] ?? '')));
$rawMessage = trim(strip_tags((string) ($inputData['message'] ?? '')));

// Preserve extra metadata (State, Preferred Visit Date) cleanly in the lead record
$extraInfo = [];
if ($state !== '') {
    $extraInfo[] = "State: {$state}";
}
if ($visitDate !== '') {
    $extraInfo[] = "Preferred Visit Date: {$visitDate}";
}
if (!empty($extraInfo)) {
    $message = ($rawMessage !== '' ? $rawMessage . "\n[" . implode(' | ', $extraInfo) . "]" : '[' . implode(' | ', $extraInfo) . ']');
} else {
    $message = $rawMessage;
}

if (empty($name) || empty($phone)) {
    http_response_code(422);
    echo json_encode([
        'status' => 'error',
        'message' => 'Please provide your full name and a valid contact phone number.'
    ]);
    exit;
}

try {
    $id = \App\Models\Inquiry::create([
        'project_id' => $projectId,
        'name' => $name,
        'phone' => $phone,
        'email' => $email ?: null,
        'budget_range' => $budget ?: null,
        'message' => $message ?: null,
    ]);

    // Check if redirect is requested via HTML form
    $isJson = str_contains($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') ||
              str_contains($_SERVER['CONTENT_TYPE'] ?? '', 'application/json') ||
              strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'xmlhttprequest';

    if (!$isJson && !empty($inputData['return_url'])) {
        \Core\Auth::startSession();
        $_SESSION['flash_success'] = 'Thank you! Your private showing request has been received.';
        header('Location: ' . $inputData['return_url']);
        exit;
    }

    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you! Your private showing inquiry has been received. Our VIP property concierge will contact you promptly.',
        'lead_id' => $id,
    ]);
} catch (\Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'An error occurred while saving your inquiry: ' . $e->getMessage(),
    ]);
}
exit;
