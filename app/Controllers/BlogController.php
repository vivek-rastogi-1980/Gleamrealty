<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Blog;
use App\Models\Project;
use Core\Controller;
use Core\Request;
use Core\Response;

/**
 * Class BlogController
 *
 * Public blog magazine, investment guides, and real estate market reports
 * for Vrindavan, Mathura, and the Braj growth corridor.
 */
class BlogController extends Controller
{
    /**
     * Blog index / directory.
     */
    public function index(Request $request): Response
    {
        $selectedCategory = trim((string) $request->query('category', ''));
        $searchQuery = trim((string) $request->query('q', ''));

        $allPublished = Blog::published();
        $filtered = [];

        foreach ($allPublished as $article) {
            if (!empty($selectedCategory) && strcasecmp((string) ($article['category'] ?? ''), $selectedCategory) !== 0) {
                continue;
            }
            if (!empty($searchQuery)) {
                $term = mb_strtolower($searchQuery);
                $haystack = mb_strtolower(($article['title'] ?? '') . ' ' . ($article['excerpt'] ?? '') . ' ' . ($article['tags'] ?? ''));
                if (!str_contains($haystack, $term)) {
                    continue;
                }
            }
            $filtered[] = $article;
        }

        // Feature the primary article if viewing all
        $featuredArticle = null;
        $gridArticles = $filtered;
        if (empty($selectedCategory) && empty($searchQuery) && !empty($filtered)) {
            $featuredArticle = $filtered[0];
            $gridArticles = array_slice($filtered, 1);
        }

        $categories = Blog::categories();

        return $this->view('public/blog/index', [
            'seo_title' => 'Braj Real Estate Blog & Market Intelligence | Gleamrealty',
            'seo_description' => 'Expert analyses on Vrindavan Master Plan 2031, MVDA approval processes, NH-19 corridor growth, circle rates, and luxury plotted township valuations.',
            'seo_keywords' => 'Vrindavan Real Estate Blog, MVDA 2031 Master Plan, Braj Land Rates, Plots in Vrindavan Investment, Mathura Development Authority',
            'articles' => $gridArticles,
            'featured' => $featuredArticle,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'searchQuery' => $searchQuery,
            'totalCount' => count($filtered),
        ]);
    }

    /**
     * Single blog post reading view.
     */
    public function show(Request $request, string $slug): Response
    {
        $slug = trim($slug);
        $blog = Blog::findBySlug($slug);

        if (!$blog || (int) ($blog['is_published'] ?? 1) !== 1) {
            return Response::html(
                '<!DOCTYPE html><html><head><title>Article Not Found — Gleamrealty</title><style>body{background:#090d16;color:#fff;font-family:\'Plus Jakarta Sans\',sans-serif;display:flex;align-items:center;justify-content:center;height:100vh;margin:0;text-align:center;}h1{font-size:36px;color:#c5a880;}p{color:#888;}a{color:#c5a880;text-decoration:none;font-weight:600;}</style></head><body><div><h1>Article Not Found</h1><p>The requested editorial article may have been archived or moved.</p><p style="margin-top:24px;"><a href="' . url('/blog') . '">&larr; Return to Blog Directory</a></p></div></body></html>',
                404
            );
        }

        $recentArticles = Blog::recent(3, (int) $blog['id']);

        // Related projects for consultation sidebar
        try {
            $featuredProjects = Project::all('', null);
            $featuredProjects = array_slice($featuredProjects, 0, 3);
        } catch (\Throwable $e) {
            $featuredProjects = [];
        }

        return $this->view('public/blog/show', [
            'seo_title' => $blog['meta_title'] ?: $blog['title'],
            'seo_description' => $blog['meta_description'] ?: $blog['excerpt'],
            'seo_keywords' => $blog['tags'] ?: 'Vrindavan Property, Braj Real Estate, MVDA Approved',
            'og_image' => $blog['featured_image'] ?? 'uploads/pages/residential-plots-in-vrindavan.jpeg',
            'canonical_url' => url('/blog/' . $blog['slug']),
            'blog' => $blog,
            'recentArticles' => $recentArticles,
            'featuredProjects' => $featuredProjects,
        ]);
    }
}
