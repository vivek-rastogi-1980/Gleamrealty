<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database;

/**
 * Class Page
 *
 * Domain model for pages CMS table.
 */
class Page
{
    public static function all(): array
    {
        return Database::fetchAll("SELECT * FROM `pages` ORDER BY `id` DESC");
    }

    public static function published(): array
    {
        return Database::fetchAll("SELECT * FROM `pages` WHERE `is_published` = 1 ORDER BY `id` ASC");
    }

    public static function find(int $id): ?array
    {
        return Database::fetch("SELECT * FROM `pages` WHERE `id` = ? LIMIT 1", [$id]);
    }

    public static function findBySlug(string $slug): ?array
    {
        return Database::fetch("SELECT * FROM `pages` WHERE `slug` = ? LIMIT 1", [$slug]);
    }

    public static function create(array $data): int
    {
        $sql = "INSERT INTO `pages` (
            `title`, `slug`, `hero_heading`, `hero_subheading`, `hero_media_type`,
            `hero_media_url`, `content`, `meta_title`, `meta_description`, `meta_keywords`, `is_published`
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $published = isset($data['is_published']) && (bool) $data['is_published'] ? 1 : 0;
        $mediaType = in_array($data['hero_media_type'] ?? 'image', ['image', 'video'], true) ? $data['hero_media_type'] : 'image';

        Database::query($sql, [
            $data['title'],
            $data['slug'],
            $data['hero_heading'] ?? null,
            $data['hero_subheading'] ?? null,
            $mediaType,
            $data['hero_media_url'] ?? null,
            $data['content'] ?? null,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
            $data['meta_keywords'] ?? null,
            $published,
        ]);

        return (int) Database::lastInsertId();
    }

    public static function update(int $id, array $data): bool
    {
        $sql = "UPDATE `pages` SET
            `title` = ?, `slug` = ?, `hero_heading` = ?, `hero_subheading` = ?,
            `hero_media_type` = ?, `hero_media_url` = ?, `content` = ?,
            `meta_title` = ?, `meta_description` = ?, `meta_keywords` = ?, `is_published` = ?
            WHERE `id` = ?";

        $published = isset($data['is_published']) && (bool) $data['is_published'] ? 1 : 0;
        $mediaType = in_array($data['hero_media_type'] ?? 'image', ['image', 'video'], true) ? $data['hero_media_type'] : 'image';

        return Database::execute($sql, [
            $data['title'],
            $data['slug'],
            $data['hero_heading'] ?? null,
            $data['hero_subheading'] ?? null,
            $mediaType,
            $data['hero_media_url'] ?? null,
            $data['content'] ?? null,
            $data['meta_title'] ?? null,
            $data['meta_description'] ?? null,
            $data['meta_keywords'] ?? null,
            $published,
            $id
        ]) >= 0;
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM `pages` WHERE `id` = ?", [$id]) > 0;
    }

    public static function count(): int
    {
        $res = Database::fetch("SELECT COUNT(*) as total FROM `pages`");
        return (int) ($res['total'] ?? 0);
    }
}
