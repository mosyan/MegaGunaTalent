@extends('layouts.admin')

@php
    $isEdit = isset($blog);
    $pageTitle = $isEdit ? 'Edit Article: ' . $blog->title : 'Create New Article';
@endphp

@section('title', $pageTitle)
@section('page_title', $pageTitle)

@section('content')
<div x-data="blogFormApp()" class="space-y-6">
    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">{{ $isEdit ? 'Edit Article' : 'Write New Article' }}</h2>
            <p class="text-xs text-slate-500 mt-1">Configure article content, featured visuals, structured schema, and search engine optimization (SEO).</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.blogs.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold border border-slate-200 transition-all">
                &larr; Cancel & Return
            </a>
            <button type="submit" form="blog-form" class="px-6 py-2.5 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] text-xs font-bold shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ $isEdit ? 'Update Article' : 'Publish Article' }}
            </button>
        </div>
    </div>

    <!-- Main Grid Form -->
    <form id="blog-form" action="{{ $isEdit ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @csrf
        @if($isEdit)
            @method('PUT')
        @endif

        <!-- LEFT COLUMN: Main Article Content (2 Cols) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Article Header Details Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-5 shadow-xs">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Article Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        x-model="title"
                        @input="syncSlugAndSeo()"
                        required 
                        placeholder="e.g. Complete Guide to German Student Visa 2026"
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-bold text-base focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all"
                    >
                    @error('title')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Permanent URL Slug</label>
                    <div class="flex items-center">
                        <span class="px-3 py-3 bg-slate-100 text-slate-500 text-xs border border-r-0 border-slate-200 rounded-l-xl select-none font-mono">/blog/</span>
                        <input 
                            type="text" 
                            name="slug" 
                            x-model="slug"
                            required
                            class="flex-1 px-4 py-3 bg-slate-50 border border-slate-200 rounded-r-xl text-slate-900 font-mono text-xs focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all"
                        >
                    </div>
                    @error('slug')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Excerpt -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Short Summary / Excerpt</label>
                    <textarea 
                        name="excerpt" 
                        rows="3"
                        placeholder="A concise 1-2 sentence teaser shown on blog listings and social cards..."
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all resize-none"
                    >{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                </div>

                <!-- Featured Image Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Featured Banner Image</label>
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-slate-50 border border-slate-200">
                        @if($isEdit && $blog->featured_image)
                            <div class="shrink-0 w-24 h-16 rounded-lg overflow-hidden bg-slate-200 border border-slate-300">
                                <img src="{{ $blog->featured_image }}" alt="Current image" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input 
                                type="file" 
                                name="featured_image" 
                                accept="image/*"
                                class="text-xs text-slate-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer"
                            >
                            <p class="text-[11px] text-slate-500 mt-1">Recommended: 1200x630px JPG, PNG, or WebP (Max 3MB).</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full Article Content Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-4 shadow-xs">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Full Article Body (HTML / Markdown Supported)</label>
                    <span class="text-[11px] text-slate-500">Supports &lt;h2&gt;, &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;strong&gt;, etc.</span>
                </div>

                <textarea 
                    name="content" 
                    rows="16"
                    required
                    placeholder="<h2>Write your section heading here</h2><p>Article body paragraphs...</p>"
                    class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 font-mono text-sm leading-relaxed focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all"
                >{{ old('content', $blog->content ?? '') }}</textarea>
                @error('content')
                    <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Key Takeaways Repeater (Interactive) -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-4 shadow-xs">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                            Key Takeaways (Highlights Box)
                        </h3>
                        <p class="text-xs text-slate-500">Displayed at the top of the article as bulleted core summary points.</p>
                    </div>
                    <button 
                        type="button" 
                        @click="addTakeaway()"
                        class="px-3 py-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 border border-amber-200 text-xs text-amber-800 font-semibold transition-all cursor-pointer"
                    >
                        + Add Bullet
                    </button>
                </div>

                <div class="space-y-3">
                    <template x-for="(item, index) in takeaways" :key="index">
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-amber-700 font-bold" x-text="(index + 1) + '.'"></span>
                            <input 
                                type="text" 
                                :name="'key_takeaways[' + index + ']'" 
                                x-model="takeaways[index]"
                                placeholder="Summary highlight takeaway..."
                                class="flex-1 px-3 py-2 bg-slate-50 border border-slate-200 rounded-lg text-slate-900 text-xs focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all"
                            >
                            <button 
                                type="button" 
                                @click="removeTakeaway(index)"
                                class="p-2 text-slate-400 hover:text-rose-600 rounded-lg cursor-pointer"
                                title="Remove item"
                            >
                                &times;
                            </button>
                        </div>
                    </template>
                    <div x-show="takeaways.length === 0" class="text-xs text-slate-400 italic py-2">
                        No takeaways added yet. Click "+ Add Bullet" above to add highlights.
                    </div>
                </div>
            </div>

            <!-- FAQ Schema Repeater (Interactive) -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 sm:p-8 space-y-4 shadow-xs">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                            FAQ Schema & Accordions (Rich Google Snippet)
                        </h3>
                        <p class="text-xs text-slate-500">Automatically generates Google FAQPage JSON-LD rich snippet schema.</p>
                    </div>
                    <button 
                        type="button" 
                        @click="addFaq()"
                        class="px-3 py-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 border border-amber-200 text-xs text-amber-800 font-semibold transition-all cursor-pointer"
                    >
                        + Add Question
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(faq, index) in faqs" :key="index">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200 space-y-3 relative group">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-amber-800" x-text="'Question #' + (index + 1)"></span>
                                <button 
                                    type="button" 
                                    @click="removeFaq(index)"
                                    class="text-xs text-rose-600 hover:underline cursor-pointer"
                                >
                                    Delete Question
                                </button>
                            </div>
                            <input 
                                type="text" 
                                :name="'faq_schema[' + index + '][question]'" 
                                x-model="faq.question"
                                placeholder="What are the requirements for...?"
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all"
                            >
                            <textarea 
                                :name="'faq_schema[' + index + '][answer]'" 
                                x-model="faq.answer"
                                rows="2"
                                placeholder="The detailed answer here..."
                                class="w-full px-3 py-2 bg-white border border-slate-200 rounded-lg text-slate-900 text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all resize-none"
                            ></textarea>
                        </div>
                    </template>
                    <div x-show="faqs.length === 0" class="text-xs text-slate-400 italic py-2">
                        No FAQ items added yet. Click "+ Add Question" to enable Google rich snippet FAQs.
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: Publishing, SEO & Live SERP Preview (1 Col) -->
        <div class="space-y-6">
            <!-- Publishing Status Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 space-y-5 shadow-xs">
                <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3">Publication Settings</h3>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Publish Status</label>
                    <select 
                        name="status" 
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all"
                    >
                        <option value="published" {{ old('status', $blog->status ?? 'published') === 'published' ? 'selected' : '' }}>Published (Live)</option>
                        <option value="draft" {{ old('status', $blog->status ?? '') === 'draft' ? 'selected' : '' }}>Draft (Private)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Publish Date (Optional)</label>
                    <input 
                        type="datetime-local" 
                        name="published_at" 
                        value="{{ old('published_at', isset($blog) && $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
                        class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-xs focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all"
                    >
                    <p class="text-[11px] text-slate-500 mt-1">Leave empty to set publication time automatically upon publishing.</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Category</label>
                    <select 
                        name="category_id" 
                        required
                        class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all"
                    >
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-2">
                    <label class="flex items-center text-xs text-slate-700 cursor-pointer select-none">
                        <input 
                            type="checkbox" 
                            name="is_featured" 
                            value="1"
                            {{ old('is_featured', $blog->is_featured ?? false) ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-slate-300 text-amber-500 focus:ring-[#E2B842]"
                        >
                        <span class="ml-2 font-semibold">Feature this article on top</span>
                    </label>
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] font-bold text-xs rounded-xl shadow-xs transition-all cursor-pointer"
                >
                    {{ $isEdit ? 'Save Changes' : 'Publish Article Now' }}
                </button>
            </div>

            <!-- SEO Parameters Card -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 space-y-5 shadow-xs">
                <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3 flex items-center justify-between">
                    <span>SEO Meta Settings</span>
                    <span class="text-[10px] text-emerald-700 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded uppercase font-extrabold">Active</span>
                </h3>

                <!-- Focus Keyword -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Focus Keyword</label>
                    <input 
                        type="text" 
                        name="focus_keyword" 
                        x-model="focusKeyword"
                        placeholder="e.g. German Course Jakarta"
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-xs focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all"
                    >
                </div>

                <!-- Meta Title -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">SEO Title Tag</label>
                        <span class="text-[10px] font-mono" :class="metaTitle.length > 60 ? 'text-amber-600 font-bold' : 'text-slate-400'" x-text="metaTitle.length + '/60'"></span>
                    </div>
                    <input 
                        type="text" 
                        name="meta_title" 
                        x-model="metaTitle"
                        placeholder="Page title displayed in search engines"
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-xs focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all"
                    >
                </div>

                <!-- Meta Description -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider">Meta Description</label>
                        <span class="text-[10px] font-mono" :class="metaDescription.length > 160 ? 'text-amber-600 font-bold' : 'text-slate-400'" x-text="metaDescription.length + '/160'"></span>
                    </div>
                    <textarea 
                        name="meta_description" 
                        x-model="metaDescription"
                        rows="3"
                        placeholder="Search snippet summary shown under the link in Google..."
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-xs focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all resize-none"
                    ></textarea>
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Article Tags</label>
                    <input 
                        type="text" 
                        name="tags" 
                        value="{{ old('tags', $blog->tags ?? '') }}"
                        placeholder="Goethe A1, Germany, Visa (comma separated)"
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-xs focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all"
                    >
                </div>

                <!-- Canonical URL -->
                <div>
                    <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-1">Canonical URL (Optional)</label>
                    <input 
                        type="text" 
                        name="canonical_url" 
                        value="{{ old('canonical_url', $blog->canonical_url ?? '') }}"
                        placeholder="https://..."
                        class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-xs focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#E2B842] transition-all"
                    >
                </div>
            </div>

            <!-- LIVE GOOGLE SERP PREVIEW CARD -->
            <div class="bg-white border border-slate-200/90 rounded-2xl p-6 space-y-3 shadow-xs">
                <h4 class="text-xs font-bold text-slate-600 uppercase tracking-wider flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                    </svg>
                    Google Search Preview (SERP)
                </h4>

                <div class="bg-slate-50 rounded-xl p-4 text-left border border-slate-200">
                    <!-- SERP URL Line -->
                    <div class="flex items-center gap-1.5 text-[11px] text-[#202124] truncate">
                        <span class="w-4 h-4 rounded-full bg-white border border-slate-200 flex items-center justify-center text-[9px] font-bold text-slate-600">M</span>
                        <span class="text-[#202124] font-medium">megagunatalent.com</span>
                        <span class="text-slate-400">&rsaquo;</span>
                        <span class="text-slate-500 font-mono truncate" x-text="'blog/' + (slug || 'article-slug')"></span>
                    </div>

                    <!-- SERP Title -->
                    <h5 class="text-[#1a0dab] text-base hover:underline font-medium cursor-pointer mt-1 line-clamp-1" x-text="metaTitle || title || 'Article Title Goes Here'"></h5>

                    <!-- SERP Description -->
                    <p class="text-[#4d5156] text-xs mt-1 line-clamp-2 leading-relaxed" x-text="metaDescription || 'Add an informative meta description to see how this article will appear in search results.'"></p>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function blogFormApp() {
        return {
            title: @json(old('title', $blog->title ?? '')),
            slug: @json(old('slug', $blog->slug ?? '')),
            metaTitle: @json(old('meta_title', $blog->meta_title ?? '')),
            metaDescription: @json(old('meta_description', $blog->meta_description ?? '')),
            focusKeyword: @json(old('focus_keyword', $blog->focus_keyword ?? '')),
            takeaways: @json(old('key_takeaways', $blog->key_takeaways ?? [])),
            faqs: @json(old('faq_schema', $blog->faq_schema ?? [])),

            syncSlugAndSeo() {
                if (!@json($isEdit) || !this.slug) {
                    this.slug = this.title
                        .toLowerCase()
                        .trim()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                }
                if (!this.metaTitle) {
                    this.metaTitle = this.title;
                }
            },

            addTakeaway() {
                this.takeaways.push('');
            },

            removeTakeaway(index) {
                this.takeaways.splice(index, 1);
            },

            addFaq() {
                this.faqs.push({ question: '', answer: '' });
            },

            removeFaq(index) {
                this.faqs.splice(index, 1);
            }
        };
    }
</script>
@endpush
@endsection
