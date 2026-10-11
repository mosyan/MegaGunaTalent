@extends('layouts.app')

@section('title', 'German Language Study - Speak German With Confidence')
@section('meta_description', 'Engaging German courses for all levels. Learn German with flexible programs, experienced native tutors, and real-world conversations.')

@php
    $heroTitle = \App\Models\SiteSetting::get('hero_title_line1', 'Speak German With Confidence');
    $heroSubtitle = \App\Models\SiteSetting::get('hero_subtitle', 'Engaging German courses for all levels.');
    $heroBtnText = \App\Models\SiteSetting::get('hero_primary_btn_text', 'Enroll Now');
    $heroBtnUrl = \App\Models\SiteSetting::get('hero_primary_btn_url', '#enroll');
    if ($heroBtnUrl === '#enroll' || $heroBtnUrl === '#programs') {
        $heroBtnUrl = route('enroll');
    }

    $programsTitle = \App\Models\SiteSetting::get('programs_title', 'Our Programs');
    $programsSubtitle = \App\Models\SiteSetting::get('programs_subtitle', 'Learn German at your own pace with our flexible programs, including online courses, in-person classes, and private tutoring.');

    $prog1Title = \App\Models\SiteSetting::get('program_1_title', 'Beginner');
    $prog1Desc = \App\Models\SiteSetting::get('program_1_desc', 'Focus on practical communication skills for travelers and those new to the language.');
    $prog2Title = \App\Models\SiteSetting::get('program_2_title', 'Intermediate');
    $prog2Desc = \App\Models\SiteSetting::get('program_2_desc', 'Building upon basic grammar, expanding vocabulary, and developing conversational fluency.');
    $prog3Title = \App\Models\SiteSetting::get('program_3_title', 'Advanced');
    $prog3Desc = \App\Models\SiteSetting::get('program_3_desc', 'Tailored for those needing German in their careers, focusing on business or technical German.');

    $ctaTitle = \App\Models\SiteSetting::get('cta_title', 'Achieve Your German Language Goals');
    $ctaSubtitle = \App\Models\SiteSetting::get('cta_subtitle', 'We help you achieve your language learning goals, whether for travel, work, or personal enrichment.');
    $ctaBtnText = \App\Models\SiteSetting::get('cta_button_text', 'Contact Us');
    $ctaBtnUrl = \App\Models\SiteSetting::get('cta_button_url', route('enroll'));

    $heroBg = \App\Models\SiteSetting::assetUrl('hero_bg_image', asset('images/global-bg.jpg'));
    $heroGate = \App\Models\SiteSetting::assetUrl('hero_gate_image', asset('images/hero-gate.jpg'));
    $ctaBg = \App\Models\SiteSetting::assetUrl('cta_bg_image', asset('images/cta-bridge.jpg'));
@endphp

