<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    protected BlogCategory $category;

    protected User $author;

    protected function setUp(): void
    {
        parent::setUp();

        $this->author = User::factory()->create(['name' => 'Instructor Hans']);
        $this->category = BlogCategory::create([
            'name' => 'German Grammar',
            'slug' => 'german-grammar',
            'description' => 'Grammar tips and tricks',
        ]);
    }

    public function test_public_blog_index_displays_published_posts(): void
    {
        Blog::create([
            'title' => 'Mastering German Cases: Der Die Das',
            'slug' => 'mastering-german-cases',
            'category_id' => $this->category->id,
            'author_id' => $this->author->id,
            'excerpt' => 'Understanding Nominativ, Akkusativ, Dativ, and Genitiv.',
            'content' => '<p>Article body here.</p>',
            'status' => 'published',
            'published_at' => now()->subDay(),
        ]);

        Blog::create([
            'title' => 'Draft Post Should Not Appear',
            'slug' => 'draft-post-not-appear',
            'category_id' => $this->category->id,
            'author_id' => $this->author->id,
            'content' => '<p>Draft body.</p>',
            'status' => 'draft',
        ]);

        $response = $this->get(route('blog.index'));
        $response->assertStatus(200);
        $response->assertSee('Mastering German Cases: Der Die Das');
        $response->assertDontSee('Draft Post Should Not Appear');
    }

    public function test_public_blog_can_filter_by_category(): void
    {
        $cat2 = BlogCategory::create(['name' => 'Culture', 'slug' => 'culture']);

        Blog::create([
            'title' => 'Oktoberfest Traditions',
            'slug' => 'oktoberfest-traditions',
            'category_id' => $cat2->id,
            'content' => '<p>Bavarian festivals.</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $response = $this->get(route('blog.category', 'culture'));
        $response->assertStatus(200);
        $response->assertSee('Oktoberfest Traditions');
    }

    public function test_single_blog_post_displays_seo_content_and_faqs(): void
    {
        $blog = Blog::create([
            'title' => 'Step by Step Guide to Goethe A1',
            'slug' => 'step-by-step-guide-goethe-a1',
            'category_id' => $this->category->id,
            'author_id' => $this->author->id,
            'excerpt' => 'All four modules explained in detail.',
            'content' => '<h2>1. Speaking section</h2><p>Introduce yourself.</p>',
            'meta_title' => 'Goethe A1 Preparation Guide | Mega Guna Talent',
            'meta_description' => 'Expert tips for Goethe A1 examination.',
            'focus_keyword' => 'Goethe A1 Guide',
            'status' => 'published',
            'published_at' => now(),
            'faq_schema' => [
                [
                    'question' => 'How many points to pass?',
                    'answer' => 'You need 60 out of 100 points.',
                ],
            ],
            'key_takeaways' => [
                'Practice listening every day.',
            ],
        ]);

        $response = $this->get(route('blog.show', $blog->slug));
        $response->assertStatus(200);
        $response->assertSee('Step by Step Guide to Goethe A1');
        $response->assertSee('Goethe A1 Preparation Guide | Mega Guna Talent');
        $response->assertSee('Practice listening every day.');
        $response->assertSee('How many points to pass?');
        $response->assertSee('You need 60 out of 100 points.');

        // Verify view count was incremented
        $this->assertEquals(1, $blog->fresh()->view_count);
    }

    public function test_unpublished_blog_returns_404(): void
    {
        $draft = Blog::create([
            'title' => 'Hidden Draft',
            'slug' => 'hidden-draft',
            'category_id' => $this->category->id,
            'content' => '<p>Secret</p>',
            'status' => 'draft',
        ]);

        $response = $this->get(route('blog.show', $draft->slug));
        $response->assertStatus(404);
    }

    public function test_admin_can_preview_unpublished_draft_blog(): void
    {
        $admin = User::factory()->create(['is_admin' => true, 'role' => 'admin']);

        $draft = Blog::create([
            'title' => 'Admin Only Secret Draft',
            'slug' => 'admin-only-secret-draft',
            'category_id' => $this->category->id,
            'author_id' => $admin->id,
            'content' => '<p>Upcoming announcement.</p>',
            'status' => 'draft',
        ]);

        $response = $this->actingAs($admin)->get(route('blog.show', $draft->slug));
        $response->assertStatus(200);
        $response->assertSee('Admin Only Secret Draft');
        $response->assertSee('Draft Mode');
    }
}
