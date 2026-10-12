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
            $locale = SetLocale::DEFAULT_LOCALE;
            $request->session()->put('locale', $locale);
        }

        // Validate safe internal return URL to prevent open-redirect vulnerabilities
        $returnUrl = $request->query('return');
        if (is_string($returnUrl) && ! empty($returnUrl)) {
            if (str_starts_with($returnUrl, '/') && ! str_starts_with($returnUrl, '//') && ! str_contains($returnUrl, '\\')) {
                return redirect()->to($returnUrl);
            }
        }

        // Avoid redirect loop if previous URL is the locale switch URL itself
        $previousUrl = url()->previous();
        if (empty($previousUrl) || $previousUrl === $request->fullUrl() || str_contains($previousUrl, '/lang/')) {
            return redirect()->route('home');
        }

        return redirect()->back(fallback: route('home'));
    }
}
