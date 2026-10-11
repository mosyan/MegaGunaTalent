<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of blog articles.
     */
    public function index(Request $request): View
    {
        $query = Blog::with(['category', 'author'])->latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%")
                    ->orWhere('focus_keyword', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $blogs = $query->paginate(12)->withQueryString();
        $categories = BlogCategory::all();

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new article.
     */
    public function create(): View
    {
        $categories = BlogCategory::all();

        return view('admin.blogs.form', compact('categories'));
    }

    /**
     * Store a newly created article in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:blogs,slug'],
            'category_id' => ['required', 'exists:blog_categories,id'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:3072'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'focus_keyword' => ['nullable', 'string', 'max:255'],
            'canonical_url' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable', 'string', 'max:500'],
            'faq_schema' => ['nullable', 'array'],
            'faq_schema.*.question' => ['nullable', 'string'],
            'faq_schema.*.answer' => ['nullable', 'string'],
            'key_takeaways' => ['nullable', 'array'],
            'key_takeaways.*' => ['nullable', 'string'],
        ]);

        $validated['slug'] = Str::slug($validated['slug'] ?? $validated['title']);
        $validated['author_id'] = auth()->id();
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['published_at'] = $validated['status'] === 'published' ? now() : null;

        // Image upload handling
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('uploads/blogs', 'public');
            $validated['featured_image'] = Storage::url($path);
        }

        // Clean up FAQs
        if (! empty($validated['faq_schema'])) {
            $validated['faq_schema'] = array_values(array_filter($validated['faq_schema'], fn ($faq) => ! empty($faq['question']) && ! empty($faq['answer'])));
        } else {
            $validated['faq_schema'] = [];
        }

        // Clean up Key Takeaways
        if (! empty($validated['key_takeaways'])) {
            $validated['key_takeaways'] = array_values(array_filter($validated['key_takeaways'], fn ($takeaway) => ! empty($takeaway)));
        } else {
            $validated['key_takeaways'] = [];
        }

        $blog = Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', "Article '{$blog->title}' created successfully!");
    }

    /**
     * Show the form for editing the article.
     */
    public function edit(Blog $blog): View
    {
        $categories = BlogCategory::all();

        return view('admin.blogs.form', compact('blog', 'categories'));
    }

    /**
     * Update the specified article in storage.
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:blogs,slug,'.$blog->id],
            'category_id' => ['required', 'exists:blog_categories,id'],
            'excerpt' => ['nullable', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:3072'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'focus_keyword' => ['nullable', 'string', 'max:255'],
            'canonical_url' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable', 'string', 'max:500'],
            'faq_schema' => ['nullable', 'array'],
            'faq_schema.*.question' => ['nullable', 'string'],
            'faq_schema.*.answer' => ['nullable', 'string'],
            'key_takeaways' => ['nullable', 'array'],
            'key_takeaways.*' => ['nullable', 'string'],
        ]);

        $validated['slug'] = Str::slug($validated['slug']);
        $validated['is_featured'] = $request->boolean('is_featured');

        if ($validated['status'] === 'published' && empty($blog->published_at)) {
            $validated['published_at'] = now();
        }

        // Image upload handling
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('uploads/blogs', 'public');
            $validated['featured_image'] = Storage::url($path);
        }

        // Clean up FAQs
        if (isset($validated['faq_schema'])) {
            $validated['faq_schema'] = array_values(array_filter($validated['faq_schema'], fn ($faq) => ! empty($faq['question']) && ! empty($faq['answer'])));
        } else {
            $validated['faq_schema'] = [];
        }

        // Clean up Key Takeaways
        if (isset($validated['key_takeaways'])) {
            $validated['key_takeaways'] = array_values(array_filter($validated['key_takeaways'], fn ($takeaway) => ! empty($takeaway)));
        } else {
            $validated['key_takeaways'] = [];
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', "Article '{$blog->title}' updated successfully!");
    }

    /**
     * Remove the specified article from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $title = $blog->title;
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', "Article '{$title}' deleted successfully.");
    }
}
