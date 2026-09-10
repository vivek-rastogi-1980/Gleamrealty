<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Project;
use App\Models\ProjectMedia;
use Core\Controller;
use Core\Request;
use Core\Response;

/**
 * Class ProjectController
 *
 * Public project catalogue and dynamic project showcase.
 */
class ProjectController extends Controller
{
    public function index(Request $request): Response
    {
        $search = (string) $request->query('search', '');
        $type = (string) $request->query('type', '');

        $projects = Project::all($search, !empty($type) ? $type : null);

        return $this->view('public/home', [
            'seo_title' => 'Exclusive Real Estate Projects Portfolio',
            'seo_description' => 'Browse our curated collection of verified plotted communities, luxury villas, and townships.',
            'projects' => $projects,
            'search' => $search,
            'selected_type' => $type,
        ]);
    }

    public function show(Request $request, string $slug): Response
    {
        $project = Project::findBySlug($slug);
        if (!$project) {
            return Response::html(
                '<!DOCTYPE html><html><head><title>404 Not Found</title><style>body{background:#090d16;color:#fff;font-family:sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}h1{font-size:36px;color:#c5a880;}p{color:#888;}a{color:#c5a880;}</style></head><body><div><h1>Project Not Found</h1><p>The requested project does not exist.</p><p style="margin-top:20px;"><a href="' . url('/') . '">&larr; Return to Home</a></p></div></body></html>',
                404
            );
        }

        $projectId = (int) $project['id'];
        $gallery = ProjectMedia::forProject($projectId, 'gallery');
        $floorplans = ProjectMedia::forProject($projectId, 'floorplan');
        $elevations = ProjectMedia::forProject($projectId, 'elevation');
        $videos = ProjectMedia::forProject($projectId, 'video');

        // Parse amenities JSON
        $amenities = [];
        if (!empty($project['amenities'])) {
            $decoded = json_decode($project['amenities'], true);
            $amenities = is_array($decoded) ? $decoded : explode(',', $project['amenities']);
        }

        // Curated related projects (excluding current)
        $allProjects = Project::all();
        $relatedProjects = array_values(array_filter($allProjects, fn($p) => (int) $p['id'] !== $projectId));
        $relatedProjects = array_slice($relatedProjects, 0, 3);

        return $this->view('public/project', [
            'seo_title' => $project['meta_title'] ?: $project['name'],
            'seo_description' => $project['meta_description'] ?: $project['tagline'],
            'seo_keywords' => $project['meta_keywords'] ?? '',
            'project' => $project,
            'gallery' => $gallery,
            'floorplans' => $floorplans,
            'elevations' => $elevations,
            'videos' => $videos,
            'amenities' => $amenities,
            'relatedProjects' => $relatedProjects,
        ]);
    }
}
