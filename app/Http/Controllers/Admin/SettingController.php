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
        $validated = $request->validate([
            // Branding & Meta
            'site_title' => ['nullable', 'string', 'max:255'],
            'site_tagline' => ['nullable', 'string', 'max:500'],
            'contact_email' => ['nullable', 'email', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:100'],
            'contact_address' => ['nullable', 'string', 'max:255'],
            'social_whatsapp' => ['nullable', 'string', 'max:255'],
            'social_instagram' => ['nullable', 'string', 'max:255'],
            'social_facebook' => ['nullable', 'string', 'max:255'],
            'social_linkedin' => ['nullable', 'string', 'max:255'],

            // About Us Section
            'about_hero_badge' => ['nullable', 'string', 'max:255'],
            'about_hero_title' => ['nullable', 'string', 'max:255'],
            'about_hero_subtitle' => ['nullable', 'string'],
            'about_visi' => ['nullable', 'string'],
            'about_operating_hours' => ['nullable', 'string', 'max:255'],

            // Hero Section
            'hero_badge_text' => ['nullable', 'string', 'max:255'],
            'hero_title_line1' => ['nullable', 'string', 'max:255'],
            'hero_title_line2' => ['nullable', 'string', 'max:255'],
            'hero_subtitle' => ['nullable', 'string'],
            'hero_primary_btn_text' => ['nullable', 'string', 'max:100'],
            'hero_primary_btn_url' => ['nullable', 'string', 'max:255'],
            'hero_secondary_btn_text' => ['nullable', 'string', 'max:100'],
            'hero_secondary_btn_url' => ['nullable', 'string', 'max:255'],
            'hero_stat_1_val' => ['nullable', 'string', 'max:50'],
            'hero_stat_1_lbl' => ['nullable', 'string', 'max:100'],
            'hero_stat_2_val' => ['nullable', 'string', 'max:50'],
            'hero_stat_2_lbl' => ['nullable', 'string', 'max:100'],
            'hero_stat_3_val' => ['nullable', 'string', 'max:50'],
            'hero_stat_3_lbl' => ['nullable', 'string', 'max:100'],

            // Programs Section - General & Home Cards
            'programs_badge' => ['nullable', 'string', 'max:255'],
            'programs_title' => ['nullable', 'string', 'max:255'],
            'programs_subtitle' => ['nullable', 'string'],
            'program_1_title' => ['nullable', 'string', 'max:100'],
            'program_1_desc' => ['nullable', 'string', 'max:500'],
            'program_2_title' => ['nullable', 'string', 'max:100'],
            'program_2_desc' => ['nullable', 'string', 'max:500'],
            'program_3_title' => ['nullable', 'string', 'max:100'],
            'program_3_desc' => ['nullable', 'string', 'max:500'],

            // Programs Section - Beginner Program
            'program_beginner_title' => ['nullable', 'string', 'max:255'],
            'program_beginner_level' => ['nullable', 'string', 'max:100'],
            'program_beginner_badge' => ['nullable', 'string', 'max:255'],
            'program_beginner_tagline' => ['nullable', 'string'],
            'program_beginner_description' => ['nullable', 'string'],
            'program_beginner_duration' => ['nullable', 'string', 'max:100'],
            'program_beginner_total_hours' => ['nullable', 'string', 'max:100'],
            'program_beginner_class_size' => ['nullable', 'string', 'max:100'],
            'program_beginner_schedule' => ['nullable', 'string', 'max:255'],
            'program_beginner_target_exam' => ['nullable', 'string', 'max:255'],
            'program_beginner_career_path' => ['nullable', 'string'],

            // Programs Section - Intermediate Program
            'program_intermediate_title' => ['nullable', 'string', 'max:255'],
            'program_intermediate_level' => ['nullable', 'string', 'max:100'],
            'program_intermediate_badge' => ['nullable', 'string', 'max:255'],
            'program_intermediate_tagline' => ['nullable', 'string'],
            'program_intermediate_description' => ['nullable', 'string'],
            'program_intermediate_duration' => ['nullable', 'string', 'max:100'],
            'program_intermediate_total_hours' => ['nullable', 'string', 'max:100'],
            'program_intermediate_class_size' => ['nullable', 'string', 'max:100'],
            'program_intermediate_schedule' => ['nullable', 'string', 'max:255'],
            'program_intermediate_target_exam' => ['nullable', 'string', 'max:255'],
            'program_intermediate_career_path' => ['nullable', 'string'],

            // Programs Section - Advanced Program
            'program_advanced_title' => ['nullable', 'string', 'max:255'],
            'program_advanced_level' => ['nullable', 'string', 'max:100'],
            'program_advanced_badge' => ['nullable', 'string', 'max:255'],
            'program_advanced_tagline' => ['nullable', 'string'],
            'program_advanced_description' => ['nullable', 'string'],
            'program_advanced_duration' => ['nullable', 'string', 'max:100'],
            'program_advanced_total_hours' => ['nullable', 'string', 'max:100'],
            'program_advanced_class_size' => ['nullable', 'string', 'max:100'],
            'program_advanced_schedule' => ['nullable', 'string', 'max:255'],
            'program_advanced_target_exam' => ['nullable', 'string', 'max:255'],
            'program_advanced_career_path' => ['nullable', 'string'],

            // CTA Section
            'cta_badge' => ['nullable', 'string', 'max:255'],
            'cta_title' => ['nullable', 'string', 'max:255'],
            'cta_subtitle' => ['nullable', 'string'],
            'cta_button_text' => ['nullable', 'string', 'max:100'],
            'cta_button_url' => ['nullable', 'string', 'max:255'],

            // Footer Section
            'footer_about' => ['nullable', 'string'],
            'footer_copyright' => ['nullable', 'string', 'max:255'],

            // Theme Colors
            'theme_color_primary' => ['nullable', 'string', 'max:20'],
            'theme_color_gold' => ['nullable', 'string', 'max:20'],
            'theme_color_gold_hover' => ['nullable', 'string', 'max:20'],

            // Uploads
            'site_logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'site_favicon' => ['nullable', 'file', 'mimes:ico,png,svg,jpg', 'max:1024'],
            'hero_bg_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'hero_gate_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:4096'],
            'cta_bg_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);

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
