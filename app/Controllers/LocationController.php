<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Project;
use Core\Controller;
use Core\Request;
use Core\Response;

/**
 * Class LocationController
 *
 * Dedicated showcase handler for location-specific property listings
 * (Mathura, Vrindavan, and the greater Braj corridor).
 */
class LocationController extends Controller
{
    public function show(Request $request, string $city): Response
    {
        $normalizedCity = strtolower(trim($city));
        $type = (string) $request->query('type', '');

        // Location specific metadata
        if ($normalizedCity === 'mathura') {
            $cityName = 'Mathura';
            $seoTitle = 'Luxury Properties & Plots in Mathura | MVDA Approved | Gleamrealty';
            $seoDesc = 'Explore 100% MVDA & RERA approved residential plots, gated commercial complexes, and luxury real estate in Mathura along NH-19 and Yamuna Expressway.';
            $headline = 'Prime Freehold Properties & Plots in Mathura';
            $tagline = 'Approved Residential Plots, Commercial Corridors & Industrial Enclaves Along NH-19 and the Sacred Yamuna Belt';
            $editorial = 'Mathura, the historic heart of Braj Bhumi, represents one of Northern India\'s highest-potential real estate and spiritual tourism hubs. Connected directly to Delhi NCR via the Yamuna Expressway and NH-19, our curated Mathura portfolio offers verified freehold titles, immediate registry, and planned infrastructure.';
            $highlights = [
                ['title' => 'NH-19 & Expressway Hub', 'desc' => 'Instant connectivity to Delhi NCR, Agra, and upcoming Jewar International Airport.'],
                ['title' => '100% MVDA Approved', 'desc' => 'Every parcel is pre-vetted by Mathura-Vrindavan Development Authority.'],
                ['title' => 'Heritage City Corridor', 'desc' => 'Prime positioning near the government-sanctioned Heritage City and tourism projects.'],
                ['title' => 'Immediate Possession', 'desc' => 'Completed demarcation, wide 40ft-60ft avenue roads, and underground utilities.'],
            ];
            $coverImage = asset('uploads/hero/hero-braj-sanctuary.webp');
            $otherCity = 'Vrindavan';
            $otherCityUrl = url('/location/vrindavan');
        } else {
            // Default to Vrindavan
            $cityName = 'Vrindavan';
            $normalizedCity = 'vrindavan';
            $seoTitle = 'Luxury Residential Plots & Villas in Vrindavan | Gleamrealty';
            $seoDesc = 'Discover curated Vedic freehold sanctuaries, residential plots, and duplex villas in Vrindavan near Bankey Bihari, ISKCON, and Chhatikara corridor.';
            $headline = 'Sacred Sanctuaries & Luxury Properties in Vrindavan';
            $tagline = 'Curated Gated Townships, Turnkey Havelis & Vedic Plotted Communities Across Chhatikara and Sunrakh';
            $editorial = 'To establish a home in Vrindavan is to secure a timeless family legacy in the spiritual capital of Braj. Gleamrealty curates verified, freehold plotted communities and luxury villas that harmonize Vedic architecture with contemporary gated comforts, serene Kadamba groves, and round-the-clock security.';
            $highlights = [
                ['title' => 'Vedic Sacred Soil', 'desc' => 'Walking and short drive distance to Bankey Bihari, Prem Mandir, and Chandrodaya Temple.'],
                ['title' => '100% MVDA & RERA Verified', 'desc' => 'Fully sanctioned layouts with clear titles and hassle-free registry assistance.'],
                ['title' => 'Chhatikara VIP Corridor', 'desc' => 'Direct four-lane access connecting Vrindavan smoothly to NH-19 and Delhi NCR.'],
                ['title' => 'High Appreciation & Peace', 'desc' => 'Unmatched spiritual lifestyle combined with rapid 18-24% capital appreciation.'],
            ];
            $coverImage = asset('uploads/hero/hero-haveli-courtyard.webp');
            $otherCity = 'Mathura';
            $otherCityUrl = url('/location/mathura');
        }

        $projects = Project::byLocation($normalizedCity, !empty($type) ? $type : null);

        return $this->view('public/location_properties', [
            'seo_title' => $seoTitle,
            'seo_description' => $seoDesc,
            'city' => $normalizedCity,
            'cityName' => $cityName,
            'headline' => $headline,
            'tagline' => $tagline,
            'editorial' => $editorial,
            'highlights' => $highlights,
            'coverImage' => $coverImage,
            'otherCity' => $otherCity,
            'otherCityUrl' => $otherCityUrl,
            'projects' => $projects,
            'selected_type' => $type,
        ]);
    }
}
