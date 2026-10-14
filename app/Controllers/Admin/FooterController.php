<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Setting;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;

class FooterController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::getFooterSections();

        return $this->adminView('admin/footer/index', [
            'seo_title' => 'Footer Content CMS',
            'sections' => $sections,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/footer'));
        }

        $current = Setting::getFooterSections();

        $data = [
            'social' => [
                'facebook' => trim((string) $request->input('social_facebook', $current['social']['facebook'] ?? '')),
                'instagram' => trim((string) $request->input('social_instagram', $current['social']['instagram'] ?? '')),
                'linkedin' => trim((string) $request->input('social_linkedin', $current['social']['linkedin'] ?? '')),
                'youtube' => trim((string) $request->input('social_youtube', $current['social']['youtube'] ?? '')),
            ],
            'contact' => [
                'address' => trim((string) $request->input('contact_address', $current['contact']['address'] ?? '')),
                'map_url' => trim((string) $request->input('contact_map_url', $current['contact']['map_url'] ?? '')),
                'phone1' => trim((string) $request->input('contact_phone1', $current['contact']['phone1'] ?? '')),
                'phone2' => trim((string) $request->input('contact_phone2', $current['contact']['phone2'] ?? '')),
                'email' => trim((string) $request->input('contact_email', $current['contact']['email'] ?? '')),
            ],
            'bottom' => [
                'copyright_text' => trim((string) $request->input('bottom_copyright', $current['bottom']['copyright_text'] ?? '')),
                'script_text' => trim((string) $request->input('bottom_script', $current['bottom']['script_text'] ?? '')),
            ]
        ];

        // Process quick links
        $quickLinks = [];
        $qlLabels = $_POST['ql_label'] ?? [];
        $qlUrls = $_POST['ql_url'] ?? [];
        if (is_array($qlLabels)) {
            foreach ($qlLabels as $idx => $lbl) {
                if (!empty($lbl)) {
                    $quickLinks[] = [
                        'label' => trim((string)$lbl),
                        'url' => trim((string)($qlUrls[$idx] ?? ''))
                    ];
                }
            }
        }
        if (empty($quickLinks)) {
            $quickLinks = $current['quick_links'];
        }
        $data['quick_links'] = $quickLinks;

        // Process popular projects
        $popProjects = [];
        $ppLabels = $_POST['pp_label'] ?? [];
        $ppUrls = $_POST['pp_url'] ?? [];
        if (is_array($ppLabels)) {
            foreach ($ppLabels as $idx => $lbl) {
                if (!empty($lbl)) {
                    $popProjects[] = [
                        'label' => trim((string)$lbl),
                        'url' => trim((string)($ppUrls[$idx] ?? ''))
                    ];
                }
            }
        }
        if (empty($popProjects)) {
            $popProjects = $current['popular_projects'];
        }
        $data['popular_projects'] = $popProjects;

        Setting::saveFooterSections($data);

        $this->flash('success', 'Footer settings updated successfully.');
        return $this->redirect(url('/admin/footer'));
    }
}
