<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
use Database\Seeders\DefaultSettingsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocalizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_switches_locale_via_route_and_sets_session_and_cookie(): void
    {
        $response = $this->get(route('locale.switch', 'en'));

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('locale', 'en');
        $response->assertCookie('locale', 'en');

        $germanResponse = $this->get(route('locale.switch', 'de'));
        $germanResponse->assertSessionHas('locale', 'de');
        $germanResponse->assertCookie('locale', 'de');

        $indoResponse = $this->get(route('locale.switch', 'id'));
        $indoResponse->assertSessionHas('locale', 'id');
        $indoResponse->assertCookie('locale', 'id');
    }

    public function test_it_falls_back_to_default_locale_if_invalid_locale_requested(): void
    {
        $response = $this->get(route('locale.switch', 'fr'));

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('locale', 'id');
    }

    public function test_it_switches_locale_via_query_parameter(): void
    {
        $response = $this->get('/?lang=de');

        $response->assertOk();
        $response->assertSessionHas('locale', 'de');
        $this->assertEquals('de', app()->getLocale());
    }

    public function test_it_renders_english_translations_in_frontend(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get(route('home'));

        $response->assertOk();
        $response->assertSee('About Us');
        $response->assertSee('Programs');
        $response->assertSee('Enroll Now');
    }

    public function test_it_renders_german_translations_in_frontend(): void
    {
        $response = $this->withSession(['locale' => 'de'])->get(route('home'));

        $response->assertOk();
        $response->assertSee('Über uns');
        $response->assertSee('Programme');
        $response->assertSee('Jetzt anmelden');
    }

    public function test_it_renders_language_switchers_in_header_drawer_and_footer(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        // Desktop switcher links
        $response->assertSee(route('locale.switch', 'en'));
        $response->assertSee(route('locale.switch', 'de'));
        $response->assertSee(route('locale.switch', 'id'));
    }

    public function test_it_resolves_localized_dynamic_site_settings_with_fallback(): void
    {
        SiteSetting::set('hero_title_line1', 'Belajar Bahasa Jerman Bersama');
        SiteSetting::set('hero_title_line1_en', 'Speak German With Confidence');
        SiteSetting::set('hero_title_line1_de', 'Deutsch sprechen mit Vertrauen');

        $this->assertEquals('Belajar Bahasa Jerman Bersama', SiteSetting::getLocalized('hero_title_line1', null, 'id'));
        $this->assertEquals('Speak German With Confidence', SiteSetting::getLocalized('hero_title_line1', null, 'en'));
        $this->assertEquals('Deutsch sprechen mit Vertrauen', SiteSetting::getLocalized('hero_title_line1', null, 'de'));

        // Fallback test when translation is null or empty
        SiteSetting::set('cta_title', 'Raih Impian Anda');
        SiteSetting::set('cta_title_en', ''); // empty

        $this->assertEquals('Raih Impian Anda', SiteSetting::getLocalized('cta_title', null, 'en'));
    }

    public function test_admin_can_save_multilingual_settings(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->post(route('admin.settings.update'), [
            'site_title' => 'Mega Guna Talent',
            'hero_title_line1' => 'Judul Bahasa Indonesia',
            'hero_title_line1_en' => 'English Hero Title',
            'hero_title_line1_de' => 'Deutscher Hero Titel',
            'hero_secondary_btn_text' => 'Pelajari Program',
            'hero_secondary_btn_text_en' => 'Explore Programs',
            'hero_secondary_btn_text_de' => 'Programme entdecken',
            'hero_stat_1_lbl' => 'Kelulusan Goethe-Zertifikat',
            'hero_stat_1_lbl_en' => 'Goethe Exam Pass Rate',
            'hero_stat_1_lbl_de' => 'Goethe-Bestehensquote',
            'about_hero_title' => 'Judul About ID',
            'about_hero_title_en' => 'About Title EN',
            'about_hero_title_de' => 'About Titel DE',
            'program_1_title' => 'Pemula',
            'program_1_title_en' => 'Beginner Program',
            'program_1_title_de' => 'Anfänger Programm',
        ]);

        $response->assertRedirect(route('admin.settings.index'));
        $response->assertSessionHas('success');

        $this->assertEquals('English Hero Title', SiteSetting::get('hero_title_line1_en'));
        $this->assertEquals('Deutscher Hero Titel', SiteSetting::get('hero_title_line1_de'));
        $this->assertEquals('Explore Programs', SiteSetting::get('hero_secondary_btn_text_en'));
        $this->assertEquals('Programme entdecken', SiteSetting::get('hero_secondary_btn_text_de'));
        $this->assertEquals('Goethe-Bestehensquote', SiteSetting::get('hero_stat_1_lbl_de'));
        $this->assertEquals('About Title EN', SiteSetting::get('about_hero_title_en'));
        $this->assertEquals('Anfänger Programm', SiteSetting::get('program_1_title_de'));
    }

    public function test_it_safely_redirects_to_internal_return_url(): void
    {
        $response = $this->get('/lang/en?return=/programs');

        $response->assertRedirect('/programs');
        $response->assertSessionHas('locale', 'en');
    }

    public function test_it_prevents_open_redirect_attacks_in_return_param(): void
    {
        // Protocol-relative URL attempt
        $res1 = $this->get('/lang/en?return=//evil.com');
        $res1->assertRedirect(route('home'));

        // Absolute external URL attempt
        $res2 = $this->get('/lang/en?return=https://evil.com');
        $res2->assertRedirect(route('home'));

        // Backslash traversal attempt
        $res3 = $this->get('/lang/en?return=/\evil.com');
        $res3->assertRedirect(route('home'));
    }

    public function test_it_includes_hreflang_and_og_locale_tags_in_head(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('hreflang="id"', false);
        $response->assertSee('hreflang="en"', false);
        $response->assertSee('hreflang="de"', false);
        $response->assertSee('hreflang="x-default"', false);
        $response->assertSee('property="og:locale"', false);
    }

    public function test_enrollment_flash_message_is_localized_for_german(): void
    {
        $response = $this->withSession(['locale' => 'de'])->post(route('enroll.store'), [
            'first_name' => 'Hans',
            'last_name' => 'Müller',
            'email' => 'hans@example.de',
            'phone' => '+491701234567',
            'program_level' => 'Beginner',
            'message' => 'Ich möchte mich für den Kurs anmelden.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Vielen Dank! Wir werden uns so schnell wie möglich mit Ihnen in Verbindung setzen.');
    }

    public function test_default_settings_seeder_populates_multilingual_data(): void
    {
        $this->seed(DefaultSettingsSeeder::class);

        // Verify About Us
        $this->assertNotEmpty(SiteSetting::get('about_hero_title_en'));
        $this->assertNotEmpty(SiteSetting::get('about_hero_title_de'));
        $this->assertNotEmpty(SiteSetting::get('about_operating_hours_de'));

        // Verify Hero
        $this->assertNotEmpty(SiteSetting::get('hero_title_line1_en'));
        $this->assertNotEmpty(SiteSetting::get('hero_title_line1_de'));
        $this->assertNotEmpty(SiteSetting::get('hero_stat_1_lbl_de'));

        // Verify Programs
        $this->assertNotEmpty(SiteSetting::get('programs_badge_en'));
        $this->assertNotEmpty(SiteSetting::get('program_beginner_title_de'));
        $this->assertNotEmpty(SiteSetting::get('program_intermediate_tagline_en'));
        $this->assertNotEmpty(SiteSetting::get('program_advanced_description_de'));
    }
}
