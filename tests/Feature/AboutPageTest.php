<?php

namespace Tests\Feature;

use App\Models\SiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_about_page_can_be_rendered_successfully(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
        $response->assertSee('LPK Mega Guna Talent');
        $response->assertSee('Moses Pasande');
        $response->assertSee('Ramona Novelia Wiyono');
        $response->assertSee('Muhammad Rafa Affansyah Purba');
        $response->assertSee('Villa Galaxy');
        $response->assertSee('SKKNI');
        $response->assertSee('Goethe');
        $response->assertSee('Gedung Utama LPK Mega Guna Talent');
        $response->assertSee('EducationalOrganization');
        $response->assertSee('LocalBusiness');
    }

    public function test_about_page_renders_gallery_and_modal(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
        $response->assertSee('id="gallery-modal"', false);
        $response->assertSee('id="modal-image"', false);
        $response->assertSee('id="modal-close-btn"', false);
        $response->assertSee('building-exterior.jpg');
        $response->assertSee('classroom-1.jpg');
        $response->assertSee('classroom-2.jpg');
        $response->assertSee('id="about-profile-parallax-bg"', false);
        $response->assertSee('global-bg.jpg');
    }

    public function test_about_page_structured_data_json_is_valid(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);

        // Extract JSON-LD script content
        preg_match('/<script type="application\/ld\+json">(.*?)<\/script>/s', $response->getContent(), $matches);
        $this->assertNotEmpty($matches[1] ?? null, 'JSON-LD script block should be present in page');

        $decoded = json_decode(trim($matches[1]), true);
        $this->assertIsArray($decoded);
        $this->assertEquals('https://schema.org', $decoded['@context']);
        $this->assertArrayHasKey('@graph', $decoded);
        $this->assertCount(2, $decoded['@graph']);
    }

    public function test_about_page_customized_settings_take_priority(): void
    {
        SiteSetting::set('about_hero_title', 'GLOBAL GERMAN CENTER GALAXY');
        SiteSetting::set('about_visi', 'Visi Khusus: Mencetak 10.000 Lulusan Profesional ke Jerman');

        $response = $this->get(route('about'));

        $response->assertStatus(200);
        $response->assertSee('GLOBAL GERMAN CENTER GALAXY');
        $response->assertSee('Visi Khusus: Mencetak 10.000 Lulusan Profesional ke Jerman');
    }

    public function test_navigation_includes_about_us_link(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee(route('about'));
    }

    public function test_sitemap_includes_about_page_url(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertSee(route('about'));
    }
}
