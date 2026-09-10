<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\HeroSlide;
use App\Models\Project;
use App\Models\Setting;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;
use Core\Uploader;

/**
 * Class HeroController
 *
 * Dedicated administration module for homepage hero section content,
 * editorial headlines, background atmosphere, architectural slides, CTAs, and trust metrics.
 */
class HeroController extends Controller
{
    public function index(): Response
    {
        $hero = Setting::getHero();
        $metrics = Setting::getMetrics();
        $slides = HeroSlide::all();
        $projects = Project::all();

        return $this->adminView('admin/hero/index', [
            'seo_title' => 'Homepage Hero Section Manager',
            'hero' => $hero,
            'metrics' => $metrics,
            'slides' => $slides,
            'projects' => $projects,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/hero'));
        }

        // 1. Slideshow Global Controls & Atmosphere
        $isEnabled = (int) $request->input('is_enabled', 1) === 1;
        $autoplayInterval = max(3, min(20, (int) $request->input('autoplay_interval', 6)));
        $rotationStyle = trim((string) $request->input('rotation_style', '3d-page-turn'));
        $overlayOpacity = max(10, min(90, (int) $request->input('overlay_opacity', 45)));
        $trustSealText = trim((string) $request->input('trust_seal_text', '100% MVDA & RERA Approved • Immediate Freehold Registry • 3,000+ Happy Families'));
        $badgeText = trim((string) $request->input('badge_text', '✦ BRAJ BHUMI PRIVATE ESTATES • VRINDAVAN & MATHURA'));

        // 2. Save Slideshow Configuration in Settings
        Setting::saveHero([
            'is_enabled' => $isEnabled,
            'autoplay_interval' => $autoplayInterval,
            'rotation_style' => $rotationStyle,
            'overlay_opacity' => $overlayOpacity,
            'trust_seal_text' => $trustSealText,
            'badge_text' => $badgeText,
        ]);

        // 6. Process Existing Slides Updates
        $existingSlideIds = (array) $request->input('slide_ids', []);
        foreach ($existingSlideIds as $sId) {
            $slideId = (int) $sId;
            if ($slideId <= 0) continue;

            $existingImg = trim((string) $request->input("slide_image_{$slideId}", ''));
            $file = $request->file("slide_file_{$slideId}");
            if ($file && !empty($file['tmp_name'])) {
                $uploaded = Uploader::upload($file, 'hero');
                if ($uploaded) {
                    $existingImg = media_url($uploaded);
                }
            }

            $projectId = $request->input("slide_project_id_{$slideId}");
            $projectId = (!empty($projectId) && (int) $projectId > 0) ? (int) $projectId : null;

            $slideTitle = trim((string) $request->input("slide_title_{$slideId}", ''));
            if ($slideTitle === '' && empty($existingImg)) {
                continue;
            }

            HeroSlide::update($slideId, [
                'project_id' => $projectId,
                'title' => $slideTitle ?: 'Luxury Braj Sanctum',
                'location_text' => trim((string) $request->input("slide_location_{$slideId}", '')),
                'description' => trim((string) $request->input("slide_description_{$slideId}", '')),
                'badge_text' => trim((string) $request->input("slide_badge_{$slideId}", 'Phase II Now Open')),
                'featured_label' => trim((string) $request->input("slide_featured_label_{$slideId}", 'Featured Sanctuary')),
                'image_url' => $existingImg ?: asset('uploads/hero/hero-braj-sanctuary.webp'),
                'video_url' => trim((string) $request->input("slide_video_{$slideId}", '')) ?: null,
                'price_text' => trim((string) $request->input("slide_price_{$slideId}", '')),
                'cta_text' => trim((string) $request->input("slide_cta_text_{$slideId}", 'View Sanctuary')),
                'cta_url' => trim((string) $request->input("slide_cta_url_{$slideId}", '#residences')),
                'sort_order' => (int) $request->input("slide_sort_{$slideId}", 0),
                'is_active' => (int) $request->input("slide_active_{$slideId}", 1),
            ]);
        }

        // 7. Check if New Slide Was Submitted
        $newTitle = trim((string) $request->input('new_slide_title', ''));
        $newFile = $request->file('new_slide_file');
        $newImg = trim((string) $request->input('new_slide_image', ''));

        if ($newFile && !empty($newFile['tmp_name'])) {
            $uploadedNew = Uploader::upload($newFile, 'hero');
            if ($uploadedNew) {
                $newImg = media_url($uploadedNew);
            }
        }

        if (!empty($newTitle) || !empty($newImg)) {
            $newProjectId = $request->input('new_slide_project_id');
            $newProjectId = (!empty($newProjectId) && (int) $newProjectId > 0) ? (int) $newProjectId : null;

            HeroSlide::create([
                'project_id' => $newProjectId,
                'title' => $newTitle ?: 'Flagship Braj Sanctum',
                'location_text' => trim((string) $request->input('new_slide_location', 'Vrindavan • Mathura')),
                'description' => trim((string) $request->input('new_slide_description', 'Freehold Sanctuaries')),
                'badge_text' => trim((string) $request->input('new_slide_badge', 'Now Launching')),
                'featured_label' => trim((string) $request->input('new_slide_featured_label', 'Featured Sanctuary')),
                'image_url' => $newImg ?: asset('uploads/hero/hero-braj-sanctuary.webp'),
                'video_url' => trim((string) $request->input('new_slide_video', '')) ?: null,
                'price_text' => trim((string) $request->input('new_slide_price', 'Price on Application')),
                'cta_text' => trim((string) $request->input('new_slide_cta_text', 'View Sanctuary')),
                'cta_url' => trim((string) $request->input('new_slide_cta_url', '#residences')),
                'sort_order' => (int) $request->input('new_slide_sort', 10),
                'is_active' => 1,
            ]);
        }

        // 8. Process Metrics (4 items)
        $metrics = [];
        for ($m = 0; $m < 4; $m++) {
            $val = trim((string) $request->input("metric_value_{$m}", ''));
            $lbl = trim((string) $request->input("metric_label_{$m}", ''));
            if ($val !== '' || $lbl !== '') {
                $metrics[] = [
                    'value' => $val,
                    'label' => $lbl,
                ];
            }
        }
        if (!empty($metrics)) {
            Setting::saveMetrics($metrics);
        }

        $this->flash('success', 'Homepage Hero Section & Architectural Showcase updated successfully.');
        return $this->redirect(url('/admin/hero'));
    }

    public function deleteSlide(Request $request, string $id): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired.');
            return $this->redirect(url('/admin/hero'));
        }

        $slideId = (int) $id;
        if ($slideId > 0) {
            HeroSlide::delete($slideId);
            $this->flash('success', 'Showcase slide removed successfully.');
        }

        return $this->redirect(url('/admin/hero'));
    }
}
