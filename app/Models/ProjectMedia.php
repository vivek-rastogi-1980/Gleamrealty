<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database;

/**
 * Class ProjectMedia
 *
 * Domain model for project_media table.
 */
class ProjectMedia
{
    public static function forProject(int $projectId, ?string $type = null): array
    {
        $sql = "SELECT * FROM `project_media` WHERE `project_id` = ?";
        $params = [$projectId];

        if ($type !== null) {
            $sql .= " AND `media_type` = ?";
            $params[] = $type;
        }

        $sql .= " ORDER BY `display_order` ASC, `id` ASC";
        return Database::fetchAll($sql, $params);
    }

    public static function find(int $id): ?array
    {
        return Database::fetch("SELECT * FROM `project_media` WHERE `id` = ? LIMIT 1", [$id]);
    }

    public static function create(
        int $projectId,
        string $filePath,
        string $mediaType = 'gallery',
        ?string $caption = null,
        int $order = 0
    ): int {
        $allowedTypes = ['gallery', 'floorplan', 'elevation', 'video'];
        if (!in_array($mediaType, $allowedTypes, true)) {
            $mediaType = 'gallery';
        }

        $sql = "INSERT INTO `project_media` (`project_id`, `media_type`, `file_path`, `caption`, `display_order`) VALUES (?, ?, ?, ?, ?)";
        Database::query($sql, [$projectId, $mediaType, $filePath, $caption, $order]);
        return (int) Database::lastInsertId();
    }

    public static function delete(int $id): bool
    {
        $media = static::find($id);
        if ($media && !empty($media['file_path'])) {
            $path = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . ltrim($media['file_path'], '/');
            if (file_exists($path) && is_file($path)) {
                @unlink($path);
            }
        }

        return Database::execute("DELETE FROM `project_media` WHERE `id` = ?", [$id]) > 0;
    }

    public static function count(): int
    {
        $res = Database::fetch("SELECT COUNT(*) as total FROM `project_media`");
        return (int) ($res['total'] ?? 0);
    }
}
