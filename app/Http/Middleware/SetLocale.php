<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Supported application locales.
     *
     * @var array<int, string>
     */
    public const SUPPORTED_LOCALES = ['id', 'en', 'de'];

    /**
     * Default application fallback locale.
     */
    public const DEFAULT_LOCALE = 'id';

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check query parameter (?lang=...) if provided
        $requestedLocale = $request->query('lang');
        if (is_string($requestedLocale) && in_array($requestedLocale, self::SUPPORTED_LOCALES, true)) {
            $request->session()->put('locale', $requestedLocale);
        }

        // 2. Resolve locale from session, cookie, or default
        $locale = $request->session()->get('locale', $request->cookie('locale', self::DEFAULT_LOCALE));

        if (! is_string($locale) || ! in_array($locale, self::SUPPORTED_LOCALES, true)) {
            $locale = self::DEFAULT_LOCALE;
        }

        App::setLocale($locale);
        View::share('currentLocale', $locale);
        View::share('supportedLocales', [
            'id' => [
                'name' => 'Bahasa Indonesia',
                'native' => 'Indonesia',
                'flag' => '🇮🇩',
                'code' => 'id',
                'short' => 'ID',
            ],
            'en' => [
                'name' => 'English',
                'native' => 'English',
                'flag' => '🇬🇧',
                'code' => 'en',
                'short' => 'EN',
            ],
            'de' => [
                'name' => 'Deutsch',
                'native' => 'Deutsch',
                'flag' => '🇩🇪',
                'code' => 'de',
                'short' => 'DE',
            ],
        ]);

        $response = $next($request);

        // Keep cookie in sync for 30 days
        if ($request->hasSession()) {
            $response->headers->setCookie(cookie('locale', $locale, 60 * 24 * 30));
        }

        return $response;
    }
}
