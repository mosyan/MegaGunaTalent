<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $siteTitle = \App\Models\SiteSetting::getLocalized('site_title', 'German Language Study - Speak German With Confidence');
        $siteTagline = \App\Models\SiteSetting::getLocalized('site_tagline', 'Master the German language with native-speaking certified instructors');
        $customLogo = \App\Models\SiteSetting::assetUrl('site_logo');
        $customFavicon = \App\Models\SiteSetting::assetUrl('site_favicon');
        $footerCopyright = \App\Models\SiteSetting::getLocalized('footer_copyright', '© '.date('Y').' Mega Guna Talent. All Rights Reserved.');
        $socialFb = \App\Models\SiteSetting::get('social_facebook', 'https://facebook.com');
        $socialIg = \App\Models\SiteSetting::get('social_instagram', 'https://instagram.com');
        $socialWa = \App\Models\SiteSetting::get('social_whatsapp', 'https://wa.me/6281234567890');
        $locales = $supportedLocales ?? [
            'id' => ['code' => 'id', 'name' => 'Bahasa Indonesia', 'short' => 'ID', 'flag' => '🇮🇩'],
            'en' => ['code' => 'en', 'name' => 'English', 'short' => 'EN', 'flag' => '🇬🇧'],
            'de' => ['code' => 'de', 'name' => 'Deutsch', 'short' => 'DE', 'flag' => '🇩🇪'],
        ];
        $activeLoc = $currentLocale ?? app()->getLocale();
        $activeMeta = $locales[$activeLoc] ?? $locales['id'] ?? ['flag' => '🇮🇩', 'short' => 'ID', 'name' => 'Bahasa Indonesia'];
    @endphp
    <title>@yield('title', $siteTitle)</title>
    <meta name="description" content="@yield('meta_description', $siteTagline)">

    <!-- International SEO & Hreflang Alternates -->
    @php
        $rawRequestPath = request()->path();
        $canonicalCurrentUrl = url($rawRequestPath === '/' ? '' : $rawRequestPath);
    @endphp
    <link rel="alternate" hreflang="id" href="{{ $canonicalCurrentUrl }}?lang=id" />
    <link rel="alternate" hreflang="en" href="{{ $canonicalCurrentUrl }}?lang=en" />
    <link rel="alternate" hreflang="de" href="{{ $canonicalCurrentUrl }}?lang=de" />
    <link rel="alternate" hreflang="x-default" href="{{ $canonicalCurrentUrl }}" />
    <meta property="og:locale" content="{{ match($activeLoc) { 'en' => 'en_US', 'de' => 'de_DE', default => 'id_ID' } }}">
    <meta property="og:locale:alternate" content="id_ID">
    <meta property="og:locale:alternate" content="en_US">
    <meta property="og:locale:alternate" content="de_DE">

    <!-- Favicon -->
    @if($customFavicon)
        <link rel="icon" href="{{ $customFavicon }}">
    @else
        <link rel="icon" href="{{ asset('images/shape-beginner.svg') }}" type="image/svg+xml">
    @endif

    <!-- Google Fonts: Yeseva One, Arsenal, Lato -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arsenal:ital,wght@0,400;0,700;1,400;1,700&family=Lato:ital,wght@0,300;0,400;0,700;0,900&family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- Styles & Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    @stack('meta')
