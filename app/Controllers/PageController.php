<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectMedia;
use App\Models\Setting;
use Core\Controller;
use Core\Request;
use Core\Response;

/**
 * Class PageController
 *
 * Dynamic frontend CMS page resolver & dedicated page handlers.
 */
class PageController extends Controller
{
    public function show(Request $request, string $slug): Response
    {
        // First check if the page exists in DB and is explicitly unpublished
        $pageCheck = Page::findBySlug($slug);
        if ($pageCheck && isset($pageCheck['is_published']) && (int) $pageCheck['is_published'] === 0) {
            return Response::html(
                '<!DOCTYPE html><html><head><title>404 Not Found</title><style>body{background:#090d16;color:#fff;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}h1{font-size:36px;color:#c5a880;}p{color:#888;}a{color:#c5a880;}</style></head><body><div><h1>Page Not Found</h1><p>The requested page does not exist or has been unpublished.</p><p style="margin-top:20px;"><a href="' . url('/') . '">&larr; Return to Home</a></p></div></body></html>',
                404
            );
        }
        if ($slug === 'contact-us') {
            return $this->contactUs($request);
        }
        if ($slug === 'about-us') {
            return $this->aboutUs($request);
        }
        if ($slug === 'residential-plots-in-vrindavan') {
            return $this->residentialPlots($request);
        }
        if ($slug === 'property-in-vrindavan') {
            return $this->propertyInVrindavan($request);
        }
        if ($slug === 'commercial-property-in-vrindavan') {
            return $this->commercialProperty($request);
        }
        if ($slug === 'luxury-villas-in-vrindavan') {
            return $this->luxuryVillas($request);
        }
        if ($slug === 'property-in-mathura') {
            return $this->propertyInMathura($request);
        }
        if ($slug === 'plot-rate-vrindavan') {
            return $this->plotRateVrindavan($request);
        }
        if ($slug === 'plot-rate-mathura') {
            return $this->plotRateMathura($request);
        }
        if ($slug === 'flats-apartments-in-vrindavan') {
            return $this->flatsApartments($request);
        }

        $page = Page::findBySlug($slug);
        if (!$page) {
            return Response::html(
                '<!DOCTYPE html><html><head><title>404 Not Found</title><style>body{background:#090d16;color:#fff;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}h1{font-size:36px;color:#c5a880;}p{color:#888;}a{color:#c5a880;}</style></head><body><div><h1>Page Not Found</h1><p>The requested page does not exist or has been unpublished.</p><p style="margin-top:20px;"><a href="' . url('/') . '">&larr; Return to Home</a></p></div></body></html>',
                404
            );
        }

        return $this->view('public/page', [
            'seo_title' => $page['meta_title'] ?: $page['title'],
            'seo_description' => $page['meta_description'] ?: $page['hero_subheading'],
            'seo_keywords' => $page['meta_keywords'] ?? '',
            'canonical_url' => url('/' . $slug),
            'page' => $page,
        ]);
    }

    /**
     * Dedicated Contact Us Handler matching https://earthousing.com/contact-us
     */
    public function contactUs(Request $request): Response
    {
        $contact = Setting::getContactSections();

        $page = Page::findBySlug('contact-us') ?: [
            'id' => 2,
            'title' => 'Contact us',
            'meta_title' => $contact['seo']['meta_title'] ?? 'Contact Us | GLEAMREALTY PRIVATE LIMITED Braj Gleamrealty Private Limited',
            'meta_description' => $contact['seo']['meta_description'] ?? 'Contact GLEAMREALTY PRIVATE LIMITED for details about plots and villas in Vrindavan and Mathura. Our team is here to help you find your dream property.',
            'meta_keywords' => $contact['seo']['meta_keywords'] ?? 'Contact Gleamrealty, Vrindavan plots, Mathura land, site visit',
            'hero_heading' => $contact['hero']['heading'] ?? 'Contact us',
            'hero_subheading' => $contact['hero']['subheading'] ?? 'Comprehensive Guide & Real Estate Insights in Vrindavan and Mathura',
            'hero_media_url' => $contact['hero']['image'] ?? 'uploads/hero/hero-braj-sanctuary.webp',
        ];

        $seoTitle = !empty($contact['seo']['meta_title']) ? $contact['seo']['meta_title'] : ($page['meta_title'] ?: 'Contact Us | GLEAMREALTY PRIVATE LIMITED Braj Gleamrealty Private Limited');
        if (stripos($seoTitle, 'earthousing') !== false) {
            $seoTitle = 'Contact Us | GLEAMREALTY PRIVATE LIMITED Braj Gleamrealty Private Limited';
        }
        $seoDesc = !empty($contact['seo']['meta_description']) ? $contact['seo']['meta_description'] : ($page['meta_description'] ?: 'Contact GLEAMREALTY PRIVATE LIMITED for details about plots and villas in Vrindavan and Mathura. Our team is here to help you find your dream property.');
        if (stripos($seoDesc, 'earthousing') !== false) {
            $seoDesc = 'Contact GLEAMREALTY PRIVATE LIMITED for details about plots and villas in Vrindavan and Mathura. Our team is here to help you find your dream property.';
        }
        $seoKeywords = !empty($contact['seo']['meta_keywords']) ? $contact['seo']['meta_keywords'] : ($page['meta_keywords'] ?? 'Contact Gleamrealty, Vrindavan real estate, property');

        return $this->view('public/contact_us', [
            'seo_title' => $seoTitle,
            'seo_description' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'canonical_url' => url('/contact-us'),
            'page' => $page,
            'contact' => $contact,
        ]);
    }

