<?php

namespace App\Http\Controllers;

use App\Services\ProgramCatalog;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProgramController extends Controller
{
    /**
     * Display the programs overview directory.
     */
    public function index(): View
    {
        $programs = ProgramCatalog::all();

        return view('programs.index', compact('programs'));
    }

    /**
     * Display the detail page for a specific German learning program.
     */
    public function show(string $slug): View
    {
        $program = ProgramCatalog::find($slug);

        if (! $program) {
            throw new NotFoundHttpException("Program [{$slug}] not found.");
        }

        // Get other programs for cross-navigation
        $otherPrograms = array_filter(
            ProgramCatalog::all(),
            fn ($p) => $p['slug'] !== $slug
        );

        return view('programs.show', [
            'program' => $program,
            'otherPrograms' => $otherPrograms,
        ]);
    }
}
