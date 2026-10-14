<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Project;
use App\Models\ProjectMedia;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;
use Core\Uploader;

/**
 * Class MediaController
 *
 * Media asset management: galleries, floor plans, elevations, and video embeds.
 */
class MediaController extends Controller
{
    public function index(Request $request, string $id): Response
    {
        $id = (int) $id;
        $project = Project::find($id);
        if (!$project) {
            $this->flash('error', 'Project not found.');
            return $this->redirect(url('/admin/projects'));
        }

        $gallery = ProjectMedia::forProject($id, 'gallery');
        $floorplans = ProjectMedia::forProject($id, 'floorplan');
        $elevations = ProjectMedia::forProject($id, 'elevation');
        $videos = ProjectMedia::forProject($id, 'video');

        return $this->adminView('admin/projects/media', [
            'seo_title' => 'Media Manager — ' . $project['name'],
            'project' => $project,
            'gallery' => $gallery,
            'floorplans' => $floorplans,
            'elevations' => $elevations,
            'videos' => $videos,
        ]);
    }

    public function upload(Request $request, string $id): Response
    {
        $id = (int) $id;
        $project = Project::find($id);
        if (!$project) {
            $this->flash('error', 'Project not found.');
            return $this->redirect(url('/admin/projects'));
        }

        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid.');
            return $this->redirect(url('/admin/projects/' . $id . '/media'));
        }

        $mediaType = (string) $request->input('media_type', 'gallery');
        $caption = (string) $request->input('caption', '');

        // Video embed URL submission
        if ($mediaType === 'video') {
            $videoUrl = format_embed_url((string) $request->input('video_url', ''));
            if (!empty($videoUrl)) {
                ProjectMedia::create($id, $videoUrl, 'video', $caption ?: 'Project Video Tour', 0);
                $this->flash('success', 'Video embed link added successfully.');
            }
            return $this->redirect(url('/admin/projects/' . $id . '/media'));
        }

        // File upload
        $file = $request->file('media_file');
        if ($file && !empty($file['tmp_name'])) {
            $folder = $mediaType === 'floorplan' ? 'floorplans' : 'projects';
            $uploaded = Uploader::upload($file, $folder);
            if ($uploaded) {
                ProjectMedia::create($id, $uploaded, $mediaType, $caption, 0);
                $this->flash('success', ucfirst($mediaType) . ' asset uploaded successfully.');
            } else {
                $this->flash('error', 'Failed to upload asset. Supported formats: JPG, PNG, WEBP, PDF.');
            }
        } else {
            $this->flash('error', 'No file was selected.');
        }

        return $this->redirect(url('/admin/projects/' . $id . '/media'));
    }

    public function delete(Request $request, string $id): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid.');
            return $this->redirect(url('/admin/projects'));
        }

        $mediaId = (int) $id;
        $media = ProjectMedia::find($mediaId);
        $projectId = $media['project_id'] ?? 0;

        if ($media) {
            ProjectMedia::delete($mediaId);
            $this->flash('success', 'Media asset removed.');
        }

        return $this->redirect(url('/admin/projects/' . $projectId . '/media'));
    }
}
