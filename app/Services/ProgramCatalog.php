<?php

namespace App\Services;

use App\Models\SiteSetting;

class ProgramCatalog
{
    /**
     * Safely resolve a setting value with a fallback.
     */
    protected static function setting(string $key, mixed $default): mixed
    {
        try {
            if (class_exists(SiteSetting::class) && function_exists('app') && app()->has('cache')) {
                return SiteSetting::getLocalized($key, $default);
            }
        } catch (\Throwable) {
            // Graceful fallback during isolated unit tests or pre-boot
        }

        return $default;
    }

    /**
     * Get all programs indexed by slug with live site_settings values.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function all(): array
    {
        return [
            'beginner' => [
                'slug' => 'beginner',
                'title' => self::setting('program_beginner_title', 'Beginner German Program'),
                'level' => self::setting('program_beginner_level', 'A1 - A2 (CEFR)'),
                'level_short' => self::setting('program_beginner_level_short', 'A1 - A2'),
                'badge' => self::setting('program_beginner_badge', 'Fondasi & Percakapan Harian'),
                'icon' => 'images/shape-beginner.svg',
                'tagline' => self::setting('program_beginner_tagline', 'Kuasai Dasar Bahasa Jerman dari Nol Hingga Mampu Berkomunikasi Sehari-hari dan Lulus Sertifikasi Goethe A1/A2.'),
                'description' => self::setting('program_beginner_description', 'Program Beginner dirancang khusus bagi peserta yang belum pernah mempelajari bahasa Jerman sama sekali. Menggunakan metode pembelajaran interaktif berbasis SKKNI dan standar Goethe-Institut, peserta akan dibimbing mulai dari pelafalan presisi (Aussprache), kosakata esensial, struktur tata bahasa dasar (Akkusativ & Dativ), hingga simulasi percakapan nyata untuk kehidupan sehari-hari, perjalanan, dan persiapan awal studi di Jerman.'),
                'duration' => self::setting('program_beginner_duration', '10 - 12 Minggu'),
                'total_hours' => self::setting('program_beginner_total_hours', '160 Jam Pembelajaran Intensif'),
                'class_size' => self::setting('program_beginner_class_size', 'Maksimal 15 Siswa / Kelas'),
                'schedule' => self::setting('program_beginner_schedule', 'Senin - Jumat (09:00 - 13:00 WIB) / Pilihan Kelas Malam'),
                'target_exam' => self::setting('program_beginner_target_exam', 'Goethe-Zertifikat A1 & A2'),
                'target_audience' => [
                    'Pemula yang ingin memulai persiapan Ausbildung atau kuliah di Jerman dari nol.',
                    'Pelancong, pencari kerja, atau peminat budaya Jerman yang membutuhkan kemampuan komunikasi praktis.',
                    'Peserta program Au Pair atau FSJ yang membutuhkan sertifikat resmi A1/A2 untuk pengajuan visa.',
                ],
                'highlights' => [
                    'Modul Eksklusif Hueber & Klett terstandar internasional',
                    'Native Speaker Guest Sessions untuk mengasah pelafalan alami',
                    'Laboratorium Bahasa Multimedia & Simulasi Ujian Berkala',
                    'Garansi Pendampingan Ujian Goethe-Zertifikat',
                ],
                'learning_outcomes' => [
                    'Mampu memperkenalkan diri, keluarga, dan lingkungan sekitar dalam bahasa Jerman yang benar.',
                    'Memahami dan merespons instruksi harian, berbelanja, memesan makanan, dan menanyakan arah di Jerman.',
                    'Menguasai tata bahasa dasar: konjugasi kata kerja teratur dan tidak teratur, artikel (der, die, das), kasus Nominativ, Akkusativ, dan Dativ.',
                    'Mampu menulis pesan pendek, email informal, dan mengisi formulir resmi dalam bahasa Jerman.',
                ],
                'modules' => [
                    [
                        'code' => 'Modul 1',
                        'title' => 'Grundlagen & Aussprache',
                        'desc' => 'Pengenalan alfabet fonetik Jerman, pelafalan vokal khusus (ä, ö, ü, ß), salam, perkenalan diri, angka, dan profesi.',
                    ],
                    [
                        'code' => 'Modul 2',
                        'title' => 'Alltag, Familie & Wohnen',
                        'desc' => 'Mendeskripsikan keluarga, tempat tinggal, aktivitas harian, hobi, dan waktu. Penggunaan kata kerja bantu (Modalverben).',
                    ],
                    [
                        'code' => 'Modul 3',
                        'title' => 'Einkaufen, Essen & Reisen',
                        'desc' => 'Percakapan di supermarket, restoran, stasiun kereta, dan bandara. Penguasaan kasus Akkusativ dan Dativ dalam konteks praktis.',
                    ],
                    [
                        'code' => 'Modul 4',
                        'title' => 'Gesundheit & Berufsalltag',
                        'desc' => 'Berkomunikasi di apotek/dokter, kosakata kantor dasar, pengenalan bentuk lampau (Perfekt), dan struktur kalimat majemuk.',
                    ],
                    [
                        'code' => 'Modul 5',
                        'title' => 'Prüfungsvorbereitung Goethe A1/A2',
                        'desc' => 'Bedah format ujian resmi Goethe-Zertifikat: strategi Hörverstehen, Leseverstehen, Schriftlicher Ausdruck, dan Mündliche Prüfung.',
                    ],
                ],
                'career_path' => self::setting('program_beginner_career_path', 'Lulusan level ini memiliki pondasi kuat untuk melanjutkan ke level Intermediate B1 (syarat utama Ausbildung), serta memenuhi syarat administratif dasar program Au Pair dan visa tertentu ke Jerman.'),
                'faqs' => [
                    [
                        'q' => 'Apakah saya harus punya dasar bahasa Jerman sebelum mendaftar?',
                        'a' => 'Sama sekali tidak! Program Beginner dirancang dari level nol (ab initio). Tim instruktur kami akan membimbing Anda secara bertahap dari cara melafalkan kata pertama.',
                    ],
                    [
                        'q' => 'Berapa lama waktu yang dibutuhkan untuk menyelesaikan level ini?',
                        'a' => 'Program intensif berlangsung selama 10 hingga 12 minggu (sekitar 160 jam pelajaran), memastikan Anda siap mengikuti ujian Goethe-Zertifikat A1 atau A2.',
                    ],
                    [
                        'q' => 'Apakah biaya sudah termasuk materi belajar?',
                        'a' => 'Ya, seluruh peserta mendapatkan modul cetak resmi (Hueber/Klett), akses materi digital, rekaman materi, serta bank soal simulasi ujian tanpa biaya tambahan.',
                    ],
                ],
            ],
            'intermediate' => [
                'slug' => 'intermediate',
                'title' => self::setting('program_intermediate_title', 'Intermediate German Program'),
                'level' => self::setting('program_intermediate_level', 'B1 (CEFR)'),
                'level_short' => self::setting('program_intermediate_level_short', 'B1'),
                'badge' => self::setting('program_intermediate_badge', 'Pintu Gerbang Utama Ausbildung Jerman'),
                'icon' => 'images/shape-intermediate.svg',
                'tagline' => self::setting('program_intermediate_tagline', 'Kunci Kelulusan Goethe-Zertifikat B1 Sebagai Syarat Mutlak Visa Ausbildung, Studi Vokasi, dan Karier di Jerman.'),
                'description' => self::setting('program_intermediate_description', 'Program Intermediate difokuskan untuk mencapai tingkat kemandirian berbahasa Jerman (Selbstständige Sprachverwendung). Level B1 adalah syarat wajib paling krusial bagi calon peserta program Ausbildung (perhotelan, keperawatan/Pflege, teknik/Mechatronik, gastronomi, dll.) di Jerman. Di level ini, peserta dilatih berdiskusi, memahami teks berita, menyusun argumentasi formal, serta menguasai struktur gramatikal lanjutan seperti kalimat pasif (Passiv), Konjunktiv II, dan klausa bawahan (Nebensätze).'),
                'duration' => self::setting('program_intermediate_duration', '12 Minggu'),
                'total_hours' => self::setting('program_intermediate_total_hours', '180 Jam Pembelajaran Intensif'),
                'class_size' => self::setting('program_intermediate_class_size', 'Maksimal 15 Siswa / Kelas'),
                'schedule' => self::setting('program_intermediate_schedule', 'Senin - Jumat (08:30 - 13:00 WIB)'),
                'target_exam' => self::setting('program_intermediate_target_exam', 'Goethe-Zertifikat B1 (4 Modul)'),
                'target_audience' => [
                    'Alumni level A2 yang bersiap mengikuti seleksi kontrak kerja Ausbildung ke Jerman.',
                    'Calon mahasiswa yang membutuhkan sertifikat B1 untuk syarat masuk Studienkolleg atau program persiapan universitas.',
                    'Tenaga medis dan profesional yang mempersiapkan proses rekognisi dan visa kerja di Jerman.',
                ],
                'highlights' => [
                    'Simulasi Ujian Goethe B1 Mingguan (Reading, Listening, Writing, Speaking)',
                    'Pelatihan Etos Kerja & Budaya Interkultural Jerman (Interkulturelle Kompetenz)',
                    'Konsultasi Berkas & Portofolio Kontrak Ausbildung',
                    'Mentor Lulusan Universitas & Lembaga Pelatihan di Jerman',
                ],
                'learning_outcomes' => [
                    'Mampu memahami poin-poin utama percakapan standar terkait pekerjaan, sekolah, dan aktivitas santai di Jerman.',
                    'Dapat mengatasi sebagian besar situasi komunikasi saat bepergian atau tinggal di wilayah berbahasa Jerman.',
                    'Mampu menghasilkan teks terhubung sederhana tentang topik akrab atau minat pribadi.',
                    'Dapat mendeskripsikan pengalaman, peristiwa, impian, harapan, dan memberikan alasan singkat untuk rencana atau opini.',
                ],
                'modules' => [
                    [
                        'code' => 'Modul 1',
                        'title' => 'Arbeitswelt & Bewerbung',
                        'desc' => 'Dunia kerja di Jerman: menulis Lebenslauf (CV Jerman) dan Anschreiben (surat lamaran), simulasi wawancara kerja vokasi (Vorstellungsgespräch).',
                    ],
                    [
                        'code' => 'Modul 2',
                        'title' => 'Komplexe Grammatik & Passiv',
                        'desc' => 'Pendalaman kalimat pasif (Vorgangspassiv & Zustandspassiv), pengenalan Konjunktiv II untuk situasi hipotesis dan kesopanan, relasi kata sambung ganda (zweiteilige Konnektoren).',
                    ],
                    [
                        'code' => 'Modul 3',
                        'title' => 'Gesellschaft, Umwelt & Medien',
                        'desc' => 'Diskusi isu sosial, teknologi, gaya hidup ramah lingkungan, serta ekspresi menyatakan setuju/tidak setuju secara sopan dan terstruktur.',
                    ],
                    [
                        'code' => 'Modul 4',
                        'title' => 'Interkulturelle Kompetenz & Leben in DE',
                        'desc' => 'Pemahaman budaya kerja Jerman: kedisiplinan, ketepatan waktu (Pünktlichkeit), birokrasi sewa tempat tinggal (Wohnungssuche), dan asuransi sosial.',
                    ],
                    [
                        'code' => 'Modul 5',
                        'title' => 'Intensiv-Prüfungstraining B1',
                        'desc' => 'Drilling intensif 4 bagian ujian Goethe B1: strategi waktu, teknik skimming-scanning, trik oral exam berpasangan, dan evaluasi skor personal.',
                    ],
                ],
                'career_path' => self::setting('program_intermediate_career_path', 'Sertifikat Goethe B1 adalah dokumen resmi utama yang diakui Kedutaan Besar Jerman di Jakarta untuk penerbitan visa Ausbildung, visa mencari pelatihan kerja, dan visa studi persiapan.'),
                'faqs' => [
                    [
                        'q' => 'Apakah program ini sudah mencakup persiapan ujian Goethe B1?',
                        'a' => 'Ya, kurikulum Intermediate kami 100% selaras dengan format 4 modul resmi Goethe-Zertifikat B1 (Hören, Lesen, Schreiben, Sprechen) dengan simulasi berkala.',
                    ],
                    [
                        'q' => 'Apakah LPK Mega Guna Talent membantu penempatan Ausbildung setelah lulus B1?',
                        'a' => 'Tentu! Kami memiliki jaringan mitra industri terpercaya di Jerman untuk berbagai bidang (keperawatan, perhotelan, teknik, dll.) dan mendampingi siswa mulai dari berkas hingga keberangkatan.',
                    ],
                    [
                        'q' => 'Bagaimana jika saya belum lulus salah satu modul di ujian Goethe?',
                        'a' => 'Kami menyediakan kelas klinik pembekalan ulang khusus (re-drill) untuk modul yang belum lulus tanpa biaya pelatihan tambahan.',
                    ],
                ],
            ],
            'advanced' => [
                'slug' => 'advanced',
                'title' => self::setting('program_advanced_title', 'Advanced German Program'),
                'level' => self::setting('program_advanced_level', 'B2 - C1 (CEFR)'),
                'level_short' => self::setting('program_advanced_level_short', 'B2 - C1'),
                'badge' => self::setting('program_advanced_badge', 'Profisiensi Karier & Akademik'),
                'icon' => 'images/shape-advanced.svg',
                'tagline' => self::setting('program_advanced_tagline', 'Kecakapan Bahasa Tingkat Tinggi untuk Jalur Karier Profesional, Bahasa Khusus (Fachsprache), dan Studi Universitas di Jerman.'),
                'description' => self::setting('program_advanced_description', 'Program Advanced dirancang untuk profesional, dokter, perawat ahli, insinyur, dan calon mahasiswa master/doktoral yang memerlukan kemahiran bahasa Jerman tingkat lanjut. Fokus pembelajaran mencakup bahasa teknis dan bisnis (Wirtschaftsdeutsch & Fachsprache), retorika presentasi, penulisan laporan ilmiah, negosiasi kontrak, serta pemahaman mendalam tentang teks kompleks abstrak dan teknis.'),
                'duration' => self::setting('program_advanced_duration', '12 - 14 Minggu'),
                'total_hours' => self::setting('program_advanced_total_hours', '200 Jam Pembelajaran Intensif'),
                'class_size' => self::setting('program_advanced_class_size', 'Maksimal 12 Siswa / Kelas (Fokus & Presisi)'),
                'schedule' => self::setting('program_advanced_schedule', 'Senin - Jumat / Kelas Spesialisasi Fleksibel'),
                'target_exam' => self::setting('program_advanced_target_exam', 'Goethe-Zertifikat B2/C1 & TestDaF'),
                'target_audience' => [
                    'Dokter, perawat, atau tenaga medis yang mempersiapkan ujian bahasa profesi (Fachsprachenprüfung / FSP) di Jerman.',
                    'Insinyur, profesional IT, dan manajer yang akan berkarier langsung di korporasi Jerman.',
                    'Calon mahasiswa yang membutuhkan sertifikasi bahasa B2/C1 atau TestDaF untuk kuliah program Sarjana/Magister berbahasa Jerman.',
                ],
                'highlights' => [
                    'Kurikulum Bahasa Bisnis & Terminologi Khusus Industri (Fachsprache)',
                    'Instruktur Berlisensi BNSP & Pengajar Berpengalaman di Korporasi Multinasional',
                    'Bedah Jurnal Ilmiah, Analisis Kasus Bisnis Jerman, & Debat Kritis',
                    'Bimbingan Ujian TestDaF & Goethe C1 Terpadu',
                ],
                'learning_outcomes' => [
                    'Mampu memahami ide utama dari teks kompleks tentang topik konkret maupun abstrak, termasuk diskusi teknis di bidang keahlian spesifik.',
                    'Dapat berkomunikasi dengan tingkat kefasihan dan spontanitas yang memungkinkan interaksi rutin dengan penutur asli tanpa kendala.',
                    'Mampu menghasilkan teks yang jelas, detail, dan terstruktur dengan baik mengenai berbagai subjek luas serta mempertahankan sudut pandang.',
                    'Menguasai struktur gramatikal mutakhir: Partizipialkonstruktionen, Nominalisierungsstil, dan ragam bahasa formal (Gehobene Sprache).',
                ],
                'modules' => [
                    [
                        'code' => 'Modul 1',
                        'title' => 'Wirtschaftsdeutsch & Fachkommunikation',
                        'desc' => 'Komunikasi bisnis tingkat tinggi: korespondensi formal korporasi, negosiasi, presentasi laporan analitis, dan etika profesional Jerman.',
                    ],
                    [
                        'code' => 'Modul 2',
                        'title' => 'Fachsprache Medizin & Technik',
                        'desc' => 'Pengenalan terminologi teknis khusus (keperawatan/medis dan rekayasa teknik), komunikasi rekam medis dan instruksi keselamatan kerja di Jerman.',
                    ],
                    [
                        'code' => 'Modul 3',
                        'title' => 'Wissenschaftliches Arbeiten & Argumentation',
                        'desc' => 'Penulisan akademis, sintesis data, analisis grafik statistik, dan retorika debat formal sesuai standar perguruan tinggi Jerman.',
                    ],
                    [
                        'code' => 'Modul 4',
                        'title' => 'Gehobene Grammatik & Stilistik',
                        'desc' => 'Penguasaan gaya bahasa nominal (Nominalstil), konstruksi partisip aktif/pasif diperluas, variasi preposisi genitif, dan nuansa ungkapan idiomatis.',
                    ],
                    [
                        'code' => 'Modul 5',
                        'title' => 'TestDaF & Goethe B2/C1 Mastery',
                        'desc' => 'Simulasi ujian berstandar tinggi: teknik pemecahan soal TestDaF (Niveaustufe 4 & 5) dan persiapan kelulusan Goethe-Zertifikat C1.',
                    ],
                ],
                'career_path' => self::setting('program_advanced_career_path', 'Sertifikasi B2/C1 membuka akses langsung ke pasar kerja profesional berpenghasilan tinggi di Jerman, izin praktik profesi kesehatan, dan penerimaan universitas negeri ternama di Jerman.'),
                'faqs' => [
                    [
                        'q' => 'Apakah program ini cocok untuk persiapan ujian bahasa medis (FSP)?',
                        'a' => 'Sangat cocok. Modul kami mencakup pendalaman Fachsprache medis dan simulasi anamnesis pasien yang sangat relevan untuk dokter dan perawat.',
                    ],
                    [
                        'q' => 'Berapa level minimal untuk bisa bergabung di kelas Advanced?',
                        'a' => 'Peserta diharapkan telah memiliki sertifikat B1 atau lulus tes penempatan (placement test) internal LPK Mega Guna Talent dengan skor memadai.',
                    ],
                    [
                        'q' => 'Apakah jadwal belajar bisa disesuaikan bagi yang sudah bekerja?',
                        'a' => 'Tentu, kami menyediakan opsi kelas sore/malam dan akhir pekan dengan kurikulum intensif yang sama berkualitasnya.',
                    ],
                ],
            ],
        ];
    }

    /**
     * Find a program by its slug.
     *
     * @return array<string, mixed>|null
     */
    public static function find(string $slug): ?array
    {
        $programs = self::all();

        return $programs[$slug] ?? null;
    }

    /**
     * Check if a program exists.
     */
    public static function exists(string $slug): bool
    {
        return isset(self::all()[$slug]);
    }
}
