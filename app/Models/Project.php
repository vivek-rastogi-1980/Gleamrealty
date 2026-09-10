<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database;

/**
 * Class Project
 *
 * Domain model for projects table.
 */
class Project
{
    public static function all(string $search = '', ?string $type = null): array
    {
        $sql = "SELECT * FROM `projects` WHERE 1=1";
        $params = [];

        if (!empty($search)) {
            $sql .= " AND (`name` LIKE ? OR `location` LIKE ? OR `tagline` LIKE ?)";
            $term = "%{$search}%";
            $params[] = $term;
            $params[] = $term;
            $params[] = $term;
        }

        if (!empty($type)) {
            $sql .= " AND `project_type` = ?";
            $params[] = $type;
        }

        $sql .= " ORDER BY `id` DESC";
        return Database::fetchAll($sql, $params);
    }

    public static function byLocation(string $city, ?string $type = null): array
    {
        $city = trim($city);
        $term = "%{$city}%";
        $sql = "SELECT * FROM `projects` WHERE (`location` LIKE ? OR `name` LIKE ? OR `overview` LIKE ?)";
        $params = [$term, $term, $term];

        if (!empty($type) && $type !== 'all') {
            $sql .= " AND `project_type` = ?";
            $params[] = $type;
        }

        $sql .= " ORDER BY `id` DESC";
        return Database::fetchAll($sql, $params);
    }

    public static function find(int $id): ?array
    {
        return Database::fetch("SELECT * FROM `projects` WHERE `id` = ? LIMIT 1", [$id]);
    }

    public static function findBySlug(string $slug): ?array
    {
        return Database::fetch("SELECT * FROM `projects` WHERE `slug` = ? LIMIT 1", [$slug]);
    }

    public static function create(array $data): int
    {
        $sql = "INSERT INTO `projects` (
            `name`, `slug`, `tagline`, `location`, `google_maps_embed`, `starting_price`,
            `project_type`, `rera_id`, `mvda_approved`, `project_size`, `hero_video_url`,
            `overview`, `amenities`, `brochure_url`, `floor_plan_url`, `payment_plan_url`,
            `meta_title`, `meta_description`, `meta_keywords`
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $mvda = isset($data['mvda_approved']) && (bool) $data['mvda_approved'] ? 1 : 0;

        Database::query($sql, [
            $data['name'],
            $data['slug'],
            $data['tagline'] ?? null,
            $data['location'],
            $data['google_maps_embed'] ?? null,
            $data['starting_price'] ?? null,
            $data['project_type'] ?? 'Plotted Community',
            $data['rera_id'] ?? null,
            $mvda,
            $data['project_size'] ?? null,
            $data['hero_video_url'] ?? null,
            $data['overview'] ?? null,
            is_array($data['amenities'] ?? null) ? json_encode($data['amenities']) : ($data['amenities'] ?? null),
            $data['brochure_url'] ?? null,
            $data['floor_plan_url'] ?? null,
            $data['payment_plan_url'] ?? null,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
            $data['meta_keywords'] ?? null,
        ]);

        return (int) Database::lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $sql = "UPDATE `projects` SET
            `name` = ?, `slug` = ?, `tagline` = ?, `location` = ?, `google_maps_embed` = ?,
            `starting_price` = ?, `project_type` = ?, `rera_id` = ?, `mvda_approved` = ?,
            `project_size` = ?, `hero_video_url` = ?, `overview` = ?, `amenities` = ?,
            `brochure_url` = ?, `floor_plan_url` = ?, `payment_plan_url` = ?,
            `meta_title` = ?, `meta_description` = ?, `meta_keywords` = ?
            WHERE `id` = ?";

        $mvda = isset($data['mvda_approved']) && (bool) $data['mvda_approved'] ? 1 : 0;

        return Database::execute($sql, [
            $data['name'],
            $data['slug'],
            $data['tagline'] ?? null,
            $data['location'],
            $data['google_maps_embed'] ?? null,
            $data['starting_price'] ?? null,
            $data['project_type'] ?? 'Plotted Community',
            $data['rera_id'] ?? null,
            $mvda,
            $data['project_size'] ?? null,
            $data['hero_video_url'] ?? null,
            $data['overview'] ?? null,
            is_array($data['amenities'] ?? null) ? json_encode($data['amenities']) : ($data['amenities'] ?? null),
            $data['brochure_url'] ?? null,
            $data['floor_plan_url'] ?? null,
            $data['payment_plan_url'] ?? null,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
            $data['meta_keywords'] ?? null,
            $id
        ]) >= 0;
    }

    public static function delete(int $id): bool
    {
        // First delete project media
        Database::query("DELETE FROM `project_media` WHERE `project_id` = ?", [$id]);
        return Database::execute("DELETE FROM `projects` WHERE `id` = ?", [$id]) > 0;
    }

    public static function count(): int
    {
        $res = Database::fetch("SELECT COUNT(*) as total FROM `projects`");
        return (int) ($res['total'] ?? 0);
    }

    public static function getMedia(int $projectId, ?string $type = null): array
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

    public static function getHeroImage(int $projectId): ?string
    {
        $media = Database::fetch("SELECT `file_path` FROM `project_media` WHERE `project_id` = ? AND `media_type` IN ('gallery', 'elevation') ORDER BY `display_order` ASC, `id` ASC LIMIT 1", [$projectId]);
        return $media['file_path'] ?? null;
    }
}
