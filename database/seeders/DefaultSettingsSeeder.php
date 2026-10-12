<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class DefaultSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Branding
            ['key' => 'site_title', 'value' => 'German Language Courses - Mega Guna Talent', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'site_tagline', 'value' => 'Master the German language with native-speaking certified instructors', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'info@megagunatalent.com', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'contact_phone', 'value' => '+62 812 3456 7890', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'contact_address', 'value' => 'Jln Boulevard Raya A1 No. 16 Villa Galaxy RT. 001/019 Jaka Setia, Bekasi Selatan - Kota Bekasi', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'social_whatsapp', 'value' => 'https://wa.me/6281234567890', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/megagunatalent', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/megagunatalent', 'group' => 'branding', 'type' => 'text'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/megagunatalent', 'group' => 'branding', 'type' => 'text'],

            // About Us Section
            ['key' => 'about_hero_badge', 'value' => 'LPK Resmi Kemnaker RI • SKKNI & Goethe-Institut Standard', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_hero_badge_en', 'value' => 'Official Vocational Training Institute • SKKNI & Goethe Standard', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_hero_badge_de', 'value' => 'Anerkanntes Berufsbildungszentrum • Goethe-Institut Standard', 'group' => 'about', 'type' => 'text'],

            ['key' => 'about_hero_title', 'value' => 'Membangun Generasi Kompeten & Siap Berkarier Global di Jerman', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_hero_title_en', 'value' => 'Empowering Competent Talents for Global Careers in Germany', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_hero_title_de', 'value' => 'Kompetente Fachkräfte für erfolgreiche Karrieren in Deutschland', 'group' => 'about', 'type' => 'text'],

            ['key' => 'about_hero_subtitle', 'value' => 'LPK Mega Guna Talent adalah Lembaga Pelatihan Kerja terakreditasi yang berdedikasi menempa talenta muda Indonesia dengan penguasaan bahasa Jerman berstandar internasional, penguatan etos kerja profesional, dan fasilitas pembelajaran modern.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_hero_subtitle_en', 'value' => 'LPK Mega Guna Talent is an accredited vocational institute committed to forging Indonesian youth through international-standard German language mastery, solid professional work ethics, and modern immersive learning environments.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_hero_subtitle_de', 'value' => 'LPK Mega Guna Talent ist eine akkreditierte Ausbildungsstätte, die junge indonesische Talente gezielt auf Ausbildung, Studium und qualifizierte Berufe in Deutschland vorbereitet – mit intensivem Sprachunterricht und praxisnaher Arbeitskultur.', 'group' => 'about', 'type' => 'textarea'],

            ['key' => 'about_visi', 'value' => 'Menjadi Lembaga Pelatihan Kerja Yang Terdepan Dalam Membangun SDM Kompeten Sesuai Dengan Standar Kompetensi Kerja Nasional dan Internasional', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_visi_en', 'value' => 'To be the foremost vocational training institute cultivating globally competitive human resources aligned with national and international professional standards.', 'group' => 'about', 'type' => 'textarea'],
            ['key' => 'about_visi_de', 'value' => 'Ein führendes Institut für berufliche Bildung zu sein, das hochqualifizierte Fachkräfte nach nationalen und internationalen Kompetenzstandards ausbildet.', 'group' => 'about', 'type' => 'textarea'],

            ['key' => 'about_operating_hours', 'value' => 'Senin - Sabtu: 08:30 - 17:00 WIB', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_operating_hours_en', 'value' => 'Monday - Saturday: 08:30 AM - 05:00 PM (WIB)', 'group' => 'about', 'type' => 'text'],
            ['key' => 'about_operating_hours_de', 'value' => 'Montag - Samstag: 08:30 - 17:00 Uhr (WIB)', 'group' => 'about', 'type' => 'text'],

            // Hero Section
            ['key' => 'hero_badge_text', 'value' => 'Lembaga Kursus Resmi & Mitra Persiapan Ausbildung Jerman', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_badge_text_en', 'value' => 'Official German Language Center & Ausbildung Partner', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_badge_text_de', 'value' => 'Offizielles Deutsches Sprachzentrum & Ausbildungspartner', 'group' => 'hero', 'type' => 'text'],

            ['key' => 'hero_title_line1', 'value' => 'Kuasai Bahasa Jerman', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_title_line1_en', 'value' => 'Speak German With Confidence', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_title_line1_de', 'value' => 'Deutsch sprechen mit Selbstvertrauen', 'group' => 'hero', 'type' => 'text'],

            ['key' => 'hero_title_line2', 'value' => 'Wujudkan Karier & Studi Impian', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_title_line2_en', 'value' => 'Unlock Your Career & Study in Germany', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_title_line2_de', 'value' => 'Ihre Zukunft in Deutschland starten', 'group' => 'hero', 'type' => 'text'],

            ['key' => 'hero_subtitle', 'value' => 'Bimbingan intensif dari level A1 hingga C1 bersama pengajar tersertifikasi berstandar Goethe-Institut.', 'group' => 'hero', 'type' => 'textarea'],
            ['key' => 'hero_subtitle_en', 'value' => 'Engaging German courses for all levels. Learn German with flexible programs, experienced native tutors, and real-world conversations.', 'group' => 'hero', 'type' => 'textarea'],
            ['key' => 'hero_subtitle_de', 'value' => 'Interaktive Deutschkurse für alle Niveaustufen von A1 bis C1 mit zertifizierten Dozenten und Goethe-Zertifikat Vorbereitung.', 'group' => 'hero', 'type' => 'textarea'],

            ['key' => 'hero_primary_btn_text', 'value' => 'Daftar Sekarang', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_primary_btn_text_en', 'value' => 'Enroll Now', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_primary_btn_text_de', 'value' => 'Jetzt anmelden', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_primary_btn_url', 'value' => '#enroll', 'group' => 'hero', 'type' => 'text'],

            ['key' => 'hero_secondary_btn_text', 'value' => 'Pelajari Program', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_secondary_btn_text_en', 'value' => 'Explore Programs', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_secondary_btn_text_de', 'value' => 'Programme entdecken', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_secondary_btn_url', 'value' => '#programs', 'group' => 'hero', 'type' => 'text'],

            ['key' => 'hero_stat_1_val', 'value' => '98%', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_1_lbl', 'value' => 'Kelulusan Goethe-Zertifikat', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_1_lbl_en', 'value' => 'Goethe Exam Pass Rate', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_1_lbl_de', 'value' => 'Goethe-Bestehensquote', 'group' => 'hero', 'type' => 'text'],

            ['key' => 'hero_stat_2_val', 'value' => '1,500+', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_2_lbl', 'value' => 'Alumni Studi & Ausbildung', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_2_lbl_en', 'value' => 'Alumni in Germany', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_2_lbl_de', 'value' => 'Erfolgreiche Absolventen', 'group' => 'hero', 'type' => 'text'],

            ['key' => 'hero_stat_3_val', 'value' => '100%', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_3_lbl', 'value' => 'Pengajar Tersertifikasi', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_3_lbl_en', 'value' => 'Certified Expert Tutors', 'group' => 'hero', 'type' => 'text'],
            ['key' => 'hero_stat_3_lbl_de', 'value' => 'Zertifizierte Dozenten', 'group' => 'hero', 'type' => 'text'],

            // Programs Section - Main Heading
            ['key' => 'programs_badge', 'value' => 'PROGRAM UNGGULAN KAMI', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'programs_badge_en', 'value' => 'OUR FLAGSHIP PROGRAMS', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'programs_badge_de', 'value' => 'UNSERE SPITZENPROGRAMME', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'programs_title', 'value' => 'Program Kursus & Jalur Persiapan', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'programs_title_en', 'value' => 'Comprehensive Language Pathways', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'programs_title_de', 'value' => 'Gezielte Deutschkurse & Bildungspfade', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'programs_subtitle', 'value' => 'Kurikulum terstruktur dirancang sistematis dari fondasi percakapan hingga kemandirian bahasa untuk studi dan karier profesional di Jerman.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'programs_subtitle_en', 'value' => 'Structured curriculum designed systematically from basic conversation to fluent professional proficiency for your studies and career in Germany.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'programs_subtitle_de', 'value' => 'Strukturierte Lehrpläne von den Grundlagen bis zur berufsbezogenen Sprachkompetenz für Studium und duale Ausbildung in Deutschland.', 'group' => 'programs', 'type' => 'textarea'],

            ['key' => 'program_1_title', 'value' => 'Beginner', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_1_title_en', 'value' => 'Beginner (A1 - A2)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_1_title_de', 'value' => 'Grundstufe (A1 - A2)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_1_desc', 'value' => 'Focus on practical communication skills for travelers and those new to the language.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_1_desc_en', 'value' => 'Practical foundational skills for beginners and travel readiness.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_1_desc_de', 'value' => 'Praktische Grundkenntnisse für Anfänger und Alltagssituationen.', 'group' => 'programs', 'type' => 'textarea'],

            ['key' => 'program_2_title', 'value' => 'Intermediate', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_2_title_en', 'value' => 'Intermediate (B1)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_2_title_de', 'value' => 'Mittelstufe (B1)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_2_desc', 'value' => 'Building upon basic grammar, expanding vocabulary, and developing conversational fluency.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_2_desc_en', 'value' => 'Independent language competence essential for Ausbildung vocational training.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_2_desc_de', 'value' => 'Selbstständige Sprachverwendung für Ausbildung und Berufsleben.', 'group' => 'programs', 'type' => 'textarea'],

            ['key' => 'program_3_title', 'value' => 'Advanced', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_3_title_en', 'value' => 'Advanced (B2 - C1)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_3_title_de', 'value' => 'Oberstufe (B2 - C1)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_3_desc', 'value' => 'Tailored for those needing German in their careers, focusing on business or technical German.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_3_desc_en', 'value' => 'Specialized technical and business German for university and medical careers.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_3_desc_de', 'value' => 'Fach- und Wirtschaftssprache für Akademiker, Ärzte und Ingenieure.', 'group' => 'programs', 'type' => 'textarea'],

            // Program Details: Beginner (A1 - A2)
            ['key' => 'program_beginner_level', 'value' => 'A1 - A2 (CEFR)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_badge', 'value' => 'Fondasi & Percakapan Harian', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_duration', 'value' => '10 - 12 Minggu', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_total_hours', 'value' => '160 Jam Pembelajaran Intensif', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_class_size', 'value' => 'Maksimal 15 Siswa / Kelas', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_schedule', 'value' => 'Senin - Jumat (09:00 - 13:00 WIB) / Pilihan Kelas Malam', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_target_exam', 'value' => 'Goethe-Zertifikat A1 & A2', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_beginner_title', 'value' => 'Beginner German Program', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_title_en', 'value' => 'Beginner German Program (A1 - A2)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_title_de', 'value' => 'Deutsch Grundstufe (A1 - A2)', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_beginner_tagline', 'value' => 'Kuasai Dasar Bahasa Jerman dari Nol Hingga Mampu Berkomunikasi Sehari-hari dan Lulus Sertifikasi Goethe A1/A2.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_tagline_en', 'value' => 'Master German fundamentals from scratch to fluent everyday conversation and certified Goethe A1/A2 qualification.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_tagline_de', 'value' => 'Deutsche Grundlagen von Null auf lernen: Sichere Alltagskommunikation und erfolgreicher Goethe-A1/A2-Abschluss.', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_beginner_description', 'value' => 'Program Beginner dirancang khusus bagi peserta yang belum pernah mempelajari bahasa Jerman sama sekali. Menggunakan metode pembelajaran interaktif berbasis SKKNI dan standar Goethe-Institut, peserta akan dibimbing mulai dari pelafalan presisi (Aussprache), kosakata esensial, struktur tata bahasa dasar (Akkusativ & Dativ), hingga simulasi percakapan nyata untuk kehidupan sehari-hari, perjalanan, dan persiapan awal studi di Jerman.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_beginner_description_en', 'value' => 'Tailored for learners with zero prior knowledge. Guided by certified instructors using CEFR benchmarks, you master proper pronunciation, essential vocabulary, sentence syntax (Accusative/Dative), and real-life dialogue simulations for living and studying in Germany.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_beginner_description_de', 'value' => 'Speziell für Anfänger ohne Vorkenntnisse entwickelt. Schrittweise Vermittlung von exakter Aussprache, Grundwortschatz, Grammatikstrukturen und lebendigen Dialogübungen nach offiziellen Standards des Goethe-Instituts.', 'group' => 'programs', 'type' => 'textarea'],

            ['key' => 'program_beginner_career_path', 'value' => 'Lulusan level ini memiliki pondasi kuat untuk melanjutkan ke level Intermediate B1 (syarat utama Ausbildung), serta memenuhi syarat administratif dasar program Au Pair dan visa tertentu ke Jerman.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_career_path_en', 'value' => 'Provides the indispensable prerequisite foundation for Intermediate B1 (Ausbildung entry), Au Pair placements, and early academic preparation.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_beginner_career_path_de', 'value' => 'Solide Basis für den direkten Übergang zur Mittelstufe B1 sowie Erfüllung der Sprachanforderungen für Au-Pair und Orientierungsvisa.', 'group' => 'programs', 'type' => 'text'],

            // Program Details: Intermediate (B1)
            ['key' => 'program_intermediate_level', 'value' => 'B1 (CEFR)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_badge', 'value' => 'Pintu Gerbang Utama Ausbildung Jerman', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_duration', 'value' => '12 Minggu', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_total_hours', 'value' => '180 Jam Pembelajaran Intensif', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_class_size', 'value' => 'Maksimal 15 Siswa / Kelas', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_schedule', 'value' => 'Senin - Jumat (08:30 - 13:00 WIB)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_target_exam', 'value' => 'Goethe-Zertifikat B1 (4 Modul)', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_intermediate_title', 'value' => 'Intermediate German Program', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_title_en', 'value' => 'Intermediate German Program (B1)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_title_de', 'value' => 'Deutsch Mittelstufe (B1)', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_intermediate_tagline', 'value' => 'Kunci Kelulusan Goethe-Zertifikat B1 Sebagai Syarat Mutlak Visa Ausbildung, Studi Vokasi, dan Karier di Jerman.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_tagline_en', 'value' => 'Your definitive stepping stone to Goethe B1 certification, mandatory for vocational Ausbildung and work visas in Germany.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_tagline_de', 'value' => 'Der entscheidende Meilenstein zum Goethe-Zertifikat B1 – Pflichtvoraussetzung für die duale Ausbildung in Deutschland.', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_intermediate_description', 'value' => 'Program Intermediate difokuskan untuk mencapai tingkat kemandirian berbahasa Jerman (Selbstständige Sprachverwendung). Level B1 adalah syarat wajib paling krusial bagi calon peserta program Ausbildung (perhotelan, keperawatan/Pflege, teknik/Mechatronik, gastronomi, dll.) di Jerman. Di level ini, peserta dilatih berdiskusi, memahami teks berita, menyusun argumentasi formal, serta menguasai struktur gramatikal lanjutan seperti kalimat pasif (Passiv), Konjunktiv II, dan klausa bawahan (Nebensätze).', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_intermediate_description_en', 'value' => 'Focused on independent language proficiency (CEFR B1). Trainees master complex grammar (Passive voice, Subjunctive II, subordinate clauses), workplace terminology, interview readiness, and intensive drill in all 4 exam modules (Reading, Listening, Writing, Speaking).', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_intermediate_description_de', 'value' => 'Fokus auf selbstständige Sprachverwendung. Umfassende Vorbereitung auf alle vier Prüfungsmodule (Lesen, Hören, Schreiben, Sprechen) mit berufsbezogener Fachsprache für Pflege, Gastronomie und Handwerk.', 'group' => 'programs', 'type' => 'textarea'],

            ['key' => 'program_intermediate_career_path', 'value' => 'Sertifikat Goethe B1 adalah dokumen resmi utama yang diakui Kedutaan Besar Jerman di Jakarta untuk penerbitan visa Ausbildung, visa mencari pelatihan kerja, dan visa studi persiapan.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_career_path_en', 'value' => 'The official key required by the German Embassy for issuing dual vocational training (Ausbildung) visas in healthcare, engineering, IT, and hospitality.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_intermediate_career_path_de', 'value' => 'Vollständige Erfüllung der Visakriterien der Deutschen Botschaft für die Einreise zur dualen Ausbildung und Fachkräfteweiterbildung.', 'group' => 'programs', 'type' => 'text'],

            // Program Details: Advanced (B2 - C1)
            ['key' => 'program_advanced_level', 'value' => 'B2 - C1 (CEFR)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_badge', 'value' => 'Profisiensi Karier & Akademik', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_duration', 'value' => '12 - 14 Minggu', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_total_hours', 'value' => '200 Jam Pembelajaran Intensif', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_class_size', 'value' => 'Maksimal 12 Siswa / Kelas (Fokus & Presisi)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_schedule', 'value' => 'Senin - Jumat / Kelas Spesialisasi Fleksibel', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_target_exam', 'value' => 'Goethe-Zertifikat B2/C1 & TestDaF', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_advanced_title', 'value' => 'Advanced German Program', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_title_en', 'value' => 'Advanced German Program (B2 - C1)', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_title_de', 'value' => 'Deutsch Oberstufe (B2 - C1)', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_advanced_tagline', 'value' => 'Kecakapan Bahasa Tingkat Tinggi untuk Jalur Karier Profesional, Bahasa Khusus (Fachsprache), dan Studi Universitas di Jerman.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_tagline_en', 'value' => 'Superior professional fluency, specialized technical German (Fachsprache), and direct entrance to German universities.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_tagline_de', 'value' => 'Höchste Sprachkompetenz für Fachkräfte, Mediziner, Wirtschaftsdeutsch und universitäres Studium in Deutschland.', 'group' => 'programs', 'type' => 'text'],

            ['key' => 'program_advanced_description', 'value' => 'Program Advanced dirancang untuk profesional, dokter, perawat ahli, insinyur, dan calon mahasiswa master/doktoral yang memerlukan kemahiran bahasa Jerman tingkat lanjut. Fokus pembelajaran mencakup bahasa teknis dan bisnis (Wirtschaftsdeutsch & Fachsprache), retorika presentasi, penulisan laporan ilmiah, negosiasi kontrak, serta pemahaman mendalam tentang teks kompleks abstrak dan teknis.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_advanced_description_en', 'value' => 'Designed for qualified doctors, nurses, engineers, and graduate researchers. Focuses on advanced discourse, technical academic writing, medical terminology, negotiation rhetoric, and rigorous TestDaF / Goethe B2-C1 preparation.', 'group' => 'programs', 'type' => 'textarea'],
            ['key' => 'program_advanced_description_de', 'value' => 'Gezielt konzipiert für Akademiker, Ärzte, Ingenieure und Masterstudierende. Schwerpunkte: Fachsprache, wissenschaftliches Schreiben, Verhandlungsführung und zielgerichtetes Training für TestDaF sowie Goethe B2/C1.', 'group' => 'programs', 'type' => 'textarea'],

            ['key' => 'program_advanced_career_path', 'value' => 'Sertifikasi B2/C1 membuka akses langsung ke pasar kerja profesional berpenghasilan tinggi di Jerman, izin praktik profesi kesehatan, dan penerimaan universitas negeri ternama di Jerman.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_career_path_en', 'value' => 'Unlocks high-salary professional employment in Germany, medical professional licensing (Approbation), and direct admission to German public universities.', 'group' => 'programs', 'type' => 'text'],
            ['key' => 'program_advanced_career_path_de', 'value' => 'Berechtigt zur ärztlichen Approbation, direkter Arbeitsaufnahme in deutschen Spitzenunternehmen sowie uneingeschränkter Hochschulzulassung.', 'group' => 'programs', 'type' => 'text'],

            // CTA Section
            ['key' => 'cta_badge', 'value' => 'Mulai Perjalanan Anda', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_badge_en', 'value' => 'Start Your Journey Today', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_badge_de', 'value' => 'Starten Sie Ihre Sprachreise', 'group' => 'cta', 'type' => 'text'],

            ['key' => 'cta_title', 'value' => 'Raih Target Bahasa Jerman Anda Bersama Kami', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_title_en', 'value' => 'Achieve Your German Language Goals', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_title_de', 'value' => 'Erreichen Sie Ihre Deutsch-Sprachziele', 'group' => 'cta', 'type' => 'text'],

            ['key' => 'cta_subtitle', 'value' => 'Kami membantu mewujudkan cita-cita studi, karier, dan Ausbildung Anda di Jerman melalui kurikulum terstruktur dan bimbingan mentor berpengalaman.', 'group' => 'cta', 'type' => 'textarea'],
            ['key' => 'cta_subtitle_en', 'value' => 'We help you achieve your language learning goals, whether for travel, work, or personal enrichment with certified tutors.', 'group' => 'cta', 'type' => 'textarea'],
            ['key' => 'cta_subtitle_de', 'value' => 'Wir unterstützen Sie beim Erreichen Ihrer Sprachziele für Ausbildung, Studium oder Beruf mit praxisnahem Unterricht und Goethe-Zertifikat Vorbereitung.', 'group' => 'cta', 'type' => 'textarea'],

            ['key' => 'cta_button_text', 'value' => 'Hubungi Kami & Daftar Sekarang', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_button_text_en', 'value' => 'Contact Us & Enroll Now', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_button_text_de', 'value' => 'Kontaktieren & Jetzt Anmelden', 'group' => 'cta', 'type' => 'text'],
            ['key' => 'cta_button_url', 'value' => '#enroll', 'group' => 'cta', 'type' => 'text'],

            // Footer Section
            ['key' => 'footer_about', 'value' => 'LPK Mega Guna Talent adalah lembaga pelatihan kerja dan kursus bahasa Jerman resmi berstandar internasional CEFR dan SKKNI, mempersiapkan calon talenta andal untuk Ausbildung, karier, dan studi di Jerman.', 'group' => 'footer', 'type' => 'textarea'],
            ['key' => 'footer_about_en', 'value' => 'LPK Mega Guna Talent is an official vocational training and German language institution adhering to CEFR & SKKNI standards, preparing talented candidates for Ausbildung, careers, and university studies in Germany.', 'group' => 'footer', 'type' => 'textarea'],
            ['key' => 'footer_about_de', 'value' => 'LPK Mega Guna Talent ist ein offizielles Berufsbildungs- und Sprachinstitut nach GER- und SKKNI-Standards zur Vorbereitung von Talenten auf Ausbildung, Beruf und Studium in Deutschland.', 'group' => 'footer', 'type' => 'textarea'],

            ['key' => 'footer_copyright', 'value' => '© 2026 LPK Mega Guna Talent. Hak Cipta Dilindungi Undang-Undang.', 'group' => 'footer', 'type' => 'text'],
            ['key' => 'footer_copyright_en', 'value' => '© 2026 Mega Guna Talent. All Rights Reserved.', 'group' => 'footer', 'type' => 'text'],
            ['key' => 'footer_copyright_de', 'value' => '© 2026 Mega Guna Talent. Alle Rechte vorbehalten.', 'group' => 'footer', 'type' => 'text'],

            // Styling & Colors
            ['key' => 'theme_color_primary', 'value' => '#2C0B1E', 'group' => 'colors', 'type' => 'text'],
            ['key' => 'theme_color_gold', 'value' => '#E2B842', 'group' => 'colors', 'type' => 'text'],
            ['key' => 'theme_color_gold_hover', 'value' => '#CFA230', 'group' => 'colors', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'group' => $setting['group'],
                    'type' => $setting['type'],
                ]
            );
        }
    }
}
