<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Project;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;
use Core\Uploader;

/**
 * Class ProjectController
 *
 * Full CRUD operations for luxury real estate projects with SEO controls.
 */
class ProjectController extends Controller
{
    public function index(Request $request): Response
    {
        $search = (string) $request->query('search', '');
        $type = (string) $request->query('type', '');
        $location = (string) $request->query('location', '');

        $projects = Project::all($search, !empty($type) ? $type : null, !empty($location) ? $location : null);
        $rawLocs = \Core\Database::fetchAll("SELECT DISTINCT `location` FROM `projects` WHERE `location` IS NOT NULL AND `location` != '' ORDER BY `location` ASC");
        $locations = array_values(array_filter(array_column($rawLocs, 'location')));

        return $this->adminView('admin/projects/index', [
            'seo_title' => 'Project Management',
            'projects' => $projects,
            'search' => $search,
            'selected_type' => $type,
            'selected_location' => $location,
            'locations' => $locations,
        ]);
    }

    public function create(): Response
    {
        return $this->adminView('admin/projects/create', [
            'seo_title' => 'Add New Project',
        ]);
    }

    public function store(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid. Please try again.');
            return $this->redirect(url('/admin/projects/create'));
        }

        $name = (string) $request->input('name', '');
        if (empty($name)) {
            $this->flash('error', 'Project name is required.');
            return $this->redirect(url('/admin/projects/create'));
        }

        $slug = (string) $request->input('slug', '');
        if (empty($slug)) {
            $slug = slugify($name);
        } else {
            $slug = slugify($slug);
        }

        // Check duplicate slug
        if (Project::findBySlug($slug)) {
            $slug .= '-' . time();
        }

        // Handle Brochure File Upload
        $brochureUrl = (string) $request->input('brochure_url', '');
        $brochureFile = $request->file('brochure_file');
        if ($brochureFile && !empty($brochureFile['tmp_name'])) {
            $uploadedPdf = Uploader::upload($brochureFile, 'brochures');
            if ($uploadedPdf) {
                $brochureUrl = $uploadedPdf;
            }
        }

        // Handle Floor Plan File Upload
        $floorPlanUrl = (string) $request->input('floor_plan_url', '');
        $floorPlanFile = $request->file('floor_plan_file');
        if ($floorPlanFile && !empty($floorPlanFile['tmp_name'])) {
            $uploadedFp = Uploader::upload($floorPlanFile, 'plans');
            if ($uploadedFp) {
                $floorPlanUrl = $uploadedFp;
            }
        }

        // Handle Payment Plan File Upload
        $paymentPlanUrl = (string) $request->input('payment_plan_url', '');
        $paymentPlanFile = $request->file('payment_plan_file');
        if ($paymentPlanFile && !empty($paymentPlanFile['tmp_name'])) {
            $uploadedPp = Uploader::upload($paymentPlanFile, 'plans');
            if ($uploadedPp) {
                $paymentPlanUrl = $uploadedPp;
            }
        }

