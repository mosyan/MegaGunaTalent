<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first() ?? User::first();

        $categories = [
            [
                'name' => 'German Language Tips',
                'slug' => 'german-language-tips',
                'description' => 'Helpful tips, grammar tricks, and vocabulary guides for mastering German from A1 to C1.',
            ],
            [
                'name' => 'Study in Germany',
                'slug' => 'study-in-germany',
                'description' => 'Guides on university admissions, Studienkolleg, visa applications, and student life in Germany.',
            ],
            [
                'name' => 'Career & Ausbildung',
                'slug' => 'career-ausbildung',
                'description' => 'Information on vocational training (Ausbildung), Chancenkarte, and professional jobs in Germany.',
            ],
        ];

        $categoryMap = [];
        foreach ($categories as $cat) {
            $created = BlogCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                ['name' => $cat['name'], 'description' => $cat['description']]
            );
            $categoryMap[$cat['slug']] = $created->id;
        }

        $posts = [
            [
                'title' => 'How to Pass the Goethe-Zertifikat A1 Exam with Flying Colors',
                'slug' => 'how-to-pass-goethe-zertifikat-a1-exam',
                'category_id' => $categoryMap['german-language-tips'],
                'excerpt' => 'A complete step-by-step strategy to ace the Goethe-Zertifikat A1 exam, covering Hören, Lesen, Schreiben, and Sprechen modules.',
                'content' => '<h2>Understanding the Goethe-Zertifikat A1</h2><p>The Goethe-Zertifikat A1: Start Deutsch 1 is the essential certificate needed for family reunion visas, au pair programs, and foundational proof of German proficiency.</p><h3>1. Hören (Listening - 20 minutes)</h3><p>Listen to daily German conversations, train station announcements, and short voicemail messages. Key tip: Pay close attention to numbers, dates, and times.</p><h3>2. Lesen (Reading - 25 minutes)</h3><p>Read notices, classified ads, and signboards. Scan for keywords rather than trying to translate word-by-word.</p><h3>3. Schreiben (Writing - 20 minutes)</h3><p>Practice filling out official forms (name, address, date of birth) and writing a short informal letter or email (approx. 30 words).</p><h3>4. Sprechen (Speaking - 15 minutes)</h3><p>Introduce yourself with confidence: Name, Alter, Land, Wohnort, Sprachen, Beruf, and Hobbys. Practice formulating questions and polite requests using flashcards.</p>',
                'meta_title' => 'How to Pass Goethe-Zertifikat A1 Exam: Expert Tips | Mega Guna Talent',
                'meta_description' => 'Learn proven tips and study routines to pass your Goethe-Zertifikat A1 exam on the first attempt with Mega Guna Talent.',
                'focus_keyword' => 'Goethe-Zertifikat A1',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(5),
                'author_id' => $admin?->id,
                'tags' => 'Goethe A1, German Exam, German Learning',
                'key_takeaways' => [
                    'Focus on basic self-introduction and standard questions for the speaking section.',
                    'Listen to German podcasts and announcements to master listening comprehension.',
                    'Consistency with 1 hour of daily practice ensures success within 2-3 months.',
                ],
                'faq_schema' => [
                    [
                        'question' => 'How long does it take to prepare for Goethe A1?',
                        'answer' => 'With dedicated study of 10-15 hours per week, most students reach A1 proficiency in 8 to 12 weeks.',
                    ],
                    [
                        'question' => 'What is the passing score for Goethe A1?',
                        'answer' => 'You need at least 60 points out of 100 (60%) across all four modules combined.',
                    ],
                ],
            ],
            [
                'title' => 'Complete Guide to Ausbildung in Germany for Indonesian Students',
                'slug' => 'complete-guide-ausbildung-in-germany',
                'category_id' => $categoryMap['career-ausbildung'],
                'excerpt' => 'Everything you need to know about vocational dual-training in Germany: requirements, monthly salary, and top in-demand professions.',
                'content' => '<h2>What is Ausbildung?</h2><p>Ausbildung is Germany\'s world-renowned dual vocational training system that combines classroom education at a vocational school (Berufsschule) with practical on-the-job training at a company.</p><h3>Key Benefits</h3><ul><li><strong>No Tuition Fees:</strong> Ausbildung is completely tuition-free.</li><li><strong>Monthly Stipend:</strong> Trainees receive a monthly allowance typically ranging from €900 to €1,400.</li><li><strong>Direct Career Pathway:</strong> Over 70% of trainees are offered permanent full-time employment upon graduation.</li></ul><h3>Basic Requirements</h3><p>Candidates must hold a high school diploma (SMA/SMK equivalent) and demonstrate minimum B1 or B2 German language proficiency.</p>',
                'meta_title' => 'Complete Guide to Ausbildung in Germany 2026 | Mega Guna Talent',
                'meta_description' => 'Explore vocational training (Ausbildung) in Germany: requirements, top fields, stipends, and visa procedures.',
                'focus_keyword' => 'Ausbildung Germany',
                'status' => 'published',
                'is_featured' => true,
                'published_at' => now()->subDays(2),
                'author_id' => $admin?->id,
                'tags' => 'Ausbildung, Work in Germany, Vocational Training',
                'key_takeaways' => [
                    'Ausbildung pays you a monthly stipend while you train.',
                    'Minimum B1/B2 German level is required by companies and the German Embassy.',
                    'Nursing, hospitality, IT, and mechatronics are in highest demand.',
                ],
                'faq_schema' => [
                    [
                        'question' => 'Can international students apply for Ausbildung?',
                        'answer' => 'Yes, non-EU nationals including Indonesians are eligible under the German Skilled Immigration Act.',
                    ],
                ],
            ],
            [
                'title' => 'Top 5 German Public Universities with Tuition-Free Bachelor Programs',
                'slug' => 'top-5-german-public-universities-tuition-free',
                'category_id' => $categoryMap['study-in-germany'],
                'excerpt' => 'Discover the best public universities in Germany offering world-class engineering, business, and science degrees without tuition fees.',
                'content' => '<h2>Why Study in Germany?</h2><p>German public universities are consistently ranked among the world\'s best, and almost all public universities charge zero tuition fees for both domestic and international students.</p><h3>1. Technical University of Munich (TUM)</h3><p>Known as Germany\'s premier technical university, TUM excels in engineering, computer science, and technology management.</p><h3>2. RWTH Aachen University</h3><p>A powerhouse for mechanical, electrical, and civil engineering with close partnerships with global German industries.</p><h3>3. Heidelberg University</h3><p>Founded in 1386, Heidelberg is world-renowned for medicine, life sciences, and humanities.</p>',
                'meta_title' => 'Top Tuition-Free Public Universities in Germany | Mega Guna Talent',
                'meta_description' => 'Explore the top tuition-free public universities in Germany for international students in 2026.',
                'focus_keyword' => 'Study in Germany tuition-free',
                'status' => 'published',
                'is_featured' => false,
                'published_at' => now()->subDays(1),
                'author_id' => $admin?->id,
                'tags' => 'University, Study in Germany, Free Tuition',
                'key_takeaways' => [
                    'Public universities in Germany charge only a semester administration contribution (~€150 - €350).',
                    'German language proficiency (TestDaF or Goethe C1) is typically required for German-taught degrees.',
                ],
                'faq_schema' => [],
            ],
        ];

        foreach ($posts as $post) {
            Blog::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }
    }
}
