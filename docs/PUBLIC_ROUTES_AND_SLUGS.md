# 🌐 Daftar Lengkap URL & Slug Frontend Publik — LPK Mega Guna Talent

Dokumen ini memuat referensi lengkap seluruh rute (*routes*), URL path, slug dinamis, dan endpoint publik yang dapat diakses oleh pengunjung maupun mesin pencari (*search engine crawlers*).

---

## 1. 🏠 Halaman Utama & Statis (Core Pages)

| URL Path | Nama Route | Controller & Method | Deskripsi |
|---|---|---|---|
| `/` | `home` | `GermanCourseController@index` | **Landing Page / Beranda Utama**<br>Hero section, trust metrics, preview program kursus, keunggulan, ulasan alumni, dan FAQ. |
| `/about` | `about` | `GermanCourseController@about` | **Tentang Kami (About Us)**<br>Profil LPK Mega Guna Talent, nomor izin & legalitas resmi Kemenaker, visi & misi, serta profil instruktur/mentor. |
| `/enroll-now` | `enroll` | `GermanCourseController@enroll` (GET)<br>`GermanCourseController@storeEnrollment` (POST) | **Formulir Pendaftaran Online**<br>Form registrasi calon siswa (dilindungi rate limiting `throttle:10,1` dan CSRF token). |

### 📍 Anchor Navigasi Halaman Utama (`/`)
- `/#programs` — Lompat ke perbandingan kartu program kursus
- `/#testimonials` — Lompat ke bagian testimoni alumni & peserta
- `/#faq` — Lompat ke accordion Tanya Jawab Seputar Kursus & Ausbildung

---

## 2. 🎓 Program Kursus Bahasa Jerman (`/programs`)

### A. Halaman Katalog Utama
| URL Path | Nama Route | Controller & Method | Deskripsi |
|---|---|---|---|
| `/programs` | `programs.index` | `ProgramController@index` | **Katalog Semua Program**<br>Overview seluruh jenjang kursus, perbandingan materi, durasi belajar, dan jalur karier. |

### B. Halaman Detail Tiap Program (`/programs/{slug}`)
| URL Path | Slug Parameter | Nama Route | Level CEFR | Deskripsi & Target |
|---|---|---|---|---|
| `/programs/beginner` | `beginner` | `programs.show` | **A1 – A2** | **Beginner German Program**<br>Fondasi bahasa Jerman, tata bahasa dasar, pengenalan kosakata sehari-hari, dan persiapan tes awal Goethe A1/A2. |
| `/programs/intermediate` | `intermediate` | `programs.show` | **B1** | **Intermediate German Program**<br>Tingkat kecakapan menengah mandiri. Syarat utama program Ausbildung Jerman, FSJ, dan Au Pair. |
| `/programs/advanced` | `advanced` | `programs.show` | **B2 – C1** | **Advanced German Program**<br>Tingkat lanjutan untuk keperluan profesional medis (*Pflegefachkraft*, dokter), teknik, dan perkuliahan (*Studienkolleg*/Universitas). |

*(Konten teks, silabus, dan benefit tiap program dapat dikustomisasi secara dinamis via Admin Panel di `/admin/settings` tab "Programs Section").*

---

## 3. 📰 Artikel & Blog Edukasi (`/blog`)

### A. Indeks Blog
| URL Path | Nama Route | Controller & Method | Deskripsi |
|---|---|---|---|
| `/blog` | `blog.index` | `BlogController@index` | **Katalog Artikel & Berita**<br>Dilengkapi pencarian teks bebas (`?search=`), filter kategori, dan pagination. |

### B. Filter Berdasarkan Kategori (`/blog/category/{slug}`)
| URL Path | Slug Kategori | Nama Kategori |
|---|---|---|
| `/blog/category/german-language-tips` | `german-language-tips` | **German Language Tips** (Tips belajar, kosakata penting, strategi ujian Goethe) |
| `/blog/category/study-in-germany` | `study-in-germany` | **Study in Germany** (Panduan kuliah di universitas negeri Jerman, biaya hidup, visa studi) |
| `/blog/category/career-ausbildung` | `career-ausbildung` | **Career & Ausbildung** (Jalur kerja, program vokasi Ausbildung keperawatan, perhotelan, teknik) |

### C. Detail Artikel Blog Aktif (`/blog/{slug}`)
| URL Path | Slug Artikel | Judul Artikel |
|---|---|---|
| `/blog/how-to-pass-goethe-zertifikat-a1-exam` | `how-to-pass-goethe-zertifikat-a1-exam` | *How to Pass the Goethe-Zertifikat A1 Exam with Flying Colors* |
| `/blog/complete-guide-ausbildung-in-germany` | `complete-guide-ausbildung-in-germany` | *Complete Guide to Ausbildung in Germany for Indonesian Students* |
| `/blog/top-5-german-public-universities-tuition-free` | `top-5-german-public-universities-tuition-free` | *Top 5 German Public Universities with Tuition-Free Bachelor Programs* |

*(Artikel baru yang dibuat di Admin Panel `/admin/blogs` akan otomatis mengenerate slug URL unik dan langsung live).*

---

## 4. 🔍 SEO & Web Crawler Endpoints

| URL Path | Nama Route | Controller & Method | Deskripsi |
|---|---|---|---|
| `/sitemap.xml` | `sitemap` | `SitemapController@index` | **XML Sitemap Dinamis**<br>Menghasilkan daftar seluruh URL publik (halaman statis, program, kategori, artikel blog) untuk pengindeksan Google Search Console. |
| `/robots.txt` | `robots` | `SitemapController@robots` | **Robots.txt**<br>Instruksi aturan crawling mesin pencari dan penunjuk lokasi `/sitemap.xml`. |

---

## 5. 🔐 Form Autentikasi Masuk Admin (Publik)

| URL Path | Nama Route | Controller & Method | Deskripsi |
|---|---|---|---|
| `/login` | `login` | `Admin\AdminAuthController@showLogin` | Halaman login admin (alias) |
| `/admin/login` | `admin.login` | `Admin\AdminAuthController@showLogin` (GET)<br>`Admin\AdminAuthController@login` (POST) | Halaman autentikasi resmi admin (dilindungi rate limiter `throttle:6,1`). |

---

*Terakhir diperbarui: 12 Oktober 2026 — LPK Mega Guna Talent.*
