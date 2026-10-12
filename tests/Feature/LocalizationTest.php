<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use App\Models\User;
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
        $this->assertEquals('About Title EN', SiteSetting::get('about_hero_title_en'));
        $this->assertEquals('Anfänger Programm', SiteSetting::get('program_1_title_de'));
    }
}
