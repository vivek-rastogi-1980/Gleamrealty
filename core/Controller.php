<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Controller
 *
 * Base Controller providing view rendering, JSON output, redirects, and session flash alerts.
 */
abstract class Controller
{
    protected function view(string $view, array $data = [], ?string $layout = 'layouts/main'): Response
    {
        $html = View::render($view, $data, $layout);
        return Response::html($html);
    }

    protected function adminView(string $view, array $data = []): Response
    {
        $this->requireAuth();
        $html = View::render($view, $data, 'layouts/admin');
        return Response::html($html);
    }

    protected function json(mixed $data, int $status = 200, array $headers = []): Response
    {
        return Response::json($data, $status, $headers);
    }

    protected function redirect(string $url, int $status = 302): Response
    {
        return Response::redirect($url, $status);
    }

    protected function requireAuth(): void
    {
        if (!Auth::check()) {
            $_SESSION['flash_error'] = 'Please sign in to access the Admin Console.';
            header('Location: ' . url('/admin/login'));
            exit;
        }
    }

    protected function flash(string $key, string $message): void
    {
        Auth::startSession();
        $_SESSION["flash_{$key}"] = $message;
    }
}
