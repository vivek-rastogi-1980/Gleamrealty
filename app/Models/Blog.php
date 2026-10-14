<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database;

/**
 * Class Blog
 *
 * Domain model for Braj Real Estate insights, editorial blogs, legal articles,
 * and market trends published by GLEAMREALTY PRIVATE LIMITED.
 */
class Blog
{
    private static bool $migrated = false;

    /**
     * Ensure blogs table exists and seed initial flagship articles.
     */
    public static function ensureTable(): void
    {
        if (self::$migrated) {
            return;
        }

        try {
            $sql = "CREATE TABLE IF NOT EXISTS `blogs` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `title` VARCHAR(255) NOT NULL,
                `slug` VARCHAR(255) UNIQUE NOT NULL,
                `category` VARCHAR(100) DEFAULT 'Market Trends & Growth',
                `excerpt` TEXT NULL,
                `content` LONGTEXT NOT NULL,
                `featured_image` VARCHAR(255) NULL,
                `author` VARCHAR(100) DEFAULT 'Gleamrealty Advisory Desk',
                `read_time` VARCHAR(50) DEFAULT '5 min read',
                `tags` VARCHAR(255) DEFAULT 'Vrindavan, Property, Investment',
                `meta_title` VARCHAR(255) NULL,
                `meta_description` TEXT NULL,
                `is_published` TINYINT(1) DEFAULT 1,
                `published_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
                `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                INDEX `idx_blog_published` (`is_published`, `published_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

            Database::query($sql);
            self::$migrated = true;

            // Check if table is empty, and if so, seed flagship articles
            $countRow = Database::fetch("SELECT COUNT(*) as cnt FROM `blogs`");
            if (!$countRow || (int) $countRow['cnt'] === 0) {
                self::seedInitialArticles();
            }
        } catch (\Throwable $e) {
            // Silently recover if database temporarily unreachable
        }
    }

    /**
     * Seed initial editorial articles.
     */
    private static function seedInitialArticles(): void
    {
        $articles = [
            [
                'title' => 'Vrindavan Master Plan 2031 & MVDA Guidelines: The Ultimate Buyer\'s Legal Blueprint',
                'slug' => 'vrindavan-master-plan-2031-mvda-guidelines-buyers-guide',
                'category' => 'Legal & MVDA Approvals',
                'excerpt' => 'A definitive guide to Mathura-Vrindavan Development Authority (MVDA) land zoning, circle rates, 143 conversion regulations, and how to verify clear freehold titles before purchasing.',
                'content' => '<h2>Understanding the Mathura-Vrindavan Development Authority (MVDA) Regulatory Landscape</h2>
<p>Investing in real estate across the sacred Braj region demands far more than conventional capital deployment—it necessitates uncompromised legal vigilance. As Vrindavan evolves into an international spiritual destination and premier cultural sanctuary, regulatory compliance under the Mathura-Vrindavan Development Authority (MVDA) Master Plan 2031 has become the bedrock of sound property acquisition.</p>

<h3>1. Master Plan 2031 Zoning Classifications</h3>
<p>Under the newly enacted Master Plan 2031, land in Vrindavan and Mathura is demarcated into distinct development zones:</p>
<ul>
    <li><strong>Residential Zone (R-Zone):</strong> Freehold plotted developments, gated villa societies, and residential townships approved for immediate construction.</li>
    <li><strong>Commercial & Tourism Corridor:</strong> Land designated along NH-19, Chhatikara-Vrindavan Road, and the proposed Heritage City corridor for mixed-use hospitality, retail SCOs, and pilgrim guest houses.</li>
    <li><strong>Green Belt / Yamuna Khadar Conservation Zone:</strong> Environmentally protected zones where permanent construction is strictly regulated or prohibited to protect the sacred river basin.</li>
</ul>

<h3>2. Critical Due Diligence Checklist for Devotees & Investors</h3>
<p>Before executing any token advance or agreement to sell, every discerning buyer must verify the following statutory documents through their legal counsel:</p>
<ul>
    <li><strong>Approved Layout Sanction (MVDA Map Approval):</strong> Ensure the specific plot layout, boundary wall, and road widths (minimum 30–40 ft) are officially approved by MVDA.</li>
    <li><strong>UP Section 143 (Now Section 80 Revenue Code) Conversion:</strong> Confirms the land has been lawfully transformed from agricultural status to non-agricultural residential use.</li>
    <li><strong>Khatoni & Chain of Title Deeds (12 years):</strong> Verification of ancestral non-encumbrance, ensuring no joint-family disputes, Gram Sabha claims, or agricultural ceiling violations.</li>
    <li><strong>RERA Registration:</strong> Plotted projects larger than 500 sq. meters must have a valid UP-RERA registration number guaranteeing escrow account safety and timely infrastructure delivery.</li>
</ul>

<blockquote>
    "True peace of mind in Vrindavan comes not merely from proximity to Banke Bihari or Prem Mandir, but from holding an indisputable freehold registry in your family\'s name."
</blockquote>

<h3>3. How Gleamrealty Protects Your Investment</h3>
<p>At <strong>GLEAMREALTY PRIVATE LIMITED</strong>, every plotted sanctuary and villa enclave in our advisory portfolio undergoes exhaustive 7-tier legal vetting. We facilitate direct registry at the Sub-Registrar office in Mathura, boundary demarcation, and revenue mutation assistance to ensure zero encumbrances for your family\'s legacy.</p>',
                'featured_image' => 'uploads/pages/residential-plots-in-vrindavan.jpeg',
                'author' => 'Gleamrealty Legal Desk',
                'read_time' => '6 min read',
                'tags' => 'MVDA, RERA, Master Plan 2031, Legal Vetting, Freehold Registry',
                'meta_title' => 'Vrindavan Master Plan 2031 & MVDA Legal Guide | Gleamrealty',
                'meta_description' => 'Complete legal guide to MVDA approved property in Vrindavan. Master Plan 2031 zoning, section 143 conversion, and freehold title deed verification checklist.',
                'is_published' => 1,
                'published_at' => date('Y-m-d H:i:s', strtotime('-5 days')),
            ],
            [
                'title' => 'Yamuna Expressway & Heritage City: Why Mathura-Vrindavan Land Valuations are Soaring',
                'slug' => 'yamuna-expressway-heritage-city-vrindavan-growth-corridors',
                'category' => 'Market Trends & Growth',
                'excerpt' => 'Analyzing Western Uttar Pradesh\'s explosive real estate corridor: how the 1,000-acre Raya Heritage City, Chhatikara expressway link, and high-speed rail are reshaping property ROI.',
                'content' => '<h2>The Strategic Transformation of the Braj Investment Corridor</h2>
<p>Mathura and Vrindavan are witnessing unprecedented infrastructure modernization. Positioned strategically within the golden triangle of Delhi NCR, Agra, and Jaipur, the Braj region is rapidly maturing into India\'s foremost spiritual tourism and high-yield real estate destination.</p>

<h3>1. Key Infrastructure Megaprojects Fueling Appreciation</h3>
<ul>
    <li><strong>Raya Heritage City (YEIDA Megaproject):</strong> Spanning over 1,000 acres along the Yamuna Expressway near Mathura, featuring an authentic cultural zone, theme parks, high-speed connectivity, and convention hubs.</li>
    <li><strong>NH-19 Delhi–Agra 6-Lane Highway Expansion:</strong> Seamless 90-minute transit from Noida, Greater Noida, and South Delhi directly to the Chhatikara Gateway.</li>
    <li><strong>Vrindavan Rail Bus & Light Transit:</strong> Modernized rapid rail corridors connecting Mathura Junction to Vrindavan railway stations.</li>
    <li><strong>Jewar International Airport (Noida Airport):</strong> Just 45 minutes from Vrindavan via the Yamuna Expressway, unlocking seamless domestic and international devotee arrivals.</li>
</ul>

<h3>2. Historic Valuation Trends (2020 – 2026)</h3>
<p>Historically, residential land along key corridors such as Chhatikara–Radha Kund Road, Sunrakh Road, and Rukmani Vihar has shown annualized appreciation ranging from 18% to 28%. Plotted land acquired at ₹18,000 per sq. yard in 2021 now consistently trades between ₹35,000 and ₹55,000 per sq. yard for fully gated, MVDA-approved gated societies.</p>

<h3>3. Strategic Recommendation for Capital Preservation</h3>
<p>Investors seeking both annual appreciation and rental yields are advised to concentrate on freehold plotted enclaves adjacent to primary growth corridors with wide concrete roads (40 ft or more), underground utilities, and gated security.</p>',
                'featured_image' => 'uploads/pages/commercial-property-in-vrindavan.jpeg',
                'author' => 'Gleamrealty Investment Advisory',
                'read_time' => '5 min read',
                'tags' => 'Yamuna Expressway, Heritage City, Land Valuation, Investment ROI, NH-19',
                'meta_title' => 'Yamuna Expressway & Heritage City Land Valuation Trends | Gleamrealty',
                'meta_description' => 'Explore why property valuations in Vrindavan and Mathura are surging. Analysis of Raya Heritage City, Jewar Airport proximity, and highway corridors.',
                'is_published' => 1,
                'published_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
            ],
            [
                'title' => 'Vedic Vastu & Freehold Plotted Townships: Creating an Eternal Family Legacy in Braj',
                'slug' => 'vedic-vastu-freehold-plots-luxury-villas-vrindavan',
                'category' => 'Spiritual Living & Architecture',
                'excerpt' => 'Discover how sacred orientation, courtyard haveli architecture, and gated sanctuaries in Raman Reti and Sunrakh offer devotees lifelong spiritual peace and generational security.',
                'content' => '<h2>Harmonizing Sacred Geometry with Contemporary Luxury Living</h2>
<p>In the sacred precinct of Braj Bhumi, architecture is an act of spiritual devotion. When acquiring land or constructing a retreat home near Banke Bihari or Prem Mandir, aligning the sanctuary with classical Vedic Vastu Shastra principles ensures tranquility, prosperity, and harmony for generations.</p>

<h3>1. Fundamental Vastu Principles for Braj Homes</h3>
<ul>
    <li><strong>Ishan Kon (North-East Orientation):</strong> The sacred direction of supreme divinity. Ideal for personal prayer mandirs, water bodies, and open courtyards that capture pristine morning solar energy.</li>
    <li><strong>Brahmasthan (The Central Open Courtyard):</strong> Traditional Braj havelis celebrate the open sky courtyard, encouraging continuous natural cross-ventilation and sacred family gatherings.</li>
    <li><strong>Agni Kon (South-East Kitchen Placement):</strong> Positioning the culinary and energy center to foster health and vital prana.</li>
    <li><strong>Nairutya Kon (South-West Master Suite):</strong> Grounding the head of the household with stability, strength, and longevity.</li>
</ul>

<h3>2. The Peace of Gated Plotted Sanctuaries</h3>
<p>Modern devotees desire the spiritual sanctity of temple bells combined with private enclave amenities: underground power cables that eliminate overhead visual clutter, paved tree-lined boulevards planted with sacred Kadamba and Peepal, 24/7 biometric security, and dedicated yoga satsang pavilions.</p>

<p>Whether you plan to build immediately or hold a freehold plotted sanctuary as a multi-generational asset, <strong>GLEAMREALTY PRIVATE LIMITED</strong> offers Vastu-compliant plots with pristine directional alignments ready for bespoke construction.</p>',
                'featured_image' => 'uploads/pages/luxury-villas-in-vrindavan.jpeg',
                'author' => 'Gleamrealty Heritage Advisory',
                'read_time' => '7 min read',
                'tags' => 'Vedic Vastu, Courtyard Havelis, Spiritual Sanctuaries, Luxury Villas, Braj Legacy',
                'meta_title' => 'Vedic Vastu Architecture in Vrindavan Townships | Gleamrealty',
                'meta_description' => 'Discover Vedic Vastu Shastra architectural principles for building luxury villas and plotted retreats in Vrindavan. Directional alignments and courtyard living.',
                'is_published' => 1,
                'published_at' => date('Y-m-d H:i:s', strtotime('-1 days')),
            ],
        ];

        foreach ($articles as $art) {
            self::create($art);
        }
    }

    /**
     * Get all blog articles (Admin view).
     */
    public static function all(): array
    {
        self::ensureTable();
        try {
            return Database::fetchAll("SELECT * FROM `blogs` ORDER BY `published_at` DESC, `id` DESC");
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Get published blog articles (Public view).
     */
    public static function published(): array
    {
        self::ensureTable();
        try {
            return Database::fetchAll(
                "SELECT * FROM `blogs` WHERE `is_published` = 1 ORDER BY `published_at` DESC, `id` DESC"
            );
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Get recent published articles.
     */
    public static function recent(int $limit = 3, ?int $excludeId = null): array
    {
        self::ensureTable();
        try {
            if ($excludeId !== null) {
                return Database::fetchAll(
                    "SELECT * FROM `blogs` WHERE `is_published` = 1 AND `id` != ? ORDER BY `published_at` DESC LIMIT {$limit}",
                    [$excludeId]
                );
            }
            return Database::fetchAll(
                "SELECT * FROM `blogs` WHERE `is_published` = 1 ORDER BY `published_at` DESC LIMIT {$limit}"
            );
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Find single article by ID.
     */
    public static function find(int $id): ?array
    {
        self::ensureTable();
        try {
            $row = Database::fetch("SELECT * FROM `blogs` WHERE `id` = ? LIMIT 1", [$id]);
            return $row ?: null;
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Find single published article by slug.
     */
    public static function findBySlug(string $slug): ?array
    {
        self::ensureTable();
        try {
            $row = Database::fetch("SELECT * FROM `blogs` WHERE `slug` = ? LIMIT 1", [$slug]);
            return $row ?: null;
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Get all distinct categories.
     */
    public static function categories(): array
    {
        self::ensureTable();
        try {
            $rows = Database::fetchAll("SELECT DISTINCT `category` FROM `blogs` WHERE `is_published` = 1 ORDER BY `category` ASC");
            $cats = [];
            foreach ($rows as $r) {
                if (!empty($r['category'])) {
                    $cats[] = $r['category'];
                }
            }
            return $cats;
        } catch (\Throwable $e) {
            return [];
        }
    }

    /**
     * Create a new article.
     */
    public static function create(array $data): int
    {
        self::ensureTable();

        $title = trim((string) ($data['title'] ?? ''));
        $slug = trim((string) ($data['slug'] ?? ''));
        if (empty($slug)) {
            $slug = self::slugify($title);
        }

        // Ensure unique slug
        $slug = self::ensureUniqueSlug($slug);

        $sql = "INSERT INTO `blogs` (
            `title`, `slug`, `category`, `excerpt`, `content`,
            `featured_image`, `author`, `read_time`, `tags`,
            `meta_title`, `meta_description`, `is_published`, `published_at`
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $publishedAt = !empty($data['published_at']) ? $data['published_at'] : date('Y-m-d H:i:s');

        Database::query($sql, [
            $title,
            $slug,
            $data['category'] ?? 'Market Trends & Growth',
            $data['excerpt'] ?? null,
            $data['content'] ?? '',
            $data['featured_image'] ?? null,
            $data['author'] ?? 'Gleamrealty Advisory Desk',
            $data['read_time'] ?? '5 min read',
            $data['tags'] ?? 'Vrindavan, Property, Investment',
            $data['meta_title'] ?? $title,
            $data['meta_description'] ?? ($data['excerpt'] ?? null),
            isset($data['is_published']) ? (int) $data['is_published'] : 1,
            $publishedAt,
        ]);

        return (int) Database::lastInsertId();
    }

    /**
     * Update an article.
     */
    public static function update(int $id, array $data): bool
    {
        self::ensureTable();

        $title = trim((string) ($data['title'] ?? ''));
        $slug = trim((string) ($data['slug'] ?? ''));
        if (empty($slug)) {
            $slug = self::slugify($title);
        }
        $slug = self::ensureUniqueSlug($slug, $id);

        $sql = "UPDATE `blogs` SET
            `title` = ?,
            `slug` = ?,
            `category` = ?,
            `excerpt` = ?,
            `content` = ?,
            `featured_image` = ?,
            `author` = ?,
            `read_time` = ?,
            `tags` = ?,
            `meta_title` = ?,
            `meta_description` = ?,
            `is_published` = ?,
            `published_at` = ?
        WHERE `id` = ?";

        $publishedAt = !empty($data['published_at']) ? $data['published_at'] : date('Y-m-d H:i:s');

        return Database::execute($sql, [
            $title,
            $slug,
            $data['category'] ?? 'Market Trends & Growth',
            $data['excerpt'] ?? null,
            $data['content'] ?? '',
            $data['featured_image'] ?? null,
            $data['author'] ?? 'Gleamrealty Advisory Desk',
            $data['read_time'] ?? '5 min read',
            $data['tags'] ?? 'Vrindavan, Property, Investment',
            $data['meta_title'] ?? $title,
            $data['meta_description'] ?? ($data['excerpt'] ?? null),
            isset($data['is_published']) ? (int) $data['is_published'] : 1,
            $publishedAt,
            $id,
        ]) >= 0;
    }

    /**
     * Delete an article.
     */
    public static function delete(int $id): bool
    {
        self::ensureTable();
        return Database::execute("DELETE FROM `blogs` WHERE `id` = ?", [$id]) > 0;
    }

    /**
     * Helper to slugify a string.
     */
    public static function slugify(string $text): string
    {
        $text = preg_replace('~[^\pL\d]+~u', '-', $text) ?? '';
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text) ?: $text;
        $text = preg_replace('~[^-\w]+~', '', $text) ?? '';
        $text = trim($text, '-');
        $text = preg_replace('~-+~', '-', $text) ?? '';
        $text = strtolower($text);

        return empty($text) ? 'article-' . time() : $text;
    }

    /**
     * Ensure slug uniqueness.
     */
    private static function ensureUniqueSlug(string $slug, ?int $excludeId = null): string
    {
        $original = $slug;
        $counter = 1;

        while (true) {
            $query = "SELECT `id` FROM `blogs` WHERE `slug` = ?";
            $params = [$slug];

            if ($excludeId !== null) {
                $query .= " AND `id` != ?";
                $params[] = $excludeId;
            }

            $query .= " LIMIT 1";
            $row = Database::fetch($query, $params);

            if (!$row) {
                return $slug;
            }

            $slug = $original . '-' . $counter;
            $counter++;
        }
    }
}
