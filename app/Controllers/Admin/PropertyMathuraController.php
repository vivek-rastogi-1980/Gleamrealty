<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Setting;
use Core\Request;
use Core\Response;
use Core\Uploader;

class PropertyMathuraController extends Controller
{
    /**
     * Display the Property in Mathura admin panel.
     */
    public function index(Request $request): Response
    {
        $pm = Setting::getPropertyMathuraSections();
        if (empty($pm['faqs']['list'])) {
            $pm['faqs']['list'] = [
                ['q' => '1. What is the current plot rate in Mathura City in 2026?', 'a' => 'Plot rates vary significantly based on approval status. Outer unapproved lands range from ₹9,000 to ₹18,000/sq. yard. Fully developed, MVDA-approved gated developments such as Shri Vrinda Aakruti Village on Govardhan Road are priced at ₹35,000 per square yard.'],
                ['q' => '2. What is the price of a 100 Gaj plot in Mathura?', 'a' => 'A 100-gaj (900 sq. ft) residential plot in a sanctioned MVDA gated township costs approximately ₹35 Lakhs. While unauthorized farmland listings may quote ₹9 to ₹15 Lakhs, they lack municipal approvals, roads, utilities, and bank loan eligibility.'],
                ['q' => '3. Where is Shri Vrinda Aakruti Village located?', 'a' => 'Shri Vrinda Aakruti Village is situated on Satoha-Naugaon Road off the main Mathura-Govardhan Road. It provides rapid 15-minute access to Shri Krishna Janmasthan and Govardhan Parikrama.'],
                ['q' => '4. Is property in Mathura safe to buy for outstation buyers?', 'a' => 'Yes, provided you purchase within an MVDA-sanctioned layout with clear 30-year search titles. GLEAMREALTY PRIVATE LIMITED ensures zero unauthorized land is ever offered to patrons.'],
                ['q' => '5. What does MVDA approval guarantee for Mathura plots?', 'a' => 'MVDA approval ensures legally protected road widths (30-40 ft), dedicated green parks that cannot be encroached upon, underground drainage, potable water lines, and eligibility for bank mortgages.'],
                ['q' => '6. Can I get a bank loan for purchasing a plot in Mathura?', 'a' => 'Yes. On all MVDA sanctioned projects like Shri Vrinda Aakruti Village, leading institutions such as SBI, HDFC, and ICICI Bank approve residential plot loans up to 75-80%.'],
                ['q' => '7. Is sweet drinking water available in Mathura plots?', 'a' => 'Many areas of Mathura suffer from saline ground water. However, Shri Vrinda Aakruti Village on Satoha Road has access to sweet water aquifers and a dedicated community filtration supply line.'],
                ['q' => '8. Should I buy a plot in Mathura or Vrindavan?', 'a' => 'If you prioritize tranquil everyday living, larger plot size per rupee, and proximity to Mathura City amenities, choose Mathura (Govardhan Road). If you prioritize high-energy temple proximity and maximum tourist rental yields, choose Vrindavan.'],
                ['q' => '9. What plot sizes are available in Shri Vrinda Aakruti Village?', 'a' => 'Plot sizes range from 116 sq. yards up to 183 sq. yards, ideal for standalone cottages or duplex villas.'],
                ['q' => '10. What is the registry and mutation procedure in Mathura?', 'a' => 'Once payments are completed, registration takes place at the Mathura Sub-Registrar Office with immediate stamp duty payment, followed by mutation in the municipal revenue records.'],
                ['q' => '11. How does the upcoming Jewar Airport benefit Mathura?', 'a' => 'The operational Jewar Airport is connected directly to Mathura via the Yamuna Expressway, reducing travel time to 90 minutes and driving steady commercial and residential valuation growth.'],
                ['q' => '12. Can I build my own house on the plot or is construction mandatory?', 'a' => 'You receive freehold ownership of the land. You can construct immediately using our certified architectural team or hold the plot as a long-term appreciating asset.'],
                ['q' => '13. How can I book a free site tour of Mathura plots?', 'a' => 'Simply submit the site visit form below or call our private desk at +91 9871731303 / +91 7409767452. We provide complimentary pickup from Mathura Junction railway station.']
            ];
        }
        return $this->view('admin/property_mathura/index', [
            'pm' => $pm,
            'title' => 'Manage Property in Mathura Page',
        ], 'layouts/admin');
    }

