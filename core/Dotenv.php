<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Dotenv
 *
 * Lightweight environment variable parser for .env files.
 */
class Dotenv
{
    protected static array $repository = [];

    public static function load(string $filePath): bool
    {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            return false;
        }

        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return false;
        }

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }

            if (!str_contains($line, '=')) {
                continue;
            }

            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            if (
                (str_starts_with($value, '"') && str_ends_with($value, '"')) ||
                (str_starts_with($value, "'") && str_ends_with($value, "'"))
            ) {
                $value = substr($value, 1, -1);
            } else {
                if (str_contains($value, '#')) {
                    $parts = explode('#', $value, 2);
                    $value = trim($parts[0]);
                }
            }

            $parsedValue = match (strtolower($value)) {
                'true', '(true)' => true,
                'false', '(false)' => false,
                'null', '(null)' => null,
                'empty', '(empty)' => '',
                default => $value,
            };

            static::$repository[$key] = $parsedValue;
            $_ENV[$key] = $parsedValue;
            $_SERVER[$key] = $parsedValue;
            putenv("{$key}={$value}");
        }

        return true;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, static::$repository)) {
            return static::$repository[$key];
        }

        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        $val = getenv($key);
        if ($val !== false) {
            return match (strtolower((string) $val)) {
                'true', '(true)' => true,
                'false', '(false)' => false,
                'null', '(null)' => null,
                default => $val,
            };
        }

        return $default;
    }
}
