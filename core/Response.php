<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Response
 *
 * Encapsulates HTTP response output: status codes, security headers,
 * HTML, JSON, redirects, and CSV file streaming.
 */
class Response
{
    protected int $statusCode = 200;
    protected string $content = '';
    protected array $headers = [];

    public function __construct(string $content = '', int $statusCode = 200, array $headers = [])
    {
        $this->content = $content;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    public static function make(string $content = '', int $statusCode = 200, array $headers = []): static
    {
        return new static($content, $statusCode, $headers);
    }

    public static function html(string $html, int $statusCode = 200, array $headers = []): static
    {
        $headers['Content-Type'] = 'text/html; charset=utf-8';
        return new static($html, $statusCode, $headers);
    }

    public static function json(mixed $data, int $statusCode = 200, array $headers = []): static
    {
        $headers['Content-Type'] = 'application/json; charset=utf-8';
        $content = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return new static($content ?: '{}', $statusCode, $headers);
    }

    public static function redirect(string $url, int $statusCode = 302): static
    {
        return new static('', $statusCode, ['Location' => $url]);
    }

    /**
     * Download data as a formatted CSV file.
     *
     * @param array<int, string> $headers Column header titles
     * @param array<int, array<int, mixed>> $rows Data rows
     * @param string $fileName
     * @return static
     */
    public static function csv(array $headers, array $rows, string $fileName = 'leads.csv'): static
    {
        $output = fopen('php://temp', 'r+');
        if ($output === false) {
            return static::make('Failed to generate CSV', 500);
        }

        // Add UTF-8 BOM for Excel compatibility
        fprintf($output, chr(0xEF) . chr(0xBB) . chr(0xBF));

        // Write header row
        fputcsv($output, $headers);

        // Write data rows
        foreach ($rows as $row) {
            fputcsv($output, (array) $row);
        }

        rewind($output);
        $csvContent = stream_get_contents($output);
        fclose($output);

        $responseHeaders = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . rawurlencode($fileName) . '"',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ];

        return new static($csvContent ?: '', 200, $responseHeaders);
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function status(int $code): static
    {
        $this->statusCode = $code;
        return $this;
    }

    public function header(string $key, string $value): static
    {
        $this->headers[$key] = $value;
        return $this;
    }

    public function send(): void
    {
        if (!headers_sent()) {
            http_response_code($this->statusCode);

            // Default security headers
            $defaults = [
                'X-Frame-Options' => 'SAMEORIGIN',
                'X-Content-Type-Options' => 'nosniff',
                'X-XSS-Protection' => '1; mode=block',
            ];

            foreach ($defaults as $k => $v) {
                if (!isset($this->headers[$k])) {
                    header("{$k}: {$v}");
                }
            }

            foreach ($this->headers as $name => $value) {
                header("{$name}: {$value}");
            }
        }

        echo $this->content;
    }
}
