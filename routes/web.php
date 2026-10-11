<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GermanCourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page & Enrollment (Protected by rate limiting on submission)
Route::get('/', [GermanCourseController::class, 'index'])->name('home');
Route::get('/enroll-now', [GermanCourseController::class, 'enroll'])->name('enroll');
Route::post('/enroll-now', [GermanCourseController::class, 'storeEnrollment'])
    ->middleware('throttle:10,1')
    ->name('enroll.store');
Route::get('/about', [GermanCourseController::class, 'about'])->name('about');

// Language Study Programs
Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');
Route::get('/programs/{slug}', [ProgramController::class, 'show'])->name('programs.show');

// Public Article Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Dynamic SEO Sitemap & Robots
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

/*
|--------------------------------------------------------------------------
| Admin Portal & Management Routes
|--------------------------------------------------------------------------
*/

// Guest Login & Auth (Protected by brute-force rate limiting)
Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->middleware('throttle:6,1')
        ->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    // Authenticated & Admin-only Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        // Dashboard
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Page Customizer & Dynamic Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

        // Blog & Categories CRUD
        Route::resource('blogs', AdminBlogController::class);
        Route::resource('blog-categories', BlogCategoryController::class)->except(['create', 'show', 'edit']);

        // Student Enrollment Inquiries & CRM
        Route::get('/enrollments', [EnrollmentController::class, 'index'])->name('enrollments.index');
        Route::get('/enrollments/export', [EnrollmentController::class, 'exportCsv'])->name('enrollments.export');
        Route::patch('/enrollments/{enrollment}/status', [EnrollmentController::class, 'updateStatus'])->name('enrollments.status');
        Route::patch('/enrollments/{enrollment}/notes', [EnrollmentController::class, 'updateNotes'])->name('enrollments.notes');
        Route::delete('/enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');

        // Admin Profile & Security
        Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile');
        Route::put('/profile/password', [AdminAuthController::class, 'updatePassword'])->name('profile.password');
    });
});
