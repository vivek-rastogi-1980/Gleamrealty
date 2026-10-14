<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Setting;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;

class LocationVrindavanController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::get('location_vrindavan_sections', []);
        
        if (empty($sections)) {
            $sections = [
                'overview_content' => '<p>To establish a home in Vrindavan is to secure a timeless family legacy in the spiritual capital of Braj. Gleamrealty curates verified, freehold plotted communities and luxury villas that harmonize Vedic architecture with contemporary gated comforts, serene Kadamba groves, and round-the-clock security.</p>',
                'highlight_1_title' => 'Vedic Sacred Soil',
                'highlight_1_desc' => 'Walking and short drive distance to Bankey Bihari, Prem Mandir, and Chandrodaya Temple.',
                'highlight_2_title' => '100% MVDA & RERA Verified',
                'highlight_2_desc' => 'Fully sanctioned layouts with clear titles and hassle-free registry assistance.',
                'highlight_3_title' => 'Chhatikara VIP Corridor',
                'highlight_3_desc' => 'Direct four-lane access connecting Vrindavan smoothly to NH-19 and Delhi NCR.',
                'highlight_4_title' => 'High Appreciation & Peace',
                'highlight_4_desc' => 'Unmatched spiritual lifestyle combined with rapid 18-24% capital appreciation.',
            ];
        }
        
        $allProjects = \App\Models\Project::all();
        
        return $this->adminView('admin/location_vrindavan/index', [
            'seo_title' => 'Vrindavan Communities CMS',
            'sections' => $sections,
            'allProjects' => $allProjects,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/location-vrindavan'));
        }

        $payload = [
            'overview_content' => (string) $request->raw('overview_content', ''),
        ];

        // Process highlights
        for ($i = 1; $i <= 4; $i++) {
            $payload["highlight_{$i}_title"] = trim((string) $request->input("highlight_{$i}_title", ''));
            $payload["highlight_{$i}_desc"] = trim((string) $request->input("highlight_{$i}_desc", ''));
        }

        // Process selected projects (array of IDs)
        $selectedProjects = $_POST['selected_projects'] ?? [];
        if (!is_array($selectedProjects)) {
            $selectedProjects = [];
        }
        $payload['selected_projects'] = array_map('intval', $selectedProjects);

        Setting::set('location_vrindavan_sections', $payload);

        // Also update standard page content
        $page = \App\Models\Page::findBySlug('location/vrindavan');
        if (!$page) {
            $page = \App\Models\Page::findBySlug('vrindavan');
        }
        if ($page) {
            $page['content'] = $payload['overview_content'];
            \App\Models\Page::update((int)$page['id'], $page);
        }

        $this->flash('success', 'Vrindavan Communities CMS updated successfully.');
        return $this->redirect(url('/admin/location-vrindavan'));
    }
}
