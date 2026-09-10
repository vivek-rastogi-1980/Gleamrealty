<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Inquiry;
use App\Models\Project;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;

/**
 * Class InquiryController
 *
 * Inbound leads management and CSV export.
 */
class InquiryController extends Controller
{
    public function index(Request $request): Response
    {
        $projectId = (int) $request->query('project_id', 0);
        $search = (string) $request->query('search', '');

        $inquiries = Inquiry::all($projectId > 0 ? $projectId : null, $search);
        $projects = Project::all();

        return $this->adminView('admin/inquiries/index', [
            'seo_title' => 'Inquiry Leads & CRM',
            'inquiries' => $inquiries,
            'projects' => $projects,
            'selected_project' => $projectId,
            'search' => $search,
        ]);
    }

    /**
     * Export leads to downloadable CSV file.
     */
    public function export(Request $request): Response
    {
        $this->requireAuth();

        $projectId = (int) $request->query('project_id', 0);
        $headers = ['ID', 'Date', 'Client Name', 'Phone', 'Email', 'Project Name', 'Budget Range', 'Message'];
        $rows = Inquiry::exportRows($projectId > 0 ? $projectId : null);

        $fileName = 'gleamrealty_leads_' . date('Y-m-d_His') . '.csv';

        return Response::csv($headers, $rows, $fileName);
    }

    public function delete(Request $request, string $id): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid.');
            return $this->redirect(url('/admin/inquiries'));
        }

        $leadId = (int) $id;
        Inquiry::delete($leadId);

        $this->flash('success', 'Lead inquiry removed.');
        return $this->redirect(url('/admin/inquiries'));
    }
}
