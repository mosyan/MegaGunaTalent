<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Show the website customization settings editor.
     */
    public function index(): View
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update settings and handle asset uploads.
     */
    public function update(Request $request): RedirectResponse
    {
        $rules = [
            // Uploads
            'site_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'site_favicon' => ['nullable', 'file', 'mimes:ico,png,svg,jpg', 'max:1024'],
            'hero_bg_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'hero_gate_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:4096'],
            'cta_bg_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],

            // Specific format validations
            'contact_email' => ['nullable', 'email', 'max:255'],
        ];

        // Allow any dynamic text/textarea/color setting keys from the customizer form
        foreach ($request->keys() as $inputKey) {
            if (! isset($rules[$inputKey]) && ! in_array($inputKey, ['_token'])) {
                $rules[$inputKey] = ['nullable', 'string'];
            }
        }

        $validated = $request->validate($rules);

        // File upload handling: site_logo
        if ($request->hasFile('site_logo')) {
            $path = $request->file('site_logo')->store('uploads/branding', 'public');
            SiteSetting::set('site_logo', Storage::url($path), 'branding', 'image');
        }

        // File upload handling: site_favicon
        if ($request->hasFile('site_favicon')) {
            $path = $request->file('site_favicon')->store('uploads/branding', 'public');
            SiteSetting::set('site_favicon', Storage::url($path), 'branding', 'image');
        }

        // File upload handling: hero_bg_image
        if ($request->hasFile('hero_bg_image')) {
            $path = $request->file('hero_bg_image')->store('uploads/branding', 'public');
            SiteSetting::set('hero_bg_image', Storage::url($path), 'hero', 'image');
        }

        // File upload handling: hero_gate_image
        if ($request->hasFile('hero_gate_image')) {
            $path = $request->file('hero_gate_image')->store('uploads/branding', 'public');
            SiteSetting::set('hero_gate_image', Storage::url($path), 'hero', 'image');
        }

        // File upload handling: cta_bg_image
        if ($request->hasFile('cta_bg_image')) {
            $path = $request->file('cta_bg_image')->store('uploads/branding', 'public');
            SiteSetting::set('cta_bg_image', Storage::url($path), 'cta', 'image');
        }

        // Update standard text & color settings
        foreach ($validated as $key => $value) {
            if (in_array($key, ['site_logo', 'site_favicon', 'hero_bg_image', 'hero_gate_image', 'cta_bg_image'])) {
                continue;
            }

            $group = match (true) {
                str_starts_with($key, 'about_') => 'about',
                str_starts_with($key, 'hero_') => 'hero',
                str_starts_with($key, 'program') => 'programs',
                str_starts_with($key, 'cta_') => 'cta',
                str_starts_with($key, 'footer_') => 'footer',
                str_starts_with($key, 'theme_') => 'colors',
                default => 'branding',
            };

            SiteSetting::set($key, $value ?? '', $group);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Page elements & settings successfully updated!');
    }
}
