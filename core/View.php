<?php

declare(strict_types=1);

namespace Core;

use RuntimeException;

/**
 * Class View
 *
 * View Engine with layout inheritance and output buffering.
 */
class View
{
    protected static string $viewsPath;

    public static function setViewsPath(?string $path = null): void
    {
        static::$viewsPath = $path ?? dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views';
    }

    public static function render(string $view, array $data = [], ?string $layout = 'layouts/main'): string
    {
        if (empty(static::$viewsPath)) {
            static::setViewsPath();
        }

        $viewFile = static::resolvePath($view);
        if (!file_exists($viewFile)) {
            throw new RuntimeException("View file not found: [{$viewFile}]");
        }

        $content = static::renderFile($viewFile, $data);

        if ($layout === null) {
            return $content;
        }

        $layoutFile = static::resolvePath($layout);
        if (!file_exists($layoutFile)) {
            throw new RuntimeException("Layout file not found: [{$layoutFile}]");
        }

        $layoutData = array_merge($data, ['content' => $content]);
        return static::renderFile($layoutFile, $layoutData);
    }

    protected static function renderFile(string $file, array $data): string
    {
        extract($data, EXTR_SKIP);

        ob_start();
        try {
            include $file;
        } catch (\Throwable $e) {
            ob_end_clean();
            throw $e;
        }

        return (string) ob_get_clean();
    }

    protected static function resolvePath(string $view): string
    {
        $normalized = str_replace(['.', '/'], DIRECTORY_SEPARATOR, $view);
        return static::$viewsPath . DIRECTORY_SEPARATOR . $normalized . '.php';
    }
}
