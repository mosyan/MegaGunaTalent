<?php

namespace Tests\Feature;

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
