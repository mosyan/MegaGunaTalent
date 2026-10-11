<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class GermanCourseController extends Controller
{
    /**
     * Display the German course landing page (1:1 design duplicate).
     */
    public function index(): View
    {
        // Example reading stats or cached counter from Redis
        try {
            Redis::incr('page_views:home');
            $views = Redis::get('page_views:home');
        } catch (\Throwable $e) {
            $views = null;
        }

        $programs = [
            [
                'title' => 'Beginner',
                'icon' => 'images/shape-beginner.svg',
                'description' => 'Focus on practical communication skills for travelers and those new to the language.',
            ],
            [
                'title' => 'Intermediate',
                'icon' => 'images/shape-intermediate.svg',
                'description' => 'Building upon basic grammar, expanding vocabulary, and developing conversational fluency.',
            ],
            [
                'title' => 'Advanced',
                'icon' => 'images/shape-advanced.svg',
                'description' => 'Tailored for those needing German in their careers, focusing on business or technical German.',
            ],
        ];

        return view('home', compact('programs', 'views'));
    }

    /**
     * Display the enrollment page.
     */
    public function enroll(): View
    {
        return view('enroll');
    }

    /**
     * Display the About Us page (LPK Profile, Vision-Mission, Founder, & Facilities).
     */
    public function about(): View
    {
        return view('about');
    }

    /**
     * Store a new enrollment submission.
     */
    public function storeEnrollment(Request $request): RedirectResponse
    {
        // Silent drop for automated spam bots triggering honeypot
        if ($request->filled('honeypot_website')) {
            return redirect()->back()->with('success', "Thank you! We'll get in touch with you as soon as possible.");
        }

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'program_level' => ['nullable', 'string', 'in:Beginner,Intermediate,Advanced'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $enrollment = Enrollment::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'program_level' => $validated['program_level'] ?? 'Beginner',
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        try {
            Redis::lpush('recent_enrollments', json_encode([
                'id' => $enrollment->id,
                'name' => $enrollment->first_name.' '.$enrollment->last_name,
                'email' => $enrollment->email,
                'level' => $enrollment->program_level,
                'time' => now()->toIso8601String(),
            ]));
            Redis::ltrim('recent_enrollments', 0, 49);
        } catch (\Throwable $e) {
            // Log fallback if Redis is busy
        }

        return redirect()->back()->with('success', "Thank you! We'll get in touch with you as soon as possible.");
    }
}
