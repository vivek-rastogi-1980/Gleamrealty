<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Setting;
use Core\Controller;
use Core\Request;
use Core\Response;
use Core\Csrf;
use Core\Uploader;

class LuxuryVillasController extends Controller
{
    public function index(Request $request): Response
    {
        return $this->adminView('admin/luxury_villas/index', [
            'seo_title' => 'Manage Villas in Vrindavan',
            'lv' => Setting::getLuxuryVillasSections(),
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid. Please try again.');
            return $this->redirect(url('/admin/luxury-villas'));
        }

        $current = Setting::getLuxuryVillasSections();

        $heroImage = $current['hero']['image'] ?? 'uploads/pages/luxury-villas-in-vrindavan.jpeg';
        if (!empty($_FILES['hero_image_file']['name']) && $_FILES['hero_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedHero = Uploader::image($_FILES['hero_image_file'], 'public/uploads/pages');
            if ($uploadedHero) {
                $heroImage = $uploadedHero;
            }
        } elseif ($request->input('hero_image')) {
            $heroImage = trim((string) $request->input('hero_image'));
        }

        $hero = [
            'heading' => trim((string) $request->input('hero_heading', $current['hero']['heading'] ?? '')),
            'subheading' => trim((string) $request->input('hero_subheading', $current['hero']['subheading'] ?? '')),
            'image' => $heroImage,
        ];

        $narrative = [
            'eyebrow' => trim((string) $request->input('narrative_eyebrow', $current['narrative']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('narrative_title', $current['narrative']['title'] ?? '')),
            'content' => trim((string) $request->input('narrative_content', $current['narrative']['content'] ?? '')),
            'metric_1_val' => trim((string) $request->input('narrative_metric_1_val', $current['narrative']['metric_1_val'] ?? '')),
            'metric_1_lbl' => trim((string) $request->input('narrative_metric_1_lbl', $current['narrative']['metric_1_lbl'] ?? '')),
            'metric_2_val' => trim((string) $request->input('narrative_metric_2_val', $current['narrative']['metric_2_val'] ?? '')),
            'metric_2_lbl' => trim((string) $request->input('narrative_metric_2_lbl', $current['narrative']['metric_2_lbl'] ?? '')),
            'metric_3_val' => trim((string) $request->input('narrative_metric_3_val', $current['narrative']['metric_3_val'] ?? '')),
            'metric_3_lbl' => trim((string) $request->input('narrative_metric_3_lbl', $current['narrative']['metric_3_lbl'] ?? '')),
            'metric_4_val' => trim((string) $request->input('narrative_metric_4_val', $current['narrative']['metric_4_val'] ?? '')),
            'metric_4_lbl' => trim((string) $request->input('narrative_metric_4_lbl', $current['narrative']['metric_4_lbl'] ?? '')),
        ];

        $outperforms = [
            'eyebrow' => trim((string) $request->input('outperforms_eyebrow', $current['outperforms']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('outperforms_title', $current['outperforms']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('outperforms_subtitle', $current['outperforms']['subtitle'] ?? '')),
            'p1_title' => trim((string) $request->input('outperforms_p1_title', $current['outperforms']['p1_title'] ?? '')),
            'p1_desc' => trim((string) $request->input('outperforms_p1_desc', $current['outperforms']['p1_desc'] ?? '')),
            'p2_title' => trim((string) $request->input('outperforms_p2_title', $current['outperforms']['p2_title'] ?? '')),
            'p2_desc' => trim((string) $request->input('outperforms_p2_desc', $current['outperforms']['p2_desc'] ?? '')),
            'p3_title' => trim((string) $request->input('outperforms_p3_title', $current['outperforms']['p3_title'] ?? '')),
            'p3_desc' => trim((string) $request->input('outperforms_p3_desc', $current['outperforms']['p3_desc'] ?? '')),
            'p4_title' => trim((string) $request->input('outperforms_p4_title', $current['outperforms']['p4_title'] ?? '')),
            'p4_desc' => trim((string) $request->input('outperforms_p4_desc', $current['outperforms']['p4_desc'] ?? '')),
        ];

        $vastu = [
            'eyebrow' => trim((string) $request->input('vastu_eyebrow', $current['vastu']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('vastu_title', $current['vastu']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('vastu_subtitle', $current['vastu']['subtitle'] ?? '')),
            'z1_num' => trim((string) $request->input('vastu_z1_num', $current['vastu']['z1_num'] ?? '')),
            'z1_title' => trim((string) $request->input('vastu_z1_title', $current['vastu']['z1_title'] ?? '')),
            'z1_desc' => trim((string) $request->input('vastu_z1_desc', $current['vastu']['z1_desc'] ?? '')),
            'z2_num' => trim((string) $request->input('vastu_z2_num', $current['vastu']['z2_num'] ?? '')),
            'z2_title' => trim((string) $request->input('vastu_z2_title', $current['vastu']['z2_title'] ?? '')),
            'z2_desc' => trim((string) $request->input('vastu_z2_desc', $current['vastu']['z2_desc'] ?? '')),
            'z3_num' => trim((string) $request->input('vastu_z3_num', $current['vastu']['z3_num'] ?? '')),
            'z3_title' => trim((string) $request->input('vastu_z3_title', $current['vastu']['z3_title'] ?? '')),
            'z3_desc' => trim((string) $request->input('vastu_z3_desc', $current['vastu']['z3_desc'] ?? '')),
        ];

        $showcaseP1Image = $current['showcase']['p1_image'] ?? '';
        if (!empty($_FILES['showcase_p1_image_file']['name']) && $_FILES['showcase_p1_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedP1 = Uploader::image($_FILES['showcase_p1_image_file'], 'public/uploads/pages');
            if ($uploadedP1) {
                $showcaseP1Image = $uploadedP1;
            }
        } elseif ($request->input('showcase_p1_image')) {
            $showcaseP1Image = trim((string) $request->input('showcase_p1_image'));
        }

        $showcaseP2Image = $current['showcase']['p2_image'] ?? '';
        if (!empty($_FILES['showcase_p2_image_file']['name']) && $_FILES['showcase_p2_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedP2 = Uploader::image($_FILES['showcase_p2_image_file'], 'public/uploads/pages');
            if ($uploadedP2) {
                $showcaseP2Image = $uploadedP2;
            }
        } elseif ($request->input('showcase_p2_image')) {
            $showcaseP2Image = trim((string) $request->input('showcase_p2_image'));
        }

        $showcase = [
            'eyebrow' => trim((string) $request->input('showcase_eyebrow', $current['showcase']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('showcase_title', $current['showcase']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('showcase_subtitle', $current['showcase']['subtitle'] ?? '')),
            'p1_image' => $showcaseP1Image,
            'p1_badge1' => trim((string) $request->input('showcase_p1_badge1', $current['showcase']['p1_badge1'] ?? '')),
            'p1_badge2' => trim((string) $request->input('showcase_p1_badge2', $current['showcase']['p1_badge2'] ?? '')),
            'p1_location' => trim((string) $request->input('showcase_p1_location', $current['showcase']['p1_location'] ?? '')),
            'p1_title' => trim((string) $request->input('showcase_p1_title', $current['showcase']['p1_title'] ?? '')),
            'p1_desc' => trim((string) $request->input('showcase_p1_desc', $current['showcase']['p1_desc'] ?? '')),
            'p1_f1' => trim((string) $request->input('showcase_p1_f1', $current['showcase']['p1_f1'] ?? '')),
            'p1_f2' => trim((string) $request->input('showcase_p1_f2', $current['showcase']['p1_f2'] ?? '')),
            'p1_f3' => trim((string) $request->input('showcase_p1_f3', $current['showcase']['p1_f3'] ?? '')),
            'p1_url' => trim((string) $request->input('showcase_p1_url', $current['showcase']['p1_url'] ?? '')),
            'p2_image' => $showcaseP2Image,
            'p2_badge1' => trim((string) $request->input('showcase_p2_badge1', $current['showcase']['p2_badge1'] ?? '')),
            'p2_badge2' => trim((string) $request->input('showcase_p2_badge2', $current['showcase']['p2_badge2'] ?? '')),
            'p2_location' => trim((string) $request->input('showcase_p2_location', $current['showcase']['p2_location'] ?? '')),
            'p2_title' => trim((string) $request->input('showcase_p2_title', $current['showcase']['p2_title'] ?? '')),
            'p2_desc' => trim((string) $request->input('showcase_p2_desc', $current['showcase']['p2_desc'] ?? '')),
            'p2_f1' => trim((string) $request->input('showcase_p2_f1', $current['showcase']['p2_f1'] ?? '')),
            'p2_f2' => trim((string) $request->input('showcase_p2_f2', $current['showcase']['p2_f2'] ?? '')),
            'p2_f3' => trim((string) $request->input('showcase_p2_f3', $current['showcase']['p2_f3'] ?? '')),
            'p2_url' => trim((string) $request->input('showcase_p2_url', $current['showcase']['p2_url'] ?? '')),
            'is_hidden' => $request->input('showcase_is_hidden') ? 1 : 0,
        ];

        // Process FAQ List
        $faqQ = $request->input('faq_q', []);
        $faqA = $request->input('faq_a', []);
        $faqList = [];
        if (is_array($faqQ)) {
            foreach ($faqQ as $idx => $q) {
                if (!empty(trim((string)$q))) {
                    $faqList[] = [
                        'q' => trim((string)$q),
                        'a' => trim((string)($faqA[$idx] ?? ''))
                    ];
                }
            }
        }

        $faqs = [
            'eyebrow' => trim((string) $request->input('faqs_eyebrow', $current['faqs']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('faqs_title', $current['faqs']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('faqs_subtitle', $current['faqs']['subtitle'] ?? '')),
            'list' => !empty($faqList) ? $faqList : ($current['faqs']['list'] ?? [])
        ];

        $consultation = [
            'badge' => trim((string) $request->input('consultation_badge', $current['consultation']['badge'] ?? '')),
            'title' => trim((string) $request->input('consultation_title', $current['consultation']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('consultation_subtitle', $current['consultation']['subtitle'] ?? '')),
            'phone_1' => trim((string) $request->input('consultation_phone_1', $current['consultation']['phone_1'] ?? '')),
            'phone_2' => trim((string) $request->input('consultation_phone_2', $current['consultation']['phone_2'] ?? '')),
        ];

        $seo = [
            'meta_title' => trim((string) $request->input('meta_title', $current['seo']['meta_title'] ?? '')),
            'meta_description' => trim((string) $request->input('meta_description', $current['seo']['meta_description'] ?? '')),
            'meta_keywords' => trim((string) $request->input('meta_keywords', $current['seo']['meta_keywords'] ?? '')),
        ];

        $payload = [
            'hero' => $hero,
            'narrative' => $narrative,
            'outperforms' => $outperforms,
            'showcase' => $showcase,
            'vastu' => $vastu,
            'faqs' => $faqs,
            'consultation' => $consultation,
            'seo' => $seo,
        ];

        Setting::saveLuxuryVillasSections($payload);

        $this->flash('success', 'Luxury Villas content and sections updated successfully.');
        return $this->redirect(url('/admin/luxury-villas'));
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
