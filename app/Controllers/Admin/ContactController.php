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
 * Class ContactController
 *
 * Dedicated administration CMS module for managing all dynamic content,
 * imagery, office details, enquiry form text, trust badges, Google Maps embed,
 * and SEO metadata on the Contact Us page.
 */
class ContactController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::getContactSections();

        return $this->adminView('admin/contact/index', [
            'seo_title' => 'Contact Us Content CMS',
            'sections' => $sections,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/contact'));
        }

        $current = Setting::getContactSections();

        // 1. Hero Banner Visual & Text
        $heroImage = $current['hero']['image'] ?? 'uploads/hero/hero-braj-sanctuary.webp';
        if (!empty($_FILES['hero_image']['name']) && $_FILES['hero_image']['error'] === UPLOAD_ERR_OK) {
            $uploadedHero = Uploader::image($_FILES['hero_image'], 'public/uploads/hero');
            if ($uploadedHero) {
                $heroImage = $uploadedHero;
            }
        } elseif ($request->input('hero_image_manual')) {
            $heroImage = trim((string) $request->input('hero_image_manual'));
        }

        $hero = [
            'badge' => trim((string) $request->input('hero_badge', $current['hero']['badge'] ?? 'Gleamrealty Private Limited • Vrindavan & Mathura')),
            'heading' => trim((string) $request->input('hero_heading', $current['hero']['heading'] ?? 'Contact us')),
            'subheading' => trim((string) $request->input('hero_subheading', $current['hero']['subheading'] ?? '')),
            'image' => $heroImage,
        ];

        // 2. Enquiry Form Settings
        $form = [
            'eyebrow' => trim((string) $request->input('form_eyebrow', $current['form']['eyebrow'] ?? '✦ Instant Response Guarantee')),
            'title' => trim((string) $request->input('form_title', $current['form']['title'] ?? 'Find Your Dream Property')),
            'subtitle' => trim((string) $request->input('form_subtitle', $current['form']['subtitle'] ?? '')),
            'button_text' => trim((string) $request->input('form_button_text', $current['form']['button_text'] ?? 'Submit Enquiry')),
        ];

        // 3. Advisory Office Details & Hotline
        $address = trim((string) $request->input('office_address', $current['office']['address'] ?? ''));
        $office = [
            'badge' => trim((string) $request->input('office_badge', $current['office']['badge'] ?? '✦ Registered & Site Presence')),
            'title' => trim((string) $request->input('office_title', $current['office']['title'] ?? 'Vrindavan Gleamrealty Private Limited')),
            'address' => $address,
            'phone_1' => trim((string) $request->input('office_phone_1', $current['office']['phone_1'] ?? '+91 9871731303')),
            'phone_2' => trim((string) $request->input('office_phone_2', $current['office']['phone_2'] ?? '+91 7409767452')),
            'whatsapp' => trim((string) $request->input('office_whatsapp', $current['office']['whatsapp'] ?? '+91 9871731303')),
            'email' => trim((string) $request->input('office_email', $current['office']['email'] ?? 'contact@gleamrealty.com')),
            'hours' => trim((string) $request->input('office_hours', $current['office']['hours'] ?? 'Mon – Sun: 9:30 AM – 7:30 PM')),
        ];

        // 4. Trust Badges Strip (3 items)
        $trustBadges = [];
        for ($i = 0; $i < 3; $i++) {
            $trustBadges[] = [
                'val' => trim((string) $request->input("trust_badge_{$i}_val", $current['trust_badges'][$i]['val'] ?? '')),
                'label' => trim((string) $request->input("trust_badge_{$i}_label", $current['trust_badges'][$i]['label'] ?? '')),
            ];
        }

        // 5. Interactive Google Map & Directions
        $defaultMapEmbed = 'https://maps.google.com/maps?q=' . rawurlencode($address) . '&t=&z=16&ie=UTF8&iwloc=&output=embed';
        $defaultDirections = 'https://maps.google.com/?q=' . rawurlencode($address);

        $map = [
            'title' => trim((string) $request->input('map_title', $current['map']['title'] ?? 'GLEAMREALTY PRIVATE LIMITED • Suncity Anantam Kunj')),
            'embed_url' => trim((string) $request->input('map_embed_url', $current['map']['embed_url'] ?? $defaultMapEmbed)),
            'directions_url' => trim((string) $request->input('map_directions_url', $current['map']['directions_url'] ?? $defaultDirections)),
        ];

        // 6. Additional Editorial / About Content
        $editorial = [
            'title' => trim((string) $request->input('editorial_title', $current['editorial']['title'] ?? 'About Our Advisory')),
            'content' => trim((string) $request->raw('editorial_content', $current['editorial']['content'] ?? '')),
        ];

        // 7. Custom SEO Metadata
        $seo = [
            'meta_title' => trim((string) $request->input('meta_title', $current['seo']['meta_title'] ?? '')),
            'meta_description' => trim((string) $request->input('meta_description', $current['seo']['meta_description'] ?? '')),
            'meta_keywords' => trim((string) $request->input('meta_keywords', $current['seo']['meta_keywords'] ?? '')),
        ];

        $payload = [
            'hero' => $hero,
            'form' => $form,
            'office' => $office,
            'trust_badges' => $trustBadges,
            'map' => $map,
            'editorial' => $editorial,
            'seo' => $seo,
        ];

        Setting::saveContactSections($payload);

        $this->flash('success', 'Contact Us page content, office details, and images updated successfully.');
        return $this->redirect(url('/admin/contact'));
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

        $uploaded = Uploader::image($file, 'public/uploads/contact');
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
