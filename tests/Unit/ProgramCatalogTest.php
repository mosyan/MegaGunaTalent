<?php

namespace Tests\Unit;

use App\Services\ProgramCatalog;
use PHPUnit\Framework\TestCase;

class ProgramCatalogTest extends TestCase
{
    /**
     * Test that all programs are defined with required attributes.
     */
    public function test_catalog_returns_all_three_programs_with_full_schema(): void
    {
        $programs = ProgramCatalog::all();

        $this->assertCount(3, $programs);
        $this->assertArrayHasKey('beginner', $programs);
        $this->assertArrayHasKey('intermediate', $programs);
        $this->assertArrayHasKey('advanced', $programs);

        foreach ($programs as $slug => $data) {
            $this->assertEquals($slug, $data['slug']);
            $this->assertNotEmpty($data['title']);
            $this->assertNotEmpty($data['level']);
            $this->assertNotEmpty($data['tagline']);
            $this->assertNotEmpty($data['description']);
            $this->assertNotEmpty($data['duration']);
            $this->assertNotEmpty($data['target_exam']);
            $this->assertIsArray($data['modules']);
            $this->assertGreaterThanOrEqual(4, count($data['modules']));
            $this->assertIsArray($data['highlights']);
            $this->assertIsArray($data['learning_outcomes']);
            $this->assertIsArray($data['faqs']);
        }
    }

    /**
     * Test find method returns program or null.
     */
    public function test_find_returns_correct_program_or_null(): void
    {
        $beginner = ProgramCatalog::find('beginner');
        $this->assertNotNull($beginner);
        $this->assertEquals('beginner', $beginner['slug']);

        $intermediate = ProgramCatalog::find('intermediate');
        $this->assertNotNull($intermediate);
        $this->assertEquals('intermediate', $intermediate['slug']);

        $advanced = ProgramCatalog::find('advanced');
        $this->assertNotNull($advanced);
        $this->assertEquals('advanced', $advanced['slug']);

        $invalid = ProgramCatalog::find('non_existent');
        $this->assertNull($invalid);
    }

    /**
     * Test exists method.
     */
    public function test_exists_checks_program_presence(): void
    {
        $this->assertTrue(ProgramCatalog::exists('beginner'));
        $this->assertTrue(ProgramCatalog::exists('intermediate'));
        $this->assertTrue(ProgramCatalog::exists('advanced'));
        $this->assertFalse(ProgramCatalog::exists('super_advanced'));
        $this->assertFalse(ProgramCatalog::exists(''));
    }
}
