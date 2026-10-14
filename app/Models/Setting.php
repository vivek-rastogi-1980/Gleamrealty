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
     * Get dynamic "About Us" sections.
     */
    public static function getAboutSections(): array
    {
        $defaults = [
            'hero' => [
                'badge' => 'Since 2010',
                'heading' => 'About Us',
                'subheading' => 'Building legacies in the heart of Braj Bhumi',
                'image' => 'uploads/hero/hero-braj-sanctuary.webp',
            ],
            'overview' => [
                'badge' => 'Our Sanctuary',
                'title' => 'Where Devotion Meets Modern Real Estate',
                'sanctuary_image' => 'uploads/about/prem-mandir.webp',
                'sanctuary_image_alt' => 'Prem Mandir Vrindavan',
                'phone_1' => '+91 9871731303',
                'phone_2' => '+91 7409767452',
                'p1' => '<p>Gleamrealty Private Limited was founded on a singular vision: to offer devotees and investors a trustworthy, transparent pathway to securing an estate in the holy land of Vrindavan and Mathura.</p>',
                'p2' => '<p>We blend deep-rooted local expertise with rigorous legal diligence, ensuring every property we offer is 100% approved by the Mathura-Vrindavan Development Authority (MVDA).</p>',
                'callout_title' => 'A Legacy of Trust',
                'callout_p1' => 'Over a decade of unblemished service in Braj.',
                'callout_p2' => 'Thousands of families now call our enclaves home.',
            ],
            'metrics' => [
                ['val' => '10+', 'label' => 'Years of Excellence'],
                ['val' => '100%', 'label' => 'MVDA Approved'],
                ['val' => '3000+', 'label' => 'Happy Families'],
                ['val' => '5L+', 'label' => 'Sq. Yards Delivered'],
            ],
            'principles' => [
                'eyebrow' => 'Core Tenets',
                'title' => 'Our Guiding Principles',
                'mission_badge' => 'Our Mission',
                'mission_icon' => 'target',
                'mission_title' => 'Empowering Ethical Ownership',
                'mission_p1' => '<p>To provide completely encumbrance-free, Vastu-compliant land parcels and villas that allow families to reside peacefully in the spiritual capital of India.</p>',
                'mission_p2' => '<p>We are committed to absolute pricing transparency, ensuring our clients never face hidden charges or unexpected legal hurdles.</p>',
                'vision_badge' => 'Our Vision',
                'vision_icon' => 'eye',
                'vision_title' => 'The Future of Braj Real Estate',
                'vision_p1' => '<p>To be the most trusted, premier real estate developer in the Mathura-Vrindavan region, known for creating sustainable, beautifully landscaped gated communities.</p>',
                'vision_p2' => '<p>We envision a harmonious blend of ancient Vedic heritage with world-class modern infrastructure.</p>',
            ],
            'leadership' => [
                'leader1_name' => 'Vinay Rastogi',
                'leader1_role' => 'Founder & Chairman',
                'leader1_photo' => 'uploads/team/vinay-01.png',
                'leader1_eyebrow' => 'Visionary Leadership',
                'leader1_headline' => 'Pioneering Transparent Real Estate in Braj',
                'leader1_p1' => '<p>With over two decades of experience in real estate and infrastructure development, Vinay Rastogi recognized the urgent need for a professional, ethical approach to land acquisition in Vrindavan.</p>',
                'leader1_p2' => '<p>Under his guidance, Gleamrealty has grown from a boutique advisory into a leading developer of MVDA-approved townships.</p>',
                'leader1_p3' => '<p>His commitment to "Truth in Pricing" and rigorous legal vetting has earned the trust of thousands of devotees nationwide.</p>',
                'leader2_name' => 'Rakesh Sharma',
                'leader2_role' => 'Managing Director',
                'leader2_photo' => 'uploads/team/Rakesh-01.png',
                'leader2_eyebrow' => 'Operational Excellence',
                'leader2_headline' => 'Executing Master Planned Sanctuaries',
                'leader2_p1' => '<p>Rakesh Sharma brings unparalleled expertise in project execution, urban planning, and regulatory compliance within the Mathura-Vrindavan Development Authority framework.</p>',
                'leader2_p2' => '<p>He oversees the on-ground development of our signature projects, ensuring 40-foot wide roads, underground electrification, and lush green landscaping are delivered flawlessly.</p>',
                'leader2_p3' => '<p>His hands-on approach guarantees that what is promised on paper is exactly what is built on the ground.</p>',
            ],
            'capabilities' => [
                'eyebrow' => 'What We Do',
                'title' => 'Our Capabilities',
                'subtitle' => 'End-to-end real estate solutions in the Mathura-Vrindavan region.',
                'items' => [
                    ['tag' => 'Development', 'desc' => 'Master-planned gated communities.'],
                    ['tag' => 'Advisory', 'desc' => 'Expert investment consultation.'],
                    ['tag' => 'Legal', 'desc' => 'Title verification and registry.'],
                    ['tag' => 'Construction', 'desc' => 'Turnkey bespoke villa building.'],
                ],
            ],
            'why_choose' => [
                'eyebrow' => 'The Gleamrealty Advantage',
                'title' => 'Why Choose Us?',
                'subtitle' => 'We stand apart through our unwavering commitment to security and transparency.',
                'items' => [
                    ['tag' => '100% Approved', 'title' => 'MVDA Sanctioned', 'desc' => 'All projects carry official government approval.'],
                    ['tag' => 'Clear Title', 'title' => 'Immediate Registry', 'desc' => 'Freehold properties ready for immediate transfer.'],
                    ['tag' => 'Vedic Design', 'title' => 'Vastu Compliant', 'desc' => 'Layouts designed according to ancient principles.'],
                    ['tag' => 'Support', 'title' => 'Bank Loanable', 'desc' => 'Approved for financing by major national banks.'],
                ],
            ],
            'consultation' => [
                'badge' => 'Private Client Desk',
                'title' => 'Schedule a VIP Consultation',
                'subtitle' => 'Our senior advisors are ready to guide you through your property journey in Braj.',
                'phone_1' => '+91 9871731303',
                'phone_2' => '+91 7409767452',
            ],
            'seo' => [
                'meta_title' => 'About Us, Know About GLEAMREALTY PRIVATE LIMITED',
                'meta_description' => 'Learn about Gleamrealty Private Limited, the leading trusted real estate developer in Mathura and Vrindavan offering MVDA approved plots and villas.',
                'meta_keywords' => 'About Gleamrealty, Real Estate Developer Vrindavan, Mathura Property Builders',
            ],
        ];

        $stored = self::get('about_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }

        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Save dynamic "About Us" sections.
     */
    public static function saveAboutSections(array $data): void
    {
        $current = self::getAboutSections();
        $merged = array_replace_recursive($current, $data);
        self::set('about_sections', $merged);
    }

    /**
     * Get dynamic "Property in Vrindavan" sections.
     */
    public static function getPropertyVrindavanSections(): array
    {
        $defaults = [
            'hero' => [
                'badge' => 'The Braj Renaissance',
                'heading' => 'Property in Vrindavan',
                'subheading' => 'A generational shift in wealth creation and spiritual sanctuary along the Yamuna.',
                'image' => 'uploads/pages/property-in-vrindavan.png',
                'badge_1' => '100% MVDA Approved',
                'badge_2' => 'Bank Loanable Assets',
                'badge_3' => 'Freehold Registry',
                'badge_4' => 'Highway Connectivity',
            ],
            'overview' => [
                'badge' => 'The Golden Era',
                'title' => 'Why Vrindavan Is The Most Sought-After Real Estate Market in North India',
                'subtitle' => 'Over the last 36 months, property in Vrindavan has transformed from a niche spiritual retreat into a robust, high-yield asset class.',
                'content' => '<p>The narrative has shifted. Previously, acquiring property in Vrindavan meant navigating fragmented rural lands and ambiguous titles. Today, driven by sweeping state infrastructure initiatives like the upcoming Heritage City and the fully operational Noida International Airport (Jewar), the region is experiencing a structured, institutional real estate boom.</p><p>Investors from Delhi NCR, Mumbai, and NRIs are aggressively securing land banks along the Chhatikara-Vrindavan corridor (NH-19) and the Mathura-Govardhan belt. The dual appeal is unmatched: unprecedented capital appreciation coupled with the peace of residing in the holy land of Lord Krishna.</p>',
                'image' => 'uploads/pages/mero-vrindavan.png',
                'badge_sub' => 'Market Authority',
                'badge_title' => 'The Gleamrealty Standard',
                'secondary_image' => 'uploads/pages/property-in-vrindavan.png',
                'secondary_title' => 'Curated Sanctuaries',
                'secondary_desc' => 'We reject 90% of land parcels we audit. Only properties with 100% MVDA approval, clear 30-year title chains, and imminent infrastructure make it to our portfolio.',
                'metric_1_val' => '150%',
                'metric_1_lbl' => 'Avg 5-Year ROI',
                'metric_2_val' => '6 Lanes',
                'metric_2_lbl' => 'Yamuna Expressway',
                'metric_3_val' => '90 Min',
                'metric_3_lbl' => 'To Jewar Airport',
                'metric_4_val' => 'Zero',
                'metric_4_lbl' => 'Title Disputes',
            ],
            'legalities' => [
                'eyebrow' => 'Due Diligence',
                'title' => 'The 4 Pillars of Secure Investment',
                'subtitle' => 'The difference between speculative risk and guaranteed appreciation lies in rigorous legal vetting. We mandate these four pillars before offering any property in Vrindavan.',
                'p1_title' => '1. MVDA / RERA Sanction',
                'p1_desc' => 'We exclusively deal in projects officially sanctioned by the Mathura-Vrindavan Development Authority (MVDA), ensuring 40ft road widths, dedicated parks, and commercial zones that can never be encroached upon.',
                'p2_title' => '2. Immediate Freehold Registry',
                'p2_desc' => 'No power of attorney or vague allotments. We facilitate immediate, direct sale deed registration (Bainama) at the Mathura Sub-Registrar office, granting you absolute freehold ownership.',
                'p3_title' => '3. Physical Demarcation',
                'p3_desc' => 'Your land is not just a line on a map. We ensure immediate physical possession with concrete boundary pillars installed before you process your final payment.',
                'p4_title' => '4. Nationalized Bank Approval',
                'p4_desc' => 'The ultimate litmus test of a property\'s legality. Our approved townships are eligible for immediate plot and construction loans from SBI, HDFC, ICICI, and Punjab National Bank.',
            ],
            'megaprojects' => [
                'eyebrow' => 'Macro Drivers',
                'title' => 'Infrastructure Catalysts Redefining Braj',
                'subtitle' => 'Vrindavan is no longer a sleepy temple town. Billions are being injected into infrastructure, driving immense capital gains.',
                'mp1_title' => 'Jewar International Airport',
                'mp1_badge' => 'Operational',
                'mp1_desc' => 'With commercial flights now active, Vrindavan is a direct 90-minute signal-free drive for global and domestic devotees, drastically increasing demand for premium weekend villas.',
                'mp2_title' => 'Raya Heritage City',
                'mp2_badge' => 'In Development',
                'mp2_desc' => 'A proposed 9,350-hectare mega-city along the Yamuna Expressway, designed to decongest Vrindavan. Land values adjacent to this corridor are already surging.',
                'mp3_title' => 'Vrindavan Ropeway & Metro Neo',
                'mp3_badge' => 'Sanctioned',
                'mp3_desc' => 'State government initiatives to provide seamless, eco-friendly transit between Mathura Junction, Prem Mandir, and Banke Bihari, eliminating traffic bottlenecks.',
                'mp4_title' => 'Banke Bihari Corridor',
                'mp4_badge' => 'Active Construction',
                'mp4_desc' => 'A massive redevelopment mirroring the Kashi Vishwanath corridor, designed to accommodate millions of pilgrims smoothly, elevating the surrounding real estate premium.',
            ],
            'lifestyle' => [
                'eyebrow' => 'The Ultimate Dividend',
                'title' => 'Spiritual Peace, Modern Comfort',
                'subtitle' => 'Owning property in Vrindavan is about securing a legacy of peace for your family.',
                'card1_title' => 'Vedic Vastu Integration',
                'card1_desc' => 'Our custom villas are designed with central courtyards, sacred Tulsi platforms, and directional alignment for positive energy flow.',
                'card2_title' => 'Serene Community Living',
                'card2_desc' => 'Reside among like-minded devotees, retirees, and professionals who value Satsang, meditation, and a sattvic lifestyle.',
                'card3_title' => 'Organic & Natural Living',
                'card3_desc' => 'Gated townships featuring Kadamba and Neem groves, sweet water reserves, and organic farming patches.',
                'card4_title' => 'World-Class Healthcare',
                'card4_desc' => 'Immediate proximity to Ramakrishna Mission Hospital, Niyati Medicity, and top-tier medical facilities for complete peace of mind.',
            ],
            'consultation' => [
                'badge' => 'Expert Guidance',
                'title' => 'Navigate the Market with Confidence',
                'subtitle' => 'Avoid unapproved farmland traps. Schedule a consultation with our senior MVDA-compliance advisors to review our curated portfolio of verified properties in Vrindavan.',
                'phone_1' => '+91 9871731303',
                'phone_2' => '+91 7409767452',
                'whatsapp' => '+91 9871731303',
            ],
            'seo' => [
                'meta_title' => 'Property in Vrindavan | MVDA Approved Plots & Villas',
                'meta_description' => 'Discover verified, 100% MVDA approved property in Vrindavan. Secure freehold residential plots and luxury villas near Prem Mandir with Gleamrealty.',
                'meta_keywords' => 'Property in Vrindavan, Vrindavan Property, Buy Plot in Vrindavan, MVDA Approved Property',
            ],
        ];

        $stored = self::get('property_vrindavan_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }

        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Save dynamic "Property in Vrindavan" sections.
     */
    public static function savePropertyVrindavanSections(array $data): void
    {
        $current = self::getPropertyVrindavanSections();
        $merged = array_replace_recursive($current, $data);
        self::set('property_vrindavan_sections', $merged);

        $page = Page::findBySlug('property-in-vrindavan');
        $pagePayload = [
            'title' => 'Property in Vrindavan',
            'slug' => 'property-in-vrindavan',
            'hero_heading' => $merged['hero']['heading'] ?? 'Property in Vrindavan',
            'hero_subheading' => $merged['hero']['subheading'] ?? '',
            'hero_media_type' => 'image',
            'hero_media_url' => $merged['hero']['image'] ?? 'uploads/pages/property-in-vrindavan.png',
            'content' => $merged['overview']['content'] ?? '',
            'meta_title' => $merged['seo']['meta_title'] ?? '',
            'meta_description' => $merged['seo']['meta_description'] ?? '',
            'meta_keywords' => $merged['seo']['meta_keywords'] ?? '',
            'is_published' => 1,
        ];
        if ($page) {
            Page::update((int) $page['id'], $pagePayload);
        } else {
            Page::create($pagePayload);
        }
    }

    /**
     * Get dynamic "Residential Plots in Vrindavan" sections.
     */
    public static function getResidentialPlotsSections(): array
    {
        $defaults = [
            'hero' => [
                'badge' => 'The Braj Renaissance',
                'heading' => 'Plots in Vrindavan',
                'subheading' => 'Secure your legacy in fully approved, premium plotted enclaves.',
                'image' => 'uploads/pages/residential-plots-in-vrindavan.jpeg',
                'badge_1' => '100% MVDA Approved',
                'badge_2' => 'Bank Loanable Assets',
                'badge_3' => 'Freehold Registry',
                'badge_4' => 'Highway Connectivity',
            ],
            'overview' => [
                'badge' => 'The Golden Era',
                'title' => 'Why Residential Plots in Vrindavan Are The Smartest Investment',
                'subtitle' => 'Invest in the fastest growing spiritual and real estate destination in North India.',
                'content' => '<p>Residential plots in Vrindavan offer an unmatched combination of spiritual fulfillment and high capital appreciation. Our curated selection of plotted developments is designed to provide you with the perfect canvas to build your dream home or a serene weekend getaway.</p><p>All our projects are strategically located, fully approved by MVDA, and feature modern amenities such as wide paved roads, underground utilities, and landscaped parks.</p>',
                'image' => 'uploads/pages/mero-vrindavan.png',
                'badge_sub' => 'Market Authority',
                'badge_title' => 'The Gleamrealty Standard',
                'secondary_image' => 'uploads/pages/property-in-vrindavan.png',
                'secondary_title' => 'Curated Sanctuaries',
                'secondary_desc' => 'We reject 90% of land parcels we audit. Only properties with 100% MVDA approval, clear 30-year title chains, and imminent infrastructure make it to our portfolio.',
                'metric_1_val' => '150%',
                'metric_1_lbl' => 'Avg 5-Year ROI',
                'metric_2_val' => '6 Lanes',
                'metric_2_lbl' => 'Yamuna Expressway',
                'metric_3_val' => '90 Min',
                'metric_3_lbl' => 'To Jewar Airport',
                'metric_4_val' => 'Zero',
                'metric_4_lbl' => 'Title Disputes',
            ],
            'legalities' => [
                'eyebrow' => 'Due Diligence',
                'title' => 'The 4 Pillars of Secure Investment',
                'subtitle' => 'The difference between speculative risk and guaranteed appreciation lies in rigorous legal vetting. We mandate these four pillars before offering any property in Vrindavan.',
                'p1_title' => '1. MVDA / RERA Sanction',
                'p1_desc' => 'We exclusively deal in projects officially sanctioned by the Mathura-Vrindavan Development Authority (MVDA), ensuring 40ft road widths, dedicated parks, and commercial zones that can never be encroached upon.',
                'p2_title' => '2. Immediate Freehold Registry',
                'p2_desc' => 'No power of attorney or vague allotments. We facilitate immediate, direct sale deed registration (Bainama) at the Mathura Sub-Registrar office, granting you absolute freehold ownership.',
                'p3_title' => '3. Physical Demarcation',
                'p3_desc' => 'Your land is not just a line on a map. We ensure immediate physical possession with concrete boundary pillars installed before you process your final payment.',
                'p4_title' => '4. Nationalized Bank Approval',
                'p4_desc' => 'The ultimate litmus test of a property\'s legality. Our approved townships are eligible for immediate plot and construction loans from SBI, HDFC, ICICI, and Punjab National Bank.',
            ],
            'megaprojects' => [
                'eyebrow' => 'Macro Drivers',
                'title' => 'Infrastructure Catalysts Redefining Braj',
                'subtitle' => 'Vrindavan is no longer a sleepy temple town. Billions are being injected into infrastructure, driving immense capital gains.',
                'mp1_title' => 'Jewar International Airport',
                'mp1_badge' => 'Operational',
                'mp1_desc' => 'With commercial flights now active, Vrindavan is a direct 90-minute signal-free drive for global and domestic devotees, drastically increasing demand for premium weekend villas.',
                'mp2_title' => 'Raya Heritage City',
                'mp2_badge' => 'In Development',
                'mp2_desc' => 'A proposed 9,350-hectare mega-city along the Yamuna Expressway, designed to decongest Vrindavan. Land values adjacent to this corridor are already surging.',
                'mp3_title' => 'Vrindavan Ropeway & Metro Neo',
                'mp3_badge' => 'Sanctioned',
                'mp3_desc' => 'State government initiatives to provide seamless, eco-friendly transit between Mathura Junction, Prem Mandir, and Banke Bihari, eliminating traffic bottlenecks.',
                'mp4_title' => 'Banke Bihari Corridor',
                'mp4_badge' => 'Active Construction',
                'mp4_desc' => 'A massive redevelopment mirroring the Kashi Vishwanath corridor, designed to accommodate millions of pilgrims smoothly, elevating the surrounding real estate premium.',
            ],
            'lifestyle' => [
                'eyebrow' => 'The Ultimate Dividend',
                'title' => 'Spiritual Peace, Modern Comfort',
                'subtitle' => 'Owning property in Vrindavan is about securing a legacy of peace for your family.',
                'card1_title' => 'Vedic Vastu Integration',
                'card1_desc' => 'Our custom villas are designed with central courtyards, sacred Tulsi platforms, and directional alignment for positive energy flow.',
                'card2_title' => 'Serene Community Living',
                'card2_desc' => 'Reside among like-minded devotees, retirees, and professionals who value Satsang, meditation, and a sattvic lifestyle.',
                'card3_title' => 'Organic & Natural Living',
                'card3_desc' => 'Gated townships featuring Kadamba and Neem groves, sweet water reserves, and organic farming patches.',
                'card4_title' => 'World-Class Healthcare',
                'card4_desc' => 'Immediate proximity to Ramakrishna Mission Hospital, Niyati Medicity, and top-tier medical facilities for complete peace of mind.',
            ],
            'consultation' => [
                'badge' => 'Expert Guidance',
                'title' => 'Navigate the Market with Confidence',
                'subtitle' => 'Avoid unapproved farmland traps. Schedule a consultation with our senior MVDA-compliance advisors to review our curated portfolio of verified properties in Vrindavan.',
                'phone_1' => '+91 9871731303',
                'phone_2' => '+91 7409767452',
                'whatsapp' => '+91 9871731303',
            ],
            'seo' => [
                'meta_title' => 'Residential Plots in Vrindavan | MVDA Approved Plots',
                'meta_description' => 'Buy verified, 100% MVDA approved residential plots in Vrindavan. Build your dream home in secure, gated townships with Gleamrealty.',
                'meta_keywords' => 'Residential Plots in Vrindavan, Plots in Vrindavan, Buy Plot in Vrindavan, MVDA Approved Plots',
            ],
        ];

        $stored = self::get('residential_plots_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }

        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Save dynamic "Residential Plots in Vrindavan" sections.
     */
    public static function saveResidentialPlotsSections(array $data): void
    {
        $current = self::getResidentialPlotsSections();
        $merged = array_replace_recursive($current, $data);
        self::set('residential_plots_sections', $merged);

        $page = Page::findBySlug('residential-plots-in-vrindavan');
        $pagePayload = [
            'title' => 'Residential Plots in Vrindavan',
            'slug' => 'residential-plots-in-vrindavan',
            'hero_heading' => $merged['hero']['heading'] ?? 'Residential Plots in Vrindavan',
            'hero_subheading' => $merged['hero']['subheading'] ?? '',
            'hero_media_type' => 'image',
            'hero_media_url' => $merged['hero']['image'] ?? 'uploads/pages/residential-plots-in-vrindavan.jpeg',
            'content' => $merged['overview']['content'] ?? '',
            'meta_title' => $merged['seo']['meta_title'] ?? '',
            'meta_description' => $merged['seo']['meta_description'] ?? '',
            'meta_keywords' => $merged['seo']['meta_keywords'] ?? '',
            'is_published' => 1,
        ];
        if ($page) {
            Page::update((int) $page['id'], $pagePayload);
        } else {
            Page::create($pagePayload);
        }
    }

    /**
     * Get dynamic "Commercial Property in Vrindavan" sections.
     */
    public static function getCommercialPropertySections(): array
    {
        $defaults = [
            'hero' => [
                'badge' => 'Institutional Assets',
                'heading' => 'Commercial Property in Vrindavan',
                'subheading' => 'High-yield retail, hospitality, and highway real estate in Braj.',
                'image' => 'uploads/pages/commercial-property-in-vrindavan.jpeg',
                'badge_1' => 'Highway Frontage',
                'badge_2' => 'High Footfall Retail',
                'badge_3' => 'Hospitality Zones',
                'badge_4' => 'Institutional Yields',
            ],
            'overview' => [
                'badge' => 'The Commercial Boom',
                'title' => 'Why Vrindavan Is Becoming a Major Commercial Hub',
                'subtitle' => 'With millions of pilgrims visiting annually, the demand for organized retail, hospitality, and commercial infrastructure is at an all-time high.',
                'content' => '<p>Vrindavan is no longer just a pilgrimage destination; it is rapidly evolving into a structured commercial ecosystem. The influx of domestic and international tourists demands world-class hospitality, organized retail high streets, and modern service apartments.</p><p>Investors are shifting focus from residential to commercial assets along the NH-19 bypass and Chhatikara road, realizing significantly higher rental yields and exponential capital appreciation.</p>',
                'image' => 'uploads/pages/commercial-property-in-vrindavan.jpeg',
                'badge_sub' => 'Market Authority',
                'badge_title' => 'The Gleamrealty Standard',
                'secondary_image' => 'uploads/pages/property-in-vrindavan.png',
                'secondary_title' => 'Strategic Commercial Zones',
                'secondary_desc' => 'We curate high-visibility commercial plots strictly within MVDA-sanctioned zones, ensuring zero demolition risk and clear commercial land-use (CLU) conversion.',
                'metric_1_val' => '10M+',
                'metric_1_lbl' => 'Annual Visitors',
                'metric_2_val' => '9-12%',
                'metric_2_lbl' => 'Rental Yields',
                'metric_3_val' => '6 Lanes',
                'metric_3_lbl' => 'NH-19 Highway',
                'metric_4_val' => '100%',
                'metric_4_lbl' => 'Commercial Sanction',
            ],
            'catalysts' => [
                'eyebrow' => 'Growth Drivers',
                'title' => 'Infrastructure Catalysts',
                'subtitle' => 'Major government initiatives driving commercial real estate demand.',
                'p1_title' => 'Heritage City Project',
                'p1_desc' => 'A massive new urban center designed to accommodate commercial and hospitality ventures on a global scale.',
                'p2_title' => 'Jewar International Airport',
                'p2_desc' => 'Direct international connectivity is bringing a new demographic of high-net-worth pilgrims, boosting luxury retail and hospitality.',
                'p3_title' => 'Yamuna Expressway Expansion',
                'p3_desc' => 'Enhanced logistics and connectivity make highway commercial hubs highly lucrative for food courts and retail.',
                'p4_title' => 'Banke Bihari Corridor',
                'p4_desc' => 'Organizing the core temple zone is pushing modern retail and dining establishments to the outer ring roads and bypasses.',
            ],
            'sectors' => [
                'eyebrow' => 'Asset Classes',
                'title' => 'Commercial Sectors with Highest Demand',
                'subtitle' => 'We help you identify the right asset class based on your investment horizon.',
                's1_icon' => '🏨',
                's1_title' => 'Hospitality & Hotels',
                's1_desc' => 'Premium land parcels approved for hotels and resorts to cater to the massive shortage of quality rooms.',
                's1_roi' => 'High Yield',
                's2_icon' => '🛍️',
                's2_title' => 'Organized Retail (SCO)',
                's2_desc' => 'Shop-cum-office (SCO) plots offering flexibility for retail showrooms, restaurants, and office spaces.',
                's2_roi' => 'Stable Income',
                's3_icon' => '🍽️',
                's3_title' => 'Highway Food Courts',
                's3_desc' => 'Strategic plots on NH-19 ideal for multi-brand food courts capturing transit highway traffic.',
                's3_roi' => 'Rapid Appreciation',
            ],
            'showcase' => [
                'eyebrow' => 'Flagship Opportunity',
                'title' => 'Featured Commercial Asset',
                'subtitle' => 'Prime highway frontage for immediate development.',
                'image' => 'uploads/pages/commercial-property-in-vrindavan.jpeg',
                'badge' => 'Pre-Launch',
                'price_tag' => 'Custom Pricing',
                'location' => 'NH-19 Bypass',
                'headline' => 'Shri Vrinda Commercial Complex',
                'desc' => 'An exclusive MVDA-approved commercial high-street offering unparalleled visibility and footfall potential.',
                'f1_lbl' => 'Frontage',
                'f1_val' => '150 Ft',
                'f2_lbl' => 'Approval',
                'f2_val' => 'MVDA Commercial',
                'f3_lbl' => 'FAR',
                'f3_val' => '2.5',
                'f4_lbl' => 'Status',
                'f4_val' => 'Ready to Build',
                'project_slug' => 'shri-vrinda-orchids-commercial-complex',
            ],
            'consultation' => [
                'badge' => 'Institutional Advisory',
                'title' => 'Schedule a Commercial Site Visit',
                'subtitle' => 'Connect with our B2B commercial real estate experts for ROI analysis and site selection.',
                'phone_1' => '+91 9871731303',
                'phone_2' => '+91 7409767452',
                'whatsapp' => '+91 9871731303',
            ],
            'seo' => [
                'meta_title' => 'Commercial Property in Vrindavan | Highway Retail Plots',
                'meta_description' => 'Invest in high-yield commercial property in Vrindavan. Explore MVDA approved retail spaces, hotel lands, and highway plots with Gleamrealty.',
                'meta_keywords' => 'Commercial Property in Vrindavan, Retail Plots Vrindavan, Hotel Land Vrindavan, Buy Commercial Property',
            ],
        ];

        $stored = self::get('commercial_property_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }

        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Save dynamic "Commercial Property in Vrindavan" sections.
     */
    public static function saveCommercialPropertySections(array $data): void
    {
        $current = self::getCommercialPropertySections();
        $merged = array_replace_recursive($current, $data);
        self::set('commercial_property_sections', $merged);

        $page = Page::findBySlug('commercial-property-in-vrindavan');
        $pagePayload = [
            'title' => 'Commercial Property in Vrindavan',
            'slug' => 'commercial-property-in-vrindavan',
            'hero_heading' => $merged['hero']['heading'] ?? 'Commercial Property in Vrindavan',
            'hero_subheading' => $merged['hero']['subheading'] ?? '',
            'hero_media_type' => 'image',
            'hero_media_url' => $merged['hero']['image'] ?? 'uploads/pages/commercial-property-in-vrindavan.jpeg',
            'content' => $merged['overview']['content'] ?? '',
            'meta_title' => $merged['seo']['meta_title'] ?? '',
            'meta_description' => $merged['seo']['meta_description'] ?? '',
            'meta_keywords' => $merged['seo']['meta_keywords'] ?? '',
            'is_published' => 1,
        ];
        if ($page) {
            Page::update((int) $page['id'], $pagePayload);
        } else {
            Page::create($pagePayload);
        }
    }

    /**
     * Get dynamic "Luxury Villas in Vrindavan" sections.
     */
    public static function getLuxuryVillasSections(): array
    {
        $defaults = [
            'hero' => [
                'heading' => 'Luxury Villas in Vrindavan',
                'subheading' => 'Experience divine tranquility in your own bespoke sanctuary.',
                'image' => 'uploads/pages/luxury-villas-in-vrindavan.jpeg',
            ],
            'narrative' => [
                'eyebrow' => 'A New Era of Living',
                'title' => 'Where Vedic Heritage Meets Modern Luxury',
                'content' => '<p>Owning a luxury villa in Vrindavan is more than a real estate investment; it is a profound spiritual decision. Our villas are meticulously designed to offer the ultimate balance of modern comfort and traditional Vedic architecture, ensuring every home resonates with peace and positivity.</p><p>Set within fully approved, gated enclaves, these sanctuaries provide families with a safe, serene environment away from the city\'s chaos, yet intimately connected to the heart of Braj.</p>',
                'metric_1_val' => '100%',
                'metric_1_lbl' => 'Vastu Compliant',
                'metric_2_val' => '24/7',
                'metric_2_lbl' => 'Multi-Tier Security',
                'metric_3_val' => '40 Ft',
                'metric_3_lbl' => 'Wide Avenues',
                'metric_4_val' => '0',
                'metric_4_lbl' => 'Hidden Costs',
            ],
            'outperforms' => [
                'eyebrow' => 'The Gleamrealty Edge',
                'title' => 'Why Our Villas Outperform the Market',
                'subtitle' => 'Uncompromising quality, legal clarity, and strategic locations.',
                'p1_title' => '100% MVDA Approved',
                'p1_desc' => 'Every villa is built on strictly sanctioned land, ensuring full compliance with municipal master plans and guaranteeing your peace of mind.',
                'p2_title' => 'Bespoke Architecture',
                'p2_desc' => 'We offer customizable layouts. Whether you desire a private courtyard or a dedicated puja room, our architects tailor the space to your spiritual needs.',
                'p3_title' => 'Premium Construction Quality',
                'p3_desc' => 'From reinforced foundations to premium fixtures, we use only the highest grade materials, supervised by expert engineers at every step.',
                'p4_title' => 'Seamless Bank Financing',
                'p4_desc' => 'Our clear titles and approvals mean you can easily secure home loans from leading nationalized banks like SBI, HDFC, and PNB.',
            ],
            'vastu' => [
                'eyebrow' => 'Sacred Alignment',
                'title' => 'Harmonizing Energy with Vastu Shastra',
                'subtitle' => 'Our villas are deeply rooted in ancient Vedic architectural principles to ensure a harmonious living experience.',
                'z1_num' => '01',
                'z1_title' => 'Brahmasthan',
                'z1_desc' => 'The central zone of the villa is kept open and well-lit, allowing cosmic energy to flow freely throughout the home.',
                'z2_num' => '02',
                'z2_title' => 'Ishan Kund',
                'z2_desc' => 'The sacred North-East corner is dedicated to the Puja room, ensuring your daily prayers resonate with the highest positive vibrations.',
                'z3_num' => '03',
                'z3_title' => 'Natural Elements',
                'z3_desc' => 'Strategic placement of water bodies and plantations like Tulsi and Kadamba to maintain ecological and spiritual balance.',
            ],
            'showcase' => [
                'eyebrow' => 'Signature Enclaves',
                'title' => 'Explore Our Premier Villa Projects',
                'subtitle' => 'Discover the finest gated communities in Vrindavan.',
                'p1_image' => 'uploads/pages/luxury-villas-in-vrindavan.jpeg',
                'p1_badge1' => 'Ready to Move',
                'p1_badge2' => 'Premium',
                'p1_location' => 'Govardhan Road',
                'p1_title' => 'Shri Vrinda Aakruti Village',
                'p1_desc' => 'A stunning collection of duplex villas surrounded by lush greenery, offering a perfect blend of luxury and devotion.',
                'p1_f1' => '3 BHK Duplex',
                'p1_f2' => '100 - 150 Sq. Yd',
                'p1_f3' => 'MVDA Approved',
                'p1_url' => '/projects/shri-vrinda-aakruti-village-premium-residential-township',
                'p2_image' => 'uploads/pages/mero-vrindavan.png',
                'p2_badge1' => 'Newly Launched',
                'p2_badge2' => 'Ultra Luxury',
                'p2_location' => 'NH-19 Bypass',
                'p2_title' => 'Shri Vrinda Greens Enclave',
                'p2_desc' => 'Expansive luxury villas with modern amenities, designed for those who seek an elevated lifestyle in the holy city.',
                'p2_f1' => '4 BHK Villas',
                'p2_f2' => '200+ Sq. Yd',
                'p2_f3' => 'Gated Security',
                'p2_url' => '/projects/shri-vrinda-greens-premium-residential-plots',
            ],
            'faqs' => [
                'eyebrow' => 'Common Queries',
                'title' => 'Frequently Asked Questions',
                'subtitle' => 'Clear answers to help you make an informed decision.',
                'list' => [
                    ['q' => 'Can I customize the interior layout of my villa?', 'a' => 'Yes, for under-construction villas, we offer extensive customization options including layout changes, flooring preferences, and fixture upgrades.'],
                    ['q' => 'Are home loans available for these villas?', 'a' => 'Absolutely. Since our projects are 100% MVDA approved, leading banks like SBI, HDFC, and ICICI offer home loans covering up to 80% of the property value.'],
                    ['q' => 'What is the typical construction timeline?', 'a' => 'From the date of booking and finalization of the layout, a bespoke villa typically takes between 8 to 12 months for complete handover.'],
                    ['q' => 'Is there a maintenance team available post-possession?', 'a' => 'Yes, our estates are managed by a dedicated facility management team that handles security, landscaping, and common area maintenance.']
                ]
            ],
            'consultation' => [
                'badge' => 'Private Client Desk',
                'title' => 'Schedule a VIP Villa Tour',
                'subtitle' => 'Experience the luxury and serenity firsthand. Book a private tour of our show villas with our senior advisors.',
                'phone_1' => '+91 9871731303',
                'phone_2' => '+91 7409767452',
            ],
            'seo' => [
                'meta_title' => 'Luxury Villas in Vrindavan | Buy Premium Duplex Homes',
                'meta_description' => 'Discover MVDA approved luxury villas in Vrindavan. Explore premium 3BHK and 4BHK duplex homes in secure, gated townships by Gleamrealty.',
                'meta_keywords' => 'Luxury Villas in Vrindavan, Buy Villa in Vrindavan, Duplex Homes Vrindavan, Premium Property Mathura',
            ],
        ];

        $stored = self::get('luxury_villas_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }

        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Save dynamic "Luxury Villas in Vrindavan" sections.
     */
    public static function saveLuxuryVillasSections(array $data): void
    {
        $current = self::getLuxuryVillasSections();
        $merged = array_replace_recursive($current, $data);
        self::set('luxury_villas_sections', $merged);

        $page = Page::findBySlug('luxury-villas-in-vrindavan');
        $pagePayload = [
            'title' => 'Luxury Villas in Vrindavan',
            'slug' => 'luxury-villas-in-vrindavan',
            'hero_heading' => $merged['hero']['heading'] ?? 'Luxury Villas in Vrindavan',
            'hero_subheading' => $merged['hero']['subheading'] ?? '',
            'hero_media_type' => 'image',
            'hero_media_url' => $merged['hero']['image'] ?? 'uploads/pages/luxury-villas-in-vrindavan.jpeg',
            'content' => $merged['narrative']['content'] ?? '',
            'meta_title' => $merged['seo']['meta_title'] ?? '',
            'meta_description' => $merged['seo']['meta_description'] ?? '',
            'meta_keywords' => $merged['seo']['meta_keywords'] ?? '',
            'is_published' => 1,
        ];
        if ($page) {
            Page::update((int) $page['id'], $pagePayload);
        } else {
            Page::create($pagePayload);
        }
    }

    /**
     * Get dynamic "Property in Mathura" sections.
     */
    public static function getPropertyMathuraSections(): array
    {
        $defaults = [
            'hero' => [
                'heading' => 'Property in Mathura',
                'subheading' => 'Secure your future in the thriving real estate market of Braj.',
                'image' => 'uploads/pages/property-in-mathura-hero.jpg',
            ],
            'narrative' => [
                'image' => 'uploads/pages/mero-vrindavan.png',
                'eyebrow' => 'Market Overview',
                'title' => 'The Rise of Mathura Real Estate',
                'content' => '<p>Mathura is experiencing a real estate renaissance. With the influx of infrastructural investments and improved connectivity, property in Mathura is witnessing unprecedented appreciation.</p><p>Investors and home buyers alike are drawn to the city\'s unique blend of cultural heritage and modern development, making it one of the most lucrative real estate markets in North India.</p>',
                'badge_title' => 'Growth Rate',
                'badge_value' => 'Accelerated',
                'metric_1_val' => '100%',
                'metric_1_lbl' => 'MVDA Approved',
                'metric_2_val' => 'High',
                'metric_2_lbl' => 'ROI Potential',
                'metric_3_val' => 'Fast',
                'metric_3_lbl' => 'Appreciation',
                'metric_4_val' => 'Secure',
                'metric_4_lbl' => 'Investment',
            ],
            'township' => [
                'eyebrow' => 'Featured Township',
                'title' => 'Shri Vrinda Aakruti Village',
                'subtitle' => 'Experience premium gated community living.',
                'image' => 'uploads/pages/aakruti-township.jpg',
                'price' => '₹35,000 / sq. yd',
                'location' => 'Govardhan Road',
                'project_title' => 'Aakruti Village',
                'project_desc' => 'A beautifully designed township offering modern amenities amidst serene surroundings.',
                'f1_lbl' => 'Approval',
                'f1_val' => 'MVDA',
                'f2_lbl' => 'Security',
                'f2_val' => '24/7 Gated',
                'f3_lbl' => 'Amenities',
                'f3_val' => 'Parks & Roads',
                'f4_lbl' => 'Loanable',
                'f4_val' => 'Yes',
            ],
            'comparison' => [
                'eyebrow' => 'Market Comparison',
                'title' => 'Mathura vs. Vrindavan',
                'subtitle' => 'Understand the nuances of both markets to make an informed decision.',
                'mathura_eyebrow' => 'Mathura City',
                'mathura_price' => '₹25,000 - ₹45,000 / sq. yd',
                'mathura_title' => 'Urban Convenience',
                'mathura_features' => 'Closer to railway stations, schools, and hospitals. Ideal for permanent residence.',
                'vrindavan_eyebrow' => 'Vrindavan',
                'vrindavan_price' => '₹40,000 - ₹85,000 / sq. yd',
                'vrindavan_title' => 'Spiritual Hub',
                'vrindavan_features' => 'Higher rental yields from tourists. Ideal for weekend homes and spiritual retreats.',
            ],
            'budget' => [
                'eyebrow' => 'Investment Tiers',
                'title' => 'Options for Every Budget',
                'subtitle' => 'From affordable plots to premium villas, explore what Mathura has to offer.',
                'tier1_eyebrow' => 'Entry Level',
                'tier1_title' => 'Standard Plots',
                'tier1_price' => 'Under ₹25 Lakhs',
                'tier1_desc' => 'Ideal for long-term holding in upcoming corridors.',
                'tier2_eyebrow' => 'Mid Range',
                'tier2_title' => 'Premium Plots',
                'tier2_price' => '₹25 - ₹45 Lakhs',
                'tier2_desc' => 'MVDA approved plots in gated townships with ready infrastructure.',
                'tier3_eyebrow' => 'Luxury',
                'tier3_title' => 'Duplex Villas',
                'tier3_price' => '₹60 Lakhs & Above',
                'tier3_desc' => 'Ready-to-move-in luxury homes with bespoke finishes.',
            ],
            'faqs' => [
                'eyebrow' => 'FAQs',
                'title' => 'Frequently Asked Questions',
                'subtitle' => 'Common queries about buying property in Mathura.',
                'list' => []
            ],
            'seo' => [
                'meta_title' => 'Property in Mathura | Buy Real Estate & Plots',
                'meta_description' => 'Explore the best property in Mathura. Buy MVDA approved residential and commercial plots with Gleamrealty.',
                'meta_keywords' => 'Property in Mathura, Real Estate Mathura, Buy Plot in Mathura, MVDA Approved Mathura',
            ],
        ];

        $stored = self::get('property_mathura_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }

        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Save dynamic "Property in Mathura" sections.
     */
    public static function savePropertyMathuraSections(array $data): void
    {
        $current = self::getPropertyMathuraSections();
        $merged = array_replace_recursive($current, $data);
        self::set('property_mathura_sections', $merged);

        $page = Page::findBySlug('property-in-mathura');
        $pagePayload = [
            'title' => 'Property in Mathura',
            'slug' => 'property-in-mathura',
            'hero_heading' => $merged['hero']['heading'] ?? 'Property in Mathura',
            'hero_subheading' => $merged['hero']['subheading'] ?? '',
            'hero_media_type' => 'image',
            'hero_media_url' => $merged['hero']['image'] ?? 'uploads/pages/property-in-mathura-hero.jpg',
            'content' => $merged['narrative']['content'] ?? '',
            'meta_title' => $merged['seo']['meta_title'] ?? '',
            'meta_description' => $merged['seo']['meta_description'] ?? '',
            'meta_keywords' => $merged['seo']['meta_keywords'] ?? '',
            'is_published' => 1,
        ];
        if ($page) {
            Page::update((int) $page['id'], $pagePayload);
        } else {
            Page::create($pagePayload);
        }
    }

    /**
     * Get dynamic "Plot Rate in Vrindavan" sections.
     */
    public static function getPlotRateVrindavanSections(): array
    {
        $defaults = [
            'hero' => [
                'heading' => 'Plot Rate in Vrindavan',
                'subheading' => 'Vrindavan Plot Price, Vrindavan Land Price: What the Numbers Really Mean in 2026',
                'image' => 'uploads/pages/Why-Choose-Vrindavan.jpg',
            ],
            'narrative' => [
                'eyebrow' => 'Truth in Pricing',
                'title' => 'The Plot Rate in Vrindavan Is a Range, Not a Number',
                'content' => '<p>Ask three brokers for the plot rate in Vrindavan and you will receive three completely conflicting answers. One quotes <strong>â‚¹25,000 per square yard</strong> on a far-out rural colony. Another quotes <strong>â‚¹42,000</strong> on the NH-19 highway approach. A third, standing near Prem Mandir, says <strong>â‚¹85,000 to â‚¹1 Lakh</strong>, and honestly isn\'t lying.</p><p>All three are "Vrindavan." None of them are describing the same product. That spread is the single most critical thing to comprehend before deploying capital. In 2026, the Vrindavan land price spans from unapproved, unauthorized raw agricultural tracts to fully certified, bank-funded gated townships.</p><p>Most of the active, buildable, approved inventory that ordinary families and smart investors actually purchase sits in the middle band: between <strong>â‚¹38,000 and â‚¹65,000 per square yard</strong>. At GLEAMREALTY PRIVATE LIMITED, we believe pricing clarity is sacred.</p>',
                'image' => 'uploads/pages/Why-Choose-Vrindavan.jpg',
                'm1_val' => 'â‚¹38K-65K', 'm1_lbl' => 'Approved Band',
                'm2_val' => '4 Corridors', 'm2_lbl' => 'Key Micro-Markets',
                'm3_val' => '90 Min', 'm3_lbl' => 'To Jewar Airport',
                'm4_val' => '100%', 'm4_lbl' => 'Transparent Pricing',
            ],
            'corridors' => [
                'eyebrow' => 'Micro-Market Analysis',
                'title' => 'Corridor Breakdown: Where Value Meets Approval',
                'subtitle' => 'Understanding the pricing drivers across Vrindavan\'s four strategic real estate development arteries.',
                'c1_price' => 'â‚¹ 39,990 â€“ â‚¹ 42,500 / sq. yd', 'c1_title' => 'NH-19 Highway Corridor (Akbarpur & Chaumuha)', 'c1_desc' => 'The NH-19 corridor is doing the heaviest lifting in the market. It offers clean 6-lane highway frontage, direct bypass connectivity into Vrindavan, and rapid appreciation.',
                'c2_price' => 'â‚¹ 60,000 â€“ â‚¹ 75,000 / sq. yd', 'c2_title' => 'Rukmani Vihar & VIP Temple Belt', 'c2_desc' => 'The Beverly Hills of Vrindavan. Walking distance or 5-minute drive to Prem Mandir, Chandrodaya Mandir, and ISKCON.',
                'c3_price' => 'â‚¹ 32,000 â€“ â‚¹ 38,000 / sq. yd', 'c3_title' => 'Mathura-Govardhan Road Corridor', 'c3_desc' => 'A peaceful, green residential corridor linking Mathura City with Govardhan Dham. Shri Vrinda Aakruti Village on Satoha-Naugaon Road is fully sanctioned by MVDA.',
                'c4_price' => 'Operational Catalyst', 'c4_title' => 'Jewar Airport Factor: Already Open & Operating', 'c4_desc' => 'The airport was inaugurated on 28 March 2026, and commercial flights began on 15 June 2026. Scheduled buses already connect the airport to Vrindavan in 90 minutes.',
            ],
            'matrix' => [
                'eyebrow' => 'Verified Benchmark',
                'title' => '2026 Vrindavan Plot Price Matrix',
                'subtitle' => 'Comprehensive ground-reality rate breakdown across official approval tiers and micro-markets.',
                'r1_col1' => 'Rukmani Vihar (Shri Vrinda Orchids)', 'r1_col2' => 'MVDA & RERA', 'r1_col3' => 'â‚¹ 60,000 â€“ â‚¹ 75,000', 'r1_col4' => 'â‚¹ 60L â€“ â‚¹ 75L', 'r1_col5' => '40ft Roads, Underground Power, Parks',
                'r2_col1' => 'NH-19 Akbarpur (Shri Vrinda Naivedyam)', 'r2_col2' => 'MVDA Approved', 'r2_col3' => 'â‚¹ 42,500', 'r2_col4' => 'â‚¹ 42.5 Lakhs', 'r2_col5' => 'Highway Frontage, Gated Security',
                'r3_col1' => 'Chaumuha NH-19 (Shri Vasudhara Vaishaly)', 'r3_col2' => 'MVDA Sanctioned', 'r3_col3' => 'â‚¹ 39,990', 'r3_col4' => 'â‚¹ 39.9 Lakhs', 'r3_col5' => 'Wide Avenues, Streetlights, Water Line',
                'r4_col1' => 'Govardhan Rd (Shri Vrinda Aakruti Village)', 'r4_col2' => 'MVDA Sanctioned', 'r4_col3' => 'â‚¹ 35,000', 'r4_col4' => 'â‚¹ 35.0 Lakhs', 'r4_col5' => 'Sweet Water, Meditation Lawn, Gated',
                'r5_col1' => 'Prem Mandir Core VIP Enclave', 'r5_col2' => 'Private Resale', 'r5_col3' => 'â‚¹ 85,000 â€“ â‚¹ 1,20,000', 'r5_col4' => 'â‚¹ 85L â€“ â‚¹ 1.2 Cr', 'r5_col5' => 'Existing Municipal Infrastructure',
                'r6_col1' => 'Far Rural Unapproved Colonies', 'r6_col2' => 'Unapproved Farmland', 'r6_col3' => 'â‚¹ 15,000 â€“ â‚¹ 24,000', 'r6_col4' => 'â‚¹ 15L â€“ â‚¹ 24L', 'r6_col5' => 'Dirt roads, no water, demolition risk',
            ],
            'checklist' => [
                'eyebrow' => 'Due Diligence',
                'title' => 'The 5-Point Buyer\'s Due Diligence Checklist',
                'subtitle' => 'Before committing to any Vrindavan land price, demand written proof of these five non-negotiable legal milestones.',
                'p1_title' => 'Exact MVDA Sanction Number', 'p1_desc' => 'Ensure the layout order covers your specific plot number and phase on the official master blueprint.',
                'p2_title' => 'Physical Ground Reality', 'p2_desc' => 'Inspect what is built today versus what is promised for later. Verify concrete road widths, electricity transformers, drainage outlets, and boundary demarcation.',
                'p3_title' => 'Registered Sale Deed', 'p3_desc' => 'A registered sale deed with municipal mutation is the only legal proof of title. Never buy via General Power of Attorney (GPA) or unnotarized stamp papers.',
                'p4_title' => 'Bank Lending Eligibility', 'p4_desc' => 'The simplest litmus test: ask if nationalized banks (SBI, HDFC, PNB) offer plot loans on the development. Banks only lend on ironclad, unencumbered titles.',
                'p5_title' => 'Immediate Demarcation', 'p5_desc' => 'Ensure the physical boundary pillars of your plot are installed on-site before executing the registry, eliminating future boundary or encroachment disputes.',
            ],
            'faqs' => [
                'eyebrow' => 'Price FAQs',
                'title' => 'Frequently Asked Questions About Vrindavan Plot Rates',
                'subtitle' => 'Authentic answers addressing price variations, circle rates, and hidden charges.',
                'list' => [
                    [
                        'q' => '1. What is the current Mathura plot rate per square yard in 2026?',
                        'a' => 'There is no single uniform rate. Unapproved outer tracts (Chhata, Akbarpur tehsils) range between â‚¹9,000 and â‚¹18,000/sq. yard. In fully developed, MVDA-sanctioned gated developments like Shri Vrinda Aakruti Village on Govardhan Road, the plot rate is â‚¹35,000 per square yard.'
                    ],
                    [
                        'q' => '2. Why do some listings advertise a 100 Gaj plot in Mathura for â‚¹9 Lakhs?',
                        'a' => 'Advertisements quoting â‚¹9 Lakhs for 100 Gaj refer to unapproved, non-converted agricultural farmland with zero infrastructure, no water pipes, no electricity transformers, and no MVDA sanction. These cannot be legally financed by banks and carry severe risk of municipal demolition.'
                    ],
                    [
                        'q' => '3. What does MVDA approval guarantee for a Mathura plot?',
                        'a' => 'MVDA approval ensures that the development follows building bye-laws: 30-40 foot wide paved roads, dedicated parks that can never be encroached, sweet drinking water supply lines, underground drainage, and clear title eligibility for bank mortgages.'
                    ],
                    [
                        'q' => '4. Is Shri Vrinda Aakruti Village approved by MVDA?',
                        'a' => 'Yes. Shri Vrinda Aakruti Village is officially sanctioned under MVDA order MTDA/ZA/ANI2025/0000577, situated on Satoha-Naugaon Road off Govardhan Road.'
                    ],
                    [
                        'q' => '5. Can I get a bank home loan for plots in Mathura?',
                        'a' => 'Yes. On all MVDA-approved projects like Aakruti Village, leading public and private banks including SBI, HDFC, and ICICI Bank offer residential plot and home construction loans up to 75-80%.'
                    ],
                    [
                        'q' => '6. What is the water quality like in Mathura plots?',
                        'a' => 'While several areas of Mathura have brackish or saline groundwater, Shri Vrinda Aakruti Village is blessed with sweet water aquifer reserves and a central community water supply.'
                    ],
                    [
                        'q' => '7. How far is Govardhan Road from Mathura Railway Station?',
                        'a' => 'Shri Vrinda Aakruti Village on Govardhan Road is approximately 15 minutes from Mathura Junction railway station, making it highly accessible for visitors arriving by train from Delhi, Mumbai, or Jaipur.'
                    ],
                    [
                        'q' => '8. Can I buy a ready duplex villa instead of a raw plot?',
                        'a' => 'Yes. At Shri Vrinda Aakruti Village, you can choose between buying an independent plot to construct later, or purchasing a ready-to-move luxury duplex villa built to Vastu specifications.'
                    ],
                    [
                        'q' => '9. What extra government costs apply to plot purchase in Mathura?',
                        'a' => 'Stamp duty is 7% for male buyers (6% for female buyers) based on the municipal circle rate, plus a 1% registration fee at the Mathura Sub-Registrar Office.'
                    ],
                    [
                        'q' => '10. Is Mathura property safe for outstation investors?',
                        'a' => 'Yes, provided you purchase within an MVDA-sanctioned gated layout with verified 30-year chain of title. GLEAMREALTY PRIVATE LIMITED ensures complete due diligence.'
                    ],
                    [
                        'q' => '11. How does the operational Jewar Airport impact Mathura plot values?',
                        'a' => 'With commercial flights operating from Jewar Airport and direct 90-minute Yamuna Expressway connectivity to Mathura, regional demand and rental inquiries have risen markedly.'
                    ],
                    [
                        'q' => '12. What sizes of plots are available in Mathura?',
                        'a' => 'Sizes typically range from 116 sq. yards (approx. 100 Gaj) to 150 and 183 sq. yards (ideal for spacious 3 BHK duplex villas).'
                    ],
                    [
                        'q' => '13. How can I schedule a free site visit to Mathura plots?',
                        'a' => 'Fill out the visit form below or call +91 9871731303 / +91 7409767452. Our representative will arrange a free site tour with station pickup.'
                    ]
                ]
            ],
            'seo' => [
                'meta_title' => 'Plot Rate in Vrindavan | 2026 Ground Reality Price Matrix',
                'meta_description' => 'Unbiased 2026 analysis of Vrindavan plot rates, from MVDA approved highway townships to VIP Rukmani Vihar. See our clear price matrix and buyer checklist.',
                'meta_keywords' => 'Plot Rate in Vrindavan, Vrindavan Land Price, Plot Price in Vrindavan',
            ],
        ];

        $stored = self::get('plot_rate_vrindavan_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }

        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Save dynamic "Plot Rate in Vrindavan" sections.
     */
    public static function savePlotRateVrindavanSections(array $data): void
    {
        $current = self::getPlotRateVrindavanSections();
        $merged = array_replace_recursive($current, $data);
        self::set('plot_rate_vrindavan_sections', $merged);

        $page = Page::findBySlug('plot-rate-vrindavan');
        $pagePayload = [
            'title' => 'Plot Rate in Vrindavan',
            'slug' => 'plot-rate-vrindavan',
            'hero_heading' => $merged['hero']['heading'] ?? 'Plot Rate in Vrindavan',
            'hero_subheading' => $merged['hero']['subheading'] ?? '',
            'hero_media_type' => 'image',
            'hero_media_url' => $merged['hero']['image'] ?? 'uploads/pages/Why-Choose-Vrindavan.jpg',
            'content' => $merged['narrative']['content'] ?? '',
            'meta_title' => $merged['seo']['meta_title'] ?? '',
            'meta_description' => $merged['seo']['meta_description'] ?? '',
            'meta_keywords' => $merged['seo']['meta_keywords'] ?? '',
            'is_published' => 1,
        ];
        if ($page) {
            Page::update((int) $page['id'], $pagePayload);
        } else {
            Page::create($pagePayload);
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
                    'location_tag' => (string) ($s['location_text'] ?? 'Chhatikaraâ€“Vrindavan Corridor â€¢ NH-19'),
                    'title' => (string) ($s['title'] ?? 'Shri Vasudhara Lotus Estates'),
                    'specs' => (string) ($s['description'] ?? 'Freehold Sanctuary Plots â€¢ 250 â€“ 1,200 Sq. Yds.'),
                    'price' => (string) ($s['price_text'] ?? 'Starting â‚¹ 45 Lakhs*'),
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
                    'location_tag' => 'Sunrakh Road â€¢ Vrindavan',
                    'title' => 'Shri Vrinda Greens Enclave',
                    'specs' => '100% Vastu-Aligned Gated Community â€¢ 200 â€“ 1,000 Sq. Yds.',
                    'price' => 'Starting â‚¹ 35 Lakhs*',
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
                    'location_tag' => 'Chhatikaraâ€“Vrindavan Corridor â€¢ NH-19',
                    'title' => 'Shri Vasudhara Lotus Estates',
                    'specs' => 'Freehold Sanctuaries â€¢ 250 â€“ 1,200 Sq. Yds. â€¢ 40ft Wide Roads',
                    'price' => 'Starting â‚¹ 45 Lakhs*',
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
                    'location_tag' => 'Raman Reti Sanctuary â€¢ Vrindavan',
                    'title' => 'Royal Braj Haveli Residences',
                    'specs' => 'Turnkey 4 & 5 BHK Courtyard Havelis â€¢ Vedic Architecture',
                    'price' => 'Starting â‚¹ 1.25 Cr*',
                    'link' => url('/projects'),
                    'cta_text' => 'Explore Residences',
                    'cta_secondary_text' => 'Schedule Private Visit',
                    'cta_secondary_url' => '#inquire',
                    'video_url' => null,
                    'featured_label' => 'Exclusive Havelis',
                ],
            ];
        }

        return array_merge($storedHero, [
            'is_enabled' => (bool) ($storedHero['is_enabled'] ?? true),
            'autoplay_interval' => (int) ($storedHero['autoplay_interval'] ?? 6), // in seconds
            'rotation_style' => (string) ($storedHero['rotation_style'] ?? '3d-page-turn'),
            'overlay_opacity' => (int) ($storedHero['overlay_opacity'] ?? 45), // percentage
            'trust_seal_text' => (string) ($storedHero['trust_seal_text'] ?? '100% MVDA & RERA Approved â€¢ Immediate Freehold Registry â€¢ 3,000+ Happy Families'),
            'badge_text' => (string) ($storedHero['badge_text'] ?? 'âœ¦ BRAJ BHUMI PRIVATE ESTATES â€¢ VRINDAVAN & MATHURA'),
            'slides' => $formattedSlides,
        ]);
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
                'eyebrow' => 'Heritage â€¢ Divinity â€¢ Legacy',
                'title' => 'The Sanctity of Braj Bhumi',
                'subtitle' => 'An eternal sanctuary of peace, devotion, and appreciation. Discover why securing an estate in Vrindavan transcends conventional real estate.',
                'quote' => 'To establish an abode in Vrindavan is not merely an acquisition of land, but an eternal sanctification of oneâ€™s family legacy.',
                'quote_author' => 'Gleamrealty Heritage Advisory',
                'p1' => 'For millennia, the holy soil of Mathura and Vrindavan has drawn seekers, spiritual leaders, and visionaries. Today, this revered domain experiences unprecedented modern infrastructure growth â€” with wide 6-lane expressways, the upcoming Heritage City, and world-class connectivity to Delhi NCR.',
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
                'showcase_price' => 'Starting â‚¹ 35,000 / sq. yd',
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
    public static function getMathuraPlotRateSections(): array
    {
        $defaults = [
            'hero' => [
                'heading' => 'Mathura Plot Rate',
                'subheading' => 'Plot for Sale in Mathura, 100 Gaj Plot in Mathura Price: The Ground Reality',
                'image' => 'uploads/pages/mero-vrindavan.png',
                'badge_1' => 'MVDA Sanctioned Layouts',
                'badge_2' => '? 100 Gaj Pricing Realities',
                'badge_3' => 'Govardhan Road Corridor',
                'badge_4' => 'Zero Brokerage Direct',
            ],
            'narrative' => [
                'eyebrow' => 'Price Reality',
                'title' => 'Plot for Sale in Mathura: The Truth Behind the Numbers',
                'content' => '<p>For anyone who has spent a weekend scrolling through online property classifieds in Mathura, you already know the confusing reality. One listing proclaims that the cost of a 100 gaj plot is <strong>Rs. 9 Lakh</strong>. The very next advertisement quotes <strong>Rs. 35 Lakh</strong>.</p><p>Both claim to be "MVDA approved." Both promise 24-hour security, wide roads, and community parks. So what is the genuine plot rate in Mathura? The answer is that there is no single magical number; the difference comes down to <strong>Approval Authenticity, Infrastructure Completion, and Road Widths</strong>.</p><p>The Mathura Vrindavan Development Authority (MVDA) is the statutory planning authority. Once it sanctions a development, road dimensions (30-40 ft), open green buffers, and non-agricultural land usage are bound on government records. Cheap plots in Mathura are often speculative raw agricultural tracts. Sanctioned townships like <strong>Shri Vrinda Aakruti Village (? 35,000/sq. yd)</strong> provide authentic collateral, immediate bank financing, and lifelong security.</p>',
                'image' => 'uploads/pages/Why-Choose-Vrindavan.jpg',
                'badge_sub' => 'Sanctioned Township Benchmark',
                'badge_title' => '? 35,000 / sq. yd',
                'secondary_image' => 'uploads/pages/property-in-vrindavan.png',
                'secondary_title' => 'The True Cost of Ownership',
                'secondary_desc' => 'Distinguishing authentic MVDA approvals from unauthorized farmland promotions.',
                'val_1' => '?35,000', 'lbl_1' => 'Gated Benchmark',
                'val_2' => '100 Gaj', 'lbl_2' => '?35 Lakhs',
                'val_3' => '30-40 Ft', 'lbl_3' => 'Paved Avenues',
                'val_4' => '100%', 'lbl_4' => 'Bank Loanable',
            ],
            'target_profiles' => [
                'eyebrow' => 'Target Profiles',
                'title' => 'Who a Mathura Plot Makes Perfect Sense For',
                'subtitle' => 'Mathura offers the ideal sweet-spot for families who seek peaceful devotional living without the crowded tourist bottleneck.',
                'p1_title' => 'Delhi NCR & Agra Devotee Families', 'p1_desc' => 'For families from Delhi, Noida, Gurgaon, and Agra seeking a weekend haven or spiritual retirement home in Braj. You enjoy easy 15-minute access to the temples, but reside in an open, peaceful, unpolluted setting free from chaotic weekend traffic snarls.',
                'p2_title' => 'Retirement Seekers & Seniors', 'p2_desc' => 'Mathura provides everyday functional infrastructure that elderly residents depend on: multispecialty medical hospitals, clean railway connectivity, shopping markets, and peaceful community environments with like-minded neighbors.',
                'p3_title' => 'Custom Villa Creators (vs Cramped Flats)', 'p3_desc' => 'Devotees who wish to design their own independent cottage or duplex sanctuary with private open courtyards and Tulsi gardens, rather than paying recurring society maintenance for a small apartment with shared walls.',
                'p4_title' => 'Long-Term Capital Preservers', 'p4_desc' => 'Purchasing approved land along the Govardhan Road corridor locks in land value before upcoming highway widenings and transit corridors push prices toward central Vrindavan levels.',
            ],
            'matrix' => [
                'eyebrow' => '2026 Price Index',
                'title' => 'Mathura Land & Plot Price Matrix 2026',
                'subtitle' => 'Comparing land rates across approved gated developments, highway corridors, and rural tracts.',
                'r1_col1' => 'Govardhan Road (Shri Vrinda Aakruti Village)', 'r1_col2' => 'MVDA Sanctioned', 'r1_col3' => '? 35,000', 'r1_col4' => '? 35.0 Lakhs', 'r1_col5' => '30-40ft Roads, Sweet Water, Bank Loan Approved',
                'r2_col1' => 'NH-19 Mathura Bypass', 'r2_col2' => 'MVDA Approved', 'r2_col3' => '? 38,000 – ? 45,000', 'r2_col4' => '? 38L – ? 45L', 'r2_col5' => 'Commercial & Residential Highway Frontage',
                'r3_col1' => 'Mathura Cantt / Janmasthan Vicinity', 'r3_col2' => 'Municipal Freehold', 'r3_col3' => '? 65,000 – ? 95,000', 'r3_col4' => '? 65L – ? 95L', 'r3_col5' => 'Dense Old City, Narrow Roads, Scarce Open Land',
                'r4_col1' => 'Chhata, Kosi & Rural Farmland', 'r4_col2' => 'Unapproved Farmland', 'r4_col3' => '? 9,000 – ? 18,000', 'r4_col4' => '? 9L – ? 18L', 'r4_col5' => 'High legal risk, no road sanction, no bank loans',
            ],
            'breakdown' => [
                'eyebrow' => 'Cost Breakdown',
                'title' => '100 Gaj Plot in Mathura: The Complete Price Sheet',
                'subtitle' => 'Transparent itemized estimate for an MVDA-approved 100 sq. yard plot in Shri Vrinda Aakruti Village.',
                'r1_lbl' => 'Plot Size', 'r1_val' => '100 Gaj (900 Sq. Ft / 100 Sq. Yards)',
                'r2_lbl' => 'Basic Land Cost (@ ? 35,000 / sq. yd)', 'r2_val' => '? 35,00,000',
                'r3_lbl' => 'Government Stamp Duty (UP Sub-Registrar: 7% male / 6% female)', 'r3_val' => 'Approx. ? 1.40L – ? 1.75L (on circle rate base)',
                'r4_lbl' => 'Registration Fee (1%) & Mutation Support', 'r4_val' => 'Approx. ? 25,000',
                'r5_lbl' => 'Brokerage / Consulting Fees', 'r5_val' => '? 0 (Zero Brokerage Direct)',
                'total_lbl' => 'Total All-Inclusive Outlay', 'total_val' => '? 36.70L – ? 37.00 Lakhs',
                'note' => 'Bank Loan Support: SBI, HDFC, and ICICI provide up to 75-80% loan on this approved asset. Down payment requirement is approximately ? 8.5 to ? 9.5 Lakhs.',
            ],
            'faqs' => [
                'eyebrow' => 'Mathura FAQs',
                'title' => 'Frequently Asked Questions About Mathura Plot Rates',
                'subtitle' => 'Honest, practical clarity on plot prices, road approvals, and possession timelines in Mathura.',
                'list' => [
                    [
                        'q' => '1. What is the current Mathura plot rate per square yard in 2026?',
                        'a' => 'There is no single uniform rate. Unapproved outer tracts (Chhata, Akbarpur tehsils) range between ?9,000 and ?18,000/sq. yard. In fully developed, MVDA-sanctioned gated developments like Shri Vrinda Aakruti Village on Govardhan Road, the plot rate is ?35,000 per square yard.'
                    ],
                    [
                        'q' => '2. Why do some listings advertise a 100 Gaj plot in Mathura for ?9 Lakhs?',
                        'a' => 'Advertisements quoting ?9 Lakhs for 100 Gaj refer to unapproved, non-converted agricultural farmland with zero infrastructure, no water pipes, no electricity transformers, and no MVDA sanction. These cannot be legally financed by banks and carry severe risk of municipal demolition.'
                    ],
                    [
                        'q' => '3. What does MVDA approval guarantee for a Mathura plot?',
                        'a' => 'MVDA approval ensures that the development follows building bye-laws: 30-40 foot wide paved roads, dedicated parks that can never be encroached, sweet drinking water supply lines, underground drainage, and clear title eligibility for bank mortgages.'
                    ],
                    [
                        'q' => '4. Is Shri Vrinda Aakruti Village approved by MVDA?',
                        'a' => 'Yes. Shri Vrinda Aakruti Village is officially sanctioned under MVDA order MTDA/ZA/ANI2025/0000577, situated on Satoha-Naugaon Road off Govardhan Road.'
                    ],
                    [
                        'q' => '5. Can I get a bank home loan for plots in Mathura?',
                        'a' => 'Yes. On all MVDA-approved projects like Aakruti Village, leading public and private banks including SBI, HDFC, and ICICI Bank offer residential plot and home construction loans up to 75-80%.'
                    ],
                    [
                        'q' => '6. What is the water quality like in Mathura plots?',
                        'a' => 'While several areas of Mathura have brackish or saline groundwater, Shri Vrinda Aakruti Village is blessed with sweet water aquifer reserves and a central community water supply.'
                    ],
                    [
                        'q' => '7. How far is Govardhan Road from Mathura Railway Station?',
                        'a' => 'Shri Vrinda Aakruti Village on Govardhan Road is approximately 15 minutes from Mathura Junction railway station, making it highly accessible for visitors arriving by train from Delhi, Mumbai, or Jaipur.'
                    ],
                    [
                        'q' => '8. Can I buy a ready duplex villa instead of a raw plot?',
                        'a' => 'Yes. At Shri Vrinda Aakruti Village, you can choose between buying an independent plot to construct later, or purchasing a ready-to-move luxury duplex villa built to Vastu specifications.'
                    ],
                    [
                        'q' => '9. What extra government costs apply to plot purchase in Mathura?',
                        'a' => 'Stamp duty is 7% for male buyers (6% for female buyers) based on the municipal circle rate, plus a 1% registration fee at the Mathura Sub-Registrar Office.'
                    ],
                    [
                        'q' => '10. Is Mathura property safe for outstation investors?',
                        'a' => 'Yes, provided you purchase within an MVDA-sanctioned gated layout with verified 30-year chain of title. GLEAMREALTY PRIVATE LIMITED ensures complete due diligence.'
                    ],
                    [
                        'q' => '11. How does the operational Jewar Airport impact Mathura plot values?',
                        'a' => 'With commercial flights operating from Jewar Airport and direct 90-minute Yamuna Expressway connectivity to Mathura, regional demand and rental inquiries have risen markedly.'
                    ],
                    [
                        'q' => '12. What sizes of plots are available in Mathura?',
                        'a' => 'Sizes typically range from 116 sq. yards (approx. 100 Gaj) to 150 and 183 sq. yards (ideal for spacious 3 BHK duplex villas).'
                    ],
                    [
                        'q' => '13. How can I schedule a free site visit to Mathura plots?',
                        'a' => 'Fill out the visit form below or call +91 9871731303 / +91 7409767452. Our representative will arrange a free site tour with station pickup.'
                    ]
                ]
            ],
            'consultation' => [
                'eyebrow' => 'Free Guidance',
                'title' => 'Schedule a Mathura Plot Tour & Rate Consultation',
                'subtitle' => 'Tour Shri Vrinda Aakruti Village with our senior advisors and review layout maps, bank approval files, and pricing sheets.',
            ],
            'seo' => [
                'meta_title' => 'Mathura Plot Rate, Plot for Sale in Mathura',
                'meta_description' => 'Mathura plot rate by GLEAMREALTY PRIVATE LIMITED is customized as per your needs. Schedule your free site visit to secure plot for sale in Mathura.',
                'meta_keywords' => 'Mathura Plot Rate, Plot for Sale in Mathura, 100 gaj plot in mathura price',
            ],
        ];

        $stored = self::get('plot_rate_mathura_sections', null);
        if (!is_array($stored)) {
            // Check legacy
            if (is_array($legacy = self::get('plot_rate_mathura_sections_legacy', null))) {
                if (isset($legacy['metrics'])) {
                    $defaults['narrative']['val_1'] = $legacy['metrics']['val_1'] ?? $defaults['narrative']['val_1'];
                    $defaults['narrative']['val_2'] = $legacy['metrics']['val_2'] ?? $defaults['narrative']['val_2'];
                    $defaults['narrative']['val_3'] = $legacy['metrics']['val_3'] ?? $defaults['narrative']['val_3'];
                    $defaults['narrative']['val_4'] = $legacy['metrics']['val_4'] ?? $defaults['narrative']['val_4'];
                    $defaults['narrative']['lbl_1'] = $legacy['metrics']['lbl_1'] ?? $defaults['narrative']['lbl_1'];
                    $defaults['narrative']['lbl_2'] = $legacy['metrics']['lbl_2'] ?? $defaults['narrative']['lbl_2'];
                    $defaults['narrative']['lbl_3'] = $legacy['metrics']['lbl_3'] ?? $defaults['narrative']['lbl_3'];
                    $defaults['narrative']['lbl_4'] = $legacy['metrics']['lbl_4'] ?? $defaults['narrative']['lbl_4'];
                }
            }
            return $defaults;
        }

        return array_replace_recursive($defaults, $stored);
    }

    public static function saveMathuraPlotRateSections(array $data): void
    {
        $current = self::getMathuraPlotRateSections();
        $merged = array_replace_recursive($current, $data);
        self::set('plot_rate_mathura_sections', $merged);

        $page = \App\Models\Page::findBySlug('plot-rate-mathura');
        $pagePayload = [
            'title' => 'Mathura Plot Rate',
            'slug' => 'plot-rate-mathura',
            'hero_heading' => $merged['hero']['heading'] ?? 'Mathura Plot Rate',
            'hero_subheading' => $merged['hero']['subheading'] ?? '',
            'hero_media_type' => 'image',
            'hero_media_url' => $merged['hero']['image'] ?? 'uploads/pages/mero-vrindavan.png',
            'content' => $merged['narrative']['content'] ?? '',
            'meta_title' => $merged['seo']['meta_title'] ?? '',
            'meta_description' => $merged['seo']['meta_description'] ?? '',
            'meta_keywords' => $merged['seo']['meta_keywords'] ?? '',
            'is_published' => 1,
        ];

        if ($page) {
            \App\Models\Page::update((int) $page['id'], $pagePayload);
        } else {
            \App\Models\Page::create($pagePayload);
        }
    }

    public static function getOfficeAddress(): string
    {
        return self::get('office_address', 'Vrindavan Road, Mathura, UP');
    }

    public static function getOfficeMapEmbedUrl(): string
    {
        return self::get('office_map_embed', 'https://www.google.com/maps/embed?pb=');
    }

    public static function getOfficeDirectionsUrl(): string
    {
        return self::get('office_directions', 'https://goo.gl/maps/');
    }

    public static function getContactSections(): array
    {
        $defaults = [
            'office' => [
                'phone_1' => '+91 9871731303',
                'phone_2' => '+91 7409767452',
                'whatsapp' => '+91 9871731303',
                'email' => 'contact@gleamrealty.com',
            ]
        ];
        $stored = self::get('contact_sections', null);
        if (!is_array($stored)) {
            return $defaults;
        }
        return array_replace_recursive($defaults, $stored);
    }

    /**
     * Get Footer sections configuration.
     */
    public static function getFooterSections(): array
    {
        $defaults = [
            'social' => [
                'facebook' => 'https://facebook.com',
                'instagram' => 'https://instagram.com',
                'linkedin' => 'https://linkedin.com',
                'youtube' => 'https://youtube.com',
            ],
            'quick_links' => [
                ['label' => 'About Us', 'url' => '/about-us'],
                ['label' => 'Projects', 'url' => '/projects'],
                ['label' => 'Communities', 'url' => '/location/vrindavan'],
                ['label' => 'Blog', 'url' => '/blog'],
                ['label' => 'Contact Us', 'url' => '/contact-us'],
            ],
            'popular_projects' => [
                ['label' => 'Shri Vrinda Greens', 'url' => '/projects/shri-vrinda-greens-premium-residential-plots'],
                ['label' => 'Shri Vrinda Vihar', 'url' => '/projects/shri-vrinda-vihaar-residential-plots'],
                ['label' => 'Shri Vrinda Awas', 'url' => '/projects/shri-vrinda-aakruti-village-premium-duplex-villas'],
                ['label' => 'Shri Vrinda Adarsh', 'url' => '/projects/shri-vrinda-aakruti-village-premium-residential-township'],
                ['label' => 'Royal Braj Haveli', 'url' => '/#residences'],
            ],
            'contact' => [
                'address' => 'Flat no 10, LIG 09, Suncity Anantam Kunj, Vrindavan-281406',
                'map_url' => 'https://maps.google.com',
                'phone1' => '+91 9871731303',
                'phone2' => '+91 7409767452',
                'email' => 'contact@gleamrealty.com',
            ],
            'bottom' => [
                'copyright_text' => 'GLEAMREALTY PRIVATE LIMITED. All Rights Reserved.',
                'script_text' => 'Building Better',
            ]
        ];

        return array_replace_recursive($defaults, self::get('footer_sections', []));
    }

    /**
     * Save Footer sections configuration.
     */
    public static function saveFooterSections(array $data): void
    {
        self::set('footer_sections', $data);
    }
}
