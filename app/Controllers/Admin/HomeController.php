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
 * Dedicated administration module for editing homepage content sections below the hero:
 * 5 Trust Metrics, About Royal Braj Haveli (Story, 4 Features & Featured Video Card),
 * 4 Photographic Highlights, Properties & News Headers, and Enquiry Banner.
 */
class HomeController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::getHomeSections();
        $allProjects = \App\Models\Project::all();

        return $this->adminView('admin/home/index', [
            'seo_title' => 'Homepage Content Manager',
            'sections' => $sections,
            'all_projects' => $allProjects,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/home'));
        }

        $current = Setting::getHomeSections();

        // 1. Trust & Performance Metrics Ribbon (5 items)
        $metrics = [
            'm1_val' => trim((string) $request->input('m1_val', $current['metrics']['m1_val'] ?? '250+')),
            'm1_sub' => trim((string) $request->input('m1_sub', $current['metrics']['m1_sub'] ?? 'Happy Families')),
            'm2_val' => trim((string) $request->input('m2_val', $current['metrics']['m2_val'] ?? '50+ Acres')),
            'm2_sub' => trim((string) $request->input('m2_sub', $current['metrics']['m2_sub'] ?? 'Land Bank')),
            'm3_val' => trim((string) $request->input('m3_val', $current['metrics']['m3_val'] ?? '20+ World Class')),
            'm3_sub' => trim((string) $request->input('m3_sub', $current['metrics']['m3_sub'] ?? 'Amenities')),
            'm4_val' => trim((string) $request->input('m4_val', $current['metrics']['m4_val'] ?? '100%')),
            'm4_sub' => trim((string) $request->input('m4_sub', $current['metrics']['m4_sub'] ?? 'Clear Titles')),
            'm5_val' => trim((string) $request->input('m5_val', $current['metrics']['m5_val'] ?? 'Prime')),
            'm5_sub' => trim((string) $request->input('m5_sub', $current['metrics']['m5_sub'] ?? 'Location')),
        ];

        // 2. About Royal Braj Haveli Section & Featured Video Card
        $aboutFeatures = [];
        for ($f = 0; $f < 4; $f++) {
            $aboutFeatures[] = [
                'title' => trim((string) $request->input("feature_{$f}_title", $current['about']['features'][$f]['title'] ?? '')),
                'desc' => trim((string) $request->input("feature_{$f}_desc", $current['about']['features'][$f]['desc'] ?? '')),
                'icon' => trim((string) $request->input("feature_{$f}_icon", $current['about']['features'][$f]['icon'] ?? 'lotus')),
            ];
        }

        $videoCardImage = trim((string) $request->input('video_card_image', $current['about']['video_card']['image'] ?? 'uploads/hero/vrindavan_gate_hd.jpg'));
        $videoCardFile = $request->file('video_card_file');
        if ($videoCardFile && !empty($videoCardFile['tmp_name']) && $videoCardFile['error'] === UPLOAD_ERR_OK) {
            $uploaded = Uploader::image($videoCardFile, 'public/uploads/home');
            if ($uploaded) {
                $videoCardImage = $uploaded;
            }
        }

        $about = [
            'eyebrow' => trim((string) $request->input('about_eyebrow', $current['about']['eyebrow'] ?? 'ABOUT ROYAL BRAJ HAVELI')),
            'title' => trim((string) $request->input('about_title', $current['about']['title'] ?? 'The Sanctity of Braj Bhumi')),
            'subtitle' => trim((string) $request->input('about_subtitle', $current['about']['subtitle'] ?? 'A home where spirituality meets modern living')),
            'p1' => trim((string) $request->input('about_p1', $current['about']['p1'] ?? '')),
            'features' => $aboutFeatures,
            'video_card' => [
                'image' => $videoCardImage,
                'badge' => trim((string) $request->input('video_card_badge', $current['about']['video_card']['badge'] ?? 'Featured Video')),
                'title' => trim((string) $request->input('video_card_title', $current['about']['video_card']['title'] ?? 'Shri Vrinda Awaits You')),
                'desc' => trim((string) $request->input('video_card_desc', $current['about']['video_card']['desc'] ?? '')),
                'video_url' => $this->formatYoutubeEmbed((string) $request->input('video_card_url', $current['about']['video_card']['video_url'] ?? '')),
            ],
        ];

        // 3. Our Highlights (4 Photographic Category Cards)
        $highlightCards = $current['highlights']['cards'] ?? [];
        $categories = ['commercial', 'villa', 'plot', 'flat'];
        foreach ($categories as $cat) {
            $catTitle = trim((string) $request->input("highlight_{$cat}_title", $highlightCards[$cat]['title'] ?? strtoupper($cat)));
            $catLink = trim((string) $request->input("highlight_{$cat}_link", $highlightCards[$cat]['link'] ?? '/projects'));
            $catImage = trim((string) $request->input("highlight_{$cat}_image", $highlightCards[$cat]['image'] ?? ''));

            $catFile = $request->file("highlight_{$cat}_file");
            if ($catFile && !empty($catFile['tmp_name']) && $catFile['error'] === UPLOAD_ERR_OK) {
                $uploadedCat = Uploader::image($catFile, 'public/uploads/projects');
                if ($uploadedCat) {
                    $catImage = $uploadedCat;
                }
            }

            $highlightCards[$cat] = [
                'title' => $catTitle,
                'link' => $catLink,
                'image' => $catImage,
            ];
        }

        $highlights = [
            'eyebrow' => trim((string) $request->input('highlights_eyebrow', $current['highlights']['eyebrow'] ?? 'OUR HIGHLIGHTS')),
            'title' => trim((string) $request->input('highlights_title', $current['highlights']['title'] ?? 'A glimpse of what makes Royal Braj Haveli special')),
            'btn_text' => trim((string) $request->input('highlights_btn_text', $current['highlights']['btn_text'] ?? 'VIEW ALL PROJECTS')),
            'btn_link' => trim((string) $request->input('highlights_btn_link', $current['highlights']['btn_link'] ?? '/projects')),
            'cards' => $highlightCards,
        ];

        // 4. Properties Section Header
        $propertiesHeader = [
            'eyebrow' => trim((string) $request->input('prop_eyebrow', $current['properties_header']['eyebrow'] ?? 'EXPLORE OUR PROPERTIES')),
            'title' => trim((string) $request->input('prop_title', $current['properties_header']['title'] ?? 'Sanctuaries for the Discerning')),
            'subtitle' => trim((string) $request->input('prop_subtitle', $current['properties_header']['subtitle'] ?? '')),
        ];

        // 5. News & Updates Section Header
        $newsHeader = [
            'eyebrow' => trim((string) $request->input('news_eyebrow', $current['news_header']['eyebrow'] ?? 'LATEST NEWS & UPDATES')),
            'title' => trim((string) $request->input('news_title', $current['news_header']['title'] ?? 'Market Intelligence & Project Milestones')),
            'btn_text' => trim((string) $request->input('news_btn_text', $current['news_header']['btn_text'] ?? 'VIEW ALL UPDATES')),
            'btn_link' => trim((string) $request->input('news_btn_link', $current['news_header']['btn_link'] ?? '/blog')),
        ];

        // 6. Ready to Begin Enquiry Banner
        $watermarkImage = trim((string) $request->input('watermark_image', $current['enquiry_banner']['watermark_image'] ?? 'uploads/projects/temple_watermark.jpg'));
        $watermarkFile = $request->file('watermark_file');
        if ($watermarkFile && !empty($watermarkFile['tmp_name']) && $watermarkFile['error'] === UPLOAD_ERR_OK) {
            $uploadedWatermark = Uploader::image($watermarkFile, 'public/uploads/projects');
            if ($uploadedWatermark) {
                $watermarkImage = $uploadedWatermark;
            }
        }

        $enquiryBanner = [
            'watermark_image' => $watermarkImage,
            'eyebrow' => trim((string) $request->input('enquiry_eyebrow', $current['enquiry_banner']['eyebrow'] ?? 'READY TO BEGIN?')),
            'title' => trim((string) $request->input('enquiry_title', $current['enquiry_banner']['title'] ?? "Enquire About<br>Your Dream Property")),
            'subtitle' => trim((string) $request->input('enquiry_subtitle', $current['enquiry_banner']['subtitle'] ?? 'Fill out the form and our team will get in touch with you shortly.')),
            'check_1' => trim((string) $request->input('enquiry_check_1', $current['enquiry_banner']['check_1'] ?? 'Quick Response')),
            'check_2' => trim((string) $request->input('enquiry_check_2', $current['enquiry_banner']['check_2'] ?? 'Expert Assistance')),
            'check_3' => trim((string) $request->input('enquiry_check_3', $current['enquiry_banner']['check_3'] ?? 'No Obligation')),
        ];

        // Featured Project IDs for Homepage
        $rawFeat = $request->post('featured_project_ids', []);
        $featuredProjectIds = is_array($rawFeat) ? array_values(array_filter(array_map('intval', $rawFeat))) : [];

        // Save All Merged Sections
        Setting::saveHomeSections([
            'metrics' => $metrics,
            'about' => $about,
            'highlights' => $highlights,
            'properties_header' => $propertiesHeader,
            'featured_project_ids' => $featuredProjectIds,
            'news_header' => $newsHeader,
            'enquiry_banner' => $enquiryBanner,
        ]);

        $this->flash('success', 'Homepage content sections have been successfully updated and are now live on the website.');
        return $this->redirect(url('/admin/home'));
    }

    /**
     * Format YouTube standard or short URL to embed format.
     */
    private function formatYoutubeEmbed(string $url): string
    {
        $url = trim($url);
        if (empty($url)) {
            return 'https://www.youtube.com/embed/6_3m6j9f1L0?autoplay=1';
        }
        if (str_contains($url, 'youtube.com/embed/')) {
            return $url;
        }
        if (preg_match('~(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})~', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?autoplay=1';
        }
        return $url;
    }
}
