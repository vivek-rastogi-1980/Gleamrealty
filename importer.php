<?php

declare(strict_types=1);

/**
 * Gleamrealty — CLI Content Migration Importer
 *
 * Scrapes and migrates projects, media assets, floor plans, and pages
 * from https://earthousing.com into local database and /public/uploads/projects/
 *
 * Usage: php importer.php
 */

require_once __DIR__ . '/core/Autoloader.php';
\Core\Autoloader::register(__DIR__);
\Core\Dotenv::load(__DIR__ . '/.env');

if (file_exists(__DIR__ . '/core/helpers.php')) {
    require_once __DIR__ . '/core/helpers.php';
}

use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectMedia;
use Core\Auth;
use Core\Database;
use Core\Uploader;

// ANSI Colors for CLI
define('C_RESET', "\033[0m");
define('C_GOLD', "\033[33m");
define('C_GREEN', "\033[32m");
define('C_CYAN', "\033[36m");
define('C_RED', "\033[31m");
define('C_BOLD', "\033[1m");

echo C_GOLD . C_BOLD . "========================================================\n";
echo "      GLEAMREALTY - EARTHOUSING CONTENT MIGRATION       \n";
echo "========================================================\n" . C_RESET;

// 1. Ensure Database & Admin Table
try {
    Database::connection();
    Auth::ensureAdminTable();
    echo C_GREEN . "✔ Connected to database: " . \Core\Dotenv::get('DB_DATABASE') . C_RESET . "\n\n";
} catch (\Throwable $e) {
    echo C_RED . "✘ Database connection error: " . $e->getMessage() . C_RESET . "\n";
    exit(1);
}

// 2. Fetch and Crawl Projects List
$baseUrl = 'https://earthousing.com';
$projectUrls = [
    'https://earthousing.com/project/shri-vasudhara-vaishaly-premium-residential-plots',
    'https://earthousing.com/project/shri-vrinda-aakruti-village-premium-residential-township',
    'https://earthousing.com/project/shri-vrinda-naivedyam-premium-residential-plots',
    'https://earthousing.com/project/shri-vrinda-orchids-plots-and-villas',
    'https://earthousing.com/project/shri-vrinda-orchids-commercial-complex',
    'https://earthousing.com/project/shri-vrinda-aakruti-village-premium-duplex-villas',
    'https://earthousing.com/project/shri-vrinda-vihaar-residential-plots',
    'https://earthousing.com/project/shri-vrinda-greens-premium-residential-plots',
];

$pageUrls = [
    'https://earthousing.com/about-us',
    'https://earthousing.com/contact-us',
    'https://earthousing.com/property-in-vrindavan',
    'https://earthousing.com/residential-plots-in-vrindavan',
    'https://earthousing.com/commercial-property-in-vrindavan',
    'https://earthousing.com/luxury-villas-in-vrindavan',
    'https://earthousing.com/property-in-mathura',
    'https://earthousing.com/plot-rate-vrindavan',
    'https://earthousing.com/plot-rate-mathura',
    'https://earthousing.com/flats-apartments-in-vrindavan',
];

/**
 * Fetch HTML helper with curl
 */
function fetchHtml(string $url): ?string {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) GleamrealtyBot/1.0');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $html = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($html !== false && $code === 200) ? (string) $html : null;
}

// -------------------------------------------------------------
// PROCESS PROJECTS
// -------------------------------------------------------------
echo C_CYAN . C_BOLD . "[1/2] CRAWLING & IMPORTING REAL ESTATE PROJECTS...\n" . C_RESET;

$importedProjects = 0;
$importedMediaCount = 0;

