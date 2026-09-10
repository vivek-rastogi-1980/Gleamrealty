<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectMedia;
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
        if (!$page || (int) ($page['is_published'] ?? 1) !== 1) {
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
        $page = Page::findBySlug('contact-us') ?: [
            'title' => 'Contact Us',
            'meta_title' => 'Contact Us | GLEAMREALTY PRIVATE LIMITED Braj Private Office',
            'meta_description' => 'Contact GLEAMREALTY PRIVATE LIMITED for details about plots and villas in Vrindavan and Mathura. Our team is here to help you find your dream property.',
            'meta_keywords' => 'Contact Gleamrealty, Vrindavan plots, Mathura land, site visit',
            'hero_heading' => 'Contact us',
            'hero_subheading' => 'Comprehensive Guide & Real Estate Insights in Vrindavan and Mathura',
        ];

        return $this->view('public/contact_us', [
            'seo_title' => $page['meta_title'] ?: 'Contact Us | GLEAMREALTY PRIVATE LIMITED Braj Private Office',
            'seo_description' => $page['meta_description'] ?: 'Contact GLEAMREALTY PRIVATE LIMITED for details about plots and villas in Vrindavan and Mathura. Our team is here to help you find your dream property.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Contact Gleamrealty, Vrindavan real estate',
            'canonical_url' => url('/contact-us'),
            'page' => $page,
        ]);
    }

    /**
     * Dedicated About Us Handler matching https://earthousing.com/about-us
     */
    public function aboutUs(Request $request): Response
    {
        $page = Page::findBySlug('about-us') ?: [
            'title' => 'About Us',
            'meta_title' => 'About Us, Know About GLEAMREALTY PRIVATE LIMITED',
            'meta_description' => 'Learn more about GLEAMREALTY PRIVATE LIMITED, a trusted real estate advisory offering approved plots and villas in Vrindavan and Mathura for peaceful living.',
            'meta_keywords' => 'Know About Gleamrealty, Vrindavan real estate, Brajwas',
            'hero_heading' => 'About us',
            'hero_subheading' => 'About GLEAMREALTY PRIVATE LIMITED',
        ];

        $projects = Project::all();

        return $this->view('public/about_us', [
            'seo_title' => $page['meta_title'] ?: 'About Us, Know About GLEAMREALTY PRIVATE LIMITED',
            'seo_description' => $page['meta_description'] ?: 'Learn more about GLEAMREALTY PRIVATE LIMITED, a trusted real estate advisory offering approved plots and villas in Vrindavan and Mathura for peaceful living.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Know About Gleamrealty',
            'canonical_url' => url('/about-us'),
            'page' => $page,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Residential Plots in Vrindavan Handler
     * Matching https://earthousing.com/residential-plots-in-vrindavan
     */
    public function residentialPlots(Request $request): Response
    {
        $page = Page::findBySlug('residential-plots-in-vrindavan') ?: [
            'title' => 'Plots in Vrindavan',
            'meta_title' => 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan',
            'meta_description' => 'Buy MVDA approved plots in Vrindavan. Residential Plots in Vrindavan. Govt approved plots in Vrindavan, 100 gaj to large plots in vrindavan.',
            'meta_keywords' => 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan, MVDA approved plots, Vrindavan land',
            'hero_heading' => 'Plots in Vrindavan',
            'hero_subheading' => 'Plot for Sale in Vrindavan, Plot in Vrindavan near Prem Mandir',
        ];

        // Fetch projects with their primary media thumbnail
        $rawProjects = Project::all();
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        return $this->view('public/residential_plots', [
            'seo_title' => $page['meta_title'] ?: 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan',
            'seo_description' => $page['meta_description'] ?: 'Buy MVDA approved plots in Vrindavan. Residential Plots in Vrindavan. Govt approved plots in Vrindavan, 100 gaj to large plots in vrindavan.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Plots in Vrindavan, Residential Plots in Vrindavan, Plot for Sale in Vrindavan',
            'canonical_url' => url('/residential-plots-in-vrindavan'),
            'page' => $page,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Property in Vrindavan Handler
     * Matching https://earthousing.com/property-in-vrindavan
     */
    public function propertyInVrindavan(Request $request): Response
    {
        $page = Page::findBySlug('property-in-vrindavan') ?: [
            'title' => 'Property in Vrindavan',
            'meta_title' => 'Property in Vrindavan, Property for Sale Vrindavan UP',
            'meta_description' => 'Buy MVDA approved property in Vrindavan. Verified residential properties near Prem Mandir, Raal Road & NH-19. Schedule a free site visit with Gleamrealty.',
            'meta_keywords' => 'Property in Vrindavan, Property for Sale Vrindavan UP, MVDA approved property',
            'hero_heading' => 'Property in Vrindavan',
            'hero_subheading' => 'Property for Sale Vrindavan UP, MVDA & Govt Approved Property in Vrindavan',
        ];

        $rawProjects = Project::all();
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        return $this->view('public/residential_plots', [
            'seo_title' => $page['meta_title'] ?: 'Property in Vrindavan, Property for Sale Vrindavan UP',
            'seo_description' => $page['meta_description'] ?: 'Buy MVDA approved property in Vrindavan. Verified residential properties near Prem Mandir, Raal Road & NH-19. Schedule a free site visit with Gleamrealty.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Property in Vrindavan, Property for Sale Vrindavan UP',
            'canonical_url' => url('/property-in-vrindavan'),
            'page' => $page,
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

        $rawProjects = Project::all();
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        return $this->view('public/commercial_property', [
            'seo_title' => $page['meta_title'] ?: 'Commercial Property in Vrindavan, Shop & Land in Vrindavan',
            'seo_description' => $page['meta_description'] ?: 'Invest in MVDA approved commercial property in Vrindavan. Shop complexes, commercial plots in Vrindavan. High ROI. Verified listings.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Commercial Property in Vrindavan, Shop in Vrindavan',
            'canonical_url' => url('/commercial-property-in-vrindavan'),
            'page' => $page,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Luxury Villas in Vrindavan Handler
     * Matching https://earthousing.com/luxury-villas-in-vrindavan
     */
    public function luxuryVillas(Request $request): Response
    {
        $page = Page::findBySlug('luxury-villas-in-vrindavan') ?: [
            'title' => 'Villas in Vrindavan',
            'meta_title' => 'Villas in Vrindavan, Villas in Mathura, Mathura Villa',
            'meta_description' => 'Buy luxury villas in Vrindavan, Mathura. MVDA approved duplex villas in gated townships. Spiritual living, modern design. Book free visit.',
            'meta_keywords' => 'Villas in Vrindavan, Villas in Mathura, Mathura Villa, Luxury duplex villas Vrindavan',
            'hero_heading' => 'Villas in Vrindavan',
            'hero_subheading' => 'Villas in Mathura, Private Duplex Sanctuaries in Braj',
        ];

        $rawProjects = Project::all();
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

        $rawProjects = Project::all();
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        return $this->view('public/property_mathura', [
            'seo_title' => $page['meta_title'] ?: 'Plot in Mathura City, Property in Mathura City, Mathura Plots',
            'seo_description' => $page['meta_description'] ?: 'Buy MVDA approved property in Mathura City. Verified MVDA approved residential plots in mathura.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Plot in Mathura City, Mathura Plots',
            'canonical_url' => url('/property-in-mathura'),
            'page' => $page,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Plot Rate in Vrindavan Handler
     * Matching https://earthousing.com/plot-rate-vrindavan
     */
    public function plotRateVrindavan(Request $request): Response
    {
        $page = Page::findBySlug('plot-rate-vrindavan') ?: [
            'title' => 'Plot rate in Vrindavan',
            'meta_title' => 'Plot rate in Vrindavan, Vrindavan Plot Price, Vrindavan Land Price',
            'meta_description' => 'GLEAMREALTY PRIVATE LIMITED gives you best plot rate in vrindavan. Vrindavan plot price by Gleamrealty is customized as per your needs.',
            'meta_keywords' => 'Plot rate in Vrindavan, Vrindavan Plot Price, Vrindavan Land Price, Vrindavan circle rates',
            'hero_heading' => 'Plot rate in Vrindavan',
            'hero_subheading' => 'Vrindavan Plot Price, Vrindavan Land Price 2026 Ground Reality',
        ];

        $rawProjects = Project::all();
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        return $this->view('public/plot_rate_vrindavan', [
            'seo_title' => $page['meta_title'] ?: 'Plot rate in Vrindavan, Vrindavan Plot Price, Vrindavan Land Price',
            'seo_description' => $page['meta_description'] ?: 'GLEAMREALTY PRIVATE LIMITED gives you best plot rate in vrindavan. Vrindavan plot price by Gleamrealty is customized as per your needs.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Plot rate in Vrindavan, Vrindavan Plot Price',
            'canonical_url' => url('/plot-rate-vrindavan'),
            'page' => $page,
            'projects' => $projects,
        ]);
    }

    /**
     * Dedicated Plot Rate in Mathura Handler
     * Matching https://earthousing.com/plot-rate-mathura
     */
    public function plotRateMathura(Request $request): Response
    {
        $page = Page::findBySlug('plot-rate-mathura') ?: [
            'title' => 'Mathura Plot Rate',
            'meta_title' => 'Mathura Plot Rate, Plot for Sale in Mathura',
            'meta_description' => 'Mathura plot rate by GLEAMREALTY PRIVATE LIMITED is customized as per your needs. Schedule your free site visit to secure plot for sale in Mathura.',
            'meta_keywords' => 'Mathura Plot Rate, Plot for Sale in Mathura, 100 gaj plot in mathura price',
            'hero_heading' => 'Mathura Plot Rate',
            'hero_subheading' => 'Plot for Sale in Mathura, 100 gaj plot in mathura price 2026',
        ];

        $rawProjects = Project::all();
        $projects = [];
        foreach ($rawProjects as $p) {
            $media = ProjectMedia::forProject((int) $p['id']);
            $p['primary_image'] = !empty($media[0]['file_path']) ? $media[0]['file_path'] : null;
            $projects[] = $p;
        }

        return $this->view('public/plot_rate_mathura', [
            'seo_title' => $page['meta_title'] ?: 'Mathura Plot Rate, Plot for Sale in Mathura',
            'seo_description' => $page['meta_description'] ?: 'Mathura plot rate by GLEAMREALTY PRIVATE LIMITED is customized as per your needs. Schedule your free site visit to secure plot for sale in Mathura.',
            'seo_keywords' => $page['meta_keywords'] ?? 'Mathura Plot Rate, Plot for Sale in Mathura',
            'canonical_url' => url('/plot-rate-mathura'),
            'page' => $page,
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

        $rawProjects = Project::all();
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