    /**
     * Handle form submission to save sections.
     */
    public function store(Request $request): Response
    {
        $data = $request->all();

        // Process SEO data
        $seoData = [
            'meta_title' => $data['seo_meta_title'] ?? '',
            'meta_description' => $data['seo_meta_description'] ?? '',
            'meta_keywords' => $data['seo_meta_keywords'] ?? '',
        ];

        $current = Setting::getPropertyMathuraSections();

        // Process Hero Image
        $heroImage = $current['hero']['image'] ?? 'uploads/pages/property-in-mathura-hero.jpg';
        if (!empty($_FILES['hero_image_file']['name']) && $_FILES['hero_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedHero = Uploader::image($_FILES['hero_image_file'], 'public/uploads/pages');
            if ($uploadedHero) {
                $heroImage = $uploadedHero;
            }
        } elseif (!empty($data['hero_image'])) {
            $heroImage = trim((string) $data['hero_image']);
        }

        // Process Hero
        $heroData = [
            'heading' => $data['hero_heading'] ?? '',
            'subheading' => $data['hero_subheading'] ?? '',
            'image' => $heroImage,
        ];

        // Process Narrative Image
        $narrativeImage = $current['narrative']['image'] ?? 'uploads/pages/mero-vrindavan.png';
        if (!empty($_FILES['narrative_image_file']['name']) && $_FILES['narrative_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedNarrative = Uploader::image($_FILES['narrative_image_file'], 'public/uploads/pages');
            if ($uploadedNarrative) {
                $narrativeImage = $uploadedNarrative;
            }
        } elseif (!empty($data['narrative_image'])) {
            $narrativeImage = trim((string) $data['narrative_image']);
        }

        // Process Narrative
        $narrativeData = [
            'image' => $narrativeImage,
            'eyebrow' => $data['narrative_eyebrow'] ?? '',
            'title' => $data['narrative_title'] ?? '',
            'content' => $data['narrative_content'] ?? '',
            'badge_title' => $data['narrative_badge_title'] ?? '',
            'badge_value' => $data['narrative_badge_value'] ?? '',
            'metric_1_val' => $data['narrative_metric_1_val'] ?? '',
            'metric_1_lbl' => $data['narrative_metric_1_lbl'] ?? '',
            'metric_2_val' => $data['narrative_metric_2_val'] ?? '',
            'metric_2_lbl' => $data['narrative_metric_2_lbl'] ?? '',
            'metric_3_val' => $data['narrative_metric_3_val'] ?? '',
            'metric_3_lbl' => $data['narrative_metric_3_lbl'] ?? '',
            'metric_4_val' => $data['narrative_metric_4_val'] ?? '',
            'metric_4_lbl' => $data['narrative_metric_4_lbl'] ?? '',
        ];

        // Process Township Image
        $townshipImage = $current['township']['image'] ?? 'uploads/pages/aakruti-township.jpg';
        if (!empty($_FILES['township_image_file']['name']) && $_FILES['township_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedTownship = Uploader::image($_FILES['township_image_file'], 'public/uploads/pages');
            if ($uploadedTownship) {
                $townshipImage = $uploadedTownship;
            }
        } elseif (!empty($data['township_image'])) {
            $townshipImage = trim((string) $data['township_image']);
        }

        // Process Township
        $townshipData = [
            'eyebrow' => $data['township_eyebrow'] ?? '',
            'title' => $data['township_title'] ?? '',
            'subtitle' => $data['township_subtitle'] ?? '',
            'image' => $townshipImage,
            'price' => $data['township_price'] ?? '',
            'location' => $data['township_location'] ?? '',
            'project_title' => $data['township_project_title'] ?? '',
            'project_desc' => $data['township_project_desc'] ?? '',
            'f1_lbl' => $data['township_f1_lbl'] ?? '',
            'f1_val' => $data['township_f1_val'] ?? '',
            'f2_lbl' => $data['township_f2_lbl'] ?? '',
            'f2_val' => $data['township_f2_val'] ?? '',
            'f3_lbl' => $data['township_f3_lbl'] ?? '',
            'f3_val' => $data['township_f3_val'] ?? '',
            'f4_lbl' => $data['township_f4_lbl'] ?? '',
            'f4_val' => $data['township_f4_val'] ?? '',
        ];

        // Process Comparison
        $comparisonData = [
            'eyebrow' => $data['comparison_eyebrow'] ?? '',
            'title' => $data['comparison_title'] ?? '',
            'subtitle' => $data['comparison_subtitle'] ?? '',
            'mathura_eyebrow' => $data['comparison_mathura_eyebrow'] ?? '',
            'mathura_price' => $data['comparison_mathura_price'] ?? '',
            'mathura_title' => $data['comparison_mathura_title'] ?? '',
            'mathura_features' => $data['comparison_mathura_features'] ?? '',
            'vrindavan_eyebrow' => $data['comparison_vrindavan_eyebrow'] ?? '',
            'vrindavan_price' => $data['comparison_vrindavan_price'] ?? '',
            'vrindavan_title' => $data['comparison_vrindavan_title'] ?? '',
            'vrindavan_features' => $data['comparison_vrindavan_features'] ?? '',
        ];

        // Process Budget
        $budgetData = [
            'eyebrow' => $data['budget_eyebrow'] ?? '',
            'title' => $data['budget_title'] ?? '',
            'subtitle' => $data['budget_subtitle'] ?? '',
            'tier1_eyebrow' => $data['budget_tier1_eyebrow'] ?? '',
            'tier1_title' => $data['budget_tier1_title'] ?? '',
            'tier1_price' => $data['budget_tier1_price'] ?? '',
            'tier1_desc' => $data['budget_tier1_desc'] ?? '',
            'tier2_eyebrow' => $data['budget_tier2_eyebrow'] ?? '',
            'tier2_title' => $data['budget_tier2_title'] ?? '',
            'tier2_price' => $data['budget_tier2_price'] ?? '',
            'tier2_desc' => $data['budget_tier2_desc'] ?? '',
            'tier3_eyebrow' => $data['budget_tier3_eyebrow'] ?? '',
            'tier3_title' => $data['budget_tier3_title'] ?? '',
            'tier3_price' => $data['budget_tier3_price'] ?? '',
            'tier3_desc' => $data['budget_tier3_desc'] ?? '',
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

        $faqsData = [
            'eyebrow' => trim((string) $request->input('faqs_eyebrow', $current['faqs']['eyebrow'] ?? '')),
            'title' => trim((string) $request->input('faqs_title', $current['faqs']['title'] ?? '')),
            'subtitle' => trim((string) $request->input('faqs_subtitle', $current['faqs']['subtitle'] ?? '')),
            'list' => !empty($faqList) ? $faqList : ($current['faqs']['list'] ?? [])
        ];

        $payload = [
            'hero' => $heroData,
            'narrative' => $narrativeData,
            'township' => $townshipData,
            'comparison' => $comparisonData,
            'budget' => $budgetData,
            'faqs' => $faqsData,
            'seo' => $seoData,
        ];

        Setting::savePropertyMathuraSections($payload);

        $this->flash('success', 'Property in Mathura sections updated successfully.');
        return $this->redirect(url('/admin/property-mathura'));
    }

    /**
     * Handle AJAX image uploads.
     */
    public function uploadImage(Request $request): Response
    {
        if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            return $this->json(['success' => false, 'message' => 'No valid image uploaded.']);
        }

        $uploader = new Uploader();
        $path = $uploader->upload($_FILES['image'], 'pages');

        if ($path) {
            return $this->json(['success' => true, 'path' => $path]);
        }

        return $this->json(['success' => false, 'message' => $uploader->getError()]);
    }
}
