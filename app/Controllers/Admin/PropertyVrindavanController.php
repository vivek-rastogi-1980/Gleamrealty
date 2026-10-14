<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Page;
use App\Models\Setting;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;
use Core\Uploader;

/**
 * Class PropertyVrindavanController
 *
 * Dedicated administration CMS module for managing all dynamic content,
 * imagery, legal pillars, megaprojects, and SEO on the Property in Vrindavan page.
 */
class PropertyVrindavanController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::getPropertyVrindavanSections();

        return $this->adminView('admin/property_vrindavan/index', [
            'seo_title' => 'Property in Vrindavan CMS',
            'sections' => $sections,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/property-vrindavan'));
        }

        $current = Setting::getPropertyVrindavanSections();

        // 1. Hero Section Imagery & Badges
        $heroImage = $current['hero']['image'] ?? 'uploads/pages/property-in-vrindavan.png';
        if (!empty($_FILES['hero_image']['name']) && $_FILES['hero_image']['error'] === UPLOAD_ERR_OK) {
            $uploadedHero = Uploader::image($_FILES['hero_image'], 'public/uploads/pages');
            if ($uploadedHero) {
                $heroImage = $uploadedHero;
            }
        } elseif ($request->input('hero_image_manual')) {
            $heroImage = trim((string) $request->input('hero_image_manual'));
        }

        $hero = [
            'badge' => trim((string) $request->input('hero_badge', $current['hero']['badge'] ?? '')),
            'heading' => trim((string) $request->input('hero_heading', $current['hero']['heading'] ?? 'Property in Vrindavan')),
            'subheading' => trim((string) $request->input('hero_subheading', $current['hero']['subheading'] ?? '')),
            'image' => $heroImage,
            'badge_1' => trim((string) $request->input('hero_badge_1', $current['hero']['badge_1'] ?? '')),
            'badge_2' => trim((string) $request->input('hero_badge_2', $current['hero']['badge_2'] ?? '')),
            'badge_3' => trim((string) $request->input('hero_badge_3', $current['hero']['badge_3'] ?? '')),
            'badge_4' => trim((string) $request->input('hero_badge_4', $current['hero']['badge_4'] ?? '')),
        ];

        // 2. Overview Narrative & Visuals
        $overviewImage = $current['overview']['image'] ?? 'uploads/pages/mero-vrindavan.png';
        if (!empty($_FILES['overview_image']['name']) && $_FILES['overview_image']['error'] === UPLOAD_ERR_OK) {
            $uploadedOverview = Uploader::image($_FILES['overview_image'], 'public/uploads/pages');
            if ($uploadedOverview) {
                $overviewImage = $uploadedOverview;
            }
        } elseif ($request->input('overview_image_manual')) {
            $overviewImage = trim((string) $request->input('overview_image_manual'));
        }

        $secondaryImage = $current['overview']['secondary_image'] ?? 'uploads/pages/property-in-vrindavan.png';
        if (!empty($_FILES['secondary_image']['name']) && $_FILES['secondary_image']['error'] === UPLOAD_ERR_OK) {
            $uploadedSecondary = Uploader::image($_FILES['secondary_image'], 'public/uploads/pages');
            if ($uploadedSecondary) {
                $secondaryImage = $uploadedSecondary;
            }
        } elseif ($request->input('secondary_image_manual')) {
            $secondaryImage = trim((string) $request->input('secondary_image_manual'));
        }

        $overview = [
            'badge' => trim((string) $request->input('overview_badge', $current['overview']['badge'] ?? '')),
            'title' => trim((string) $request->input('overview_title', $current['overview']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('overview_subtitle', $current['overview']['subtitle'] ?? '')),
            'content' => (string) $request->raw('overview_content', $current['overview']['content'] ?? ''),
            'image' => $overviewImage,
            'badge_sub' => trim((string) $request->input('overview_badge_sub', $current['overview']['badge_sub'] ?? '')),
            'badge_title' => trim((string) $request->input('overview_badge_title', $current['overview']['badge_title'] ?? '')),
            'secondary_image' => $secondaryImage,
            'secondary_title' => trim((string) $request->input('overview_secondary_title', $current['overview']['secondary_title'] ?? '')),
            'secondary_desc' => trim((string) $request->input('overview_secondary_desc', $current['overview']['secondary_desc'] ?? '')),
            'metric_1_val' => trim((string) $request->input('overview_metric_1_val', $current['overview']['metric_1_val'] ?? '')),
            'metric_1_lbl' => trim((string) $request->input('overview_metric_1_lbl', $current['overview']['metric_1_lbl'] ?? '')),
            'metric_2_val' => trim((string) $request->input('overview_metric_2_val', $current['overview']['metric_2_val'] ?? '')),
            'metric_2_lbl' => trim((string) $request->input('overview_metric_2_lbl', $current['overview']['metric_2_lbl'] ?? '')),
            'metric_3_val' => trim((string) $request->input('overview_metric_3_val', $current['overview']['metric_3_val'] ?? '')),
            'metric_3_lbl' => trim((string) $request->input('overview_metric_3_lbl', $current['overview']['metric_3_lbl'] ?? '')),
            'metric_4_val' => trim((string) $request->input('overview_metric_4_val', $current['overview']['metric_4_val'] ?? '')),
            'metric_4_lbl' => trim((string) $request->input('overview_metric_4_lbl', $current['overview']['metric_4_lbl'] ?? '')),
        ];

        // 3. Legalities & Due Diligence (MVDA Filter)
        $legalities = [
            'eyebrow' => trim((string) $request->input('legalities_eyebrow', $current['legalities']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('legalities_title', $current['legalities']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('legalities_subtitle', $current['legalities']['subtitle'] ?? '')),
            'p1_title' => trim((string) $request->input('legalities_p1_title', $current['legalities']['p1_title'] ?? '')),
            'p1_desc' => trim((string) $request->input('legalities_p1_desc', $current['legalities']['p1_desc'] ?? '')),
            'p2_title' => trim((string) $request->input('legalities_p2_title', $current['legalities']['p2_title'] ?? '')),
            'p2_desc' => trim((string) $request->input('legalities_p2_desc', $current['legalities']['p2_desc'] ?? '')),
            'p3_title' => trim((string) $request->input('legalities_p3_title', $current['legalities']['p3_title'] ?? '')),
            'p3_desc' => trim((string) $request->input('legalities_p3_desc', $current['legalities']['p3_desc'] ?? '')),
            'p4_title' => trim((string) $request->input('legalities_p4_title', $current['legalities']['p4_title'] ?? '')),
            'p4_desc' => trim((string) $request->input('legalities_p4_desc', $current['legalities']['p4_desc'] ?? '')),
        ];

        // 4. Megaprojects & Strategic Growth Drivers
        $megaprojects = [
            'eyebrow' => trim((string) $request->input('megaprojects_eyebrow', $current['megaprojects']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('megaprojects_title', $current['megaprojects']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('megaprojects_subtitle', $current['megaprojects']['subtitle'] ?? '')),
            'mp1_title' => trim((string) $request->input('megaprojects_mp1_title', $current['megaprojects']['mp1_title'] ?? '')),
            'mp1_badge' => trim((string) $request->input('megaprojects_mp1_badge', $current['megaprojects']['mp1_badge'] ?? '')),
            'mp1_desc' => trim((string) $request->input('megaprojects_mp1_desc', $current['megaprojects']['mp1_desc'] ?? '')),
            'mp2_title' => trim((string) $request->input('megaprojects_mp2_title', $current['megaprojects']['mp2_title'] ?? '')),
            'mp2_badge' => trim((string) $request->input('megaprojects_mp2_badge', $current['megaprojects']['mp2_badge'] ?? '')),
            'mp2_desc' => trim((string) $request->input('megaprojects_mp2_desc', $current['megaprojects']['mp2_desc'] ?? '')),
            'mp3_title' => trim((string) $request->input('megaprojects_mp3_title', $current['megaprojects']['mp3_title'] ?? '')),
            'mp3_badge' => trim((string) $request->input('megaprojects_mp3_badge', $current['megaprojects']['mp3_badge'] ?? '')),
            'mp3_desc' => trim((string) $request->input('megaprojects_mp3_desc', $current['megaprojects']['mp3_desc'] ?? '')),
            'mp4_title' => trim((string) $request->input('megaprojects_mp4_title', $current['megaprojects']['mp4_title'] ?? '')),
            'mp4_badge' => trim((string) $request->input('megaprojects_mp4_badge', $current['megaprojects']['mp4_badge'] ?? '')),
            'mp4_desc' => trim((string) $request->input('megaprojects_mp4_desc', $current['megaprojects']['mp4_desc'] ?? '')),
        ];

        // 5. Spiritual Lifestyle Dividend
        $lifestyle = [
            'eyebrow' => trim((string) $request->input('lifestyle_eyebrow', $current['lifestyle']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('lifestyle_title', $current['lifestyle']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('lifestyle_subtitle', $current['lifestyle']['subtitle'] ?? '')),
            'card1_title' => trim((string) $request->input('lifestyle_card1_title', $current['lifestyle']['card1_title'] ?? '')),
            'card1_desc' => trim((string) $request->input('lifestyle_card1_desc', $current['lifestyle']['card1_desc'] ?? '')),
            'card2_title' => trim((string) $request->input('lifestyle_card2_title', $current['lifestyle']['card2_title'] ?? '')),
            'card2_desc' => trim((string) $request->input('lifestyle_card2_desc', $current['lifestyle']['card2_desc'] ?? '')),
            'card3_title' => trim((string) $request->input('lifestyle_card3_title', $current['lifestyle']['card3_title'] ?? '')),
            'card3_desc' => trim((string) $request->input('lifestyle_card3_desc', $current['lifestyle']['card3_desc'] ?? '')),
            'card4_title' => trim((string) $request->input('lifestyle_card4_title', $current['lifestyle']['card4_title'] ?? '')),
            'card4_desc' => trim((string) $request->input('lifestyle_card4_desc', $current['lifestyle']['card4_desc'] ?? '')),
        ];

        // 6. VIP Consultation & Hotline Form
        $consultation = [
            'badge' => trim((string) $request->input('consultation_badge', $current['consultation']['badge'] ?? '')),
            'title' => trim((string) $request->input('consultation_title', $current['consultation']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('consultation_subtitle', $current['consultation']['subtitle'] ?? '')),
            'phone_1' => trim((string) $request->input('consultation_phone_1', $current['consultation']['phone_1'] ?? '+91 9871731303')),
            'phone_2' => trim((string) $request->input('consultation_phone_2', $current['consultation']['phone_2'] ?? '+91 7409767452')),
            'whatsapp' => trim((string) $request->input('consultation_whatsapp', $current['consultation']['whatsapp'] ?? '+91 9871731303')),
        ];

        // 7. SEO Metadata
        $seo = [
            'meta_title' => trim((string) $request->input('meta_title', $current['seo']['meta_title'] ?? '')),
            'meta_description' => trim((string) $request->input('meta_description', $current['seo']['meta_description'] ?? '')),
            'meta_keywords' => trim((string) $request->input('meta_keywords', $current['seo']['meta_keywords'] ?? '')),
        ];

        $payload = [
            'hero' => $hero,
            'overview' => $overview,
            'legalities' => $legalities,
            'megaprojects' => $megaprojects,
            'lifestyle' => $lifestyle,
            'consultation' => $consultation,
            'seo' => $seo,
        ];

        Setting::savePropertyVrindavanSections($payload);

        $this->flash('success', 'Property in Vrindavan content, sections, and images updated successfully.');
        return $this->redirect(url('/admin/property-vrindavan'));
    }

    public function uploadImage(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            return Response::json(['success' => false, 'message' => 'Security token invalid'], 403);
        }

        $file = $request->file('content_image');
        if (!$file || empty($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) {
            return Response::json(['success' => false, 'message' => 'No image file uploaded'], 400);
        }

        $uploaded = Uploader::image($file, 'public/uploads/pages');
        if (!$uploaded) {
            return Response::json(['success' => false, 'message' => 'Failed to upload image. Allowed formats: JPG, PNG, WebP'], 400);
        }

        return Response::json([
            'success' => true,
            'url' => media_url($uploaded),
            'path' => $uploaded,
        ]);
    }
}
