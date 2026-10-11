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

    public function test_honeypot_drops_spam_submission_silently(): void
    {
        $payload = [
            'first_name' => 'Spambot',
            'last_name' => 'Automated',
            'email' => 'spam@bot.com',
            'message' => 'Spam link http://spam.com',
            'honeypot_website' => 'http://spam.com', // Filled by bots
        ];

        $response = $this->post(route('enroll.store'), $payload);

        $response->assertSessionHas('success');
        $response->assertRedirect();

        $this->assertDatabaseMissing('enrollments', [
            'email' => 'spam@bot.com',
        ]);
    }

    public function test_sitemap_xml_renders_valid_xml(): void
    {
        $response = $this->get(route('sitemap'));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('<urlset', false);
        $response->assertSee(route('home'), false);
        $response->assertSee(route('blog.index'), false);
    }

    public function test_enrollment_validation_errors_when_required_fields_empty(): void
    {
        $response = $this->post(route('enroll.store'), []);

        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'message']);
    }

    public function test_robots_txt_contains_disallow_rules_and_sitemap(): void
    {
        $response = $this->get(route('robots'));

        $response->assertStatus(200);
        $response->assertSee('Disallow: /admin/');
        $response->assertSee('Disallow: /login');
        $response->assertSee('Sitemap:');
    }
}
