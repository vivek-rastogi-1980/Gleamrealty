<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Inquiry;
use App\Models\Page;
use App\Models\Project;
use App\Models\ProjectMedia;
use Core\Controller;
use Core\Response;

/**
 * Class DashboardController
 *
 * KPI metrics and recent platform activity.
 */
class DashboardController extends Controller
{
    public function index(): Response
    {
        $projectCount = Project::count();
        $pageCount = Page::count();
        $inquiryCount = Inquiry::count();
        $mediaCount = ProjectMedia::count();
        $blogCount = count(\App\Models\Blog::all());

        $recentInquiries = array_slice(Inquiry::all(), 0, 6);
        $recentProjects = array_slice(Project::all(), 0, 6);

        return $this->adminView('admin/dashboard', [
            'seo_title' => 'Executive Dashboard',
            'project_count' => $projectCount,
            'page_count' => $pageCount,
            'inquiry_count' => $inquiryCount,
            'media_count' => $mediaCount,
            'blog_count' => $blogCount,
            'recent_inquiries' => $recentInquiries,
            'recent_projects' => $recentProjects,
        ]);
    }
}
