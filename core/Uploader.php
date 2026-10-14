<?php

declare(strict_types=1);

namespace Core;

/**
 * Class Uploader
 *
 * Secure file upload manager for galleries, floor plans, and documents.
 */
class Uploader
{
    protected static array $allowedExtensions = [
        'jpg', 'jpeg', 'png', 'webp', 'gif', 'pdf', 'mp4', 'webm'
    ];

    protected static array $allowedImageExtensions = [
        'jpg', 'jpeg', 'png', 'webp', 'gif'
    ];

    /**
     * Upload an uploaded $_FILES entry to public/uploads/{subDirectory}.
     *
     * @param array $file $_FILES['input_name']
     * @param string $subDirectory
     * @param array|null $allowedCustomExts
     * @return string|null Relative URL path on success, null on failure
     */
    public static function upload(array $file, string $subDirectory = 'projects', ?array $allowedCustomExts = null): ?string
    {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $origName = (string) ($file['name'] ?? 'upload');
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));

        $allowed = $allowedCustomExts ?? static::$allowedExtensions;
        if (!in_array($ext, $allowed, true)) {
            return null;
        }

        // Clean subDirectory to avoid duplication like public/uploads/public/uploads/hero
        $cleanSub = trim(str_replace(['public/', 'uploads/'], '', str_replace('\\', '/', $subDirectory)), '/');
        if ($cleanSub === '') {
            $cleanSub = 'general';
        }

        $basePath = dirname(__DIR__);
        $targetDir = $basePath . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $cleanSub);

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }

        // Clean, unique sanitized name
        $cleanBase = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME));
        $cleanBase = substr($cleanBase, 0, 30);
        $fileName = date('YmdHis') . '_' . $cleanBase . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $targetPath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return 'uploads/' . $cleanSub . '/' . $fileName;
        }

        return null;
    }

    /**
     * Specialized image uploader restricted to web image formats.
     *
     * @param array $file
     * @param string $subDirectory
     * @return string|null
     */
    public static function image(array $file, string $subDirectory = 'hero'): ?string
    {
        return static::upload($file, $subDirectory, static::$allowedImageExtensions);
    }

    /**
     * Save an external asset from a remote URL to local directory.
     *
     * @param string $url
     * @param string $subDirectory
     * @return string|null Relative local URL path
     */
    public static function download(string $url, string $subDirectory = 'projects'): ?string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $data = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($data === false || $httpCode !== 200 || empty($data)) {
            return null;
        }

        $parsedUrl = parse_url($url, PHP_URL_PATH);
        $origName = basename($parsedUrl ?: 'download');
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        if (empty($ext) || !in_array($ext, static::$allowedExtensions, true)) {
            $ext = 'jpg';
        }

        $basePath = dirname(__DIR__);
        $targetDir = $basePath . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $subDirectory;

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0775, true);
        }

        $cleanBase = preg_replace('/[^a-zA-Z0-9_-]/', '_', pathinfo($origName, PATHINFO_FILENAME));
        $cleanBase = substr($cleanBase, 0, 30);
        $fileName = date('YmdHis') . '_' . $cleanBase . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $targetPath = $targetDir . DIRECTORY_SEPARATOR . $fileName;

        if (file_put_contents($targetPath, $data) !== false) {
            return '/public/uploads/' . $subDirectory . '/' . $fileName;
        }

        return null;
    }
}