@section('content')

    <!-- ========================================================== -->
    <!-- HERO SECTION                                               -->
    <!-- ========================================================== -->
    <section class="relative min-h-[92vh] sm:min-h-screen flex flex-col justify-between pt-36 sm:pt-48 bg-cover bg-top bg-no-repeat overflow-hidden" 
             style="background-image: url('{{ $heroBg }}'); background-color: #0b4555;">
        
        <!-- Subtle gradient overlay for contrast -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/25 via-transparent to-transparent pointer-events-none"></div>

        <!-- Center Hero Text & CTA -->
        <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center my-auto">
            <h1 class="font-yeseva text-white text-4xl sm:text-6xl md:text-7xl lg:text-[4.75rem] tracking-tight leading-[1.12] drop-shadow-[0_4px_16px_rgba(0,0,0,0.65)]">
                {{ $heroTitle }}
            </h1>

            <p class="font-arsenal text-white text-xl sm:text-2xl md:text-[1.85rem] max-w-3xl mx-auto mt-6 sm:mt-8 tracking-wide font-normal drop-shadow-[0_2px_10px_rgba(0,0,0,0.6)]">
                {{ $heroSubtitle }}
            </p>

            <div class="mt-8 sm:mt-10">
                <a href="{{ $heroBtnUrl }}" class="btn-brand-double">
                    {{ $heroBtnText }}
                </a>
            </div>
        </div>

        <!-- Brandenburg Gate Landmark Graphic (Positioned resting at bottom border) -->
        <div class="relative z-10 w-full max-w-4xl lg:max-w-5xl mx-auto px-4 mt-8 sm:mt-12 -mb-1 flex justify-center">
            <img src="{{ $heroGate }}" 
                 alt="Brandenburg Gate Berlin" 
                 class="w-full h-auto object-contain drop-shadow-[0_-8px_24px_rgba(0,0,0,0.4)]">
        </div>
    </section>

    <!-- ========================================================== -->
    <!-- OUR PROGRAMS SECTION (Solid Brand Amber / Gold)            -->
    <!-- ========================================================== -->
    <section id="programs" class="bg-[#fdc04f] text-[#321f47] py-16 sm:py-24 px-6 sm:px-12 relative z-20">
        <div class="max-w-6xl mx-auto">
            
            <!-- Section Header -->
            <div class="text-center max-w-4xl mx-auto">
                <h2 class="font-yeseva text-3xl sm:text-5xl md:text-6xl tracking-tight text-[#321f47]">
                    {{ $programsTitle }}
                </h2>

                <p class="font-arsenal text-lg sm:text-2xl md:text-[1.55rem] text-[#321f47] mt-6 sm:mt-8 leading-relaxed font-normal">
                    {{ $programsSubtitle }}
                </p>
            </div>

            <!-- Horizontal Divider Line -->
            <div class="w-full max-w-5xl mx-auto my-12 sm:my-16 border-b border-[#321f47]"></div>

            <!-- 3 Programs Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 sm:gap-14 lg:gap-16 max-w-5xl mx-auto text-center">
                
                <!-- 1. Beginner -->
                <div class="flex flex-col items-center group">
                    <div class="h-24 sm:h-28 flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('images/shape-beginner.svg') }}" 
                             alt="{{ $prog1Title }}" 
                             class="h-20 sm:h-24 w-auto object-contain">
                    </div>
                    <h3 class="font-arsenal font-bold text-2xl sm:text-3xl text-[#321f47] mb-4 tracking-wide">
                        {{ $prog1Title }}
                    </h3>
                    <p class="font-arsenal text-lg sm:text-xl text-[#321f47] leading-relaxed max-w-xs font-normal">
                        {{ $prog1Desc }}
                    </p>
                </div>

                <!-- 2. Intermediate -->
                <div class="flex flex-col items-center group">
                    <div class="h-24 sm:h-28 flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('images/shape-intermediate.svg') }}" 
                             alt="{{ $prog2Title }}" 
                             class="h-20 sm:h-24 w-auto object-contain">
                    </div>
                    <h3 class="font-arsenal font-bold text-2xl sm:text-3xl text-[#321f47] mb-4 tracking-wide">
                        {{ $prog2Title }}
                    </h3>
                    <p class="font-arsenal text-lg sm:text-xl text-[#321f47] leading-relaxed max-w-xs font-normal">
                        {{ $prog2Desc }}
                    </p>
                </div>

                <!-- 3. Advanced -->
                <div class="flex flex-col items-center group">
                    <div class="h-24 sm:h-28 flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('images/shape-advanced.svg') }}" 
                             alt="{{ $prog3Title }}" 
                             class="h-20 sm:h-24 w-auto object-contain">
                    </div>
                    <h3 class="font-arsenal font-bold text-2xl sm:text-3xl text-[#321f47] mb-4 tracking-wide">
                        {{ $prog3Title }}
                    </h3>
                    <p class="font-arsenal text-lg sm:text-xl text-[#321f47] leading-relaxed max-w-xs font-normal">
                        {{ $prog3Desc }}
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================== -->
    <!-- BOTTOM CALL-TO-ACTION SECTION (Night River Bridge)        -->
    <!-- ========================================================== -->
    <section class="relative py-28 sm:py-36 md:py-44 px-6 sm:px-12 bg-cover bg-center bg-no-repeat overflow-hidden" 
             style="background-image: url('{{ $ctaBg }}'); background-color: #1a1622;">
        
        <!-- 34% Opacity Dark Overlay (as specified in template schema) -->
        <div class="absolute inset-0 bg-black/35 pointer-events-none"></div>

        <!-- Section Content -->
        <div class="relative z-10 max-w-5xl mx-auto text-center">
            <h2 class="font-yeseva text-white text-3xl sm:text-5xl md:text-6xl tracking-tight leading-[1.15] drop-shadow-[0_4px_16px_rgba(0,0,0,0.7)]">
                {{ $ctaTitle }}
            </h2>

            <p class="font-arsenal text-white text-lg sm:text-2xl md:text-[1.55rem] max-w-3xl mx-auto mt-6 sm:mt-8 leading-relaxed font-normal drop-shadow-[0_2px_10px_rgba(0,0,0,0.65)]">
                {{ $ctaSubtitle }}
            </p>

            <div class="mt-8 sm:mt-10">
                <a href="{{ $ctaBtnUrl }}" class="btn-brand-double">
                    {{ $ctaBtnText }}
                </a>
            </div>
        </div>
    </section>

@endsection
