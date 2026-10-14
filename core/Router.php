<?php

declare(strict_types=1);

namespace Core;

use RuntimeException;

/**
 * Class Router
 *
 * Directs HTTP requests to controller actions or closures based on URI matching.
 */
class Router
{
    protected array $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => [],
    ];

    public function get(string $uri, mixed $action): static
    {
        return $this->add('GET', $uri, $action);
    }

    public function post(string $uri, mixed $action): static
    {
        return $this->add('POST', $uri, $action);
    }

    public function put(string $uri, mixed $action): static
    {
        return $this->add('PUT', $uri, $action);
    }

    public function delete(string $uri, mixed $action): static
    {
        return $this->add('DELETE', $uri, $action);
    }

    public function add(string $method, string $uri, mixed $action): static
    {
        $method = strtoupper($method);
        $normalized = '/' . trim($uri, '/');
        if ($normalized !== '/') {
            $normalized = rtrim($normalized, '/');
        }

        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9\-_]+)', $normalized);
        $pattern = '#^' . $pattern . '$#u';

        $this->routes[$method][] = [
            'uri' => $normalized,
            'pattern' => $pattern,
            'action' => $action,
        ];

        return $this;
    }

    public function dispatch(Request $request): Response
    {
        $method = $request->method();
        if ($method === 'HEAD') {
            $method = 'GET';
        }

        $path = $request->path();
        if ($path !== '/') {
            $path = rtrim($path, '/');
        }

        $routesForMethod = $this->routes[$method] ?? [];

        foreach ($routesForMethod as $route) {
            if (preg_match($route['pattern'], $path, $matches)) {
                $params = [];
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }

                $request->setParams($params);
                return $this->executeAction($route['action'], $request, $params);
            }
        }

        return Response::html(
            '<!DOCTYPE html><html><head><title>404 Not Found</title><style>body{background:#090d16;color:#fff;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}h1{font-size:36px;color:#c5a880;}p{color:#888;}a{color:#c5a880;}</style></head><body><div><h1>404 — Page Not Found</h1><p>The requested page or project does not exist.</p><p style="margin-top:20px;"><a href="' . url('/') . '">&larr; Return to Home</a></p></div></body></html>',
            404
        );
    }

    protected function executeAction(mixed $action, Request $request, array $params): Response
    {
        if (is_callable($action)) {
            $result = call_user_func_array($action, array_merge([$request], $params));
            return $this->normalizeResponse($result);
        }

        if (is_string($action) && str_contains($action, '@')) {
            [$controller, $method] = explode('@', $action, 2);
            $action = [$controller, $method];
        }

        if (is_array($action)) {
            [$controllerClass, $method] = $action;

            if (!str_starts_with($controllerClass, 'App\\') && !str_starts_with($controllerClass, '\\')) {
                $controllerClass = 'App\\Controllers\\' . $controllerClass;
            }

            if (!class_exists($controllerClass)) {
                throw new RuntimeException("Controller class not found: [{$controllerClass}]");
            }

            $instance = new $controllerClass();
            if (!method_exists($instance, $method)) {
                throw new RuntimeException("Method [{$method}] does not exist on controller [{$controllerClass}].");
            }

            $result = call_user_func_array([$instance, $method], array_merge([$request], array_values($params)));
            return $this->normalizeResponse($result);
        }

        throw new RuntimeException("Invalid route action.");
    }

    protected function normalizeResponse(mixed $result): Response
    {
        if ($result instanceof Response) {
            return $result;
        }

        if (is_array($result) || is_object($result)) {
            return Response::json($result);
        }

        return Response::html((string) $result);
    }
}
