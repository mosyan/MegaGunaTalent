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
        <div x-show="currentTab === 'hero'" x-data="{ heroLang: 'id' }" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-white/10 pb-3">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                    Hero Section Headline, Buttons & Trust Badges
                </h3>
                <div class="flex items-center gap-1.5 bg-black/40 p-1 rounded-xl border border-white/10 shrink-0">
                    <span class="text-[11px] text-slate-400 font-semibold px-2">Bahasa:</span>
                    <button type="button" @click="heroLang = 'id'" :class="heroLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                    <button type="button" @click="heroLang = 'en'" :class="heroLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                    <button type="button" @click="heroLang = 'de'" :class="heroLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                </div>
            </div>

            <!-- ID Hero Texts -->
            <div x-show="heroLang === 'id'" class="space-y-6">
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

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Primary CTA Button Label (Indonesia)</label>
                    <input 
                        type="text" 
                        name="hero_primary_btn_text" 
                        value="{{ old('hero_primary_btn_text', $settings['hero_primary_btn_text'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- EN Hero Texts -->
            <div x-show="heroLang === 'en'" class="space-y-6">
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
                            placeholder="e.g. Master German Language"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Line 2 (English)</label>
                        <input 
                            type="text" 
                            name="hero_title_line2_en" 
                            value="{{ old('hero_title_line2_en', $settings['hero_title_line2_en'] ?? '') }}"
                            placeholder="e.g. With Confidence & Excellence"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Subtitle Paragraph (English)</label>
                    <textarea 
                        name="hero_subtitle_en" 
                        rows="3"
                        placeholder="e.g. Comprehensive German training from A1 to C1 with certified native instructors."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('hero_subtitle_en', $settings['hero_subtitle_en'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Primary CTA Button Label (English)</label>
                    <input 
                        type="text" 
                        name="hero_primary_btn_text_en" 
                        value="{{ old('hero_primary_btn_text_en', $settings['hero_primary_btn_text_en'] ?? '') }}"
                        placeholder="e.g. Enroll Now"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- DE Hero Texts -->
            <div x-show="heroLang === 'de'" class="space-y-6">
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
                            placeholder="z.B. Deutsch lernen mit Erfolg"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Headline Line 2 (Deutsch)</label>
                        <input 
                            type="text" 
                            name="hero_title_line2_de" 
                            value="{{ old('hero_title_line2_de', $settings['hero_title_line2_de'] ?? '') }}"
                            placeholder="z.B. Für Ausbildung & Karriere"
                            class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Subtitle Paragraph (Deutsch)</label>
                    <textarea 
                        name="hero_subtitle_de" 
                        rows="3"
                        placeholder="z.B. Umfassende Vorbereitung auf Goethe-Zertifikate von A1 bis C1."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('hero_subtitle_de', $settings['hero_subtitle_de'] ?? '') }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Primary CTA Button Label (Deutsch)</label>
                    <input 
                        type="text" 
                        name="hero_primary_btn_text_de" 
                        value="{{ old('hero_primary_btn_text_de', $settings['hero_primary_btn_text_de'] ?? '') }}"
                        placeholder="z.B. Jetzt anmelden"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- Primary and Secondary Buttons URLs -->
            <div class="pt-4 border-t border-white/5 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Primary Button URL -->
                <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-2">
                    <span class="text-xs font-bold text-[#E2B842] uppercase tracking-wider">Primary Button Target URL</span>
                    <input 
                        type="text" 
                        name="hero_primary_btn_url" 
                        value="{{ old('hero_primary_btn_url', $settings['hero_primary_btn_url'] ?? '') }}"
                        class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- Secondary Button -->
                <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-4">
                    <span class="text-xs font-bold text-slate-300 uppercase tracking-wider">Secondary Button (Ghost/Outline)</span>
                    <div>
                        <label class="block text-[11px] text-slate-400 uppercase mb-1">Button Label</label>
                        <input 
                            type="text" 
                            name="hero_secondary_btn_text" 
                            value="{{ old('hero_secondary_btn_text', $settings['hero_secondary_btn_text'] ?? '') }}"
                            class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    <div>
                        <label class="block text-[11px] text-slate-400 uppercase mb-1">Button Link URL / Anchor</label>
                        <input 
                            type="text" 
                            name="hero_secondary_btn_url" 
                            value="{{ old('hero_secondary_btn_url', $settings['hero_secondary_btn_url'] ?? '') }}"
                            class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                </div>
            </div>

            <!-- Hero Visual Backgrounds & Landmark Graphic -->
            <div class="pt-4 border-t border-white/5 space-y-4">
                <h4 class="text-sm font-bold text-white">Hero Visuals & Graphics</h4>
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

            <!-- 3 Stat Badges -->
            <div class="pt-4 border-t border-white/5 space-y-3">
                <h4 class="text-sm font-bold text-white">Trust & Achievement Statistics (Floating Cards)</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-3 bg-white/5 border border-white/10 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-400 uppercase">Stat 1</label>
                        <input type="text" name="hero_stat_1_val" value="{{ old('hero_stat_1_val', $settings['hero_stat_1_val'] ?? '') }}" placeholder="98%" class="w-full px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm">
                        <input type="text" name="hero_stat_1_lbl" value="{{ old('hero_stat_1_lbl', $settings['hero_stat_1_lbl'] ?? '') }}" placeholder="Goethe Pass Rate" class="w-full px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-white text-xs">
                    </div>
                    <div class="p-3 bg-white/5 border border-white/10 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-400 uppercase">Stat 2</label>
                        <input type="text" name="hero_stat_2_val" value="{{ old('hero_stat_2_val', $settings['hero_stat_2_val'] ?? '') }}" placeholder="1,500+" class="w-full px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm">
                        <input type="text" name="hero_stat_2_lbl" value="{{ old('hero_stat_2_lbl', $settings['hero_stat_2_lbl'] ?? '') }}" placeholder="Alumni in Germany" class="w-full px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-white text-xs">
                    </div>
                    <div class="p-3 bg-white/5 border border-white/10 rounded-xl space-y-2">
                        <label class="block text-[11px] text-slate-400 uppercase">Stat 3</label>
                        <input type="text" name="hero_stat_3_val" value="{{ old('hero_stat_3_val', $settings['hero_stat_3_val'] ?? '') }}" placeholder="100%" class="w-full px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-white text-sm">
                        <input type="text" name="hero_stat_3_lbl" value="{{ old('hero_stat_3_lbl', $settings['hero_stat_3_lbl'] ?? '') }}" placeholder="Certified Teachers" class="w-full px-3 py-1.5 bg-white/5 border border-white/10 rounded-lg text-white text-xs">
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: Programs Section -->
        <div x-show="currentTab === 'programs'" x-data="{ progLang: 'id' }" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-white/10 pb-3">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                    Course Programs Heading & Cards Customizer
                </h3>
                <div class="flex items-center gap-1.5 bg-black/40 p-1 rounded-xl border border-white/10 shrink-0">
                    <span class="text-[11px] text-slate-400 font-semibold px-2">Bahasa:</span>
                    <button type="button" @click="progLang = 'id'" :class="progLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                    <button type="button" @click="progLang = 'en'" :class="progLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                    <button type="button" @click="progLang = 'de'" :class="progLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
                </div>
            </div>

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
        <div x-show="currentTab === 'cta'" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <h3 class="text-base font-bold text-white border-b border-white/10 pb-3 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                Call-to-Action (CTA) Conversion Banner
            </h3>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Pill Badge</label>
                <input 
                    type="text" 
                    name="cta_badge" 
                    value="{{ old('cta_badge', $settings['cta_badge'] ?? '') }}"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Heading</label>
                <input 
                    type="text" 
                    name="cta_title" 
                    value="{{ old('cta_title', $settings['cta_title'] ?? '') }}"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Subtitle</label>
                <textarea 
                    name="cta_subtitle" 
                    rows="3"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >{{ old('cta_subtitle', $settings['cta_subtitle'] ?? '') }}</textarea>
            </div>

            <!-- CTA Background Image Upload -->
            <div class="pt-4 border-t border-white/5">
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-white/5">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Button Text</label>
                    <input 
                        type="text" 
                        name="cta_button_text" 
                        value="{{ old('cta_button_text', $settings['cta_button_text'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">CTA Button Target URL</label>
                    <input 
                        type="text" 
                        name="cta_button_url" 
                        value="{{ old('cta_button_url', $settings['cta_button_url'] ?? '') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>
            </div>
        </div>

        <!-- TAB: Footer & Social -->
        <div x-show="currentTab === 'footer'" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <h3 class="text-base font-bold text-white border-b border-white/10 pb-3 flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                Footer Content & Social Media Links
            </h3>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">About Description</label>
                <textarea 
                    name="footer_about" 
                    rows="3"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >{{ old('footer_about', $settings['footer_about'] ?? '') }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Copyright Text</label>
                <input 
                    type="text" 
                    name="footer_copyright" 
                    value="{{ old('footer_copyright', $settings['footer_copyright'] ?? '') }}"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
            </div>

            <div class="pt-4 border-t border-white/5">
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
        <!-- TAB: About Us Page -->
        <div x-show="currentTab === 'about'" x-data="{ aboutLang: 'id' }" class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xl">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-white/10 pb-3">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                    About Us Page Content & Institutional Information
                </h3>
                <div class="flex items-center gap-1.5 bg-black/40 p-1 rounded-xl border border-white/10 shrink-0">
                    <span class="text-[11px] text-slate-400 font-semibold px-2">Bahasa:</span>
                    <button type="button" @click="aboutLang = 'id'" :class="aboutLang === 'id' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇮🇩 ID (Utama)</button>
                    <button type="button" @click="aboutLang = 'en'" :class="aboutLang === 'en' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇬🇧 EN</button>
                    <button type="button" @click="aboutLang = 'de'" :class="aboutLang === 'de' ? 'bg-[#E2B842] text-[#2C0B1E] font-bold shadow' : 'text-slate-300 hover:text-white'" class="px-2.5 py-1 rounded-lg text-xs transition-all cursor-pointer">🇩🇪 DE</button>
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
                        value="{{ old('about_hero_badge', $settings['about_hero_badge'] ?? 'LPK Resmi Kemnaker RI • SKKNI & Goethe-Institut Standard') }}"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- Hero Title -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Hero Main Title (Indonesia)</label>
                    <input 
                        type="text" 
                        name="about_hero_title" 
                        value="{{ old('about_hero_title', $settings['about_hero_title'] ?? 'Membangun Generasi Kompeten & Siap Berkarier Global di Jerman') }}"
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
                    >{{ old('about_hero_subtitle', $settings['about_hero_subtitle'] ?? 'LPK Mega Guna Talent adalah Lembaga Pelatihan Kerja terakreditasi yang berdedikasi menempa talenta muda Indonesia dengan penguasaan bahasa Jerman berstandar internasional, penguatan etos kerja profesional, dan fasilitas pembelajaran modern.') }}</textarea>
                </div>

                <!-- Visi Utama -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Visi Utama Lembaga (Indonesia)</label>
                    <textarea 
                        name="about_visi" 
                        rows="3"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('about_visi', $settings['about_visi'] ?? 'Menjadi Lembaga Pelatihan Kerja Yang Terdepan Dalam Membangun SDM Kompeten Sesuai Dengan Standar Kompetensi Kerja Nasional dan Internasional') }}</textarea>
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
            </div>

            <!-- Jam Operasional -->
            <div class="pt-4 border-t border-white/5">
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Jam Operasional Kampus</label>
                <input 
                    type="text" 
                    name="about_operating_hours" 
                    value="{{ old('about_operating_hours', $settings['about_operating_hours'] ?? 'Senin - Sabtu: 08:30 - 17:00 WIB') }}"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
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
