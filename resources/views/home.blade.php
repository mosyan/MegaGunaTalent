@extends('layouts.app')

@section('title', 'German Language Study - Speak German With Confidence')
@section('meta_description', 'Engaging German courses for all levels. Learn German with flexible programs, experienced native tutors, and real-world conversations.')

@section('content')

    <!-- ========================================================== -->
    <!-- HERO SECTION                                               -->
    <!-- ========================================================== -->
    <section class="relative min-h-[92vh] sm:min-h-screen flex flex-col justify-between pt-36 sm:pt-48 bg-cover bg-top bg-no-repeat overflow-hidden" 
             style="background-image: url('{{ asset('images/global-bg.jpg') }}'); background-color: #0b4555;">
        
        <!-- Subtle gradient overlay for contrast -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/25 via-transparent to-transparent pointer-events-none"></div>

        <!-- Center Hero Text & CTA -->
        <div class="relative z-10 max-w-5xl mx-auto px-6 sm:px-8 text-center my-auto">
            <h1 class="font-yeseva text-white text-4xl sm:text-6xl md:text-7xl lg:text-[4.75rem] tracking-tight leading-[1.12] drop-shadow-[0_4px_16px_rgba(0,0,0,0.65)]">
                Speak German With Confidence
            </h1>

            <p class="font-arsenal text-white text-xl sm:text-2xl md:text-[1.85rem] max-w-3xl mx-auto mt-6 sm:mt-8 tracking-wide font-normal drop-shadow-[0_2px_10px_rgba(0,0,0,0.6)]">
                Engaging German courses for all levels.
            </p>

            <div class="mt-8 sm:mt-10">
                <a href="{{ route('enroll') }}" class="btn-brand-double">
                    Enroll Now
                </a>
            </div>
        </div>

        <!-- Brandenburg Gate Landmark Graphic (Positioned resting at bottom border) -->
        <div class="relative z-10 w-full max-w-4xl lg:max-w-5xl mx-auto px-4 mt-8 sm:mt-12 -mb-1 flex justify-center">
            <img src="{{ asset('images/hero-gate.jpg') }}" 
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
                    Our Programs
                </h2>

                <p class="font-arsenal text-lg sm:text-2xl md:text-[1.55rem] text-[#321f47] mt-6 sm:mt-8 leading-relaxed font-normal">
                    Learn German at your own pace with our flexible programs, including online courses, in-person classes, and private tutoring.
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
                             alt="Beginner German Course" 
                             class="h-20 sm:h-24 w-auto object-contain">
                    </div>
                    <h3 class="font-arsenal font-bold text-2xl sm:text-3xl text-[#321f47] mb-4 tracking-wide">
                        Beginner
                    </h3>
                    <p class="font-arsenal text-lg sm:text-xl text-[#321f47] leading-relaxed max-w-xs font-normal">
                        Focus on practical communication skills for travelers and those new to the language.
                    </p>
                </div>

                <!-- 2. Intermediate -->
                <div class="flex flex-col items-center group">
                    <div class="h-24 sm:h-28 flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('images/shape-intermediate.svg') }}" 
                             alt="Intermediate German Course" 
                             class="h-20 sm:h-24 w-auto object-contain">
                    </div>
                    <h3 class="font-arsenal font-bold text-2xl sm:text-3xl text-[#321f47] mb-4 tracking-wide">
                        Intermediate
                    </h3>
                    <p class="font-arsenal text-lg sm:text-xl text-[#321f47] leading-relaxed max-w-xs font-normal">
                        Building upon basic grammar, expanding vocabulary, and developing conversational fluency.
                    </p>
                </div>

                <!-- 3. Advanced -->
                <div class="flex flex-col items-center group">
                    <div class="h-24 sm:h-28 flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-105">
                        <img src="{{ asset('images/shape-advanced.svg') }}" 
                             alt="Advanced German Course" 
                             class="h-20 sm:h-24 w-auto object-contain">
                    </div>
                    <h3 class="font-arsenal font-bold text-2xl sm:text-3xl text-[#321f47] mb-4 tracking-wide">
                        Advanced
                    </h3>
                    <p class="font-arsenal text-lg sm:text-xl text-[#321f47] leading-relaxed max-w-xs font-normal">
                        Tailored for those needing German in their careers, focusing on business or technical German.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- ========================================================== -->
    <!-- BOTTOM CALL-TO-ACTION SECTION (Night River Bridge)        -->
    <!-- ========================================================== -->
    <section class="relative py-28 sm:py-36 md:py-44 px-6 sm:px-12 bg-cover bg-center bg-no-repeat overflow-hidden" 
             style="background-image: url('{{ asset('images/cta-bridge.jpg') }}'); background-color: #1a1622;">
        
        <!-- 34% Opacity Dark Overlay (as specified in template schema) -->
        <div class="absolute inset-0 bg-black/35 pointer-events-none"></div>

        <!-- Section Content -->
        <div class="relative z-10 max-w-5xl mx-auto text-center">
            <h2 class="font-yeseva text-white text-3xl sm:text-5xl md:text-6xl tracking-tight leading-[1.15] drop-shadow-[0_4px_16px_rgba(0,0,0,0.7)]">
                Achieve Your German Language Goals
            </h2>

            <p class="font-arsenal text-white text-lg sm:text-2xl md:text-[1.55rem] max-w-3xl mx-auto mt-6 sm:mt-8 leading-relaxed font-normal drop-shadow-[0_2px_10px_rgba(0,0,0,0.65)]">
                We help you achieve your language learning goals, whether for travel, work, or personal enrichment.
            </p>

            <div class="mt-8 sm:mt-10">
                <a href="{{ route('enroll') }}" class="btn-brand-double">
                    Contact Us
                </a>
            </div>
        </div>
    </section>

@endsection
