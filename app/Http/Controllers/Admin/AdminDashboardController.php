<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Show the admin dashboard overview.
     */
    public function index(): View
    {
        $totalBlogs = Blog::count();
        $publishedBlogs = Blog::where('status', 'published')->count();
        $totalCategories = BlogCategory::count();

        $totalEnrollments = Enrollment::count();
        $pendingEnrollments = Enrollment::where('status', 'pending')->count();
        $recentEnrollments = Enrollment::latest()->take(6)->get();

        $recentBlogs = Blog::with('category')->latest()->take(5)->get();

        try {
            $pageViews = (int) (Redis::get('page_views:home') ?? 0);
        } catch (\Throwable $e) {
            $pageViews = 0;
        }

        return view('admin.dashboard', compact(
            'totalBlogs',
            'publishedBlogs',
            'totalCategories',
            'totalEnrollments',
            'pendingEnrollments',
            'recentEnrollments',
            'recentBlogs',
            'pageViews'
        ));
    }
}
