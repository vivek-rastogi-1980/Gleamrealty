<?php

declare(strict_types=1);

namespace App\Controllers\Admin;

use App\Models\Blog;
use Core\Controller;
use Core\Csrf;
use Core\Request;
use Core\Response;
use Core\Uploader;

/**
 * Class BlogController
 *
 * Full editorial management for Gleamrealty Braj real estate blogs,
 * investment guides, and market reports.
 */
class BlogController extends Controller
{
    /**
     * Display listing of blog articles.
     */
    public function index(Request $request): Response
    {
        $search = trim((string) $request->query('search', ''));
        $category = trim((string) $request->query('category', ''));

        $allBlogs = Blog::all();
        $filtered = [];

        foreach ($allBlogs as $b) {
            if (!empty($category) && strcasecmp((string) ($b['category'] ?? ''), $category) !== 0) {
                continue;
            }
            if (!empty($search)) {
                $term = mb_strtolower($search);
                $haystack = mb_strtolower(($b['title'] ?? '') . ' ' . ($b['excerpt'] ?? '') . ' ' . ($b['author'] ?? ''));
                if (!str_contains($haystack, $term)) {
                    continue;
                }
            }
            $filtered[] = $b;
        }

        return $this->adminView('admin/blogs/index', [
            'seo_title' => 'Blog & Editorial Management',
            'blogs' => $filtered,
            'categories' => Blog::categories(),
            'search' => $search,
            'selected_category' => $category,
        ]);
    }

    /**
     * Show form for creating a new blog article.
     */
    public function create(): Response
    {
        return $this->adminView('admin/blogs/create', [
            'seo_title' => 'Write New Blog Article',
            'categories' => Blog::categories(),
        ]);
    }

    /**
     * Store newly created blog article in storage.
     */
    public function store(Request $request): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid. Please try again.');
            return $this->redirect(url('/admin/blogs/create'));
        }

        $title = trim((string) $request->input('title', ''));
        if (empty($title)) {
            $this->flash('error', 'Article title is required.');
            return $this->redirect(url('/admin/blogs/create'));
        }

        $slug = trim((string) $request->input('slug', ''));
        $content = (string) $request->raw('content', '');
        if (empty($content)) {
            $this->flash('error', 'Article body content cannot be empty.');
            return $this->redirect(url('/admin/blogs/create'));
        }

        // Handle image upload
        $featuredImage = trim((string) $request->input('featured_image', ''));
        $imageFile = $request->file('featured_image_file');
        if ($imageFile && !empty($imageFile['tmp_name'])) {
            $uploaded = Uploader::upload($imageFile, 'blogs');
            if ($uploaded) {
                $featuredImage = $uploaded;
            }
        }

        $payload = [
            'title' => $title,
            'slug' => $slug,
            'category' => (string) $request->input('category', 'Market Trends & Growth'),
            'excerpt' => (string) $request->input('excerpt', ''),
            'content' => $content,
            'featured_image' => $featuredImage,
            'author' => (string) $request->input('author', 'Gleamrealty Advisory Desk'),
            'read_time' => (string) $request->input('read_time', '5 min read'),
            'tags' => (string) $request->input('tags', 'Vrindavan, Property, Investment'),
            'meta_title' => (string) $request->input('meta_title', ''),
            'meta_description' => (string) $request->input('meta_description', ''),
            'is_published' => (int) $request->post('is_published', 1),
            'published_at' => (string) $request->input('published_at', date('Y-m-d H:i:s')),
        ];

        $newId = Blog::create($payload);

        $this->flash('success', "Article '{$title}' published successfully.");
        return $this->redirect(url('/admin/blogs/' . $newId . '/edit'));
    }

    /**
     * Show form for editing an existing blog article.
     */
    public function edit(Request $request, string $id): Response
    {
        $blog = Blog::find((int) $id);
        if (!$blog) {
            $this->flash('error', 'Blog article not found.');
            return $this->redirect(url('/admin/blogs'));
        }

        return $this->adminView('admin/blogs/edit', [
            'seo_title' => 'Edit Article — ' . $blog['title'],
            'blog' => $blog,
            'categories' => Blog::categories(),
        ]);
    }

    /**
     * Update an existing blog article in storage.
     */
    public function update(Request $request, string $id): Response
    {
        $blogId = (int) $id;
        $blog = Blog::find($blogId);
        if (!$blog) {
            $this->flash('error', 'Blog article not found.');
            return $this->redirect(url('/admin/blogs'));
        }

        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid. Please try again.');
            return $this->redirect(url('/admin/blogs/' . $blogId . '/edit'));
        }

        $title = trim((string) $request->input('title', $blog['title']));
        if (empty($title)) {
            $this->flash('error', 'Article title cannot be empty.');
            return $this->redirect(url('/admin/blogs/' . $blogId . '/edit'));
        }

        $slug = trim((string) $request->input('slug', $blog['slug']));
        $content = (string) $request->raw('content', $blog['content']);

        // Handle image upload
        $featuredImage = trim((string) $request->input('featured_image', $blog['featured_image'] ?? ''));
        $imageFile = $request->file('featured_image_file');
        if ($imageFile && !empty($imageFile['tmp_name'])) {
            $uploaded = Uploader::upload($imageFile, 'blogs');
            if ($uploaded) {
                $featuredImage = $uploaded;
            }
        }

        $payload = [
            'title' => $title,
            'slug' => $slug,
            'category' => (string) $request->input('category', $blog['category'] ?? 'Market Trends & Growth'),
            'excerpt' => (string) $request->input('excerpt', ''),
            'content' => $content,
            'featured_image' => $featuredImage,
            'author' => (string) $request->input('author', $blog['author'] ?? 'Gleamrealty Advisory Desk'),
            'read_time' => (string) $request->input('read_time', $blog['read_time'] ?? '5 min read'),
            'tags' => (string) $request->input('tags', $blog['tags'] ?? 'Vrindavan, Property, Investment'),
            'meta_title' => (string) $request->input('meta_title', ''),
            'meta_description' => (string) $request->input('meta_description', ''),
            'is_published' => (int) $request->post('is_published', 0),
            'published_at' => (string) $request->input('published_at', $blog['published_at'] ?? date('Y-m-d H:i:s')),
        ];

        Blog::update($blogId, $payload);

        $this->flash('success', "Article '{$title}' updated successfully.");
        return $this->redirect(url('/admin/blogs/' . $blogId . '/edit'));
    }

    /**
     * Delete an article from storage.
     */
    public function delete(Request $request, string $id): Response
    {
        if (!Csrf::validate($request->post('_csrf_token'))) {
            $this->flash('error', 'Security token invalid.');
            return $this->redirect(url('/admin/blogs'));
        }

        $blogId = (int) $id;
        $blog = Blog::find($blogId);
        if ($blog) {
            Blog::delete($blogId);
            $this->flash('success', "Article '{$blog['title']}' deleted.");
        }

        return $this->redirect(url('/admin/blogs'));
    }
}
