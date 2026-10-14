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
 * Class CommercialPropertyController
 *
 * Dedicated administration CMS module for managing all dynamic content,
 * imagery, infrastructure catalysts, asset classes, flagship showcase, and SEO
 * on the Commercial Property in Vrindavan page.
 */
class CommercialPropertyController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::getCommercialPropertySections();

        return $this->adminView('admin/commercial_property/index', [
            'seo_title' => 'Commercial Property in Vrindavan CMS',
            'sections' => $sections,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/commercial-property'));
        }

        $current = Setting::getCommercialPropertySections();

        // 1. Hero Section Imagery & Badges
        $heroImage = $current['hero']['image'] ?? 'uploads/pages/commercial-property-in-vrindavan.jpeg';
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
            'heading' => trim((string) $request->input('hero_heading', $current['hero']['heading'] ?? 'Commercial Property in Vrindavan')),
            'subheading' => trim((string) $request->input('hero_subheading', $current['hero']['subheading'] ?? '')),
            'image' => $heroImage,
            'badge_1' => trim((string) $request->input('hero_badge_1', $current['hero']['badge_1'] ?? '')),
            'badge_2' => trim((string) $request->input('hero_badge_2', $current['hero']['badge_2'] ?? '')),
            'badge_3' => trim((string) $request->input('hero_badge_3', $current['hero']['badge_3'] ?? '')),
            'badge_4' => trim((string) $request->input('hero_badge_4', $current['hero']['badge_4'] ?? '')),
        ];

        // 2. Overview Narrative & Visuals
        $overviewImage = $current['overview']['image'] ?? 'uploads/pages/commercial-property-in-vrindavan.jpeg';
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

        // 3. Infrastructure Catalysts
        $catalysts = [
            'eyebrow' => trim((string) $request->input('catalysts_eyebrow', $current['catalysts']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('catalysts_title', $current['catalysts']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('catalysts_subtitle', $current['catalysts']['subtitle'] ?? '')),
            'p1_title' => trim((string) $request->input('catalysts_p1_title', $current['catalysts']['p1_title'] ?? '')),
            'p1_desc' => trim((string) $request->input('catalysts_p1_desc', $current['catalysts']['p1_desc'] ?? '')),
            'p2_title' => trim((string) $request->input('catalysts_p2_title', $current['catalysts']['p2_title'] ?? '')),
            'p2_desc' => trim((string) $request->input('catalysts_p2_desc', $current['catalysts']['p2_desc'] ?? '')),
            'p3_title' => trim((string) $request->input('catalysts_p3_title', $current['catalysts']['p3_title'] ?? '')),
            'p3_desc' => trim((string) $request->input('catalysts_p3_desc', $current['catalysts']['p3_desc'] ?? '')),
            'p4_title' => trim((string) $request->input('catalysts_p4_title', $current['catalysts']['p4_title'] ?? '')),
            'p4_desc' => trim((string) $request->input('catalysts_p4_desc', $current['catalysts']['p4_desc'] ?? '')),
        ];

        // 4. Asset Classes / Verticals
        $sectors = [
            'eyebrow' => trim((string) $request->input('sectors_eyebrow', $current['sectors']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('sectors_title', $current['sectors']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('sectors_subtitle', $current['sectors']['subtitle'] ?? '')),
            's1_icon' => trim((string) $request->input('sectors_s1_icon', $current['sectors']['s1_icon'] ?? '🏨')),
            's1_title' => trim((string) $request->input('sectors_s1_title', $current['sectors']['s1_title'] ?? '')),
            's1_desc' => trim((string) $request->input('sectors_s1_desc', $current['sectors']['s1_desc'] ?? '')),
            's1_roi' => trim((string) $request->input('sectors_s1_roi', $current['sectors']['s1_roi'] ?? '')),
            's2_icon' => trim((string) $request->input('sectors_s2_icon', $current['sectors']['s2_icon'] ?? '🛍️')),
            's2_title' => trim((string) $request->input('sectors_s2_title', $current['sectors']['s2_title'] ?? '')),
            's2_desc' => trim((string) $request->input('sectors_s2_desc', $current['sectors']['s2_desc'] ?? '')),
            's2_roi' => trim((string) $request->input('sectors_s2_roi', $current['sectors']['s2_roi'] ?? '')),
            's3_icon' => trim((string) $request->input('sectors_s3_icon', $current['sectors']['s3_icon'] ?? '🍽️')),
            's3_title' => trim((string) $request->input('sectors_s3_title', $current['sectors']['s3_title'] ?? '')),
            's3_desc' => trim((string) $request->input('sectors_s3_desc', $current['sectors']['s3_desc'] ?? '')),
            's3_roi' => trim((string) $request->input('sectors_s3_roi', $current['sectors']['s3_roi'] ?? '')),
        ];

        // 5. Flagship Commercial Showcase
        $showcaseImage = $current['showcase']['image'] ?? 'uploads/pages/commercial-property-in-vrindavan.jpeg';
        if (!empty($_FILES['showcase_image']['name']) && $_FILES['showcase_image']['error'] === UPLOAD_ERR_OK) {
            $uploadedShowcase = Uploader::image($_FILES['showcase_image'], 'public/uploads/pages');
            if ($uploadedShowcase) {
                $showcaseImage = $uploadedShowcase;
            }
        } elseif ($request->input('showcase_image_manual')) {
            $showcaseImage = trim((string) $request->input('showcase_image_manual'));
        }

        $showcase = [
            'eyebrow' => trim((string) $request->input('showcase_eyebrow', $current['showcase']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('showcase_title', $current['showcase']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('showcase_subtitle', $current['showcase']['subtitle'] ?? '')),
            'image' => $showcaseImage,
            'badge' => trim((string) $request->input('showcase_badge', $current['showcase']['badge'] ?? '')),
            'price_tag' => trim((string) $request->input('showcase_price_tag', $current['showcase']['price_tag'] ?? '')),
            'location' => trim((string) $request->input('showcase_location', $current['showcase']['location'] ?? '')),
            'headline' => trim((string) $request->input('showcase_headline', $current['showcase']['headline'] ?? '')),
            'desc' => trim((string) $request->input('showcase_desc', $current['showcase']['desc'] ?? '')),
            'f1_lbl' => trim((string) $request->input('showcase_f1_lbl', $current['showcase']['f1_lbl'] ?? '')),
            'f1_val' => trim((string) $request->input('showcase_f1_val', $current['showcase']['f1_val'] ?? '')),
            'f2_lbl' => trim((string) $request->input('showcase_f2_lbl', $current['showcase']['f2_lbl'] ?? '')),
            'f2_val' => trim((string) $request->input('showcase_f2_val', $current['showcase']['f2_val'] ?? '')),
            'f3_lbl' => trim((string) $request->input('showcase_f3_lbl', $current['showcase']['f3_lbl'] ?? '')),
            'f3_val' => trim((string) $request->input('showcase_f3_val', $current['showcase']['f3_val'] ?? '')),
            'f4_lbl' => trim((string) $request->input('showcase_f4_lbl', $current['showcase']['f4_lbl'] ?? '')),
            'f4_val' => trim((string) $request->input('showcase_f4_val', $current['showcase']['f4_val'] ?? '')),
            'project_slug' => trim((string) $request->input('showcase_project_slug', $current['showcase']['project_slug'] ?? 'shri-vrinda-orchids-commercial-complex')),
        ];

        // 6. Vrindavan Commercial Land & Retail Rate Matrix
        $matrixRows = [];
        $rawRows = $request->post('matrix_rows');
        if (is_array($rawRows)) {
            foreach ($rawRows as $row) {
                if (!is_array($row)) {
                    continue;
                }
                $corridor = trim((string) ($row['corridor'] ?? ''));
                $landRate = trim((string) ($row['land_rate'] ?? ''));
                $retailRate = trim((string) ($row['retail_rate'] ?? ''));
                $optimalUse = trim((string) ($row['optimal_use'] ?? ''));
                $yield = trim((string) ($row['projected_yield'] ?? ''));

                if ($corridor !== '' || $landRate !== '' || $retailRate !== '' || $optimalUse !== '' || $yield !== '') {
                    $matrixRows[] = [
                        'corridor' => $corridor,
                        'land_rate' => $landRate,
                        'retail_rate' => $retailRate,
                        'optimal_use' => $optimalUse,
                        'projected_yield' => $yield,
                    ];
                }
            }
        } elseif (!isset($_POST['matrix_title']) && !empty($current['matrix']['rows'])) {
            $matrixRows = $current['matrix']['rows'];
        }

        $matrix = [
            'eyebrow' => trim((string) $request->input('matrix_eyebrow', $current['matrix']['eyebrow'] ?? '2026 Pricing Transparency')),
            'title' => trim((string) $request->input('matrix_title', $current['matrix']['title'] ?? 'Vrindavan Commercial Land & Retail Rate Matrix')),
            'subtitle' => trim((string) $request->input('matrix_subtitle', $current['matrix']['subtitle'] ?? 'Current market price analysis per corridor across permissible commercial zones in Vrindavan.')),
            'rows' => $matrixRows,
        ];

        // 7. Frequently Asked Questions
        $faqList = [];
        $rawQuestions = $request->post('faq_q');
        $rawAnswers = $request->post('faq_a');
        if (is_array($rawQuestions)) {
            foreach ($rawQuestions as $index => $q) {
                $qText = trim((string) $q);
                $aText = isset($rawAnswers[$index]) ? trim((string) $rawAnswers[$index]) : '';
                if ($qText !== '' || $aText !== '') {
                    $faqList[] = [
                        'q' => $qText,
                        'a' => $aText,
                    ];
                }
            }
        } elseif (!isset($_POST['faqs_title']) && !empty($current['faqs']['list'])) {
            $faqList = $current['faqs']['list'];
        }

        $faqs = [
            'eyebrow' => trim((string) $request->input('faqs_eyebrow', $current['faqs']['eyebrow'] ?? 'Investor Intelligence')),
            'title' => trim((string) $request->input('faqs_title', $current['faqs']['title'] ?? 'Frequently Asked Questions')),
            'subtitle' => trim((string) $request->input('faqs_subtitle', $current['faqs']['subtitle'] ?? 'Clear, straightforward answers about commercial land, CLU compliance, and returns in Vrindavan.')),
            'list' => $faqList,
        ];

        // 8. Institutional Commercial Advisory
        $consultation = [
            'badge' => trim((string) $request->input('consultation_badge', $current['consultation']['badge'] ?? '')),
            'title' => trim((string) $request->input('consultation_title', $current['consultation']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('consultation_subtitle', $current['consultation']['subtitle'] ?? '')),
            'phone_1' => trim((string) $request->input('consultation_phone_1', $current['consultation']['phone_1'] ?? '+91 9871731303')),
            'phone_2' => trim((string) $request->input('consultation_phone_2', $current['consultation']['phone_2'] ?? '+91 7409767452')),
            'whatsapp' => trim((string) $request->input('consultation_whatsapp', $current['consultation']['whatsapp'] ?? '+91 9871731303')),
        ];

        // 9. SEO Metadata
        $seo = [
            'meta_title' => trim((string) $request->input('meta_title', $current['seo']['meta_title'] ?? '')),
            'meta_description' => trim((string) $request->input('meta_description', $current['seo']['meta_description'] ?? '')),
            'meta_keywords' => trim((string) $request->input('meta_keywords', $current['seo']['meta_keywords'] ?? '')),
        ];

        $payload = [
            'hero' => $hero,
            'overview' => $overview,
            'catalysts' => $catalysts,
            'sectors' => $sectors,
            'showcase' => $showcase,
            'matrix' => $matrix,
            'faqs' => $faqs,
            'consultation' => $consultation,
            'seo' => $seo,
        ];

        Setting::saveCommercialPropertySections($payload);

        $this->flash('success', 'Commercial Property in Vrindavan content, sections, and images updated successfully.');
        return $this->redirect(url('/admin/commercial-property'));
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
