@extends('layouts.app')

@section('title', $program['title'] . ' - Kursus Bahasa Jerman LPK Mega Guna Talent')
@section('meta_description', $program['tagline'])

@push('meta')
    <meta property="og:title" content="{{ $program['title'] }} - LPK Mega Guna Talent">
    <meta property="og:description" content="{{ $program['tagline'] }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('programs.show', $program['slug']) }}">
    <meta property="og:image" content="{{ asset($program['icon']) }}">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="canonical" href="{{ route('programs.show', $program['slug']) }}">

    <!-- Schema.org Course & Breadcrumbs Structured Data -->
    <script type="application/ld+json">
    {!! json_encode([
      '@'.'context' => 'https://schema.org',
      '@'.'graph' => [
        [
          '@'.'type' => 'Course',
          '@'.'id' => route('programs.show', $program['slug']) . '#course',
          'name' => $program['title'],
          'description' => $program['description'],
          'provider' => [
            '@'.'type' => 'Organization',
            'name' => 'LPK Mega Guna Talent',
            'sameAs' => url('/'),
          ],
          'educationalLevel' => $program['level'],
          'timeRequired' => $program['duration'],
          'occupationalCredentialAwarded' => $program['target_exam'],
          'hasCourseInstance' => [
            '@'.'type' => 'CourseInstance',
            'courseMode' => ['In-Person', 'Blended'],
            'courseSchedule' => $program['schedule'],
            'location' => [
              '@'.'type' => 'Place',
              'name' => 'Kampus LPK Mega Guna Talent',
              'address' => [
                '@'.'type' => 'PostalAddress',
                'streetAddress' => 'Jln Boulevard Raya A1 No. 16 Villa Galaxy',
                'addressLocality' => 'Bekasi Selatan',
                'addressRegion' => 'Jawa Barat',
                'addressCountry' => 'ID',
              ],
            ],
          ],
        ],
        [
          '@'.'type' => 'BreadcrumbList',
          '@'.'id' => route('programs.show', $program['slug']) . '#breadcrumb',
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
              'name' => 'Programs',
              'item' => route('programs.index'),
            ],
            [
              '@'.'type' => 'ListItem',
              'position' => 3,
              'name' => $program['title'],
              'item' => route('programs.show', $program['slug']),
            ],
          ],
        ],
      ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush

@section('content')
<div class="relative w-full overflow-hidden text-white font-arsenal">

    <!-- ========================================================== -->
    <!-- HERO SECTION: Program Detail & Key Overview                -->
    <!-- ========================================================== -->
    <section class="relative pt-36 pb-20 sm:pt-44 sm:pb-24 px-6 sm:px-12 md:px-16 overflow-hidden">
        <!-- Ambient Background Glows -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-[#fdc04f]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
        <div class="absolute bottom-10 right-10 w-[500px] h-[500px] bg-[#2C0B1E] rounded-full blur-2xl pointer-events-none -z-10"></div>

        <div class="max-w-6xl mx-auto space-y-8">
            <!-- Breadcrumb Navigation -->
            <nav class="flex items-center gap-2 text-xs sm:text-sm text-[#f2ebfd]/70 font-lato" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-[#fdc04f] transition-colors">Home</a>
                <span>/</span>
                <a href="{{ route('programs.index') }}" class="hover:text-[#fdc04f] transition-colors">Programs</a>
                <span>/</span>
                <span class="text-[#fdc04f] font-semibold">{{ $program['level_short'] }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <!-- Left: Headline & Badge -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#fdc04f]/15 border border-[#fdc04f]/40 text-[#fdc04f] text-xs sm:text-sm font-bold tracking-widest uppercase backdrop-blur-md">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#fdc04f] animate-pulse"></span>
                        <span>Level {{ $program['level'] }} • {{ $program['badge'] }}</span>
                    </div>

                    <h1 class="font-yeseva text-3xl sm:text-5xl md:text-6xl text-[#fdc04f] leading-tight drop-shadow-[0_4px_16px_rgba(0,0,0,0.6)]">
                        {{ $program['title'] }}
                    </h1>

                    <p class="text-lg sm:text-2xl text-white font-arsenal leading-relaxed font-normal">
                        {{ $program['tagline'] }}
                    </p>

                    <p class="text-base sm:text-lg text-[#f2ebfd]/85 font-lato leading-relaxed">
                        {{ $program['description'] }}
                    </p>

                    <!-- CTAs -->
                    <div class="pt-2 flex flex-wrap items-center gap-4 sm:gap-6">
                        <a href="{{ route('enroll', ['level' => $program['slug']]) }}" class="btn-brand-double text-base sm:text-lg">
                            Daftar Program {{ $program['level_short'] }}
                        </a>
                        <a href="#kurikulum" class="px-6 py-3.5 border-2 border-[#fdc04f] text-[#fdc04f] hover:bg-[#fdc04f] hover:text-[#321f47] font-bold transition-all duration-300">
                            Lihat Silabus Modul ↓
                        </a>
                    </div>
                </div>

                <!-- Right: Program Emblem Card -->
                <div class="lg:col-span-4 flex justify-center">
                    <div class="bg-black/40 border-2 border-[#fdc04f]/40 p-8 sm:p-10 rounded-2xl shadow-2xl backdrop-blur-md text-center max-w-sm w-full space-y-6 hover:border-[#fdc04f] transition-all group">
                        <div class="h-28 sm:h-32 flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                            <img src="{{ asset($program['icon']) }}" 
                                 alt="{{ $program['title'] }} Icon" 
                                 class="h-24 sm:h-28 w-auto object-contain">
                        </div>

                        <div>
                            <span class="text-xs uppercase tracking-widest text-[#fdc04f] font-bold">Standard Resmi</span>
                            <div class="font-yeseva text-2xl text-white mt-1">{{ $program['level'] }}</div>
                            <div class="text-xs text-[#f2ebfd]/70 mt-1">Standar CEFR & SKKNI Kemnaker RI</div>
                        </div>

                        <div class="pt-4 border-t border-[#fdc04f]/20 space-y-3 text-left text-sm font-lato">
                            <div class="flex items-center justify-between">
                                <span class="text-[#f2ebfd]/70">Durasi:</span>
                                <span class="text-white font-bold">{{ $program['duration'] }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[#f2ebfd]/70">Target Ujian:</span>
                                <span class="text-[#fdc04f] font-bold">{{ $program['target_exam'] }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-[#f2ebfd]/70">Kapasitas:</span>
                                <span class="text-white font-bold">{{ $program['class_size'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Key Feature Metrics Bar -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 pt-10 text-left">
                <div class="bg-black/30 backdrop-blur-md border border-[#fdc04f]/25 p-5 rounded-lg">
                    <div class="text-xs text-[#f2ebfd]/70 uppercase tracking-wider font-lato">Durasi Pelatihan</div>
                    <div class="font-yeseva text-2xl sm:text-3xl text-[#fdc04f] mt-1">{{ $program['duration'] }}</div>
                    <div class="text-[11px] text-[#f2ebfd]/60 mt-1">{{ $program['total_hours'] }}</div>
                </div>

                <div class="bg-black/30 backdrop-blur-md border border-[#fdc04f]/25 p-5 rounded-lg">
                    <div class="text-xs text-[#f2ebfd]/70 uppercase tracking-wider font-lato">Sertifikasi Target</div>
                    <div class="font-yeseva text-2xl sm:text-3xl text-[#fdc04f] mt-1">{{ $program['target_exam'] }}</div>
                    <div class="text-[11px] text-[#f2ebfd]/60 mt-1">Ujian Resmi Internasional</div>
                </div>

                <div class="bg-black/30 backdrop-blur-md border border-[#fdc04f]/25 p-5 rounded-lg">
                    <div class="text-xs text-[#f2ebfd]/70 uppercase tracking-wider font-lato">Format Kelas</div>
                    <div class="font-yeseva text-2xl sm:text-3xl text-[#fdc04f] mt-1">{{ $program['class_size'] }}</div>
                    <div class="text-[11px] text-[#f2ebfd]/60 mt-1">Interaktif & Terbimbing</div>
                </div>

                <div class="bg-black/30 backdrop-blur-md border border-[#fdc04f]/25 p-5 rounded-lg">
                    <div class="text-xs text-[#f2ebfd]/70 uppercase tracking-wider font-lato">Jadwal Kursus</div>
                    <div class="font-yeseva text-2xl sm:text-3xl text-[#fdc04f] mt-1">Fleksibel</div>
                    <div class="text-[11px] text-[#f2ebfd]/60 mt-1">Pagi, Malam & Akhir Pekan</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================== -->
    <!-- SECTION: Keunggulan & Nilai Tambah Pembelajaran            -->
    <!-- ========================================================== -->
    <section class="py-16 sm:py-24 px-6 sm:px-12 md:px-16 bg-black/25 border-t border-[#fdc04f]/15">
        <div class="max-w-6xl mx-auto space-y-12">
            <div class="text-center max-w-3xl mx-auto space-y-3">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Fasilitas & Pendekatan
                </div>
                <h2 class="font-yeseva text-2xl sm:text-4xl text-white">
                    Mengapa Memilih Program {{ $program['level_short'] }} di Mega Guna Talent?
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($program['highlights'] as $highlight)
                    <div class="p-6 rounded-xl bg-[#2C0B1E]/60 border border-[#fdc04f]/20 hover:border-[#fdc04f] transition-all flex flex-col justify-between">
                        <div class="w-10 h-10 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center font-bold text-lg mb-4">
                            ✓
                        </div>
                        <p class="font-arsenal text-lg text-white font-semibold leading-snug">
                            {{ $highlight }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================================== -->
    <!-- SECTION: Silabus & Kurikulum Modul Pembelajaran           -->
    <!-- ========================================================== -->
    <section id="kurikulum" class="py-16 sm:py-24 px-6 sm:px-12 md:px-16 bg-[#2C0B1E] border-t border-[#fdc04f]/15 relative">
        <div class="max-w-6xl mx-auto space-y-14">
            <div class="text-center max-w-3xl mx-auto space-y-4">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Silabus Lengkap
                </div>
                <h2 class="font-yeseva text-3xl sm:text-5xl text-[#fdc04f]">
                    Struktur Modul & Materi Pembelajaran
                </h2>
                <p class="text-base sm:text-lg text-[#f2ebfd]/80 font-lato">
                    Disusun secara progresif dan sistematis agar setiap peserta menguasai keterampilan mendengar (Hören), membaca (Lesen), menulis (Schreiben), dan berbicara (Sprechen) secara seimbang.
                </p>
            </div>

            <!-- Modul Grid -->
            <div class="space-y-4 max-w-4xl mx-auto">
                @foreach($program['modules'] as $module)
                    <div class="p-6 sm:p-7 rounded-xl bg-black/40 border border-[#fdc04f]/25 hover:border-[#fdc04f] transition-all hover:translate-x-1">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                            <span class="inline-block px-3 py-1 bg-[#fdc04f] text-[#321f47] text-xs font-bold uppercase rounded-md self-start">
                                {{ $module['code'] }}
                            </span>
                            <h3 class="font-yeseva text-xl sm:text-2xl text-white">
                                {{ $module['title'] }}
                            </h3>
                        </div>
                        <p class="text-base text-[#f2ebfd]/85 font-lato leading-relaxed">
                            {{ $module['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================================== -->
    <!-- SECTION: Target Peserta & Kompetensi Kelulusan             -->
    <!-- ========================================================== -->
    <section class="py-16 sm:py-24 px-6 sm:px-12 md:px-16 bg-black/35 border-t border-[#fdc04f]/15">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
            <!-- Learning Outcomes -->
            <div class="space-y-6">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Hasil Pembelajaran
                </div>
                <h2 class="font-yeseva text-2xl sm:text-4xl text-white leading-snug">
                    Kompetensi yang Anda Kuasai Setelah Lulus
                </h2>
                <div class="space-y-4">
                    @foreach($program['learning_outcomes'] as $outcome)
                        <div class="flex items-start gap-4 p-4 rounded-lg bg-[#2C0B1E]/60 border border-[#fdc04f]/20">
                            <div class="w-7 h-7 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center font-bold text-sm shrink-0 mt-0.5">
                                ★
                            </div>
                            <p class="text-base sm:text-lg text-[#f2ebfd]/90 font-lato">
                                {{ $outcome }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Target Audience & Career Pathway -->
            <div class="space-y-8">
                <!-- Who is this for? -->
                <div class="p-8 rounded-2xl bg-black/50 border-2 border-[#fdc04f]/30 space-y-5">
                    <h3 class="font-yeseva text-2xl text-[#fdc04f]">
                        Siapa yang Cocok Mengikuti Program Ini?
                    </h3>
                    <ul class="space-y-3 font-lato text-base text-[#f2ebfd]/85">
                        @foreach($program['target_audience'] as $audience)
                            <li class="flex items-start gap-3">
                                <span class="text-[#fdc04f] font-bold text-lg">•</span>
                                <span>{{ $audience }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Career Path Banner -->
                <div class="p-8 rounded-2xl bg-gradient-to-r from-[#2C0B1E] to-[#321f47] border border-[#fdc04f]/40 space-y-3 shadow-xl">
                    <span class="text-xs uppercase tracking-widest text-[#fdc04f] font-bold">Prospek Karier & Studi</span>
                    <h3 class="font-yeseva text-xl sm:text-2xl text-white">
                        Peluang di Jerman Setelah Menyelesaikan Level Ini
                    </h3>
                    <p class="text-sm sm:text-base text-[#f2ebfd]/85 font-lato leading-relaxed">
                        {{ $program['career_path'] }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ========================================================== -->
    <!-- SECTION: FAQ Khusus Program Ini                           -->
    <!-- ========================================================== -->
    <section class="py-16 sm:py-24 px-6 sm:px-12 md:px-16 bg-[#2C0B1E] border-t border-[#fdc04f]/15">
        <div class="max-w-4xl mx-auto space-y-12">
            <div class="text-center space-y-3">
                <div class="inline-block text-xs sm:text-sm uppercase tracking-widest text-[#fdc04f] font-bold pb-1 border-b border-[#fdc04f]">
                    Pertanyaan Umum
                </div>
                <h2 class="font-yeseva text-2xl sm:text-4xl text-white">
                    FAQ Seputar Program {{ $program['level_short'] }}
                </h2>
            </div>

            <div class="space-y-4">
                @foreach($program['faqs'] as $faq)
                    <div class="p-6 rounded-xl bg-black/40 border border-[#fdc04f]/20 space-y-2">
                        <h3 class="font-yeseva text-lg sm:text-xl text-[#fdc04f]">
                            {{ $faq['q'] }}
                        </h3>
                        <p class="text-base text-[#f2ebfd]/80 font-lato leading-relaxed">
                            {{ $faq['a'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================================== -->
    <!-- SECTION: Jelajahi Program Lainnya                         -->
    <!-- ========================================================== -->
    <section class="py-16 sm:py-24 px-6 sm:px-12 md:px-16 bg-black/40 border-t border-[#fdc04f]/15">
        <div class="max-w-6xl mx-auto space-y-10">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                <div>
                    <span class="text-xs uppercase tracking-widest text-[#fdc04f] font-bold">Jalur Belajar Lengkap</span>
                    <h2 class="font-yeseva text-2xl sm:text-4xl text-white mt-1">
                        Program Pelatihan Bahasa Jerman Lainnya
                    </h2>
                </div>
                <a href="{{ route('programs.index') }}" class="text-[#fdc04f] hover:underline font-bold text-sm">
                    Lihat Semua Program &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($otherPrograms as $other)
                    <a href="{{ route('programs.show', $other['slug']) }}" 
                       class="group p-8 rounded-2xl bg-[#2C0B1E]/80 border-2 border-[#fdc04f]/25 hover:border-[#fdc04f] transition-all duration-300 hover:-translate-y-1 shadow-xl flex items-start gap-6">
                        <div class="w-16 h-16 shrink-0 flex items-center justify-center p-2 rounded-xl bg-black/40 border border-[#fdc04f]/30 group-hover:scale-110 transition-transform">
                            <img src="{{ asset($other['icon']) }}" alt="{{ $other['title'] }}" class="h-10 w-auto object-contain">
                        </div>
                        <div class="space-y-2">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[11px] font-bold uppercase bg-[#fdc04f]/20 text-[#fdc04f]">
                                {{ $other['level'] }}
                            </span>
                            <h3 class="font-yeseva text-2xl text-white group-hover:text-[#fdc04f] transition-colors">
                                {{ $other['title'] }}
                            </h3>
                            <p class="text-sm text-[#f2ebfd]/75 font-lato leading-relaxed line-clamp-2">
                                {{ $other['tagline'] }}
                            </p>
                            <span class="inline-flex items-center gap-1 text-sm font-bold text-[#fdc04f] group-hover:underline pt-1">
                                Pelajari Program Ini &rarr;
                            </span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========================================================== -->
    <!-- SECTION: CTA Pendaftaran Terpadu                           -->
    <!-- ========================================================== -->
    <section class="py-20 sm:py-28 px-6 sm:px-12 md:px-16 bg-gradient-to-t from-[#2C0B1E] via-[#321f47] to-[#2C0B1E] border-t border-[#fdc04f]/20 text-center relative overflow-hidden">
        <div class="max-w-4xl mx-auto space-y-6 relative z-10">
            <span class="inline-block px-4 py-1.5 rounded-full bg-[#fdc04f]/20 border border-[#fdc04f]/50 text-[#fdc04f] text-xs uppercase font-bold tracking-widest">
                Batch Baru Segera Dimulai
            </span>

            <h2 class="font-yeseva text-3xl sm:text-5xl text-white leading-tight">
                Mulai Perjalanan Menuju Jerman Bersama <span class="text-[#fdc04f]">Program {{ $program['level_short'] }}</span>
            </h2>

            <p class="text-base sm:text-xl text-[#f2ebfd]/85 font-lato max-w-2xl mx-auto leading-relaxed">
                Kapasitas kelas dibatasi maksimal 15 peserta untuk menjaga interaksi dan kualitas bimbingan personal. Amankan kursi Anda sekarang!
            </p>

            <div class="pt-4 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('enroll', ['level' => $program['slug']]) }}" class="btn-brand-double text-lg px-8 py-4">
                    Daftar Sekarang & Konsultasi Gratis
                </a>
                <a href="https://wa.me/6281234567890?text=Halo%20LPK%20Mega%20Guna%20Talent,%20saya%20tertarik%20dengan%20Program%20{{ urlencode($program['title']) }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="px-8 py-4 border-2 border-[#fdc04f] text-[#fdc04f] hover:bg-[#fdc04f] hover:text-[#321f47] font-bold transition-all duration-300">
                    Chat WhatsApp Konsultan
                </a>
            </div>
        </div>
    </section>

</div>
@endsection
