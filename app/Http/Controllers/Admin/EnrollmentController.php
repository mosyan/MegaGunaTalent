<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of student enrollment applications.
     */
    public function index(Request $request): View
    {
        $query = Enrollment::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('program_level')) {
            $query->where('program_level', $request->input('program_level'));
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $enrollments = $query->paginate(15)->withQueryString();

        return view('admin.enrollments.index', compact('enrollments'));
    }

    /**
     * Update the status of an enrollment application.
     */
    public function updateStatus(Request $request, Enrollment $enrollment): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,contacted,enrolled,rejected'],
        ]);

        $enrollment->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', "Status for {$enrollment->first_name} updated to {$validated['status']}.");
    }

    /**
     * Remove the enrollment submission.
     */
    public function destroy(Enrollment $enrollment): RedirectResponse
    {
        $enrollment->delete();

        return redirect()->back()->with('success', 'Enrollment record removed.');
    }
}
