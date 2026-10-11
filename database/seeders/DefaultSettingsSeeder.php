<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class DefaultSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Branding
            ['key' => 'site_title', 'value' => 'German Language Courses - Mega Guna Talent', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Master the German language with native-speaking certified instructors', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'info@megagunatalent.com', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'contact_phone', 'value' => '+62 812 3456 7890', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => 'Jakarta, Indonesia', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'social_whatsapp', 'value' => 'https://wa.me/6281234567890', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/megagunatalent', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/megagunatalent', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/megagunatalent', 'group' => 'branding', 'type' => 'text'],

            // Hero Section
            ['key' => 'hero_badge_text', 'value' => 'TOP-RATED GERMAN COURSES IN INDONESIA', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_title_line1', 'value' => 'SPEAK GERMAN FLUENTLY', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_title_line2', 'value' => 'UNLOCK GLOBAL CAREERS', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_subtitle', 'value' => 'Comprehensive German language training from A1 to C1 for students, jobseekers, and professionals aspiring to study or work in Germany.', 'group' => 'hero', 'type' => 'textarea'],
            ['key' => 'hero_primary_btn_text', 'value' => 'ENROLL NOW', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_primary_btn_url', 'value' => '#enroll', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_secondary_btn_text', 'value' => 'EXPLORE PROGRAMS', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_secondary_btn_url', 'value' => '#programs', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_1_val', 'value' => '98%', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_1_lbl', 'value' => 'Goethe Exam Pass Rate', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_2_val', 'value' => '1,500+', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_2_lbl', 'value' => 'Alumni in Germany', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_3_val', 'value' => '100%', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_3_lbl', 'value' => 'Certified Teachers', 'group' => 'hero', 'type' => 'text'],

            // Programs Section
            ['key' => 'programs_badge', 'value' => 'OUR FLAGSHIP PROGRAMS', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'programs_title', 'value' => 'Our Programs', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'programs_subtitle', 'value' => 'Learn German at your own pace with our flexible programs, including online courses, in-person classes, and private tutoring.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_1_title', 'value' => 'Beginner', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_1_desc', 'value' => 'Focus on practical communication skills for travelers and those new to the language.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_2_title', 'value' => 'Intermediate', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_2_desc', 'value' => 'Building upon basic grammar, expanding vocabulary, and developing conversational fluency.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_3_title', 'value' => 'Advanced', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_3_desc', 'value' => 'Tailored for those needing German in their careers, focusing on business or technical German.', 'group' => 'programs', 'type' => 'textarea'],

            // CTA Section
            ['key' => 'cta_badge', 'value' => 'FAST-TRACK YOUR JOURNEY', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_title', 'value' => 'Ready to Start Speaking German?', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_subtitle', 'value' => 'Join hundreds of successful students who achieved their dreams in Germany. Limited seats available for next month\'s batch!', 'group' => 'cta', 'type' => 'textarea'],
            ['key' => 'cta_button_text', 'value' => 'RESERVE YOUR SEAT TODAY', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_button_url', 'value' => '#enroll', 'group' => 'cta', 'type' => 'text'],

            // Footer Section
            ['key' => 'footer_about', 'value' => 'Mega Guna Talent is Indonesia\'s premier German language academy, preparing students and skilled workers for successful careers and academic paths in Germany.', 'group' => 'footer', 'type' => 'textarea'],
            ['key' => 'footer_copyright', 'value' => '© 2026 Mega Guna Talent. All rights reserved.', 'group' => 'footer', 'type' => 'text'],

            // Styling & Colors
            ['key' => 'theme_color_primary', 'value' => '#2C0B1E', 'group' => 'colors', 'type' => 'text'],
            ['key' => 'theme_color_gold', 'value' => '#E2B842', 'group' => 'colors', 'type' => 'text'],
            ['key' => 'theme_color_gold_hover', 'value' => '#CFA230', 'group' => 'colors', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'group' => $setting['group'],
                    'type' => $setting['type'],
                ]
            );
        }
    }
}
