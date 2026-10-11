@extends('layouts.app')

@section('title', 'Tentang Kami - LPK Mega Guna Talent | Pusat Pelatihan & Bahasa Jerman')

@section('meta_description', 'Mengenal LPK Mega Guna Talent: Lembaga Pelatihan Kerja resmi berstandar SKKNI & Goethe-Institut di Villa Galaxy Bekasi Selatan. Fasilitas modern, instruktur berpengalaman internasional, dan jalur karier Ausbildung di Jerman.')

@push('meta')
    <meta property="og:title" content="Tentang Kami - LPK Mega Guna Talent">
    <meta property="og:description" content="Pusat Pelatihan Kerja & Bahasa Jerman terdepan di Bekasi Selatan. Kurikulum resmi SKKNI & Goethe-Institut, fasilitas multimedia representatif, dan jalur resmi Ausbildung di Jerman.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('about') }}">
    <meta property="og:image" content="{{ asset('images/about/building-exterior.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tentang Kami - LPK Mega Guna Talent">
    <meta name="twitter:description" content="Lembaga Pelatihan Kerja terdepan dalam membangun SDM kompeten sesuai standar nasional SKKNI dan internasional Goethe-Institut.">
    <meta name="twitter:image" content="{{ asset('images/about/building-exterior.jpg') }}">

    <!-- Schema.org EducationalOrganization & LocalBusiness Structured Data -->
    <script type="application/ld+json">
    {!! json_encode([
      '@'.'context' => 'https://schema.org',
      '@'.'graph' => [
        [
          '@'.'type' => ['EducationalOrganization', 'LocalBusiness'],
          '@'.'id' => route('about') . '#organization',
          'name' => 'LPK Mega Guna Talent',
          'alternateName' => 'Mega Guna Talent German Language Study',
          'url' => url('/'),
          'logo' => asset('images/logo.png'),
          'image' => asset('images/about/building-exterior.jpg'),
          'description' => 'Lembaga Pelatihan Kerja resmi yang berfokus pada pelatihan bahasa Jerman, persiapan ujian sertifikasi Goethe-Institut B1, pembekalan budaya kerja, dan pembinaan karier vokasi internasional.',
          'founder' => [
            '@'.'type' => 'Person',
            'name' => 'Moses Pasande',
            'jobTitle' => 'Kepala LPK & Founder',
          ],
          'address' => [
            '@'.'type' => 'PostalAddress',
            'streetAddress' => 'Jln Boulevard Raya A1 No. 16 Villa Galaxy RT. 001/019',
            'addressLocality' => 'Bekasi Selatan',
            'addressRegion' => 'Jawa Barat',
            'postalCode' => '17147',
            'addressCountry' => 'ID',
          ],
          'areaServed' => [
            '@'.'type' => 'AdministrativeArea',
            'name' => 'Indonesia',
          ],
          'hasOfferCatalog' => [
            '@'.'type' => 'OfferCatalog',
            'name' => 'Program Pelatihan Bahasa Jerman & Vokasi',
            'itemListElement' => [
              [
                '@'.'type' => 'Course',
                'name' => 'Kursus Bahasa Jerman Dasar A1 - A2',
                'description' => 'Pelatihan tata bahasa, pelafalan, dan komunikasi harian bahasa Jerman bagi pemula.',
              ],
              [
                '@'.'type' => 'Course',
                'name' => 'Kursus Intensif B1 & Persiapan Sertifikasi Goethe',
                'description' => 'Program intensif persiapan kelulusan sertifikasi Goethe-Zertifikat B1 untuk Ausbildung dan studi di Jerman.',
              ],
              [
                '@'.'type' => 'Course',
                'name' => 'Pembekalan Budaya & Etos Kerja Jerman (Ausbildung Preparation)',
                'description' => 'Pelatihan interkultural, simulasi wawancara kerja, dan persiapan dokumen resmi ke Jerman.',
              ],
            ],
          ],
        ],
        [
          '@'.'type' => 'BreadcrumbList',
          '@'.'id' => route('about') . '#breadcrumb',
          'itemListElement' => [
            [
              '@'.'type' => 'ListItem',
              'position' => 1,
              'name' => 'Home',
              'item' => route('home'),
            ],
            [
              '@'.'type' => 'ListItem',
              'position' => 2,
              'name' => 'About Us',
              'item' => route('about'),
            ],
          ],
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')
<div class="relative w-full overflow-hidden text-white font-arsenal">

    <!-- HERO SECTION: Cinematic Luxury Gradient & Metric Counters -->
    <section class="relative pt-36 pb-20 sm:pt-44 sm:pb-28 px-6 sm:px-12 md:px-16 overflow-hidden">
        <!-- Ambient Glow Effects -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[650px] h-[650px] bg-[#fdc04f]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
        <div class="absolute bottom-10 right-10 w-[450px] h-[450px] bg-[#2C0B1E] rounded-full blur-2xl pointer-events-none -z-10"></div>

        <div class="max-w-6xl mx-auto text-center space-y-6">
            <!-- Official Institution Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#fdc04f]/15 border border-[#fdc04f]/40 text-[#fdc04f] text-xs sm:text-sm font-bold tracking-widest uppercase backdrop-blur-md">
                <span class="w-2.5 h-2.5 rounded-full bg-[#fdc04f] animate-pulse"></span>
                <span>{{ \App\Models\SiteSetting::get('about_hero_badge', 'LPK Resmi Kemnaker RI • SKKNI & Goethe-Institut Standard') }}</span>
            </div>

            <!-- Page Main Title -->
            <h1 class="font-yeseva text-3xl sm:text-5xl md:text-6xl text-[#fdc04f] leading-tight drop-shadow-[0_4px_16px_rgba(0,0,0,0.6)]">
                {!! nl2br(e(\App\Models\SiteSetting::get('about_hero_title', "Membangun Generasi Kompeten &\nSiap Berkarier Global di Jerman"))) !!}
            </h1>

            <p class="max-w-3xl mx-auto text-base sm:text-xl text-[#f2ebfd]/90 font-lato leading-relaxed">
                {{ \App\Models\SiteSetting::get('about_hero_subtitle', 'LPK Mega Guna Talent adalah Lembaga Pelatihan Kerja terakreditasi yang berdedikasi menempa talenta muda Indonesia dengan penguasaan bahasa Jerman berstandar internasional, penguatan etos kerja profesional, dan fasilitas pembelajaran modern.') }}
            </p>

            <!-- Action Buttons -->
            <div class="pt-4 flex flex-wrap items-center justify-center gap-4 sm:gap-6">
                <a href="#profil-lembaga" class="btn-brand-double text-base sm:text-lg">
                    Profil Lembaga
                </a>
                <a href="#galeri-fasilitas" class="px-6 py-3.5 rounded-none border-2 border-[#fdc04f] text-[#fdc04f] hover:bg-[#fdc04f] hover:text-[#321f47] font-bold transition-all duration-300">
                    Lihat Fasilitas & Ruang Kelas
                </a>
            </div>

            <!-- Key Metric Counter Cards -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 pt-12 sm:pt-16 text-left">
                <!-- Card 1 -->
                <div class="bg-black/30 backdrop-blur-md border border-[#fdc04f]/25 p-5 sm:p-6 rounded-lg hover:border-[#fdc04f] transition-all hover:-translate-y-1 group">
                    <div class="font-yeseva text-3xl sm:text-4xl text-[#fdc04f] mb-1 group-hover:scale-105 transition-transform">
                        240+
                    </div>
                    <div class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato uppercase tracking-wider">
                        Kapasitas Siswa / Tahun
                    </div>
                    <div class="text-[11px] text-[#fdc04f]/70 mt-2">
                        4 Batch Intensif @ 60 Siswa
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-black/30 backdrop-blur-md border border-[#fdc04f]/25 p-5 sm:p-6 rounded-lg hover:border-[#fdc04f] transition-all hover:-translate-y-1 group">
                    <div class="font-yeseva text-3xl sm:text-4xl text-[#fdc04f] mb-1 group-hover:scale-105 transition-transform">
                        3 Ruang
                    </div>
                    <div class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato uppercase tracking-wider">
                        Kelas Multimedia Representatif
                    </div>
                    <div class="text-[11px] text-[#fdc04f]/70 mt-2">
                        AC, Smart Audio, Proyektor
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-black/30 backdrop-blur-md border border-[#fdc04f]/25 p-5 sm:p-6 rounded-lg hover:border-[#fdc04f] transition-all hover:-translate-y-1 group">
                    <div class="font-yeseva text-3xl sm:text-4xl text-[#fdc04f] mb-1 group-hover:scale-105 transition-transform">
                        100%
                    </div>
                    <div class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato uppercase tracking-wider">
                        Standar SKKNI & Goethe
                    </div>
                    <div class="text-[11px] text-[#fdc04f]/70 mt-2">
                        Level A1, A2 hingga B1
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-black/30 backdrop-blur-md border border-[#fdc04f]/25 p-5 sm:p-6 rounded-lg hover:border-[#fdc04f] transition-all hover:-translate-y-1 group">
                    <div class="font-yeseva text-3xl sm:text-4xl text-[#fdc04f] mb-1 group-hover:scale-105 transition-transform">
                        Bekasi
                    </div>
                    <div class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato uppercase tracking-wider">
                        Lokasi Villa Galaxy
                    </div>
                    <div class="text-[11px] text-[#fdc04f]/70 mt-2">
                        Akses Strategis & Nyaman
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 2: Identitas & Filosofi Lembaga (Parallax Motion) -->
    <section id="profil-lembaga" class="relative py-16 sm:py-24 px-6 sm:px-12 md:px-16 overflow-hidden border-t border-[#fdc04f]/15">
        <!-- Parallax Background Layer -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0 bg-[#0b4555]">
            <img src="{{ asset('images/global-bg.jpg') }}" 
                 alt="LPK Atmosphere Background" 
                 id="about-profile-parallax-bg"
                 class="w-full h-[170%] -top-[35%] absolute object-cover object-top will-change-transform scale-110"
                 fetchpriority="high">
            <!-- Subtle gradient overlay for crisp typography while keeping global-bg clouds crystal clear -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-transparent to-black/40 pointer-events-none"></div>
        </div>

        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">
            <!-- Left Column: Story & Identity -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Sekilas Tentang Kami
                </div>
                <h2 class="font-yeseva text-2xl sm:text-4xl text-white leading-snug">
                    Dedikasi Penuh untuk Pelatihan Kerja & Penguasaan Bahasa Asing Berkualitas
                </h2>
                
                <div class="space-y-4 text-base sm:text-lg text-[#f2ebfd]/85 font-lato leading-relaxed">
                    <p>
                        <strong class="text-[#fdc04f]">LPK Mega Guna Talent</strong> didirikan dengan tekad kuat untuk menjembatani generasi muda Indonesia dalam meraih kesempatan emas berkarier dan menempuh pendidikan vokasi (Ausbildung) di Republik Federal Jerman.
                    </p>
                    <p>
                        Berlokasi di kawasan prestisius <span class="text-white font-semibold">Villa Galaxy, Bekasi Selatan</span>, lembaga kami dirancang khusus dengan fasilitas gedung modern berkapasitas ratusan peserta didik. Kami memadukan pendekatan kurikulum interaktif berbasis <span class="text-[#fdc04f] font-semibold">SKKNI (Standar Kompetensi Kerja Nasional Indonesia)</span> dan silabus sertifikasi internasional <span class="text-[#fdc04f] font-semibold">Goethe-Institut (CEFR)</span>.
                    </p>
                    <p>
                        Bukan sekadar mengajarkan tata bahasa, kami menanamkan kedisiplinan, pemahaman lintas budaya (<em class="italic">Interkulturelle Kompetenz</em>), etos kerja presisi, dan simulasi kehidupan nyata di Jerman agar setiap siswa berangkat dengan kepercayaan diri penuh.
                    </p>
                </div>

                <!-- Core Pillars Highlights -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                    <div class="flex items-start gap-3 p-4 rounded-md bg-[#321f47]/80 border border-[#fdc04f]/20">
                        <div class="w-8 h-8 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center font-bold text-sm shrink-0">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-base">Berizin Resmi</h4>
                            <p class="text-xs sm:text-sm text-[#f2ebfd]/70 font-lato mt-0.5">Sesuai UU Ketenagakerjaan No. 13/2003 & regulasi vokasi Kemnaker RI.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 rounded-md bg-[#321f47]/80 border border-[#fdc04f]/20">
                        <div class="w-8 h-8 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center font-bold text-sm shrink-0">
                            ✓
                        </div>
                        <div>
                            <h4 class="font-bold text-white text-base">Instruktur Bersertifikat</h4>
                            <p class="text-xs sm:text-sm text-[#f2ebfd]/70 font-lato mt-0.5">Mentor lulusan internasional dengan sertifikasi kompetensi resmi BNSP & Goethe.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Institutional Showcase Card -->
            <div class="lg:col-span-5 relative">
                <div class="relative rounded-2xl overflow-hidden border-2 border-[#fdc04f]/40 shadow-2xl shadow-black/80 group">
                    <img src="{{ asset('images/about/building-exterior.jpg') }}" 
                         alt="Gedung LPK Mega Guna Talent Villa Galaxy Bekasi" 
                         class="w-full h-80 sm:h-96 object-cover object-center group-hover:scale-105 transition-transform duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-[#2C0B1E] via-[#2C0B1E]/40 to-transparent"></div>

                    <!-- Overlay Caption Badge -->
                    <div class="absolute bottom-0 inset-x-0 p-6 space-y-2">
                        <span class="inline-block px-3 py-1 bg-[#fdc04f] text-[#321f47] text-xs font-bold uppercase tracking-wider rounded">
                            Gedung Kampus Utama
                        </span>
                        <h3 class="font-yeseva text-xl text-white">
                            LPK Mega Guna Talent
                        </h3>
                        <p class="text-xs sm:text-sm text-[#f2ebfd]/90 font-lato">
                            Jln Boulevard Raya A1 No. 16 Villa Galaxy, Jaka Setia, Bekasi Selatan.
                        </p>
                    </div>
                </div>

                <!-- Floating Accent Box -->
                <div class="hidden sm:block absolute -bottom-6 -left-6 bg-[#321f47] border border-[#fdc04f] p-4 rounded-lg shadow-xl max-w-[220px]">
                    <p class="text-xs text-[#fdc04f] font-bold uppercase tracking-wider">Lingkungan Belajar</p>
                    <p class="text-sm text-white font-lato mt-1">Eksklusif, kondusif, dan dilengkapi sarana multimedia mutakhir.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 3: Visi, Misi & 7 Pilar Strategis -->
    <section class="relative py-16 sm:py-24 px-6 sm:px-12 md:px-16 border-t border-[#fdc04f]/15">
        <div class="max-w-6xl mx-auto space-y-16">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Arah & Fondasi Lembaga
                </div>
                <h2 class="font-yeseva text-3xl sm:text-5xl text-[#fdc04f]">
                    Visi & Misi Strategis
                </h2>
                <p class="text-base sm:text-lg text-[#f2ebfd]/80 font-lato">
                    Komitmen teguh LPK Mega Guna Talent dalam mewujudkan standar kompetensi kerja berkualitas tinggi yang diakui di panggung global.
                </p>
            </div>

            <!-- Visi Card (Heroic High-impact Design) -->
            <div class="relative p-8 sm:p-12 rounded-2xl bg-gradient-to-r from-black/60 via-[#2C0B1E]/60 to-black/60 border-2 border-[#fdc04f]/50 shadow-2xl overflow-hidden">
                <div class="absolute -right-16 -top-16 w-64 h-64 bg-[#fdc04f]/10 rounded-full blur-3xl pointer-events-none"></div>
                <div class="relative z-10 text-center max-w-4xl mx-auto space-y-4">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-[#fdc04f] text-[#321f47] font-bold text-xs sm:text-sm uppercase tracking-widest">
                        Visi Utama Kami
                    </span>
                    <blockquote class="font-yeseva text-xl sm:text-3xl md:text-4xl text-white leading-relaxed italic">
                        “{{ \App\Models\SiteSetting::get('about_visi', 'Menjadi Lembaga Pelatihan Kerja Yang Terdepan Dalam Membangun SDM Kompeten Sesuai Dengan Standar Kompetensi Kerja Nasional dan Internasional') }}”
                    </blockquote>
                    <p class="text-sm text-[#fdc04f]/90 font-lato">
                        — Ditetapkan oleh Dewan Pembina & Manajemen LPK Mega Guna Talent
                    </p>
                </div>
            </div>

            <!-- 7 Pilar Misi Lembaga (Interactive Matrix) -->
            <div>
                <div class="text-center mb-8">
                    <h3 class="font-yeseva text-2xl sm:text-3xl text-white">
                        7 Pilar Misi & Rencana Strategis
                    </h3>
                    <p class="text-sm sm:text-base text-[#f2ebfd]/70 font-lato mt-1">
                        Pedoman operasional penyelenggaraan pelatihan kerja di LPK Mega Guna Talent
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Misi 1 -->
                    <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all hover:-translate-y-1.5 group flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full bg-[#fdc04f]/20 text-[#fdc04f] flex items-center justify-center font-yeseva text-lg mb-4 group-hover:bg-[#fdc04f] group-hover:text-[#321f47] transition-colors">
                                01
                            </div>
                            <h4 class="font-bold text-lg text-white mb-2">Regulasi Pelatihan PBK</h4>
                            <p class="text-sm text-[#f2ebfd]/75 font-lato leading-relaxed">
                                Menyelenggarakan pelatihan kerja berbasis kompetensi (PBK) yang patuh dan selaras dengan regulasi Kementerian Ketenagakerjaan Republik Indonesia.
                            </p>
                        </div>
                        <div class="pt-4 text-xs text-[#fdc04f] font-semibold">
                            Kemnaker Standard
                        </div>
                    </div>

                    <!-- Misi 2 -->
                    <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all hover:-translate-y-1.5 group flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full bg-[#fdc04f]/20 text-[#fdc04f] flex items-center justify-center font-yeseva text-lg mb-4 group-hover:bg-[#fdc04f] group-hover:text-[#321f47] transition-colors">
                                02
                            </div>
                            <h4 class="font-bold text-lg text-white mb-2">Kurikulum Standar Industri</h4>
                            <p class="text-sm text-[#f2ebfd]/75 font-lato leading-relaxed">
                                Mengembangkan kurikulum berstandar industri dan silabus resmi Goethe-Institut e.V. untuk menjamin relevansi keterampilan siswa.
                            </p>
                        </div>
                        <div class="pt-4 text-xs text-[#fdc04f] font-semibold">
                            Goethe & CEFR Aligned
                        </div>
                    </div>

                    <!-- Misi 3 -->
                    <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all hover:-translate-y-1.5 group flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full bg-[#fdc04f]/20 text-[#fdc04f] flex items-center justify-center font-yeseva text-lg mb-4 group-hover:bg-[#fdc04f] group-hover:text-[#321f47] transition-colors">
                                03
                            </div>
                            <h4 class="font-bold text-lg text-white mb-2">Instruktur Bersertifikasi BNSP</h4>
                            <p class="text-sm text-[#f2ebfd]/75 font-lato leading-relaxed">
                                Meningkatkan kapasitas tenaga pelatih profesional yang memiliki sertifikat kompetensi metodologi pelatihan dan bahasa Jerman tingkat tinggi.
                            </p>
                        </div>
                        <div class="pt-4 text-xs text-[#fdc04f] font-semibold">
                            Certified Mentorship
                        </div>
                    </div>

                    <!-- Misi 4 -->
                    <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all hover:-translate-y-1.5 group flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full bg-[#fdc04f]/20 text-[#fdc04f] flex items-center justify-center font-yeseva text-lg mb-4 group-hover:bg-[#fdc04f] group-hover:text-[#321f47] transition-colors">
                                04
                            </div>
                            <h4 class="font-bold text-lg text-white mb-2">Sarana Multimedia Modern</h4>
                            <p class="text-sm text-[#f2ebfd]/75 font-lato leading-relaxed">
                                Menyediakan sarana dan prasarana multimedia interaktif berteknologi tinggi untuk menghadirkan pengalaman belajar yang imersif dan efektif.
                            </p>
                        </div>
                        <div class="pt-4 text-xs text-[#fdc04f] font-semibold">
                            Smart Interactive Lab
                        </div>
                    </div>

                    <!-- Misi 5 -->
                    <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all hover:-translate-y-1.5 group flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-full bg-[#fdc04f]/20 text-[#fdc04f] flex items-center justify-center font-yeseva text-lg mb-4 group-hover:bg-[#fdc04f] group-hover:text-[#321f47] transition-colors">
                                05
                            </div>
                            <h4 class="font-bold text-lg text-white mb-2">Manajemen Mutu Terpadu</h4>
                            <p class="text-sm text-[#f2ebfd]/75 font-lato leading-relaxed">
                                Mengimplementasikan sistem manajemen penjaminan mutu dan tata kelola digital terintegrasi demi transparansi proses pembelajaran.
                            </p>
                        </div>
                        <div class="pt-4 text-xs text-[#fdc04f] font-semibold">
                            Quality Assurance
                        </div>
                    </div>

                    <!-- Misi 6 & 7 Combined Feature -->
                    <div class="p-6 rounded-xl bg-gradient-to-br from-[#2C0B1E] to-black/60 border border-[#fdc04f]/40 hover:border-[#fdc04f] transition-all hover:-translate-y-1.5 group flex flex-col justify-between md:col-span-2 lg:col-span-1">
                        <div>
                            <div class="w-10 h-10 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center font-yeseva text-lg mb-4 font-bold">
                                06+
                            </div>
                            <h4 class="font-bold text-lg text-white mb-2">Kemitraan Penempatan & GNIK</h4>
                            <p class="text-sm text-[#f2ebfd]/75 font-lato leading-relaxed">
                                Membangun kemitraan strategis penempatan kerja vokasi di Jerman (Ausbildung) serta mendukung penuh Gerakan Nasional Indonesia Kompeten.
                            </p>
                        </div>
                        <div class="pt-4 text-xs text-[#fdc04f] font-semibold">
                            Global Career Network
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 4: Struktur Pimpinan & Tim Instruktur (Parallax Motion) -->
    <section id="struktur-manajemen" class="relative py-16 sm:py-24 px-6 sm:px-12 md:px-16 overflow-hidden border-t border-[#fdc04f]/15 bg-[#2C0B1E]">
        <!-- Parallax Background Layer -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
            <img src="{{ asset('images/about/mentors-bg.jpg') }}" 
                 alt="Struktur Manajemen & Mentor Background" 
                 id="about-mentors-parallax-bg"
                 class="w-full h-[170%] -top-[35%] absolute object-cover object-center will-change-transform scale-110"
                 loading="lazy">
            <!-- Luxury Dark Plum and Vignette Overlay for Crisp Typography Contrast -->
            <div class="absolute inset-0 bg-gradient-to-b from-[#2C0B1E]/90 via-[#2C0B1E]/65 to-[#2C0B1E]/95 pointer-events-none"></div>
            <div class="absolute inset-0 bg-black/30 pointer-events-none"></div>
        </div>

        <div class="max-w-6xl mx-auto space-y-14 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Kepemimpinan & Tenaga Pengajar
                </div>
                <h2 class="font-yeseva text-3xl sm:text-5xl text-[#fdc04f]">
                    Struktur Manajemen & Mentor
                </h2>
                <p class="text-base sm:text-lg text-[#f2ebfd]/80 font-lato">
                    Dipimpin oleh para profesional berwawasan global yang berdedikasi mengantarkan setiap siswa meraih masa depan cemerlang di Jerman.
                </p>
            </div>

            <!-- Founder & Senior Mentors Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Founder: Moses Pasande -->
                <div class="bg-black/50 border border-[#fdc04f]/30 rounded-2xl overflow-hidden hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-2 group shadow-xl">
                    <div class="relative h-64 sm:h-72 bg-gradient-to-t from-[#2C0B1E] to-[#321f47] flex items-center justify-center overflow-hidden">
                        <!-- Abstract Elegant Founder Silhouette / Graphic Icon -->
                        <div class="w-32 h-32 rounded-full border-4 border-[#fdc04f]/40 flex items-center justify-center bg-black/40 text-[#fdc04f] group-hover:scale-110 transition-transform">
                            <span class="font-yeseva text-5xl">MP</span>
                        </div>
                        <div class="absolute bottom-3 left-4 right-4 text-center">
                            <span class="inline-block px-3 py-1 bg-[#fdc04f] text-[#321f47] text-xs font-bold uppercase rounded-full">
                                Kepala LPK & Founder
                            </span>
                        </div>
                    </div>
                    <div class="p-6 space-y-3">
                        <h3 class="font-yeseva text-2xl text-white group-hover:text-[#fdc04f] transition-colors">
                            Moses Pasande
                        </h3>
                        <p class="text-xs uppercase tracking-wider text-[#fdc04f] font-bold">
                            Founder & Head of Institution
                        </p>
                        <p class="text-sm text-[#f2ebfd]/80 font-lato leading-relaxed">
                            Pemimpin visioner dalam ekosistem pelatihan vokasi internasional. Berkomitmen menghadirkan kurikulum berstandar industri dan tata kelola pendidikan yang berorientasi pada hasil kerja nyata.
                        </p>
                    </div>
                </div>

                <!-- Ramona Novelia Wiyono -->
                <div class="bg-black/50 border border-[#fdc04f]/30 rounded-2xl overflow-hidden hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-2 group shadow-xl">
                    <div class="relative h-64 sm:h-72 bg-gradient-to-t from-[#2C0B1E] to-[#321f47] overflow-hidden">
                        <img src="{{ asset('images/about/mentor-ramona.jpg') }}" 
                             alt="Ramona Novelia Wiyono - Kabid Kurikulum & Senior Mentor" 
                             class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#2C0B1E] via-transparent to-transparent"></div>
                        <div class="absolute bottom-3 left-4 right-4 text-center">
                            <span class="inline-block px-3 py-1 bg-[#fdc04f] text-[#321f47] text-xs font-bold uppercase rounded-full">
                                Kabid Kurikulum & Senior Mentor
                            </span>
                        </div>
                    </div>
                    <div class="p-6 space-y-3">
                        <h3 class="font-yeseva text-2xl text-white group-hover:text-[#fdc04f] transition-colors">
                            Ramona Novelia Wiyono
                        </h3>
                        <p class="text-xs uppercase tracking-wider text-[#fdc04f] font-bold">
                            Head of Curriculum & Global Educator
                        </p>
                        <p class="text-sm text-[#f2ebfd]/80 font-lato leading-relaxed">
                            Alumnus Raffles Shanghai & RMIT University Melbourne (Bachelor of Design). Pemegang sertifikasi 120-Hour TESOL/TEFL dan alumnus UIBE Beijing dengan pengalaman mengajar multibahasa tingkat internasional.
                        </p>
                    </div>
                </div>

                <!-- Muhammad Rafa Affansyah Purba -->
                <div class="bg-black/50 border border-[#fdc04f]/30 rounded-2xl overflow-hidden hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-2 group shadow-xl">
                    <div class="relative h-64 sm:h-72 bg-gradient-to-t from-[#2C0B1E] to-[#321f47] overflow-hidden">
                        <img src="{{ asset('images/about/mentor-rafa.jpg') }}" 
                             alt="Muhammad Rafa Affansyah Purba - Instruktur Bahasa Jerman" 
                             class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#2C0B1E] via-transparent to-transparent"></div>
                        <div class="absolute bottom-3 left-4 right-4 text-center">
                            <span class="inline-block px-3 py-1 bg-[#fdc04f] text-[#321f47] text-xs font-bold uppercase rounded-full">
                                Instruktur Bahasa Jerman
                            </span>
                        </div>
                    </div>
                    <div class="p-6 space-y-3">
                        <h3 class="font-yeseva text-2xl text-white group-hover:text-[#fdc04f] transition-colors">
                            Muhammad Rafa Affansyah Purba
                        </h3>
                        <p class="text-xs uppercase tracking-wider text-[#fdc04f] font-bold">
                            Goethe Deutsch B1 & SKKNI Level 4 Certified
                        </p>
                        <p class="text-sm text-[#f2ebfd]/80 font-lato leading-relaxed">
                            Instruktur berlisensi BNSP SKKNI Level 4 dan pemegang Goethe-Zertifikat Deutsch B1. Menguasai pedagogi komunikatif aktif untuk mempersiapkan kelulusan ujian resmi bahasa Jerman.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Additional Key Officers (Quality Assurance & Administration) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 flex items-center gap-5">
                    <div class="w-16 h-16 rounded-full bg-[#fdc04f]/15 border border-[#fdc04f] flex items-center justify-center font-yeseva text-2xl text-[#fdc04f] shrink-0">
                        H
                    </div>
                    <div>
                        <h4 class="font-yeseva text-xl text-white">Henny</h4>
                        <p class="text-xs text-[#fdc04f] font-bold uppercase tracking-wider mt-0.5">Kabid Penjaminan Mutu & Sertifikasi</p>
                        <p class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato mt-1.5">
                            Mengawal standarisasi mutu pembelajaran, audit kurikulum berkala, dan verifikasi sertifikasi kompetensi seluruh lulusan.
                        </p>
                    </div>
                </div>

                <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 flex items-center gap-5">
                    <div class="w-16 h-16 rounded-full bg-[#fdc04f]/15 border border-[#fdc04f] flex items-center justify-center font-yeseva text-2xl text-[#fdc04f] shrink-0">
                        SA
                    </div>
                    <div>
                        <h4 class="font-yeseva text-xl text-white">Septarina Adinda Privari, S.H</h4>
                        <p class="text-xs text-[#fdc04f] font-bold uppercase tracking-wider mt-0.5">Kabid Administrasi & Keuangan</p>
                        <p class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato mt-1.5">
                            Mengelola tata kelola hukum, legalitas dokumen kesiswaan, administrasi lembaga, dan transparansi keuangan operasional.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 5: Galeri Sarana & Prasarana Kampus (Real Photos & Lightbox Modal) -->
    <section id="galeri-fasilitas" class="relative py-16 sm:py-24 px-6 sm:px-12 md:px-16 border-t border-[#fdc04f]/15">
        <div class="max-w-6xl mx-auto space-y-12">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Fasilitas Representatif
                </div>
                <h2 class="font-yeseva text-3xl sm:text-5xl text-[#fdc04f]">
                    Sarana & Prasarana Pembelajaran
                </h2>
                <p class="text-base sm:text-lg text-[#f2ebfd]/80 font-lato">
                    Setiap ruang belajar, ruang rapat, dan laboratorium dirancang ergonomis demi kenyamanan maksimal peserta didik selama proses intensif.
                </p>
            </div>

            <!-- Facilities Grid (Clickable for High-res Zoom Modal) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Facility 1: Gedung Utama -->
                <div class="group relative rounded-xl overflow-hidden border border-[#fdc04f]/25 bg-black/40 hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-1 cursor-pointer gallery-card"
                     data-img="{{ asset('images/about/building-exterior.jpg') }}"
                     data-title="Gedung Utama LPK Mega Guna Talent"
                     data-desc="Tampak depan gedung operasional di Villa Galaxy Bekasi Selatan dengan akses mudah dan lokasi prestisius.">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ asset('images/about/building-exterior.jpg') }}" 
                             alt="Gedung Utama LPK Mega Guna Talent" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <span class="absolute top-3 right-3 px-2.5 py-1 bg-[#fdc04f] text-[#321f47] text-[11px] font-bold rounded">
                            Gedung Kampus
                        </span>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-lg text-white group-hover:text-[#fdc04f] transition-colors">Tampak Depan Gedung</h4>
                        <p class="text-xs text-[#f2ebfd]/75 font-lato">Kawasan Villa Galaxy Blok A1 No. 16, Bekasi Selatan.</p>
                    </div>
                </div>

                <!-- Facility 2: Front Office & Resepsionis -->
                <div class="group relative rounded-xl overflow-hidden border border-[#fdc04f]/25 bg-black/40 hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-1 cursor-pointer gallery-card"
                     data-img="{{ asset('images/about/front-office.jpg') }}"
                     data-title="Front Office & Ruang Konsultasi"
                     data-desc="Area resepsionis dan konsultasi terpadu bagi calon siswa dan orang tua untuk informasi program secara detail.">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ asset('images/about/front-office.jpg') }}" 
                             alt="Front Office LPK Mega Guna Talent" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <span class="absolute top-3 right-3 px-2.5 py-1 bg-[#fdc04f] text-[#321f47] text-[11px] font-bold rounded">
                            Pelayanan Siswa
                        </span>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-lg text-white group-hover:text-[#fdc04f] transition-colors">Front Office & Konsultasi</h4>
                        <p class="text-xs text-[#f2ebfd]/75 font-lato">Pusat informasi penerimaan dan pendampingan registrasi.</p>
                    </div>
                </div>

                <!-- Facility 3: Ruang Kelas Teori A -->
                <div class="group relative rounded-xl overflow-hidden border border-[#fdc04f]/25 bg-black/40 hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-1 cursor-pointer gallery-card"
                     data-img="{{ asset('images/about/classroom-1.jpg') }}"
                     data-title="Ruang Kelas Teori A (Multimedia)"
                     data-desc="Kapasitas 20 peserta didik per kelas dengan perangkat multimedia, pendingin ruangan (AC), dan pencahayaan optimal.">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ asset('images/about/classroom-1.jpg') }}" 
                             alt="Ruang Kelas Teori A LPK Mega Guna Talent" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <span class="absolute top-3 right-3 px-2.5 py-1 bg-[#fdc04f] text-[#321f47] text-[11px] font-bold rounded">
                            Kelas Teori 30 m²
                        </span>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-lg text-white group-hover:text-[#fdc04f] transition-colors">Ruang Kelas Teori A</h4>
                        <p class="text-xs text-[#f2ebfd]/75 font-lato">Dilengkapi proyektor interaktif dan audio jernih untuk Hören.</p>
                    </div>
                </div>

                <!-- Facility 4: Ruang Kelas Teori B -->
                <div class="group relative rounded-xl overflow-hidden border border-[#fdc04f]/25 bg-black/40 hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-1 cursor-pointer gallery-card"
                     data-img="{{ asset('images/about/classroom-2.jpg') }}"
                     data-title="Ruang Kelas Teori B"
                     data-desc="Penataan meja dan kursi ergonomis untuk memfasilitasi diskusi interaktif dan praktik Sprechen bahasa Jerman.">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ asset('images/about/classroom-2.jpg') }}" 
                             alt="Ruang Kelas Teori B LPK Mega Guna Talent" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <span class="absolute top-3 right-3 px-2.5 py-1 bg-[#fdc04f] text-[#321f47] text-[11px] font-bold rounded">
                            Kelas Interaktif
                        </span>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-lg text-white group-hover:text-[#fdc04f] transition-colors">Ruang Kelas Teori B</h4>
                        <p class="text-xs text-[#f2ebfd]/75 font-lato">Suasana belajar kondusif dengan jumlah siswa terbatas.</p>
                    </div>
                </div>

                <!-- Facility 5: Ruang Meeting & Evaluasi -->
                <div class="group relative rounded-xl overflow-hidden border border-[#fdc04f]/25 bg-black/40 hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-1 cursor-pointer gallery-card"
                     data-img="{{ asset('images/about/meeting-room.jpg') }}"
                     data-title="Ruang Rapat & Evaluasi Kurikulum"
                     data-desc="Tempat koordinasi berkala pimpinan dan instruktur untuk evaluasi mutu dan kemajuan capaian belajar siswa.">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ asset('images/about/meeting-room.jpg') }}" 
                             alt="Ruang Meeting LPK Mega Guna Talent" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <span class="absolute top-3 right-3 px-2.5 py-1 bg-[#fdc04f] text-[#321f47] text-[11px] font-bold rounded">
                            Manajemen
                        </span>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-lg text-white group-hover:text-[#fdc04f] transition-colors">Ruang Rapat & Diskusi</h4>
                        <p class="text-xs text-[#f2ebfd]/75 font-lato">Pusat perencanaan strategis dan penjaminan mutu lembaga.</p>
                    </div>
                </div>

                <!-- Facility 6: Ruang Pimpinan / Kepala LPK -->
                <div class="group relative rounded-xl overflow-hidden border border-[#fdc04f]/25 bg-black/40 hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-1 cursor-pointer gallery-card"
                     data-img="{{ asset('images/about/director-office.jpg') }}"
                     data-title="Ruang Kepala Lembaga"
                     data-desc="Ruang kerja pimpinan untuk supervisi menyeluruh operasional dan penerimaan tamu mitra kelembagaan.">
                    <div class="relative h-56 overflow-hidden">
                        <img src="{{ asset('images/about/director-office.jpg') }}" 
                             alt="Ruang Pimpinan LPK Mega Guna Talent" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                        <span class="absolute top-3 right-3 px-2.5 py-1 bg-[#fdc04f] text-[#321f47] text-[11px] font-bold rounded">
                            Kepala LPK
                        </span>
                    </div>
                    <div class="p-5 space-y-1">
                        <h4 class="font-bold text-lg text-white group-hover:text-[#fdc04f] transition-colors">Ruang Pimpinan LPK</h4>
                        <p class="text-xs text-[#f2ebfd]/75 font-lato">Supervisi kebijakan mutu dan kerja sama bilateral.</p>
                    </div>
                </div>
            </div>

            <!-- Detailed Facility Specifications Table -->
            <div class="mt-8 bg-black/40 border border-[#fdc04f]/25 rounded-2xl p-6 sm:p-8">
                <h3 class="font-yeseva text-xl sm:text-2xl text-white mb-6">
                    Ringkasan Kapasitas & Sarana Prasarana
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-[#f2ebfd]/90 font-lato">
                        <thead class="text-xs uppercase bg-[#321f47] text-[#fdc04f] border-b border-[#fdc04f]/20">
                            <tr>
                                <th class="px-4 py-3 font-bold">Jenis Ruangan / Fasilitas</th>
                                <th class="px-4 py-3 font-bold">Luas Area</th>
                                <th class="px-4 py-3 font-bold">Kapasitas</th>
                                <th class="px-4 py-3 font-bold">Fasilitas Utama</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#fdc04f]/10">
                            <tr class="hover:bg-white/5">
                                <td class="px-4 py-3 font-semibold text-white">3 Ruang Kelas Teori (A, B, C)</td>
                                <td class="px-4 py-3">@ 30 m² (Total 90 m²)</td>
                                <td class="px-4 py-3">20 Siswa / Kelas (Total 60 Siswa)</td>
                                <td class="px-4 py-3">AC, Proyektor, Sound System Hören, Whiteboard</td>
                            </tr>
                            <tr class="hover:bg-white/5">
                                <td class="px-4 py-3 font-semibold text-white">Ruang Pimpinan / Kepala LPK</td>
                                <td class="px-4 py-3">15 m²</td>
                                <td class="px-4 py-3">1 - 4 Orang</td>
                                <td class="px-4 py-3">Meja Pimpinan, Lemari Arsip, Pendingin Ruangan</td>
                            </tr>
                            <tr class="hover:bg-white/5">
                                <td class="px-4 py-3 font-semibold text-white">Ruang Instruktur & Administrasi</td>
                                <td class="px-4 py-3">18 m²</td>
                                <td class="px-4 py-3">6 Orang Instruktur & Staf</td>
                                <td class="px-4 py-3">Workstation Komputer, Internet Fiber Optic, Printer</td>
                            </tr>
                            <tr class="hover:bg-white/5">
                                <td class="px-4 py-3 font-semibold text-white">Front Office & Ruang Tamu</td>
                                <td class="px-4 py-3">12 m²</td>
                                <td class="px-4 py-3">6 Orang</td>
                                <td class="px-4 py-3">Sofa Tamu, Brosur Informasi, Meja Resepsionis</td>
                            </tr>
                            <tr class="hover:bg-white/5">
                                <td class="px-4 py-3 font-semibold text-white">Sarana Penunjang (Toilet & Ibadah)</td>
                                <td class="px-4 py-3">Lantai 1, 2, 3</td>
                                <td class="px-4 py-3">Siswa & Staf</td>
                                <td class="px-4 py-3">Toilet bersih terpisah, Musholla, Area Istirahat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 6: Landasan Hukum & Akreditasi Resmi -->
    <section class="relative py-16 sm:py-24 px-6 sm:px-12 md:px-16 bg-black/30 border-t border-[#fdc04f]/15">
        <div class="max-w-6xl mx-auto space-y-12">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Legalitas & Kepatuhan
                </div>
                <h2 class="font-yeseva text-3xl sm:text-5xl text-[#fdc04f]">
                    Landasan Hukum Penyelenggaraan
                </h2>
                <p class="text-base sm:text-lg text-[#f2ebfd]/80 font-lato">
                    Penyelenggaraan pelatihan kerja di LPK Mega Guna Talent beroperasi dengan izin resmi dan tunduk sepenuhnya pada peraturan perundang-undangan Republik Indonesia.
                </p>
            </div>

            <!-- Legal Badges Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Law 1 -->
                <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all">
                    <div class="text-xs uppercase text-[#fdc04f] font-bold tracking-wider mb-2">Undang-Undang RI</div>
                    <h4 class="font-yeseva text-lg text-white mb-2">UU No. 13 Tahun 2003</h4>
                    <p class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato">
                        Tentang Ketenagakerjaan: Mengatur hak masyarakat memperoleh pelatihan kerja guna meningkatkan kompetensi dan produktivitas tenaga kerja.
                    </p>
                </div>

                <!-- Law 2 -->
                <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all">
                    <div class="text-xs uppercase text-[#fdc04f] font-bold tracking-wider mb-2">Peraturan Presiden</div>
                    <h4 class="font-yeseva text-lg text-white mb-2">Perpres No. 8 Tahun 2012</h4>
                    <p class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato">
                        Tentang Kerangka Kualifikasi Nasional Indonesia (KKNI): Penjenjangan capaian pembelajaran dan pengakuan kompetensi kerja nasional.
                    </p>
                </div>

                <!-- Law 3 -->
                <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all">
                    <div class="text-xs uppercase text-[#fdc04f] font-bold tracking-wider mb-2">Peraturan Presiden</div>
                    <h4 class="font-yeseva text-lg text-white mb-2">Perpres No. 36 Tahun 2016</h4>
                    <p class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato">
                        Tentang Penyelenggaraan Pelatihan Kerja Berbasis Kompetensi (PBK) di Lembaga Pelatihan Kerja swasta maupun pemerintah.
                    </p>
                </div>

                <!-- Law 4 -->
                <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all">
                    <div class="text-xs uppercase text-[#fdc04f] font-bold tracking-wider mb-2">Peraturan Menteri</div>
                    <h4 class="font-yeseva text-lg text-white mb-2">Permenaker Vokasi No. 5/2025</h4>
                    <p class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato">
                        Regulasi terkini standardisasi kurikulum vokasi dan penyelenggaraan program pelatihan bahasa untuk penempatan ke luar negeri.
                    </p>
                </div>

                <!-- Law 5 -->
                <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all">
                    <div class="text-xs uppercase text-[#fdc04f] font-bold tracking-wider mb-2">Peraturan Menteri</div>
                    <h4 class="font-yeseva text-lg text-white mb-2">Permenaker No. 34/2016 & 6/2021</h4>
                    <p class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato">
                        Tentang Akreditasi Lembaga Pelatihan Kerja (LA-LPK) serta Pedoman Sertifikasi Kompetensi Profesi Instruktur Pelatihan.
                    </p>
                </div>

                <!-- Standard 6 -->
                <div class="p-6 rounded-xl bg-gradient-to-br from-[#2C0B1E] to-black/60 border border-[#fdc04f]/40 hover:border-[#fdc04f] transition-all">
                    <div class="text-xs uppercase text-[#fdc04f] font-bold tracking-wider mb-2">Standar Internasional</div>
                    <h4 class="font-yeseva text-lg text-white mb-2">CEFR & Goethe-Institut</h4>
                    <p class="text-xs sm:text-sm text-[#f2ebfd]/75 font-lato">
                        Penerapan acuan baku Common European Framework of Reference for Languages untuk sertifikasi kemampuan bahasa Jerman resmi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 7: Kunjungi Kampus & CTA Pendaftaran -->
    <section class="relative py-16 sm:py-24 px-6 sm:px-12 md:px-16 border-t border-[#fdc04f]/15 overflow-hidden">
        <div class="max-w-5xl mx-auto relative z-10 bg-gradient-to-b from-black/80 to-[#2C0B1E]/90 border-2 border-[#fdc04f] p-8 sm:p-14 rounded-2xl shadow-2xl text-center space-y-8">
            <span class="inline-block px-4 py-1.5 rounded-full bg-[#fdc04f]/20 border border-[#fdc04f] text-[#fdc04f] text-xs font-bold uppercase tracking-widest">
                Kunjungan Kampus & Pendaftaran
            </span>

            <h2 class="font-yeseva text-3xl sm:text-5xl text-white">
                Siap Melangkah Menuju Masa Depan di Jerman?
            </h2>

            <p class="max-w-2xl mx-auto text-base sm:text-lg text-[#f2ebfd]/90 font-lato leading-relaxed">
                Kunjungi kampus LPK Mega Guna Talent di Villa Galaxy Bekasi untuk berkonsultasi langsung dengan tim akademik kami, atau daftar kelas intensif batch berikutnya hari ini.
            </p>

            <!-- Institution Coordinates & Schedule -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-2xl mx-auto text-left pt-2 pb-4">
                <div class="bg-black/40 border border-[#fdc04f]/20 p-4 rounded-lg flex items-start gap-3">
                    <svg class="w-6 h-6 text-[#fdc04f] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <div>
                        <h4 class="font-bold text-white text-sm">Alamat Kampus</h4>
                        <p class="text-xs text-[#f2ebfd]/75 font-lato mt-0.5">
                            {{ \App\Models\SiteSetting::get('contact_address', 'Jln Boulevard Raya A1 No. 16 Villa Galaxy RT. 001/019 Jaka Setia, Bekasi Selatan.') }}
                        </p>
                    </div>
                </div>

                <div class="bg-black/40 border border-[#fdc04f]/20 p-4 rounded-lg flex items-start gap-3">
                    <svg class="w-6 h-6 text-[#fdc04f] shrink-0 mt-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <h4 class="font-bold text-white text-sm">Jam Operasional</h4>
                        <p class="text-xs text-[#f2ebfd]/75 font-lato mt-0.5">
                            {!! nl2br(e(\App\Models\SiteSetting::get('about_operating_hours', "Senin - Sabtu: 08:30 - 17:00 WIB\nMinggu & Hari Libur: Dengan Perjanjian"))) !!}
                        </p>
                    </div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 pt-2">
                <a href="{{ route('enroll') }}" class="btn-brand-double text-lg sm:text-xl">
                    Daftar Sekarang
                </a>
                @php
                    $waLink = \App\Models\SiteSetting::get('social_whatsapp', 'https://wa.me/6281234567890');
                @endphp
                <a href="{{ $waLink }}" target="_blank" rel="noopener noreferrer" 
                   class="px-8 py-3.5 rounded-none border-2 border-[#25D366] bg-[#25D366] text-white hover:bg-[#20ba5a] font-bold transition-all duration-300 flex items-center gap-2 shadow-lg">
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.54 1.789.78 2.791.78h.005c3.18 0 5.767-2.587 5.768-5.766 0-1.54-.6-2.99-1.69-4.08-1.09-1.09-2.54-1.69-4.084-1.69zm5.214 7.271c-.22.618-1.08 1.139-1.503 1.18-.387.037-.878.077-2.836-.713-1.758-.709-2.91-2.457-3-2.576-.089-.12-1.842-2.452-1.842-4.676 0-2.224 1.164-3.318 1.579-3.763.415-.445.908-.557 1.211-.557.303 0 .606.003.87.016.28.013.655-.106 1.025.782.38 1.037.914 2.227 1.002 2.38.089.153.149.333.03.568-.119.235-.179.382-.358.591-.178.21-.375.469-.537.63-.178.178-.364.372-.157.727.207.355.92 1.516 1.974 2.456 1.357 1.21 2.502 1.586 2.857 1.764.355.178.563.148.77-.089.208-.237.89-1.036 1.127-1.392.237-.356.474-.297.792-.178.318.118 2.016.951 2.362 1.124.346.173.577.26.662.404.085.144.085.834-.135 1.452z"/>
                    </svg>
                    <span>Konsultasi via WhatsApp</span>
                </a>
            </div>
        </div>
    </section>

</div>

<!-- LIGHTBOX MODAL (Vanilla JS Interactive Zoom) -->
<div id="gallery-modal" class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md hidden opacity-0 transition-opacity duration-300 flex items-center justify-center p-4 sm:p-8" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <div class="relative max-w-4xl w-full bg-[#321f47] border-2 border-[#fdc04f] rounded-2xl overflow-hidden shadow-2xl flex flex-col">
        <!-- Close Button -->
        <button id="modal-close-btn" class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center hover:bg-white transition-colors cursor-pointer" aria-label="Tutup Pratinjau">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Image Container -->
        <div class="relative w-full h-[55vh] sm:h-[65vh] bg-black/80 flex items-center justify-center overflow-hidden">
            <img id="modal-image" src="" alt="Fasilitas LPK Mega Guna Talent" class="max-h-full max-w-full object-contain transition-transform duration-300">
        </div>

        <!-- Caption Container -->
        <div class="p-6 bg-[#321f47] border-t border-[#fdc04f]/20">
            <h3 id="modal-title" class="font-yeseva text-xl sm:text-2xl text-[#fdc04f] mb-1"></h3>
            <p id="modal-desc" class="text-sm text-[#f2ebfd]/85 font-lato leading-relaxed"></p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('gallery-modal');
        const modalImg = document.getElementById('modal-image');
        const modalTitle = document.getElementById('modal-title');
        const modalDesc = document.getElementById('modal-desc');
        const closeBtn = document.getElementById('modal-close-btn');
        const cards = document.querySelectorAll('.gallery-card');

        function openModal(imgSrc, title, desc) {
            modalImg.src = imgSrc;
            modalTitle.textContent = title;
            modalDesc.textContent = desc;

            modal.classList.remove('hidden');
            // Trigger transition
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
            });
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modalImg.src = '';
            }, 300);
            document.body.style.overflow = '';
        }

        cards.forEach(card => {
            card.addEventListener('click', function () {
                const img = this.dataset.img;
                const title = this.dataset.title;
                const desc = this.dataset.desc;
                openModal(img, title, desc);
            });
        });

        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal);
        }

        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        // Parallax Effect for Section 2 (Profil Lembaga) & Section 4 (Struktur Manajemen & Mentor)
        const aboutSection = document.getElementById('profil-lembaga');
        const aboutBg = document.getElementById('about-profile-parallax-bg');
        const mentorsSection = document.getElementById('struktur-manajemen');
        const mentorsBg = document.getElementById('about-mentors-parallax-bg');

        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            let ticking = false;

            function updateParallaxSections() {
                const windowHeight = window.innerHeight;
                const viewportCenter = windowHeight / 2;

                if (aboutSection && aboutBg) {
                    const rect = aboutSection.getBoundingClientRect();
                    if (rect.top < windowHeight + 150 && rect.bottom > -150) {
                        const sectionCenter = rect.top + rect.height / 2;
                        const offset = viewportCenter - sectionCenter;
                        const translateY = offset * 0.35;
                        aboutBg.style.transform = `translate3d(0, ${translateY.toFixed(1)}px, 0) scale(1.1)`;
                    }
                }

                if (mentorsSection && mentorsBg) {
                    const rect = mentorsSection.getBoundingClientRect();
                    if (rect.top < windowHeight + 150 && rect.bottom > -150) {
                        const sectionCenter = rect.top + rect.height / 2;
                        const offset = viewportCenter - sectionCenter;
                        const translateY = offset * 0.35;
                        mentorsBg.style.transform = `translate3d(0, ${translateY.toFixed(1)}px, 0) scale(1.1)`;
                    }
                }

                ticking = false;
            }

            window.addEventListener('scroll', function () {
                if (!ticking) {
                    window.requestAnimationFrame(updateParallaxSections);
                    ticking = true;
                }
            }, { passive: true });

            window.addEventListener('resize', updateParallaxSections);
            updateParallaxSections();
        }
    });
</script>
@endpush
