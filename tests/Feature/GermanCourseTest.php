<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GermanCourseTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders_successful_with_course_content(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('Speak German With Confidence');
        $response->assertSee('Engaging German courses for all levels.');
        $response->assertSee('Our Programs');
        $response->assertSee('Beginner');
        $response->assertSee('Intermediate');
        $response->assertSee('Advanced');
        $response->assertSee('Achieve Your German Language Goals');
        $response->assertSee('Enroll Now');
        $response->assertSee('Contact Us');
        $response->assertSeeText('All Rights Reserved.');
    }

    public function test_enroll_page_renders_successfully(): void
    {
        $response = $this->get(route('enroll'));

        $response->assertStatus(200);
        $response->assertSee('Start Your Learning Journey');
        $response->assertSeeText("Enroll now and let's discuss your German language goals.");
        $response->assertSee('Send');
    }

    public function test_enrollment_submission_saves_to_database(): void
    {
        $payload = [
            'first_name' => 'Max',
            'last_name' => 'Mustermann',
            'email' => 'max@example.de',
            'phone' => '+49 151 12345678',
            'program_level' => 'Intermediate',
            'message' => 'I would like to improve my conversational German for my engineering career.',
        ];

        $response = $this->post(route('enroll.store'), $payload);

        $response->assertSessionHas('success');
        $response->assertRedirect();

        $this->assertDatabaseHas('enrollments', [
            'first_name' => 'Max',
            'last_name' => 'Mustermann',
            'email' => 'max@example.de',
            'program_level' => 'Intermediate',
        ]);
    }
}
