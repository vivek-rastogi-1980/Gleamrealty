<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use Core\Auth;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;
use Core\View;

/**
 * Class AuthController
 *
 * Handles Admin authentication, sessions, and CSRF verification.
 */
class AuthController extends Controller
{
    public function showLogin(): Response
    {
        if (Auth::check()) {
            return $this->redirect(url('/admin/dashboard'));
        }

        $html = View::render('admin/login', [
            'seo_title' => 'Admin Sign In | Gleamrealty',
        ], null);

        return Response::html($html);
    }

    public function login(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token expired. Please try again.');
            return $this->redirect(url('/admin/login'));
        }

        $login = (string) $request->input('login', '');
        $password = (string) $request->raw('password', '');

        if (empty($login) || empty($password)) {
            $this->flash('error', 'Please enter your username/email and password.');
            return $this->redirect(url('/admin/login'));
        }

        if (Auth::attempt($login, $password)) {
            $this->flash('success', 'Welcome back to Gleamrealty Admin Console.');
            return $this->redirect(url('/admin/dashboard'));
        }

        $this->flash('error', 'Invalid credentials. Please verify your login details.');
        return $this->redirect(url('/admin/login'));
    }

    public function logout(): Response
    {
        Auth::logout();
        $this->flash('success', 'You have been successfully logged out.');
        return $this->redirect(url('/admin/login'));
    }
}
