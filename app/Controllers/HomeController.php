<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Project;
use App\Models\Setting;
use Core\Controller;
use Core\Request;
use Core\Response;

/**
 * Class HomeController
 *
 * Public showcase landing page.
 */
class HomeController extends Controller
{
    public function index(Request $request): Response
    {
        $allProjects = Project::all();
        $projects = array_values(array_filter($allProjects, fn($p) => (int) ($p['is_active'] ?? 1) === 1));
        $hero = Setting::getHero();
        $metrics = Setting::getMetrics();
        $activeTheme = Setting::getActiveTheme();
        $homeSections = Setting::getHomeSections();
        $latestBlogs = \App\Models\Blog::recent(3);

        return $this->view('public/home', [
            'seo_title' => 'Luxury Estates & Plots in Vrindavan Mathura',
            'seo_description' => 'Explore MVDA and RERA approved residential plots, luxury villas, and commercial real estate in Vrindavan and Mathura.',
            'projects' => $projects,
            'hero' => $hero,
            'metrics' => $metrics,
            'active_theme' => $activeTheme,
            'home_sections' => $homeSections,
            'latest_blogs' => $latestBlogs,
        ]);
    }
}
