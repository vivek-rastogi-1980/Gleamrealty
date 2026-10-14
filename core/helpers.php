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
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $clean = ltrim($path, '/');
        if (str_starts_with($clean, 'public/')) {
            return url('/' . $clean);
        }

        return url('/public/' . $clean);
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

        $clean = ltrim($path, '/');
        if (!str_starts_with($clean, 'public/')) {
            $clean = 'public/' . $clean;
        }

        return url('/' . $clean);
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

if (!function_exists('company_address')) {
    function company_address(): string
    {
        return \App\Models\Setting::getOfficeAddress();
    }
}

if (!function_exists('company_map_embed_url')) {
    function company_map_embed_url(): string
    {
        return \App\Models\Setting::getOfficeMapEmbedUrl();
    }
}

if (!function_exists('company_map_directions_url')) {
    function company_map_directions_url(): string
    {
        return \App\Models\Setting::getOfficeDirectionsUrl();
    }
}

if (!function_exists('company_phone_1')) {
    function company_phone_1(): string
    {
        $contact = \App\Models\Setting::getContactSections();
        return (string) ($contact['office']['phone_1'] ?? '+91 9871731303');
    }
}

if (!function_exists('company_phone_2')) {
    function company_phone_2(): string
    {
        $contact = \App\Models\Setting::getContactSections();
        return (string) ($contact['office']['phone_2'] ?? '+91 7409767452');
    }
}

if (!function_exists('company_whatsapp')) {
    function company_whatsapp(): string
    {
        $contact = \App\Models\Setting::getContactSections();
        return (string) ($contact['office']['whatsapp'] ?? '+91 9871731303');
    }
}

if (!function_exists('company_email')) {
    function company_email(): string
    {
        $contact = \App\Models\Setting::getContactSections();
        return (string) ($contact['office']['email'] ?? 'contact@gleamrealty.com');
    }
}

if (!function_exists('format_embed_url')) {
    /**
     * Convert YouTube or Vimeo URLs (watch, short, live, shorts, share, or full iframe)
     * into a clean, embeddable iframe URL.
     */
    function format_embed_url(?string $url): string
    {
        if (empty($url)) {
            return '';
        }

        $url = trim($url);

        // If user pasted an iframe tag, extract the src attribute
        if (preg_match('/<iframe\b[^>]*\bsrc=["\']([^"\']+)["\']/i', $url, $iframeMatch)) {
            $url = trim($iframeMatch[1]);
        }

        // YouTube embed URL (already formatted)
        if (preg_match('~^https?://(?:www\.)?youtube(?:-nocookie)?\.com/embed/([a-zA-Z0-9_-]{11})~i', $url, $ytEmbedMatch)) {
            return 'https://www.youtube.com/embed/' . $ytEmbedMatch[1];
        }

        // YouTube standard watch, short URL, shorts, live, or mobile
        if (preg_match('~(?:youtube(?:-nocookie)?\.com/(?:watch\?(?:.*&)?v=|v/|shorts/|live/)|youtu\.be/)([a-zA-Z0-9_-]{11})~i', $url, $ytMatch)) {
            return 'https://www.youtube.com/embed/' . $ytMatch[1];
        }

        // Vimeo: player.vimeo.com/video/ID or vimeo.com/ID
        if (preg_match('~(?:player\.)?vimeo\.com/(?:video/)?([0-9]+)~i', $url, $vimeoMatch)) {
            return 'https://player.vimeo.com/video/' . $vimeoMatch[1];
        }

        return $url;
    }
}