foreach ($projectUrls as $idx => $pUrl) {
    $num = $idx + 1;
    echo "\n[" . $num . "/" . count($projectUrls) . "] Fetching: " . C_GOLD . $pUrl . C_RESET . "\n";

    $html = fetchHtml($pUrl);
    if (!$html) {
        echo C_RED . "  ✘ Failed to retrieve page.\n" . C_RESET;
        continue;
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Extract Title
    $h1 = $xpath->query('//h1');
    $name = $h1->length > 0 ? trim($h1->item(0)->textContent) : '';
    if (empty($name)) {
        preg_match('/<title>(.*?)<\/title>/i', $html, $tm);
        $name = trim($tm[1] ?? basename($pUrl));
    }

    // Clean Slug
    $urlSlug = basename($pUrl);
    $slug = slugify($urlSlug ?: $name);

    // Meta SEO
    preg_match('/<title>(.*?)<\/title>/i', $html, $tm);
    $metaTitle = trim($tm[1] ?? $name);

    preg_match('/<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']/i', $html, $dm);
    $metaDesc = trim($dm[1] ?? '');

    preg_match('/<meta\s+name=["\']keywords["\']\s+content=["\'](.*?)["\']/i', $html, $km);
    $metaKeywords = trim($km[1] ?? '');

    // Location
    $location = 'Vrindavan, Uttar Pradesh';
    if (stripos($html, 'Mathura') !== false && stripos($name, 'Mathura') !== false) {
        $location = 'Mathura, Uttar Pradesh';
    } elseif (preg_match('/<div[^>]*class=["\'][^"\']*location[^"\']*["\'][^>]*>(.*?)<\/div>/is', $html, $locMatch)) {
        $location = trim(strip_tags($locMatch[1]));
    }

    // Tagline / Subheading
    $tagline = 'MVDA Approved Premium Real Estate Development';
    if (preg_match('/<h2[^>]*>(.*?)<\/h2>/is', $html, $h2m)) {
        $candidate = trim(strip_tags($h2m[1]));
        if (strlen($candidate) > 10 && strlen($candidate) < 200) {
            $tagline = $candidate;
        }
    }

    // Starting Price
    $price = 'Price on Request';
    if (preg_match('/₹\s*([0-9,]+(?:\s*[a-zA-Z\.\/]+)?)/i', $html, $pm)) {
        $price = '₹ ' . trim($pm[1]);
    }

    // Project Type
    $type = 'Plotted Community';
    $lowerName = strtolower($name . ' ' . $html);
    if (str_contains($lowerName, 'villa') || str_contains($lowerName, 'duplex')) {
        $type = 'Luxury Villas';
    } elseif (str_contains($lowerName, 'commercial') || str_contains($lowerName, 'complex')) {
        $type = 'Commercial';
    } elseif (str_contains($lowerName, 'township')) {
        $type = 'Township';
    }

    // Project Size
    $projectSize = '100 - 350 Sq. Yards';
    if (preg_match('/([0-9]+\s*-\s*[0-9]+\s*sq\.\s*(?:yard|ft|meter))/i', $html, $sm)) {
        $projectSize = trim($sm[1]);
    }

    // Approvals: MVDA & RERA
    $mvdaApproved = 1; // Earthousing projects are primarily MVDA approved
    $reraId = null;
    if (preg_match('/UPRERA[A-Z0-9\/_-]+/i', $html, $rm)) {
        $reraId = trim($rm[0]);
    }

    // Overview / Description
    $overview = '';
    // Look for paragraph blocks
    $paragraphs = $xpath->query('//div[contains(@class, "overview") or contains(@class, "about") or contains(@class, "description")]//p | //div[contains(@class, "content")]//p');
    if ($paragraphs->length > 0) {
        $pTexts = [];
        foreach ($paragraphs as $p) {
            $txt = trim($p->textContent);
            if (strlen($txt) > 30) {
                $pTexts[] = $txt;
            }
        }
        $overview = implode("\n\n", array_slice($pTexts, 0, 5));
    }
    if (empty($overview)) {
        $overview = $metaDesc ?: "{$name} is an exclusive, master-planned luxury development located in {$location}, featuring state-of-the-art infrastructure, landscaped greens, and exceptional investment potential.";
    }

    // Amenities
    $amenityList = [
        'Gated Community & 24/7 Security',
        'CCTV Surveillance',
        'Wide Concrete Roads',
        'Underground Electrification',
        'Lush Green Landscaped Parks',
        'Modern Clubhouse & Community Center',
        'Dedicated Children Play Area',
        'Near ISKCON & Prem Mandir',
    ];
    // Try to extract dynamic amenities if present
    $amenityNodes = $xpath->query('//*[contains(@class, "amenit")]//li | //*[contains(@class, "amenit")]//h5 | //*[contains(@class, "amenit")]//h6');
    if ($amenityNodes->length > 0) {
        $dynamicAm = [];
        foreach ($amenityNodes as $an) {
            $atxt = trim($an->textContent);
            if (!empty($atxt) && strlen($atxt) < 60 && !in_array($atxt, $dynamicAm, true)) {
                $dynamicAm[] = $atxt;
            }
        }
        if (count($dynamicAm) >= 3) {
            $amenityList = array_slice($dynamicAm, 0, 15);
        }
    }

    // Hero Video
    $heroVideo = null;
    if (preg_match('/(?:youtube\.com\/embed\/|youtu\.be\/|youtube\.com\/watch\?v=)([a-zA-Z0-9_-]+)/i', $html, $vm)) {
        $heroVideo = 'https://www.youtube.com/embed/' . $vm[1];
    }

    // Google Maps Embed
    $mapsEmbed = null;
    if (preg_match('/<iframe[^>]+src=["\'](https:\/\/www\.google\.com\/maps\/embed[^"\']+)["\']/i', $html, $mm)) {
        $mapsEmbed = $mm[1];
    }

    // Brochure PDF
    $brochureUrl = null;
    preg_match_all('/href=["\']([^"\']+\.pdf)["\']/i', $html, $pdfMatches);
    if (!empty($pdfMatches[1])) {
        $rawPdf = $pdfMatches[1][0];
        if (!str_starts_with($rawPdf, 'http')) {
            $rawPdf = 'https://earthousing.com/' . ltrim($rawPdf, '/');
        }
        $localPdf = Uploader::download($rawPdf, 'brochures');
        if ($localPdf) {
            $brochureUrl = $localPdf;
        }
    }

    // Insert or Update Project
    $existing = Project::findBySlug($slug);
    $projectId = 0;

    $projectPayload = [
        'name' => $name,
        'slug' => $slug,
        'tagline' => $tagline,
        'location' => $location,
        'google_maps_embed' => $mapsEmbed,
        'starting_price' => $price,
        'project_type' => $type,
        'rera_id' => $reraId,
        'mvda_approved' => $mvdaApproved,
        'project_size' => $projectSize,
        'hero_video_url' => $heroVideo,
        'overview' => $overview,
        'amenities' => $amenityList,
        'brochure_url' => $brochureUrl,
        'meta_title' => $metaTitle,
        'meta_description' => $metaDesc,
        'meta_keywords' => $metaKeywords,
    ];

    if ($existing) {
        $projectId = (int) $existing['id'];
        Project::update($projectId, $projectPayload);
        echo C_GREEN . "  ✔ Updated project: " . $name . " [ID: {$projectId}]" . C_RESET . "\n";
    } else {
        $projectId = Project::create($projectPayload);
        echo C_GREEN . "  ✔ Inserted new project: " . $name . " [ID: {$projectId}]" . C_RESET . "\n";
    }

    $importedProjects++;

    // -------------------------------------------------------------
    // DOWNLOAD AND ATTACH PROJECT MEDIA
    // -------------------------------------------------------------
    // Extract gallery images and floorplans
    preg_match_all('/(?:https:\/\/earthousing\.com)?\/earth-admin\/uploads\/(project-images|gallery|floorplan|masterplan)\/([a-zA-Z0-9_\-]+\.(?:jpg|jpeg|png|webp))/i', $html, $mediaMatches);

    $mediaUrls = [];
    if (!empty($mediaMatches[0])) {
        foreach ($mediaMatches[0] as $rawMedia) {
            $fullMediaUrl = str_starts_with($rawMedia, 'http') ? $rawMedia : 'https://earthousing.com' . $rawMedia;
            $mediaUrls[] = $fullMediaUrl;
        }
    }
    $mediaUrls = array_unique($mediaUrls);

    echo "  → Found " . count($mediaUrls) . " media assets to download...\n";

    $order = 0;
    foreach ($mediaUrls as $remoteImg) {
        $order++;
        // Determine type: floorplan or gallery
        $mediaType = 'gallery';
        if (stripos($remoteImg, 'floorplan') !== false || stripos($remoteImg, 'masterplan') !== false) {
            $mediaType = 'floorplan';
        } elseif (stripos($remoteImg, 'elevation') !== false) {
            $mediaType = 'elevation';
        }

        // Download locally into public/uploads/projects/
        $localPath = Uploader::download($remoteImg, 'projects');
        if ($localPath) {
            // Check if already in project_media
            $exists = Database::fetch("SELECT id FROM `project_media` WHERE `project_id` = ? AND `file_path` = ? LIMIT 1", [$projectId, $localPath]);
            if (!$exists) {
                ProjectMedia::create($projectId, $localPath, $mediaType, $name . ' ' . ucfirst($mediaType), $order);
                $importedMediaCount++;
            }
            echo "    ✔ Downloaded ({$mediaType}): " . basename($localPath) . "\n";
        }
    }
}

// -------------------------------------------------------------
// PROCESS INFORMATIONAL PAGES
// -------------------------------------------------------------
echo "\n" . C_CYAN . C_BOLD . "[2/2] CRAWLING & IMPORTING INFORMATIONAL PAGES...\n" . C_RESET;

$importedPages = 0;

foreach ($pageUrls as $idx => $pgUrl) {
    $num = $idx + 1;
    echo "\n[" . $num . "/" . count($pageUrls) . "] Fetching: " . C_GOLD . $pgUrl . C_RESET . "\n";

    $html = fetchHtml($pgUrl);
    if (!$html) {
        echo C_RED . "  ✘ Failed to retrieve page.\n" . C_RESET;
        continue;
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    $h1 = $xpath->query('//h1');
    $title = $h1->length > 0 ? trim($h1->item(0)->textContent) : '';
    if (empty($title)) {
        preg_match('/<title>(.*?)<\/title>/i', $html, $tm);
        $title = trim($tm[1] ?? basename($pgUrl));
    }

    $slug = basename($pgUrl);

    // Meta SEO
    preg_match('/<title>(.*?)<\/title>/i', $html, $tm);
    $metaTitle = trim($tm[1] ?? $title);

    preg_match('/<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']/i', $html, $dm);
    $metaDesc = trim($dm[1] ?? '');

    preg_match('/<meta\s+name=["\']keywords["\']\s+content=["\'](.*?)["\']/i', $html, $km);
    $metaKeywords = trim($km[1] ?? '');

    // Hero Subheading
    $subheading = 'Comprehensive Guide & Real Estate Insights in Vrindavan and Mathura';
    if (preg_match('/<h2[^>]*>(.*?)<\/h2>/is', $html, $h2m)) {
        $subheading = trim(strip_tags($h2m[1]));
    }

    // Hero Media Image
    $heroMediaUrl = null;
    if (preg_match('/https:\/\/earthousing\.com\/assets\/img\/banner\/([a-zA-Z0-9_\-\.]+\.webp)/i', $html, $bm)) {
        $heroMediaUrl = Uploader::download($bm[0], 'pages');
    }

    // Page Content extraction
    $contentBlocks = [];
    $contentParas = $xpath->query('//section//p | //article//p | //div[contains(@class, "content") or contains(@class, "about")]//p');
    if ($contentParas->length > 0) {
        foreach ($contentParas as $cp) {
            $pt = trim($cp->textContent);
            if (strlen($pt) > 40) {
                $contentBlocks[] = "<p class=\"text-gray-300 leading-relaxed mb-6\">" . htmlspecialchars($pt) . "</p>";
            }
        }
    }
    $pageContent = !empty($contentBlocks) ? implode("\n", array_slice($contentBlocks, 0, 10)) : "<p>Welcome to {$title}. Explore verified real estate opportunities across Vrindavan and Mathura.</p>";

    $existingPage = Page::findBySlug($slug);
    $pagePayload = [
        'title' => $title,
        'slug' => $slug,
        'hero_heading' => $title,
        'hero_subheading' => $subheading,
        'hero_media_type' => 'image',
        'hero_media_url' => $heroMediaUrl,
        'content' => $pageContent,
        'meta_title' => $metaTitle,
        'meta_description' => $metaDesc,
        'meta_keywords' => $metaKeywords,
        'is_published' => 1,
    ];

    if ($existingPage) {
        Page::update((int) $existingPage['id'], $pagePayload);
        echo C_GREEN . "  ✔ Updated page: " . $title . " [slug: {$slug}]" . C_RESET . "\n";
    } else {
        Page::create($pagePayload);
        echo C_GREEN . "  ✔ Inserted new page: " . $title . " [slug: {$slug}]" . C_RESET . "\n";
    }

    $importedPages++;
}

echo "\n" . C_GOLD . C_BOLD . "========================================================\n";
echo "              MIGRATION COMPLETE SUMMARY               \n";
echo "========================================================\n" . C_RESET;
echo "  • Projects Imported/Updated : " . C_GREEN . $importedProjects . C_RESET . "\n";
echo "  • Media Assets Downloaded   : " . C_GREEN . $importedMediaCount . C_RESET . "\n";
echo "  • Informational Pages Saved : " . C_GREEN . $importedPages . C_RESET . "\n";
echo "  • Local Media Directory     : " . C_CYAN . "/public/uploads/projects/\n" . C_RESET;
echo C_GOLD . "========================================================\n\n" . C_RESET;
