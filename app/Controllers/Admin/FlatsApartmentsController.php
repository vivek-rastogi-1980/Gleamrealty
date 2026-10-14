<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Setting;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;

class FlatsApartmentsController extends Controller
{
    public function index(): Response
    {
        $sections = Setting::get('flats_apartments_sections', []);
        
        if (empty($sections)) {
            $sections = [
                'overview_content' => '<p>Most people would have been bewildered if they were told they could buy a flat in Vrindavan a few years ago. You traveled to this holy place on pilgrimage, stayed in an ashram, dharamshala, or basic guest house, and returned home. There was simply no formal category for owning an apartment in the town of Banke Bihari and ISKCON.</p><p>That reality has transformed. Today, Vrindavan features contemporary mid-rise towers, gated apartment societies, and continuous weekend occupancy. Once you examine who the buyer is, the appeal is obvious: devotees and retirees who want to be near the temples with round-the-clock security, maintenance, and power backup, allowing them to lock up and leave for months without worry.</p><p>However, buying a flat also carries trade-offs when contrasted with owning standalone freehold land. At GLEAMREALTY PRIVATE LIMITED, we help you evaluate both options with complete candor.</p>',
                'metric_1_val' => '₹35L-95L',
                'metric_1_lbl' => 'Price Band',
                'metric_2_val' => 'Studio-2BHK',
                'metric_2_lbl' => 'Primary Demand',
                'metric_3_val' => '24×7',
                'metric_3_lbl' => 'Gated Manned',
                'metric_4_val' => '100%',
                'metric_4_lbl' => 'RERA Mandated',
                'hub_1_badge' => 'Chhatikara Road',
                'hub_1_title' => 'Chhatikara & Temple Entry Hub',
                'hub_1_desc' => 'The primary gateway into Vrindavan from NH-19. Wide approach roads, immediate proximity to Prem Mandir, ISKCON, and Chandrodaya Mandir. Features prominent high-rise towers with high weekend tourist occupancy and serviced apartment models.',
                'hub_2_badge' => 'VIP Residential',
                'hub_2_title' => 'Rukmani Vihar Enclave',
                'hub_2_desc' => 'A well-established master-planned district featuring a blend of mid-rise societies and premium residential townships like Shri Vrinda Orchids. Known for organized VIP neighborhoods, municipal park networks, and peaceful residential tranquility.',
                'hub_3_badge' => 'Spiritual Retreat',
                'hub_3_title' => 'Sunrakh Road & Parikrama Periphery',
                'hub_3_desc' => 'A greener, quieter sector favored by retirees and spiritual seekers desiring proximity to sacred groves and ashrams, away from major highway vehicular transit.',
                'hub_4_badge' => 'Highway Corridors',
                'hub_4_title' => 'NH-19 Expressway Corridors',
                'hub_4_desc' => 'Featuring large-scale integrated gated communities with clubhouses, wide boulevards, and swift 90-minute connectivity to Jewar Airport and Delhi-NCR.',
                'check_1_title' => 'UP-RERA Registration',
                'check_1_desc' => 'Check the project on the UP-RERA portal. Verify that the advertised completion date and bank escrow details match the developer\'s contract.',
                'check_2_title' => 'MVDA Completion Certificate (CC)',
                'check_2_desc' => 'Never take possession without an official Completion or Occupancy Certificate from MVDA. Without CC/OC, electricity and water connections remain temporary.',
                'check_3_title' => 'Sweet Water Line Connection',
                'check_3_desc' => 'Ask whether the society is connected to a municipal potable sweet water supply or depends solely on treated groundwater, which can be hard on plumbing fixtures.',
                'check_4_title' => 'Power Backup Generator Capacity',
                'check_4_desc' => 'Ensure the society has 100% full DG power backup for air-conditioners and elevators, essential during peak summer festival seasons in Uttar Pradesh.',
                'check_5_title' => 'Bank Home Loan Sanction',
                'check_5_desc' => 'Check if leading institutions like SBI, HDFC, or ICICI have approved the project. Bank approval validates title clearance and construction sanction orders.',
            ];
        }
        
        return $this->adminView('admin/flats_apartments/index', [
            'seo_title' => 'Flats in Vrindavan CMS',
            'sections' => $sections,
        ]);
    }

    public function update(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security session expired. Please submit again.');
            return $this->redirect(url('/admin/flats-apartments'));
        }

        $payload = [
            'overview_content' => (string) $request->raw('overview_content', ''),
        ];

        // Process metrics
        for ($i = 1; $i <= 4; $i++) {
            $payload["metric_{$i}_val"] = trim((string) $request->input("metric_{$i}_val", ''));
            $payload["metric_{$i}_lbl"] = trim((string) $request->input("metric_{$i}_lbl", ''));
        }

        // Process localities
        for ($i = 1; $i <= 4; $i++) {
            $payload["hub_{$i}_badge"] = trim((string) $request->input("hub_{$i}_badge", ''));
            $payload["hub_{$i}_title"] = trim((string) $request->input("hub_{$i}_title", ''));
            $payload["hub_{$i}_desc"] = trim((string) $request->input("hub_{$i}_desc", ''));
        }

        // Process checklist
        for ($i = 1; $i <= 5; $i++) {
            $payload["check_{$i}_title"] = trim((string) $request->input("check_{$i}_title", ''));
            $payload["check_{$i}_desc"] = trim((string) $request->input("check_{$i}_desc", ''));
        }

        Setting::set('flats_apartments_sections', $payload);

        // Also update standard page content
        $page = \App\Models\Page::findBySlug('flats-apartments-in-vrindavan');
        if ($page) {
            $page['content'] = $payload['overview_content'];
            \App\Models\Page::update((int)$page['id'], $page);
        }

        $this->flash('success', 'Flats in Vrindavan CMS updated successfully.');
        return $this->redirect(url('/admin/flats-apartments'));
    }
}
