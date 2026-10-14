<?php

namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Setting;
use Core\Request;
use Core\Response;
use Core\Uploader;

class PlotRateVrindavanController extends Controller
{
    /**
     * Display the Plot Rate in Vrindavan admin panel.
     */
    public function index(Request $request): Response
    {
        $pm = Setting::getPlotRateVrindavanSections();
        if (empty($pm['faqs']['list'])) {
            $pm['faqs']['list'] = [
                [
                    'q' => '1. What is the current plot rate in Vrindavan per square yard in 2026?',
                    'a' => 'In 2026, the legitimate plot rate in Vrindavan spans between ₹38,000 and ₹65,000 per square yard for MVDA-sanctioned gated developments (such as on NH-19 and Rukmani Vihar). Unapproved agricultural plots on the far periphery trade between ₹15,000 and ₹25,000, while prime locations near Prem Mandir exceed ₹85,000/sq. yard.'
                ],
                [
                    'q' => '2. What is the difference between circle rate and market rate in Vrindavan?',
                    'a' => 'The circle rate is the government\'s minimum base valuation for stamp duty calculation, currently set around ₹12,000 to ₹25,000/sq. yard depending on the ward. The market rate is the actual transacted price determined by private demand, MVDA approvals, and infrastructure.'
                ],
                [
                    'q' => '3. How much does a 100 Gaj plot in Vrindavan cost in 2026?',
                    'a' => 'A 100-gaj (900 sq. ft) residential plot in an MVDA-approved gated township costs approximately ₹38 to ₹42.5 Lakhs along the NH-19 corridor (Shri Vrinda Naivedyam, Shri Vasudhara Vaishaly), and approximately ₹60 to ₹70 Lakhs in VIP Rukmani Vihar (Shri Vrinda Orchids).'
                ],
                [
                    'q' => '4. Why are some plots in Vrindavan advertised for as low as ₹10,000 per Gaj?',
                    'a' => 'Advertisements quoting ₹10,000 to ₹15,000/sq. yard are invariably unapproved agricultural land without Section 143 conversion or MVDA layout sanctions. These lack basic roads, electricity, and drainage, cannot be legally registered as residential plots, and carry severe risk of demolition.'
                ],
                [
                    'q' => '5. What extra charges should I expect above the quoted plot price?',
                    'a' => 'At GLEAMREALTY PRIVATE LIMITED, quoted rates are transparent. Government registration costs include 7% stamp duty for males (6% for females) and 1% registration fees. There are zero brokerage charges.'
                ],
                [
                    'q' => '6. Has Jewar Airport started impacting Vrindavan plot rates?',
                    'a' => 'Yes. With commercial flights operating from Noida International Airport (Jewar) and direct expressway access, land along the Yamuna Expressway and NH-19 has seen an immediate 15% to 22% annual valuation rise.'
                ],
                [
                    'q' => '7. Which corridor in Vrindavan offers the highest appreciation potential?',
                    'a' => 'The NH-19 corridor (Chhatikara, Akbarpur, Chaumuha) offers the highest percentage appreciation because of direct highway infrastructure, wide entrance roads, and ongoing commercial expansion.'
                ],
                [
                    'q' => '8. Can I buy a plot with home loan financing from nationalized banks?',
                    'a' => 'Yes. On all MVDA-approved projects represented by our office, leading lenders such as State Bank of India (SBI) and HDFC Bank offer residential plot and construction loans up to 75-80%.'
                ],
                [
                    'q' => '9. What is the typical appreciation rate of land in Vrindavan?',
                    'a' => 'Historically, MVDA-approved residential land in Vrindavan has compounded at 15% to 25% annually over the last five years, accelerated by the ₹30,000 Crore public infrastructure outlay.'
                ],
                [
                    'q' => '10. Is registry and mutation guaranteed immediately upon payment?',
                    'a' => 'Yes. All our developments feature clear 30-year titles with immediate registry at the Sub-Registrar Office followed by municipal mutation entry.'
                ],
                [
                    'q' => '11. Can NRIs legally purchase plots in Vrindavan?',
                    'a' => 'Yes. Non-Resident Indians (NRIs) and Overseas Citizens of India (OCIs) can freely purchase residential plots in India under RBI regulations using normal banking channels.'
                ],
                [
                    'q' => '12. What size plots are most popular in Vrindavan?',
                    'a' => '100 Gaj (900 sq. ft), 150 Gaj (1,350 sq. ft), and 200 Gaj (1,800 sq. ft) are the most popular plot sizes for holiday retreats and retirement homes.'
                ],
                [
                    'q' => '13. How do I get an honest price valuation for a specific plot?',
                    'a' => 'Contact the GLEAMREALTY PRIVATE LIMITED Gleamrealty Private Limited desk at +91 9871731303 / +91 7409767452. We will share the sanctioned layout map, official circle rate sheets, and comparative market analysis with complete transparency.'
                ]
            ];
        }
        return $this->view('admin/plot_rate_vrindavan/index', [
            'pm' => $pm,
            'title' => 'Manage Plot Rate in Vrindavan Page',
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

        $current = Setting::getPlotRateVrindavanSections();

        // Process Hero Image
        $heroImage = $current['hero']['image'] ?? 'uploads/pages/Why-Choose-Vrindavan.jpg';
        if (!empty($_FILES['hero_image_file']['name']) && $_FILES['hero_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedHero = Uploader::image($_FILES['hero_image_file'], 'public/uploads/pages');
            if ($uploadedHero) {
                $heroImage = $uploadedHero;
            }
        } elseif (!empty($data['hero_image'])) {
            $heroImage = trim((string) $data['hero_image']);
        }

        // Process Narrative Image
        $narrativeImage = $current['narrative']['image'] ?? 'uploads/pages/Why-Choose-Vrindavan.jpg';
        if (!empty($_FILES['narrative_image_file']['name']) && $_FILES['narrative_image_file']['error'] === UPLOAD_ERR_OK) {
            $uploadedNarrative = Uploader::image($_FILES['narrative_image_file'], 'public/uploads/pages');
            if ($uploadedNarrative) {
                $narrativeImage = $uploadedNarrative;
            }
        } elseif (!empty($data['narrative_image'])) {
            $narrativeImage = trim((string) $data['narrative_image']);
        }

        $heroData = [
            'heading' => $data['hero_heading'] ?? '',
            'subheading' => $data['hero_subheading'] ?? '',
            'image' => $heroImage,
        ];

        $narrativeData = [
            'eyebrow' => $data['narrative_eyebrow'] ?? '',
            'title' => $data['narrative_title'] ?? '',
            'content' => $data['narrative_content'] ?? '',
            'image' => $narrativeImage,
            'm1_val' => $data['narrative_m1_val'] ?? '',
            'm1_lbl' => $data['narrative_m1_lbl'] ?? '',
            'm2_val' => $data['narrative_m2_val'] ?? '',
            'm2_lbl' => $data['narrative_m2_lbl'] ?? '',
            'm3_val' => $data['narrative_m3_val'] ?? '',
            'm3_lbl' => $data['narrative_m3_lbl'] ?? '',
            'm4_val' => $data['narrative_m4_val'] ?? '',
            'm4_lbl' => $data['narrative_m4_lbl'] ?? '',
        ];

        $corridorsData = [
            'eyebrow' => $data['corridors_eyebrow'] ?? '',
            'title' => $data['corridors_title'] ?? '',
            'subtitle' => $data['corridors_subtitle'] ?? '',
            'c1_price' => $data['corridors_c1_price'] ?? '',
            'c1_title' => $data['corridors_c1_title'] ?? '',
            'c1_desc' => $data['corridors_c1_desc'] ?? '',
            'c2_price' => $data['corridors_c2_price'] ?? '',
            'c2_title' => $data['corridors_c2_title'] ?? '',
            'c2_desc' => $data['corridors_c2_desc'] ?? '',
            'c3_price' => $data['corridors_c3_price'] ?? '',
            'c3_title' => $data['corridors_c3_title'] ?? '',
            'c3_desc' => $data['corridors_c3_desc'] ?? '',
            'c4_price' => $data['corridors_c4_price'] ?? '',
            'c4_title' => $data['corridors_c4_title'] ?? '',
            'c4_desc' => $data['corridors_c4_desc'] ?? '',
        ];

        $matrixData = [
            'eyebrow' => $data['matrix_eyebrow'] ?? '',
            'title' => $data['matrix_title'] ?? '',
            'subtitle' => $data['matrix_subtitle'] ?? '',
            'r1_col1' => $data['matrix_r1_col1'] ?? '', 'r1_col2' => $data['matrix_r1_col2'] ?? '', 'r1_col3' => $data['matrix_r1_col3'] ?? '', 'r1_col4' => $data['matrix_r1_col4'] ?? '', 'r1_col5' => $data['matrix_r1_col5'] ?? '',
            'r2_col1' => $data['matrix_r2_col1'] ?? '', 'r2_col2' => $data['matrix_r2_col2'] ?? '', 'r2_col3' => $data['matrix_r2_col3'] ?? '', 'r2_col4' => $data['matrix_r2_col4'] ?? '', 'r2_col5' => $data['matrix_r2_col5'] ?? '',
            'r3_col1' => $data['matrix_r3_col1'] ?? '', 'r3_col2' => $data['matrix_r3_col2'] ?? '', 'r3_col3' => $data['matrix_r3_col3'] ?? '', 'r3_col4' => $data['matrix_r3_col4'] ?? '', 'r3_col5' => $data['matrix_r3_col5'] ?? '',
            'r4_col1' => $data['matrix_r4_col1'] ?? '', 'r4_col2' => $data['matrix_r4_col2'] ?? '', 'r4_col3' => $data['matrix_r4_col3'] ?? '', 'r4_col4' => $data['matrix_r4_col4'] ?? '', 'r4_col5' => $data['matrix_r4_col5'] ?? '',
            'r5_col1' => $data['matrix_r5_col1'] ?? '', 'r5_col2' => $data['matrix_r5_col2'] ?? '', 'r5_col3' => $data['matrix_r5_col3'] ?? '', 'r5_col4' => $data['matrix_r5_col4'] ?? '', 'r5_col5' => $data['matrix_r5_col5'] ?? '',
            'r6_col1' => $data['matrix_r6_col1'] ?? '', 'r6_col2' => $data['matrix_r6_col2'] ?? '', 'r6_col3' => $data['matrix_r6_col3'] ?? '', 'r6_col4' => $data['matrix_r6_col4'] ?? '', 'r6_col5' => $data['matrix_r6_col5'] ?? '',
        ];

        $checklistData = [
            'eyebrow' => $data['checklist_eyebrow'] ?? '',
            'title' => $data['checklist_title'] ?? '',
            'subtitle' => $data['checklist_subtitle'] ?? '',
            'p1_title' => $data['checklist_p1_title'] ?? '', 'p1_desc' => $data['checklist_p1_desc'] ?? '',
            'p2_title' => $data['checklist_p2_title'] ?? '', 'p2_desc' => $data['checklist_p2_desc'] ?? '',
            'p3_title' => $data['checklist_p3_title'] ?? '', 'p3_desc' => $data['checklist_p3_desc'] ?? '',
            'p4_title' => $data['checklist_p4_title'] ?? '', 'p4_desc' => $data['checklist_p4_desc'] ?? '',
            'p5_title' => $data['checklist_p5_title'] ?? '', 'p5_desc' => $data['checklist_p5_desc'] ?? '',
        ];

        $faqsData = [
            'eyebrow' => $data['faqs_eyebrow'] ?? '',
            'title' => $data['faqs_title'] ?? '',
            'subtitle' => $data['faqs_subtitle'] ?? '',
            'list' => []
        ];
        
        if (!empty($data['faq_q']) && is_array($data['faq_q'])) {
            foreach ($data['faq_q'] as $index => $q) {
                $a = $data['faq_a'][$index] ?? '';
                if (!empty(trim($q)) || !empty(trim($a))) {
                    $faqsData['list'][] = [
                        'q' => trim($q),
                        'a' => trim($a)
                    ];
                }
            }
        }

        $merged = [
            'hero' => $heroData,
            'narrative' => $narrativeData,
            'corridors' => $corridorsData,
            'matrix' => $matrixData,
            'checklist' => $checklistData,
            'faqs' => $faqsData,
            'seo' => $seoData,
        ];

        Setting::savePlotRateVrindavanSections($merged);

        $this->flash('success', 'Plot Rate in Vrindavan sections updated successfully.');
        return $this->redirect(url('/admin/plot-rate-vrindavan'));
    }
}
