<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML sitemap for search engines.
     */
    public function index(): Response
    {
        $categories = BlogCategory::whereHas('blogs', fn ($q) => $q->published())->get();
        $blogs = Blog::published()->latest('updated_at')->get();

        $content = view('sitemap', [
            'categories' => $categories,
            'blogs' => $blogs,
        ])->render();

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Output robots.txt dynamically with sitemap declaration.
     */
    public function robots(): Response
    {
        $sitemapUrl = route('sitemap');
        $content = "User-agent: *\nDisallow: /admin/\nDisallow: /login\n\nSitemap: {$sitemapUrl}\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