</head>
<body class="bg-[#321f47] text-white font-arsenal antialiased selection:bg-[#fdc04f] selection:text-[#321f47] overflow-x-hidden min-h-screen flex flex-col justify-between">

    @php
        $isLightHeader = View::hasSection('header_theme') && trim($__env->yieldContent('header_theme')) === 'light';
    @endphp
    <!-- Top Navigation Overlay -->
    <header class="absolute top-0 left-0 right-0 z-40 px-6 sm:px-12 md:px-16 pt-6 sm:pt-10 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="group inline-flex items-center transition-transform hover:scale-[1.02] focus:outline-none" aria-label="German Language Study Home">
            @if($customLogo)
                <img src="{{ $customLogo }}" 
                     alt="{{ $siteTitle }}" 
                     class="h-16 sm:h-20 md:h-24 w-auto object-contain drop-shadow-[0_4px_12px_rgba(0,0,0,0.35)]">
            @else
                <img src="{{ asset('images/logo.png') }}" 
                     alt="EDUCATION SLOGAN HERE" 
                     class="h-20 sm:h-28 md:h-32 w-auto object-contain drop-shadow-[0_4px_12px_rgba(0,0,0,0.35)]">
            @endif
        </a>

        <!-- Desktop Navigation & Hamburger -->
        <div class="flex items-center space-x-4 sm:space-x-6">
            <nav class="hidden md:flex items-center space-x-5 lg:space-x-6 font-arsenal text-base font-bold tracking-wide {{ $isLightHeader ? 'bg-white/85 backdrop-blur-md px-6 py-2 rounded-full border border-amber-300/60 shadow-lg shadow-amber-950/5 text-[#2C0B1E]' : 'text-white' }}">
                <a href="{{ route('home') }}" class="{{ $isLightHeader ? 'hover:text-[#B45309]' : 'hover:text-[#fdc04f]' }} transition-colors {{ request()->routeIs('home') ? ($isLightHeader ? 'text-[#B45309]' : 'text-[#fdc04f]') : '' }}">{{ __('Home') }}</a>
                <a href="{{ route('about') }}" class="{{ $isLightHeader ? 'hover:text-[#B45309]' : 'hover:text-[#fdc04f]' }} transition-colors {{ request()->routeIs('about') ? ($isLightHeader ? 'text-[#B45309]' : 'text-[#fdc04f]') : '' }}">{{ __('About Us') }}</a>
                
                <!-- Programs Hover Dropdown (Clickable Parent + Auto Hover Submenu) -->
                <div class="relative group">
                    <a href="{{ route('programs.index') }}" 
                       class="inline-flex items-center gap-1.5 py-2 {{ $isLightHeader ? 'hover:text-[#B45309]' : 'hover:text-[#fdc04f]' }} transition-colors {{ request()->routeIs('programs.*') ? ($isLightHeader ? 'text-[#B45309] font-black' : 'text-[#fdc04f]') : '' }}"
                       aria-haspopup="true"
                       aria-expanded="false">
                        <span>{{ __('Programs') }}</span>
                        <svg class="w-3.5 h-3.5 {{ $isLightHeader ? 'text-[#B45309]' : 'text-[#fdc04f]' }} transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>

                    <!-- Dropdown Panel (Hover & Focus) -->
                    <div class="absolute left-1/2 -translate-x-1/2 top-full pt-2 opacity-0 pointer-events-none translate-y-2 group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0 focus-within:opacity-100 focus-within:pointer-events-auto focus-within:translate-y-0 transition-all duration-200 z-50 min-w-[300px]">
                        <div class="bg-[#240919]/95 backdrop-blur-xl border border-[#fdc04f]/35 rounded-2xl p-2.5 shadow-2xl shadow-black/80 space-y-1">
                            <!-- All Programs -->
                            <a href="{{ route('programs.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-white/10 transition-colors group/item">
                                <div class="w-9 h-9 rounded-lg bg-[#fdc04f]/20 border border-[#fdc04f]/40 flex items-center justify-center text-[#fdc04f] shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-bold text-white group-hover/item:text-[#fdc04f] transition-colors">{{ __('All Programs') }}</div>
                                    <div class="text-[11px] text-[#f2ebfd]/70 truncate">{{ __('Overview curriculum & certification') }}</div>
                                </div>
                            </a>

                            <div class="h-px bg-white/10 my-1"></div>

                            <!-- Beginner -->
                            <a href="{{ route('programs.show', 'beginner') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/10 transition-colors group/item">
                                <div class="w-9 h-9 rounded-lg bg-[#fdc04f] border border-[#fcae26] flex items-center justify-center p-1.5 shrink-0 group-hover/item:scale-105 transition-transform shadow-sm">
                                    <img src="{{ asset('images/shape-beginner.svg') }}" alt="Beginner" class="h-full w-auto object-contain">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-1">
                                        <span class="text-sm font-bold text-white group-hover/item:text-[#fdc04f] transition-colors truncate">{{ __('Beginner') }}</span>
                                        <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-[#fdc04f]/20 text-[#fdc04f] shrink-0">A1 - A2</span>
                                    </div>
                                    <div class="text-[11px] text-[#f2ebfd]/70 truncate">{{ __('Foundation of German language & daily conversation') }}</div>
                                </div>
                            </a>

                            <!-- Intermediate -->
                            <a href="{{ route('programs.show', 'intermediate') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/10 transition-colors group/item">
                                <div class="w-9 h-9 rounded-lg bg-[#fdc04f] border border-[#fcae26] flex items-center justify-center p-1.5 shrink-0 group-hover/item:scale-105 transition-transform shadow-sm">
                                    <img src="{{ asset('images/shape-intermediate.svg') }}" alt="Intermediate" class="h-full w-auto object-contain">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-1">
                                        <span class="text-sm font-bold text-white group-hover/item:text-[#fdc04f] transition-colors truncate">{{ __('Intermediate') }}</span>
                                        <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-[#fdc04f] text-[#321f47] shrink-0">B1</span>
                                    </div>
                                    <div class="text-[11px] text-[#f2ebfd]/70 truncate">{{ __('Key requirement for Ausbildung & career') }}</div>
                                </div>
                            </a>

                            <!-- Advanced -->
                            <a href="{{ route('programs.show', 'advanced') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/10 transition-colors group/item">
                                <div class="w-9 h-9 rounded-lg bg-[#fdc04f] border border-[#fcae26] flex items-center justify-center p-1.5 shrink-0 group-hover/item:scale-105 transition-transform shadow-sm">
                                    <img src="{{ asset('images/shape-advanced.svg') }}" alt="Advanced" class="h-full w-auto object-contain">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between gap-1">
                                        <span class="text-sm font-bold text-white group-hover/item:text-[#fdc04f] transition-colors truncate">{{ __('Advanced') }}</span>
                                        <span class="text-[10px] font-bold px-1.5 py-0.5 rounded bg-[#fdc04f]/20 text-[#fdc04f] shrink-0">B2 - C1</span>
                                    </div>
                                    <div class="text-[11px] text-[#f2ebfd]/70 truncate">{{ __('Medical, engineering & academic proficiency') }}</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="{{ route('blog.index') }}" class="{{ $isLightHeader ? 'hover:text-[#B45309]' : 'hover:text-[#fdc04f]' }} transition-colors {{ request()->routeIs('blog.*') ? ($isLightHeader ? 'text-[#B45309]' : 'text-[#fdc04f]') : '' }}">{{ __('Blog') }}</a>
                
                <!-- Language Switcher Dropdown (Desktop Nav) -->
                <div class="relative group/lang ml-1">
                    <button type="button" 
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all {{ $isLightHeader ? 'bg-amber-100/90 text-[#2C0B1E] hover:bg-amber-200 border border-amber-300' : 'bg-white/10 text-white hover:bg-white/20 border border-white/20 backdrop-blur-sm' }}"
                            aria-haspopup="true"
                            aria-expanded="false"
                            aria-label="{{ __('Select Language') }}">
                        <span class="text-sm leading-none">{{ $activeMeta['flag'] ?? '🇮🇩' }}</span>
                        <span class="tracking-wider">{{ $activeMeta['short'] ?? 'ID' }}</span>
                        <svg class="w-3 h-3 transition-transform duration-200 group-hover/lang:rotate-180 opacity-75" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="absolute right-0 top-full pt-2 opacity-0 pointer-events-none translate-y-1 group-hover/lang:opacity-100 group-hover/lang:pointer-events-auto group-hover/lang:translate-y-0 focus-within:opacity-100 focus-within:pointer-events-auto focus-within:translate-y-0 transition-all duration-200 z-50 min-w-[170px]">
                        <div class="bg-[#240919]/95 backdrop-blur-xl border border-[#fdc04f]/35 rounded-2xl p-1.5 shadow-2xl shadow-black/80 space-y-0.5">
                            @foreach($locales as $locCode => $locMeta)
                                <a href="{{ route('locale.switch', ['locale' => $locCode, 'return' => request()->getRequestUri()]) }}" 
                                   class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-bold transition-colors {{ $activeLoc === $locCode ? 'bg-[#fdc04f] text-[#321f47]' : 'text-white hover:bg-white/10 hover:text-[#fdc04f]' }}">
                                    <span class="flex items-center gap-2">
                                        <span class="text-sm">{{ $locMeta['flag'] ?? '🌐' }}</span>
                                        <span>{{ $locMeta['name'] ?? $locCode }}</span>
                                    </span>
                                    @if($activeLoc === $locCode)
                                        <svg class="w-3.5 h-3.5 text-[#321f47]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <a href="{{ route('enroll') }}" class="{{ $isLightHeader ? 'bg-[#2C0B1E] text-[#fdc04f] hover:bg-[#43122f]' : 'bg-[#fdc04f] text-[#321f47] hover:bg-[#fcae26]' }} px-5 py-2 rounded-full font-bold transition-all shadow-md text-sm">{{ __('Enroll Now') }}</a>
            </nav>

            <!-- Hamburger Menu Button -->
            <button id="menu-toggle-btn" 
                    type="button"
                    aria-label="Toggle navigation menu"
                    aria-expanded="false"
                    class="w-12 h-12 sm:w-14 sm:h-14 rounded-full {{ $isLightHeader ? 'bg-[#2C0B1E] hover:bg-[#43122f] text-[#fdc04f] ring-2 ring-amber-300/50' : 'bg-[#fdc04f] hover:bg-[#fcae26] text-[#321f47]' }} active:scale-95 flex flex-col items-center justify-center gap-1.5 shadow-lg transition-all duration-200 cursor-pointer focus:outline-none focus:ring-4 focus:ring-[#fdc04f]/40">
                <span class="w-6 h-0.5 {{ $isLightHeader ? 'bg-[#fdc04f]' : 'bg-[#321f47]' }} rounded-full transition-transform duration-300 menu-bar-1"></span>
                <span class="w-6 h-0.5 {{ $isLightHeader ? 'bg-[#fdc04f]' : 'bg-[#321f47]' }} rounded-full transition-opacity duration-300 menu-bar-2"></span>
                <span class="w-6 h-0.5 {{ $isLightHeader ? 'bg-[#fdc04f]' : 'bg-[#321f47]' }} rounded-full transition-transform duration-300 menu-bar-3"></span>
            </button>
        </div>
    </header>

    <!-- Slide-over Drawer Menu -->
    <div id="drawer-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 opacity-0 pointer-events-none transition-opacity duration-300"></div>
    <div id="drawer-menu" class="fixed top-0 right-0 bottom-0 w-full max-w-sm sm:max-w-md bg-[#321f47] text-[#fdc04f] z-50 translate-x-full transition-transform duration-300 ease-out shadow-2xl flex flex-col justify-between p-8 sm:p-12 border-l border-[#fdc04f]/20">
        <div class="overflow-y-auto pr-1">
            <!-- Close Button Header -->
            <div class="flex items-center justify-between pb-6 border-b border-[#fdc04f]/20">
                <span class="font-yeseva text-2xl tracking-wide text-[#fdc04f]">{{ __('Menu') }}</span>
                <button id="drawer-close-btn" class="w-10 h-10 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center hover:bg-white transition-colors cursor-pointer" aria-label="Close menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Drawer Language Switcher (Segmented Control) -->
            <div class="mt-4 pt-2 pb-4 border-b border-[#fdc04f]/15">
                <div class="text-[11px] font-bold uppercase tracking-wider text-[#fdc04f]/80 mb-2 font-arsenal flex items-center justify-between">
                    <span>{{ __('Language') }}</span>
                    <span class="text-[10px] text-white/60 font-mono">{{ $activeMeta['name'] ?? 'Bahasa' }}</span>
                </div>
                <div class="grid grid-cols-3 gap-1.5 bg-black/30 p-1.5 rounded-2xl border border-[#fdc04f]/25">
                    @foreach($locales as $locCode => $locMeta)
                        <a href="{{ route('locale.switch', ['locale' => $locCode, 'return' => request()->getRequestUri()]) }}" 
                           class="flex items-center justify-center gap-1.5 py-2 px-2 rounded-xl text-xs font-bold transition-all {{ $activeLoc === $locCode ? 'bg-[#fdc04f] text-[#321f47] shadow-md shadow-black/20 font-black' : 'text-[#f2ebfd]/80 hover:text-white hover:bg-white/10' }}">
                            <span class="text-sm">{{ $locMeta['flag'] ?? '🌐' }}</span>
                            <span>{{ $locMeta['short'] ?? strtoupper($locCode) }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Navigation Links -->
            <nav class="mt-6 flex flex-col space-y-5 text-xl sm:text-2xl font-bold font-arsenal">
                <a href="{{ route('home') }}" class="group flex items-center justify-between py-2 border-b border-[#fdc04f]/10 text-white hover:text-[#fdc04f] transition-colors {{ request()->routeIs('home') ? 'text-[#fdc04f]' : '' }}">
                    <span>{{ __('Home') }}</span>
                    <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
                <a href="{{ route('about') }}" class="group flex items-center justify-between py-2 border-b border-[#fdc04f]/10 text-white hover:text-[#fdc04f] transition-colors {{ request()->routeIs('about') ? 'text-[#fdc04f]' : '' }}">
                    <span>{{ __('About Us') }}</span>
                    <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
                
                <!-- Our Programs (With Submenu in Drawer) -->
                <div class="border-b border-[#fdc04f]/10 pb-3">
                    <a href="{{ route('programs.index') }}" class="group flex items-center justify-between py-2 text-white hover:text-[#fdc04f] transition-colors {{ request()->routeIs('programs.*') ? 'text-[#fdc04f]' : '' }}">
                        <span>{{ __('Our Programs') }}</span>
                        <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                    </a>
                    <div class="pl-3.5 pt-1 space-y-2 border-l-2 border-[#fdc04f]/30 ml-1 text-base font-normal">
                        <a href="{{ route('programs.show', 'beginner') }}" class="flex items-center justify-between text-[#f2ebfd]/80 hover:text-[#fdc04f] transition-colors py-0.5">
                            <span>{{ __('Beginner') }} (A1 - A2)</span>
                            <span class="text-xs text-[#fdc04f] font-mono">Goethe</span>
                        </a>
                        <a href="{{ route('programs.show', 'intermediate') }}" class="flex items-center justify-between text-[#f2ebfd]/80 hover:text-[#fdc04f] transition-colors py-0.5">
                            <span>{{ __('Intermediate') }} (B1)</span>
                            <span class="text-xs text-[#fdc04f] font-mono">Ausbildung</span>
                        </a>
                        <a href="{{ route('programs.show', 'advanced') }}" class="flex items-center justify-between text-[#f2ebfd]/80 hover:text-[#fdc04f] transition-colors py-0.5">
                            <span>{{ __('Advanced') }} (B2 - C1)</span>
                            <span class="text-xs text-[#fdc04f] font-mono">Karier</span>
                        </a>
                    </div>
                </div>
                <a href="{{ route('blog.index') }}" class="group flex items-center justify-between py-2 border-b border-[#fdc04f]/10 text-white hover:text-[#fdc04f] transition-colors {{ request()->routeIs('blog.*') ? 'text-[#fdc04f]' : '' }}">
                    <span>{{ __('Article Blog') }}</span>
                    <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
                <a href="{{ route('enroll') }}" class="group flex items-center justify-between py-2 border-b border-[#fdc04f]/10 text-white hover:text-[#fdc04f] transition-colors {{ request()->routeIs('enroll') ? 'text-[#fdc04f]' : '' }}">
                    <span>{{ __('Enroll Now') }}</span>
                    <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
            </nav>

            <div class="mt-8">
                <a href="{{ route('enroll') }}" class="btn-brand-double w-full block">
                    {{ __('Enroll Now') }}
                </a>
            </div>
        </div>

        <!-- Drawer Footer -->
        <div class="pt-6 border-t border-[#fdc04f]/20 text-center">
            <p class="text-sm text-[#f2ebfd]/70 mb-4 font-lato">{{ $siteTagline }}</p>
            <div class="flex items-center justify-center space-x-6 text-[#fdc04f]">
                @if($socialFb)
                    <a href="{{ $socialFb }}" target="_blank" rel="noopener" class="hover:text-white transition-colors" aria-label="Facebook">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                    </a>
                @endif
                @if($socialIg)
                    <a href="{{ $socialIg }}" target="_blank" rel="noopener" class="hover:text-white transition-colors" aria-label="Instagram">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.13-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                @endif
                @if($socialWa)
                    <a href="{{ $socialWa }}" target="_blank" rel="noopener" class="hover:text-white transition-colors" aria-label="WhatsApp">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.54 1.789.78 2.791.78h.005c3.18 0 5.767-2.587 5.768-5.766 0-1.54-.6-2.99-1.69-4.08-1.09-1.09-2.54-1.69-4.084-1.69zm5.214 7.271c-.22.618-1.08 1.139-1.503 1.18-.387.037-.878.077-2.836-.713-1.758-.709-2.91-2.457-3-2.576-.089-.12-1.842-2.452-1.842-4.676 0-2.224 1.164-3.318 1.579-3.763.415-.445.908-.557 1.211-.557.303 0 .606.003.87.016.28.013.655-.106 1.025.782.38 1.037.914 2.227 1.002 2.38.089.153.149.333.03.568-.119.235-.179.382-.358.591-.178.21-.375.469-.537.63-.178.178-.364.372-.157.727.207.355.92 1.516 1.974 2.456 1.357 1.21 2.502 1.586 2.857 1.764.355.178.563.148.77-.089.208-.237.89-1.036 1.127-1.392.237-.356.474-.297.792-.178.318.118 2.016.951 2.362 1.124.346.173.577.26.662.404.085.144.085.834-.135 1.452z"/></svg>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Global Footer -->
    <footer class="bg-[#321f47] text-[#fdc04f] py-10 px-6 sm:px-12 border-t border-[#fdc04f]/20">
        <div class="max-w-6xl mx-auto flex flex-col items-center justify-center text-center space-y-6">
            <!-- Footer Navigation -->
            <div class="flex flex-wrap items-center justify-center gap-4 sm:gap-6 text-sm sm:text-base font-bold font-arsenal tracking-wide text-white/90">
                <a href="{{ route('home') }}" class="hover:text-[#fdc04f] transition-colors">{{ __('Home') }}</a>
                <span class="text-[#fdc04f]/40 hidden sm:inline">•</span>
                <a href="{{ route('about') }}" class="hover:text-[#fdc04f] transition-colors">{{ __('About Us') }}</a>
                <span class="text-[#fdc04f]/40 hidden sm:inline">•</span>
                <a href="{{ route('programs.index') }}" class="hover:text-[#fdc04f] transition-colors">{{ __('Programs') }}</a>
                <span class="text-[#fdc04f]/40 hidden sm:inline">•</span>
                <a href="{{ route('blog.index') }}" class="hover:text-[#fdc04f] transition-colors">{{ __('Article Blog') }}</a>
                <span class="text-[#fdc04f]/40 hidden sm:inline">•</span>
                <a href="{{ route('enroll') }}" class="hover:text-[#fdc04f] transition-colors">{{ __('Enroll Now') }}</a>
            </div>

            <!-- Footer Language Selector -->
            <div class="flex flex-wrap items-center justify-center gap-2 pt-1 pb-1">
                <span class="text-xs uppercase tracking-wider text-[#fdc04f]/60 font-bold mr-1">{{ __('Language') }}:</span>
                <div class="inline-flex items-center gap-1 bg-white/5 border border-[#fdc04f]/25 rounded-full p-1 backdrop-blur-sm">
                    @foreach($locales as $locCode => $locMeta)
                        <a href="{{ route('locale.switch', ['locale' => $locCode, 'return' => request()->getRequestUri()]) }}" 
                           class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold transition-all {{ $activeLoc === $locCode ? 'bg-[#fdc04f] text-[#321f47] shadow-sm font-black' : 'text-[#f2ebfd]/80 hover:text-white hover:bg-white/10' }}"
                           title="{{ $locMeta['name'] }}">
                            <span class="text-sm leading-none">{{ $locMeta['flag'] }}</span>
                            <span class="hidden sm:inline">{{ $locMeta['name'] }}</span>
                            <span class="sm:hidden">{{ $locMeta['short'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Copyright -->
            <p class="font-arsenal text-base sm:text-lg font-normal text-[#fdc04f] tracking-wide">
                {{ $footerCopyright }}
            </p>

            <!-- Social Links -->
            <div class="flex items-center justify-center space-x-8 text-[#fdc04f]">
                @if($socialFb)
                    <a href="{{ $socialFb }}" target="_blank" rel="noopener" class="hover:text-white transition-colors" aria-label="Facebook">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
                    </a>
                @endif
                @if($socialIg)
                    <a href="{{ $socialIg }}" target="_blank" rel="noopener" class="hover:text-white transition-colors" aria-label="Instagram">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.13-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                @endif
                @if($socialWa)
                    <a href="{{ $socialWa }}" target="_blank" rel="noopener" class="hover:text-white transition-colors" aria-label="WhatsApp">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.54 1.789.78 2.791.78h.005c3.18 0 5.767-2.587 5.768-5.766 0-1.54-.6-2.99-1.69-4.08-1.09-1.09-2.54-1.69-4.084-1.69zm5.214 7.271c-.22.618-1.08 1.139-1.503 1.18-.387.037-.878.077-2.836-.713-1.758-.709-2.91-2.457-3-2.576-.089-.12-1.842-2.452-1.842-4.676 0-2.224 1.164-3.318 1.579-3.763.415-.445.908-.557 1.211-.557.303 0 .606.003.87.016.28.013.655-.106 1.025.782.38 1.037.914 2.227 1.002 2.38.089.153.149.333.03.568-.119.235-.179.382-.358.591-.178.21-.375.469-.537.63-.178.178-.364.372-.157.727.207.355.92 1.516 1.974 2.456 1.357 1.21 2.502 1.586 2.857 1.764.355.178.563.148.77-.089.208-.237.89-1.036 1.127-1.392.237-.356.474-.297.792-.178.318.118 2.016.951 2.362 1.124.346.173.577.26.662.404.085.144.085.834-.135 1.452z"/></svg>
                    </a>
                @endif
            </div>
        </div>
    </footer>

    <!-- ============================================================== -->
    <!-- FLOATING WHATSAPP CHAT WIDGET (EQUIPORA STYLE WITH FORM POPUP)  -->
    <!-- ============================================================== -->
    <div x-data="{
            isOpen: false,
            name: '',
            message: '',
            errorMessage: '',
            currentTime: '',
            init() {
                const updateTime = () => {
                    const now = new Date();
                    this.currentTime = String(now.getHours()).padStart(2, '0') + ':' + String(now.getMinutes()).padStart(2, '0');
                };
                updateTime();
                setInterval(updateTime, 30000);
            },
            selectTopic(topic) {
                if (!this.message.trim()) {
                    this.message = 'Halo Admin, saya ingin menanyakan mengenai ' + topic + '.';
                } else if (!this.message.includes(topic)) {
                    this.message = this.message + ' (Topik: ' + topic + ')';
                }
            },
            sendWhatsApp() {
                if (!this.name.trim() || !this.message.trim()) {
                    this.errorMessage = '{{ __('Harap isi nama dan pesan terlebih dahulu.') }}';
                    return;
                }
                this.errorMessage = '';
                const adminNumber = '6281327788498';
                const template = `Halo Admin LPK Mega Guna Talent,\n\nSaya ingin berkonsultasi:\n• Nama: ${this.name.trim()}\n• Pesan: ${this.message.trim()}\n\n(Dikirim melalui website megagunatalent.com)`;
                const waUrl = `https://wa.me/${adminNumber}?text=${encodeURIComponent(template)}`;
                window.open(waUrl, '_blank', 'noopener,noreferrer');
                this.name = '';
                this.message = '';
                this.isOpen = false;
            }
        }"
        x-cloak
        @click.outside="isOpen = false"
        @keydown.escape.window="isOpen = false"
        id="wa-floating-widget"
        class="fixed bottom-6 right-6 z-50 flex flex-col items-end">

        <!-- Interactive WhatsApp Chat Card Popup -->
        <div x-show="isOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-6 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-6 scale-95"
             class="mb-4 w-[calc(100vw-2.5rem)] max-w-[370px] sm:w-[380px] bg-[#1a0f26]/95 backdrop-blur-2xl border border-emerald-500/30 rounded-3xl shadow-[0_20px_60px_rgba(0,0,0,0.75)] overflow-hidden flex flex-col origin-bottom-right"
             role="dialog"
             aria-modal="true"
             aria-label="{{ __('Chat via WhatsApp') }}">

            <!-- WhatsApp Header -->
            <div class="bg-gradient-to-r from-emerald-700 via-emerald-600 to-emerald-500 p-4 sm:p-5 text-white flex items-center justify-between shadow-md relative overflow-hidden">
                <!-- Decorative background WhatsApp watermark -->
                <div class="absolute -right-4 -bottom-4 opacity-10 pointer-events-none">
                    <svg class="w-28 h-28 fill-current" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.66-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                    </svg>
                </div>

                <div class="flex items-center gap-3 relative z-10">
                    <div class="relative">
                        <div class="w-11 h-11 rounded-full bg-white/20 border-2 border-white/40 p-2 flex items-center justify-center text-white backdrop-blur-sm shadow-md">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.66-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                            </svg>
                        </div>
                        <span class="w-3.5 h-3.5 rounded-full bg-emerald-400 border-2 border-emerald-700 absolute -bottom-0.5 -right-0.5 animate-pulse"></span>
                    </div>
                    <div>
                        <h4 class="font-bold text-white text-sm sm:text-base leading-tight font-arsenal">LPK Mega Guna Talent</h4>
                        <p class="text-[11px] sm:text-xs text-emerald-100 flex items-center gap-1.5 font-lato mt-0.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-300 inline-block animate-ping"></span>
                            <span>{{ __('Customer Support • Online') }}</span>
                        </p>
                    </div>
                </div>

                <button type="button" 
                        @click="isOpen = false" 
                        class="w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 text-white flex items-center justify-center transition-all cursor-pointer relative z-10" 
                        aria-label="Tutup Form WhatsApp">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- WhatsApp Body & Interactive Form -->
            <div class="p-4 sm:p-5 space-y-3.5 bg-[#1b0d26]">
                <!-- Chat Bubble Greetings -->
                <div class="bg-black/35 border border-white/10 rounded-2xl rounded-tl-sm p-3.5 shadow-md space-y-1">
                    <div class="flex items-center justify-between text-[11px] text-[#fdc04f] font-bold">
                        <span>Admin Mega Guna Talent</span>
                        <span class="text-white/40 font-mono text-[10px]" x-text="currentTime">Online</span>
                    </div>
                    <p class="text-xs text-white/90 leading-relaxed font-lato">
                        {{ __('Halo! 👋 Ada yang bisa kami bantu seputar program kursus bahasa Jerman atau info Ausbildung? Silakan isi nama dan pesan Anda di bawah:') }}
                    </p>
                </div>

                <!-- Quick Topic Selector Pills -->
                <div class="flex flex-wrap gap-1.5 pt-1">
                    <button type="button" @click="selectTopic('Info Kursus Bahasa Jerman (A1-B1)')" class="px-2.5 py-1 rounded-full bg-white/5 hover:bg-emerald-500/20 border border-white/10 hover:border-emerald-500/40 text-[11px] text-[#fdc04f] hover:text-white transition-all cursor-pointer">
                        🇩🇪 Kursus A1-B1
                    </button>
                    <button type="button" @click="selectTopic('Persiapan Program Ausbildung Jerman')" class="px-2.5 py-1 rounded-full bg-white/5 hover:bg-emerald-500/20 border border-white/10 hover:border-emerald-500/40 text-[11px] text-[#fdc04f] hover:text-white transition-all cursor-pointer">
                        🎓 Ausbildung
                    </button>
                    <button type="button" @click="selectTopic('Konsultasi Jadwal & Biaya Kursus')" class="px-2.5 py-1 rounded-full bg-white/5 hover:bg-emerald-500/20 border border-white/10 hover:border-emerald-500/40 text-[11px] text-[#fdc04f] hover:text-white transition-all cursor-pointer">
                        📅 Jadwal & Biaya
                    </button>
                </div>

                <!-- Input Form -->
                <form @submit.prevent="sendWhatsApp()" class="space-y-3 pt-1">
                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-300 mb-1">
                            {{ __('Nama Lengkap') }} <span class="text-[#fdc04f]">*</span>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   x-model="name"
                                   required
                                   autocomplete="name"
                                   placeholder="Contoh: Budi Santoso" 
                                   class="w-full pl-9 pr-3 py-2.5 bg-black/45 border border-white/15 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/30 rounded-xl text-white text-xs placeholder:text-white/40 focus:outline-none transition-all">
                            <svg class="w-4 h-4 text-white/50 absolute left-3 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold uppercase tracking-wider text-slate-300 mb-1">
                            {{ __('Pesan / Pertanyaan') }} <span class="text-[#fdc04f]">*</span>
                        </label>
                        <textarea x-model="message"
                                  rows="3" 
                                  required
                                  placeholder="Tuliskan pertanyaan atau rencana studi/karier Anda..." 
                                  class="w-full px-3 py-2.5 bg-black/45 border border-white/15 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/30 rounded-xl text-white text-xs placeholder:text-white/40 focus:outline-none transition-all resize-none"></textarea>
                    </div>

                    <div x-show="errorMessage" x-cloak class="text-[11px] text-rose-300 bg-rose-500/20 border border-rose-500/30 rounded-xl p-2.5 flex items-center gap-2">
                        <svg class="w-4 h-4 text-rose-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span x-text="errorMessage"></span>
                    </div>

                    <button type="submit" 
                            class="w-full py-3 px-4 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white font-extrabold text-xs shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 active:scale-[0.98] transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.66-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                        </svg>
                        <span>{{ __('Kirim ke WhatsApp') }}</span>
                        <svg class="w-3.5 h-3.5 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </form>

                <p class="text-[10px] text-center text-white/50 font-lato pt-1">
                    {{ __('Terhubung langsung ke WhatsApp Admin Resmi') }}: <span class="text-emerald-400 font-mono font-bold tracking-wider">0813-2778-8498</span>
                </p>
            </div>
        </div>

        <!-- The exact button snippet from Equipora requested by the user: -->
        <button @click="isOpen = !isOpen" aria-label="Whatsapp CS Equipora" class="flex items-center justify-center w-16 h-16 bg-emerald-500 text-white rounded-full shadow-lg hover:shadow-xl hover:scale-105 hover:bg-emerald-600 transition-all duration-300 focus:outline-none relative group cursor-pointer">
            <span class="absolute inset-0 rounded-full bg-emerald-500 animate-ping opacity-25 pointer-events-none" style="animation-duration: 2s;"></span>
            <svg x-show="!isOpen" class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.888-.788-1.487-1.761-1.66-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"></path></svg>
            <svg x-show="isOpen" style="display:none;" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>

            <!-- Hover Tooltip -->
            <div x-show="!isOpen" class="absolute right-full mr-3 px-3.5 py-1.5 bg-slate-900/95 backdrop-blur-sm text-white text-xs font-bold rounded-xl opacity-0 invisible translate-x-2 group-hover:opacity-100 group-hover:visible group-hover:translate-x-0 transition-all duration-200 pointer-events-none whitespace-nowrap shadow-xl flex items-center gap-2 border border-slate-700/60">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Whatsapp CS Equipora</span>
                <div class="absolute top-1/2 -right-1 -translate-y-1/2 w-2 h-2 bg-slate-900 rotate-45 border-t border-r border-slate-700/60"></div>
            </div>
        </button>
    </div>

    <!-- Interactive Navigation Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mobile Drawer Logic
            const toggleBtn = document.getElementById('menu-toggle-btn');
            const closeBtn = document.getElementById('drawer-close-btn');
            const drawer = document.getElementById('drawer-menu');
            const backdrop = document.getElementById('drawer-backdrop');

            function openDrawer() {
                drawer.classList.remove('translate-x-full');
                backdrop.classList.remove('opacity-0', 'pointer-events-none');
                toggleBtn.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
            }

            function closeDrawer() {
                drawer.classList.add('translate-x-full');
                backdrop.classList.add('opacity-0', 'pointer-events-none');
                toggleBtn.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }

            if (toggleBtn && closeBtn && drawer && backdrop) {
                toggleBtn.addEventListener('click', openDrawer);
                closeBtn.addEventListener('click', closeDrawer);
                backdrop.addEventListener('click', closeDrawer);

                // Close on ESC
                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') closeDrawer();
                });

                // Close when link clicked
                drawer.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', closeDrawer);
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
