<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Page;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;
use Core\Uploader;

/**
 * Class PageController
 *
 * CMS Page Management with SEO metadata customization.
 */
class PageController extends Controller
{
    public function index(): Response
    {
        $pages = Page::all();

        return $this->adminView('admin/pages/index', [
            'seo_title' => 'Page Management',
            'pages' => $pages,
        ]);
    }

    public function create(): Response
    {
        return $this->adminView('admin/pages/create', [
            'seo_title' => 'Create New Page',
        ]);
    }

    public function store(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid.');
            return $this->redirect(url('/admin/pages/create'));
        }

        $title = (string) $request->input('title', '');
        if (empty($title)) {
            $this->flash('error', 'Page title is required.');
            return $this->redirect(url('/admin/pages/create'));
        }

        $slug = (string) $request->input('slug', '');
        $slug = slugify($slug ?: $title);

        if (Page::findBySlug($slug)) {
            $slug .= '-' . time();
        }

        // Hero media upload
        $heroMediaUrl = (string) $request->input('hero_media_url', '');
        $heroFile = $request->file('hero_media_file');
        if ($heroFile && !empty($heroFile['tmp_name'])) {
            $uploaded = Uploader::upload($heroFile, 'pages');
            if ($uploaded) {
                $heroMediaUrl = $uploaded;
            }
        }

        $payload = [
            'title' => $title,
            'slug' => $slug,
            'hero_heading' => (string) $request->input('hero_heading', $title),
            'hero_subheading' => (string) $request->input('hero_subheading', ''),
            'hero_media_type' => (string) $request->input('hero_media_type', 'image'),
            'hero_media_url' => $heroMediaUrl,
            'content' => (string) $request->raw('content', ''),
            'meta_title' => (string) $request->input('meta_title', ''),
            'meta_description' => (string) $request->input('meta_description', ''),
            'meta_keywords' => (string) $request->input('meta_keywords', ''),
            'is_published' => (bool) $request->post('is_published', 1),
        ];

        Page::create($payload);

        $this->flash('success', "Page '{$title}' published successfully.");
        return $this->redirect(url('/admin/pages'));
    }

    public function edit(Request $request, string $id): Response
    {
        $page = Page::find((int) $id);
        if (!$page) {
            $this->flash('error', 'Page not found.');
            return $this->redirect(url('/admin/pages'));
        }

        return $this->adminView('admin/pages/edit', [
            'seo_title' => 'Edit Page — ' . $page['title'],
            'page' => $page,
        ]);
    }

    public function update(Request $request, string $id): Response
    {
        $pageId = (int) $id;
        $page = Page::find($pageId);
        if (!$page) {
            $this->flash('error', 'Page not found.');
            return $this->redirect(url('/admin/pages'));
        }

        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid.');
            return $this->redirect(url('/admin/pages/' . $pageId . '/edit'));
        }

        $title = (string) $request->input('title', $page['title']);
        $slug = (string) $request->input('slug', $page['slug']);
        $slug = slugify($slug ?: $title);

        $heroMediaUrl = (string) $request->input('hero_media_url', $page['hero_media_url'] ?? '');
        $heroFile = $request->file('hero_media_file');
        if ($heroFile && !empty($heroFile['tmp_name'])) {
            $uploaded = Uploader::upload($heroFile, 'pages');
            if ($uploaded) {
                $heroMediaUrl = $uploaded;
            }
        }

        $payload = [
            'title' => $title,
            'slug' => $slug,
            'hero_heading' => (string) $request->input('hero_heading', $title),
            'hero_subheading' => (string) $request->input('hero_subheading', ''),
            'hero_media_type' => (string) $request->input('hero_media_type', 'image'),
            'hero_media_url' => $heroMediaUrl,
            'content' => (string) $request->raw('content', ''),
            'meta_title' => (string) $request->input('meta_title', ''),
            'meta_description' => (string) $request->input('meta_description', ''),
            'meta_keywords' => (string) $request->input('meta_keywords', ''),
            'is_published' => (bool) $request->post('is_published', 1),
        ];

        Page::update($pageId, $payload);

        $this->flash('success', "Page '{$title}' updated.");
        return $this->redirect(url('/admin/pages/' . $pageId . '/edit'));
    }

    public function delete(Request $request, string $id): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid.');
            return $this->redirect(url('/admin/pages'));
        }

        $pageId = (int) $id;
        $page = Page::find($pageId);
        if ($page) {
            Page::delete($pageId);
            $this->flash('success', "Page '{$page['title']}' deleted.");
        }

        return $this->redirect(url('/admin/pages'));
    }
}
