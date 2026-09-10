<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database;

/**
 * Class HeroSlide
 *
 * Domain model for dynamic homepage hero showcase slides,
 * linking to projects or custom architectural sanctuaries.
 */
class HeroSlide
{
    private static bool $tableChecked = false;

    /**
     * Ensure table exists and migrate any legacy settings.
     */
    public static function ensureTableAndMigrate(): void
    {
        if (self::$tableChecked) {
            return;
        }

        try {
            $sql = "CREATE TABLE IF NOT EXISTS `hero_slides` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `project_id` INT NULL,
                `title` VARCHAR(255) NOT NULL,
                `location_text` VARCHAR(255) NULL,
                `description` TEXT NULL,
                `badge_text` VARCHAR(100) NULL,
                `featured_label` VARCHAR(100) NULL,
                `image_url` VARCHAR(500) NOT NULL,
                `video_url` VARCHAR(500) NULL,
                `price_text` VARCHAR(100) NULL,
                `cta_text` VARCHAR(100) NULL DEFAULT 'View Sanctuary',
                `cta_url` VARCHAR(500) NULL DEFAULT '#residences',
                `sort_order` INT NOT NULL DEFAULT 0,
                `is_active` TINYINT(1) NOT NULL DEFAULT 1,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                INDEX `idx_hero_slides_active_order` (`is_active`, `sort_order`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
            
            Database::query($sql);
            self::$tableChecked = true;

            // Check if table is empty, and if so, seed from settings or default Braj sanctums
            $countRow = Database::fetch("SELECT COUNT(*) as cnt FROM `hero_slides`");
            if (($countRow['cnt'] ?? 0) === 0) {
                self::seedInitialSlides();
            }
        } catch (\Throwable) {
            // Fail gracefully
        }
    }

    /**
     * Seed initial slides from existing settings or flagship Braj sanctuaries.
     */
    private static function seedInitialSlides(): void
    {
        $existingHero = Setting::get('hero_settings', null);
        $slidesToSeed = [];

        if (is_array($existingHero) && !empty($existingHero['slides']) && is_array($existingHero['slides'])) {
            foreach ($existingHero['slides'] as $idx => $s) {
                if (!empty($s['title']) || !empty($s['image'])) {
                    $slidesToSeed[] = [
                        'project_id' => null,
                        'title' => $s['title'] ?? 'Shri Vasudhara Lotus Estates',
                        'location_text' => $s['location_tag'] ?? 'Chhatikara–Vrindavan Corridor • NH-19',
                        'description' => $s['specs'] ?? 'Freehold Sanctuary Plots (250 – 1,200 Sq. Yds.)',
                        'badge_text' => $s['status_tag'] ?? 'Phase II Now Open',
                        'featured_label' => 'Featured Sanctuary',
                        'image_url' => $s['image'] ?? asset('uploads/hero/hero-braj-sanctuary.webp'),
                        'video_url' => null,
                        'price_text' => $s['price'] ?? 'Starting ₹ 45 Lakhs*',
                        'cta_text' => 'View Sanctuary',
                        'cta_url' => $s['link'] ?? '#residences',
                        'sort_order' => $idx,
                        'is_active' => 1,
                    ];
                }
            }
        }

        if (empty($slidesToSeed)) {
            $slidesToSeed = [
                [
                    'project_id' => 1,
                    'title' => 'Shri Vasudhara Lotus Estates',
                    'location_text' => 'Chhatikara–Vrindavan Corridor • NH-19',
                    'description' => 'Freehold Sanctuaries • 250 – 1,200 Sq. Yds.',
                    'badge_text' => 'Phase II Now Open',
                    'featured_label' => 'Featured Sanctuary',
                    'image_url' => asset('uploads/hero/hero-braj-sanctuary.webp'),
                    'video_url' => null,
                    'price_text' => 'Starting ₹ 45 Lakhs*',
                    'cta_text' => 'View Sanctuary',
                    'cta_url' => url('/projects/shri-vrinda-greens-premium-residential-plots'),
                    'sort_order' => 0,
                    'is_active' => 1,
                ],
                [
                    'project_id' => null,
                    'title' => 'Royal Braj Haveli Residences',
                    'location_text' => 'Raman Reti Sanctuary • Vrindavan',
                    'description' => 'Turnkey 4 & 5 BHK Courtyard Havelis',
                    'badge_text' => 'Exclusive Gated Havelis',
                    'featured_label' => 'Signature Haveli',
                    'image_url' => asset('uploads/hero/hero-haveli-courtyard.webp'),
                    'video_url' => null,
                    'price_text' => 'Starting ₹ 1.25 Cr*',
                    'cta_text' => 'Explore Residences',
                    'cta_url' => url('/projects'),
                    'sort_order' => 1,
                    'is_active' => 1,
                ],
                [
                    'project_id' => 8,
                    'title' => 'Shri Vrinda Greens Enclave',
                    'location_text' => 'Sunrakh Road • Vrindavan',
                    'description' => '100% Vastu-Aligned Plotted Community',
                    'badge_text' => '100% MVDA Approved',
                    'featured_label' => 'Investment Landmark',
                    'image_url' => asset('uploads/hero/hero-vrinda-greens.webp'),
                    'video_url' => null,
                    'price_text' => 'Starting ₹ 35 Lakhs*',
                    'cta_text' => 'View Master Plan',
                    'cta_url' => url('/projects/shri-vrinda-greens-premium-residential-plots'),
                    'sort_order' => 2,
                    'is_active' => 1,
                ],
            ];
        }

        foreach ($slidesToSeed as $s) {
            self::create($s);
        }
    }

    /**
     * Get all active slides ordered by sort_order.
     */
    public static function active(): array
    {
        self::ensureTableAndMigrate();
        try {
            $slides = Database::fetchAll(
                "SELECT s.*, 
                        p.slug as project_slug, 
                        p.name as project_orig_name,
                        p.starting_price as project_starting_price,
                        p.location as project_location_orig,
                        p.project_type as project_type
                 FROM `hero_slides` s 
                 LEFT JOIN `projects` p ON s.project_id = p.id 
                 WHERE s.is_active = 1 
                 ORDER BY s.sort_order ASC, s.id ASC"
            );
            return $slides ?: [];
        } catch (\Throwable) {
            return [];
        }
    }

    /**
     * Get all slides (for admin).
     */
    public static function all(): array
    {
        self::ensureTableAndMigrate();
        try {
            return Database::fetchAll(
                "SELECT s.*, 
                        p.name as project_name,
                        p.slug as project_slug,
                        p.location as project_location_orig,
                        p.starting_price as project_starting_price
                 FROM `hero_slides` s 
                 LEFT JOIN `projects` p ON s.project_id = p.id 
                 ORDER BY s.sort_order ASC, s.id ASC"
            ) ?: [];
        } catch (\Throwable) {
            return [];
        }
    }

    /**
     * Find single slide by ID.
     */
    public static function find(int $id): ?array
    {
        self::ensureTableAndMigrate();
        try {
            return Database::fetch("SELECT * FROM `hero_slides` WHERE `id` = ? LIMIT 1", [$id]);
        } catch (\Throwable) {
            return null;
        }
    }

    /**
     * Create new slide.
     */
    public static function create(array $data): int
    {
        self::ensureTableAndMigrate();
        $sql = "INSERT INTO `hero_slides` (
            `project_id`, `title`, `location_text`, `description`,
            `badge_text`, `featured_label`, `image_url`, `video_url`,
            `price_text`, `cta_text`, `cta_url`, `sort_order`, `is_active`
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $projectId = !empty($data['project_id']) ? (int) $data['project_id'] : null;
        $isActive = isset($data['is_active']) ? (int) $data['is_active'] : 1;
        $sortOrder = isset($data['sort_order']) ? (int) $data['sort_order'] : 0;

        Database::query($sql, [
            $projectId,
            (string) ($data['title'] ?? 'Luxury Braj Sanctum'),
            $data['location_text'] ?? null,
            $data['description'] ?? null,
            $data['badge_text'] ?? null,
            $data['featured_label'] ?? 'Featured Sanctuary',
            (string) ($data['image_url'] ?? asset('uploads/hero/hero-braj-sanctuary.webp')),
            $data['video_url'] ?? null,
            $data['price_text'] ?? null,
            (string) ($data['cta_text'] ?? 'View Sanctuary'),
            (string) ($data['cta_url'] ?? '#residences'),
            $sortOrder,
            $isActive,
        ]);

        return (int) Database::lastInsertId();
    }

    /**
     * Update existing slide.
     */
    public static function update(int $id, array $data): bool
    {
        self::ensureTableAndMigrate();
        $sql = "UPDATE `hero_slides` SET
            `project_id` = ?,
            `title` = ?,
            `location_text` = ?,
            `description` = ?,
            `badge_text` = ?,
            `featured_label` = ?,
            `image_url` = ?,
            `video_url` = ?,
            `price_text` = ?,
            `cta_text` = ?,
            `cta_url` = ?,
            `sort_order` = ?,
            `is_active` = ?
            WHERE `id` = ?";

        $projectId = !empty($data['project_id']) ? (int) $data['project_id'] : null;
        $isActive = isset($data['is_active']) ? (int) $data['is_active'] : 1;
        $sortOrder = isset($data['sort_order']) ? (int) $data['sort_order'] : 0;

        return Database::execute($sql, [
            $projectId,
            (string) ($data['title'] ?? 'Luxury Braj Sanctum'),
            $data['location_text'] ?? null,
            $data['description'] ?? null,
            $data['badge_text'] ?? null,
            $data['featured_label'] ?? 'Featured Sanctuary',
            (string) ($data['image_url'] ?? asset('uploads/hero/hero-braj-sanctuary.webp')),
            $data['video_url'] ?? null,
            $data['price_text'] ?? null,
            (string) ($data['cta_text'] ?? 'View Sanctuary'),
            (string) ($data['cta_url'] ?? '#residences'),
            $sortOrder,
            $isActive,
            $id,
        ]) > 0;
    }

    /**
     * Delete slide by ID.
     */
    public static function delete(int $id): bool
    {
        self::ensureTableAndMigrate();
        return Database::execute("DELETE FROM `hero_slides` WHERE `id` = ?", [$id]) > 0;
    }
}
