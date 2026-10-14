<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Setting;
use Core\Request;
use Core\Response;
use Core\Uploader;
use Core\Csrf;

class PlotRateMathuraController extends Controller
{
    public function index(Request $request): Response
    {
        $pr = Setting::getMathuraPlotRateSections();
        if (empty($pr['faqs']['list'])) {
            $pr['faqs']['list'] = [
                [
                    'q' => '1. What is the current plot rate in Mathura?',
                    'a' => 'Rates vary between ₹35,000 and ₹45,000 for approved gated plots.'
                ]
            ];
        }
        return $this->adminView('admin/plot_rate_mathura/index', [
            'pr' => $pr,
            'title' => 'Manage Mathura Plot Rate Page',
            'seo_title' => 'Manage Mathura Plot Rate Page',
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid. Please try again.');
            return $this->redirect(url('/admin/plot-rate-mathura'));
        }

        $data = $request->all();
        $current = Setting::getMathuraPlotRateSections();

        // Process Hero Image
        $heroImage = $current['hero']['image'] ?? '';
        if (!empty($_FILES['hero_image_file']['name']) && $_FILES['hero_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedHero = Uploader::image($_FILES['hero_image_file'], 'public/uploads/pages');
            if ($uploadedHero) $heroImage = 'uploads/pages/' . basename($uploadedHero);
        }

        // Process Narrative Image
        $narrativeImage = $current['narrative']['image'] ?? '';
        if (!empty($_FILES['narrative_image_file']['name']) && $_FILES['narrative_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedNarr = Uploader::image($_FILES['narrative_image_file'], 'public/uploads/pages');
            if ($uploadedNarr) $narrativeImage = 'uploads/pages/' . basename($uploadedNarr);
        }

        // Process Secondary Image
        $secondaryImage = $current['narrative']['secondary_image'] ?? '';
        if (!empty($_FILES['narrative_secondary_image_file']['name']) && $_FILES['narrative_secondary_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedSec = Uploader::image($_FILES['narrative_secondary_image_file'], 'public/uploads/pages');
            if ($uploadedSec) $secondaryImage = 'uploads/pages/' . basename($uploadedSec);
        }

        // Handle FAQs
        $faqsList = [];
        if (!empty($data['faq_q']) && is_array($data['faq_q'])) {
            foreach ($data['faq_q'] as $index => $q) {
                if (trim($q) !== '') {
                    $faqsList[] = [
                        'q' => trim($q),
                        'a' => trim($data['faq_a'][$index] ?? '')
                    ];
                }
            }
        }

        $structuredData = [
            'hero' => [
                'heading' => $data['hero_heading'] ?? '',
                'subheading' => $data['hero_subheading'] ?? '',
                'image' => $heroImage,
                'badge_1' => $data['hero_badge_1'] ?? '',
                'badge_2' => $data['hero_badge_2'] ?? '',
                'badge_3' => $data['hero_badge_3'] ?? '',
                'badge_4' => $data['hero_badge_4'] ?? '',
            ],
            'narrative' => [
                'eyebrow' => $data['narrative_eyebrow'] ?? '',
                'title' => $data['narrative_title'] ?? '',
                'content' => $data['narrative_content'] ?? '',
                'image' => $narrativeImage,
                'badge_sub' => $data['narrative_badge_sub'] ?? '',
                'badge_title' => $data['narrative_badge_title'] ?? '',
                'secondary_image' => $secondaryImage,
                'secondary_title' => $data['narrative_secondary_title'] ?? '',
                'secondary_desc' => $data['narrative_secondary_desc'] ?? '',
                'val_1' => $data['narrative_val_1'] ?? '',
                'lbl_1' => $data['narrative_lbl_1'] ?? '',
                'val_2' => $data['narrative_val_2'] ?? '',
                'lbl_2' => $data['narrative_lbl_2'] ?? '',
                'val_3' => $data['narrative_val_3'] ?? '',
                'lbl_3' => $data['narrative_lbl_3'] ?? '',
                'val_4' => $data['narrative_val_4'] ?? '',
                'lbl_4' => $data['narrative_lbl_4'] ?? '',
            ],
            'target_profiles' => [
                'eyebrow' => $data['target_profiles_eyebrow'] ?? '',
                'title' => $data['target_profiles_title'] ?? '',
                'subtitle' => $data['target_profiles_subtitle'] ?? '',
                'p1_title' => $data['target_profiles_p1_title'] ?? '',
                'p1_desc' => $data['target_profiles_p1_desc'] ?? '',
                'p2_title' => $data['target_profiles_p2_title'] ?? '',
                'p2_desc' => $data['target_profiles_p2_desc'] ?? '',
                'p3_title' => $data['target_profiles_p3_title'] ?? '',
                'p3_desc' => $data['target_profiles_p3_desc'] ?? '',
                'p4_title' => $data['target_profiles_p4_title'] ?? '',
                'p4_desc' => $data['target_profiles_p4_desc'] ?? '',
            ],
            'matrix' => [
                'eyebrow' => $data['matrix_eyebrow'] ?? '',
                'title' => $data['matrix_title'] ?? '',
                'subtitle' => $data['matrix_subtitle'] ?? '',
            ],
            'breakdown' => [
                'eyebrow' => $data['breakdown_eyebrow'] ?? '',
                'title' => $data['breakdown_title'] ?? '',
                'subtitle' => $data['breakdown_subtitle'] ?? '',
                'total_lbl' => $data['breakdown_total_lbl'] ?? '',
                'total_val' => $data['breakdown_total_val'] ?? '',
                'note' => $data['breakdown_note'] ?? '',
            ],
            'faqs' => [
                'eyebrow' => $data['faqs_eyebrow'] ?? '',
                'title' => $data['faqs_title'] ?? '',
                'subtitle' => $data['faqs_subtitle'] ?? '',
                'list' => $faqsList,
            ],
            'consultation' => [
                'eyebrow' => $data['consultation_eyebrow'] ?? '',
                'title' => $data['consultation_title'] ?? '',
                'subtitle' => $data['consultation_subtitle'] ?? '',
            ],
            'seo' => [
                'meta_title' => $data['seo_meta_title'] ?? '',
                'meta_description' => $data['seo_meta_description'] ?? '',
                'meta_keywords' => $data['seo_meta_keywords'] ?? '',
            ],
        ];

        // Process Matrix rows
        for ($i = 1; $i <= 6; $i++) {
            $structuredData['matrix']["r{$i}_col1"] = $data["matrix_r{$i}_col1"] ?? '';
            $structuredData['matrix']["r{$i}_col2"] = $data["matrix_r{$i}_col2"] ?? '';
            $structuredData['matrix']["r{$i}_col3"] = $data["matrix_r{$i}_col3"] ?? '';
            $structuredData['matrix']["r{$i}_col4"] = $data["matrix_r{$i}_col4"] ?? '';
            $structuredData['matrix']["r{$i}_col5"] = $data["matrix_r{$i}_col5"] ?? '';
        }

        // Process Breakdown rows
        for ($i = 1; $i <= 5; $i++) {
            $structuredData['breakdown']["r{$i}_lbl"] = $data["breakdown_r{$i}_lbl"] ?? '';
            $structuredData['breakdown']["r{$i}_val"] = $data["breakdown_r{$i}_val"] ?? '';
        }

        Setting::saveMathuraPlotRateSections($structuredData);

        $this->flash('success', 'Mathura Plot Rate page updated successfully.');
        return $this->redirect(url('/admin/plot-rate-mathura'));
    }
}