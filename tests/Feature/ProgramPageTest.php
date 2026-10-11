<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProgramPageTest extends TestCase
{
    /**
     * Test the programs directory page renders successfully.
     */
    public function test_programs_index_page_returns_ok_and_lists_all_programs(): void
    {
        $response = $this->get(route('programs.index'));

        $response->assertStatus(200);
        $response->assertSee('Pilihan Program Kursus Bahasa Jerman');
        $response->assertSee('Beginner German Program');
        $response->assertSee('Intermediate German Program');
        $response->assertSee('Advanced German Program');
        $response->assertSee(route('programs.show', 'beginner'));
        $response->assertSee(route('programs.show', 'intermediate'));
        $response->assertSee(route('programs.show', 'advanced'));
    }

    /**
     * Test Beginner program detail page.
     */
    public function test_beginner_program_page_renders_successfully(): void
    {
        $response = $this->get(route('programs.show', 'beginner'));

        $response->assertStatus(200);
        $response->assertSee('Beginner German Program');
        $response->assertSee('A1 - A2 (CEFR)');
        $response->assertSee('Grundlagen & Aussprache');
        $response->assertSee('Goethe-Zertifikat A1 & A2');
        $response->assertSee(route('enroll', ['level' => 'beginner']));
    }

    /**
     * Test Intermediate program detail page.
     */
    public function test_intermediate_program_page_renders_successfully(): void
    {
        $response = $this->get(route('programs.show', 'intermediate'));

        $response->assertStatus(200);
        $response->assertSee('Intermediate German Program');
        $response->assertSee('B1 (CEFR)');
        $response->assertSee('Pintu Gerbang Utama Ausbildung Jerman');
        $response->assertSee('Arbeitswelt & Bewerbung');
        $response->assertSee('Goethe-Zertifikat B1');
        $response->assertSee(route('enroll', ['level' => 'intermediate']));
    }

    /**
     * Test Advanced program detail page.
     */
    public function test_advanced_program_page_renders_successfully(): void
    {
        $response = $this->get(route('programs.show', 'advanced'));

        $response->assertStatus(200);
        $response->assertSee('Advanced German Program');
        $response->assertSee('B2 - C1 (CEFR)');
        $response->assertSee('Wirtschaftsdeutsch & Fachkommunikation');
        $response->assertSee('TestDaF');
        $response->assertSee(route('enroll', ['level' => 'advanced']));
    }

    /**
     * Test non-existent program slug returns 404.
     */
    public function test_invalid_program_slug_returns_404(): void
    {
        $response = $this->get('/programs/non-existent-level');

        $response->assertStatus(404);
    }

    /**
     * Test structured data JSON-LD on program page.
     */
    public function test_program_page_includes_valid_course_json_ld_schema(): void
    {
        $response = $this->get(route('programs.show', 'intermediate'));

        $response->assertStatus(200);

        preg_match('/<script type="application\/ld\+json">(.*?)<\/script>/s', $response->getContent(), $matches);
        $this->assertNotEmpty($matches[1] ?? null, 'JSON-LD schema script block should exist');

        $decoded = json_decode(trim($matches[1]), true);
        $this->assertIsArray($decoded);
        $this->assertEquals('https://schema.org', $decoded['@context']);
        $this->assertArrayHasKey('@graph', $decoded);

        $types = array_column($decoded['@graph'], '@type');
        $this->assertContains('Course', $types);
        $this->assertContains('BreadcrumbList', $types);
    }

    /**
     * Test homepage links to each program detail page.
     */
    public function test_homepage_contains_direct_links_to_all_program_pages(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee(route('programs.show', 'beginner'));
        $response->assertSee(route('programs.show', 'intermediate'));
        $response->assertSee(route('programs.show', 'advanced'));
    }

    /**
     * Test enroll page pre-selects the requested program level.
     */
    public function test_enroll_page_preselects_program_from_query_string(): void
    {
        $response = $this->get(route('enroll', ['level' => 'Intermediate']));

        $response->assertStatus(200);
        $response->assertSee('<option value="Intermediate" selected', false);
    }
}
