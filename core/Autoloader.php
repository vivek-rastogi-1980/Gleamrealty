<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Autoloader
 *
 * Standalone PSR-4 autoloader for Core\ and App\ namespaces.
 */
class Autoloader
{
    protected static array $prefixes = [];
    protected static bool $registered = false;

    public static function register(?string $basePath = null): void
    {
        if (static::$registered) {
            return;
        }

        $basePath = $basePath ?? dirname(__DIR__);

        static::addNamespace('Core\\', $basePath . DIRECTORY_SEPARATOR . 'core');
        static::addNamespace('App\\', $basePath . DIRECTORY_SEPARATOR . 'app');

        spl_autoload_register([static::class, 'loadClass'], true, true);
        static::$registered = true;
    }

    public static function addNamespace(string $prefix, string $baseDir): void
    {
        $prefix = trim($prefix, '\\') . '\\';
        $baseDir = rtrim($baseDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        static::$prefixes[$prefix] = $baseDir;
    }

    public static function loadClass(string $class): bool
    {
        foreach (static::$prefixes as $prefix => $baseDir) {
            $len = strlen($prefix);
            if (strncmp($prefix, $class, $len) !== 0) {
                continue;
            }

            $relativeClass = substr($class, $len);
            $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $relativeClass) . '.php';

            if (file_exists($file)) {
                require $file;
                return true;
            }
        }

        return false;
    }
}