        // Parse amenities
        $rawAmenities = (string) $request->raw('amenities', '');
        $amenityList = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $rawAmenities)))));

        $payload = [
            'name' => $name,
            'slug' => $slug,
            'tagline' => (string) $request->input('tagline', ''),
            'location' => (string) $request->input('location', 'Vrindavan'),
            'google_maps_embed' => (string) $request->raw('google_maps_embed', ''),
            'starting_price' => (string) $request->input('starting_price', ''),
            'project_type' => (string) $request->input('project_type', 'Plotted Community'),
            'rera_id' => (string) $request->input('rera_id', ''),
            'mvda_approved' => (bool) $request->post('mvda_approved', 0),
            'project_size' => (string) $request->input('project_size', ''),
            'hero_video_url' => format_embed_url((string) $request->input('hero_video_url', '')),
            'overview' => (string) $request->raw('overview', ''),
            'amenities' => $amenityList,
            'brochure_url' => $brochureUrl,
            'floor_plan_url' => $floorPlanUrl,
            'payment_plan_url' => $paymentPlanUrl,
            'meta_title' => (string) $request->input('meta_title', ''),
            'meta_description' => (string) $request->input('meta_description', ''),
            'meta_keywords' => (string) $request->input('meta_keywords', ''),
        ];

        $newId = Project::create($payload);

        // Handle primary image upload if provided
        $heroFile = $request->file('hero_image');
        if ($heroFile && !empty($heroFile['tmp_name'])) {
            $imgPath = Uploader::upload($heroFile, 'projects');
            if ($imgPath) {
                \App\Models\ProjectMedia::create($newId, $imgPath, 'gallery', $name . ' Primary Elevation', 0);
            }
        }

        $this->flash('success', "Project '{$name}' created successfully.");
        return $this->redirect(url('/admin/projects/' . $newId . '/media'));
    }

    public function edit(Request $request, string $id): Response
    {
        $project = Project::find((int) $id);
        if (!$project) {
            $this->flash('error', 'Project not found.');
            return $this->redirect(url('/admin/projects'));
        }

        return $this->adminView('admin/projects/edit', [
            'seo_title' => 'Edit Project — ' . $project['name'],
            'project' => $project,
        ]);
    }

    public function update(Request $request, string $id): Response
    {
        $projectId = (int) $id;
        $project = Project::find($projectId);
        if (!$project) {
            $this->flash('error', 'Project not found.');
            return $this->redirect(url('/admin/projects'));
        }

        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid. Please try again.');
            return $this->redirect(url('/admin/projects/' . $projectId . '/edit'));
        }

        $name = (string) $request->input('name', $project['name']);
        $slug = (string) $request->input('slug', $project['slug']);
        $slug = slugify($slug ?: $name);

        // Check if slug taken by another project
        $existing = Project::findBySlug($slug);
        if ($existing && (int) $existing['id'] !== $projectId) {
            $slug .= '-' . time();
        }

        $brochureUrl = (string) $request->input('brochure_url', $project['brochure_url'] ?? '');
        $brochureFile = $request->file('brochure_file');
        if ($brochureFile && !empty($brochureFile['tmp_name'])) {
            $uploadedPdf = Uploader::upload($brochureFile, 'brochures');
            if ($uploadedPdf) {
                $brochureUrl = $uploadedPdf;
            }
        }

        $floorPlanUrl = (string) $request->input('floor_plan_url', $project['floor_plan_url'] ?? '');
        $floorPlanFile = $request->file('floor_plan_file');
        if ($floorPlanFile && !empty($floorPlanFile['tmp_name'])) {
            $uploadedFp = Uploader::upload($floorPlanFile, 'plans');
            if ($uploadedFp) {
                $floorPlanUrl = $uploadedFp;
            }
        }

        $paymentPlanUrl = (string) $request->input('payment_plan_url', $project['payment_plan_url'] ?? '');
        $paymentPlanFile = $request->file('payment_plan_file');
        if ($paymentPlanFile && !empty($paymentPlanFile['tmp_name'])) {
            $uploadedPp = Uploader::upload($paymentPlanFile, 'plans');
            if ($uploadedPp) {
                $paymentPlanUrl = $uploadedPp;
            }
        }

        $rawAmenities = (string) $request->raw('amenities', '');
        $amenityList = array_values(array_filter(array_map('trim', explode("\n", str_replace("\r", "", $rawAmenities)))));

        $payload = [
            'name' => $name,
            'slug' => $slug,
            'tagline' => (string) $request->input('tagline', ''),
            'location' => (string) $request->input('location', 'Vrindavan'),
            'google_maps_embed' => (string) $request->raw('google_maps_embed', ''),
            'starting_price' => (string) $request->input('starting_price', ''),
            'project_type' => (string) $request->input('project_type', 'Plotted Community'),
            'rera_id' => (string) $request->input('rera_id', ''),
            'mvda_approved' => (bool) $request->post('mvda_approved', 0),
            'project_size' => (string) $request->input('project_size', ''),
            'hero_video_url' => format_embed_url((string) $request->input('hero_video_url', '')),
            'overview' => (string) $request->raw('overview', ''),
            'amenities' => $amenityList,
            'brochure_url' => $brochureUrl,
            'floor_plan_url' => $floorPlanUrl,
            'payment_plan_url' => $paymentPlanUrl,
            'meta_title' => (string) $request->input('meta_title', ''),
            'meta_description' => (string) $request->input('meta_description', ''),
            'meta_keywords' => (string) $request->input('meta_keywords', ''),
        ];

        Project::update($projectId, $payload);

        // Handle Primary Cover / Elevation Image upload if provided
        $heroFile = $request->file('hero_image');
        if ($heroFile && !empty($heroFile['tmp_name']) && $heroFile['error'] === UPLOAD_ERR_OK) {
            $imgPath = Uploader::upload($heroFile, 'projects');
            if ($imgPath) {
                $existing = \Core\Database::fetch("SELECT `id` FROM `project_media` WHERE `project_id` = ? AND `media_type` IN ('gallery', 'elevation') ORDER BY `display_order` ASC, `id` ASC LIMIT 1", [$projectId]);
                if ($existing) {
                    \Core\Database::execute("UPDATE `project_media` SET `file_path` = ? WHERE `id` = ?", [$imgPath, $existing['id']]);
                } else {
                    \App\Models\ProjectMedia::create($projectId, $imgPath, 'gallery', $name . ' Primary Elevation', 0);
                }
            }
        }

        $this->flash('success', "Project '{$name}' updated successfully.");
        return $this->redirect(url('/admin/projects/' . $projectId . '/edit'));
    }

    public function delete(Request $request, string $id): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid.');
            return $this->redirect(url('/admin/projects'));
        }

        $projectId = (int) $id;
        $project = Project::find($projectId);
        if ($project) {
            Project::delete($projectId);
            $this->flash('success', "Project '{$project['name']}' deleted.");
        }

        return $this->redirect(url('/admin/projects'));
    }

    public function toggleStatus(Request $request, string $id): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            return Response::json(['success' => false, 'message' => 'Invalid security token'], 403);
        }

        $projectId = (int) $id;
        $project = Project::find($projectId);
        if (!$project) {
            return Response::json(['success' => false, 'message' => 'Project not found'], 404);
        }

        $newStatus = (int) $request->post('is_active', 0);
        
        \Core\Database::execute("UPDATE `projects` SET `is_active` = ? WHERE `id` = ?", [$newStatus, $projectId]);

        return Response::json(['success' => true, 'is_active' => $newStatus]);
    }
}
