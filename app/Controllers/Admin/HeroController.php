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
 * Class HeroController
 *
 * Dedicated administration module for homepage hero section content:
 * Background Haveli Palace visual, grand headlines,
 * dual CTAs (Explore + YouTube video modal), and 3 bottom feature cards.
 */
class HeroController extends Controller
{
    public function index(): Response
    {
        $hero = Setting::getHero();

        return $this->adminView('admin/hero/index', [
            'seo_title' => 'Hero Section Manager',
            'hero' => $hero,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/hero'));
        }

        $current = Setting::getHero();

        // 1. Background Image Upload / Input
        $bgImage = trim((string) $request->input('bg_image', ''));
        $bgFile = $request->file('bg_file');
        if ($bgFile && !empty($bgFile['name'])) {
            if ($bgFile['error'] === UPLOAD_ERR_OK) {
                $uploaded = Uploader::image($bgFile, 'public/uploads/hero');
                if ($uploaded) {
                    $bgImage = $uploaded;
                } else {
                    $this->flash('error', 'Failed to upload background image. Invalid file format or size.');
                    return $this->redirect(url('/admin/hero'));
                }
            } else {
                $this->flash('error', 'Background image upload failed. The file might exceed the server upload limit (e.g. > 2MB). Please upload a smaller image.');
                return $this->redirect(url('/admin/hero'));
            }
        }
        if (empty($bgImage)) {
            $bgImage = !empty($current['bg_image']) ? $current['bg_image'] : 'uploads/hero/hero_braj_haveli_hd.jpg';
        }

        // 2. Headlines & Subtitles
        $eyebrow = trim((string) $request->input('eyebrow', $current['eyebrow'] ?? 'TIMELESS HERITAGE. MODERN LIVING.'));
        $titleMain = trim((string) $request->input('title_main', $current['title_main'] ?? 'Royal Braj Haveli'));
        $titleAccent = trim((string) $request->input('title_accent', ''));
        if (empty($titleAccent)) {
            $titleAccent = !empty($current['title_accent']) ? $current['title_accent'] : 'Residences';
        }
        $subtitle = trim((string) $request->input('subtitle', $current['subtitle'] ?? ''));
        $scriptAccent = '';

        // 3. Dual Action CTAs
        $ctaText = trim((string) $request->input('cta_text', $current['cta_text'] ?? 'EXPLORE PROJECT'));
        $ctaLink = trim((string) $request->input('cta_link', $current['cta_link'] ?? '#sanctuaries'));
        $videoText = trim((string) $request->input('video_text', $current['video_text'] ?? 'WATCH VIDEO'));
        $videoUrl = $this->formatYoutubeEmbed((string) $request->input('video_url', $current['video_url'] ?? ''));

        // 4. 3 Bottom Glassmorphic Feature Cards
        $cards = $current['cards'] ?? [];
        for ($i = 0; $i < 3; $i++) {
            $cardTitle = trim((string) $request->input("card_{$i}_title", $cards[$i]['title'] ?? ''));
            $cardSub = trim((string) $request->input("card_{$i}_sub", $cards[$i]['sub'] ?? ''));
            $cardImg = trim((string) $request->input("card_{$i}_image", $cards[$i]['image'] ?? ''));

            $cardFile = $request->file("card_{$i}_file");
            if ($cardFile && !empty($cardFile['tmp_name']) && $cardFile['error'] === UPLOAD_ERR_OK) {
                $uploadedCard = Uploader::image($cardFile, 'public/uploads/hero');
                if ($uploadedCard) {
                    $cardImg = $uploadedCard;
                }
            }

            $cards[$i] = [
                'image' => $cardImg,
                'title' => $cardTitle,
                'sub' => $cardSub,
            ];
        }

        // Save All Hero Settings
        Setting::saveHero([
            'is_enabled' => (int) $request->input('is_enabled', 1) === 1,
            'bg_image' => $bgImage,
            'eyebrow' => $eyebrow,
            'title_main' => $titleMain,
            'title_accent' => $titleAccent,
            'subtitle' => $subtitle,
            'script_accent' => $scriptAccent,
            'cta_text' => $ctaText,
            'cta_link' => $ctaLink,
            'video_text' => $videoText,
            'video_url' => $videoUrl,
            'cards' => $cards,
        ]);

        $this->flash('success', 'Homepage Hero Showcase has been successfully updated and is now live.');
        return $this->redirect(url('/admin/hero'));
    }

    /**
     * Convert YouTube standard watch URL or short URL to embed format.
     */
    private function formatYoutubeEmbed(string $url): string
    {
        $url = trim($url);
        if (empty($url)) {
            return 'https://www.youtube.com/embed/6_3m6j9f1L0?autoplay=1&mute=0';
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
