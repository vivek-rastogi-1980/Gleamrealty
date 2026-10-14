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
 * Class AboutController
 *
 * Dedicated administration CMS module for managing all dynamic content,
 * imagery, leadership photos, trust metrics, and mission/vision on the About Us page.
 */
class AboutController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::getAboutSections();

        return $this->adminView('admin/about/index', [
            'seo_title' => 'About Us Content CMS',
            'sections' => $sections,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/about'));
        }

        $current = Setting::getAboutSections();

        // 1. Hero & Header Banner
        $heroImage = $current['hero']['image'] ?? 'uploads/hero/hero-braj-sanctuary.webp';
        if (!empty($_FILES['hero_image']['name']) && $_FILES['hero_image']['error'] === UPLOAD_ERR_OK) {
            $uploadedHero = Uploader::upload($_FILES['hero_image'], 'hero');
            if ($uploadedHero) {
                $heroImage = $uploadedHero;
            }
        } elseif ($request->input('hero_image_manual')) {
            $heroImage = trim((string) $request->input('hero_image_manual'));
        }

        $hero = [
            'badge' => trim((string) $request->input('hero_badge', $current['hero']['badge'])),
            'heading' => trim((string) $request->input('hero_heading', $current['hero']['heading'])),
            'subheading' => trim((string) $request->input('hero_subheading', $current['hero']['subheading'])),
            'image' => $heroImage,
        ];

        // 2. Company Overview & Sanctuary Visual
        $sanctuaryImage = $current['overview']['sanctuary_image'] ?? 'uploads/about/prem-mandir.webp';
        if (!empty($_FILES['sanctuary_image']['name']) && $_FILES['sanctuary_image']['error'] === UPLOAD_ERR_OK) {
            $uploadedSanctuary = Uploader::upload($_FILES['sanctuary_image'], 'about');
            if ($uploadedSanctuary) {
                $sanctuaryImage = $uploadedSanctuary;
            }
        } elseif ($request->input('sanctuary_image_manual')) {
            $sanctuaryImage = trim((string) $request->input('sanctuary_image_manual'));
        }

        $overview = [
            'badge' => trim((string) $request->input('overview_badge', $current['overview']['badge'])),
            'title' => trim((string) $request->input('overview_title', $current['overview']['title'])),
            'sanctuary_image' => $sanctuaryImage,
            'sanctuary_image_alt' => trim((string) $request->input('sanctuary_image_alt', $current['overview']['sanctuary_image_alt'])),
            'phone_1' => trim((string) $request->input('overview_phone_1', $current['overview']['phone_1'])),
            'phone_2' => trim((string) $request->input('overview_phone_2', $current['overview']['phone_2'])),
            'p1' => trim((string) $request->raw('overview_p1', $current['overview']['p1'])),
            'p2' => trim((string) $request->raw('overview_p2', $current['overview']['p2'])),
            'callout_title' => trim((string) $request->input('callout_title', $current['overview']['callout_title'])),
            'callout_p1' => trim((string) $request->raw('callout_p1', $current['overview']['callout_p1'])),
            'callout_p2' => trim((string) $request->raw('callout_p2', $current['overview']['callout_p2'])),
        ];

        // 3. Trust Metrics Grid (4 items)
        $metrics = [];
        for ($i = 0; $i < 4; $i++) {
            $metrics[] = [
                'val' => trim((string) $request->input("metric_{$i}_val", $current['metrics'][$i]['val'] ?? '')),
                'label' => trim((string) $request->input("metric_{$i}_label", $current['metrics'][$i]['label'] ?? '')),
            ];
        }

        // 4. Guiding Principles (Mission & Vision)
        $principles = [
            'eyebrow' => trim((string) $request->input('principles_eyebrow', $current['principles']['eyebrow'])),
            'title' => trim((string) $request->input('principles_title', $current['principles']['title'])),
            'mission_badge' => trim((string) $request->input('mission_badge', $current['principles']['mission_badge'])),
            'mission_icon' => trim((string) $request->input('mission_icon', $current['principles']['mission_icon'])),
            'mission_title' => trim((string) $request->input('mission_title', $current['principles']['mission_title'])),
            'mission_p1' => trim((string) $request->raw('mission_p1', $current['principles']['mission_p1'])),
            'mission_p2' => trim((string) $request->raw('mission_p2', $current['principles']['mission_p2'])),
            'vision_badge' => trim((string) $request->input('vision_badge', $current['principles']['vision_badge'])),
            'vision_icon' => trim((string) $request->input('vision_icon', $current['principles']['vision_icon'])),
            'vision_title' => trim((string) $request->input('vision_title', $current['principles']['vision_title'])),
            'vision_p1' => trim((string) $request->raw('vision_p1', $current['principles']['vision_p1'])),
            'vision_p2' => trim((string) $request->raw('vision_p2', $current['principles']['vision_p2'])),
        ];

        // 5. Leadership & Founders' Photos & Profiles
        $leader1Photo = $current['leadership']['leader1_photo'] ?? 'uploads/team/vinay-01.png';
        if (!empty($_FILES['leader1_photo']['name']) && $_FILES['leader1_photo']['error'] === UPLOAD_ERR_OK) {
            $uploadedL1 = Uploader::upload($_FILES['leader1_photo'], 'team');
            if ($uploadedL1) {
                $leader1Photo = $uploadedL1;
            }
        } elseif ($request->input('leader1_photo_manual')) {
            $leader1Photo = trim((string) $request->input('leader1_photo_manual'));
        }

        $leader2Photo = $current['leadership']['leader2_photo'] ?? 'uploads/team/Rakesh-01.png';
        if (!empty($_FILES['leader2_photo']['name']) && $_FILES['leader2_photo']['error'] === UPLOAD_ERR_OK) {
            $uploadedL2 = Uploader::upload($_FILES['leader2_photo'], 'team');
            if ($uploadedL2) {
                $leader2Photo = $uploadedL2;
            }
        } elseif ($request->input('leader2_photo_manual')) {
            $leader2Photo = trim((string) $request->input('leader2_photo_manual'));
        }

        $leadership = [
            'leader1_name' => trim((string) $request->input('leader1_name', $current['leadership']['leader1_name'])),
            'leader1_role' => trim((string) $request->input('leader1_role', $current['leadership']['leader1_role'])),
            'leader1_photo' => $leader1Photo,
            'leader1_eyebrow' => trim((string) $request->input('leader1_eyebrow', $current['leadership']['leader1_eyebrow'])),
            'leader1_headline' => trim((string) $request->input('leader1_headline', $current['leadership']['leader1_headline'])),
            'leader1_p1' => trim((string) $request->raw('leader1_p1', $current['leadership']['leader1_p1'])),
            'leader1_p2' => trim((string) $request->raw('leader1_p2', $current['leadership']['leader1_p2'])),
            'leader1_p3' => trim((string) $request->raw('leader1_p3', $current['leadership']['leader1_p3'])),

            'leader2_name' => trim((string) $request->input('leader2_name', $current['leadership']['leader2_name'])),
            'leader2_role' => trim((string) $request->input('leader2_role', $current['leadership']['leader2_role'])),
            'leader2_photo' => $leader2Photo,
            'leader2_eyebrow' => trim((string) $request->input('leader2_eyebrow', $current['leadership']['leader2_eyebrow'])),
            'leader2_headline' => trim((string) $request->input('leader2_headline', $current['leadership']['leader2_headline'])),
            'leader2_p1' => trim((string) $request->raw('leader2_p1', $current['leadership']['leader2_p1'])),
            'leader2_p2' => trim((string) $request->raw('leader2_p2', $current['leadership']['leader2_p2'])),
            'leader2_p3' => trim((string) $request->raw('leader2_p3', $current['leadership']['leader2_p3'])),
        ];

        // 6. Our Capabilities (4 items)
        $capabilitiesItems = [];
        for ($i = 0; $i < 4; $i++) {
            $capabilitiesItems[] = [
                'tag' => trim((string) $request->input("cap_{$i}_tag", $current['capabilities']['items'][$i]['tag'] ?? '')),
                'desc' => trim((string) $request->input("cap_{$i}_desc", $current['capabilities']['items'][$i]['desc'] ?? '')),
            ];
        }

        $capabilities = [
            'eyebrow' => trim((string) $request->input('cap_eyebrow', $current['capabilities']['eyebrow'])),
            'title' => trim((string) $request->input('cap_title', $current['capabilities']['title'])),
            'subtitle' => trim((string) $request->input('cap_subtitle', $current['capabilities']['subtitle'])),
            'items' => $capabilitiesItems,
        ];

        // 7. Why Choose Us (4 items)
        $whyItems = [];
        for ($i = 0; $i < 4; $i++) {
            $whyItems[] = [
                'tag' => trim((string) $request->input("why_{$i}_tag", $current['why_choose']['items'][$i]['tag'] ?? '')),
                'title' => trim((string) $request->input("why_{$i}_title", $current['why_choose']['items'][$i]['title'] ?? '')),
                'desc' => trim((string) $request->input("why_{$i}_desc", $current['why_choose']['items'][$i]['desc'] ?? '')),
            ];
        }

        $whyChoose = [
            'eyebrow' => trim((string) $request->input('why_eyebrow', $current['why_choose']['eyebrow'])),
            'title' => trim((string) $request->input('why_title', $current['why_choose']['title'])),
            'subtitle' => trim((string) $request->input('why_subtitle', $current['why_choose']['subtitle'])),
            'items' => $whyItems,
        ];

        // 8. VIP Consultation / Site Visit
        $consultation = [
            'badge' => trim((string) $request->input('consult_badge', $current['consultation']['badge'])),
            'title' => trim((string) $request->input('consult_title', $current['consultation']['title'])),
            'subtitle' => trim((string) $request->input('consult_subtitle', $current['consultation']['subtitle'])),
            'phone_1' => trim((string) $request->input('consult_phone_1', $current['consultation']['phone_1'])),
            'phone_2' => trim((string) $request->input('consult_phone_2', $current['consultation']['phone_2'])),
        ];

        // 9. SEO Metadata
        $metaTitle = trim((string) $request->input('meta_title', $current['seo']['meta_title'] ?? 'About Us, Know About GLEAMREALTY PRIVATE LIMITED'));
        $metaDesc = trim((string) $request->input('meta_description', $current['seo']['meta_description'] ?? ''));
        $metaKeywords = trim((string) $request->input('meta_keywords', $current['seo']['meta_keywords'] ?? ''));

        $seo = [
            'meta_title' => $metaTitle,
            'meta_description' => $metaDesc,
            'meta_keywords' => $metaKeywords,
        ];

        // Persist payload to settings
        $payload = [
            'hero' => $hero,
            'overview' => $overview,
            'metrics' => $metrics,
            'principles' => $principles,
            'leadership' => $leadership,
            'capabilities' => $capabilities,
            'why_choose' => $whyChoose,
            'consultation' => $consultation,
            'seo' => $seo,
        ];

        Setting::saveAboutSections($payload);

        // Also synchronize with Page model if about-us page exists
        $existingPage = Page::findBySlug('about-us');
        if ($existingPage) {
            Page::update((int) $existingPage['id'], [
                'title' => $hero['heading'] ?: 'About Us',
                'slug' => 'about-us',
                'hero_heading' => $hero['heading'],
                'hero_subheading' => $overview['title'],
                'hero_media_type' => 'image',
                'hero_media_url' => $hero['image'],
                'content' => $existingPage['content'] ?? '',
                'meta_title' => $metaTitle,
                'meta_description' => $metaDesc,
                'meta_keywords' => $metaKeywords,
                'is_published' => 1,
            ]);
        }

        $this->flash('success', 'About Us content, images, and leadership profiles updated successfully!');
        return $this->redirect(url('/admin/about'));
    }
}
