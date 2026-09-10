<?php

declare(strict_types=1);

use Core\Auth;
use Core\Csrf;
use Core\Dotenv;

if (!function_exists('e')) {
    function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        return Dotenv::get($key, $default);
    }
}

if (!function_exists('url')) {
    function url(string $path = ''): string
    {
        $baseUrl = rtrim((string) env('APP_URL', 'http://localhost/Gleamrealty'), '/');
        $trimmed = ltrim($path, '/');
        return $trimmed !== '' ? "{$baseUrl}/{$trimmed}" : $baseUrl;
    }
}

if (!function_exists('asset')) {
    function asset(string $path): string
    {
        return url('/public/' . ltrim($path, '/'));
    }
}

if (!function_exists('media_url')) {
    function media_url(?string $path): string
    {
        if (empty($path)) {
            return 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=80';
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        return url('/' . ltrim($path, '/'));
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(): string
    {
        return Csrf::token();
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return Csrf::field();
    }
}

if (!function_exists('flash')) {
    function flash(string $key): ?string
    {
        Auth::startSession();
        $sessionKey = "flash_{$key}";
        if (isset($_SESSION[$sessionKey])) {
            $msg = (string) $_SESSION[$sessionKey];
            unset($_SESSION[$sessionKey]);
            return $msg;
        }
        return null;
    }
}

if (!function_exists('has_flash')) {
    function has_flash(string $key): bool
    {
        Auth::startSession();
        return isset($_SESSION["flash_{$key}"]);
    }
}

if (!function_exists('auth_user')) {
    function auth_user(): ?array
    {
        return Auth::user();
    }
}

if (!function_exists('slugify')) {
    function slugify(string $text): string
    {
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text ?: '');
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text ?: '');
        // Trim
        $text = trim($text ?: '', '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text ?: '');
        // Lowercase
        return strtolower($text ?: 'item-' . time());
    }
}
