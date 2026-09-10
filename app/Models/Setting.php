<?php

declare(strict_types=1);

namespace App\Models;

use Core\Database;

/**
 * Class Setting
 *
 * Domain model for dynamic platform settings, hero content, and business metrics.
 */
class Setting
{
    private static bool $tableChecked = false;

    /**
     * Ensure settings table exists.
     */
    public static function ensureTable(): void
    {
        if (self::$tableChecked) {
            return;
        }

        try {
            $sql = "CREATE TABLE IF NOT EXISTS `settings` (
                `key` VARCHAR(191) PRIMARY KEY,
                `value` LONGTEXT NOT NULL,
                `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
            Database::query($sql);
            self::$tableChecked = true;
        } catch (\Throwable) {
            // Fail gracefully if DB is temporarily unreachable
        }
    }

    /**
     * Get a setting value by key with fallback.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        self::ensureTable();

        try {
            $row = Database::fetch("SELECT `value` FROM `settings` WHERE `key` = ? LIMIT 1", [$key]);
            if ($row && isset($row['value'])) {
                $decoded = json_decode((string)$row['value'], true);
                return (json_last_error() === JSON_ERROR_NONE) ? $decoded : $row['value'];
            }
        } catch (\Throwable) {
            // Return fallback on any query error
        }

        return $default;
    }

    /**
     * Set a setting value by key.
     */
    public static function set(string $key, mixed $value): void
    {
        self::ensureTable();

        $valStr = is_array($value) || is_object($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : (string) $value;

        try {
            Database::query(
                "INSERT INTO `settings` (`key`, `value`) VALUES (?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)",
                [$key, $valStr]
            );
        } catch (\Throwable) {
            // Silently handle error
        }
    }

    /**
     * Get active theme name.
     * Supported: 'green' (light green & white), 'dark-yellow' (dark & yellow), 'blue' (blue & white)
     */
    public static function getActiveTheme(): string
    {
        // 1. URL Query Override (?theme=...)
        if (isset($_GET['theme']) && is_string($_GET['theme'])) {
            $t = strtolower(trim($_GET['theme']));
            if ($t === 'dark' || $t === 'yellow' || $t === 'gold') {
                return 'dark-yellow';
            }
            if (in_array($t, ['green', 'dark-yellow', 'blue'], true)) {
                return $t;
            }
        }

        // 2. Cookie preference
        if (isset($_COOKIE['gleam_theme']) && is_string($_COOKIE['gleam_theme'])) {
            $c = strtolower(trim($_COOKIE['gleam_theme']));
            if ($c === 'dark' || $c === 'yellow') {
                return 'dark-yellow';
            }
            if (in_array($c, ['green', 'dark-yellow', 'blue'], true)) {
                return $c;
            }
        }

        // 3. Database default or fallback to 'green'
        $dbTheme = (string) self::get('active_theme', 'green');
        return in_array($dbTheme, ['green', 'dark-yellow', 'blue'], true) ? $dbTheme : 'green';
    }

    /**
     * Get dynamic hero configuration with editorial organic luxury defaults.
     *
     * @return array
     */
    public static function getHero(): array
    {
        $storedHero = self::get('hero_settings', null);
        if (!is_array($storedHero)) {
            $storedHero = [];
        }

        // Fetch active slides from HeroSlide relational table
        $activeSlides = HeroSlide::active();
        $formattedSlides = [];

        if (!empty($activeSlides)) {
            foreach ($activeSlides as $s) {
                // If linked to a project and cta_url is empty/default, compute project link
                $link = (string) ($s['cta_url'] ?? '');
                if ((empty($link) || $link === '#residences') && !empty($s['project_slug'])) {
                    $link = url('/projects/' . $s['project_slug']);
                }
                if (empty($link)) {
                    $link = url('/projects');
                }

                $formattedSlides[] = [
                    'id' => (int) $s['id'],
                    'project_id' => $s['project_id'] ? (int) $s['project_id'] : null,
                    'project_slug' => $s['project_slug'] ?? null,
                    'project_type' => $s['project_type'] ?? null,
                    'image' => (string) ($s['image_url'] ?? asset('uploads/hero/hero-braj-sanctuary.webp')),
                    'status_tag' => (string) ($s['badge_text'] ?? '100% MVDA Approved'),
                    'location_tag' => (string) ($s['location_text'] ?? 'Chhatikara–Vrindavan Corridor • NH-19'),
                    'title' => (string) ($s['title'] ?? 'Shri Vasudhara Lotus Estates'),
                    'specs' => (string) ($s['description'] ?? 'Freehold Sanctuary Plots • 250 – 1,200 Sq. Yds.'),
                    'price' => (string) ($s['price_text'] ?? 'Starting ₹ 45 Lakhs*'),
                    'link' => $link,
                    'cta_text' => (string) ($s['cta_text'] ?? 'Explore Sanctuary'),
                    'cta_secondary_text' => 'Schedule Private Visit',
                    'cta_secondary_url' => '#inquire',
                    'video_url' => !empty($s['video_url']) ? (string) $s['video_url'] : null,
                    'featured_label' => (string) ($s['featured_label'] ?? 'Featured Sanctuary'),
                ];
            }
        }

        // Fallback default slides if table is completely empty
        if (empty($formattedSlides)) {
            $formattedSlides = [
                [
                    'id' => 1,
                    'project_id' => 8,
                    'project_slug' => 'shri-vrinda-greens-premium-residential-plots',
                    'project_type' => 'Luxury Villas',
                    'image' => asset('uploads/hero/hero-braj-sanctuary.webp'),
                    'status_tag' => '100% MVDA Approved',
                    'location_tag' => 'Sunrakh Road • Vrindavan',
                    'title' => 'Shri Vrinda Greens Enclave',
                    'specs' => '100% Vastu-Aligned Gated Community • 200 – 1,000 Sq. Yds.',
                    'price' => 'Starting ₹ 35 Lakhs*',
                    'link' => url('/projects/shri-vrinda-greens-premium-residential-plots'),
                    'cta_text' => 'Explore Master Plan',
                    'cta_secondary_text' => 'Schedule Private Visit',
                    'cta_secondary_url' => '#inquire',
                    'video_url' => null,
                    'featured_label' => 'Flagship Landmark',
                ],
                [
                    'id' => 2,
                    'project_id' => 1,
                    'project_slug' => 'shri-vasudhara-vaishaly-premium-residential-plots',
                    'project_type' => 'Residential Plots',
                    'image' => asset('uploads/hero/hero-haveli-courtyard.webp'),
                    'status_tag' => 'Immediate Freehold Registry',
                    'location_tag' => 'Chhatikara–Vrindavan Corridor • NH-19',
                    'title' => 'Shri Vasudhara Lotus Estates',
                    'specs' => 'Freehold Sanctuaries • 250 – 1,200 Sq. Yds. • 40ft Wide Roads',
                    'price' => 'Starting ₹ 45 Lakhs*',
                    'link' => url('/projects'),
                    'cta_text' => 'View Sanctuary Dossier',
                    'cta_secondary_text' => 'Schedule Private Visit',
                    'cta_secondary_url' => '#inquire',
                    'video_url' => null,
                    'featured_label' => 'Signature Sanctuary',
                ],
                [
                    'id' => 3,
                    'project_id' => null,
                    'project_slug' => null,
                    'project_type' => 'Courtyard Havelis',
                    'image' => asset('uploads/projects/hero-preview.jpg'),
                    'status_tag' => 'Phase II Launch',
                    'location_tag' => 'Raman Reti Sanctuary • Vrindavan',
                    'title' => 'Royal Braj Haveli Residences',
                    'specs' => 'Turnkey 4 & 5 BHK Courtyard Havelis • Vedic Architecture',
                    'price' => 'Starting ₹ 1.25 Cr*',
                    'link' => url('/projects'),
                    'cta_text' => 'Explore Residences',
                    'cta_secondary_text' => 'Schedule Private Visit',
                    'cta_secondary_url' => '#inquire',
                    'video_url' => null,
                    'featured_label' => 'Exclusive Havelis',
                ],
            ];
        }

        return [
            'is_enabled' => (bool) ($storedHero['is_enabled'] ?? true),
            'autoplay_interval' => (int) ($storedHero['autoplay_interval'] ?? 6), // in seconds
            'rotation_style' => (string) ($storedHero['rotation_style'] ?? '3d-page-turn'),
            'overlay_opacity' => (int) ($storedHero['overlay_opacity'] ?? 45), // percentage
            'trust_seal_text' => (string) ($storedHero['trust_seal_text'] ?? '100% MVDA & RERA Approved • Immediate Freehold Registry • 3,000+ Happy Families'),
            'badge_text' => (string) ($storedHero['badge_text'] ?? '✦ BRAJ BHUMI PRIVATE ESTATES • VRINDAVAN & MATHURA'),
            'slides' => $formattedSlides,
        ];
    }

    /**
     * Save dynamic hero configuration.
     *
     * @param array $data
     */
    public static function saveHero(array $data): void
    {
        self::set('hero_settings', $data);
        if (isset($data['trust_seal_text'])) self::set('hero_trust_seal_text', $data['trust_seal_text']);
        if (isset($data['badge_text'])) self::set('hero_badge_text', $data['badge_text']);
    }

    /**
     * Get dynamic metrics list with botanical sanctuary defaults.
     *
     * @param array|null $fallback
     * @return array<array{value: string, label: string}>
     */
    public static function getMetrics(?array $fallback = null): array
    {
        $default = $fallback ?? [
            [
                'value' => '100%',
                'label' => 'MVDA & RERA Approved',
            ],
            [
                'value' => '5 Lakh+',
                'label' => 'Sq. Yds Delivered',
            ],
            [
                'value' => '10+ Years',
                'label' => 'Generational Trust',
            ],
            [
                'value' => '3,000+',
                'label' => 'Happy Devotee Families',
            ],
        ];

        $stored = self::get('hero_metrics', null);
        if (is_array($stored) && !empty($stored)) {
            return $stored;
        }

        return $default;
    }

    /**
     * Save dynamic metrics list.
     *
     * @param array $metrics
     */
    public static function saveMetrics(array $metrics): void
    {
        self::set('hero_metrics', $metrics);
    }

    /**
     * Get dynamic homepage sections configuration (all sections except hero).
     *
     * @return array
     */
    public static function getHomeSections(): array
    {
        $defaults = [
            'metrics' => [
                'm1_val' => '10+',
                'm1_title' => 'Years of',
                'm1_sub' => 'Experience',
                'm2_val' => '5L+',
                'm2_title' => 'Sq. Yards',
                'm2_sub' => 'Served',
                'm3_val' => '3k+',
                'm3_title' => 'Happy Faces',
                'm3_sub' => 'and Counting',
                'm4_val' => '100%',
                'm4_title' => 'Govt. App.',
                'm4_sub' => 'Properties',
            ],
            'philosophy' => [
                'eyebrow' => 'Heritage • Divinity • Legacy',
                'title' => 'The Sanctity of Braj Bhumi',
                'subtitle' => 'An eternal sanctuary of peace, devotion, and appreciation. Discover why securing an estate in Vrindavan transcends conventional real estate.',
                'quote' => 'To establish an abode in Vrindavan is not merely an acquisition of land, but an eternal sanctification of one’s family legacy.',
                'quote_author' => 'Gleamrealty Heritage Advisory',
                'p1' => 'For millennia, the holy soil of Mathura and Vrindavan has drawn seekers, spiritual leaders, and visionaries. Today, this revered domain experiences unprecedented modern infrastructure growth — with wide 6-lane expressways, the upcoming Heritage City, and world-class connectivity to Delhi NCR.',
                'p2' => 'At Gleamrealty, we curate vetted, freehold residential plots and duplex villas that respect Vedic vastu principles while delivering subterranean electrification, 40-to-60 foot concrete avenues, landscaped Kadamba groves, and gated 24/7 security.',
                'pillars' => [
                    [
                        'title' => '100% MVDA & RERA',
                        'desc' => 'Every project is fully approved by Mathura-Vrindavan Development Authority with zero legal encumbrances.',
                    ],
                    [
                        'title' => 'Direct Freehold Registry',
                        'desc' => 'Clear title deeds with immediate registry, demarcation, and mutation assistance by our in-house legal desk.',
                    ],
                    [
                        'title' => 'Sacred Temple Vicinity',
                        'desc' => 'Minutes away from Prem Mandir, Banke Bihari Temple, ISKCON Vrindavan, and Chandrodaya Mandir.',
                    ],
                    [
                        'title' => 'Bespoke Villa Construction',
                        'desc' => 'Flexible architectural assistance to craft duplex villas harmonized with natural light and courtyard ventilation.',
                    ],
                ],
                'showcase_badge' => 'Architectural Showcase',
                'showcase_title' => 'Shri Vrinda Aakruti Village',
                'showcase_desc' => 'Duplex villas and premium plotted enclaves surrounded by verdant flora on the coveted Chhatikara-Radha Kund corridor.',
                'showcase_price' => 'Starting ₹ 35,000 / sq. yd',
                'showcase_link' => '/projects/shri-vrinda-aakruti-village-premium-residential-township',
                'showcase_image' => '',
            ],
            'asset_highlights' => [
                'h1' => 'Strategic commercial plots and highway complexes engineered for prime retail footfall and high-yield capital appreciation across Mathura & Vrindavan.',
                'h2' => 'Bespoke duplex villas and sanctuary retreats designed around Vedic vastu, private courtyards, subterranean electrification, and landscaped Kadamba groves.',
                'h3' => 'Freehold residential plots and modern apartment societies with 40-to-60 ft concrete avenues, 100% immediate registry, and 24/7 multi-tier security.',
            ],
            'asset_cards' => [
                'commercial' => [
                    'title' => 'COMMERCIAL PLOT',
                    'subtitle' => 'High-Yield Highway SCO & Retail Complexes',
                    'link' => '/commercial-property-in-vrindavan',
                    'image' => 'uploads/pages/commercial-property-in-vrindavan.jpeg',
                ],
                'villa' => [
                    'title' => 'VILA',
                    'subtitle' => 'Bespoke Duplex Sanctuaries & Courtyards',
                    'link' => '/luxury-villas-in-vrindavan',
                    'image' => 'uploads/pages/luxury-villas-in-vrindavan.jpeg',
                ],
                'plot' => [
                    'title' => 'PLOT',
                    'subtitle' => 'MVDA-Approved Freehold Gated Townships',
                    'link' => '/residential-plots-in-vrindavan',
                    'image' => 'uploads/pages/residential-plots-in-vrindavan.jpeg',
                ],
                'flat' => [
                    'title' => 'FLAT',
                    'subtitle' => 'Modern Gated Societies & Serviced Living',
                    'link' => '/flats-apartments-in-vrindavan',
                    'image' => 'uploads/pages/flats-in-vrindavan.jpg',
                ],
            ],
            'projects_section' => [
                'eyebrow' => 'Curated Masterpieces',
                'title' => 'Sanctuaries for the Discerning',
                'subtitle' => 'Explore hand-selected, MVDA-approved residential plotted enclaves, commercial high-streets, and serene countryside havelis across Braj.',
            ],
            'locations_section' => [
                'eyebrow' => 'Strategic Growth Corridors',
                'title' => 'Where Divinity Meets Modern Infrastructure',
                'subtitle' => 'From the high-growth commercial hubs of Mathura along NH-19 to the peaceful spiritual sanctuaries of Vrindavan near Prem Mandir, discover prime investment destinations.',
            ],
            'consultation_section' => [
                'eyebrow' => 'Private Client Desk',
                'title' => 'Schedule a Private Consultation & Showing',
                'subtitle' => 'Our senior advisors offer bespoke legal title verification, physical site inspections, and end-to-end registry facilitation.',
                'desk_note' => 'Direct Concierge: +91 9871731303 / +91 7409767452',
            ],
        ];

        $stored = self::get('home_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }

        // Recursively or key-wise merge to preserve defaults for any missing keys
        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Save dynamic homepage sections.
     *
     * @param array $data
     */
    public static function saveHomeSections(array $data): void
    {
        $current = self::getHomeSections();
        $merged = array_replace_recursive($current, $data);
        self::set('home_sections', $merged);
    }
}
