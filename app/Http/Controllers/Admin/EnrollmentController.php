<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
     * Update internal administrator notes for an enrollment inquiry.
     */
    public function updateNotes(Request $request, Enrollment $enrollment): RedirectResponse
    {
        $validated = $request->validate([
            'admin_notes' => ['nullable', 'string', 'max:5000'],
        ]);

        $enrollment->update(['admin_notes' => $validated['admin_notes'] ?? null]);

        return redirect()->back()->with('success', "Notes saved for {$enrollment->first_name}.");
    }

    /**
     * Export enrollment leads as a CSV file.
     */
    public function exportCsv(Request $request): StreamedResponse
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

        $enrollments = $query->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="enrollments_export_'.now()->format('Y-m-d_His').'.csv"',
        ];

        return response()->stream(function () use ($enrollments) {
            $handle = fopen('php://output', 'w');
            fwrite($handle, "\xEF\xBB\xBF"); // UTF-8 BOM

            fputcsv($handle, [
                'ID',
                'First Name',
                'Last Name',
                'Email',
                'Phone',
                'Program Level',
                'Message',
                'Status',
                'Admin Notes',
                'Submitted Date',
            ]);

            foreach ($enrollments as $item) {
                fputcsv($handle, [
                    $item->id,
                    $item->first_name,
                    $item->last_name,
                    $item->email,
                    $item->phone ?? '-',
                    $item->program_level,
                    $item->message,
                    ucfirst($item->status),
                    $item->admin_notes ?? '',
                    $item->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($handle);
        }, 200, $headers);
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
