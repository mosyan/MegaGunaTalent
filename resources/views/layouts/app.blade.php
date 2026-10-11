<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $siteTitle = \App\Models\SiteSetting::get('site_title', 'German Language Study - Speak German With Confidence');
        $siteTagline = \App\Models\SiteSetting::get('site_tagline', 'Master the German language with native-speaking certified instructors');
        $customLogo = \App\Models\SiteSetting::get('site_logo');
        $customFavicon = \App\Models\SiteSetting::get('site_favicon');
        $footerCopyright = \App\Models\SiteSetting::get('footer_copyright', '© '.date('Y').' Mega Guna Talent. All Rights Reserved.');
        $socialFb = \App\Models\SiteSetting::get('social_facebook', 'https://facebook.com');
        $socialIg = \App\Models\SiteSetting::get('social_instagram', 'https://instagram.com');
        $socialWa = \App\Models\SiteSetting::get('social_whatsapp', 'https://wa.me/6281234567890');
    @endphp
    <title>@yield('title', $siteTitle)</title>
    <meta name="description" content="@yield('meta_description', $siteTagline)">

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
</head>
<body class="bg-[#321f47] text-white font-arsenal antialiased selection:bg-[#fdc04f] selection:text-[#321f47] overflow-x-hidden min-h-screen flex flex-col justify-between">

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

        <!-- Hamburger Menu Button -->
        <button id="menu-toggle-btn" 
                type="button"
                aria-label="Toggle navigation menu"
                aria-expanded="false"
                class="w-12 h-12 sm:w-14 sm:h-14 rounded-full bg-[#fdc04f] hover:bg-[#fcae26] active:scale-95 text-[#321f47] flex flex-col items-center justify-center gap-1.5 shadow-lg transition-all duration-200 cursor-pointer focus:outline-none focus:ring-4 focus:ring-[#fdc04f]/40">
            <span class="w-6 h-0.5 bg-[#321f47] rounded-full transition-transform duration-300 menu-bar-1"></span>
            <span class="w-6 h-0.5 bg-[#321f47] rounded-full transition-opacity duration-300 menu-bar-2"></span>
            <span class="w-6 h-0.5 bg-[#321f47] rounded-full transition-transform duration-300 menu-bar-3"></span>
        </button>
    </header>

    <!-- Slide-over Drawer Menu -->
    <div id="drawer-backdrop" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 opacity-0 pointer-events-none transition-opacity duration-300"></div>
    <div id="drawer-menu" class="fixed top-0 right-0 bottom-0 w-full max-w-sm sm:max-w-md bg-[#321f47] text-[#fdc04f] z-50 translate-x-full transition-transform duration-300 ease-out shadow-2xl flex flex-col justify-between p-8 sm:p-12 border-l border-[#fdc04f]/20">
        <div>
            <!-- Close Button Header -->
            <div class="flex items-center justify-between pb-8 border-b border-[#fdc04f]/20">
                <span class="font-yeseva text-2xl tracking-wide text-[#fdc04f]">Menu</span>
                <button id="drawer-close-btn" class="w-10 h-10 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center hover:bg-white transition-colors cursor-pointer" aria-label="Close menu">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="mt-10 flex flex-col space-y-6 text-xl sm:text-2xl font-bold font-arsenal">
                <a href="{{ route('home') }}" class="group flex items-center justify-between py-2 border-b border-[#fdc04f]/10 text-white hover:text-[#fdc04f] transition-colors">
                    <span>Home</span>
                    <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
                <a href="{{ route('home') }}#programs" class="group flex items-center justify-between py-2 border-b border-[#fdc04f]/10 text-white hover:text-[#fdc04f] transition-colors">
                    <span>Our Programs</span>
                    <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
                <a href="{{ route('blog.index') }}" class="group flex items-center justify-between py-2 border-b border-[#fdc04f]/10 text-white hover:text-[#fdc04f] transition-colors">
                    <span>Article Blog</span>
                    <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
                <a href="{{ route('enroll') }}" class="group flex items-center justify-between py-2 border-b border-[#fdc04f]/10 text-white hover:text-[#fdc04f] transition-colors">
                    <span>Enroll Now</span>
                    <span class="text-xs text-[#fdc04f] opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                </a>
            </nav>

            <div class="mt-10">
                <a href="{{ route('enroll') }}" class="btn-brand-double w-full block">
                    Enroll Now
                </a>
            </div>
        </div>

        <!-- Drawer Footer -->
        <div class="pt-8 border-t border-[#fdc04f]/20 text-center">
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
            <!-- Copyright -->
            <p class="font-arsenal text-lg sm:text-xl font-normal text-[#fdc04f] tracking-wide">
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

    <!-- Interactive Navigation Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
</body>
</html>
