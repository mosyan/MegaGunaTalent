@extends('layouts.admin')

@section('title', 'Page Customizer & Settings')
@section('page_title', 'Page Customizer & Settings')

@section('content')
<div x-data="{ currentTab: 'branding' }" class="space-y-6">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Website Customizer</h2>
            <p class="text-xs text-slate-500 mt-1">Configure all public landing page texts, buttons, images, logo, favicon, and colors dynamically.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold border border-slate-200 transition-all flex items-center gap-2">
                <svg class="w-4 h-4 text-[#E2B842]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                View Live Page
            </a>
            <button type="submit" form="settings-form" class="px-5 py-2.5 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] text-xs font-bold shadow-lg shadow-[#E2B842]/20 transition-all flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save All Changes
            </button>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="flex flex-wrap gap-2 border-b border-slate-200 pb-3">
        <button 
            type="button"
            @click="currentTab = 'branding'" 
            :class="currentTab === 'branding' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white text-slate-600 hover:bg-slate-100 hover:text-slate-900 border border-slate-200 font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Branding & Logo
        </button>
        <button 
            type="button"
            @click="currentTab = 'hero'" 
            :class="currentTab === 'hero' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white text-slate-600 hover:bg-slate-100 hover:text-slate-900 border border-slate-200 font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Hero Section & Buttons
        </button>
        <button 
            type="button"
            @click="currentTab = 'programs'" 
            :class="currentTab === 'programs' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white text-slate-600 hover:bg-slate-100 hover:text-slate-900 border border-slate-200 font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Programs Section
        </button>
        <button 
            type="button"
            @click="currentTab = 'cta'" 
            :class="currentTab === 'cta' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white text-slate-600 hover:bg-slate-100 hover:text-slate-900 border border-slate-200 font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            CTA Banner Section
        </button>
        <button 
            type="button"
            @click="currentTab = 'footer'" 
            :class="currentTab === 'footer' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white text-slate-600 hover:bg-slate-100 hover:text-slate-900 border border-slate-200 font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Footer & Social
        </button>
        <button 
            type="button"
            @click="currentTab = 'about'" 
            :class="currentTab === 'about' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white text-slate-600 hover:bg-slate-100 hover:text-slate-900 border border-slate-200 font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            About Us Page
        </button>
        <button 
            type="button"
            @click="currentTab = 'colors'" 
            :class="currentTab === 'colors' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white text-slate-600 hover:bg-slate-100 hover:text-slate-900 border border-slate-200 font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Theme Colors
        </button>
    </div>

    <!-- Main Form -->
    <form id="settings-form" action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- TAB: Branding & Logo -->
        <div x-show="currentTab === 'branding'" class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
            <h3 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                General Brand Identity & Assets
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Site Title -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Website Title (SEO & Tab)</label>
                    <input 
                        type="text" 
                        name="site_title" 
                        value="{{ old('site_title', $settings['site_title'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>

                <!-- Site Tagline -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Tagline / Slogan</label>
                    <input 
                        type="text" 
                        name="site_tagline" 
                        value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                <!-- Custom Logo Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Custom Brand Logo</label>
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200/80">
                        @if(!empty($settings['site_logo']))
                            <div class="p-2 bg-white border border-slate-200 rounded-lg shrink-0">
                                <img src="{{ $settings['site_logo'] }}" alt="Current Logo" class="h-10 w-auto object-contain">
                            </div>
                        @else
                            <div class="w-12 h-10 rounded-lg bg-[#E2B842]/20 border border-[#E2B842]/30 flex items-center justify-center text-[#E2B842] font-black text-sm shrink-0">
                                SVG
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input type="file" name="site_logo" accept="image/*" class="text-xs text-slate-700 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                            <p class="text-[11px] text-slate-500 mt-1">PNG, JPG, SVG, or WebP (Max 2MB). Overrides default SVG.</p>
                        </div>
                    </div>
                </div>

                <!-- Custom Favicon Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Browser Favicon</label>
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200/80">
                        @if(!empty($settings['site_favicon']))
                            <div class="p-2 bg-white border border-slate-200 rounded-lg shrink-0">
                                <img src="{{ $settings['site_favicon'] }}" alt="Current Favicon" class="h-8 w-8 object-contain">
                            </div>
                        @else
                            <div class="w-10 h-10 rounded-lg bg-slate-200 flex items-center justify-center text-slate-600 font-bold text-xs shrink-0">
                                ICO
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input type="file" name="site_favicon" accept=".ico,.png,.svg" class="text-xs text-slate-700 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                            <p class="text-[11px] text-slate-500 mt-1">.ico or .png favicon (Max 1MB).</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="pt-4 border-t border-slate-100">
                <h4 class="text-sm font-bold text-slate-900 mb-4">Official Contact Details</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Email Address</label>
                        <input 
                            type="email" 
                            name="contact_email" 
                            value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Phone / WhatsApp</label>
                        <input 
                            type="text" 
                            name="contact_phone" 
                            value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Office Address</label>
                        <input 
                            type="text" 
                            name="contact_address" 
                            value="{{ old('contact_address', $settings['contact_address'] ?? '') }}"
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: Hero Section & Buttons -->
        <div x-show="currentTab === 'hero'" x-data="{ 
            heroLang: 'id',
            generateHeroPresets() {
                if (!confirm('Apakah Anda ingin mengisi otomatis rekomendasi teks Headline, Buttons & Trust Badges untuk 3 Bahasa (Indonesia, English, Deutsch)?')) return;
                const presets = {
                    hero_badge_text: 'Lembaga Kursus Resmi & Mitra Persiapan Ausbildung Jerman',
                    hero_title_line1: 'Kuasai Bahasa Jerman',
                    hero_title_line2: 'Wujudkan Karier & Studi Impian',
                    hero_subtitle: 'Bimbingan intensif dari level A1 hingga C1 bersama pengajar tersertifikasi berstandar Goethe-Institut.',
                    hero_primary_btn_text: 'Daftar Sekarang',
                    hero_secondary_btn_text: 'Pelajari Program',
                    hero_stat_1_lbl: 'Kelulusan Goethe-Zertifikat',
                    hero_stat_2_lbl: 'Alumni Studi & Ausbildung',
                    hero_stat_3_lbl: 'Pengajar Tersertifikasi',

                    hero_badge_text_en: 'Official German Language Center & Ausbildung Partner',
                    hero_title_line1_en: 'Speak German With Confidence',
                    hero_title_line2_en: 'Unlock Your Career & Study in Germany',
                    hero_subtitle_en: 'Engaging German courses for all levels. Learn German with flexible programs, experienced native tutors, and real-world conversations.',
                    hero_primary_btn_text_en: 'Enroll Now',
                    hero_secondary_btn_text_en: 'Explore Programs',
                    hero_stat_1_lbl_en: 'Goethe Exam Pass Rate',
                    hero_stat_2_lbl_en: 'Alumni in Germany',
                    hero_stat_3_lbl_en: 'Certified Expert Tutors',

                    hero_badge_text_de: 'Offizielles Deutsches Sprachzentrum & Ausbildungspartner',
                    hero_title_line1_de: 'Deutsch sprechen mit Selbstvertrauen',
                    hero_title_line2_de: 'Ihre Zukunft in Deutschland starten',
                    hero_subtitle_de: 'Interaktive Deutschkurse für alle Niveaustufen von A1 bis C1 mit zertifizierten Dozenten und Goethe-Zertifikat Vorbereitung.',
                    hero_primary_btn_text_de: 'Jetzt anmelden',
                    hero_secondary_btn_text_de: 'Programme entdecken',
                    hero_stat_1_lbl_de: 'Goethe-Bestehensquote',
                    hero_stat_2_lbl_de: 'Erfolgreiche Absolventen',
                    hero_stat_3_lbl_de: 'Zertifizierte Dozenten'
                };
                for (const [key, val] of Object.entries(presets)) {
                    const el = document.querySelector(`[name='${key}']`);
                    if (el) {
                        el.value = val;
                        el.dispatchEvent(new Event('input'));
                    }
                }
            }
        }" class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        Hero Section Headline, Buttons & Trust Badges
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">Konfigurasi teks multilingual (ID, EN, DE) untuk headline utama, tombol CTA, dan label floating trust badges.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateHeroPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-slate-100 p-1 rounded-xl border border-slate-200 shrink-0">
                        <span class="text-[11px] text-slate-500 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="heroLang = 'id'" :class="heroLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="heroLang = 'en'" :class="heroLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="heroLang = 'de'" :class="heroLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID Hero Texts -->
            <div x-show="heroLang === 'id'" class="space-y-6">
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider flex items-center gap-2">
                        <span>🇮🇩 Headline & Copywriting (Indonesia)</span>
                    </h4>
                    <!-- Hero Badge -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Badge Text (Top Pill - Indonesia)</label>
                        <input 
                            type="text" 
                            name="hero_badge_text" 
                            value="{{ old('hero_badge_text', $settings['hero_badge_text'] ?? '') }}"
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>

                    <!-- Title Line 1 & Line 2 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Headline Line 1 (Indonesia)</label>
                            <input 
                                type="text" 
                                name="hero_title_line1" 
                                value="{{ old('hero_title_line1', $settings['hero_title_line1'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Headline Line 2 (Gold Accent - Indonesia)</label>
                            <input 
                                type="text" 
                                name="hero_title_line2" 
                                value="{{ old('hero_title_line2', $settings['hero_title_line2'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>

                    <!-- Subtitle -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Subtitle Paragraph (Indonesia)</label>
                        <textarea 
                            name="hero_subtitle" 
                            rows="3"
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                    </div>
                </div>

                <!-- ID Buttons Labels -->
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇮🇩 CTA Button Labels (Indonesia)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Primary Button Label</label>
                            <input 
                                type="text" 
                                name="hero_primary_btn_text" 
                                value="{{ old('hero_primary_btn_text', $settings['hero_primary_btn_text'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Secondary Button Label</label>
                            <input 
                                type="text" 
                                name="hero_secondary_btn_text" 
                                value="{{ old('hero_secondary_btn_text', $settings['hero_secondary_btn_text'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>

                <!-- ID Trust Badges Labels -->
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇮🇩 Trust Badges / Stats Labels (Indonesia)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 1 Label</label>
                            <input 
                                type="text" 
                                name="hero_stat_1_lbl" 
                                value="{{ old('hero_stat_1_lbl', $settings['hero_stat_1_lbl'] ?? '') }}"
                                placeholder="Kelulusan Goethe-Zertifikat"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 2 Label</label>
                            <input 
                                type="text" 
                                name="hero_stat_2_lbl" 
                                value="{{ old('hero_stat_2_lbl', $settings['hero_stat_2_lbl'] ?? '') }}"
                                placeholder="Alumni Studi & Ausbildung"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 3 Label</label>
                            <input 
                                type="text" 
                                name="hero_stat_3_lbl" 
                                value="{{ old('hero_stat_3_lbl', $settings['hero_stat_3_lbl'] ?? '') }}"
                                placeholder="Pengajar Tersertifikasi"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- EN Hero Texts -->
            <div x-show="heroLang === 'en'" class="space-y-6">
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider flex items-center gap-2">
                        <span>🇬🇧 Headline & Copywriting (English)</span>
                    </h4>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Badge Text (Top Pill - English)</label>
                        <input 
                            type="text" 
                            name="hero_badge_text_en" 
                            value="{{ old('hero_badge_text_en', $settings['hero_badge_text_en'] ?? '') }}"
                            placeholder="e.g. Official German Language Center & Ausbildung Partner"
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Headline Line 1 (English)</label>
                            <input 
                                type="text" 
                                name="hero_title_line1_en" 
                                value="{{ old('hero_title_line1_en', $settings['hero_title_line1_en'] ?? '') }}"
                                placeholder="e.g. Speak German With Confidence"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Headline Line 2 (English)</label>
                            <input 
                                type="text" 
                                name="hero_title_line2_en" 
                                value="{{ old('hero_title_line2_en', $settings['hero_title_line2_en'] ?? '') }}"
                                placeholder="e.g. Unlock Your Career & Study in Germany"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Subtitle Paragraph (English)</label>
                        <textarea 
                            name="hero_subtitle_en" 
                            rows="3"
                            placeholder="e.g. Engaging German courses for all levels. Learn German with flexible programs, experienced native tutors, and real-world conversations."
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >{{ old('hero_subtitle_en', $settings['hero_subtitle_en'] ?? '') }}</textarea>
                    </div>
                </div>

                <!-- EN Buttons Labels -->
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇬🇧 CTA Button Labels (English)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Primary Button Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_primary_btn_text_en" 
                                value="{{ old('hero_primary_btn_text_en', $settings['hero_primary_btn_text_en'] ?? '') }}"
                                placeholder="e.g. Enroll Now"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Secondary Button Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_secondary_btn_text_en" 
                                value="{{ old('hero_secondary_btn_text_en', $settings['hero_secondary_btn_text_en'] ?? '') }}"
                                placeholder="e.g. Explore Programs"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>

                <!-- EN Trust Badges Labels -->
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇬🇧 Trust Badges / Stats Labels (English)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 1 Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_stat_1_lbl_en" 
                                value="{{ old('hero_stat_1_lbl_en', $settings['hero_stat_1_lbl_en'] ?? '') }}"
                                placeholder="e.g. Goethe Exam Pass Rate"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 2 Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_stat_2_lbl_en" 
                                value="{{ old('hero_stat_2_lbl_en', $settings['hero_stat_2_lbl_en'] ?? '') }}"
                                placeholder="e.g. Alumni in Germany"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 3 Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_stat_3_lbl_en" 
                                value="{{ old('hero_stat_3_lbl_en', $settings['hero_stat_3_lbl_en'] ?? '') }}"
                                placeholder="e.g. Certified Expert Tutors"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- DE Hero Texts -->
            <div x-show="heroLang === 'de'" class="space-y-6">
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider flex items-center gap-2">
                        <span>🇩🇪 Headline & Copywriting (Deutsch)</span>
                    </h4>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Badge Text (Top Pill - Deutsch)</label>
                        <input 
                            type="text" 
                            name="hero_badge_text_de" 
                            value="{{ old('hero_badge_text_de', $settings['hero_badge_text_de'] ?? '') }}"
                            placeholder="z.B. Offizielles Deutsches Sprachzentrum & Ausbildungspartner"
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Headline Line 1 (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_title_line1_de" 
                                value="{{ old('hero_title_line1_de', $settings['hero_title_line1_de'] ?? '') }}"
                                placeholder="z.B. Deutsch sprechen mit Selbstvertrauen"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Headline Line 2 (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_title_line2_de" 
                                value="{{ old('hero_title_line2_de', $settings['hero_title_line2_de'] ?? '') }}"
                                placeholder="z.B. Ihre Zukunft in Deutschland starten"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Subtitle Paragraph (Deutsch)</label>
                        <textarea 
                            name="hero_subtitle_de" 
                            rows="3"
                            placeholder="z.B. Interaktive Deutschkurse für alle Niveaustufen von A1 bis C1 mit zertifizierten Dozenten und Goethe-Zertifikat Vorbereitung."
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >{{ old('hero_subtitle_de', $settings['hero_subtitle_de'] ?? '') }}</textarea>
                    </div>
                </div>

                <!-- DE Buttons Labels -->
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇩🇪 CTA Button Labels (Deutsch)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Primary Button Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_primary_btn_text_de" 
                                value="{{ old('hero_primary_btn_text_de', $settings['hero_primary_btn_text_de'] ?? '') }}"
                                placeholder="z.B. Jetzt anmelden"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Secondary Button Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_secondary_btn_text_de" 
                                value="{{ old('hero_secondary_btn_text_de', $settings['hero_secondary_btn_text_de'] ?? '') }}"
                                placeholder="z.B. Programme entdecken"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>

                <!-- DE Trust Badges Labels -->
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇩🇪 Trust Badges / Stats Labels (Deutsch)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 1 Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_stat_1_lbl_de" 
                                value="{{ old('hero_stat_1_lbl_de', $settings['hero_stat_1_lbl_de'] ?? '') }}"
                                placeholder="z.B. Goethe-Bestehensquote"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 2 Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_stat_2_lbl_de" 
                                value="{{ old('hero_stat_2_lbl_de', $settings['hero_stat_2_lbl_de'] ?? '') }}"
                                placeholder="z.B. Erfolgreiche Absolventen"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 uppercase font-semibold mb-1">Badge 3 Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_stat_3_lbl_de" 
                                value="{{ old('hero_stat_3_lbl_de', $settings['hero_stat_3_lbl_de'] ?? '') }}"
                                placeholder="z.B. Zertifizierte Dozenten"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Primary and Secondary Buttons Targets & URLs (Shared) -->
            <div class="pt-4 border-t border-slate-100 space-y-4">
                <h4 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                    Target URL & Navigasi Tombol (Berlaku untuk semua bahasa)
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Primary Button URL -->
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2">
                        <label class="block text-xs font-bold text-[#E2B842] uppercase tracking-wider">Primary Button Target Link / URL</label>
                        <input 
                            type="text" 
                            name="hero_primary_btn_url" 
                            value="{{ old('hero_primary_btn_url', $settings['hero_primary_btn_url'] ?? '') }}"
                            placeholder="e.g. #enroll atau /registration"
                            class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>

                    <!-- Secondary Button URL -->
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-2">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Secondary Button Target Link / URL</label>
                        <input 
                            type="text" 
                            name="hero_secondary_btn_url" 
                            value="{{ old('hero_secondary_btn_url', $settings['hero_secondary_btn_url'] ?? '') }}"
                            placeholder="e.g. #programs atau /courses"
                            class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                </div>
            </div>

            <!-- 3 Stat Badges Numerical Values (Shared) -->
            <div class="pt-4 border-t border-slate-100 space-y-3">
                <div class="flex items-center justify-between">
                    <h4 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                        Nilai Angka / Statistik Trust Badges (Shared)
                    </h4>
                    <span class="text-[11px] text-slate-500">Label tiap stat dikonfigurasi pada tab bahasa di atas</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-3 bg-white border border-slate-200 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-600 uppercase font-semibold font-semibold">Stat 1 Nilai Angka</label>
                        <input type="text" name="hero_stat_1_val" value="{{ old('hero_stat_1_val', $settings['hero_stat_1_val'] ?? '') }}" placeholder="98%" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs">
                    </div>
                    <div class="p-3 bg-white border border-slate-200 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-600 uppercase font-semibold font-semibold">Stat 2 Nilai Angka</label>
                        <input type="text" name="hero_stat_2_val" value="{{ old('hero_stat_2_val', $settings['hero_stat_2_val'] ?? '') }}" placeholder="1,500+" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs">
                    </div>
                    <div class="p-3 bg-white border border-slate-200 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-600 uppercase font-semibold font-semibold">Stat 3 Nilai Angka</label>
                        <input type="text" name="hero_stat_3_val" value="{{ old('hero_stat_3_val', $settings['hero_stat_3_val'] ?? '') }}" placeholder="100%" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs">
                    </div>
                </div>
            </div>

            <!-- Hero Visual Backgrounds & Landmark Graphic -->
            <div class="pt-4 border-t border-slate-100 space-y-4">
                <h4 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                    Hero Visuals & Graphics
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Hero Background Image -->
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Hero Section Background Image</label>
                        @if(!empty($settings['hero_bg_image']))
                            <div class="h-24 rounded-lg overflow-hidden bg-slate-100 border border-slate-200">
                                <img src="{{ $settings['hero_bg_image'] }}" alt="Hero Background" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-20 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-xs text-slate-500">
                                Default: images/global-bg.jpg
                            </div>
                        @endif
                        <input type="file" name="hero_bg_image" accept="image/*" class="text-xs text-slate-700 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                        <p class="text-[11px] text-slate-500">JPG, PNG, or WebP (Max 5MB). Overrides default global map graphic.</p>
                    </div>

                    <!-- Brandenburg Gate Graphic -->
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-3">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Brandenburg Gate Landmark Graphic</label>
                        @if(!empty($settings['hero_gate_image']))
                            <div class="h-24 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 flex items-center justify-center p-2">
                                <img src="{{ $settings['hero_gate_image'] }}" alt="Hero Gate" class="max-h-full w-auto object-contain">
                            </div>
                        @else
                            <div class="h-20 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-xs text-slate-500">
                                Default: images/hero-gate.jpg
                            </div>
                        @endif
                        <input type="file" name="hero_gate_image" accept="image/*" class="text-xs text-slate-700 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                        <p class="text-[11px] text-slate-500">PNG or JPG cutout resting at the hero baseline (Max 4MB).</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: Programs Section -->
        <div x-show="currentTab === 'programs'" x-data="{ 
            progLang: 'id',
            generateProgramPresets() {
                if (!confirm('Apakah Anda ingin mengisi otomatis rekomendasi teks Heading & Kartu Program untuk 3 Bahasa (ID, EN, DE)?')) return;
                const presets = {
                    programs_badge: 'PROGRAM UNGGULAN KAMI',
                    programs_title: 'Program Kursus & Jalur Persiapan',
                    programs_subtitle: 'Kurikulum terstruktur dirancang sistematis dari fondasi percakapan hingga kemandirian bahasa untuk studi dan karier profesional di Jerman.',
                    program_beginner_title: 'Beginner German Program',
                    program_beginner_tagline: 'Kuasai Dasar Bahasa Jerman dari Nol Hingga Mampu Berkomunikasi Sehari-hari dan Lulus Sertifikasi Goethe A1/A2.',
                    program_beginner_description: 'Program Beginner dirancang khusus bagi peserta yang belum pernah mempelajari bahasa Jerman sama sekali. Menggunakan metode pembelajaran interaktif berbasis SKKNI dan standar Goethe-Institut, peserta akan dibimbing mulai dari pelafalan presisi (Aussprache), kosakata esensial, struktur tata bahasa dasar (Akkusativ & Dativ), hingga simulasi percakapan nyata untuk kehidupan sehari-hari, perjalanan, dan persiapan awal studi di Jerman.',
                    program_beginner_career_path: 'Lulusan level ini memiliki pondasi kuat untuk melanjutkan ke level Intermediate B1 (syarat utama Ausbildung), serta memenuhi syarat administratif dasar program Au Pair dan visa tertentu ke Jerman.',
                    program_intermediate_title: 'Intermediate German Program',
                    program_intermediate_tagline: 'Kunci Kelulusan Goethe-Zertifikat B1 Sebagai Syarat Mutlak Visa Ausbildung, Studi Vokasi, dan Karier di Jerman.',
                    program_intermediate_description: 'Program Intermediate difokuskan untuk mencapai tingkat kemandirian berbahasa Jerman (Selbstständige Sprachverwendung). Level B1 adalah syarat wajib paling krusial bagi calon peserta program Ausbildung (perhotelan, keperawatan/Pflege, teknik/Mechatronik, gastronomi, dll.) di Jerman. Di level ini, peserta dilatih berdiskusi, memahami teks berita, menyusun argumentasi formal, serta menguasai struktur gramatikal lanjutan seperti kalimat pasif (Passiv), Konjunktiv II, dan klausa bawahan (Nebensätze).',
                    program_intermediate_career_path: 'Sertifikat Goethe B1 adalah dokumen resmi utama yang diakui Kedutaan Besar Jerman di Jakarta untuk penerbitan visa Ausbildung, visa mencari pelatihan kerja, dan visa studi persiapan.',
                    program_advanced_title: 'Advanced German Program',
                    program_advanced_tagline: 'Kecakapan Bahasa Tingkat Tinggi untuk Jalur Karier Profesional, Bahasa Khusus (Fachsprache), dan Studi Universitas di Jerman.',
                    program_advanced_description: 'Program Advanced dirancang untuk profesional, dokter, perawat ahli, insinyur, dan calon mahasiswa master/doktoral yang memerlukan kemahiran bahasa Jerman tingkat lanjut. Fokus pembelajaran mencakup bahasa teknis dan bisnis (Wirtschaftsdeutsch & Fachsprache), retorika presentasi, penulisan laporan ilmiah, negosiasi kontrak, serta pemahaman mendalam tentang teks kompleks abstrak dan teknis.',
                    program_advanced_career_path: 'Sertifikasi B2/C1 membuka akses langsung ke pasar kerja profesional berpenghasilan tinggi di Jerman, izin praktik profesi kesehatan, dan penerimaan universitas negeri ternama di Jerman.',

                    programs_badge_en: 'OUR FLAGSHIP PROGRAMS',
                    programs_title_en: 'Comprehensive Language Pathways',
                    programs_subtitle_en: 'Structured curriculum designed systematically from basic conversation to fluent professional proficiency for your studies and career in Germany.',
                    program_beginner_title_en: 'Beginner German Program (A1 - A2)',
                    program_beginner_tagline_en: 'Master German fundamentals from scratch to fluent everyday conversation and certified Goethe A1/A2 qualification.',
                    program_beginner_description_en: 'Tailored for learners with zero prior knowledge. Guided by certified instructors using CEFR benchmarks, you master proper pronunciation, essential vocabulary, sentence syntax (Accusative/Dative), and real-life dialogue simulations for living and studying in Germany.',
                    program_beginner_career_path_en: 'Provides the indispensable prerequisite foundation for Intermediate B1 (Ausbildung entry), Au Pair placements, and early academic preparation.',
                    program_intermediate_title_en: 'Intermediate German Program (B1)',
                    program_intermediate_tagline_en: 'Your definitive stepping stone to Goethe B1 certification, mandatory for vocational Ausbildung and work visas in Germany.',
                    program_intermediate_description_en: 'Focused on independent language proficiency (CEFR B1). Trainees master complex grammar (Passive voice, Subjunctive II, subordinate clauses), workplace terminology, interview readiness, and intensive drill in all 4 exam modules (Reading, Listening, Writing, Speaking).',
                    program_intermediate_career_path_en: 'The official key required by the German Embassy for issuing dual vocational training (Ausbildung) visas in healthcare, engineering, IT, and hospitality.',
                    program_advanced_title_en: 'Advanced German Program (B2 - C1)',
                    program_advanced_tagline_en: 'Superior professional fluency, specialized technical German (Fachsprache), and direct entrance to German universities.',
                    program_advanced_description_en: 'Designed for qualified doctors, nurses, engineers, and graduate researchers. Focuses on advanced discourse, technical academic writing, medical terminology, negotiation rhetoric, and rigorous TestDaF / Goethe B2-C1 preparation.',
                    program_advanced_career_path_en: 'Unlocks high-salary professional employment in Germany, medical professional licensing (Approbation), and direct admission to German public universities.',

                    programs_badge_de: 'UNSERE SPITZENPROGRAMME',
                    programs_title_de: 'Gezielte Deutschkurse & Bildungspfade',
                    programs_subtitle_de: 'Strukturierte Lehrpläne von den Grundlagen bis zur berufsbezogenen Sprachkompetenz für Studium und duale Ausbildung in Deutschland.',
                    program_beginner_title_de: 'Deutsch Grundstufe (A1 - A2)',
                    program_beginner_tagline_de: 'Deutsche Grundlagen von Null auf lernen: Sichere Alltagskommunikation und erfolgreicher Goethe-A1/A2-Abschluss.',
                    program_beginner_description_de: 'Speziell für Anfänger ohne Vorkenntnisse entwickelt. Schrittweise Vermittlung von exakter Aussprache, Grundwortschatz, Grammatikstrukturen und lebendigen Dialogübungen nach offiziellen Standards des Goethe-Instituts.',
                    program_beginner_career_path_de: 'Solide Basis für den direkten Übergang zur Mittelstufe B1 sowie Erfüllung der Sprachanforderungen für Au-Pair und Orientierungsvisa.',
                    program_intermediate_title_de: 'Deutsch Mittelstufe (B1)',
                    program_intermediate_tagline_de: 'Der entscheidende Meilenstein zum Goethe-Zertifikat B1 – Pflichtvoraussetzung für die duale Ausbildung in Deutschland.',
                    program_intermediate_description_de: 'Fokus auf selbstständige Sprachverwendung. Umfassende Vorbereitung auf alle vier Prüfungsmodule (Lesen, Hören, Schreiben, Sprechen) mit berufsbezogener Fachsprache für Pflege, Gastronomie und Handwerk.',
                    program_intermediate_career_path_de: 'Vollständige Erfüllung der Visakriterien der Deutschen Botschaft für die Einreise zur dualen Ausbildung und Fachkräfteweiterbildung.',
                    program_advanced_title_de: 'Deutsch Oberstufe (B2 - C1)',
                    program_advanced_tagline_de: 'Höchste Sprachkompetenz für Fachkräfte, Mediziner, Wirtschaftsdeutsch und universitäres Studium in Deutschland.',
                    program_advanced_description_de: 'Gezielt konzipiert für Akademiker, Ärzte, Ingenieure und Masterstudierende. Schwerpunkte: Fachsprache, wissenschaftliches Schreiben, Verhandlungsführung und zielgerichtetes Training für TestDaF sowie Goethe B2/C1.',
                    program_advanced_career_path_de: 'Berechtigt zur ärztlichen Approbation, direkter Arbeitsaufnahme in deutschen Spitzenunternehmen sowie uneingeschränkter Hochschulzulassung.'
                };
                for (const [key, val] of Object.entries(presets)) {
                    const el = document.querySelector(`[name='${key}']`);
                    if (el) {
                        el.value = val;
                        el.dispatchEvent(new Event('input'));
                    }
                }
            }
        }" class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        Course Programs Heading & Cards Customizer
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">Konfigurasi lengkap heading dan detail kurikulum untuk 3 tingkatan program dalam bahasa Indonesia, English, dan Deutsch.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateProgramPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-slate-100 p-1 rounded-xl border border-slate-200 shrink-0">
                        <span class="text-[11px] text-slate-500 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="progLang = 'id'" :class="progLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="progLang = 'en'" :class="progLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="progLang = 'de'" :class="progLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID Programs Main Heading -->
            <div x-show="progLang === 'id'" class="space-y-4 bg-slate-50 border border-slate-200/80 rounded-xl p-5">
                <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇮🇩 Section Header (Indonesia)</h4>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge</label>
                    <input 
                        type="text" 
                        name="programs_badge" 
                        value="{{ old('programs_badge', $settings['programs_badge'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Main Section Title</label>
                    <input 
                        type="text" 
                        name="programs_title" 
                        value="{{ old('programs_title', $settings['programs_title'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Description</label>
                    <textarea 
                        name="programs_subtitle" 
                        rows="2"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >{{ old('programs_subtitle', $settings['programs_subtitle'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- EN Programs Main Heading -->
            <div x-show="progLang === 'en'" class="space-y-4 bg-slate-50 border border-slate-200/80 rounded-xl p-5">
                <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇬🇧 Section Header (English)</h4>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (English)</label>
                    <input 
                        type="text" 
                        name="programs_badge_en" 
                        value="{{ old('programs_badge_en', $settings['programs_badge_en'] ?? '') }}"
                        placeholder="e.g. OUR FLAGSHIP PROGRAMS"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Main Section Title (English)</label>
                    <input 
                        type="text" 
                        name="programs_title_en" 
                        value="{{ old('programs_title_en', $settings['programs_title_en'] ?? '') }}"
                        placeholder="e.g. Comprehensive Language Pathways"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Description (English)</label>
                    <textarea 
                        name="programs_subtitle_en" 
                        rows="2"
                        placeholder="e.g. Structured curriculum designed systematically from basic conversation to fluent professional proficiency."
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >{{ old('programs_subtitle_en', $settings['programs_subtitle_en'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- DE Programs Main Heading -->
            <div x-show="progLang === 'de'" class="space-y-4 bg-slate-50 border border-slate-200/80 rounded-xl p-5">
                <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇩🇪 Section Header (Deutsch)</h4>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Deutsch)</label>
                    <input 
                        type="text" 
                        name="programs_badge_de" 
                        value="{{ old('programs_badge_de', $settings['programs_badge_de'] ?? '') }}"
                        placeholder="z.B. UNSERE SPITZENPROGRAMME"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Main Section Title (Deutsch)</label>
                    <input 
                        type="text" 
                        name="programs_title_de" 
                        value="{{ old('programs_title_de', $settings['programs_title_de'] ?? '') }}"
                        placeholder="z.B. Gezielte Deutschkurse & Bildungspfade"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Description (Deutsch)</label>
                    <textarea 
                        name="programs_subtitle_de" 
                        rows="2"
                        placeholder="z.B. Strukturierte Lehrpläne von den Grundlagen bis zur berufsbezogenen Sprachkompetenz für Studium und Ausbildung."
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >{{ old('programs_subtitle_de', $settings['programs_subtitle_de'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- DETAIL PROGRAM 1: BEGINNER (A1 - A2) -->
            <div class="pt-6 border-t border-slate-100 space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#E2B842]/20 border border-[#E2B842]/40 flex items-center justify-center text-[#E2B842] font-bold text-xs">
                            A1
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Program 1: Beginner (A1 - A2)</h4>
                            <p class="text-xs text-slate-500">Halaman detail: <code class="text-[#E2B842]">/programs/beginner</code></p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 rounded bg-[#E2B842]/10 text-[#E2B842] text-[11px] font-bold uppercase tracking-wider">Fondasi Dasar</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pb-2 border-b border-slate-100">
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Level CEFR</label>
                        <input type="text" name="program_beginner_level" value="{{ old('program_beginner_level', $settings['program_beginner_level'] ?? 'A1 - A2 (CEFR)') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Badge / Sub-judul Fokus</label>
                        <input type="text" name="program_beginner_badge" value="{{ old('program_beginner_badge', $settings['program_beginner_badge'] ?? 'Fondasi & Percakapan Harian') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Target Ujian Resmi</label>
                        <input type="text" name="program_beginner_target_exam" value="{{ old('program_beginner_target_exam', $settings['program_beginner_target_exam'] ?? 'Goethe-Zertifikat A1 & A2') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- ID Text Fields -->
                <div x-show="progLang === 'id'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Judul Program (Indonesia)</label>
                            <input type="text" name="program_beginner_title" value="{{ old('program_beginner_title', $settings['program_beginner_title'] ?? 'Beginner German Program') }}" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Tagline Ringkas (Indonesia)</label>
                            <input type="text" name="program_beginner_tagline" value="{{ old('program_beginner_tagline', $settings['program_beginner_tagline'] ?? 'Kuasai Dasar Bahasa Jerman dari Nol Hingga Mampu Berkomunikasi Sehari-hari dan Lulus Sertifikasi Goethe A1/A2.') }}" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Deskripsi Lengkap Program (Indonesia)</label>
                        <textarea name="program_beginner_description" rows="3" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_beginner_description', $settings['program_beginner_description'] ?? 'Program Beginner dirancang khusus bagi peserta yang belum pernah mempelajari bahasa Jerman sama sekali. Menggunakan metode pembelajaran interaktif berbasis SKKNI dan standar Goethe-Institut, peserta akan dibimbing mulai dari pelafalan presisi (Aussprache), kosakata esensial, struktur tata bahasa dasar (Akkusativ & Dativ), hingga simulasi percakapan nyata untuk kehidupan sehari-hari, perjalanan, dan persiapan awal studi di Jerman.') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Jalur Karier & Peluang Lulusan (Indonesia)</label>
                        <input type="text" name="program_beginner_career_path" value="{{ old('program_beginner_career_path', $settings['program_beginner_career_path'] ?? 'Lulusan level ini memiliki pondasi kuat untuk melanjutkan ke level Intermediate B1 (syarat utama Ausbildung), serta memenuhi syarat administratif dasar program Au Pair dan visa tertentu ke Jerman.') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- EN Text Fields -->
                <div x-show="progLang === 'en'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Program Title (English)</label>
                            <input type="text" name="program_beginner_title_en" value="{{ old('program_beginner_title_en', $settings['program_beginner_title_en'] ?? '') }}" placeholder="e.g. Beginner German Program (A1 - A2)" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Short Tagline (English)</label>
                            <input type="text" name="program_beginner_tagline_en" value="{{ old('program_beginner_tagline_en', $settings['program_beginner_tagline_en'] ?? '') }}" placeholder="e.g. Master foundational German communication and pass Goethe A1/A2 exams." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Full Program Description (English)</label>
                        <textarea name="program_beginner_description_en" rows="3" placeholder="e.g. Designed for beginners starting from zero, guiding students through precise pronunciation, essential vocabulary, and everyday conversations." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_beginner_description_en', $settings['program_beginner_description_en'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Career Pathway (English)</label>
                        <input type="text" name="program_beginner_career_path_en" value="{{ old('program_beginner_career_path_en', $settings['program_beginner_career_path_en'] ?? '') }}" placeholder="e.g. Provides a strong foundation for Intermediate B1 and administrative requirements for Au Pair or FSJ." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- DE Text Fields -->
                <div x-show="progLang === 'de'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Programmtitel (Deutsch)</label>
                            <input type="text" name="program_beginner_title_de" value="{{ old('program_beginner_title_de', $settings['program_beginner_title_de'] ?? '') }}" placeholder="z.B. Deutsch Grundstufe (A1 - A2)" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Slogan / Untertitel (Deutsch)</label>
                            <input type="text" name="program_beginner_tagline_de" value="{{ old('program_beginner_tagline_de', $settings['program_beginner_tagline_de'] ?? '') }}" placeholder="z.B. Deutsch von Grund auf lernen für Alltag und Goethe A1/A2 Zertifikat." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Ausführliche Beschreibung (Deutsch)</label>
                        <textarea name="program_beginner_description_de" rows="3" placeholder="z.B. Speziell konzipiert für Teilnehmer ohne Vorkenntnisse, mit Fokus auf Aussprache, Grundgrammatik und praktische Alltagskommunikation." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_beginner_description_de', $settings['program_beginner_description_de'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Karriereperspektiven (Deutsch)</label>
                        <input type="text" name="program_beginner_career_path_de" value="{{ old('program_beginner_career_path_de', $settings['program_beginner_career_path_de'] ?? '') }}" placeholder="z.B. Solide Basis für B1 Ausbildungsvorbereitung sowie Au-Pair- und FSJ-Visa." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-2 border-t border-slate-100">
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Durasi</label>
                        <input type="text" name="program_beginner_duration" value="{{ old('program_beginner_duration', $settings['program_beginner_duration'] ?? '10 - 12 Minggu') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Total Jam Pembelajaran</label>
                        <input type="text" name="program_beginner_total_hours" value="{{ old('program_beginner_total_hours', $settings['program_beginner_total_hours'] ?? '160 Jam Pembelajaran Intensif') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Kapasitas Kelas</label>
                        <input type="text" name="program_beginner_class_size" value="{{ old('program_beginner_class_size', $settings['program_beginner_class_size'] ?? 'Maksimal 15 Siswa / Kelas') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Jadwal Belajar</label>
                        <input type="text" name="program_beginner_schedule" value="{{ old('program_beginner_schedule', $settings['program_beginner_schedule'] ?? 'Senin - Jumat (09:00 - 13:00 WIB) / Pilihan Kelas Malam') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>
            </div>

            <!-- DETAIL PROGRAM 2: INTERMEDIATE (B1) -->
            <div class="pt-6 border-t border-slate-100 space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#E2B842] text-[#2C0B1E] flex items-center justify-center font-bold text-xs">
                            B1
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Program 2: Intermediate (B1)</h4>
                            <p class="text-xs text-slate-500">Halaman detail: <code class="text-[#E2B842]">/programs/intermediate</code></p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 rounded bg-[#E2B842] text-[#2C0B1E] text-[11px] font-bold uppercase tracking-wider">Syarat Ausbildung</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pb-2 border-b border-slate-100">
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Level CEFR</label>
                        <input type="text" name="program_intermediate_level" value="{{ old('program_intermediate_level', $settings['program_intermediate_level'] ?? 'B1 (CEFR)') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Badge / Sub-judul Fokus</label>
                        <input type="text" name="program_intermediate_badge" value="{{ old('program_intermediate_badge', $settings['program_intermediate_badge'] ?? 'Pintu Gerbang Utama Ausbildung Jerman') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Target Ujian Resmi</label>
                        <input type="text" name="program_intermediate_target_exam" value="{{ old('program_intermediate_target_exam', $settings['program_intermediate_target_exam'] ?? 'Goethe-Zertifikat B1 (4 Modul)') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- ID Text Fields -->
                <div x-show="progLang === 'id'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Judul Program (Indonesia)</label>
                            <input type="text" name="program_intermediate_title" value="{{ old('program_intermediate_title', $settings['program_intermediate_title'] ?? 'Intermediate German Program') }}" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Tagline Ringkas (Indonesia)</label>
                            <input type="text" name="program_intermediate_tagline" value="{{ old('program_intermediate_tagline', $settings['program_intermediate_tagline'] ?? 'Kunci Kelulusan Goethe-Zertifikat B1 Sebagai Syarat Mutlak Visa Ausbildung, Studi Vokasi, dan Karier di Jerman.') }}" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Deskripsi Lengkap Program (Indonesia)</label>
                        <textarea name="program_intermediate_description" rows="3" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_intermediate_description', $settings['program_intermediate_description'] ?? 'Program Intermediate difokuskan untuk mencapai tingkat kemandirian berbahasa Jerman (Selbstständige Sprachverwendung). Level B1 adalah syarat wajib paling krusial bagi calon peserta program Ausbildung di Jerman.') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Jalur Karier & Peluang Lulusan (Indonesia)</label>
                        <input type="text" name="program_intermediate_career_path" value="{{ old('program_intermediate_career_path', $settings['program_intermediate_career_path'] ?? 'Sertifikat Goethe B1 adalah dokumen resmi utama yang diakui Kedutaan Besar Jerman di Jakarta untuk penerbitan visa Ausbildung.') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- EN Text Fields -->
                <div x-show="progLang === 'en'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Program Title (English)</label>
                            <input type="text" name="program_intermediate_title_en" value="{{ old('program_intermediate_title_en', $settings['program_intermediate_title_en'] ?? '') }}" placeholder="e.g. Intermediate German Program (B1)" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Short Tagline (English)</label>
                            <input type="text" name="program_intermediate_tagline_en" value="{{ old('program_intermediate_tagline_en', $settings['program_intermediate_tagline_en'] ?? '') }}" placeholder="e.g. Key to passing Goethe B1 for Ausbildung visa and vocational programs in Germany." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Full Program Description (English)</label>
                        <textarea name="program_intermediate_description_en" rows="3" placeholder="e.g. Focuses on independent language usage, crucial for vocational Ausbildung trainees in nursing, hospitality, and engineering." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_intermediate_description_en', $settings['program_intermediate_description_en'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Career Pathway (English)</label>
                        <input type="text" name="program_intermediate_career_path_en" value="{{ old('program_intermediate_career_path_en', $settings['program_intermediate_career_path_en'] ?? '') }}" placeholder="e.g. Officially recognized by the German Embassy for issuing Ausbildung and job training visas." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- DE Text Fields -->
                <div x-show="progLang === 'de'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Programmtitel (Deutsch)</label>
                            <input type="text" name="program_intermediate_title_de" value="{{ old('program_intermediate_title_de', $settings['program_intermediate_title_de'] ?? '') }}" placeholder="z.B. Deutsch Mittelstufe (B1)" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Slogan / Untertitel (Deutsch)</label>
                            <input type="text" name="program_intermediate_tagline_de" value="{{ old('program_intermediate_tagline_de', $settings['program_intermediate_tagline_de'] ?? '') }}" placeholder="z.B. Schlüssel zum Goethe-Zertifikat B1 für Ausbildung und Beruf in Deutschland." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Ausführliche Beschreibung (Deutsch)</label>
                        <textarea name="program_intermediate_description_de" rows="3" placeholder="z.B. Vorbereitung auf selbstständige Sprachverwendung für Ausbildung in Pflege, Hotellerie und Technik." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_intermediate_description_de', $settings['program_intermediate_description_de'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Karriereperspektiven (Deutsch)</label>
                        <input type="text" name="program_intermediate_career_path_de" value="{{ old('program_intermediate_career_path_de', $settings['program_intermediate_career_path_de'] ?? '') }}" placeholder="z.B. Anerkannt für Visumerteilung für duale Ausbildung in Deutschland." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-2 border-t border-slate-100">
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Durasi</label>
                        <input type="text" name="program_intermediate_duration" value="{{ old('program_intermediate_duration', $settings['program_intermediate_duration'] ?? '12 Minggu') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Total Jam Pembelajaran</label>
                        <input type="text" name="program_intermediate_total_hours" value="{{ old('program_intermediate_total_hours', $settings['program_intermediate_total_hours'] ?? '180 Jam Pembelajaran Intensif') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Kapasitas Kelas</label>
                        <input type="text" name="program_intermediate_class_size" value="{{ old('program_intermediate_class_size', $settings['program_intermediate_class_size'] ?? 'Maksimal 15 Siswa / Kelas') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Jadwal Belajar</label>
                        <input type="text" name="program_intermediate_schedule" value="{{ old('program_intermediate_schedule', $settings['program_intermediate_schedule'] ?? 'Senin - Jumat (08:30 - 13:00 WIB)') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>
            </div>

            <!-- DETAIL PROGRAM 3: ADVANCED (B2 - C1) -->
            <div class="pt-6 border-t border-slate-100 space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#E2B842]/20 border border-[#E2B842]/40 flex items-center justify-center text-[#E2B842] font-bold text-xs">
                            B2+
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900">Program 3: Advanced (B2 - C1)</h4>
                            <p class="text-xs text-slate-500">Halaman detail: <code class="text-[#E2B842]">/programs/advanced</code></p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 rounded bg-[#E2B842]/10 text-[#E2B842] text-[11px] font-bold uppercase tracking-wider">Profisiensi Tinggi</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pb-2 border-b border-slate-100">
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Level CEFR</label>
                        <input type="text" name="program_advanced_level" value="{{ old('program_advanced_level', $settings['program_advanced_level'] ?? 'B2 - C1 (CEFR)') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Badge / Sub-judul Fokus</label>
                        <input type="text" name="program_advanced_badge" value="{{ old('program_advanced_badge', $settings['program_advanced_badge'] ?? 'Profisiensi Karier & Akademik') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Target Ujian Resmi</label>
                        <input type="text" name="program_advanced_target_exam" value="{{ old('program_advanced_target_exam', $settings['program_advanced_target_exam'] ?? 'Goethe-Zertifikat B2/C1 & TestDaF') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- ID Text Fields -->
                <div x-show="progLang === 'id'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Judul Program (Indonesia)</label>
                            <input type="text" name="program_advanced_title" value="{{ old('program_advanced_title', $settings['program_advanced_title'] ?? 'Advanced German Program') }}" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Tagline Ringkas (Indonesia)</label>
                            <input type="text" name="program_advanced_tagline" value="{{ old('program_advanced_tagline', $settings['program_advanced_tagline'] ?? 'Kecakapan Bahasa Tingkat Tinggi untuk Jalur Karier Profesional, Bahasa Khusus (Fachsprache), dan Studi Universitas di Jerman.') }}" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Deskripsi Lengkap Program (Indonesia)</label>
                        <textarea name="program_advanced_description" rows="3" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_advanced_description', $settings['program_advanced_description'] ?? 'Program Advanced dirancang untuk profesional, dokter, perawat ahli, insinyur, dan calon mahasiswa master/doktoral yang memerlukan kemahiran bahasa Jerman tingkat lanjut.') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Jalur Karier & Peluang Lulusan (Indonesia)</label>
                        <input type="text" name="program_advanced_career_path" value="{{ old('program_advanced_career_path', $settings['program_advanced_career_path'] ?? 'Sertifikasi B2/C1 membuka akses langsung ke pasar kerja profesional berpenghasilan tinggi di Jerman.') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- EN Text Fields -->
                <div x-show="progLang === 'en'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Program Title (English)</label>
                            <input type="text" name="program_advanced_title_en" value="{{ old('program_advanced_title_en', $settings['program_advanced_title_en'] ?? '') }}" placeholder="e.g. Advanced German Program (B2 - C1)" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Short Tagline (English)</label>
                            <input type="text" name="program_advanced_tagline_en" value="{{ old('program_advanced_tagline_en', $settings['program_advanced_tagline_en'] ?? '') }}" placeholder="e.g. High-level language mastery for professional careers, medical tracks, and university degrees." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Full Program Description (English)</label>
                        <textarea name="program_advanced_description_en" rows="3" placeholder="e.g. Tailored for doctors, engineers, and master students requiring business and technical German." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_advanced_description_en', $settings['program_advanced_description_en'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Career Pathway (English)</label>
                        <input type="text" name="program_advanced_career_path_en" value="{{ old('program_advanced_career_path_en', $settings['program_advanced_career_path_en'] ?? '') }}" placeholder="e.g. Direct entry into the high-income German professional labor market and state universities." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- DE Text Fields -->
                <div x-show="progLang === 'de'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Programmtitel (Deutsch)</label>
                            <input type="text" name="program_advanced_title_de" value="{{ old('program_advanced_title_de', $settings['program_advanced_title_de'] ?? '') }}" placeholder="z.B. Deutsch Oberstufe (B2 - C1)" class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Slogan / Untertitel (Deutsch)</label>
                            <input type="text" name="program_advanced_tagline_de" value="{{ old('program_advanced_tagline_de', $settings['program_advanced_tagline_de'] ?? '') }}" placeholder="z.B. Höchste Sprachkompetenz für Fachkräfte, Mediziner und universitäres Studium." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Ausführliche Beschreibung (Deutsch)</label>
                        <textarea name="program_advanced_description_de" rows="3" placeholder="z.B. Konzipiert für Fachkräfte, Ärzte und Akademiker mit Schwerpunkt auf Fach- und Wirtschaftssprache." class="w-full px-3 py-2.5 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_advanced_description_de', $settings['program_advanced_description_de'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Karriereperspektiven (Deutsch)</label>
                        <input type="text" name="program_advanced_career_path_de" value="{{ old('program_advanced_career_path_de', $settings['program_advanced_career_path_de'] ?? '') }}" placeholder="z.B. Direkter Zugang zum deutschen Arbeitsmarkt für hochqualifizierte Berufe." class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-2 border-t border-slate-100">
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Durasi</label>
                        <input type="text" name="program_advanced_duration" value="{{ old('program_advanced_duration', $settings['program_advanced_duration'] ?? '12 - 14 Minggu') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Total Jam Pembelajaran</label>
                        <input type="text" name="program_advanced_total_hours" value="{{ old('program_advanced_total_hours', $settings['program_advanced_total_hours'] ?? '200 Jam Pembelajaran Intensif') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Kapasitas Kelas</label>
                        <input type="text" name="program_advanced_class_size" value="{{ old('program_advanced_class_size', $settings['program_advanced_class_size'] ?? 'Maksimal 12 Siswa / Kelas (Fokus & Presisi)') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-600 font-semibold uppercase mb-1">Jadwal Belajar</label>
                        <input type="text" name="program_advanced_schedule" value="{{ old('program_advanced_schedule', $settings['program_advanced_schedule'] ?? 'Senin - Jumat / Kelas Spesialisasi Fleksibel') }}" class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: CTA Banner Section -->
        <div x-show="currentTab === 'cta'" x-data="{ 
            ctaLang: 'id',
            generateCtaPresets() {
                if (!confirm('Apakah Anda ingin mengisi otomatis rekomendasi teks CTA Conversion Banner untuk 3 Bahasa (ID, EN, DE)?')) return;
                const presets = {
                    cta_badge: 'Mulai Perjalanan Anda',
                    cta_title: 'Raih Target Bahasa Jerman Anda Bersama Kami',
                    cta_subtitle: 'Kami membantu mewujudkan cita-cita studi, karier, dan Ausbildung Anda di Jerman melalui kurikulum terstruktur dan bimbingan mentor berpengalaman.',
                    cta_button_text: 'Hubungi Kami & Daftar Sekarang',

                    cta_badge_en: 'Start Your Journey Today',
                    cta_title_en: 'Achieve Your German Language Goals',
                    cta_subtitle_en: 'We help you achieve your language learning goals, whether for travel, work, or personal enrichment with certified tutors.',
                    cta_button_text_en: 'Contact Us & Enroll Now',

                    cta_badge_de: 'Starten Sie Ihre Sprachreise',
                    cta_title_de: 'Erreichen Sie Ihre Deutsch-Sprachziele',
                    cta_subtitle_de: 'Wir unterstützen Sie beim Erreichen Ihrer Sprachziele für Ausbildung, Studium oder Beruf mit praxisnahem Unterricht und Goethe-Zertifikat Vorbereitung.',
                    cta_button_text_de: 'Kontaktieren & Jetzt Anmelden'
                };
                for (const [key, val] of Object.entries(presets)) {
                    const el = document.querySelector(`[name='${key}']`);
                    if (el) {
                        el.value = val;
                        el.dispatchEvent(new Event('input'));
                    }
                }
            }
        }" class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        Call-to-Action (CTA) Conversion Banner
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">Konfigurasi teks multilingual (ID, EN, DE) untuk pill badge, headline ajakan, subtitle dan tombol konversi pendaftaran.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateCtaPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-slate-100 p-1 rounded-xl border border-slate-200 shrink-0">
                        <span class="text-[11px] text-slate-500 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="ctaLang = 'id'" :class="ctaLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="ctaLang = 'en'" :class="ctaLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="ctaLang = 'de'" :class="ctaLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID CTA -->
            <div x-show="ctaLang === 'id'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Pill Badge (ID)</label>
                    <input 
                        type="text" 
                        name="cta_badge" 
                        value="{{ old('cta_badge', $settings['cta_badge'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Heading (ID)</label>
                    <input 
                        type="text" 
                        name="cta_title" 
                        value="{{ old('cta_title', $settings['cta_title'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Subtitle (ID)</label>
                    <textarea 
                        name="cta_subtitle" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >{{ old('cta_subtitle', $settings['cta_subtitle'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Button Text (ID)</label>
                    <input 
                        type="text" 
                        name="cta_button_text" 
                        value="{{ old('cta_button_text', $settings['cta_button_text'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
            </div>

            <!-- EN CTA -->
            <div x-show="ctaLang === 'en'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Pill Badge (EN)</label>
                    <input 
                        type="text" 
                        name="cta_badge_en" 
                        value="{{ old('cta_badge_en', $settings['cta_badge_en'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Heading (EN)</label>
                    <input 
                        type="text" 
                        name="cta_title_en" 
                        value="{{ old('cta_title_en', $settings['cta_title_en'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Subtitle (EN)</label>
                    <textarea 
                        name="cta_subtitle_en" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('cta_subtitle_en', $settings['cta_subtitle_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Button Text (EN)</label>
                    <input 
                        type="text" 
                        name="cta_button_text_en" 
                        value="{{ old('cta_button_text_en', $settings['cta_button_text_en'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- DE CTA -->
            <div x-show="ctaLang === 'de'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Pill Badge (DE)</label>
                    <input 
                        type="text" 
                        name="cta_badge_de" 
                        value="{{ old('cta_badge_de', $settings['cta_badge_de'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Heading (DE)</label>
                    <input 
                        type="text" 
                        name="cta_title_de" 
                        value="{{ old('cta_title_de', $settings['cta_title_de'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Subtitle (DE)</label>
                    <textarea 
                        name="cta_subtitle_de" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('cta_subtitle_de', $settings['cta_subtitle_de'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Button Text (DE)</label>
                    <input 
                        type="text" 
                        name="cta_button_text_de" 
                        value="{{ old('cta_button_text_de', $settings['cta_button_text_de'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- Shared CTA URL & Background -->
            <div class="pt-6 border-t border-slate-100 space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Button Target URL</label>
                    <input 
                        type="text" 
                        name="cta_button_url" 
                        value="{{ old('cta_button_url', $settings['cta_button_url'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>

                <!-- CTA Background Image Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Section Background Image</label>
                    <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center gap-4">
                        @if(!empty($settings['cta_bg_image']))
                            <div class="w-28 h-16 rounded-lg overflow-hidden bg-slate-100 border border-slate-200 shrink-0">
                                <img src="{{ $settings['cta_bg_image'] }}" alt="CTA Background" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-28 h-16 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-[10px] text-slate-400 text-center px-1 shrink-0">
                                Default: cta-bridge.jpg
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input type="file" name="cta_bg_image" accept="image/*" class="text-xs text-slate-700 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                            <p class="text-[11px] text-slate-500 mt-1">Recommended 1920x800px JPG or WebP (Max 5MB).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: Footer & Social -->
        <div x-show="currentTab === 'footer'" x-data="{ 
            footerLang: 'id',
            generateFooterPresets() {
                if (!confirm('Apakah Anda ingin mengisi otomatis rekomendasi teks Footer untuk 3 Bahasa (ID, EN, DE)?')) return;
                const presets = {
                    footer_about: 'LPK Mega Guna Talent adalah lembaga pelatihan kerja dan kursus bahasa Jerman resmi berstandar internasional CEFR dan SKKNI, mempersiapkan calon talenta andal untuk Ausbildung, karier, dan studi di Jerman.',
                    footer_copyright: '© 2026 LPK Mega Guna Talent. Hak Cipta Dilindungi Undang-Undang.',

                    footer_about_en: 'LPK Mega Guna Talent is an official vocational training and German language institution adhering to CEFR & SKKNI standards, preparing talented candidates for Ausbildung, careers, and university studies in Germany.',
                    footer_copyright_en: '© 2026 Mega Guna Talent. All Rights Reserved.',

                    footer_about_de: 'LPK Mega Guna Talent ist ein offizielles Berufsbildungs- und Sprachinstitut nach GER- und SKKNI-Standards zur Vorbereitung von Talenten auf Ausbildung, Beruf und Studium in Deutschland.',
                    footer_copyright_de: '© 2026 Mega Guna Talent. Alle Rechte vorbehalten.'
                };
                for (const [key, val] of Object.entries(presets)) {
                    const el = document.querySelector(`[name='${key}']`);
                    if (el) {
                        el.value = val;
                        el.dispatchEvent(new Event('input'));
                    }
                }
            }
        }" class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        Footer Content & Social Media Links
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">Konfigurasi ringkasan institusi, teks hak cipta 3 bahasa, dan profil media sosial resmi.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateFooterPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-slate-100 p-1 rounded-xl border border-slate-200 shrink-0">
                        <span class="text-[11px] text-slate-500 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="footerLang = 'id'" :class="footerLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="footerLang = 'en'" :class="footerLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="footerLang = 'de'" :class="footerLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID Footer -->
            <div x-show="footerLang === 'id'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">About Description (ID)</label>
                    <textarea 
                        name="footer_about" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >{{ old('footer_about', $settings['footer_about'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Copyright Text (ID)</label>
                    <input 
                        type="text" 
                        name="footer_copyright" 
                        value="{{ old('footer_copyright', $settings['footer_copyright'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                    >
                </div>
            </div>

            <!-- EN Footer -->
            <div x-show="footerLang === 'en'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">About Description (EN)</label>
                    <textarea 
                        name="footer_about_en" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('footer_about_en', $settings['footer_about_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">Copyright Text (EN)</label>
                    <input 
                        type="text" 
                        name="footer_copyright_en" 
                        value="{{ old('footer_copyright_en', $settings['footer_copyright_en'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- DE Footer -->
            <div x-show="footerLang === 'de'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">About Description (DE)</label>
                    <textarea 
                        name="footer_about_de" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('footer_about_de', $settings['footer_about_de'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">Copyright Text (DE)</label>
                    <input 
                        type="text" 
                        name="footer_copyright_de" 
                        value="{{ old('footer_copyright_de', $settings['footer_copyright_de'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- Shared Social Media Links -->
            <div class="pt-6 border-t border-slate-100">
                <h4 class="text-sm font-bold text-slate-900 mb-4">Social Media Profile Links</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">WhatsApp Direct Link</label>
                        <input 
                            type="text" 
                            name="social_whatsapp" 
                            value="{{ old('social_whatsapp', $settings['social_whatsapp'] ?? '') }}"
                            placeholder="https://wa.me/..."
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Instagram Profile</label>
                        <input 
                            type="text" 
                            name="social_instagram" 
                            value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}"
                            placeholder="https://instagram.com/..."
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Facebook Page</label>
                        <input 
                            type="text" 
                            name="social_facebook" 
                            value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}"
                            placeholder="https://facebook.com/..."
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">LinkedIn Company</label>
                        <input 
                            type="text" 
                            name="social_linkedin" 
                            value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}"
                            placeholder="https://linkedin.com/company/..."
                            class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                </div>
            </div>
        </div>
                <!-- TAB: About Us Page -->
        <div x-show="currentTab === 'about'" x-data="{ 
            aboutLang: 'id',
            generateAboutPresets() {
                if (!confirm('Apakah Anda ingin mengisi otomatis rekomendasi teks lengkap About Us untuk 3 Bahasa (ID, EN, DE)?')) return;
                const presets = {
                    "about_hero_badge": "LPK Resmi Kemnaker RI • SKKNI & Goethe-Institut Standard",
                    "about_hero_title": "Membangun Generasi Kompeten & Siap Berkarier Global di Jerman",
                    "about_hero_subtitle": "LPK Mega Guna Talent adalah Lembaga Pelatihan Kerja terakreditasi yang berdedikasi menempa talenta muda Indonesia dengan penguasaan bahasa Jerman berstandar internasional, penguatan etos kerja profesional, dan fasilitas pembelajaran modern.",
                    "about_visi": "Menjadi Lembaga Pelatihan Kerja Yang Terdepan Dalam Membangun SDM Kompeten Sesuai Dengan Standar Kompetensi Kerja Nasional dan Internasional",
                    "about_operating_hours": "Senin - Sabtu: 08:30 - 17:00 WIB",
                    "about_hero_badge_en": "Official Vocational Training Institute • SKKNI & Goethe Standard",
                    "about_hero_badge_de": "Anerkanntes Berufsbildungszentrum • Goethe-Institut Standard",
                    "about_hero_title_en": "Empowering Competent Talents for Global Careers in Germany",
                    "about_hero_title_de": "Kompetente Fachkräfte für erfolgreiche Karrieren in Deutschland",
                    "about_hero_subtitle_en": "LPK Mega Guna Talent is an accredited vocational institute committed to forging Indonesian youth through international-standard German language mastery, solid professional work ethics, and modern immersive learning environments.",
                    "about_hero_subtitle_de": "LPK Mega Guna Talent ist eine akkreditierte Ausbildungsstätte, die junge indonesische Talente gezielt auf Ausbildung, Studium und qualifizierte Berufe in Deutschland vorbereitet – mit intensivem Sprachunterricht und praxisnaher Arbeitskultur.",
                    "about_visi_en": "To be the foremost vocational training institute cultivating globally competitive human resources aligned with national and international professional standards.",
                    "about_visi_de": "Ein führendes Institut für berufliche Bildung zu sein, das hochqualifizierte Fachkräfte nach nationalen und internationalen Kompetenzstandards ausbildet.",
                    "about_operating_hours_en": "Monday - Saturday: 08:30 AM - 05:00 PM (WIB)",
                    "about_operating_hours_de": "Montag - Samstag: 08:30 - 17:00 Uhr (WIB)",
                    "about_metric_1_val": "240+",
                    "about_metric_1_val_en": "240+",
                    "about_metric_1_val_de": "240+",
                    "about_metric_1_lbl": "Kapasitas Siswa / Tahun",
                    "about_metric_1_lbl_en": "Student Capacity / Year",
                    "about_metric_1_lbl_de": "Teilnehmerkapazität / Jahr",
                    "about_metric_1_sub": "4 Batch Intensif @ 60 Siswa",
                    "about_metric_1_sub_en": "4 Intensive Batches @ 60 Students",
                    "about_metric_1_sub_de": "4 Intensivkohorten @ 60 Schüler",
                    "about_metric_2_val": "3 Ruang",
                    "about_metric_2_val_en": "3 Labs",
                    "about_metric_2_val_de": "3 Räume",
                    "about_metric_2_lbl": "Kelas Multimedia Representatif",
                    "about_metric_2_lbl_en": "Representative Multimedia Classrooms",
                    "about_metric_2_lbl_de": "Moderne Multimediaklassen",
                    "about_metric_2_sub": "AC, Smart Audio, Proyektor",
                    "about_metric_2_sub_en": "AC, Smart Audio, Interactive Projectors",
                    "about_metric_2_sub_de": "Klimatisiert, Smart-Audio, Beamer",
                    "about_metric_3_val": "100%",
                    "about_metric_3_val_en": "100%",
                    "about_metric_3_val_de": "100%",
                    "about_metric_3_lbl": "Standar SKKNI & Goethe",
                    "about_metric_3_lbl_en": "SKKNI & Goethe Standards",
                    "about_metric_3_lbl_de": "SKKNI & Goethe-Institut Standard",
                    "about_metric_3_sub": "Level A1, A2 hingga B1",
                    "about_metric_3_sub_en": "Levels A1, A2 through B1",
                    "about_metric_3_sub_de": "Stufen A1, A2 bis B1",
                    "about_metric_4_val": "Bekasi",
                    "about_metric_4_val_en": "Bekasi",
                    "about_metric_4_val_de": "Bekasi",
                    "about_metric_4_lbl": "Lokasi Villa Galaxy",
                    "about_metric_4_lbl_en": "Villa Galaxy Location",
                    "about_metric_4_lbl_de": "Standort Villa Galaxy",
                    "about_metric_4_sub": "Akses Strategis & Nyaman",
                    "about_metric_4_sub_en": "Strategic & Comfortable Access",
                    "about_metric_4_sub_de": "Zentral & Erstklassig erreichbar",
                    "about_story_badge": "Sekilas Tentang Kami",
                    "about_story_badge_en": "About Our Institution",
                    "about_story_badge_de": "Über Unser Institut",
                    "about_story_title": "Dedikasi Penuh untuk Pelatihan Kerja & Penguasaan Bahasa Asing Berkualitas",
                    "about_story_title_en": "Dedicated to High-Quality Vocational Training & German Language Mastery",
                    "about_story_title_de": "Hingabe für erstklassige Berufsausbildung & deutsche Sprachkompetenz",
                    "about_story_p1": "LPK Mega Guna Talent didirikan dengan tekad kuat untuk menjembatani generasi muda Indonesia dalam meraih kesempatan emas berkarier dan menempuh pendidikan vokasi (Ausbildung) di Republik Federal Jerman.",
                    "about_story_p1_en": "LPK Mega Guna Talent was established with a resolute mission to bridge Indonesian youth toward golden career and vocational training (Ausbildung) opportunities in the Federal Republic of Germany.",
                    "about_story_p1_de": "LPK Mega Guna Talent wurde mit der festen Vision gegründet, junge indonesische Talente mit erstklassigen Karriere- und dualen Ausbildungschancen in der Bundesrepublik Deutschland zu verbinden.",
                    "about_story_p2": "Berlokasi di kawasan prestisius Villa Galaxy, Bekasi Selatan, lembaga kami dirancang khusus dengan fasilitas gedung modern berkapasitas ratusan peserta didik. Kami memadukan pendekatan kurikulum interaktif berbasis SKKNI (Standar Kompetensi Kerja Nasional Indonesia) dan silabus sertifikasi internasional Goethe-Institut (CEFR).",
                    "about_story_p2_en": "Located in the prestigious Villa Galaxy area of South Bekasi, our facility is purposefully built with modern infrastructure accommodating hundreds of learners. We blend an interactive curriculum based on Indonesian National Work Competency Standards (SKKNI) with international Goethe-Institut (CEFR) certification syllabi.",
                    "about_story_p2_de": "Im renommierten Viertel Villa Galaxy in Süd-Bekasi gelegen, verfügt unser Institut über moderne Räumlichkeiten für hunderte Lernende. Wir vereinen praxisnahe Lehrpläne nach nationalen indonesischen Standards (SKKNI) mit internationalen Prüfungsrichtlinien des Goethe-Instituts (GER).",
                    "about_story_p3": "Bukan sekadar mengajarkan tata bahasa, kami menanamkan kedisiplinan, pemahaman lintas budaya (Interkulturelle Kompetenz), etos kerja presisi, dan simulasi kehidupan nyata di Jerman agar setiap siswa berangkat dengan kepercayaan diri penuh.",
                    "about_story_p3_en": "Beyond language mechanics, we instill strict discipline, intercultural competence, precision work ethics, and authentic living simulations in Germany so each graduate embarks with unwavering confidence.",
                    "about_story_p3_de": "Über reine Grammatik hinaus vermitteln wir Arbeitsdisziplin, interkulturelle Kompetenz, deutsche Arbeitsethik und authentische Alltagssimulationen für einen optimalen und selbstsicheren Start in Deutschland.",
                    "about_story_h1_title": "Berizin Resmi",
                    "about_story_h1_title_en": "Fully Licensed",
                    "about_story_h1_title_de": "Staatlich Zugelassen",
                    "about_story_h1_desc": "Sesuai UU Ketenagakerjaan No. 13/2003 & regulasi vokasi Kemnaker RI.",
                    "about_story_h1_desc_en": "Compliant with Labor Law No. 13/2003 & Ministry of Manpower vocational directives.",
                    "about_story_h1_desc_de": "Gemäß Arbeitsgesetz Nr. 13/2003 und Richtlinien des indonesischen Arbeitsministeriums.",
                    "about_story_h2_title": "Instruktur Bersertifikat",
                    "about_story_h2_title_en": "Certified Instructors",
                    "about_story_h2_title_de": "Zertifizierte Dozenten",
                    "about_story_h2_desc": "Mentor lulusan internasional dengan sertifikasi kompetensi resmi BNSP & Goethe.",
                    "about_story_h2_desc_en": "Internationally trained educators with certified BNSP & Goethe qualifications.",
                    "about_story_h2_desc_de": "International erfahrene Lehrkräfte mit offizieller BNSP- und Goethe-Zertifizierung.",
                    "about_campus_tag": "Gedung Kampus Utama",
                    "about_campus_tag_en": "Main Campus Facility",
                    "about_campus_tag_de": "Hauptcampus Gebäude",
                    "about_campus_title": "LPK Mega Guna Talent",
                    "about_campus_title_en": "LPK Mega Guna Talent",
                    "about_campus_title_de": "LPK Mega Guna Talent",
                    "about_campus_desc": "Jln Boulevard Raya A1 No. 16 Villa Galaxy, Jaka Setia, Bekasi Selatan.",
                    "about_campus_desc_en": "Jln Boulevard Raya A1 No. 16 Villa Galaxy, Jaka Setia, South Bekasi.",
                    "about_campus_desc_de": "Jln Boulevard Raya A1 No. 16 Villa Galaxy, Jaka Setia, Süd-Bekasi.",
                    "about_campus_env_tag": "Lingkungan Belajar",
                    "about_campus_env_tag_en": "Learning Environment",
                    "about_campus_env_tag_de": "Lernumgebung",
                    "about_campus_env_desc": "Eksklusif, kondusif, dan dilengkapi sarana multimedia mutakhir.",
                    "about_campus_env_desc_en": "Exclusive, highly conducive, and outfitted with cutting-edge multimedia.",
                    "about_campus_env_desc_de": "Exklusiv, lernfördernd und mit modernster Multimediatechnik ausgestattet.",
                    "about_mv_badge": "Arah & Fondasi Lembaga",
                    "about_mv_badge_en": "Institutional Foundation",
                    "about_mv_badge_de": "Leitbild & Fundament",
                    "about_mv_title": "Visi & Misi Strategis",
                    "about_mv_title_en": "Strategic Vision & Mission",
                    "about_mv_title_de": "Strategische Vision & Mission",
                    "about_mv_subtitle": "Komitmen teguh LPK Mega Guna Talent dalam mewujudkan standar kompetensi kerja berkualitas tinggi yang diakui di panggung global.",
                    "about_mv_subtitle_en": "LPK Mega Guna Talent's steadfast commitment to delivering high-caliber professional competencies recognized across the globe.",
                    "about_mv_subtitle_de": "Unser klares Bekenntnis zu erstklassigen Ausbildungsstandards, die international und in Deutschland höchste Anerkennung finden.",
                    "about_visi_badge": "Visi Utama Lembaga",
                    "about_visi_badge_en": "Our Primary Vision",
                    "about_visi_badge_de": "Unsere Zentrale Vision",
                    "about_visi_author": "— Ditetapkan oleh Dewan Pembina & Manajemen LPK Mega Guna Talent",
                    "about_visi_author_en": "— Established by the Advisory Board & Executive Management of LPK Mega Guna Talent",
                    "about_visi_author_de": "— Beschlossen durch das Kuratorium und die Geschäftsführung von LPK Mega Guna Talent",
                    "about_mission_title": "7 Pilar Misi & Rencana Strategis",
                    "about_mission_title_en": "7 Strategic Mission Pillars",
                    "about_mission_title_de": "7 Strategische Säulen & Leitlinien",
                    "about_mission_subtitle": "Pedoman operasional penyelenggaraan pelatihan kerja di LPK Mega Guna Talent",
                    "about_mission_subtitle_en": "Operational blueprint guiding vocational training and educational delivery at LPK Mega Guna Talent",
                    "about_mission_subtitle_de": "Operative Leitlinien für die ganzheitliche Berufsausbildung am LPK Mega Guna Talent",
                    "about_mission_1_title": "Regulasi Pelatihan PBK",
                    "about_mission_1_title_en": "Competency-Based Training (PBK)",
                    "about_mission_1_title_de": "Kompetenzbasierte Ausbildung",
                    "about_mission_1_desc": "Menyelenggarakan pelatihan kerja berbasis kompetensi (PBK) yang patuh dan selaras dengan regulasi Kementerian Ketenagakerjaan Republik Indonesia.",
                    "about_mission_1_desc_en": "Delivering competency-based vocational training strictly aligned with regulations of the Ministry of Manpower of the Republic of Indonesia.",
                    "about_mission_1_desc_de": "Durchführung kompetenzbasierter Berufsbildung in voller Übereinstimmung mit den gesetzlichen Vorgaben des indonesischen Arbeitsministeriums.",
                    "about_mission_1_tag": "Kemnaker Standard",
                    "about_mission_1_tag_en": "Kemnaker Standard",
                    "about_mission_1_tag_de": "Ministeriumstandard",
                    "about_mission_2_title": "Kurikulum Standar Industri",
                    "about_mission_2_title_en": "Industry-Standard Curriculum",
                    "about_mission_2_title_de": "Industrienaher Lehrplan",
                    "about_mission_2_desc": "Mengembangkan kurikulum berstandar industri dan silabus resmi Goethe-Institut e.V. untuk menjamin relevansi keterampilan siswa.",
                    "about_mission_2_desc_en": "Designing industry-aligned curricula and official Goethe-Institut e.V. syllabi ensuring direct market relevance.",
                    "about_mission_2_desc_de": "Entwicklung praxisnaher Lehrpläne nach offiziellen Vorgaben des Goethe-Instituts zur Gewährleistung höchster Relevanz.",
                    "about_mission_2_tag": "Goethe & CEFR Aligned",
                    "about_mission_2_tag_en": "Goethe & CEFR Aligned",
                    "about_mission_2_tag_de": "Goethe & GER Konform",
                    "about_mission_3_title": "Instruktur Bersertifikasi BNSP",
                    "about_mission_3_title_en": "BNSP-Certified Instructors",
                    "about_mission_3_title_de": "Zertifizierte Ausbilder",
                    "about_mission_3_desc": "Meningkatkan kapasitas tenaga pelatih profesional yang memiliki sertifikat kompetensi metodologi pelatihan dan bahasa Jerman tingkat tinggi.",
                    "about_mission_3_desc_en": "Empowering licensed professional educators certified in teaching methodology and advanced German fluency.",
                    "about_mission_3_desc_de": "Förderung qualifizierter Lehrkräfte mit staatlich zertifizierter Fachdidaktik und exzellenten Deutschkenntnissen.",
                    "about_mission_3_tag": "Certified Mentorship",
                    "about_mission_3_tag_en": "Certified Mentorship",
                    "about_mission_3_tag_de": "Zertifiziertes Mentoring",
                    "about_mission_4_title": "Sarana Multimedia Modern",
                    "about_mission_4_title_en": "Smart Multimedia Facilities",
                    "about_mission_4_title_de": "Moderne Medienausstattung",
                    "about_mission_4_desc": "Menyediakan sarana dan prasarana multimedia interaktif berteknologi tinggi untuk menghadirkan pengalaman belajar yang imersif dan efektif.",
                    "about_mission_4_desc_en": "Providing high-tech interactive multimedia infrastructure to deliver immersive and effective educational experiences.",
                    "about_mission_4_desc_de": "Bereitstellung moderner interaktiver Multimediatechnik für ein immersives und hocheffizientes Lernerlebnis.",
                    "about_mission_4_tag": "Smart Interactive Lab",
                    "about_mission_4_tag_en": "Smart Interactive Lab",
                    "about_mission_4_tag_de": "Interaktives Sprachlabor",
                    "about_mission_5_title": "Manajemen Mutu Terpadu",
                    "about_mission_5_title_en": "Total Quality Management",
                    "about_mission_5_title_de": "Integriertes Qualitätsmanagement",
                    "about_mission_5_desc": "Mengimplementasikan sistem manajemen penjaminan mutu dan tata kelola digital terintegrasi demi transparansi proses pembelajaran.",
                    "about_mission_5_desc_en": "Implementing comprehensive quality assurance and digital governance systems ensuring educational transparency.",
                    "about_mission_5_desc_de": "Umsetzung digitaler Qualitätssicherungssysteme für transparente und überprüfbare Bildungsprozesse.",
                    "about_mission_5_tag": "Quality Assurance",
                    "about_mission_5_tag_en": "Quality Assurance",
                    "about_mission_5_tag_de": "Qualitätssicherung",
                    "about_mission_6_title": "Kemitraan Penempatan & GNIK",
                    "about_mission_6_title_en": "Placement Partnerships & GNIK",
                    "about_mission_6_title_de": "Ausbildungspartnerschaften & GNIK",
                    "about_mission_6_desc": "Membangun kemitraan strategis penempatan kerja vokasi di Jerman (Ausbildung) serta mendukung penuh Gerakan Nasional Indonesia Kompeten.",
                    "about_mission_6_desc_en": "Forging strategic bilateral placement partnerships for vocational training in Germany while advancing national workforce competencies.",
                    "about_mission_6_desc_de": "Aufbau strategischer Kooperationen für die duale Ausbildung in Deutschland und aktive Förderung nationaler Fachkräfte.",
                    "about_mission_6_tag": "Global Career Network",
                    "about_mission_6_tag_en": "Global Career Network",
                    "about_mission_6_tag_de": "Internationales Karrierenetz",
                    "about_team_badge": "Kepemimpinan & Tenaga Pengajar",
                    "about_team_badge_en": "Leadership & Educators",
                    "about_team_badge_de": "Führung & Lehrkörper",
                    "about_team_title": "Struktur Manajemen & Mentor",
                    "about_team_title_en": "Management Structure & Mentors",
                    "about_team_title_de": "Institutsleitung & Dozententeam",
                    "about_team_subtitle": "Dipimpin oleh para profesional berwawasan global yang berdedikasi mengantarkan setiap siswa meraih masa depan cemerlang di Jerman.",
                    "about_team_subtitle_en": "Led by globally minded professionals committed to guiding every student toward a luminous future in Germany.",
                    "about_team_subtitle_de": "Geleitet von international erfahrenen Führungskräften, die jeden Teilnehmer auf seinem Erfolgsweg nach Deutschland begleiten.",
                    "about_team_1_name": "Moses Pasande",
                    "about_team_1_role": "Kepala LPK & Founder",
                    "about_team_1_role_en": "Head of Institution & Founder",
                    "about_team_1_role_de": "Institutsleiter & Gründer",
                    "about_team_1_subrole": "Founder & Head of Institution",
                    "about_team_1_subrole_en": "Founder & Head of Institution",
                    "about_team_1_subrole_de": "Gründer & Gesamtleiter",
                    "about_team_1_bio": "Pemimpin visioner dalam ekosistem pelatihan vokasi internasional. Berkomitmen menghadirkan kurikulum berstandar industri dan tata kelola pendidikan yang berorientasi pada hasil kerja nyata.",
                    "about_team_1_bio_en": "Visionary leader in international vocational ecosystems. Dedicated to delivering industry-benchmarked curricula and outcome-driven educational management.",
                    "about_team_1_bio_de": "Visionäre Führungskraft in der internationalen Berufsbildung mit starkem Fokus auf praxisorientierte Ausbildung und verlässliche Resultate.",
                    "about_team_2_name": "Ramona Novelia Wiyono",
                    "about_team_2_role": "Kabid Kurikulum & Senior Mentor",
                    "about_team_2_role_en": "Head of Curriculum & Senior Mentor",
                    "about_team_2_role_de": "Leitung Lehrplan & Senior Mentorin",
                    "about_team_2_subrole": "Head of Curriculum & Global Educator",
                    "about_team_2_subrole_en": "Head of Curriculum & Global Educator",
                    "about_team_2_subrole_de": "Curriculum Direktorin & Pädagogin",
                    "about_team_2_bio": "Alumnus Raffles Shanghai & RMIT University Melbourne (Bachelor of Design). Pemegang sertifikasi 120-Hour TESOL/TEFL dan alumnus UIBE Beijing dengan pengalaman mengajar multibahasa tingkat internasional.",
                    "about_team_2_bio_en": "Alumna of Raffles Shanghai & RMIT University Melbourne (Bachelor of Design). Certified 120-Hour TESOL/TEFL holder and UIBE Beijing alumna with global multilingual teaching experience.",
                    "about_team_2_bio_de": "Absolventin der Raffles Shanghai & RMIT University Melbourne (B.Des). Zertifizierte TESOL/TEFL-Pädagogin und UIBE Peking-Alumna mit umfassender internationaler Lehrerfahrung.",
                    "about_team_3_name": "Muhammad Rafa Affansyah Purba",
                    "about_team_3_role": "Instruktur Bahasa Jerman",
                    "about_team_3_role_en": "German Language Instructor",
                    "about_team_3_role_de": "Dozent für Deutsch als Fremdsprache",
                    "about_team_3_subrole": "Goethe Deutsch B1 & SKKNI Level 4 Certified",
                    "about_team_3_subrole_en": "Goethe Deutsch B1 & SKKNI Level 4 Certified",
                    "about_team_3_subrole_de": "Goethe-Zertifikat B1 & SKKNI Level 4 lizenziert",
                    "about_team_3_bio": "Instruktur berlisensi BNSP SKKNI Level 4 dan pemegang Goethe-Zertifikat Deutsch B1. Menguasai pedagogi komunikatif aktif untuk mempersiapkan kelulusan ujian resmi bahasa Jerman.",
                    "about_team_3_bio_en": "Licensed BNSP SKKNI Level 4 instructor and Goethe B1 credential holder, specializing in active communicative pedagogy for Goethe certification success.",
                    "about_team_3_bio_de": "Zertifizierter Fachausbilder (BNSP Stufe 4) mit Goethe-Zertifikat B1, spezialisiert auf handlungsorientierten und kommunikativen Deutschunterricht.",
                    "about_team_4_name": "Henny",
                    "about_team_4_role": "Kabid Penjaminan Mutu & Sertifikasi",
                    "about_team_4_role_en": "Head of Quality Assurance & Certification",
                    "about_team_4_role_de": "Leitung Qualitätssicherung & Zertifizierung",
                    "about_team_4_bio": "Mengawal standarisasi mutu pembelajaran, audit kurikulum berkala, dan verifikasi sertifikasi kompetensi seluruh lulusan.",
                    "about_team_4_bio_en": "Overseeing educational quality standards, regular curriculum audits, and competency certification verification for all trainees.",
                    "about_team_4_bio_de": "Verantwortlich für Qualitätsstandards, regelmäßige Lehrplanaudits und die Validierung aller Abschlusszertifikate.",
                    "about_team_5_name": "Septarina Adinda Privari, S.H",
                    "about_team_5_role": "Kabid Administrasi & Keuangan",
                    "about_team_5_role_en": "Head of Legal, Administration & Finance",
                    "about_team_5_role_de": "Leitung Verwaltung, Recht & Finanzen",
                    "about_team_5_bio": "Mengelola tata kelola hukum, legalitas dokumen kesiswaan, administrasi lembaga, dan transparansi keuangan operasional.",
                    "about_team_5_bio_en": "Managing legal compliance, student documentation, institutional governance, and operational financial transparency.",
                    "about_team_5_bio_de": "Zuständig für rechtliche Compliance, Teilnehmerdokumentation, Institutsverwaltung und transparente Finanzführung.",
                    "about_fac_badge": "Fasilitas Representatif",
                    "about_fac_badge_en": "Representative Facilities",
                    "about_fac_badge_de": "Moderne Ausstattung",
                    "about_fac_title": "Sarana & Prasarana Pembelajaran",
                    "about_fac_title_en": "Campus Facilities & Learning Spaces",
                    "about_fac_title_de": "Campusausstattung & Lernumgebung",
                    "about_fac_subtitle": "Setiap ruang belajar, ruang rapat, dan laboratorium dirancang ergonomis demi kenyamanan maksimal peserta didik selama proses intensif.",
                    "about_fac_subtitle_en": "Classrooms, conference suites, and resource labs ergonomically designed for maximum trainee comfort during rigorous intensive studies.",
                    "about_fac_subtitle_de": "Ergonomisch gestaltete Unterrichts-, Konferenz- und Medienräume für höchste Konzentration und maximalen Lernerfolg.",
                    "about_fac_1_badge": "Gedung Kampus",
                    "about_fac_1_badge_en": "Campus Building",
                    "about_fac_1_badge_de": "Campusgebäude",
                    "about_fac_1_title": "Tampak Depan Gedung",
                    "about_fac_1_title_en": "Main Campus Exterior",
                    "about_fac_1_title_de": "Außenansicht des Campus",
                    "about_fac_1_desc": "Kawasan Villa Galaxy Blok A1 No. 16, Bekasi Selatan.",
                    "about_fac_1_desc_en": "Villa Galaxy Block A1 No. 16, South Bekasi.",
                    "about_fac_1_desc_de": "Villa Galaxy Block A1 Nr. 16, Süd-Bekasi.",
                    "about_fac_1_modal": "Tampak depan gedung operasional di Villa Galaxy Bekasi Selatan dengan akses mudah dan lokasi prestisius.",
                    "about_fac_1_modal_en": "Front view of the operational campus in Villa Galaxy South Bekasi with seamless accessibility and prestigious surroundings.",
                    "about_fac_1_modal_de": "Vorderansicht des Campusgebäudes in Villa Galaxy Süd-Bekasi mit erstklassiger Verkehrsanbindung.",
                    "about_fac_2_badge": "Pelayanan Siswa",
                    "about_fac_2_badge_en": "Student Services",
                    "about_fac_2_badge_de": "Studierendenservice",
                    "about_fac_2_title": "Front Office & Konsultasi",
                    "about_fac_2_title_en": "Front Office & Advisory",
                    "about_fac_2_title_de": "Empfang & Beratung",
                    "about_fac_2_desc": "Pusat informasi penerimaan dan pendampingan registrasi.",
                    "about_fac_2_desc_en": "Admissions hub and personal registration counseling.",
                    "about_fac_2_desc_de": "Zentrale Anlaufstelle für Information und Anmeldung.",
                    "about_fac_2_modal": "Area resepsionis dan konsultasi terpadu bagi calon siswa dan orang tua untuk informasi program secara detail.",
                    "about_fac_2_modal_en": "Comprehensive advisory reception for prospective trainees and parents seeking detailed pathway consultations.",
                    "about_fac_2_modal_de": "Integrierter Beratungs- und Empfangsbereich für Studieninteressierte und Eltern.",
                    "about_fac_3_badge": "Kelas Teori 30 m²",
                    "about_fac_3_badge_en": "Theory Lab 30 m²",
                    "about_fac_3_badge_de": "Theorieraum 30 m²",
                    "about_fac_3_title": "Ruang Kelas Teori A",
                    "about_fac_3_title_en": "Lecture Classroom A",
                    "about_fac_3_title_de": "Unterrichtsraum A",
                    "about_fac_3_desc": "Dilengkapi proyektor interaktif dan audio jernih untuk Hören.",
                    "about_fac_3_desc_en": "Equipped with interactive projection and studio audio for listening drills.",
                    "about_fac_3_desc_de": "Ausgestattet mit Beamer und klangreinem Audiosystem für Hören-Übungen.",
                    "about_fac_3_modal": "Kapasitas 20 peserta didik per kelas dengan perangkat multimedia, pendingin ruangan (AC), dan pencahayaan optimal.",
                    "about_fac_3_modal_en": "Capped at 20 trainees per room with climate control and optimal daylight illumination.",
                    "about_fac_3_modal_de": "Kapazität für 20 Teilnehmende mit moderner Klimatisierung und ergonomischer Beleuchtung.",
                    "about_fac_4_badge": "Kelas Interaktif",
                    "about_fac_4_badge_en": "Interactive Lab",
                    "about_fac_4_badge_de": "Interaktiver Raum",
                    "about_fac_4_title": "Ruang Kelas Teori B",
                    "about_fac_4_title_en": "Interactive Classroom B",
                    "about_fac_4_title_de": "Unterrichtsraum B",
                    "about_fac_4_desc": "Suasana belajar kondusif dengan jumlah siswa terbatas.",
                    "about_fac_4_desc_en": "Conducive learning atmosphere with small cohort sizes.",
                    "about_fac_4_desc_de": "Konzentrierte Lernatmosphäre mit begrenzter Gruppengröße.",
                    "about_fac_4_modal": "Penataan meja dan kursi ergonomis untuk memfasilitasi diskusi interaktif dan praktik Sprechen bahasa Jerman.",
                    "about_fac_4_modal_en": "Ergonomic seating arrangements facilitating dynamic dialogue workshops and spoken German simulation.",
                    "about_fac_4_modal_de": "Ergonomische Möblierung für dialogorientierte Sprechübungen und interaktive Gruppenarbeit.",
                    "about_fac_5_badge": "Manajemen",
                    "about_fac_5_badge_en": "Administration",
                    "about_fac_5_badge_de": "Verwaltung",
                    "about_fac_5_title": "Ruang Rapat & Diskusi",
                    "about_fac_5_title_en": "Conference & Faculty Room",
                    "about_fac_5_title_de": "Konferenz- & Besprechungsraum",
                    "about_fac_5_desc": "Pusat perencanaan strategis dan penjaminan mutu lembaga.",
                    "about_fac_5_desc_en": "Center for academic strategic planning and quality assurance.",
                    "about_fac_5_desc_de": "Zentrum für strategische Lehrplanung und Qualitätssicherung.",
                    "about_fac_5_modal": "Tempat koordinasi berkala pimpinan dan instruktur untuk evaluasi mutu dan kemajuan capaian belajar siswa.",
                    "about_fac_5_modal_en": "Regular coordination hub for academic leadership and instructors tracking trainee progress milestones.",
                    "about_fac_5_modal_de": "Regelmäßiger Koordinationsort für Dozierende zur kontinuierlichen Leistungsbewertung.",
                    "about_fac_6_badge": "Kepala LPK",
                    "about_fac_6_badge_en": "Director Office",
                    "about_fac_6_badge_de": "Direktion",
                    "about_fac_6_title": "Ruang Pimpinan LPK",
                    "about_fac_6_title_en": "Director Executive Suite",
                    "about_fac_6_title_de": "Büro der Institutsleitung",
                    "about_fac_6_desc": "Supervisi kebijakan mutu dan kerja sama bilateral.",
                    "about_fac_6_desc_en": "Overseeing institutional policy and bilateral agreements.",
                    "about_fac_6_desc_de": "Koordination von Qualitätsrichtlinien und bilateralen Partnerschaften.",
                    "about_fac_6_modal": "Ruang kerja pimpinan untuk supervisi menyeluruh operasional dan penerimaan tamu mitra kelembagaan.",
                    "about_fac_6_modal_en": "Executive directorate dedicated to comprehensive operations supervision and welcoming institutional partners.",
                    "about_fac_6_modal_de": "Leitungsbüro für operative Gesamtaufsicht und Empfang internationaler Kooperationspartner.",
                    "about_table_title": "Ringkasan Kapasitas & Sarana Prasarana",
                    "about_table_title_en": "Summary of Campus Capacity & Facilities",
                    "about_table_title_de": "Übersicht über Raumkapazitäten & Ausstattung",
                    "about_legal_badge": "Legalitas & Kepatuhan",
                    "about_legal_badge_en": "Legal Compliance & Accreditations",
                    "about_legal_badge_de": "Rechtliche Grundlagen & Zulassung",
                    "about_legal_title": "Landasan Hukum Penyelenggaraan",
                    "about_legal_title_en": "Statutory & Legal Framework",
                    "about_legal_title_de": "Gesetzliche Durchführungsgrundlagen",
                    "about_legal_subtitle": "Penyelenggaraan pelatihan kerja di LPK Mega Guna Talent beroperasi dengan izin resmi dan tunduk sepenuhnya pada peraturan perundang-undangan Republik Indonesia.",
                    "about_legal_subtitle_en": "Vocational education at LPK Mega Guna Talent operates under official governmental licensing and fully complies with laws of the Republic of Indonesia.",
                    "about_legal_subtitle_de": "Die Ausbildung am LPK Mega Guna Talent erfolgt unter offizieller staatlicher Lizenz und in voller Übereinstimmung mit den Gesetzen der Republik Indonesien.",
                    "about_cta_badge": "Kunjungan Kampus & Pendaftaran",
                    "about_cta_badge_en": "Campus Visit & Enrollment",
                    "about_cta_badge_de": "Campusbesuch & Anmeldung",
                    "about_cta_title": "Siap Melangkah Menuju Masa Depan di Jerman?",
                    "about_cta_title_en": "Ready to Step Towards Your Future in Germany?",
                    "about_cta_title_de": "Bereit für Ihre berufliche Zukunft in Deutschland?",
                    "about_cta_subtitle": "Kunjungi kampus LPK Mega Guna Talent di Villa Galaxy Bekasi untuk berkonsultasi langsung dengan tim akademik kami, atau daftar kelas intensif batch berikutnya hari ini.",
                    "about_cta_subtitle_en": "Visit LPK Mega Guna Talent campus in Villa Galaxy Bekasi for in-person academic counseling, or enroll in our upcoming intensive cohort today.",
                    "about_cta_subtitle_de": "Besuchen Sie den Campus des LPK Mega Guna Talent in Villa Galaxy Bekasi zur persönlichen Beratung oder sichern Sie sich Ihren Platz im nächsten Intensivkurs.",
                    "about_cta_btn_enroll": "Daftar Sekarang",
                    "about_cta_btn_enroll_en": "Enroll Now",
                    "about_cta_btn_enroll_de": "Jetzt Anmelden",
                    "about_cta_btn_wa": "Konsultasi via WhatsApp",
                    "about_cta_btn_wa_en": "Consult via WhatsApp",
                    "about_cta_btn_wa_de": "Beratung per WhatsApp"
};
                for (const [key, val] of Object.entries(presets)) {
                    const el = document.querySelector(`[name='${key}']`);
                    if (el) {
                        el.value = val;
                        el.dispatchEvent(new Event('input'));
                    }
                }
            }
        }" class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-slate-100 pb-4">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        About Us Page Content & Institutional Information
                    </h3>
                    <p class="text-xs text-slate-500 mt-1">Kelola narasi institusional, metric counters, 7 pilar misi, profil pimpinan & mentor, serta fasilitas kampus dalam 3 bahasa (Indonesia, English, Deutsch).</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateAboutPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-slate-100 p-1 rounded-xl border border-slate-200 shrink-0">
                        <span class="text-[11px] text-slate-500 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="aboutLang = 'id'" :class="aboutLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="aboutLang = 'en'" :class="aboutLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="aboutLang = 'de'" :class="aboutLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-600 hover:text-slate-900 font-medium'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- Indonesia (ID) About Inputs -->
            <div x-show="aboutLang === 'id'" class="space-y-6">
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Hero Headline, Deskripsi & Metric Counters (Indonesia)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Badge Text (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_hero_badge" 
                                value="{{ old('about_hero_badge', $settings['about_hero_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Main Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_hero_title" 
                                value="{{ old('about_hero_title', $settings['about_hero_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Subtitle / Description (Indonesia)</label>
                            <textarea 
                                name="about_hero_subtitle" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_hero_subtitle', $settings['about_hero_subtitle'] ?? '') }}</textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Value (e.g. 240+) (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_val" 
                                    value="{{ old('about_metric_1_val', $settings['about_metric_1_val'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Label (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_lbl" 
                                    value="{{ old('about_metric_1_lbl', $settings['about_metric_1_lbl'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Subtitle (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_sub" 
                                    value="{{ old('about_metric_1_sub', $settings['about_metric_1_sub'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Value (e.g. 3 Ruang) (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_val" 
                                    value="{{ old('about_metric_2_val', $settings['about_metric_2_val'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Label (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_lbl" 
                                    value="{{ old('about_metric_2_lbl', $settings['about_metric_2_lbl'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Subtitle (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_sub" 
                                    value="{{ old('about_metric_2_sub', $settings['about_metric_2_sub'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Value (e.g. 100%) (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_val" 
                                    value="{{ old('about_metric_3_val', $settings['about_metric_3_val'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Label (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_lbl" 
                                    value="{{ old('about_metric_3_lbl', $settings['about_metric_3_lbl'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Subtitle (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_sub" 
                                    value="{{ old('about_metric_3_sub', $settings['about_metric_3_sub'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Value (e.g. Bekasi) (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_val" 
                                    value="{{ old('about_metric_4_val', $settings['about_metric_4_val'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Label (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_lbl" 
                                    value="{{ old('about_metric_4_lbl', $settings['about_metric_4_lbl'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Subtitle (Indonesia)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_sub" 
                                    value="{{ old('about_metric_4_sub', $settings['about_metric_4_sub'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Sekilas Tentang Kami (Story, Highlights & Campus) (Indonesia)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Story Pill Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_story_badge" 
                                value="{{ old('about_story_badge', $settings['about_story_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Story Main Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_story_title" 
                                value="{{ old('about_story_title', $settings['about_story_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 1 (Dedikasi & Peluang Ausbildung) (Indonesia)</label>
                            <textarea 
                                name="about_story_p1" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p1', $settings['about_story_p1'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 2 (Lokasi Villa Galaxy & Kurikulum SKKNI/Goethe) (Indonesia)</label>
                            <textarea 
                                name="about_story_p2" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p2', $settings['about_story_p2'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 3 (Interkulturelle Kompetenz & Simulasi) (Indonesia)</label>
                            <textarea 
                                name="about_story_p3" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p3', $settings['about_story_p3'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 1 Title (Berizin Resmi) (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_story_h1_title" 
                                value="{{ old('about_story_h1_title', $settings['about_story_h1_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 1 Description (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_story_h1_desc" 
                                value="{{ old('about_story_h1_desc', $settings['about_story_h1_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 2 Title (Instruktur Bersertifikat) (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_story_h2_title" 
                                value="{{ old('about_story_h2_title', $settings['about_story_h2_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 2 Description (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_story_h2_desc" 
                                value="{{ old('about_story_h2_desc', $settings['about_story_h2_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Tag (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_campus_tag" 
                                value="{{ old('about_campus_tag', $settings['about_campus_tag'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_campus_title" 
                                value="{{ old('about_campus_title', $settings['about_campus_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Address / Subtitle (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_campus_desc" 
                                value="{{ old('about_campus_desc', $settings['about_campus_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Floating Badge Tag (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_campus_env_tag" 
                                value="{{ old('about_campus_env_tag', $settings['about_campus_env_tag'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Floating Badge Description (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_campus_env_desc" 
                                value="{{ old('about_campus_env_desc', $settings['about_campus_env_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Visi & Misi Strategis + 7 Pilar Misi (Indonesia)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Arah & Fondasi) (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mv_badge" 
                                value="{{ old('about_mv_badge', $settings['about_mv_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Visi & Misi Strategis) (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mv_title" 
                                value="{{ old('about_mv_title', $settings['about_mv_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (Indonesia)</label>
                            <textarea 
                                name="about_mv_subtitle" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mv_subtitle', $settings['about_mv_subtitle'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Visi Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_visi_badge" 
                                value="{{ old('about_visi_badge', $settings['about_visi_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Kalimat Visi Utama Lembaga (Indonesia)</label>
                            <textarea 
                                name="about_visi" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_visi', $settings['about_visi'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Visi Sign-off / Penetapan (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_visi_author" 
                                value="{{ old('about_visi_author', $settings['about_visi_author'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Judul Pilar Misi (7 Pilar Misi...) (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_title" 
                                value="{{ old('about_mission_title', $settings['about_mission_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Sub-judul Pilar Misi (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_subtitle" 
                                value="{{ old('about_mission_subtitle', $settings['about_mission_subtitle'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_1_title" 
                                value="{{ old('about_mission_1_title', $settings['about_mission_1_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Description (Indonesia)</label>
                            <textarea 
                                name="about_mission_1_desc" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_1_desc', $settings['about_mission_1_desc'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Tag / Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_1_tag" 
                                value="{{ old('about_mission_1_tag', $settings['about_mission_1_tag'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_2_title" 
                                value="{{ old('about_mission_2_title', $settings['about_mission_2_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Description (Indonesia)</label>
                            <textarea 
                                name="about_mission_2_desc" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_2_desc', $settings['about_mission_2_desc'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Tag / Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_2_tag" 
                                value="{{ old('about_mission_2_tag', $settings['about_mission_2_tag'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_3_title" 
                                value="{{ old('about_mission_3_title', $settings['about_mission_3_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Description (Indonesia)</label>
                            <textarea 
                                name="about_mission_3_desc" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_3_desc', $settings['about_mission_3_desc'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Tag / Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_3_tag" 
                                value="{{ old('about_mission_3_tag', $settings['about_mission_3_tag'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_4_title" 
                                value="{{ old('about_mission_4_title', $settings['about_mission_4_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Description (Indonesia)</label>
                            <textarea 
                                name="about_mission_4_desc" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_4_desc', $settings['about_mission_4_desc'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Tag / Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_4_tag" 
                                value="{{ old('about_mission_4_tag', $settings['about_mission_4_tag'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_5_title" 
                                value="{{ old('about_mission_5_title', $settings['about_mission_5_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Description (Indonesia)</label>
                            <textarea 
                                name="about_mission_5_desc" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_5_desc', $settings['about_mission_5_desc'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Tag / Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_5_tag" 
                                value="{{ old('about_mission_5_tag', $settings['about_mission_5_tag'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_6_title" 
                                value="{{ old('about_mission_6_title', $settings['about_mission_6_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Description (Indonesia)</label>
                            <textarea 
                                name="about_mission_6_desc" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_6_desc', $settings['about_mission_6_desc'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Tag / Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_mission_6_tag" 
                                value="{{ old('about_mission_6_tag', $settings['about_mission_6_tag'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Struktur Manajemen, Pimpinan & Mentor (Indonesia)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_badge" 
                                value="{{ old('about_team_badge', $settings['about_team_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_title" 
                                value="{{ old('about_team_title', $settings['about_team_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (Indonesia)</label>
                            <textarea 
                                name="about_team_subtitle" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_subtitle', $settings['about_team_subtitle'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Nama (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_1_name" 
                                value="{{ old('about_team_1_name', $settings['about_team_1_name'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Role Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_1_role" 
                                value="{{ old('about_team_1_role', $settings['about_team_1_role'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Sub-role (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_1_subrole" 
                                value="{{ old('about_team_1_subrole', $settings['about_team_1_subrole'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Biografi (Indonesia)</label>
                            <textarea 
                                name="about_team_1_bio" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_1_bio', $settings['about_team_1_bio'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Nama (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_2_name" 
                                value="{{ old('about_team_2_name', $settings['about_team_2_name'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Role Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_2_role" 
                                value="{{ old('about_team_2_role', $settings['about_team_2_role'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Sub-role (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_2_subrole" 
                                value="{{ old('about_team_2_subrole', $settings['about_team_2_subrole'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Biografi (Indonesia)</label>
                            <textarea 
                                name="about_team_2_bio" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_2_bio', $settings['about_team_2_bio'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Nama (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_3_name" 
                                value="{{ old('about_team_3_name', $settings['about_team_3_name'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Role Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_3_role" 
                                value="{{ old('about_team_3_role', $settings['about_team_3_role'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Sub-role (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_3_subrole" 
                                value="{{ old('about_team_3_subrole', $settings['about_team_3_subrole'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Biografi (Indonesia)</label>
                            <textarea 
                                name="about_team_3_bio" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_3_bio', $settings['about_team_3_bio'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 4 Nama (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_4_name" 
                                value="{{ old('about_team_4_name', $settings['about_team_4_name'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 4 Role (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_4_role" 
                                value="{{ old('about_team_4_role', $settings['about_team_4_role'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 4 Deskripsi Tugas (Indonesia)</label>
                            <textarea 
                                name="about_team_4_bio" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_4_bio', $settings['about_team_4_bio'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 5 Nama (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_5_name" 
                                value="{{ old('about_team_5_name', $settings['about_team_5_name'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 5 Role (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_team_5_role" 
                                value="{{ old('about_team_5_role', $settings['about_team_5_role'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 5 Deskripsi Tugas (Indonesia)</label>
                            <textarea 
                                name="about_team_5_bio" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_5_bio', $settings['about_team_5_bio'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Sarana & Prasarana (Fasilitas Kampus) (Indonesia)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_badge" 
                                value="{{ old('about_fac_badge', $settings['about_fac_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_title" 
                                value="{{ old('about_fac_title', $settings['about_fac_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (Indonesia)</label>
                            <textarea 
                                name="about_fac_subtitle" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_subtitle', $settings['about_fac_subtitle'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_badge" 
                                value="{{ old('about_fac_1_badge', $settings['about_fac_1_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Judul (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_title" 
                                value="{{ old('about_fac_1_title', $settings['about_fac_1_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Lokasi/Ket (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_desc" 
                                value="{{ old('about_fac_1_desc', $settings['about_fac_1_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Deskripsi Detail Modal (Indonesia)</label>
                            <textarea 
                                name="about_fac_1_modal" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_1_modal', $settings['about_fac_1_modal'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_badge" 
                                value="{{ old('about_fac_2_badge', $settings['about_fac_2_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Judul (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_title" 
                                value="{{ old('about_fac_2_title', $settings['about_fac_2_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Lokasi/Ket (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_desc" 
                                value="{{ old('about_fac_2_desc', $settings['about_fac_2_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Deskripsi Detail Modal (Indonesia)</label>
                            <textarea 
                                name="about_fac_2_modal" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_2_modal', $settings['about_fac_2_modal'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_badge" 
                                value="{{ old('about_fac_3_badge', $settings['about_fac_3_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Judul (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_title" 
                                value="{{ old('about_fac_3_title', $settings['about_fac_3_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Lokasi/Ket (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_desc" 
                                value="{{ old('about_fac_3_desc', $settings['about_fac_3_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Deskripsi Detail Modal (Indonesia)</label>
                            <textarea 
                                name="about_fac_3_modal" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_3_modal', $settings['about_fac_3_modal'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_badge" 
                                value="{{ old('about_fac_4_badge', $settings['about_fac_4_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Judul (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_title" 
                                value="{{ old('about_fac_4_title', $settings['about_fac_4_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Lokasi/Ket (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_desc" 
                                value="{{ old('about_fac_4_desc', $settings['about_fac_4_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Deskripsi Detail Modal (Indonesia)</label>
                            <textarea 
                                name="about_fac_4_modal" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_4_modal', $settings['about_fac_4_modal'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_badge" 
                                value="{{ old('about_fac_5_badge', $settings['about_fac_5_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Judul (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_title" 
                                value="{{ old('about_fac_5_title', $settings['about_fac_5_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Lokasi/Ket (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_desc" 
                                value="{{ old('about_fac_5_desc', $settings['about_fac_5_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Deskripsi Detail Modal (Indonesia)</label>
                            <textarea 
                                name="about_fac_5_modal" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_5_modal', $settings['about_fac_5_modal'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_badge" 
                                value="{{ old('about_fac_6_badge', $settings['about_fac_6_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Judul (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_title" 
                                value="{{ old('about_fac_6_title', $settings['about_fac_6_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Lokasi/Ket (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_desc" 
                                value="{{ old('about_fac_6_desc', $settings['about_fac_6_desc'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Deskripsi Detail Modal (Indonesia)</label>
                            <textarea 
                                name="about_fac_6_modal" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_6_modal', $settings['about_fac_6_modal'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Judul Tabel Spesifikasi Ruangan (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_table_title" 
                                value="{{ old('about_table_title', $settings['about_table_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Landasan Hukum & Legalitas Penyelenggaraan (Indonesia)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_legal_badge" 
                                value="{{ old('about_legal_badge', $settings['about_legal_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_legal_title" 
                                value="{{ old('about_legal_title', $settings['about_legal_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (Indonesia)</label>
                            <textarea 
                                name="about_legal_subtitle" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_legal_subtitle', $settings['about_legal_subtitle'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Kunjungan Kampus, Jam Operasional & CTA (Indonesia)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Badge (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_cta_badge" 
                                value="{{ old('about_cta_badge', $settings['about_cta_badge'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Main Title (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_cta_title" 
                                value="{{ old('about_cta_title', $settings['about_cta_title'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Subtitle / Ajakan (Indonesia)</label>
                            <textarea 
                                name="about_cta_subtitle" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_cta_subtitle', $settings['about_cta_subtitle'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Jam Operasional Kampus (Indonesia)</label>
                            <textarea 
                                name="about_operating_hours" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_operating_hours', $settings['about_operating_hours'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Label Tombol Daftar (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_cta_btn_enroll" 
                                value="{{ old('about_cta_btn_enroll', $settings['about_cta_btn_enroll'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Label Tombol WhatsApp (Indonesia)</label>
                            <input 
                                type="text" 
                                name="about_cta_btn_wa" 
                                value="{{ old('about_cta_btn_wa', $settings['about_cta_btn_wa'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- English (EN) About Inputs -->
            <div x-show="aboutLang === 'en'" class="space-y-6">
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Hero Headline, Deskripsi & Metric Counters (English)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Badge Text (English)</label>
                            <input 
                                type="text" 
                                name="about_hero_badge_en" 
                                value="{{ old('about_hero_badge_en', $settings['about_hero_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Main Title (English)</label>
                            <input 
                                type="text" 
                                name="about_hero_title_en" 
                                value="{{ old('about_hero_title_en', $settings['about_hero_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Subtitle / Description (English)</label>
                            <textarea 
                                name="about_hero_subtitle_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_hero_subtitle_en', $settings['about_hero_subtitle_en'] ?? '') }}</textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Value (e.g. 240+) (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_val_en" 
                                    value="{{ old('about_metric_1_val_en', $settings['about_metric_1_val_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Label (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_lbl_en" 
                                    value="{{ old('about_metric_1_lbl_en', $settings['about_metric_1_lbl_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Subtitle (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_sub_en" 
                                    value="{{ old('about_metric_1_sub_en', $settings['about_metric_1_sub_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Value (e.g. 3 Ruang) (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_val_en" 
                                    value="{{ old('about_metric_2_val_en', $settings['about_metric_2_val_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Label (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_lbl_en" 
                                    value="{{ old('about_metric_2_lbl_en', $settings['about_metric_2_lbl_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Subtitle (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_sub_en" 
                                    value="{{ old('about_metric_2_sub_en', $settings['about_metric_2_sub_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Value (e.g. 100%) (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_val_en" 
                                    value="{{ old('about_metric_3_val_en', $settings['about_metric_3_val_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Label (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_lbl_en" 
                                    value="{{ old('about_metric_3_lbl_en', $settings['about_metric_3_lbl_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Subtitle (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_sub_en" 
                                    value="{{ old('about_metric_3_sub_en', $settings['about_metric_3_sub_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Value (e.g. Bekasi) (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_val_en" 
                                    value="{{ old('about_metric_4_val_en', $settings['about_metric_4_val_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Label (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_lbl_en" 
                                    value="{{ old('about_metric_4_lbl_en', $settings['about_metric_4_lbl_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Subtitle (English)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_sub_en" 
                                    value="{{ old('about_metric_4_sub_en', $settings['about_metric_4_sub_en'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Sekilas Tentang Kami (Story, Highlights & Campus) (English)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Story Pill Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_story_badge_en" 
                                value="{{ old('about_story_badge_en', $settings['about_story_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Story Main Title (English)</label>
                            <input 
                                type="text" 
                                name="about_story_title_en" 
                                value="{{ old('about_story_title_en', $settings['about_story_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 1 (Dedikasi & Peluang Ausbildung) (English)</label>
                            <textarea 
                                name="about_story_p1_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p1_en', $settings['about_story_p1_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 2 (Lokasi Villa Galaxy & Kurikulum SKKNI/Goethe) (English)</label>
                            <textarea 
                                name="about_story_p2_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p2_en', $settings['about_story_p2_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 3 (Interkulturelle Kompetenz & Simulasi) (English)</label>
                            <textarea 
                                name="about_story_p3_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p3_en', $settings['about_story_p3_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 1 Title (Berizin Resmi) (English)</label>
                            <input 
                                type="text" 
                                name="about_story_h1_title_en" 
                                value="{{ old('about_story_h1_title_en', $settings['about_story_h1_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 1 Description (English)</label>
                            <input 
                                type="text" 
                                name="about_story_h1_desc_en" 
                                value="{{ old('about_story_h1_desc_en', $settings['about_story_h1_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 2 Title (Instruktur Bersertifikat) (English)</label>
                            <input 
                                type="text" 
                                name="about_story_h2_title_en" 
                                value="{{ old('about_story_h2_title_en', $settings['about_story_h2_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 2 Description (English)</label>
                            <input 
                                type="text" 
                                name="about_story_h2_desc_en" 
                                value="{{ old('about_story_h2_desc_en', $settings['about_story_h2_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Tag (English)</label>
                            <input 
                                type="text" 
                                name="about_campus_tag_en" 
                                value="{{ old('about_campus_tag_en', $settings['about_campus_tag_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Title (English)</label>
                            <input 
                                type="text" 
                                name="about_campus_title_en" 
                                value="{{ old('about_campus_title_en', $settings['about_campus_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Address / Subtitle (English)</label>
                            <input 
                                type="text" 
                                name="about_campus_desc_en" 
                                value="{{ old('about_campus_desc_en', $settings['about_campus_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Floating Badge Tag (English)</label>
                            <input 
                                type="text" 
                                name="about_campus_env_tag_en" 
                                value="{{ old('about_campus_env_tag_en', $settings['about_campus_env_tag_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Floating Badge Description (English)</label>
                            <input 
                                type="text" 
                                name="about_campus_env_desc_en" 
                                value="{{ old('about_campus_env_desc_en', $settings['about_campus_env_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Visi & Misi Strategis + 7 Pilar Misi (English)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Arah & Fondasi) (English)</label>
                            <input 
                                type="text" 
                                name="about_mv_badge_en" 
                                value="{{ old('about_mv_badge_en', $settings['about_mv_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Visi & Misi Strategis) (English)</label>
                            <input 
                                type="text" 
                                name="about_mv_title_en" 
                                value="{{ old('about_mv_title_en', $settings['about_mv_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (English)</label>
                            <textarea 
                                name="about_mv_subtitle_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mv_subtitle_en', $settings['about_mv_subtitle_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Visi Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_visi_badge_en" 
                                value="{{ old('about_visi_badge_en', $settings['about_visi_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Kalimat Visi Utama Lembaga (English)</label>
                            <textarea 
                                name="about_visi_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_visi_en', $settings['about_visi_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Visi Sign-off / Penetapan (English)</label>
                            <input 
                                type="text" 
                                name="about_visi_author_en" 
                                value="{{ old('about_visi_author_en', $settings['about_visi_author_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Judul Pilar Misi (7 Pilar Misi...) (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_title_en" 
                                value="{{ old('about_mission_title_en', $settings['about_mission_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Sub-judul Pilar Misi (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_subtitle_en" 
                                value="{{ old('about_mission_subtitle_en', $settings['about_mission_subtitle_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Title (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_1_title_en" 
                                value="{{ old('about_mission_1_title_en', $settings['about_mission_1_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Description (English)</label>
                            <textarea 
                                name="about_mission_1_desc_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_1_desc_en', $settings['about_mission_1_desc_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Tag / Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_1_tag_en" 
                                value="{{ old('about_mission_1_tag_en', $settings['about_mission_1_tag_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Title (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_2_title_en" 
                                value="{{ old('about_mission_2_title_en', $settings['about_mission_2_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Description (English)</label>
                            <textarea 
                                name="about_mission_2_desc_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_2_desc_en', $settings['about_mission_2_desc_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Tag / Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_2_tag_en" 
                                value="{{ old('about_mission_2_tag_en', $settings['about_mission_2_tag_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Title (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_3_title_en" 
                                value="{{ old('about_mission_3_title_en', $settings['about_mission_3_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Description (English)</label>
                            <textarea 
                                name="about_mission_3_desc_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_3_desc_en', $settings['about_mission_3_desc_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Tag / Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_3_tag_en" 
                                value="{{ old('about_mission_3_tag_en', $settings['about_mission_3_tag_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Title (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_4_title_en" 
                                value="{{ old('about_mission_4_title_en', $settings['about_mission_4_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Description (English)</label>
                            <textarea 
                                name="about_mission_4_desc_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_4_desc_en', $settings['about_mission_4_desc_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Tag / Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_4_tag_en" 
                                value="{{ old('about_mission_4_tag_en', $settings['about_mission_4_tag_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Title (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_5_title_en" 
                                value="{{ old('about_mission_5_title_en', $settings['about_mission_5_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Description (English)</label>
                            <textarea 
                                name="about_mission_5_desc_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_5_desc_en', $settings['about_mission_5_desc_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Tag / Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_5_tag_en" 
                                value="{{ old('about_mission_5_tag_en', $settings['about_mission_5_tag_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Title (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_6_title_en" 
                                value="{{ old('about_mission_6_title_en', $settings['about_mission_6_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Description (English)</label>
                            <textarea 
                                name="about_mission_6_desc_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_6_desc_en', $settings['about_mission_6_desc_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Tag / Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_mission_6_tag_en" 
                                value="{{ old('about_mission_6_tag_en', $settings['about_mission_6_tag_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Struktur Manajemen, Pimpinan & Mentor (English)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_team_badge_en" 
                                value="{{ old('about_team_badge_en', $settings['about_team_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (English)</label>
                            <input 
                                type="text" 
                                name="about_team_title_en" 
                                value="{{ old('about_team_title_en', $settings['about_team_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (English)</label>
                            <textarea 
                                name="about_team_subtitle_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_subtitle_en', $settings['about_team_subtitle_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Role Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_team_1_role_en" 
                                value="{{ old('about_team_1_role_en', $settings['about_team_1_role_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Sub-role (English)</label>
                            <input 
                                type="text" 
                                name="about_team_1_subrole_en" 
                                value="{{ old('about_team_1_subrole_en', $settings['about_team_1_subrole_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Biografi (English)</label>
                            <textarea 
                                name="about_team_1_bio_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_1_bio_en', $settings['about_team_1_bio_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Role Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_team_2_role_en" 
                                value="{{ old('about_team_2_role_en', $settings['about_team_2_role_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Sub-role (English)</label>
                            <input 
                                type="text" 
                                name="about_team_2_subrole_en" 
                                value="{{ old('about_team_2_subrole_en', $settings['about_team_2_subrole_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Biografi (English)</label>
                            <textarea 
                                name="about_team_2_bio_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_2_bio_en', $settings['about_team_2_bio_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Role Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_team_3_role_en" 
                                value="{{ old('about_team_3_role_en', $settings['about_team_3_role_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Sub-role (English)</label>
                            <input 
                                type="text" 
                                name="about_team_3_subrole_en" 
                                value="{{ old('about_team_3_subrole_en', $settings['about_team_3_subrole_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Biografi (English)</label>
                            <textarea 
                                name="about_team_3_bio_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_3_bio_en', $settings['about_team_3_bio_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 4 Role (English)</label>
                            <input 
                                type="text" 
                                name="about_team_4_role_en" 
                                value="{{ old('about_team_4_role_en', $settings['about_team_4_role_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 4 Deskripsi Tugas (English)</label>
                            <textarea 
                                name="about_team_4_bio_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_4_bio_en', $settings['about_team_4_bio_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 5 Role (English)</label>
                            <input 
                                type="text" 
                                name="about_team_5_role_en" 
                                value="{{ old('about_team_5_role_en', $settings['about_team_5_role_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 5 Deskripsi Tugas (English)</label>
                            <textarea 
                                name="about_team_5_bio_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_5_bio_en', $settings['about_team_5_bio_en'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Sarana & Prasarana (Fasilitas Kampus) (English)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_badge_en" 
                                value="{{ old('about_fac_badge_en', $settings['about_fac_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_title_en" 
                                value="{{ old('about_fac_title_en', $settings['about_fac_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (English)</label>
                            <textarea 
                                name="about_fac_subtitle_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_subtitle_en', $settings['about_fac_subtitle_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_badge_en" 
                                value="{{ old('about_fac_1_badge_en', $settings['about_fac_1_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Judul (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_title_en" 
                                value="{{ old('about_fac_1_title_en', $settings['about_fac_1_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Lokasi/Ket (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_desc_en" 
                                value="{{ old('about_fac_1_desc_en', $settings['about_fac_1_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Deskripsi Detail Modal (English)</label>
                            <textarea 
                                name="about_fac_1_modal_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_1_modal_en', $settings['about_fac_1_modal_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_badge_en" 
                                value="{{ old('about_fac_2_badge_en', $settings['about_fac_2_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Judul (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_title_en" 
                                value="{{ old('about_fac_2_title_en', $settings['about_fac_2_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Lokasi/Ket (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_desc_en" 
                                value="{{ old('about_fac_2_desc_en', $settings['about_fac_2_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Deskripsi Detail Modal (English)</label>
                            <textarea 
                                name="about_fac_2_modal_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_2_modal_en', $settings['about_fac_2_modal_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_badge_en" 
                                value="{{ old('about_fac_3_badge_en', $settings['about_fac_3_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Judul (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_title_en" 
                                value="{{ old('about_fac_3_title_en', $settings['about_fac_3_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Lokasi/Ket (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_desc_en" 
                                value="{{ old('about_fac_3_desc_en', $settings['about_fac_3_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Deskripsi Detail Modal (English)</label>
                            <textarea 
                                name="about_fac_3_modal_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_3_modal_en', $settings['about_fac_3_modal_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_badge_en" 
                                value="{{ old('about_fac_4_badge_en', $settings['about_fac_4_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Judul (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_title_en" 
                                value="{{ old('about_fac_4_title_en', $settings['about_fac_4_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Lokasi/Ket (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_desc_en" 
                                value="{{ old('about_fac_4_desc_en', $settings['about_fac_4_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Deskripsi Detail Modal (English)</label>
                            <textarea 
                                name="about_fac_4_modal_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_4_modal_en', $settings['about_fac_4_modal_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_badge_en" 
                                value="{{ old('about_fac_5_badge_en', $settings['about_fac_5_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Judul (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_title_en" 
                                value="{{ old('about_fac_5_title_en', $settings['about_fac_5_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Lokasi/Ket (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_desc_en" 
                                value="{{ old('about_fac_5_desc_en', $settings['about_fac_5_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Deskripsi Detail Modal (English)</label>
                            <textarea 
                                name="about_fac_5_modal_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_5_modal_en', $settings['about_fac_5_modal_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_badge_en" 
                                value="{{ old('about_fac_6_badge_en', $settings['about_fac_6_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Judul (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_title_en" 
                                value="{{ old('about_fac_6_title_en', $settings['about_fac_6_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Lokasi/Ket (English)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_desc_en" 
                                value="{{ old('about_fac_6_desc_en', $settings['about_fac_6_desc_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Deskripsi Detail Modal (English)</label>
                            <textarea 
                                name="about_fac_6_modal_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_6_modal_en', $settings['about_fac_6_modal_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Judul Tabel Spesifikasi Ruangan (English)</label>
                            <input 
                                type="text" 
                                name="about_table_title_en" 
                                value="{{ old('about_table_title_en', $settings['about_table_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Landasan Hukum & Legalitas Penyelenggaraan (English)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_legal_badge_en" 
                                value="{{ old('about_legal_badge_en', $settings['about_legal_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (English)</label>
                            <input 
                                type="text" 
                                name="about_legal_title_en" 
                                value="{{ old('about_legal_title_en', $settings['about_legal_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (English)</label>
                            <textarea 
                                name="about_legal_subtitle_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_legal_subtitle_en', $settings['about_legal_subtitle_en'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Kunjungan Kampus, Jam Operasional & CTA (English)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Badge (English)</label>
                            <input 
                                type="text" 
                                name="about_cta_badge_en" 
                                value="{{ old('about_cta_badge_en', $settings['about_cta_badge_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Main Title (English)</label>
                            <input 
                                type="text" 
                                name="about_cta_title_en" 
                                value="{{ old('about_cta_title_en', $settings['about_cta_title_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Subtitle / Ajakan (English)</label>
                            <textarea 
                                name="about_cta_subtitle_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_cta_subtitle_en', $settings['about_cta_subtitle_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Jam Operasional Kampus (English)</label>
                            <textarea 
                                name="about_operating_hours_en" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_operating_hours_en', $settings['about_operating_hours_en'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Label Tombol Daftar (English)</label>
                            <input 
                                type="text" 
                                name="about_cta_btn_enroll_en" 
                                value="{{ old('about_cta_btn_enroll_en', $settings['about_cta_btn_enroll_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Label Tombol WhatsApp (English)</label>
                            <input 
                                type="text" 
                                name="about_cta_btn_wa_en" 
                                value="{{ old('about_cta_btn_wa_en', $settings['about_cta_btn_wa_en'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deutsch (DE) About Inputs -->
            <div x-show="aboutLang === 'de'" class="space-y-6">
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Hero Headline, Deskripsi & Metric Counters (Deutsch)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Badge Text (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_hero_badge_de" 
                                value="{{ old('about_hero_badge_de', $settings['about_hero_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Main Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_hero_title_de" 
                                value="{{ old('about_hero_title_de', $settings['about_hero_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Hero Subtitle / Description (Deutsch)</label>
                            <textarea 
                                name="about_hero_subtitle_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_hero_subtitle_de', $settings['about_hero_subtitle_de'] ?? '') }}</textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Value (e.g. 240+) (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_val_de" 
                                    value="{{ old('about_metric_1_val_de', $settings['about_metric_1_val_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Label (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_lbl_de" 
                                    value="{{ old('about_metric_1_lbl_de', $settings['about_metric_1_lbl_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 1 Subtitle (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_1_sub_de" 
                                    value="{{ old('about_metric_1_sub_de', $settings['about_metric_1_sub_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Value (e.g. 3 Ruang) (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_val_de" 
                                    value="{{ old('about_metric_2_val_de', $settings['about_metric_2_val_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Label (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_lbl_de" 
                                    value="{{ old('about_metric_2_lbl_de', $settings['about_metric_2_lbl_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 2 Subtitle (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_2_sub_de" 
                                    value="{{ old('about_metric_2_sub_de', $settings['about_metric_2_sub_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Value (e.g. 100%) (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_val_de" 
                                    value="{{ old('about_metric_3_val_de', $settings['about_metric_3_val_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Label (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_lbl_de" 
                                    value="{{ old('about_metric_3_lbl_de', $settings['about_metric_3_lbl_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 3 Subtitle (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_3_sub_de" 
                                    value="{{ old('about_metric_3_sub_de', $settings['about_metric_3_sub_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Value (e.g. Bekasi) (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_val_de" 
                                    value="{{ old('about_metric_4_val_de', $settings['about_metric_4_val_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Label (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_lbl_de" 
                                    value="{{ old('about_metric_4_lbl_de', $settings['about_metric_4_lbl_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Metric 4 Subtitle (Deutsch)</label>
                                <input 
                                    type="text" 
                                    name="about_metric_4_sub_de" 
                                    value="{{ old('about_metric_4_sub_de', $settings['about_metric_4_sub_de'] ?? '') }}"
                                    class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Sekilas Tentang Kami (Story, Highlights & Campus) (Deutsch)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Story Pill Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_story_badge_de" 
                                value="{{ old('about_story_badge_de', $settings['about_story_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Story Main Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_story_title_de" 
                                value="{{ old('about_story_title_de', $settings['about_story_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 1 (Dedikasi & Peluang Ausbildung) (Deutsch)</label>
                            <textarea 
                                name="about_story_p1_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p1_de', $settings['about_story_p1_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 2 (Lokasi Villa Galaxy & Kurikulum SKKNI/Goethe) (Deutsch)</label>
                            <textarea 
                                name="about_story_p2_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p2_de', $settings['about_story_p2_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Paragraf 3 (Interkulturelle Kompetenz & Simulasi) (Deutsch)</label>
                            <textarea 
                                name="about_story_p3_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_story_p3_de', $settings['about_story_p3_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 1 Title (Berizin Resmi) (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_story_h1_title_de" 
                                value="{{ old('about_story_h1_title_de', $settings['about_story_h1_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 1 Description (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_story_h1_desc_de" 
                                value="{{ old('about_story_h1_desc_de', $settings['about_story_h1_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 2 Title (Instruktur Bersertifikat) (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_story_h2_title_de" 
                                value="{{ old('about_story_h2_title_de', $settings['about_story_h2_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Highlight 2 Description (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_story_h2_desc_de" 
                                value="{{ old('about_story_h2_desc_de', $settings['about_story_h2_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Tag (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_campus_tag_de" 
                                value="{{ old('about_campus_tag_de', $settings['about_campus_tag_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_campus_title_de" 
                                value="{{ old('about_campus_title_de', $settings['about_campus_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Campus Card Address / Subtitle (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_campus_desc_de" 
                                value="{{ old('about_campus_desc_de', $settings['about_campus_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Floating Badge Tag (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_campus_env_tag_de" 
                                value="{{ old('about_campus_env_tag_de', $settings['about_campus_env_tag_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Floating Badge Description (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_campus_env_desc_de" 
                                value="{{ old('about_campus_env_desc_de', $settings['about_campus_env_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Visi & Misi Strategis + 7 Pilar Misi (Deutsch)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Arah & Fondasi) (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mv_badge_de" 
                                value="{{ old('about_mv_badge_de', $settings['about_mv_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Visi & Misi Strategis) (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mv_title_de" 
                                value="{{ old('about_mv_title_de', $settings['about_mv_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (Deutsch)</label>
                            <textarea 
                                name="about_mv_subtitle_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mv_subtitle_de', $settings['about_mv_subtitle_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Visi Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_visi_badge_de" 
                                value="{{ old('about_visi_badge_de', $settings['about_visi_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Kalimat Visi Utama Lembaga (Deutsch)</label>
                            <textarea 
                                name="about_visi_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_visi_de', $settings['about_visi_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Visi Sign-off / Penetapan (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_visi_author_de" 
                                value="{{ old('about_visi_author_de', $settings['about_visi_author_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Judul Pilar Misi (7 Pilar Misi...) (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_title_de" 
                                value="{{ old('about_mission_title_de', $settings['about_mission_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Sub-judul Pilar Misi (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_subtitle_de" 
                                value="{{ old('about_mission_subtitle_de', $settings['about_mission_subtitle_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_1_title_de" 
                                value="{{ old('about_mission_1_title_de', $settings['about_mission_1_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Description (Deutsch)</label>
                            <textarea 
                                name="about_mission_1_desc_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_1_desc_de', $settings['about_mission_1_desc_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 1 Tag / Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_1_tag_de" 
                                value="{{ old('about_mission_1_tag_de', $settings['about_mission_1_tag_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_2_title_de" 
                                value="{{ old('about_mission_2_title_de', $settings['about_mission_2_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Description (Deutsch)</label>
                            <textarea 
                                name="about_mission_2_desc_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_2_desc_de', $settings['about_mission_2_desc_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 2 Tag / Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_2_tag_de" 
                                value="{{ old('about_mission_2_tag_de', $settings['about_mission_2_tag_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_3_title_de" 
                                value="{{ old('about_mission_3_title_de', $settings['about_mission_3_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Description (Deutsch)</label>
                            <textarea 
                                name="about_mission_3_desc_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_3_desc_de', $settings['about_mission_3_desc_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 3 Tag / Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_3_tag_de" 
                                value="{{ old('about_mission_3_tag_de', $settings['about_mission_3_tag_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_4_title_de" 
                                value="{{ old('about_mission_4_title_de', $settings['about_mission_4_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Description (Deutsch)</label>
                            <textarea 
                                name="about_mission_4_desc_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_4_desc_de', $settings['about_mission_4_desc_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 4 Tag / Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_4_tag_de" 
                                value="{{ old('about_mission_4_tag_de', $settings['about_mission_4_tag_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_5_title_de" 
                                value="{{ old('about_mission_5_title_de', $settings['about_mission_5_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Description (Deutsch)</label>
                            <textarea 
                                name="about_mission_5_desc_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_5_desc_de', $settings['about_mission_5_desc_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 5 Tag / Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_5_tag_de" 
                                value="{{ old('about_mission_5_tag_de', $settings['about_mission_5_tag_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_6_title_de" 
                                value="{{ old('about_mission_6_title_de', $settings['about_mission_6_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Description (Deutsch)</label>
                            <textarea 
                                name="about_mission_6_desc_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_mission_6_desc_de', $settings['about_mission_6_desc_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Pilar 6 Tag / Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_mission_6_tag_de" 
                                value="{{ old('about_mission_6_tag_de', $settings['about_mission_6_tag_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Struktur Manajemen, Pimpinan & Mentor (Deutsch)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_badge_de" 
                                value="{{ old('about_team_badge_de', $settings['about_team_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_title_de" 
                                value="{{ old('about_team_title_de', $settings['about_team_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (Deutsch)</label>
                            <textarea 
                                name="about_team_subtitle_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_subtitle_de', $settings['about_team_subtitle_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Role Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_1_role_de" 
                                value="{{ old('about_team_1_role_de', $settings['about_team_1_role_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Sub-role (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_1_subrole_de" 
                                value="{{ old('about_team_1_subrole_de', $settings['about_team_1_subrole_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 1 Biografi (Deutsch)</label>
                            <textarea 
                                name="about_team_1_bio_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_1_bio_de', $settings['about_team_1_bio_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Role Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_2_role_de" 
                                value="{{ old('about_team_2_role_de', $settings['about_team_2_role_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Sub-role (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_2_subrole_de" 
                                value="{{ old('about_team_2_subrole_de', $settings['about_team_2_subrole_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 2 Biografi (Deutsch)</label>
                            <textarea 
                                name="about_team_2_bio_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_2_bio_de', $settings['about_team_2_bio_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Role Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_3_role_de" 
                                value="{{ old('about_team_3_role_de', $settings['about_team_3_role_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Sub-role (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_3_subrole_de" 
                                value="{{ old('about_team_3_subrole_de', $settings['about_team_3_subrole_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Mentor 3 Biografi (Deutsch)</label>
                            <textarea 
                                name="about_team_3_bio_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_3_bio_de', $settings['about_team_3_bio_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 4 Role (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_4_role_de" 
                                value="{{ old('about_team_4_role_de', $settings['about_team_4_role_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 4 Deskripsi Tugas (Deutsch)</label>
                            <textarea 
                                name="about_team_4_bio_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_4_bio_de', $settings['about_team_4_bio_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 5 Role (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_team_5_role_de" 
                                value="{{ old('about_team_5_role_de', $settings['about_team_5_role_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Officer 5 Deskripsi Tugas (Deutsch)</label>
                            <textarea 
                                name="about_team_5_bio_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_team_5_bio_de', $settings['about_team_5_bio_de'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Sarana & Prasarana (Fasilitas Kampus) (Deutsch)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_badge_de" 
                                value="{{ old('about_fac_badge_de', $settings['about_fac_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_title_de" 
                                value="{{ old('about_fac_title_de', $settings['about_fac_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (Deutsch)</label>
                            <textarea 
                                name="about_fac_subtitle_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_subtitle_de', $settings['about_fac_subtitle_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_badge_de" 
                                value="{{ old('about_fac_1_badge_de', $settings['about_fac_1_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Judul (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_title_de" 
                                value="{{ old('about_fac_1_title_de', $settings['about_fac_1_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Lokasi/Ket (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_1_desc_de" 
                                value="{{ old('about_fac_1_desc_de', $settings['about_fac_1_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 1 Deskripsi Detail Modal (Deutsch)</label>
                            <textarea 
                                name="about_fac_1_modal_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_1_modal_de', $settings['about_fac_1_modal_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_badge_de" 
                                value="{{ old('about_fac_2_badge_de', $settings['about_fac_2_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Judul (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_title_de" 
                                value="{{ old('about_fac_2_title_de', $settings['about_fac_2_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Lokasi/Ket (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_2_desc_de" 
                                value="{{ old('about_fac_2_desc_de', $settings['about_fac_2_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 2 Deskripsi Detail Modal (Deutsch)</label>
                            <textarea 
                                name="about_fac_2_modal_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_2_modal_de', $settings['about_fac_2_modal_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_badge_de" 
                                value="{{ old('about_fac_3_badge_de', $settings['about_fac_3_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Judul (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_title_de" 
                                value="{{ old('about_fac_3_title_de', $settings['about_fac_3_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Lokasi/Ket (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_3_desc_de" 
                                value="{{ old('about_fac_3_desc_de', $settings['about_fac_3_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 3 Deskripsi Detail Modal (Deutsch)</label>
                            <textarea 
                                name="about_fac_3_modal_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_3_modal_de', $settings['about_fac_3_modal_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_badge_de" 
                                value="{{ old('about_fac_4_badge_de', $settings['about_fac_4_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Judul (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_title_de" 
                                value="{{ old('about_fac_4_title_de', $settings['about_fac_4_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Lokasi/Ket (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_4_desc_de" 
                                value="{{ old('about_fac_4_desc_de', $settings['about_fac_4_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 4 Deskripsi Detail Modal (Deutsch)</label>
                            <textarea 
                                name="about_fac_4_modal_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_4_modal_de', $settings['about_fac_4_modal_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_badge_de" 
                                value="{{ old('about_fac_5_badge_de', $settings['about_fac_5_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Judul (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_title_de" 
                                value="{{ old('about_fac_5_title_de', $settings['about_fac_5_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Lokasi/Ket (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_5_desc_de" 
                                value="{{ old('about_fac_5_desc_de', $settings['about_fac_5_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 5 Deskripsi Detail Modal (Deutsch)</label>
                            <textarea 
                                name="about_fac_5_modal_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_5_modal_de', $settings['about_fac_5_modal_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_badge_de" 
                                value="{{ old('about_fac_6_badge_de', $settings['about_fac_6_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Judul (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_title_de" 
                                value="{{ old('about_fac_6_title_de', $settings['about_fac_6_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Lokasi/Ket (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_fac_6_desc_de" 
                                value="{{ old('about_fac_6_desc_de', $settings['about_fac_6_desc_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Fasilitas 6 Deskripsi Detail Modal (Deutsch)</label>
                            <textarea 
                                name="about_fac_6_modal_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_fac_6_modal_de', $settings['about_fac_6_modal_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Judul Tabel Spesifikasi Ruangan (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_table_title_de" 
                                value="{{ old('about_table_title_de', $settings['about_table_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Landasan Hukum & Legalitas Penyelenggaraan (Deutsch)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_legal_badge_de" 
                                value="{{ old('about_legal_badge_de', $settings['about_legal_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_legal_title_de" 
                                value="{{ old('about_legal_title_de', $settings['about_legal_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Section Subtitle (Deutsch)</label>
                            <textarea 
                                name="about_legal_subtitle_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_legal_subtitle_de', $settings['about_legal_subtitle_de'] ?? '') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#b38b1f] uppercase tracking-wider flex items-center gap-2">
                        <span>Kunjungan Kampus, Jam Operasional & CTA (Deutsch)</span>
                    </h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Badge (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_cta_badge_de" 
                                value="{{ old('about_cta_badge_de', $settings['about_cta_badge_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Main Title (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_cta_title_de" 
                                value="{{ old('about_cta_title_de', $settings['about_cta_title_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">CTA Subtitle / Ajakan (Deutsch)</label>
                            <textarea 
                                name="about_cta_subtitle_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_cta_subtitle_de', $settings['about_cta_subtitle_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Jam Operasional Kampus (Deutsch)</label>
                            <textarea 
                                name="about_operating_hours_de" 
                                rows="3"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >{{ old('about_operating_hours_de', $settings['about_operating_hours_de'] ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Label Tombol Daftar (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_cta_btn_enroll_de" 
                                value="{{ old('about_cta_btn_enroll_de', $settings['about_cta_btn_enroll_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Label Tombol WhatsApp (Deutsch)</label>
                            <input 
                                type="text" 
                                name="about_cta_btn_wa_de" 
                                value="{{ old('about_cta_btn_wa_de', $settings['about_cta_btn_wa_de'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: Theme Colors -->
        <div x-show="currentTab === 'colors'" class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs">
            <h3 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                Theme Palette & Branding Colors
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Primary Color -->
                <div class="p-4 bg-slate-50 border border-slate-200/80 rounded-xl space-y-3">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Primary Dark Color</label>
                    <div class="flex items-center gap-3">
                        <input 
                            type="color" 
                            value="{{ $settings['theme_color_primary'] ?? '#2C0B1E' }}"
                            onchange="document.getElementById('theme_color_primary_input').value = this.value"
                            class="w-12 h-12 rounded-lg cursor-pointer border-0 bg-transparent"
                        >
                        <input 
                            type="text" 
                            id="theme_color_primary_input"
                            name="theme_color_primary" 
                            value="{{ old('theme_color_primary', $settings['theme_color_primary'] ?? '#2C0B1E') }}"
                            class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <p class="text-[11px] text-slate-500">Default: #2C0B1E (Deep Burgundy Plum)</p>
                </div>

                <!-- Gold Accent Color -->
                <div class="p-4 bg-slate-50 border border-slate-200/80 rounded-xl space-y-3">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Gold Accent Color</label>
                    <div class="flex items-center gap-3">
                        <input 
                            type="color" 
                            value="{{ $settings['theme_color_gold'] ?? '#E2B842' }}"
                            onchange="document.getElementById('theme_color_gold_input').value = this.value"
                            class="w-12 h-12 rounded-lg cursor-pointer border-0 bg-transparent"
                        >
                        <input 
                            type="text" 
                            id="theme_color_gold_input"
                            name="theme_color_gold" 
                            value="{{ old('theme_color_gold', $settings['theme_color_gold'] ?? '#E2B842') }}"
                            class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <p class="text-[11px] text-slate-500">Default: #E2B842 (Vibrant German Gold)</p>
                </div>

                <!-- Gold Hover Color -->
                <div class="p-4 bg-slate-50 border border-slate-200/80 rounded-xl space-y-3">
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider">Gold Hover State</label>
                    <div class="flex items-center gap-3">
                        <input 
                            type="color" 
                            value="{{ $settings['theme_color_gold_hover'] ?? '#CFA230' }}"
                            onchange="document.getElementById('theme_color_gold_hover_input').value = this.value"
                            class="w-12 h-12 rounded-lg cursor-pointer border-0 bg-transparent"
                        >
                        <input 
                            type="text" 
                            id="theme_color_gold_hover_input"
                            name="theme_color_gold_hover" 
                            value="{{ old('theme_color_gold_hover', $settings['theme_color_gold_hover'] ?? '#CFA230') }}"
                            class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]/30 focus:border-[#E2B842] shadow-2xs"
                        >
                    </div>
                    <p class="text-[11px] text-slate-500">Default: #CFA230 (Hover darker gold)</p>
                </div>
            </div>
        </div>

        <!-- Sticky Save Button at Bottom -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
            <button 
                type="submit" 
                class="px-8 py-3.5 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#c79c29] hover:from-[#cfa230] hover:to-[#b38b1f] text-[#2C0B1E] font-extrabold text-sm shadow-xl shadow-[#E2B842]/20 transition-all cursor-pointer flex items-center gap-2"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save All Customizations
            </button>
        </div>
    </form>
</div>
@endsection
