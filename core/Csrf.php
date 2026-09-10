<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Csrf
 *
 * Cryptographic CSRF token generation and validation.
 */
class Csrf
{
    public static function token(): string
    {
        Auth::startSession();

        if (empty($_SESSION['_csrf_token'])) {
            $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
        }

        return (string) $_SESSION['_csrf_token'];
    }

    public static function field(): string
    {
        $token = static::token();
        return '<input type="hidden" name="_csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
    }

    public static function validate(?string $token = null): bool
    {
        Auth::startSession();

        if ($token === null) {
            $token = $_POST['_csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
        }

        $sessionToken = $_SESSION['_csrf_token'] ?? '';

        if (empty($sessionToken) || empty($token)) {
            return false;
        }

        return hash_equals($sessionToken, (string) $token);
    }
}
