<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SetLocale;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Switch active application locale.
     */
    public function switch(Request $request, string $locale): RedirectResponse
    {
        if (in_array($locale, SetLocale::SUPPORTED_LOCALES, true)) {
            $request->session()->put('locale', $locale);
            cookie()->queue(cookie('locale', $locale, 60 * 24 * 30));
        } else {
            $request->session()->put('locale', SetLocale::DEFAULT_LOCALE);
        }

        return redirect()->back();
    }
}
