<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Inquiry;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;

/**
 * Class InquiryController
 *
 * Public inquiry submission handler.
 */
class InquiryController extends Controller
{
    public function submit(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token expired. Please re-submit your inquiry.');
            return $this->redirect($request->uri() ?: url('/'));
        }

        $name = (string) $request->input('name', '');
        $phone = (string) $request->input('phone', '');

        if (empty($name) || empty($phone)) {
            $this->flash('error', 'Please provide your full name and valid contact phone number.');
            return $this->redirect($request->uri() ?: url('/'));
        }

        $payload = [
            'project_id' => $request->input('project_id'),
            'name' => $name,
            'phone' => $phone,
            'email' => (string) $request->input('email', ''),
            'budget_range' => (string) $request->input('budget_range', ''),
            'message' => (string) $request->input('message', ''),
        ];

        Inquiry::create($payload);

        $this->flash('success', 'Thank you! Your inquiry has been dispatched to our VIP real estate advisory team.');
        $redirectUrl = (string) $request->post('return_url', url('/'));
        return $this->redirect($redirectUrl);
    }
}
