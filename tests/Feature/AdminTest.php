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

    public function test_admin_can_update_about_page_settings_and_reflects_on_about_page(): void
    {
        $response = $this->actingAs($this->adminUser)->post(route('admin.settings.update'), [
            'about_hero_title' => 'GERMAN CAREER ACADEMY BEKASI',
            'about_visi' => 'Visi Baru: Menjadi LPK Nomor Satu di Indonesia',
        ]);

        $response->assertRedirect(route('admin.settings.index'));

        $this->assertEquals('GERMAN CAREER ACADEMY BEKASI', SiteSetting::get('about_hero_title'));
        $this->assertEquals('Visi Baru: Menjadi LPK Nomor Satu di Indonesia', SiteSetting::get('about_visi'));

        $aboutResponse = $this->get(route('about'));
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('GERMAN CAREER ACADEMY BEKASI');
        $aboutResponse->assertSee('Visi Baru: Menjadi LPK Nomor Satu di Indonesia');
    }

    public function test_admin_can_update_program_settings_and_reflects_on_program_pages(): void
    {
        $response = $this->actingAs($this->adminUser)->post(route('admin.settings.update'), [
            'program_beginner_title' => 'Program Beginner Super Eksklusif',
            'program_beginner_duration' => '8 Minggu Intensif Plus',
            'program_intermediate_badge' => 'Jalur Emas Ausbildung Jerman',
            'program_advanced_target_exam' => 'TestDaF Level 5 & Goethe C1',
        ]);

        $response->assertRedirect(route('admin.settings.index'));

        $this->assertEquals('Program Beginner Super Eksklusif', SiteSetting::get('program_beginner_title'));
        $this->assertEquals('8 Minggu Intensif Plus', SiteSetting::get('program_beginner_duration'));
        $this->assertEquals('Jalur Emas Ausbildung Jerman', SiteSetting::get('program_intermediate_badge'));
        $this->assertEquals('TestDaF Level 5 & Goethe C1', SiteSetting::get('program_advanced_target_exam'));

        // Verify reflection on detail pages
        $beginnerResponse = $this->get(route('programs.show', 'beginner'));
        $beginnerResponse->assertStatus(200);
        $beginnerResponse->assertSee('Program Beginner Super Eksklusif');
        $beginnerResponse->assertSee('8 Minggu Intensif Plus');

        $intermediateResponse = $this->get(route('programs.show', 'intermediate'));
        $intermediateResponse->assertStatus(200);
        $intermediateResponse->assertSee('Jalur Emas Ausbildung Jerman');

        $advancedResponse = $this->get(route('programs.show', 'advanced'));
        $advancedResponse->assertStatus(200);
        $advancedResponse->assertSee('TestDaF Level 5 & Goethe C1');
    }

    public function test_guest_cannot_update_settings(): void
    {
        $response = $this->post(route('admin.settings.update'), [
            'hero_title_line1' => 'HACKED TITLE',
        ]);

        $response->assertRedirect(route('admin.login'));
        $this->assertNotEquals('HACKED TITLE', SiteSetting::get('hero_title_line1'));
    }

    public function test_admin_settings_index_displays_program_customization_fields(): void
    {
        $response = $this->actingAs($this->adminUser)->get(route('admin.settings.index'));

        $response->assertStatus(200);
        $response->assertSee('name="program_beginner_title"', false);
        $response->assertSee('name="program_beginner_level"', false);
        $response->assertSee('name="program_beginner_duration"', false);
        $response->assertSee('name="program_intermediate_title"', false);
        $response->assertSee('name="program_intermediate_badge"', false);
        $response->assertSee('name="program_intermediate_schedule"', false);
        $response->assertSee('name="program_advanced_title"', false);
        $response->assertSee('name="program_advanced_target_exam"', false);
        $response->assertSee('name="program_advanced_career_path"', false);
    }

    public function test_program_customization_escapes_html_to_prevent_xss(): void
    {
        $maliciousTitle = '<script>alert("xss")</script>German Pro';

        $this->actingAs($this->adminUser)->post(route('admin.settings.update'), [
            'program_beginner_title' => $maliciousTitle,
        ]);

        $response = $this->get(route('programs.show', 'beginner'));
        $response->assertStatus(200);

        // Blade escapes HTML characters to entities
        $response->assertDontSee('<script>alert("xss")</script>', false);
        $response->assertSee('&lt;script&gt;alert(&quot;xss&quot;)&lt;/script&gt;German Pro', false);
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

    public function test_admin_can_delete_enrollment(): void
    {
        $enrollment = Enrollment::create([
            'first_name' => 'Doni',
            'last_name' => 'Kusuma',
            'email' => 'doni@example.com',
            'program_level' => 'Beginner',
            'message' => 'Spam or cancelled lead',
            'status' => 'rejected',
        ]);

        $response = $this->actingAs($this->adminUser)->delete(route('admin.enrollments.destroy', $enrollment));
        $response->assertRedirect();
        $this->assertDatabaseMissing('enrollments', ['id' => $enrollment->id]);
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

    public function test_non_admin_user_cannot_access_admin_panel(): void
    {
        $regularUser = User::factory()->create([
            'role' => 'student',
            'is_admin' => false,
        ]);

        $response = $this->actingAs($regularUser)->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_admin_cannot_delete_category_with_active_blogs(): void
    {
        $category = BlogCategory::create(['name' => 'Grammar Topics', 'slug' => 'grammar-topics']);
        Blog::create([
            'title' => 'Sample Article',
            'slug' => 'sample-article',
            'category_id' => $category->id,
            'author_id' => $this->adminUser->id,
            'content' => '<p>Article body.</p>',
            'status' => 'published',
        ]);

        $response = $this->actingAs($this->adminUser)->delete(route('admin.blog-categories.destroy', $category));
        $response->assertSessionHas('error');
        $this->assertDatabaseHas('blog_categories', ['id' => $category->id]);
    }

    public function test_admin_can_delete_empty_category(): void
    {
        $category = BlogCategory::create(['name' => 'Empty Category', 'slug' => 'empty-category']);

        $response = $this->actingAs($this->adminUser)->delete(route('admin.blog-categories.destroy', $category));
        $response->assertRedirect(route('admin.blog-categories.index'));
        $this->assertDatabaseMissing('blog_categories', ['id' => $category->id]);
    }

    public function test_admin_can_delete_blog_article(): void
    {
        $category = BlogCategory::create(['name' => 'News', 'slug' => 'news']);
        $blog = Blog::create([
            'title' => 'Article to Delete',
            'slug' => 'article-to-delete',
            'category_id' => $category->id,
            'author_id' => $this->adminUser->id,
            'content' => '<p>Delete me.</p>',
            'status' => 'published',
        ]);

        $response = $this->actingAs($this->adminUser)->delete(route('admin.blogs.destroy', $blog));
        $response->assertRedirect(route('admin.blogs.index'));
        $this->assertDatabaseMissing('blogs', ['id' => $blog->id]);
    }

    public function test_admin_cannot_change_password_with_incorrect_current_password(): void
    {
        $response = $this->actingAs($this->adminUser)->put(route('admin.profile.password'), [
            'current_password' => 'wrong-pass',
            'password' => 'newSecretPass123!',
            'password_confirmation' => 'newSecretPass123!',
        ]);

        $response->assertSessionHasErrors('current_password');
    }

    public function test_admin_cannot_change_password_with_unconfirmed_password(): void
    {
        $response = $this->actingAs($this->adminUser)->put(route('admin.profile.password'), [
            'current_password' => 'password',
            'password' => 'newSecretPass123!',
            'password_confirmation' => 'differentPass!',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_admin_logout_clears_session(): void
    {
        $response = $this->actingAs($this->adminUser)->post(route('admin.logout'));
        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }
}
