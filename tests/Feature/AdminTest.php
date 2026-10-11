<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Enrollment;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adminUser = User::factory()->create([
            'email' => 'admin@megagunatalent.com',
            'role' => 'admin',
            'is_admin' => true,
        ]);
    }

    public function test_guest_is_redirected_to_admin_login(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_login(): void
    {
        $response = $this->post(route('admin.login.submit'), [
            'email' => 'admin@megagunatalent.com',
            'password' => 'password', // standard factory password
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($this->adminUser);
    }

    public function test_admin_can_view_dashboard(): void
    {
        $response = $this->actingAs($this->adminUser)->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Dashboard Overview');
    }

    public function test_admin_can_update_website_settings_and_reflects_on_home(): void
    {
        $response = $this->actingAs($this->adminUser)->post(route('admin.settings.update'), [
            'hero_title_line1' => 'CUSTOM GERMAN MASTERY',
            'hero_primary_btn_text' => 'JOIN CLASS NOW',
        ]);

        $response->assertRedirect(route('admin.settings.index'));

        $this->assertEquals('CUSTOM GERMAN MASTERY', SiteSetting::get('hero_title_line1'));

        $homeResponse = $this->get(route('home'));
        $homeResponse->assertStatus(200);
        $homeResponse->assertSee('CUSTOM GERMAN MASTERY');
        $homeResponse->assertSee('JOIN CLASS NOW');
    }

    public function test_admin_can_manage_blog_categories(): void
    {
        $response = $this->actingAs($this->adminUser)->post(route('admin.blog-categories.store'), [
            'name' => 'Visa Information',
            'slug' => 'visa-information',
            'description' => 'German embassy visa advice',
        ]);

        $response->assertRedirect(route('admin.blog-categories.index'));
        $this->assertDatabaseHas('blog_categories', ['slug' => 'visa-information']);
    }

    public function test_admin_can_create_and_edit_blog(): void
    {
        $category = BlogCategory::create([
            'name' => 'Exams',
            'slug' => 'exams',
        ]);

        $createResponse = $this->actingAs($this->adminUser)->post(route('admin.blogs.store'), [
            'title' => 'Secret to Passing Goethe B2',
            'slug' => 'secret-to-passing-goethe-b2',
            'category_id' => $category->id,
            'excerpt' => 'A guide for advanced students.',
            'content' => '<h2>Goethe B2 preparation tips</h2><p>Practice writing essays every day.</p>',
            'status' => 'published',
            'focus_keyword' => 'Goethe B2 Exam',
            'tags' => 'B2, Goethe, Advanced',
            'faq_schema' => [
                ['question' => 'Is B2 hard?', 'answer' => 'With 6 months practice it is achievable.'],
            ],
            'key_takeaways' => [
                'Essay structure matters.',
            ],
        ]);

        $createResponse->assertRedirect(route('admin.blogs.index'));
        $this->assertDatabaseHas('blogs', [
            'slug' => 'secret-to-passing-goethe-b2',
            'status' => 'published',
        ]);

        $blog = Blog::where('slug', 'secret-to-passing-goethe-b2')->first();

        $updateResponse = $this->actingAs($this->adminUser)->put(route('admin.blogs.update', $blog), [
            'title' => 'Updated Secret to Goethe B2',
            'slug' => 'secret-to-passing-goethe-b2',
            'category_id' => $category->id,
            'content' => '<p>Updated content.</p>',
            'status' => 'published',
        ]);

        $updateResponse->assertRedirect(route('admin.blogs.index'));
        $this->assertDatabaseHas('blogs', ['title' => 'Updated Secret to Goethe B2']);
    }

    public function test_admin_can_update_enrollment_status(): void
    {
        $enrollment = Enrollment::create([
            'first_name' => 'Budi',
            'last_name' => 'Santoso',
            'email' => 'budi@example.com',
            'program_level' => 'Beginner',
            'message' => 'Want to enroll in A1',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)->patch(route('admin.enrollments.status', $enrollment), [
            'status' => 'contacted',
        ]);

        $response->assertRedirect();
        $this->assertEquals('contacted', $enrollment->fresh()->status);
    }

    public function test_admin_can_update_enrollment_notes(): void
    {
        $enrollment = Enrollment::create([
            'first_name' => 'Siti',
            'last_name' => 'Rahma',
            'email' => 'siti@example.com',
            'program_level' => 'Intermediate',
            'message' => 'Need B1 course',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)->patch(route('admin.enrollments.notes', $enrollment), [
            'admin_notes' => 'Called candidate on WhatsApp, interested in weekend class batch.',
        ]);

        $response->assertRedirect();
        $this->assertEquals('Called candidate on WhatsApp, interested in weekend class batch.', $enrollment->fresh()->admin_notes);
    }

    public function test_admin_can_export_enrollments_csv(): void
    {
        Enrollment::create([
            'first_name' => 'Andi',
            'last_name' => 'Wijaya',
            'email' => 'andi@example.com',
            'program_level' => 'Advanced',
            'message' => 'Preparing for C1',
            'status' => 'pending',
        ]);

        $response = $this->actingAs($this->adminUser)->get(route('admin.enrollments.export'));
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
        $this->assertStringContainsString('attachment; filename="enrollments_export_', $response->headers->get('Content-Disposition'));
    }

    public function test_admin_can_change_password(): void
    {
        $response = $this->actingAs($this->adminUser)->put(route('admin.profile.password'), [
            'current_password' => 'password',
            'password' => 'newSecretPass123!',
            'password_confirmation' => 'newSecretPass123!',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertTrue(Hash::check('newSecretPass123!', $this->adminUser->fresh()->password));
    }

    public function test_admin_can_set_custom_published_at_date(): void
    {
        $category = BlogCategory::create(['name' => 'Visa Info', 'slug' => 'visa-info']);

        $customDate = now()->subDays(5)->startOfMinute();

        $response = $this->actingAs($this->adminUser)->post(route('admin.blogs.store'), [
            'title' => 'Backdated Article',
            'category_id' => $category->id,
            'content' => '<p>Backdated publication content.</p>',
            'status' => 'published',
            'published_at' => $customDate->format('Y-m-d H:i:s'),
        ]);

        $response->assertRedirect(route('admin.blogs.index'));
        $blog = Blog::where('slug', 'backdated-article')->first();
        $this->assertNotNull($blog);
        $this->assertEquals($customDate->format('Y-m-d H:i'), $blog->published_at->format('Y-m-d H:i'));
    }
}
