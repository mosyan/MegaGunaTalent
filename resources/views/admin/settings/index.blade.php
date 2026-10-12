@extends('layouts.admin')

@section('title', 'Page Customizer & Settings')
@section('page_title', 'Page Customizer & Settings')

@section('content')
<div x-data="{ currentTab: 'branding' }" class="space-y-6">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-[#240919] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">Website Customizer</h2>
            <p class="text-xs text-slate-400 mt-1">Configure all public landing page texts, buttons, images, logo, favicon, and colors dynamically.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" target="_blank" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/15 text-slate-200 text-xs font-semibold transition-all flex items-center gap-2">
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
    <div class="flex flex-wrap gap-2 border-b border-white/10 pb-3">
        <button 
            type="button"
            @click="currentTab = 'branding'" 
            :class="currentTab === 'branding' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 hover:text-white font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Branding & Logo
        </button>
        <button 
            type="button"
            @click="currentTab = 'hero'" 
            :class="currentTab === 'hero' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 hover:text-white font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Hero Section & Buttons
        </button>
        <button 
            type="button"
            @click="currentTab = 'programs'" 
            :class="currentTab === 'programs' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 hover:text-white font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Programs Section
        </button>
        <button 
            type="button"
            @click="currentTab = 'cta'" 
            :class="currentTab === 'cta' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 hover:text-white font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            CTA Banner Section
        </button>
        <button 
            type="button"
            @click="currentTab = 'footer'" 
            :class="currentTab === 'footer' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 hover:text-white font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Footer & Social
        </button>
        <button 
            type="button"
            @click="currentTab = 'about'" 
            :class="currentTab === 'about' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 hover:text-white font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            About Us Page
        </button>
        <button 
            type="button"
            @click="currentTab = 'colors'" 
            :class="currentTab === 'colors' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow-md shadow-[#E2B842]/20' : 'bg-white/5 text-slate-300 hover:bg-white/10 hover:text-white font-medium'"
            class="px-4 py-2 rounded-xl text-xs transition-all cursor-pointer"
        >
            Theme Colors
        </button>
    </div>

    <!-- Main Form -->
    <form id="settings-form" action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- TAB: Branding & Logo -->
        <div x-show="currentTab === 'branding'" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <h3 class="text-base font-bold text-white border-b border-white/10 pb-3 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                General Brand Identity & Assets
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Site Title -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Website Title (SEO & Tab)</label>
                    <input 
                        type="text" 
                        name="site_title" 
                        value="{{ old('site_title', $settings['site_title'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- Site Tagline -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Tagline / Slogan</label>
                    <input 
                        type="text" 
                        name="site_tagline" 
                        value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-white/5">
                <!-- Custom Logo Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Custom Brand Logo</label>
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/10">
                        @if(!empty($settings['site_logo']))
                            <div class="p-2 bg-white/10 rounded-lg shrink-0">
                                <img src="{{ $settings['site_logo'] }}" alt="Current Logo" class="h-10 w-auto object-contain">
                            </div>
                        @else
                            <div class="w-12 h-10 rounded-lg bg-[#E2B842]/20 border border-[#E2B842]/30 flex items-center justify-center text-[#E2B842] font-black text-sm shrink-0">
                                SVG
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input type="file" name="site_logo" accept="image/*" class="text-xs text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                            <p class="text-[11px] text-slate-400 mt-1">PNG, JPG, SVG, or WebP (Max 2MB). Overrides default SVG.</p>
                        </div>
                    </div>
                </div>

                <!-- Custom Favicon Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Browser Favicon</label>
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/10">
                        @if(!empty($settings['site_favicon']))
                            <div class="p-2 bg-white/10 rounded-lg shrink-0">
                                <img src="{{ $settings['site_favicon'] }}" alt="Current Favicon" class="h-8 w-8 object-contain">
                            </div>
                        @else
                            <div class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-slate-400 font-bold text-xs shrink-0">
                                ICO
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input type="file" name="site_favicon" accept=".ico,.png,.svg" class="text-xs text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                            <p class="text-[11px] text-slate-400 mt-1">.ico or .png favicon (Max 1MB).</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="pt-4 border-t border-white/5">
                <h4 class="text-sm font-bold text-white mb-4">Official Contact Details</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Email Address</label>
                        <input 
                            type="email" 
                            name="contact_email" 
                            value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Phone / WhatsApp</label>
                        <input 
                            type="text" 
                            name="contact_phone" 
                            value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Office Address</label>
                        <input 
                            type="text" 
                            name="contact_address" 
                            value="{{ old('contact_address', $settings['contact_address'] ?? '') }}"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
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
        }" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-white/10 pb-4">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        Hero Section Headline, Buttons & Trust Badges
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">Konfigurasi teks multilingual (ID, EN, DE) untuk headline utama, tombol CTA, dan label floating trust badges.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateHeroPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-black/40 p-1 rounded-xl border border-white/10 shrink-0">
                        <span class="text-[11px] text-slate-400 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="heroLang = 'id'" :class="heroLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="heroLang = 'en'" :class="heroLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="heroLang = 'de'" :class="heroLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID Hero Texts -->
            <div x-show="heroLang === 'id'" class="space-y-6">
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider flex items-center gap-2">
                        <span>🇮🇩 Headline & Copywriting (Indonesia)</span>
                    </h4>
                    <!-- Hero Badge -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Badge Text (Top Pill - Indonesia)</label>
                        <input 
                            type="text" 
                            name="hero_badge_text" 
                            value="{{ old('hero_badge_text', $settings['hero_badge_text'] ?? '') }}"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>

                    <!-- Title Line 1 & Line 2 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Line 1 (Indonesia)</label>
                            <input 
                                type="text" 
                                name="hero_title_line1" 
                                value="{{ old('hero_title_line1', $settings['hero_title_line1'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Line 2 (Gold Accent - Indonesia)</label>
                            <input 
                                type="text" 
                                name="hero_title_line2" 
                                value="{{ old('hero_title_line2', $settings['hero_title_line2'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>

                    <!-- Subtitle -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Subtitle Paragraph (Indonesia)</label>
                        <textarea 
                            name="hero_subtitle" 
                            rows="3"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                    </div>
                </div>

                <!-- ID Buttons Labels -->
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇮🇩 CTA Button Labels (Indonesia)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Primary Button Label</label>
                            <input 
                                type="text" 
                                name="hero_primary_btn_text" 
                                value="{{ old('hero_primary_btn_text', $settings['hero_primary_btn_text'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Secondary Button Label</label>
                            <input 
                                type="text" 
                                name="hero_secondary_btn_text" 
                                value="{{ old('hero_secondary_btn_text', $settings['hero_secondary_btn_text'] ?? '') }}"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>
                </div>

                <!-- ID Trust Badges Labels -->
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇮🇩 Trust Badges / Stats Labels (Indonesia)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 1 Label</label>
                            <input 
                                type="text" 
                                name="hero_stat_1_lbl" 
                                value="{{ old('hero_stat_1_lbl', $settings['hero_stat_1_lbl'] ?? '') }}"
                                placeholder="Kelulusan Goethe-Zertifikat"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 2 Label</label>
                            <input 
                                type="text" 
                                name="hero_stat_2_lbl" 
                                value="{{ old('hero_stat_2_lbl', $settings['hero_stat_2_lbl'] ?? '') }}"
                                placeholder="Alumni Studi & Ausbildung"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 3 Label</label>
                            <input 
                                type="text" 
                                name="hero_stat_3_lbl" 
                                value="{{ old('hero_stat_3_lbl', $settings['hero_stat_3_lbl'] ?? '') }}"
                                placeholder="Pengajar Tersertifikasi"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- EN Hero Texts -->
            <div x-show="heroLang === 'en'" class="space-y-6">
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider flex items-center gap-2">
                        <span>🇬🇧 Headline & Copywriting (English)</span>
                    </h4>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Badge Text (Top Pill - English)</label>
                        <input 
                            type="text" 
                            name="hero_badge_text_en" 
                            value="{{ old('hero_badge_text_en', $settings['hero_badge_text_en'] ?? '') }}"
                            placeholder="e.g. Official German Language Center & Ausbildung Partner"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Line 1 (English)</label>
                            <input 
                                type="text" 
                                name="hero_title_line1_en" 
                                value="{{ old('hero_title_line1_en', $settings['hero_title_line1_en'] ?? '') }}"
                                placeholder="e.g. Speak German With Confidence"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Line 2 (English)</label>
                            <input 
                                type="text" 
                                name="hero_title_line2_en" 
                                value="{{ old('hero_title_line2_en', $settings['hero_title_line2_en'] ?? '') }}"
                                placeholder="e.g. Unlock Your Career & Study in Germany"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Subtitle Paragraph (English)</label>
                        <textarea 
                            name="hero_subtitle_en" 
                            rows="3"
                            placeholder="e.g. Engaging German courses for all levels. Learn German with flexible programs, experienced native tutors, and real-world conversations."
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >{{ old('hero_subtitle_en', $settings['hero_subtitle_en'] ?? '') }}</textarea>
                    </div>
                </div>

                <!-- EN Buttons Labels -->
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇬🇧 CTA Button Labels (English)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Primary Button Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_primary_btn_text_en" 
                                value="{{ old('hero_primary_btn_text_en', $settings['hero_primary_btn_text_en'] ?? '') }}"
                                placeholder="e.g. Enroll Now"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Secondary Button Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_secondary_btn_text_en" 
                                value="{{ old('hero_secondary_btn_text_en', $settings['hero_secondary_btn_text_en'] ?? '') }}"
                                placeholder="e.g. Explore Programs"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>
                </div>

                <!-- EN Trust Badges Labels -->
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇬🇧 Trust Badges / Stats Labels (English)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 1 Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_stat_1_lbl_en" 
                                value="{{ old('hero_stat_1_lbl_en', $settings['hero_stat_1_lbl_en'] ?? '') }}"
                                placeholder="e.g. Goethe Exam Pass Rate"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 2 Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_stat_2_lbl_en" 
                                value="{{ old('hero_stat_2_lbl_en', $settings['hero_stat_2_lbl_en'] ?? '') }}"
                                placeholder="e.g. Alumni in Germany"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 3 Label (English)</label>
                            <input 
                                type="text" 
                                name="hero_stat_3_lbl_en" 
                                value="{{ old('hero_stat_3_lbl_en', $settings['hero_stat_3_lbl_en'] ?? '') }}"
                                placeholder="e.g. Certified Expert Tutors"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- DE Hero Texts -->
            <div x-show="heroLang === 'de'" class="space-y-6">
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-5">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider flex items-center gap-2">
                        <span>🇩🇪 Headline & Copywriting (Deutsch)</span>
                    </h4>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Badge Text (Top Pill - Deutsch)</label>
                        <input 
                            type="text" 
                            name="hero_badge_text_de" 
                            value="{{ old('hero_badge_text_de', $settings['hero_badge_text_de'] ?? '') }}"
                            placeholder="z.B. Offizielles Deutsches Sprachzentrum & Ausbildungspartner"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Line 1 (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_title_line1_de" 
                                value="{{ old('hero_title_line1_de', $settings['hero_title_line1_de'] ?? '') }}"
                                placeholder="z.B. Deutsch sprechen mit Selbstvertrauen"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Line 2 (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_title_line2_de" 
                                value="{{ old('hero_title_line2_de', $settings['hero_title_line2_de'] ?? '') }}"
                                placeholder="z.B. Ihre Zukunft in Deutschland starten"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Subtitle Paragraph (Deutsch)</label>
                        <textarea 
                            name="hero_subtitle_de" 
                            rows="3"
                            placeholder="z.B. Interaktive Deutschkurse für alle Niveaustufen von A1 bis C1 mit zertifizierten Dozenten und Goethe-Zertifikat Vorbereitung."
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >{{ old('hero_subtitle_de', $settings['hero_subtitle_de'] ?? '') }}</textarea>
                    </div>
                </div>

                <!-- DE Buttons Labels -->
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇩🇪 CTA Button Labels (Deutsch)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Primary Button Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_primary_btn_text_de" 
                                value="{{ old('hero_primary_btn_text_de', $settings['hero_primary_btn_text_de'] ?? '') }}"
                                placeholder="z.B. Jetzt anmelden"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Secondary Button Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_secondary_btn_text_de" 
                                value="{{ old('hero_secondary_btn_text_de', $settings['hero_secondary_btn_text_de'] ?? '') }}"
                                placeholder="z.B. Programme entdecken"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>
                </div>

                <!-- DE Trust Badges Labels -->
                <div class="bg-white/5 border border-white/10 rounded-xl p-5 space-y-4">
                    <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇩🇪 Trust Badges / Stats Labels (Deutsch)</h4>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 1 Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_stat_1_lbl_de" 
                                value="{{ old('hero_stat_1_lbl_de', $settings['hero_stat_1_lbl_de'] ?? '') }}"
                                placeholder="z.B. Goethe-Bestehensquote"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 2 Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_stat_2_lbl_de" 
                                value="{{ old('hero_stat_2_lbl_de', $settings['hero_stat_2_lbl_de'] ?? '') }}"
                                placeholder="z.B. Erfolgreiche Absolventen"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-400 uppercase mb-1">Badge 3 Label (Deutsch)</label>
                            <input 
                                type="text" 
                                name="hero_stat_3_lbl_de" 
                                value="{{ old('hero_stat_3_lbl_de', $settings['hero_stat_3_lbl_de'] ?? '') }}"
                                placeholder="z.B. Zertifizierte Dozenten"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- Primary and Secondary Buttons Targets & URLs (Shared) -->
            <div class="pt-4 border-t border-white/10 space-y-4">
                <h4 class="text-sm font-bold text-white flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                    Target URL & Navigasi Tombol (Berlaku untuk semua bahasa)
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Primary Button URL -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-2">
                        <label class="block text-xs font-bold text-[#E2B842] uppercase tracking-wider">Primary Button Target Link / URL</label>
                        <input 
                            type="text" 
                            name="hero_primary_btn_url" 
                            value="{{ old('hero_primary_btn_url', $settings['hero_primary_btn_url'] ?? '') }}"
                            placeholder="e.g. #enroll atau /registration"
                            class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>

                    <!-- Secondary Button URL -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-2">
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider">Secondary Button Target Link / URL</label>
                        <input 
                            type="text" 
                            name="hero_secondary_btn_url" 
                            value="{{ old('hero_secondary_btn_url', $settings['hero_secondary_btn_url'] ?? '') }}"
                            placeholder="e.g. #programs atau /courses"
                            class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                </div>
            </div>

            <!-- 3 Stat Badges Numerical Values (Shared) -->
            <div class="pt-4 border-t border-white/10 space-y-3">
                <div class="flex items-center justify-between">
                    <h4 class="text-sm font-bold text-white flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                        Nilai Angka / Statistik Trust Badges (Shared)
                    </h4>
                    <span class="text-[11px] text-slate-400">Label tiap stat dikonfigurasi pada tab bahasa di atas</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-3 bg-white/5 border border-white/10 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-400 uppercase font-semibold">Stat 1 Nilai Angka</label>
                        <input type="text" name="hero_stat_1_val" value="{{ old('hero_stat_1_val', $settings['hero_stat_1_val'] ?? '') }}" placeholder="98%" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div class="p-3 bg-white/5 border border-white/10 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-400 uppercase font-semibold">Stat 2 Nilai Angka</label>
                        <input type="text" name="hero_stat_2_val" value="{{ old('hero_stat_2_val', $settings['hero_stat_2_val'] ?? '') }}" placeholder="1,500+" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div class="p-3 bg-white/5 border border-white/10 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-400 uppercase font-semibold">Stat 3 Nilai Angka</label>
                        <input type="text" name="hero_stat_3_val" value="{{ old('hero_stat_3_val', $settings['hero_stat_3_val'] ?? '') }}" placeholder="100%" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>
            </div>

            <!-- Hero Visual Backgrounds & Landmark Graphic -->
            <div class="pt-4 border-t border-white/10 space-y-4">
                <h4 class="text-sm font-bold text-white flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                    Hero Visuals & Graphics
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Hero Background Image -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-3">
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Hero Section Background Image</label>
                        @if(!empty($settings['hero_bg_image']))
                            <div class="h-24 rounded-lg overflow-hidden bg-black/40 border border-white/10">
                                <img src="{{ $settings['hero_bg_image'] }}" alt="Hero Background" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="h-20 rounded-lg bg-black/30 border border-white/10 flex items-center justify-center text-xs text-slate-400">
                                Default: images/global-bg.jpg
                            </div>
                        @endif
                        <input type="file" name="hero_bg_image" accept="image/*" class="text-xs text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                        <p class="text-[11px] text-slate-400">JPG, PNG, or WebP (Max 5MB). Overrides default global map graphic.</p>
                    </div>

                    <!-- Brandenburg Gate Graphic -->
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-3">
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Brandenburg Gate Landmark Graphic</label>
                        @if(!empty($settings['hero_gate_image']))
                            <div class="h-24 rounded-lg overflow-hidden bg-black/40 border border-white/10 flex items-center justify-center p-2">
                                <img src="{{ $settings['hero_gate_image'] }}" alt="Hero Gate" class="max-h-full w-auto object-contain">
                            </div>
                        @else
                            <div class="h-20 rounded-lg bg-black/30 border border-white/10 flex items-center justify-center text-xs text-slate-400">
                                Default: images/hero-gate.jpg
                            </div>
                        @endif
                        <input type="file" name="hero_gate_image" accept="image/*" class="text-xs text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                        <p class="text-[11px] text-slate-400">PNG or JPG cutout resting at the hero baseline (Max 4MB).</p>
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
        }" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-white/10 pb-4">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        Course Programs Heading & Cards Customizer
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">Konfigurasi lengkap heading dan detail kurikulum untuk 3 tingkatan program dalam bahasa Indonesia, English, dan Deutsch.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateProgramPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-black/40 p-1 rounded-xl border border-white/10 shrink-0">
                        <span class="text-[11px] text-slate-400 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="progLang = 'id'" :class="progLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="progLang = 'en'" :class="progLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="progLang = 'de'" :class="progLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID Programs Main Heading -->
            <div x-show="progLang === 'id'" class="space-y-4 bg-white/5 border border-white/10 rounded-xl p-5">
                <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇮🇩 Section Header (Indonesia)</h4>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Section Badge</label>
                    <input 
                        type="text" 
                        name="programs_badge" 
                        value="{{ old('programs_badge', $settings['programs_badge'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Main Section Title</label>
                    <input 
                        type="text" 
                        name="programs_title" 
                        value="{{ old('programs_title', $settings['programs_title'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Section Description</label>
                    <textarea 
                        name="programs_subtitle" 
                        rows="2"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('programs_subtitle', $settings['programs_subtitle'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- EN Programs Main Heading -->
            <div x-show="progLang === 'en'" class="space-y-4 bg-white/5 border border-white/10 rounded-xl p-5">
                <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇬🇧 Section Header (English)</h4>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Section Badge (English)</label>
                    <input 
                        type="text" 
                        name="programs_badge_en" 
                        value="{{ old('programs_badge_en', $settings['programs_badge_en'] ?? '') }}"
                        placeholder="e.g. OUR FLAGSHIP PROGRAMS"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Main Section Title (English)</label>
                    <input 
                        type="text" 
                        name="programs_title_en" 
                        value="{{ old('programs_title_en', $settings['programs_title_en'] ?? '') }}"
                        placeholder="e.g. Comprehensive Language Pathways"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Section Description (English)</label>
                    <textarea 
                        name="programs_subtitle_en" 
                        rows="2"
                        placeholder="e.g. Structured curriculum designed systematically from basic conversation to fluent professional proficiency."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('programs_subtitle_en', $settings['programs_subtitle_en'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- DE Programs Main Heading -->
            <div x-show="progLang === 'de'" class="space-y-4 bg-white/5 border border-white/10 rounded-xl p-5">
                <h4 class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">🇩🇪 Section Header (Deutsch)</h4>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Section Badge (Deutsch)</label>
                    <input 
                        type="text" 
                        name="programs_badge_de" 
                        value="{{ old('programs_badge_de', $settings['programs_badge_de'] ?? '') }}"
                        placeholder="z.B. UNSERE SPITZENPROGRAMME"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Main Section Title (Deutsch)</label>
                    <input 
                        type="text" 
                        name="programs_title_de" 
                        value="{{ old('programs_title_de', $settings['programs_title_de'] ?? '') }}"
                        placeholder="z.B. Gezielte Deutschkurse & Bildungspfade"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Section Description (Deutsch)</label>
                    <textarea 
                        name="programs_subtitle_de" 
                        rows="2"
                        placeholder="z.B. Strukturierte Lehrpläne von den Grundlagen bis zur berufsbezogenen Sprachkompetenz für Studium und Ausbildung."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('programs_subtitle_de', $settings['programs_subtitle_de'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- DETAIL PROGRAM 1: BEGINNER (A1 - A2) -->
            <div class="pt-6 border-t border-white/10 space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-white/5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#E2B842]/20 border border-[#E2B842]/40 flex items-center justify-center text-[#E2B842] font-bold text-xs">
                            A1
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Program 1: Beginner (A1 - A2)</h4>
                            <p class="text-xs text-slate-400">Halaman detail: <code class="text-[#E2B842]">/programs/beginner</code></p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 rounded bg-[#E2B842]/10 text-[#E2B842] text-[11px] font-bold uppercase tracking-wider">Fondasi Dasar</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pb-2 border-b border-white/5">
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Level CEFR</label>
                        <input type="text" name="program_beginner_level" value="{{ old('program_beginner_level', $settings['program_beginner_level'] ?? 'A1 - A2 (CEFR)') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Badge / Sub-judul Fokus</label>
                        <input type="text" name="program_beginner_badge" value="{{ old('program_beginner_badge', $settings['program_beginner_badge'] ?? 'Fondasi & Percakapan Harian') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Target Ujian Resmi</label>
                        <input type="text" name="program_beginner_target_exam" value="{{ old('program_beginner_target_exam', $settings['program_beginner_target_exam'] ?? 'Goethe-Zertifikat A1 & A2') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- ID Text Fields -->
                <div x-show="progLang === 'id'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Judul Program (Indonesia)</label>
                            <input type="text" name="program_beginner_title" value="{{ old('program_beginner_title', $settings['program_beginner_title'] ?? 'Beginner German Program') }}" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Tagline Ringkas (Indonesia)</label>
                            <input type="text" name="program_beginner_tagline" value="{{ old('program_beginner_tagline', $settings['program_beginner_tagline'] ?? 'Kuasai Dasar Bahasa Jerman dari Nol Hingga Mampu Berkomunikasi Sehari-hari dan Lulus Sertifikasi Goethe A1/A2.') }}" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Deskripsi Lengkap Program (Indonesia)</label>
                        <textarea name="program_beginner_description" rows="3" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_beginner_description', $settings['program_beginner_description'] ?? 'Program Beginner dirancang khusus bagi peserta yang belum pernah mempelajari bahasa Jerman sama sekali. Menggunakan metode pembelajaran interaktif berbasis SKKNI dan standar Goethe-Institut, peserta akan dibimbing mulai dari pelafalan presisi (Aussprache), kosakata esensial, struktur tata bahasa dasar (Akkusativ & Dativ), hingga simulasi percakapan nyata untuk kehidupan sehari-hari, perjalanan, dan persiapan awal studi di Jerman.') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Jalur Karier & Peluang Lulusan (Indonesia)</label>
                        <input type="text" name="program_beginner_career_path" value="{{ old('program_beginner_career_path', $settings['program_beginner_career_path'] ?? 'Lulusan level ini memiliki pondasi kuat untuk melanjutkan ke level Intermediate B1 (syarat utama Ausbildung), serta memenuhi syarat administratif dasar program Au Pair dan visa tertentu ke Jerman.') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- EN Text Fields -->
                <div x-show="progLang === 'en'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Program Title (English)</label>
                            <input type="text" name="program_beginner_title_en" value="{{ old('program_beginner_title_en', $settings['program_beginner_title_en'] ?? '') }}" placeholder="e.g. Beginner German Program (A1 - A2)" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Short Tagline (English)</label>
                            <input type="text" name="program_beginner_tagline_en" value="{{ old('program_beginner_tagline_en', $settings['program_beginner_tagline_en'] ?? '') }}" placeholder="e.g. Master foundational German communication and pass Goethe A1/A2 exams." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Full Program Description (English)</label>
                        <textarea name="program_beginner_description_en" rows="3" placeholder="e.g. Designed for beginners starting from zero, guiding students through precise pronunciation, essential vocabulary, and everyday conversations." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_beginner_description_en', $settings['program_beginner_description_en'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Career Pathway (English)</label>
                        <input type="text" name="program_beginner_career_path_en" value="{{ old('program_beginner_career_path_en', $settings['program_beginner_career_path_en'] ?? '') }}" placeholder="e.g. Provides a strong foundation for Intermediate B1 and administrative requirements for Au Pair or FSJ." class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- DE Text Fields -->
                <div x-show="progLang === 'de'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Programmtitel (Deutsch)</label>
                            <input type="text" name="program_beginner_title_de" value="{{ old('program_beginner_title_de', $settings['program_beginner_title_de'] ?? '') }}" placeholder="z.B. Deutsch Grundstufe (A1 - A2)" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Slogan / Untertitel (Deutsch)</label>
                            <input type="text" name="program_beginner_tagline_de" value="{{ old('program_beginner_tagline_de', $settings['program_beginner_tagline_de'] ?? '') }}" placeholder="z.B. Deutsch von Grund auf lernen für Alltag und Goethe A1/A2 Zertifikat." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Ausführliche Beschreibung (Deutsch)</label>
                        <textarea name="program_beginner_description_de" rows="3" placeholder="z.B. Speziell konzipiert für Teilnehmer ohne Vorkenntnisse, mit Fokus auf Aussprache, Grundgrammatik und praktische Alltagskommunikation." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_beginner_description_de', $settings['program_beginner_description_de'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Karriereperspektiven (Deutsch)</label>
                        <input type="text" name="program_beginner_career_path_de" value="{{ old('program_beginner_career_path_de', $settings['program_beginner_career_path_de'] ?? '') }}" placeholder="z.B. Solide Basis für B1 Ausbildungsvorbereitung sowie Au-Pair- und FSJ-Visa." class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-2 border-t border-white/5">
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Durasi</label>
                        <input type="text" name="program_beginner_duration" value="{{ old('program_beginner_duration', $settings['program_beginner_duration'] ?? '10 - 12 Minggu') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Total Jam Pembelajaran</label>
                        <input type="text" name="program_beginner_total_hours" value="{{ old('program_beginner_total_hours', $settings['program_beginner_total_hours'] ?? '160 Jam Pembelajaran Intensif') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Kapasitas Kelas</label>
                        <input type="text" name="program_beginner_class_size" value="{{ old('program_beginner_class_size', $settings['program_beginner_class_size'] ?? 'Maksimal 15 Siswa / Kelas') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Jadwal Belajar</label>
                        <input type="text" name="program_beginner_schedule" value="{{ old('program_beginner_schedule', $settings['program_beginner_schedule'] ?? 'Senin - Jumat (09:00 - 13:00 WIB) / Pilihan Kelas Malam') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>
            </div>

            <!-- DETAIL PROGRAM 2: INTERMEDIATE (B1) -->
            <div class="pt-6 border-t border-white/10 space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-white/5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#E2B842] text-[#2C0B1E] flex items-center justify-center font-bold text-xs">
                            B1
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Program 2: Intermediate (B1)</h4>
                            <p class="text-xs text-slate-400">Halaman detail: <code class="text-[#E2B842]">/programs/intermediate</code></p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 rounded bg-[#E2B842] text-[#2C0B1E] text-[11px] font-bold uppercase tracking-wider">Syarat Ausbildung</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pb-2 border-b border-white/5">
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Level CEFR</label>
                        <input type="text" name="program_intermediate_level" value="{{ old('program_intermediate_level', $settings['program_intermediate_level'] ?? 'B1 (CEFR)') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Badge / Sub-judul Fokus</label>
                        <input type="text" name="program_intermediate_badge" value="{{ old('program_intermediate_badge', $settings['program_intermediate_badge'] ?? 'Pintu Gerbang Utama Ausbildung Jerman') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Target Ujian Resmi</label>
                        <input type="text" name="program_intermediate_target_exam" value="{{ old('program_intermediate_target_exam', $settings['program_intermediate_target_exam'] ?? 'Goethe-Zertifikat B1 (4 Modul)') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- ID Text Fields -->
                <div x-show="progLang === 'id'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Judul Program (Indonesia)</label>
                            <input type="text" name="program_intermediate_title" value="{{ old('program_intermediate_title', $settings['program_intermediate_title'] ?? 'Intermediate German Program') }}" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Tagline Ringkas (Indonesia)</label>
                            <input type="text" name="program_intermediate_tagline" value="{{ old('program_intermediate_tagline', $settings['program_intermediate_tagline'] ?? 'Kunci Kelulusan Goethe-Zertifikat B1 Sebagai Syarat Mutlak Visa Ausbildung, Studi Vokasi, dan Karier di Jerman.') }}" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Deskripsi Lengkap Program (Indonesia)</label>
                        <textarea name="program_intermediate_description" rows="3" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_intermediate_description', $settings['program_intermediate_description'] ?? 'Program Intermediate difokuskan untuk mencapai tingkat kemandirian berbahasa Jerman (Selbstständige Sprachverwendung). Level B1 adalah syarat wajib paling krusial bagi calon peserta program Ausbildung di Jerman.') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Jalur Karier & Peluang Lulusan (Indonesia)</label>
                        <input type="text" name="program_intermediate_career_path" value="{{ old('program_intermediate_career_path', $settings['program_intermediate_career_path'] ?? 'Sertifikat Goethe B1 adalah dokumen resmi utama yang diakui Kedutaan Besar Jerman di Jakarta untuk penerbitan visa Ausbildung.') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- EN Text Fields -->
                <div x-show="progLang === 'en'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Program Title (English)</label>
                            <input type="text" name="program_intermediate_title_en" value="{{ old('program_intermediate_title_en', $settings['program_intermediate_title_en'] ?? '') }}" placeholder="e.g. Intermediate German Program (B1)" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Short Tagline (English)</label>
                            <input type="text" name="program_intermediate_tagline_en" value="{{ old('program_intermediate_tagline_en', $settings['program_intermediate_tagline_en'] ?? '') }}" placeholder="e.g. Key to passing Goethe B1 for Ausbildung visa and vocational programs in Germany." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Full Program Description (English)</label>
                        <textarea name="program_intermediate_description_en" rows="3" placeholder="e.g. Focuses on independent language usage, crucial for vocational Ausbildung trainees in nursing, hospitality, and engineering." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_intermediate_description_en', $settings['program_intermediate_description_en'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Career Pathway (English)</label>
                        <input type="text" name="program_intermediate_career_path_en" value="{{ old('program_intermediate_career_path_en', $settings['program_intermediate_career_path_en'] ?? '') }}" placeholder="e.g. Officially recognized by the German Embassy for issuing Ausbildung and job training visas." class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- DE Text Fields -->
                <div x-show="progLang === 'de'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Programmtitel (Deutsch)</label>
                            <input type="text" name="program_intermediate_title_de" value="{{ old('program_intermediate_title_de', $settings['program_intermediate_title_de'] ?? '') }}" placeholder="z.B. Deutsch Mittelstufe (B1)" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Slogan / Untertitel (Deutsch)</label>
                            <input type="text" name="program_intermediate_tagline_de" value="{{ old('program_intermediate_tagline_de', $settings['program_intermediate_tagline_de'] ?? '') }}" placeholder="z.B. Schlüssel zum Goethe-Zertifikat B1 für Ausbildung und Beruf in Deutschland." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Ausführliche Beschreibung (Deutsch)</label>
                        <textarea name="program_intermediate_description_de" rows="3" placeholder="z.B. Vorbereitung auf selbstständige Sprachverwendung für Ausbildung in Pflege, Hotellerie und Technik." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_intermediate_description_de', $settings['program_intermediate_description_de'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Karriereperspektiven (Deutsch)</label>
                        <input type="text" name="program_intermediate_career_path_de" value="{{ old('program_intermediate_career_path_de', $settings['program_intermediate_career_path_de'] ?? '') }}" placeholder="z.B. Anerkannt für Visumerteilung für duale Ausbildung in Deutschland." class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-2 border-t border-white/5">
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Durasi</label>
                        <input type="text" name="program_intermediate_duration" value="{{ old('program_intermediate_duration', $settings['program_intermediate_duration'] ?? '12 Minggu') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Total Jam Pembelajaran</label>
                        <input type="text" name="program_intermediate_total_hours" value="{{ old('program_intermediate_total_hours', $settings['program_intermediate_total_hours'] ?? '180 Jam Pembelajaran Intensif') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Kapasitas Kelas</label>
                        <input type="text" name="program_intermediate_class_size" value="{{ old('program_intermediate_class_size', $settings['program_intermediate_class_size'] ?? 'Maksimal 15 Siswa / Kelas') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Jadwal Belajar</label>
                        <input type="text" name="program_intermediate_schedule" value="{{ old('program_intermediate_schedule', $settings['program_intermediate_schedule'] ?? 'Senin - Jumat (08:30 - 13:00 WIB)') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>
            </div>

            <!-- DETAIL PROGRAM 3: ADVANCED (B2 - C1) -->
            <div class="pt-6 border-t border-white/10 space-y-4">
                <div class="flex items-center justify-between pb-2 border-b border-white/5">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-[#E2B842]/20 border border-[#E2B842]/40 flex items-center justify-center text-[#E2B842] font-bold text-xs">
                            B2+
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-white">Program 3: Advanced (B2 - C1)</h4>
                            <p class="text-xs text-slate-400">Halaman detail: <code class="text-[#E2B842]">/programs/advanced</code></p>
                        </div>
                    </div>
                    <span class="px-2.5 py-1 rounded bg-[#E2B842]/10 text-[#E2B842] text-[11px] font-bold uppercase tracking-wider">Profisiensi Tinggi</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pb-2 border-b border-white/5">
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Level CEFR</label>
                        <input type="text" name="program_advanced_level" value="{{ old('program_advanced_level', $settings['program_advanced_level'] ?? 'B2 - C1 (CEFR)') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Badge / Sub-judul Fokus</label>
                        <input type="text" name="program_advanced_badge" value="{{ old('program_advanced_badge', $settings['program_advanced_badge'] ?? 'Profisiensi Karier & Akademik') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Target Ujian Resmi</label>
                        <input type="text" name="program_advanced_target_exam" value="{{ old('program_advanced_target_exam', $settings['program_advanced_target_exam'] ?? 'Goethe-Zertifikat B2/C1 & TestDaF') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- ID Text Fields -->
                <div x-show="progLang === 'id'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Judul Program (Indonesia)</label>
                            <input type="text" name="program_advanced_title" value="{{ old('program_advanced_title', $settings['program_advanced_title'] ?? 'Advanced German Program') }}" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Tagline Ringkas (Indonesia)</label>
                            <input type="text" name="program_advanced_tagline" value="{{ old('program_advanced_tagline', $settings['program_advanced_tagline'] ?? 'Kecakapan Bahasa Tingkat Tinggi untuk Jalur Karier Profesional, Bahasa Khusus (Fachsprache), dan Studi Universitas di Jerman.') }}" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Deskripsi Lengkap Program (Indonesia)</label>
                        <textarea name="program_advanced_description" rows="3" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_advanced_description', $settings['program_advanced_description'] ?? 'Program Advanced dirancang untuk profesional, dokter, perawat ahli, insinyur, dan calon mahasiswa master/doktoral yang memerlukan kemahiran bahasa Jerman tingkat lanjut.') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Jalur Karier & Peluang Lulusan (Indonesia)</label>
                        <input type="text" name="program_advanced_career_path" value="{{ old('program_advanced_career_path', $settings['program_advanced_career_path'] ?? 'Sertifikasi B2/C1 membuka akses langsung ke pasar kerja profesional berpenghasilan tinggi di Jerman.') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- EN Text Fields -->
                <div x-show="progLang === 'en'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Program Title (English)</label>
                            <input type="text" name="program_advanced_title_en" value="{{ old('program_advanced_title_en', $settings['program_advanced_title_en'] ?? '') }}" placeholder="e.g. Advanced German Program (B2 - C1)" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Short Tagline (English)</label>
                            <input type="text" name="program_advanced_tagline_en" value="{{ old('program_advanced_tagline_en', $settings['program_advanced_tagline_en'] ?? '') }}" placeholder="e.g. High-level language mastery for professional careers, medical tracks, and university degrees." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Full Program Description (English)</label>
                        <textarea name="program_advanced_description_en" rows="3" placeholder="e.g. Tailored for doctors, engineers, and master students requiring business and technical German." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_advanced_description_en', $settings['program_advanced_description_en'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Career Pathway (English)</label>
                        <input type="text" name="program_advanced_career_path_en" value="{{ old('program_advanced_career_path_en', $settings['program_advanced_career_path_en'] ?? '') }}" placeholder="e.g. Direct entry into the high-income German professional labor market and state universities." class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <!-- DE Text Fields -->
                <div x-show="progLang === 'de'" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Programmtitel (Deutsch)</label>
                            <input type="text" name="program_advanced_title_de" value="{{ old('program_advanced_title_de', $settings['program_advanced_title_de'] ?? '') }}" placeholder="z.B. Deutsch Oberstufe (B2 - C1)" class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                        <div>
                            <label class="block text-[11px] text-slate-300 uppercase mb-1">Slogan / Untertitel (Deutsch)</label>
                            <input type="text" name="program_advanced_tagline_de" value="{{ old('program_advanced_tagline_de', $settings['program_advanced_tagline_de'] ?? '') }}" placeholder="z.B. Höchste Sprachkompetenz für Fachkräfte, Mediziner und universitäres Studium." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Ausführliche Beschreibung (Deutsch)</label>
                        <textarea name="program_advanced_description_de" rows="3" placeholder="z.B. Konzipiert für Fachkräfte, Ärzte und Akademiker mit Schwerpunkt auf Fach- und Wirtschaftssprache." class="w-full px-3 py-2.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842] leading-relaxed">{{ old('program_advanced_description_de', $settings['program_advanced_description_de'] ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Karriereperspektiven (Deutsch)</label>
                        <input type="text" name="program_advanced_career_path_de" value="{{ old('program_advanced_career_path_de', $settings['program_advanced_career_path_de'] ?? '') }}" placeholder="z.B. Direkter Zugang zum deutschen Arbeitsmarkt für hochqualifizierte Berufe." class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 pt-2 border-t border-white/5">
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Durasi</label>
                        <input type="text" name="program_advanced_duration" value="{{ old('program_advanced_duration', $settings['program_advanced_duration'] ?? '12 - 14 Minggu') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Total Jam Pembelajaran</label>
                        <input type="text" name="program_advanced_total_hours" value="{{ old('program_advanced_total_hours', $settings['program_advanced_total_hours'] ?? '200 Jam Pembelajaran Intensif') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Kapasitas Kelas</label>
                        <input type="text" name="program_advanced_class_size" value="{{ old('program_advanced_class_size', $settings['program_advanced_class_size'] ?? 'Maksimal 12 Siswa / Kelas (Fokus & Presisi)') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-300 uppercase mb-1">Jadwal Belajar</label>
                        <input type="text" name="program_advanced_schedule" value="{{ old('program_advanced_schedule', $settings['program_advanced_schedule'] ?? 'Senin - Jumat / Kelas Spesialisasi Fleksibel') }}" class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:ring-2 focus:ring-[#E2B842]">
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
        }" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-white/10 pb-4">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        Call-to-Action (CTA) Conversion Banner
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">Konfigurasi teks multilingual (ID, EN, DE) untuk pill badge, headline ajakan, subtitle dan tombol konversi pendaftaran.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateCtaPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-black/40 p-1 rounded-xl border border-white/10 shrink-0">
                        <span class="text-[11px] text-slate-400 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="ctaLang = 'id'" :class="ctaLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="ctaLang = 'en'" :class="ctaLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="ctaLang = 'de'" :class="ctaLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID CTA -->
            <div x-show="ctaLang === 'id'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Pill Badge (ID)</label>
                    <input 
                        type="text" 
                        name="cta_badge" 
                        value="{{ old('cta_badge', $settings['cta_badge'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Heading (ID)</label>
                    <input 
                        type="text" 
                        name="cta_title" 
                        value="{{ old('cta_title', $settings['cta_title'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Subtitle (ID)</label>
                    <textarea 
                        name="cta_subtitle" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('cta_subtitle', $settings['cta_subtitle'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Button Text (ID)</label>
                    <input 
                        type="text" 
                        name="cta_button_text" 
                        value="{{ old('cta_button_text', $settings['cta_button_text'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
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
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Heading (EN)</label>
                    <input 
                        type="text" 
                        name="cta_title_en" 
                        value="{{ old('cta_title_en', $settings['cta_title_en'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Subtitle (EN)</label>
                    <textarea 
                        name="cta_subtitle_en" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('cta_subtitle_en', $settings['cta_subtitle_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Button Text (EN)</label>
                    <input 
                        type="text" 
                        name="cta_button_text_en" 
                        value="{{ old('cta_button_text_en', $settings['cta_button_text_en'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
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
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Heading (DE)</label>
                    <input 
                        type="text" 
                        name="cta_title_de" 
                        value="{{ old('cta_title_de', $settings['cta_title_de'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Subtitle (DE)</label>
                    <textarea 
                        name="cta_subtitle_de" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('cta_subtitle_de', $settings['cta_subtitle_de'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">CTA Button Text (DE)</label>
                    <input 
                        type="text" 
                        name="cta_button_text_de" 
                        value="{{ old('cta_button_text_de', $settings['cta_button_text_de'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- Shared CTA URL & Background -->
            <div class="pt-6 border-t border-white/10 space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Button Target URL</label>
                    <input 
                        type="text" 
                        name="cta_button_url" 
                        value="{{ old('cta_button_url', $settings['cta_button_url'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- CTA Background Image Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Section Background Image</label>
                    <div class="p-4 rounded-xl bg-white/5 border border-white/10 flex items-center gap-4">
                        @if(!empty($settings['cta_bg_image']))
                            <div class="w-28 h-16 rounded-lg overflow-hidden bg-black/40 border border-white/10 shrink-0">
                                <img src="{{ $settings['cta_bg_image'] }}" alt="CTA Background" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-28 h-16 rounded-lg bg-black/30 border border-white/10 flex items-center justify-center text-[10px] text-slate-400 text-center px-1 shrink-0">
                                Default: cta-bridge.jpg
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input type="file" name="cta_bg_image" accept="image/*" class="text-xs text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer">
                            <p class="text-[11px] text-slate-400 mt-1">Recommended 1920x800px JPG or WebP (Max 5MB).</p>
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
        }" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-white/10 pb-4">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        Footer Content & Social Media Links
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">Konfigurasi ringkasan institusi, teks hak cipta 3 bahasa, dan profil media sosial resmi.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateFooterPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-black/40 p-1 rounded-xl border border-white/10 shrink-0">
                        <span class="text-[11px] text-slate-400 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="footerLang = 'id'" :class="footerLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="footerLang = 'en'" :class="footerLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="footerLang = 'de'" :class="footerLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID Footer -->
            <div x-show="footerLang === 'id'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">About Description (ID)</label>
                    <textarea 
                        name="footer_about" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('footer_about', $settings['footer_about'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Copyright Text (ID)</label>
                    <input 
                        type="text" 
                        name="footer_copyright" 
                        value="{{ old('footer_copyright', $settings['footer_copyright'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
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
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('footer_about_en', $settings['footer_about_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">Copyright Text (EN)</label>
                    <input 
                        type="text" 
                        name="footer_copyright_en" 
                        value="{{ old('footer_copyright_en', $settings['footer_copyright_en'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
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
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('footer_about_de', $settings['footer_about_de'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-amber-300 uppercase tracking-wider mb-2">Copyright Text (DE)</label>
                    <input 
                        type="text" 
                        name="footer_copyright_de" 
                        value="{{ old('footer_copyright_de', $settings['footer_copyright_de'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-amber-500/30 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- Shared Social Media Links -->
            <div class="pt-6 border-t border-white/10">
                <h4 class="text-sm font-bold text-white mb-4">Social Media Profile Links</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">WhatsApp Direct Link</label>
                        <input 
                            type="text" 
                            name="social_whatsapp" 
                            value="{{ old('social_whatsapp', $settings['social_whatsapp'] ?? '') }}"
                            placeholder="https://wa.me/..."
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Instagram Profile</label>
                        <input 
                            type="text" 
                            name="social_instagram" 
                            value="{{ old('social_instagram', $settings['social_instagram'] ?? '') }}"
                            placeholder="https://instagram.com/..."
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Facebook Page</label>
                        <input 
                            type="text" 
                            name="social_facebook" 
                            value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}"
                            placeholder="https://facebook.com/..."
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">LinkedIn Company</label>
                        <input 
                            type="text" 
                            name="social_linkedin" 
                            value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}"
                            placeholder="https://linkedin.com/company/..."
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                </div>
            </div>
        </div>
        <!-- TAB: About Us Page -->
        <div x-show="currentTab === 'about'" x-data="{ 
            aboutLang: 'id',
            generateAboutPresets() {
                if (!confirm('Apakah Anda ingin mengisi otomatis rekomendasi teks About Us untuk 3 Bahasa (ID, EN, DE)?')) return;
                const presets = {
                    about_hero_badge: 'LPK Resmi Kemnaker RI • SKKNI & Goethe-Institut Standard',
                    about_hero_title: 'Membangun Generasi Kompeten & Siap Berkarier Global di Jerman',
                    about_hero_subtitle: 'LPK Mega Guna Talent adalah Lembaga Pelatihan Kerja terakreditasi yang berdedikasi menempa talenta muda Indonesia dengan penguasaan bahasa Jerman berstandar internasional, penguatan etos kerja profesional, dan fasilitas pembelajaran modern.',
                    about_visi: 'Menjadi Lembaga Pelatihan Kerja Yang Terdepan Dalam Membangun SDM Kompeten Sesuai Dengan Standar Kompetensi Kerja Nasional dan Internasional',
                    about_operating_hours: 'Senin - Sabtu: 08:30 - 17:00 WIB',

                    about_hero_badge_en: 'Official Vocational Training Institute • SKKNI & Goethe Standard',
                    about_hero_title_en: 'Empowering Competent Talents for Global Careers in Germany',
                    about_hero_subtitle_en: 'LPK Mega Guna Talent is an accredited vocational institute committed to forging Indonesian youth through international-standard German language mastery, solid professional work ethics, and modern immersive learning environments.',
                    about_visi_en: 'To be the foremost vocational training institute cultivating globally competitive human resources aligned with national and international professional standards.',
                    about_operating_hours_en: 'Monday - Saturday: 08:30 AM - 05:00 PM (WIB)',

                    about_hero_badge_de: 'Anerkanntes Berufsbildungszentrum • Goethe-Institut Standard',
                    about_hero_title_de: 'Kompetente Fachkräfte für erfolgreiche Karrieren in Deutschland',
                    about_hero_subtitle_de: 'LPK Mega Guna Talent ist eine akkreditierte Ausbildungsstätte, die junge indonesische Talente gezielt auf Ausbildung, Studium und qualifizierte Berufe in Deutschland vorbereitet – mit intensivem Sprachunterricht und praxisnaher Arbeitskultur.',
                    about_visi_de: 'Ein führendes Institut für berufliche Bildung zu sein, das hochqualifizierte Fachkräfte nach nationalen und internationalen Kompetenzstandards ausbildet.',
                    about_operating_hours_de: 'Montag - Samstag: 08:30 - 17:00 Uhr (WIB)'
                };
                for (const [key, val] of Object.entries(presets)) {
                    const el = document.querySelector(`[name='${key}']`);
                    if (el) {
                        el.value = val;
                        el.dispatchEvent(new Event('input'));
                    }
                }
            }
        }" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 border-b border-white/10 pb-4">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                        About Us Page Content & Institutional Information
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">Kelola narasi institusional, visi lembaga, dan profil operasional dalam bahasa Indonesia, English, dan Deutsch.</p>
                </div>
                <div class="flex items-center gap-3 flex-wrap">
                    <button type="button" @click="generateAboutPresets()" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-gradient-to-r from-[#E2B842] to-[#f3cf65] text-[#2C0B1E] font-bold text-xs shadow-md hover:brightness-110 active:scale-95 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span>✨ Generate Rekomendasi 3 Bahasa</span>
                    </button>
                    <div class="flex items-center gap-1.5 bg-black/40 p-1 rounded-xl border border-white/10 shrink-0">
                        <span class="text-[11px] text-slate-400 font-semibold px-2">Bahasa:</span>
                        <button type="button" @click="aboutLang = 'id'" :class="aboutLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                        <button type="button" @click="aboutLang = 'en'" :class="aboutLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                        <button type="button" @click="aboutLang = 'de'" :class="aboutLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                    </div>
                </div>
            </div>

            <!-- ID About Inputs -->
            <div x-show="aboutLang === 'id'" class="space-y-6">
                <!-- Hero Badge -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Badge Text (Indonesia)</label>
                    <input 
                        type="text" 
                        name="about_hero_badge" 
                        value="{{ old('about_hero_badge', $settings['about_hero_badge'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- Hero Title -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Main Title (Indonesia)</label>
                    <input 
                        type="text" 
                        name="about_hero_title" 
                        value="{{ old('about_hero_title', $settings['about_hero_title'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- Hero Subtitle -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Subtitle / Description (Indonesia)</label>
                    <textarea 
                        name="about_hero_subtitle" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('about_hero_subtitle', $settings['about_hero_subtitle'] ?? '') }}</textarea>
                </div>

                <!-- Visi Utama -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Visi Utama Lembaga (Indonesia)</label>
                    <textarea 
                        name="about_visi" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('about_visi', $settings['about_visi'] ?? '') }}</textarea>
                </div>

                <!-- Jam Operasional ID -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Jam Operasional Kampus (Indonesia)</label>
                    <input 
                        type="text" 
                        name="about_operating_hours" 
                        value="{{ old('about_operating_hours', $settings['about_operating_hours'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- EN About Inputs -->
            <div x-show="aboutLang === 'en'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Badge Text (English)</label>
                    <input 
                        type="text" 
                        name="about_hero_badge_en" 
                        value="{{ old('about_hero_badge_en', $settings['about_hero_badge_en'] ?? '') }}"
                        placeholder="e.g. Official Vocational Training Center • SKKNI & Goethe Standard"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Main Title (English)</label>
                    <input 
                        type="text" 
                        name="about_hero_title_en" 
                        value="{{ old('about_hero_title_en', $settings['about_hero_title_en'] ?? '') }}"
                        placeholder="e.g. Empowering Competent Talents for Global Careers in Germany"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Subtitle / Description (English)</label>
                    <textarea 
                        name="about_hero_subtitle_en" 
                        rows="3"
                        placeholder="e.g. Accredited vocational center dedicated to preparing Indonesian youth for Ausbildung and careers in Germany."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('about_hero_subtitle_en', $settings['about_hero_subtitle_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Vision Statement (English)</label>
                    <textarea 
                        name="about_visi_en" 
                        rows="3"
                        placeholder="e.g. To become the leading vocational institute building human resources adhering to national and international competency standards."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('about_visi_en', $settings['about_visi_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Operating Hours (English)</label>
                    <input 
                        type="text" 
                        name="about_operating_hours_en" 
                        value="{{ old('about_operating_hours_en', $settings['about_operating_hours_en'] ?? '') }}"
                        placeholder="e.g. Monday - Saturday: 08:30 AM - 05:00 PM (WIB)"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- DE About Inputs -->
            <div x-show="aboutLang === 'de'" class="space-y-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Badge Text (Deutsch)</label>
                    <input 
                        type="text" 
                        name="about_hero_badge_de" 
                        value="{{ old('about_hero_badge_de', $settings['about_hero_badge_de'] ?? '') }}"
                        placeholder="z.B. Staatlich anerkannte Ausbildungsstätte • Goethe-Institut Standard"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Main Title (Deutsch)</label>
                    <input 
                        type="text" 
                        name="about_hero_title_de" 
                        value="{{ old('about_hero_title_de', $settings['about_hero_title_de'] ?? '') }}"
                        placeholder="z.B. Qualifizierte Fachkräfte für Karrieren in Deutschland"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Subtitle / Description (Deutsch)</label>
                    <textarea 
                        name="about_hero_subtitle_de" 
                        rows="3"
                        placeholder="z.B. Vorbereitung auf Ausbildung und berufliche Integration in Deutschland."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('about_hero_subtitle_de', $settings['about_hero_subtitle_de'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Vision Statement (Deutsch)</label>
                    <textarea 
                        name="about_visi_de" 
                        rows="3"
                        placeholder="z.B. Führendes Institut für berufliche Bildung nach nationalen und internationalen Kompetenzstandards."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('about_visi_de', $settings['about_visi_de'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Öffnungszeiten (Deutsch)</label>
                    <input 
                        type="text" 
                        name="about_operating_hours_de" 
                        value="{{ old('about_operating_hours_de', $settings['about_operating_hours_de'] ?? '') }}"
                        placeholder="z.B. Montag - Samstag: 08:30 - 17:00 Uhr (WIB)"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>
        </div>

        <!-- TAB: Theme Colors -->
        <div x-show="currentTab === 'colors'" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <h3 class="text-base font-bold text-white border-b border-white/10 pb-3 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                Theme Palette & Branding Colors
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Primary Color -->
                <div class="p-4 bg-white/5 border border-white/10 rounded-xl space-y-3">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider">Primary Dark Color</label>
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
                            class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <p class="text-[11px] text-slate-400">Default: #2C0B1E (Deep Burgundy Plum)</p>
                </div>

                <!-- Gold Accent Color -->
                <div class="p-4 bg-white/5 border border-white/10 rounded-xl space-y-3">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider">Gold Accent Color</label>
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
                            class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <p class="text-[11px] text-slate-400">Default: #E2B842 (Vibrant German Gold)</p>
                </div>

                <!-- Gold Hover Color -->
                <div class="p-4 bg-white/5 border border-white/10 rounded-xl space-y-3">
                    <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider">Gold Hover State</label>
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
                            class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <p class="text-[11px] text-slate-400">Default: #CFA230 (Hover darker gold)</p>
                </div>
            </div>
        </div>

        <!-- Sticky Save Button at Bottom -->
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-white/10">
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
