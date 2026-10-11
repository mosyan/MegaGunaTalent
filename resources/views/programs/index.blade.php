@extends('layouts.app')

@section('title', 'Program Kursus Bahasa Jerman - LPK Mega Guna Talent')
@section('meta_description', 'Pilihan program kursus bahasa Jerman terpadu standar CEFR dan SKKNI: Beginner (A1-A2), Intermediate (B1), dan Advanced (B2-C1) untuk Ausbildung, studi, dan karier di Jerman.')

@push('meta')
    <meta property="og:title" content="Program Kursus Bahasa Jerman - LPK Mega Guna Talent">
    <meta property="og:description" content="Pilihan program kursus bahasa Jerman terpadu standar CEFR dan SKKNI: Beginner, Intermediate, dan Advanced.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('programs.index') }}">
    <link rel="canonical" href="{{ route('programs.index') }}">
@endpush

@section('content')
<div class="relative w-full overflow-hidden text-white font-arsenal">

    <!-- HERO SECTION -->
    <section class="relative pt-36 pb-20 sm:pt-44 sm:pb-28 px-6 sm:px-12 md:px-16 overflow-hidden text-center">
        <!-- Ambient Glow -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-[#fdc04f]/10 rounded-full blur-3xl pointer-events-none -z-10"></div>

        <div class="max-w-4xl mx-auto space-y-6">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#fdc04f]/15 border border-[#fdc04f]/40 text-[#fdc04f] text-xs sm:text-sm font-bold tracking-widest uppercase backdrop-blur-md">
                <span class="w-2.5 h-2.5 rounded-full bg-[#fdc04f] animate-pulse"></span>
                <span>Standar Internasional CEFR & Goethe-Institut</span>
            </div>

            <h1 class="font-yeseva text-3xl sm:text-5xl md:text-6xl text-[#fdc04f] leading-tight">
                Pilihan Program Kursus Bahasa Jerman
            </h1>

            <p class="text-base sm:text-xl text-[#f2ebfd]/90 font-lato leading-relaxed max-w-3xl mx-auto">
                Kurikulum berjenjang terstruktur dari level pemula tanpa dasar hingga tingkat profisiensi profesional dan akademis, dirancang khusus mengantarkan Anda berkarier dan menempuh Ausbildung di Jerman.
            </p>
        </div>
    </section>

    <!-- 3 PROGRAMS COMPARISON CARDS -->
    <section class="py-12 sm:py-20 px-6 sm:px-12 md:px-16 bg-black/25 border-t border-[#fdc04f]/15">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
            @foreach($programs as $p)
                <div class="bg-gradient-to-b from-[#2C0B1E] to-[#321f47] border-2 border-[#fdc04f]/30 hover:border-[#fdc04f] rounded-2xl p-8 shadow-2xl flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 group">
                    <div class="space-y-6">
                        <!-- Icon & Level Badge -->
                        <div class="flex items-center justify-between">
                            <div class="w-16 h-16 rounded-xl bg-black/40 border border-[#fdc04f]/30 flex items-center justify-center p-2 group-hover:scale-110 transition-transform">
                                <img src="{{ asset($p['icon']) }}" alt="{{ $p['title'] }}" class="h-10 w-auto object-contain">
                            </div>
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-bold uppercase bg-[#fdc04f] text-[#321f47]">
                                {{ $p['level'] }}
                            </span>
                        </div>

                        <!-- Title & Tagline -->
                        <div>
                            <h2 class="font-yeseva text-2xl text-white group-hover:text-[#fdc04f] transition-colors">
                                {{ $p['title'] }}
                            </h2>
                            <p class="text-xs uppercase tracking-wider text-[#fdc04f] font-bold mt-1">
                                {{ $p['badge'] }}
                            </p>
                            <p class="text-sm text-[#f2ebfd]/80 font-lato mt-3 leading-relaxed">
                                {{ $p['tagline'] }}
                            </p>
                        </div>

                        <!-- Specs -->
                        <div class="py-4 border-y border-[#fdc04f]/20 space-y-2 text-sm font-lato">
                            <div class="flex justify-between">
                                <span class="text-[#f2ebfd]/70">Durasi:</span>
                                <span class="text-white font-bold">{{ $p['duration'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[#f2ebfd]/70">Target Ujian:</span>
                                <span class="text-[#fdc04f] font-bold">{{ $p['target_exam'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[#f2ebfd]/70">Kapasitas:</span>
                                <span class="text-white font-bold">{{ $p['class_size'] }}</span>
                            </div>
                        </div>

                        <!-- Highlights List -->
                        <div class="space-y-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-[#fdc04f]">Fokus Utama:</span>
                            <ul class="text-xs sm:text-sm text-[#f2ebfd]/80 font-lato space-y-1.5">
                                @foreach(array_slice($p['highlights'], 0, 3) as $h)
                                    <li class="flex items-start gap-2">
                                        <span class="text-[#fdc04f]">✓</span>
                                        <span>{{ $h }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-8 space-y-3">
                        <a href="{{ route('programs.show', $p['slug']) }}" class="btn-brand-double w-full text-center block text-sm font-bold">
                            Lihat Detail Program & Silabus
                        </a>
                        <a href="{{ route('enroll', ['level' => $p['slug']]) }}" class="w-full block text-center py-2.5 text-xs uppercase tracking-wider font-bold text-[#fdc04f] hover:underline">
                            Daftar Sekarang &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>
@endsection
