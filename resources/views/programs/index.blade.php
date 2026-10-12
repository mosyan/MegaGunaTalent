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

@section('header_theme', 'light')

@section('content')
<div class="relative w-full overflow-hidden font-arsenal">

    <!-- HERO SECTION (Clean White-Yellow Radiant Gradient with Smooth Motion Effects) -->
    <section class="relative pt-36 pb-24 sm:pt-44 sm:pb-32 lg:pt-48 lg:pb-36 px-6 sm:px-12 md:px-16 overflow-hidden text-center bg-gradient-to-br from-[#FFFFFF] via-[#FFFDF5] to-[#FEF3C7]">
        <!-- Subtle Tech-Academic Dot Matrix Layer -->
        <div class="absolute inset-0 opacity-[0.45] pointer-events-none" style="background-image: radial-gradient(#F59E0B 1px, transparent 1px); background-size: 32px 32px;"></div>

        <!-- Animated Radiant Motion Glow Blobs -->
        <div class="w-80 h-80 sm:w-[480px] sm:h-[480px] rounded-full bg-gradient-to-tr from-[#FDE047]/50 via-[#FACC15]/30 to-amber-200/20 blur-3xl absolute -top-20 -left-20 pointer-events-none animate-pulse-glow"></div>
        <div class="w-80 h-80 sm:w-[520px] sm:h-[520px] rounded-full bg-gradient-to-bl from-[#FEF08A]/60 via-[#FBBF24]/35 to-orange-200/20 blur-3xl absolute -top-10 -right-20 pointer-events-none animate-float-slow"></div>
        <div class="w-[600px] h-[400px] rounded-full bg-gradient-to-t from-[#FCD34D]/40 to-transparent blur-3xl absolute bottom-0 left-1/2 -translate-x-1/2 pointer-events-none animate-pulse-glow"></div>

        <!-- Floating Decorative Motion Cards (Desktop) -->
        <!-- Floating Left Badge -->
        <div class="hidden lg:flex items-center gap-3 px-4 py-3 rounded-2xl bg-white/95 backdrop-blur-md border border-amber-300/80 shadow-xl shadow-amber-900/10 absolute left-6 xl:left-14 top-1/2 -translate-y-12 animate-float-slow pointer-events-none z-10 max-w-[210px] text-left">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FEF08A] to-[#F59E0B] flex items-center justify-center text-[#2C0B1E] font-bold text-lg shadow-sm shrink-0">
                🇩🇪
            </div>
            <div>
                <div class="text-xs font-bold text-[#1E0D1B]">{{ __('Goethe Standard') }}</div>
                <div class="text-[11px] text-[#78350F] font-lato">CEFR A1 • B1 • C1</div>
            </div>
        </div>

        <!-- Floating Right Badge -->
        <div class="hidden lg:flex items-center gap-3 px-4 py-3 rounded-2xl bg-white/95 backdrop-blur-md border border-amber-300/80 shadow-xl shadow-amber-900/10 absolute right-6 xl:right-14 top-1/2 -translate-y-8 animate-float-slow-reverse pointer-events-none z-10 max-w-[210px] text-left">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#FEF08A] to-[#F59E0B] flex items-center justify-center text-[#2C0B1E] font-bold text-lg shadow-sm shrink-0">
                🎓
            </div>
            <div>
                <div class="text-xs font-bold text-[#1E0D1B]">{{ __('1,500+ Alumni') }}</div>
                <div class="text-[11px] text-[#78350F] font-lato">{{ __('Successful in Germany') }}</div>
            </div>
        </div>

        <!-- Sparkle Micro-Motion Dots -->
        <div class="absolute top-32 left-1/4 w-2.5 h-2.5 rounded-full bg-[#F59E0B] animate-ping opacity-70 pointer-events-none"></div>
        <div class="absolute top-48 right-1/4 w-2 h-2 rounded-full bg-[#D97706] animate-bounce opacity-80 pointer-events-none"></div>

        <!-- Main Hero Header Content -->
        <div class="relative max-w-4xl mx-auto space-y-6 z-10">
            <!-- Pill Badge -->
            <div class="inline-flex items-center gap-2.5 px-5 py-2 rounded-full bg-white/95 border-2 border-[#F59E0B]/50 text-[#854D0E] text-xs sm:text-sm font-bold tracking-widest uppercase shadow-md shadow-amber-500/10 backdrop-blur-md">
                <span class="w-2.5 h-2.5 rounded-full bg-[#D97706] animate-pulse"></span>
                <span>{{ __('International CEFR & Goethe-Institut Standard') }}</span>
            </div>

            <!-- Crisp High-Contrast Heading -->
            <h1 class="font-yeseva text-3xl sm:text-5xl md:text-6xl lg:text-7xl text-[#1E0D1B] leading-tight drop-shadow-sm tracking-tight">
                {{ __('Pilihan Program Kursus Bahasa Jerman') }}
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-amber-400 via-[#F59E0B] to-amber-500 rounded-full mx-auto shadow-sm"></div>

            <!-- Subtitle with high-contrast readable dark tone -->
            <p class="text-base sm:text-xl text-[#2C0B1E]/90 font-lato leading-relaxed max-w-3xl mx-auto font-normal">
                {{ __('Structured leveled curriculum from absolute beginners to professional and academic proficiency, specially designed for your career and Ausbildung in Germany.') }}
            </p>

            <!-- Quick Trust Badges -->
            <div class="flex flex-wrap items-center justify-center gap-2.5 sm:gap-3 pt-2">
                <div class="inline-flex items-center gap-2 px-3.5 sm:px-4 py-1.5 rounded-full bg-white/95 border border-amber-300/80 text-[#1E0D1B] shadow-sm text-xs sm:text-sm font-semibold">
                    <span class="text-[#D97706] font-bold">✓</span> {{ __('Goethe Exam Preparation Guarantee') }}
                </div>
                <div class="inline-flex items-center gap-2 px-3.5 sm:px-4 py-1.5 rounded-full bg-white/95 border border-amber-300/80 text-[#1E0D1B] shadow-sm text-xs sm:text-sm font-semibold">
                    <span class="text-[#D97706] font-bold">✓</span> {{ __('Certified Instructors & Native Speakers') }}
                </div>
                <div class="inline-flex items-center gap-2 px-3.5 sm:px-4 py-1.5 rounded-full bg-white/95 border border-amber-300/80 text-[#1E0D1B] shadow-sm text-xs sm:text-sm font-semibold">
                    <span class="text-[#D97706] font-bold">✓</span> {{ __('Official Ausbildung Pathway & German Visa') }}
                </div>
            </div>
        </div>

        <!-- Smooth Organic Wave Transition into Dark Cards Section -->
        <div class="absolute -bottom-1 left-0 right-0 w-full overflow-hidden leading-none pointer-events-none z-10">
            <svg class="relative block w-full h-10 sm:h-16 lg:h-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0 C150,90 350,-40 500,45 C650,130 900,10 1200,60 L1200,120 L0,120 Z" fill="#321f47"></path>
            </svg>
        </div>
    </section>

    <!-- 3 PROGRAMS COMPARISON CARDS -->
    <section class="py-12 sm:py-20 px-6 sm:px-12 md:px-16 bg-[#321f47] text-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-3 gap-8">
            @foreach($programs as $p)
                <div class="bg-gradient-to-b from-[#2C0B1E] to-[#321f47] border-2 border-[#fdc04f]/30 hover:border-[#fdc04f] rounded-2xl p-8 shadow-2xl flex flex-col justify-between transition-all duration-300 hover:-translate-y-2 group">
                    <div class="space-y-6">
                        <!-- Icon & Level Badge -->
                        <div class="flex items-center justify-between">
                            <div class="w-16 h-16 rounded-2xl bg-[#fdc04f] border-2 border-[#fcae26] flex items-center justify-center p-2.5 shadow-lg shadow-[#fdc04f]/25 group-hover:scale-110 group-hover:bg-[#fcae26] transition-all">
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
                                <span class="text-[#f2ebfd]/70">{{ __('Duration') }}:</span>
                                <span class="text-white font-bold">{{ $p['duration'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[#f2ebfd]/70">{{ __('Exam Target') }}:</span>
                                <span class="text-[#fdc04f] font-bold">{{ $p['target_exam'] }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-[#f2ebfd]/70">{{ __('Capacity') }}:</span>
                                <span class="text-white font-bold">{{ $p['class_size'] }}</span>
                            </div>
                        </div>

                        <!-- Highlights List -->
                        <div class="space-y-2">
                            <span class="text-xs font-bold uppercase tracking-wider text-[#fdc04f]">{{ __('Key Focus') }}:</span>
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
                            {{ __('View Program Details & Syllabus') }}
                        </a>
                        <a href="{{ route('enroll', ['level' => $p['slug']]) }}" class="w-full block text-center py-2.5 text-xs uppercase tracking-wider font-bold text-[#fdc04f] hover:underline">
                            {{ __('Enroll Now') }} &rarr;
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>
@endsection
