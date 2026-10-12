<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of published blog articles.
     */
    public function index(Request $request): View
    {
        $query = Blog::published()->with(['category', 'author'])->latest('published_at');

        if ($request->filled('search')) {
            $search = (string) $request->input('search');
            $escaped = str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $search);
            $query->where(function ($q) use ($escaped) {
                $q->where('title', 'like', "%{$escaped}%")
                    ->orWhere('excerpt', 'like', "%{$escaped}%")
                    ->orWhere('tags', 'like', "%{$escaped}%");
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        $featuredBlog = null;
        if (! $request->filled('search') && ! $request->filled('category')) {
            $featuredBlog = Blog::published()->featured()->with(['category', 'author'])->latest('published_at')->first();
            if ($featuredBlog) {
                $query->where('id', '!=', $featuredBlog->id);
            }
        }

        $blogs = $query->paginate(9)->withQueryString();
        $categories = BlogCategory::withCount(['blogs' => fn ($q) => $q->published()])->get();

        return view('blog.index', compact('blogs', 'featuredBlog', 'categories'));
    }

    /**
     * Filter articles by category slug.
     */
    public function category(string $slug): View
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();

        $blogs = Blog::published()
            ->where('category_id', $category->id)
            ->with(['category', 'author'])
            ->latest('published_at')
            ->paginate(9);

        $categories = BlogCategory::withCount(['blogs' => fn ($q) => $q->published()])->get();

        return view('blog.index', [
            'blogs' => $blogs,
            'featuredBlog' => null,
            'categories' => $categories,
            'currentCategory' => $category,
        ]);
    }

    /**
     * Display a single blog article with SEO metadata & FAQs.
     */
    public function show(string $slug): View
    {
        $blog = Blog::with(['category', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();

        $isAdmin = auth()->check() && auth()->user()->isAdmin();

        // If article is not published, only allow access to authenticated administrators
        if ($blog->status !== 'published' && ! $isAdmin) {
            abort(404);
        }

        // Increment view count for normal readers
        if ($blog->status === 'published' && ! $isAdmin) {
            $blog->increment('view_count');
        }

        // Related articles in same category
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->where('category_id', $blog->category_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        if ($relatedBlogs->count() < 3) {
            $moreBlogs = Blog::published()
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->latest('published_at')
                ->take(3 - $relatedBlogs->count())
                ->get();

            $relatedBlogs = $relatedBlogs->merge($moreBlogs);
        }

        return view('blog.show', compact('blog', 'relatedBlogs'));
    }
}
