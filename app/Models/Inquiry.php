<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database;

/**
 * Class Inquiry
 *
 * Domain model for inquiries table.
 */
class Inquiry
{
    public static function all(?int $projectId = null, string $search = ''): array
    {
        $sql = "SELECT i.*, p.name as project_name
                FROM `inquiries` i
                LEFT JOIN `projects` p ON p.id = i.project_id
                WHERE 1=1";
        $params = [];

        if ($projectId !== null && $projectId > 0) {
            $sql .= " AND i.project_id = ?";
            $params[] = $projectId;
        }

        if (!empty($search)) {
            $sql .= " AND (i.name LIKE ? OR i.phone LIKE ? OR i.email LIKE ? OR i.message LIKE ?)";
            $term = "%{$search}%";
            $params[] = $term;
            $params[] = $term;
            $params[] = $term;
            $params[] = $term;
        }

        $sql .= " ORDER BY i.id DESC";
        return Database::fetchAll($sql, $params);
    }

    public static function find(int $id): ?array
    {
        $sql = "SELECT i.*, p.name as project_name
                FROM `inquiries` i
                LEFT JOIN `projects` p ON p.id = i.project_id
                WHERE i.id = ? LIMIT 1";
        return Database::fetch($sql, [$id]);
    }

    public static function create(array $data): int
    {
        $sql = "INSERT INTO `inquiries` (`project_id`, `name`, `phone`, `email`, `budget_range`, `message`)
                VALUES (?, ?, ?, ?, ?, ?)";

        $projectId = !empty($data['project_id']) ? (int) $data['project_id'] : null;

        Database::query($sql, [
            $projectId,
            $data['name'],
            $data['phone'],
            $data['email'] ?? null,
            $data['budget_range'] ?? null,
            $data['message'] ?? null,
        ]);

        return (int) Database::lastInsertId();
    }

    public static function delete(int $id): bool
    {
        return Database::execute("DELETE FROM `inquiries` WHERE `id` = ?", [$id]) > 0;
    }

    public static function count(): int
    {
        $res = Database::fetch("SELECT COUNT(*) as total FROM `inquiries`");
        return (int) ($res['total'] ?? 0);
    }

    /**
     * Get clean formatted rows for CSV export.
     */
    public static function exportRows(?int $projectId = null): array
    {
        $items = static::all($projectId);
        $rows = [];

        foreach ($items as $item) {
            $rows[] = [
                $item['id'],
                $item['created_at'],
                $item['name'],
                $item['phone'],
                $item['email'] ?? 'N/A',
                $item['project_name'] ?? 'General Inquiry',
                $item['budget_range'] ?? 'Not Specified',
                str_replace(["\r", "\n"], ' ', (string) ($item['message'] ?? '')),
            ];
        }

        return $rows;
    }
}
