<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Setting;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;
use Core\Uploader;

/**
 * Class HomeController
 *
 * Dedicated administration module for editing homepage content sections (except hero section).
 * Covers Trust Metrics, Sanctity of Braj Advisory, Asset Showcase Cards, Projects Header,
 * Growth Corridors, and VIP Consultation Section.
 */
class HomeController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::getHomeSections();

        return $this->adminView('admin/home/index', [
            'seo_title' => 'Homepage Content Manager',
            'sections' => $sections,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/home'));
        }

        $current = Setting::getHomeSections();

        // 1. Trust Metrics Ribbon
        $metrics = [
            'm1_val' => trim((string) $request->input('m1_val', $current['metrics']['m1_val'])),
            'm1_title' => trim((string) $request->input('m1_title', $current['metrics']['m1_title'])),
            'm1_sub' => trim((string) $request->input('m1_sub', $current['metrics']['m1_sub'])),
            'm2_val' => trim((string) $request->input('m2_val', $current['metrics']['m2_val'])),
            'm2_title' => trim((string) $request->input('m2_title', $current['metrics']['m2_title'])),
            'm2_sub' => trim((string) $request->input('m2_sub', $current['metrics']['m2_sub'])),
            'm3_val' => trim((string) $request->input('m3_val', $current['metrics']['m3_val'])),
            'm3_title' => trim((string) $request->input('m3_title', $current['metrics']['m3_title'])),
            'm3_sub' => trim((string) $request->input('m3_sub', $current['metrics']['m3_sub'])),
            'm4_val' => trim((string) $request->input('m4_val', $current['metrics']['m4_val'])),
            'm4_title' => trim((string) $request->input('m4_title', $current['metrics']['m4_title'])),
            'm4_sub' => trim((string) $request->input('m4_sub', $current['metrics']['m4_sub'])),
        ];

        // 2. The Sanctity of Braj (Advisory & Heritage)
        $pillars = [];
        for ($i = 0; $i < 4; $i++) {
            $pillars[] = [
                'title' => trim((string) $request->input("pillar_{$i}_title", $current['philosophy']['pillars'][$i]['title'] ?? '')),
                'desc' => trim((string) $request->input("pillar_{$i}_desc", $current['philosophy']['pillars'][$i]['desc'] ?? '')),
            ];
        }

        $showcaseImage = $current['philosophy']['showcase_image'] ?? '';
        if (!empty($_FILES['showcase_image']['name']) && $_FILES['showcase_image']['error'] === UPLOAD_ERR_OK) {
            $uploaded = Uploader::image($_FILES['showcase_image'], 'public/uploads/home');
            if ($uploaded) {
                $showcaseImage = $uploaded;
            }
        }

        $philosophy = [
            'eyebrow' => trim((string) $request->input('phil_eyebrow', $current['philosophy']['eyebrow'])),
            'title' => trim((string) $request->input('phil_title', $current['philosophy']['title'])),
            'subtitle' => trim((string) $request->input('phil_subtitle', $current['philosophy']['subtitle'])),
            'quote' => trim((string) $request->input('phil_quote', $current['philosophy']['quote'])),
            'quote_author' => trim((string) $request->input('phil_quote_author', $current['philosophy']['quote_author'])),
            'p1' => trim((string) $request->input('phil_p1', $current['philosophy']['p1'])),
            'p2' => trim((string) $request->input('phil_p2', $current['philosophy']['p2'])),
            'pillars' => $pillars,
            'showcase_badge' => trim((string) $request->input('showcase_badge', $current['philosophy']['showcase_badge'])),
            'showcase_title' => trim((string) $request->input('showcase_title', $current['philosophy']['showcase_title'])),
            'showcase_desc' => trim((string) $request->input('showcase_desc', $current['philosophy']['showcase_desc'])),
            'showcase_price' => trim((string) $request->input('showcase_price', $current['philosophy']['showcase_price'])),
            'showcase_link' => trim((string) $request->input('showcase_link', $current['philosophy']['showcase_link'])),
            'showcase_image' => $showcaseImage,
        ];

        // 3. Asset Highlights (3 Columns)
        $assetHighlights = [
            'h1' => trim((string) $request->input('highlight_1', $current['asset_highlights']['h1'])),
            'h2' => trim((string) $request->input('highlight_2', $current['asset_highlights']['h2'])),
            'h3' => trim((string) $request->input('highlight_3', $current['asset_highlights']['h3'])),
        ];

        // 4. Asset Cards (Commercial, Villa, Plot, Flat)
        $assetCards = $current['asset_cards'];
        $cardKeys = ['commercial', 'villa', 'plot', 'flat'];

        foreach ($cardKeys as $k) {
            $titleInput = trim((string) $request->input("card_{$k}_title", $current['asset_cards'][$k]['title']));
            $subInput = trim((string) $request->input("card_{$k}_sub", $current['asset_cards'][$k]['subtitle']));
            $linkInput = trim((string) $request->input("card_{$k}_link", $current['asset_cards'][$k]['link']));

            $cardImage = $current['asset_cards'][$k]['image'];
            if (!empty($_FILES["card_{$k}_image"]['name']) && $_FILES["card_{$k}_image"]['error'] === UPLOAD_ERR_OK) {
                $uploaded = Uploader::image($_FILES["card_{$k}_image"], 'public/uploads/home');
                if ($uploaded) {
                    $cardImage = $uploaded;
                }
            }

            $assetCards[$k] = [
                'title' => $titleInput,
                'subtitle' => $subInput,
                'link' => $linkInput,
                'image' => $cardImage,
            ];
        }

        // 5. Curated Sanctuaries / Projects Section Header
        $projectsSection = [
            'eyebrow' => trim((string) $request->input('proj_eyebrow', $current['projects_section']['eyebrow'])),
            'title' => trim((string) $request->input('proj_title', $current['projects_section']['title'])),
            'subtitle' => trim((string) $request->input('proj_subtitle', $current['projects_section']['subtitle'])),
        ];

        // 6. Growth Corridors / Locations Section Header
        $locationsSection = [
            'eyebrow' => trim((string) $request->input('loc_eyebrow', $current['locations_section']['eyebrow'])),
            'title' => trim((string) $request->input('loc_title', $current['locations_section']['title'])),
            'subtitle' => trim((string) $request->input('loc_subtitle', $current['locations_section']['subtitle'])),
        ];

        // 7. VIP Site Visit & Consultation Section
        $consultationSection = [
            'eyebrow' => trim((string) $request->input('consult_eyebrow', $current['consultation_section']['eyebrow'])),
            'title' => trim((string) $request->input('consult_title', $current['consultation_section']['title'])),
            'subtitle' => trim((string) $request->input('consult_subtitle', $current['consultation_section']['subtitle'])),
            'desk_note' => trim((string) $request->input('consult_desk_note', $current['consultation_section']['desk_note'])),
        ];

        // Save All Merged Sections
        Setting::saveHomeSections([
            'metrics' => $metrics,
            'philosophy' => $philosophy,
            'asset_highlights' => $assetHighlights,
            'asset_cards' => $assetCards,
            'projects_section' => $projectsSection,
            'locations_section' => $locationsSection,
            'consultation_section' => $consultationSection,
        ]);

        $this->flash('success', 'Homepage content sections have been successfully updated and are now live on the website.');
        return $this->redirect(url('/admin/home'));
    }
}
