<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Request
 *
 * Encapsulates HTTP request data, URI resolution, sanitized inputs, and files.
 */
class Request
{
    protected string $method;
    protected string $uri;
    protected string $path;
    protected array $query;
    protected array $post;
    protected array $files;
    protected array $server;
    protected array $params = [];

    public function __construct(
        array $query = [],
        array $post = [],
        array $files = [],
        array $server = []
    ) {
        $this->query = $query;
        $this->post = $post;
        $this->files = $files;
        $this->server = $server;

        $method = strtoupper($this->server['REQUEST_METHOD'] ?? 'GET');
        if ($method === 'POST' && isset($this->post['_method'])) {
            $method = strtoupper((string) $this->post['_method']);
        }
        $this->method = $method;

        $rawUri = $this->server['REQUEST_URI'] ?? '/';
        $this->uri = $rawUri;
        $parsedPath = parse_url($rawUri, PHP_URL_PATH) ?? '/';

        // Auto-detect project subfolder (e.g. /Gleamrealty) across Windows and Linux
        $scriptName = $this->server['SCRIPT_NAME'] ?? '';
        $baseDir = str_replace('\\', '/', dirname($scriptName));
        if ($baseDir !== '/' && $baseDir !== '.' && str_starts_with($parsedPath, $baseDir)) {
            $parsedPath = substr($parsedPath, strlen($baseDir));
        }

        $trimmed = '/' . trim($parsedPath, '/');
        $this->path = $trimmed === '' ? '/' : $trimmed;
    }

    public static function capture(): static
    {
        return new static($_GET, $_POST, $_FILES, $_SERVER);
    }

    public function method(): string
    {
        return $this->method;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function setParams(array $params): static
    {
        $this->params = $params;
        return $this;
    }

    public function param(string $key, mixed $default = null): mixed
    {
        return $this->params[$key] ?? $default;
    }

    public function params(): array
    {
        return $this->params;
    }

    public function query(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return $this->query;
        }
        return $this->query[$key] ?? $default;
    }

    public function post(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return $this->post;
        }
        return $this->post[$key] ?? $default;
    }

    /**
     * Retrieve input with string sanitization.
     */
    public function input(string $key, mixed $default = null): mixed
    {
        $val = $this->post[$key] ?? $this->query[$key] ?? $this->params[$key] ?? $default;

        if (is_string($val)) {
            return trim(strip_tags($val));
        }

        return $val;
    }

    /**
     * Retrieve raw input without strip_tags (e.g., for rich HTML content or map embeds).
     */
    public function raw(string $key, mixed $default = null): mixed
    {
        return $this->post[$key] ?? $this->query[$key] ?? $default;
    }

    public function file(string $key): ?array
    {
        return $this->files[$key] ?? null;
    }

    public function all(): array
    {
        return array_merge($this->query, $this->post, $this->params);
    }
}