    /**
     * Dedicated About Us Handler matching https://earthousing.com/about-us
     */
    public function aboutUs(Request $request): Response
    {
        $about = Setting::getAboutSections();

        $page = Page::findBySlug('about-us') ?: [
            'title' => $about['hero']['heading'] ?? 'About Us',
            'meta_title' => $about['seo']['meta_title'] ?? 'About Us, Know About GLEAMREALTY PRIVATE LIMITED',
            'meta_description' => $about['seo']['meta_description'] ?? 'Learn more about GLEAMREALTY PRIVATE LIMITED, a trusted real estate advisory offering approved plots and villas in Vrindavan and Mathura for peaceful living.',
            'meta_keywords' => $about['seo']['meta_keywords'] ?? 'Know About Gleamrealty, Vrindavan real estate, Brajwas',
            'hero_heading' => $about['hero']['heading'] ?? 'About us',
            'hero_subheading' => $about['overview']['title'] ?? 'About GLEAMREALTY PRIVATE LIMITED',
        ];

        $projects = Project::all();

        $seoTitle = !empty($about['seo']['meta_title']) ? $about['seo']['meta_title'] : ($page['meta_title'] ?: 'About Us, Know About GLEAMREALTY PRIVATE LIMITED');
        if (stripos($seoTitle, 'earthousing') !== false) {
            $seoTitle = 'About Us, Know About GLEAMREALTY PRIVATE LIMITED';
        }
        $seoDesc = !empty($about['seo']['meta_description']) ? $about['seo']['meta_description'] : ($page['meta_description'] ?: 'Learn more about GLEAMREALTY PRIVATE LIMITED, a trusted real estate advisory offering approved plots and villas in Vrindavan and Mathura for peaceful living.');
        if (stripos($seoDesc, 'earthousing') !== false) {
            $seoDesc = 'Learn more about GLEAMREALTY PRIVATE LIMITED, a trusted real estate advisory offering approved plots and villas in Vrindavan and Mathura for peaceful living.';
        }
        $seoKeywords = !empty($about['seo']['meta_keywords']) ? $about['seo']['meta_keywords'] : ($page['meta_keywords'] ?? 'Know About Gleamrealty, Vrindavan real estate, Brajwas');

        return $this->view('public/about_us', [
            'seo_title' => $seoTitle,
            'seo_description' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'canonical_url' => url('/about-us'),
            'page' => $page,
            'about' => $about,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Residential Plots in Vrindavan Handler
     * Matching https://earthousing.com/residential-plots-in-vrindavan
     */
    public function residentialPlots(Request $request): Response
    {
        $rp = Setting::getResidentialPlotsSections();

        $page = Page::findBySlug('residential-plots-in-vrindavan') ?: [
            'id' => 4,
            'title' => 'Plots in Vrindavan',
            'meta_title' => $rp['seo']['meta_title'] ?? 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan',
            'meta_description' => $rp['seo']['meta_description'] ?? 'Buy MVDA approved plots in Vrindavan. Residential Plots in Vrindavan. Govt approved plots in Vrindavan, 100 gaj to large plots in vrindavan.',
            'meta_keywords' => $rp['seo']['meta_keywords'] ?? 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan, MVDA approved plots, Vrindavan land',
            'hero_heading' => $rp['hero']['heading'] ?? 'Plots in Vrindavan',
            'hero_subheading' => $rp['hero']['subheading'] ?? 'Plot for Sale in Vrindavan, Plot in Vrindavan near Prem Mandir',
            'hero_media_url' => $rp['hero']['image'] ?? 'uploads/pages/residential-plots-in-vrindavan.jpeg',
        ];

        // Fetch projects with their primary media thumbnail
        $allProjects = Project::all(); $rawProjects = array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1);
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        $seoTitle = !empty($rp['seo']['meta_title']) ? $rp['seo']['meta_title'] : ($page['meta_title'] ?: 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan — Gleamrealty Private Limited');
        if (stripos($seoTitle, 'earthousing') !== false) {
            $seoTitle = 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan — Gleamrealty Private Limited';
        }
        $seoDesc = !empty($rp['seo']['meta_description']) ? $rp['seo']['meta_description'] : ($page['meta_description'] ?: 'Buy MVDA approved plots in Vrindavan. Residential Plots in Vrindavan near Prem Mandir, Raal Road & NH-19. 100 gaj to large plots. Schedule a free site visit with Gleamrealty.');
        if (stripos($seoDesc, 'earthousing') !== false) {
            $seoDesc = 'Buy MVDA approved plots in Vrindavan. Residential Plots in Vrindavan near Prem Mandir, Raal Road & NH-19. 100 gaj to large plots. Schedule a free site visit with Gleamrealty.';
        }
        $seoKeywords = !empty($rp['seo']['meta_keywords']) ? $rp['seo']['meta_keywords'] : ($page['meta_keywords'] ?? 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan');

        return $this->view('public/residential_plots', [
            'seo_title' => $seoTitle,
            'seo_description' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'canonical_url' => url('/residential-plots-in-vrindavan'),
            'page' => $page,
            'rp' => $rp,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Property in Vrindavan Handler
     * Matching https://earthousing.com/property-in-vrindavan
     */
    public function propertyInVrindavan(Request $request): Response
    {
        $pv = Setting::getPropertyVrindavanSections();

        $page = Page::findBySlug('property-in-vrindavan') ?: [
            'id' => 3,
            'title' => 'Property in Vrindavan',
            'meta_title' => $pv['seo']['meta_title'] ?? 'Property in Vrindavan, Property for Sale Vrindavan UP',
            'meta_description' => $pv['seo']['meta_description'] ?? 'Buy MVDA approved property in Vrindavan. Verified residential properties near Prem Mandir, Raal Road & NH-19. Schedule a free site visit with Gleamrealty.',
            'meta_keywords' => $pv['seo']['meta_keywords'] ?? 'Property in Vrindavan, Property for Sale Vrindavan UP, MVDA approved property',
            'hero_heading' => $pv['hero']['heading'] ?? 'Property in Vrindavan',
            'hero_subheading' => $pv['hero']['subheading'] ?? 'Property for Sale Vrindavan UP, MVDA & Govt Approved Property in Vrindavan',
            'hero_media_url' => $pv['hero']['image'] ?? 'uploads/pages/property-in-vrindavan.png',
        ];

        $allProjects = Project::all(); $rawProjects = array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1);
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        $seoTitle = !empty($pv['seo']['meta_title']) ? $pv['seo']['meta_title'] : ($page['meta_title'] ?: 'Property in Vrindavan, Property for Sale Vrindavan UP — Gleamrealty Private Limited');
        if (stripos($seoTitle, 'earthousing') !== false) {
            $seoTitle = 'Property in Vrindavan, Property for Sale Vrindavan UP — Gleamrealty Private Limited';
        }
        $seoDesc = !empty($pv['seo']['meta_description']) ? $pv['seo']['meta_description'] : ($page['meta_description'] ?: 'Buy MVDA approved property in Vrindavan. Verified residential properties near Prem Mandir, Raal Road & NH-19. Schedule a free site visit with Gleamrealty.');
        if (stripos($seoDesc, 'earthousing') !== false) {
            $seoDesc = 'Buy MVDA approved property in Vrindavan. Verified residential properties near Prem Mandir, Raal Road & NH-19. Schedule a free site visit with Gleamrealty.';
        }
        $seoKeywords = !empty($pv['seo']['meta_keywords']) ? $pv['seo']['meta_keywords'] : ($page['meta_keywords'] ?? 'Property in Vrindavan, Property for Sale Vrindavan UP');

        return $this->view('public/property_vrindavan', [
            'seo_title' => $seoTitle,
            'seo_description' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'canonical_url' => url('/property-in-vrindavan'),
            'page' => $page,
            'pv' => $pv,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Commercial Property in Vrindavan Handler
     * Matching https://earthousing.com/commercial-property-in-vrindavan
     */
    public function commercialProperty(Request $request): Response
    {
        $page = Page::findBySlug('commercial-property-in-vrindavan') ?: [
            'title' => 'Commercial Property in Vrindavan',
            'meta_title' => 'Commercial Property in Vrindavan, Shop & Land in Vrindavan',
            'meta_description' => 'Invest in MVDA approved commercial property in Vrindavan. Shop complexes, commercial plots in Vrindavan. High ROI. Verified listings.',
            'meta_keywords' => 'Commercial Property in Vrindavan, Shop in Vrindavan, Commercial Land in Vrindavan, MVDA commercial plots',
            'hero_heading' => 'Commercial Property in Vrindavan',
            'hero_subheading' => 'Commercial Land & High-Yield Retail Complexes in Vrindavan',
        ];

        $allProjects = Project::all(); $rawProjects = array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1);
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        $cp = Setting::getCommercialPropertySections();

        $seoTitle = !empty($cp['seo']['meta_title']) ? $cp['seo']['meta_title'] : ($page['meta_title'] ?? 'Commercial Property in Vrindavan, Shop & Land in Vrindavan — Gleamrealty Private Limited');
        if (stripos($seoTitle, 'earthousing') !== false) {
            $seoTitle = 'Commercial Property in Vrindavan, Shop & Land in Vrindavan — Gleamrealty Private Limited';
        }
        $seoDesc = !empty($cp['seo']['meta_description']) ? $cp['seo']['meta_description'] : ($page['meta_description'] ?? 'Invest in MVDA approved commercial property in Vrindavan. High-street retail shops, hotel land, and commercial plots on NH-19 and Rukmani Vihar. Schedule a consultation with Gleamrealty.');
        if (stripos($seoDesc, 'earthousing') !== false) {
            $seoDesc = 'Invest in MVDA approved commercial property in Vrindavan. High-street retail shops, hotel land, and commercial plots on NH-19 and Rukmani Vihar. Schedule a consultation with Gleamrealty.';
        }
        $seoKeywords = !empty($cp['seo']['meta_keywords']) ? $cp['seo']['meta_keywords'] : ($page['meta_keywords'] ?? 'Commercial Property in Vrindavan, Shop in Vrindavan, Commercial Land in Vrindavan, MVDA commercial plots');

        return $this->view('public/commercial_property', [
            'seo_title' => $seoTitle,
            'seo_description' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'canonical_url' => url('/commercial-property-in-vrindavan'),
            'page' => $page,
            'cp' => $cp,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Luxury Villas in Vrindavan Handler
     * Matching https://earthousing.com/luxury-villas-in-vrindavan
     */
    public function luxuryVillas(Request $request): Response
    {
        $lv = Setting::getLuxuryVillasSections();

        $page = Page::findBySlug('luxury-villas-in-vrindavan') ?: [
            'title' => 'Villas in Vrindavan',
            'meta_title' => $lv['seo']['meta_title'] ?? 'Villas in Vrindavan, Villas in Mathura, Mathura Villa',
            'meta_description' => $lv['seo']['meta_description'] ?? 'Buy luxury villas in Vrindavan, Mathura. MVDA approved duplex villas in gated townships. Spiritual living, modern design. Book free visit.',
            'meta_keywords' => $lv['seo']['meta_keywords'] ?? 'Villas in Vrindavan, Villas in Mathura, Mathura Villa, Luxury duplex villas Vrindavan',
            'hero_heading' => $lv['hero']['heading'] ?? 'Villas in Vrindavan',
            'hero_subheading' => $lv['hero']['subheading'] ?? 'Villas in Mathura, Private Duplex Sanctuaries in Braj',
            'hero_media_url' => $lv['hero']['image'] ?? 'uploads/pages/luxury-villas-in-vrindavan.jpeg',
            'content' => $lv['narrative']['content'] ?? '',
        ];

        $allProjects = Project::all(); $rawProjects = array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1);
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        return $this->view('public/luxury_villas', [
            'seo_title' => $page['meta_title'] ?: 'Villas in Vrindavan, Villas in Mathura, Mathura Villa',
            'seo_description' => $page['meta_description'] ?: 'Buy luxury villas in Vrindavan, Mathura. MVDA approved duplex villas in gated townships. Spiritual living, modern design. Book free visit.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Villas in Vrindavan, Villas in Mathura',
            'canonical_url' => url('/luxury-villas-in-vrindavan'),
            'page' => $page,
            'lv' => $lv,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Property in Mathura Handler
     * Matching https://earthousing.com/property-in-mathura
     */
    public function propertyInMathura(Request $request): Response
    {
        $page = Page::findBySlug('property-in-mathura') ?: [
            'title' => 'Plot in Mathura City',
            'meta_title' => 'Plot in Mathura City, Property in Mathura City, Mathura Plots, Buy Property in Mathura',
            'meta_description' => 'Buy MVDA approved property in Mathura City. Verified MVDA approved residential plots in mathura.',
            'meta_keywords' => 'Plot in Mathura City, Property in Mathura City, Mathura Plots, Buy Property in Mathura',
            'hero_heading' => 'Plot in Mathura City',
            'hero_subheading' => 'Buy Property in Mathura City, Mathura Plots, MVDA Approved Plot in Mathura',
        ];

        $allProjects = Project::all(); $rawProjects = array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1);
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        $pm = \App\Models\Setting::getPropertyMathuraSections();

        return $this->view('public/property_mathura', [
            'seo_title' => $page['meta_title'] ?: 'Plot in Mathura City, Property in Mathura City, Mathura Plots',
            'seo_description' => $page['meta_description'] ?: 'Buy MVDA approved property in Mathura City. Verified MVDA approved residential plots in mathura.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Plot in Mathura City, Mathura Plots',
            'canonical_url' => url('/property-in-mathura'),
            'page' => $page,
            'pm' => $pm,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Plot Rate in Vrindavan Handler
     * Matching https://earthousing.com/plot-rate-vrindavan
     */
    public function plotRateVrindavan(Request $request): Response
    {
        $pm = Setting::getPlotRateVrindavanSections();
        
        $page = Page::findBySlug('plot-rate-vrindavan') ?: [
            'title' => 'Plot rate in Vrindavan',
            'meta_title' => $pm['seo']['meta_title'] ?? 'Plot rate in Vrindavan, Vrindavan Plot Price, Vrindavan Land Price',
            'meta_description' => $pm['seo']['meta_description'] ?? 'GLEAMREALTY PRIVATE LIMITED gives you best plot rate in vrindavan. Vrindavan plot price by Gleamrealty is customized as per your needs.',
            'meta_keywords' => $pm['seo']['meta_keywords'] ?? 'Plot rate in Vrindavan, Vrindavan Plot Price, Vrindavan Land Price, Vrindavan circle rates',
            'hero_heading' => $pm['hero']['heading'] ?? 'Plot rate in Vrindavan',
            'hero_subheading' => $pm['hero']['subheading'] ?? 'Vrindavan Plot Price, Vrindavan Land Price 2026 Ground Reality',
        ];

        $allProjects = Project::all(); $rawProjects = array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1);
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        $seoTitle = !empty($pm['seo']['meta_title']) ? $pm['seo']['meta_title'] : ($page['meta_title'] ?: 'Plot rate in Vrindavan, Vrindavan Plot Price, Vrindavan Land Price');
        if (stripos($seoTitle, 'earthousing') !== false) {
            $seoTitle = 'Plot rate in Vrindavan, Vrindavan Plot Price, Vrindavan Land Price';
        }
        $seoDesc = !empty($pm['seo']['meta_description']) ? $pm['seo']['meta_description'] : ($page['meta_description'] ?: 'GLEAMREALTY PRIVATE LIMITED gives you best plot rate in vrindavan. Vrindavan plot price by Gleamrealty is customized as per your needs.');
        if (stripos($seoDesc, 'earthousing') !== false) {
            $seoDesc = 'GLEAMREALTY PRIVATE LIMITED gives you best plot rate in vrindavan. Vrindavan plot price by Gleamrealty is customized as per your needs.';
        }
        $seoKeywords = !empty($pm['seo']['meta_keywords']) ? $pm['seo']['meta_keywords'] : ($page['meta_keywords'] ?? 'Plot rate in Vrindavan, Vrindavan Plot Price');

        return $this->view('public/plot_rate_vrindavan', [
            'seo_title' => $seoTitle,
            'seo_description' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'canonical_url' => url('/plot-rate-vrindavan'),
            'page' => $page,
            'pm' => $pm,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Plot Rate in Mathura Handler
     * Matching https://earthousing.com/plot-rate-mathura
     */
    public function plotRateMathura(Request $request): Response
    {
        $pr = Setting::getMathuraPlotRateSections();

        $page = Page::findBySlug('plot-rate-mathura') ?: [
            'title' => 'Mathura Plot Rate',
            'meta_title' => $pr['seo']['meta_title'] ?? 'Mathura Plot Rate, Plot for Sale in Mathura',
            'meta_description' => $pr['seo']['meta_description'] ?? 'Mathura plot rate by GLEAMREALTY PRIVATE LIMITED is customized as per your needs. Schedule your free site visit to secure plot for sale in Mathura.',
            'meta_keywords' => $pr['seo']['meta_keywords'] ?? 'Mathura Plot Rate, Plot for Sale in Mathura, 100 gaj plot in mathura price',
            'hero_heading' => $pr['hero']['heading'] ?? 'Mathura Plot Rate',
            'hero_subheading' => $pr['hero']['subheading'] ?? 'Plot for Sale in Mathura, 100 gaj plot in mathura price 2026',
            'hero_media_url' => $pr['hero']['image'] ?? 'uploads/pages/mero-vrindavan.png',
        ];

        $allProjects = Project::all(); $rawProjects = array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1);
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        $seoTitle = !empty($pr['seo']['meta_title']) ? $pr['seo']['meta_title'] : ($page['meta_title'] ?: 'Mathura Plot Rate, Plot for Sale in Mathura');
        if (stripos($seoTitle, 'earthousing') !== false) {
            $seoTitle = 'Mathura Plot Rate, Plot for Sale in Mathura';
        }
        $seoDesc = !empty($pr['seo']['meta_description']) ? $pr['seo']['meta_description'] : ($page['meta_description'] ?: 'Mathura plot rate by GLEAMREALTY PRIVATE LIMITED is customized as per your needs. Schedule your free site visit to secure plot for sale in Mathura.');
        if (stripos($seoDesc, 'earthousing') !== false) {
            $seoDesc = 'Mathura plot rate by GLEAMREALTY PRIVATE LIMITED is customized as per your needs. Schedule your free site visit to secure plot for sale in Mathura.';
        }
        $seoKeywords = !empty($pr['seo']['meta_keywords']) ? $pr['seo']['meta_keywords'] : ($page['meta_keywords'] ?? 'Mathura Plot Rate, Plot for Sale in Mathura');

        return $this->view('public/plot_rate_mathura', [
            'seo_title' => $seoTitle,
            'seo_description' => $seoDesc,
            'seo_keywords' => $seoKeywords,
            'canonical_url' => url('/plot-rate-mathura'),
            'page' => $page,
            'pr' => $pr,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Flats and Apartments in Vrindavan Handler
     * Matching https://earthousing.com/flats-apartments-in-vrindavan
     */
    public function flatsApartments(Request $request): Response
    {
        $page = Page::findBySlug('flats-apartments-in-vrindavan') ?: [
            'title' => 'Flats in Vrindavan',
            'meta_title' => 'Flats in Vrindavan, Vrindavan Apartment, Buy Flat in Vrindavan',
            'meta_description' => 'Buy flat in Vrindavan: 2026 prices, top localities & RERA verification guide. Vrindavan apartment projects launching soon, register your interest.',
            'meta_keywords' => 'Flats in Vrindavan, Vrindavan Apartment, Buy Flat in Vrindavan, Studio apartments Vrindavan',
            'hero_heading' => 'Flats in Vrindavan',
            'hero_subheading' => 'Vrindavan Apartment 2026 Buyer\'s Guide & Upcoming Enclaves',
        ];

        $allProjects = Project::all(); $rawProjects = array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1);
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        return $this->view('public/flats_apartments', [
            'seo_title' => $page['meta_title'] ?: 'Flats in Vrindavan, Vrindavan Apartment, Buy Flat in Vrindavan',
            'seo_description' => $page['meta_description'] ?: 'Buy flat in Vrindavan: 2026 prices, top localities & RERA verification guide. Vrindavan apartment projects launching soon, register your interest.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Flats in Vrindavan, Vrindavan Apartment',
            'canonical_url' => url('/flats-apartments-in-vrindavan'),
            'page' => $page,
            'projects' => $projects,
        ]);
    }
}
