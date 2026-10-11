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
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-[#240919] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">{{ $isEdit ? 'Edit Article' : 'Write New Article' }}</h2>
            <p class="text-xs text-slate-400 mt-1">Configure article content, featured visuals, structured schema, and search engine optimization (SEO).</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.blogs.index') }}" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/15 text-slate-200 text-xs font-semibold transition-all">
                &larr; Cancel & Return
            </a>
            <button type="submit" form="blog-form" class="px-6 py-2.5 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] text-xs font-bold shadow-lg shadow-[#E2B842]/20 transition-all flex items-center gap-2 cursor-pointer">
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
            <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-5 shadow-xl">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Article Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        x-model="title"
                        @input="syncSlugAndSeo()"
                        required 
                        placeholder="e.g. Complete Guide to German Student Visa 2026"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white font-bold text-base focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                    @error('title')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Permanent URL Slug</label>
                    <div class="flex items-center">
                        <span class="px-3 py-3 bg-white/10 text-slate-400 text-xs border border-r-0 border-white/10 rounded-l-xl select-none font-mono">/blog/</span>
                        <input 
                            type="text" 
                            name="slug" 
                            x-model="slug"
                            required
                            class="flex-1 px-4 py-3 bg-white/5 border border-white/10 rounded-r-xl text-white font-mono text-xs focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                        >
                    </div>
                    @error('slug')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Short Excerpt -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Short Summary / Excerpt</label>
                    <textarea 
                        name="excerpt" 
                        rows="3"
                        placeholder="A concise 1-2 sentence teaser shown on blog listings and social cards..."
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >{{ old('excerpt', $blog->excerpt ?? '') }}</textarea>
                </div>

                <!-- Featured Image Upload -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Featured Banner Image</label>
                    <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/10">
                        @if($isEdit && $blog->featured_image)
                            <div class="shrink-0 w-24 h-16 rounded-lg overflow-hidden bg-black/40 border border-white/10">
                                <img src="{{ $blog->featured_image }}" alt="Current image" class="w-full h-full object-cover">
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <input 
                                type="file" 
                                name="featured_image" 
                                accept="image/*"
                                class="text-xs text-slate-300 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-[#E2B842] file:text-[#2C0B1E] hover:file:bg-[#cfa230] cursor-pointer"
                            >
                            <p class="text-[11px] text-slate-400 mt-1">Recommended: 1200x630px JPG, PNG, or WebP (Max 3MB).</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full Article Content Card -->
            <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-4 shadow-xl">
                <div class="flex items-center justify-between border-b border-white/10 pb-3">
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Full Article Body (HTML / Markdown Supported)</label>
                    <span class="text-[11px] text-slate-400">Supports &lt;h2&gt;, &lt;h3&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;strong&gt;, etc.</span>
                </div>

                <textarea 
                    name="content" 
                    rows="16"
                    required
                    placeholder="<h2>Write your section heading here</h2><p>Article body paragraphs...</p>"
                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white font-mono text-sm leading-relaxed focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >{{ old('content', $blog->content ?? '') }}</textarea>
                @error('content')
                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Key Takeaways Repeater (Interactive) -->
            <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-4 shadow-xl">
                <div class="flex items-center justify-between border-b border-white/10 pb-3">
                    <div>
                        <h3 class="text-sm font-bold text-white flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                            Key Takeaways (Highlights Box)
                        </h3>
                        <p class="text-xs text-slate-400">Displayed at the top of the article as bulleted core summary points.</p>
                    </div>
                    <button 
                        type="button" 
                        @click="addTakeaway()"
                        class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/15 text-xs text-[#E2B842] font-semibold transition-all cursor-pointer"
                    >
                        + Add Bullet
                    </button>
                </div>

                <div class="space-y-3">
                    <template x-for="(item, index) in takeaways" :key="index">
                        <div class="flex items-center gap-2">
                            <span class="text-xs text-[#E2B842] font-bold" x-text="(index + 1) + '.'"></span>
                            <input 
                                type="text" 
                                :name="'key_takeaways[' + index + ']'" 
                                x-model="takeaways[index]"
                                placeholder="Summary highlight takeaway..."
                                class="flex-1 px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                            >
                            <button 
                                type="button" 
                                @click="removeTakeaway(index)"
                                class="p-2 text-slate-500 hover:text-rose-400 rounded-lg"
                                title="Remove item"
                            >
                                &times;
                            </button>
                        </div>
                    </template>
                    <div x-show="takeaways.length === 0" class="text-xs text-slate-500 italic py-2">
                        No takeaways added yet. Click "+ Add Bullet" above to add highlights.
                    </div>
                </div>
            </div>

            <!-- FAQ Schema Repeater (Interactive) -->
            <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 space-y-4 shadow-xl">
                <div class="flex items-center justify-between border-b border-white/10 pb-3">
                    <div>
                        <h3 class="text-sm font-bold text-white flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                            FAQ Schema & Accordions (Rich Google Snippet)
                        </h3>
                        <p class="text-xs text-slate-400">Automatically generates Google FAQPage JSON-LD rich snippet schema.</p>
                    </div>
                    <button 
                        type="button" 
                        @click="addFaq()"
                        class="px-3 py-1.5 rounded-lg bg-white/10 hover:bg-white/15 text-xs text-[#E2B842] font-semibold transition-all cursor-pointer"
                    >
                        + Add Question
                    </button>
                </div>

                <div class="space-y-4">
                    <template x-for="(faq, index) in faqs" :key="index">
                        <div class="p-4 rounded-xl bg-white/5 border border-white/10 space-y-3 relative group">
                            <div class="flex items-center justify-between">
                                <span class="text-xs font-bold text-[#E2B842]" x-text="'Question #' + (index + 1)"></span>
                                <button 
                                    type="button" 
                                    @click="removeFaq(index)"
                                    class="text-xs text-rose-400 hover:underline cursor-pointer"
                                >
                                    Delete Question
                                </button>
                            </div>
                            <input 
                                type="text" 
                                :name="'faq_schema[' + index + '][question]'" 
                                x-model="faq.question"
                                placeholder="What are the requirements for...?"
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                            >
                            <textarea 
                                :name="'faq_schema[' + index + '][answer]'" 
                                x-model="faq.answer"
                                rows="2"
                                placeholder="The detailed answer here..."
                                class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-lg text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                            ></textarea>
                        </div>
                    </template>
                    <div x-show="faqs.length === 0" class="text-xs text-slate-500 italic py-2">
                        No FAQ items added yet. Click "+ Add Question" to enable Google rich snippet FAQs.
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: Publishing, SEO & Live SERP Preview (1 Col) -->
        <div class="space-y-6">
            <!-- Publishing Status Card -->
            <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 space-y-5 shadow-xl">
                <h3 class="text-sm font-bold text-white border-b border-white/10 pb-3">Publication Settings</h3>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Publish Status</label>
                    <select 
                        name="status" 
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                        <option value="published" class="bg-[#1e0715]" {{ old('status', $blog->status ?? 'published') === 'published' ? 'selected' : '' }}>Published (Live)</option>
                        <option value="draft" class="bg-[#1e0715]" {{ old('status', $blog->status ?? '') === 'draft' ? 'selected' : '' }}>Draft (Private)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Publish Date (Optional)</label>
                    <input 
                        type="datetime-local" 
                        name="published_at" 
                        value="{{ old('published_at', isset($blog) && $blog->published_at ? $blog->published_at->format('Y-m-d\TH:i') : '') }}"
                        class="w-full px-4 py-2 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                    >
                    <p class="text-[11px] text-slate-400 mt-1">Leave empty to set publication time automatically upon publishing.</p>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Category</label>
                    <select 
                        name="category_id" 
                        required
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" class="bg-[#1e0715]" {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="pt-2">
                    <label class="flex items-center text-xs text-slate-300 cursor-pointer select-none">
                        <input 
                            type="checkbox" 
                            name="is_featured" 
                            value="1"
                            {{ old('is_featured', $blog->is_featured ?? false) ? 'checked' : '' }}
                            class="w-4 h-4 rounded border-white/20 bg-white/5 text-[#E2B842] focus:ring-[#E2B842]"
                        >
                        <span class="ml-2 font-semibold">Feature this article on top</span>
                    </label>
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] font-bold text-xs rounded-xl shadow-lg shadow-[#E2B842]/20 transition-all cursor-pointer"
                >
                    {{ $isEdit ? 'Save Changes' : 'Publish Article Now' }}
                </button>
            </div>

            <!-- SEO Parameters Card -->
            <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 space-y-5 shadow-xl">
                <h3 class="text-sm font-bold text-white border-b border-white/10 pb-3 flex items-center justify-between">
                    <span>SEO Meta Settings</span>
                    <span class="text-[10px] text-emerald-400 uppercase font-extrabold">Active</span>
                </h3>

                <!-- Focus Keyword -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Focus Keyword</label>
                    <input 
                        type="text" 
                        name="focus_keyword" 
                        x-model="focusKeyword"
                        placeholder="e.g. German Course Jakarta"
                        class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- Meta Title -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">SEO Title Tag</label>
                        <span class="text-[10px] font-mono" :class="metaTitle.length > 60 ? 'text-amber-400' : 'text-slate-400'" x-text="metaTitle.length + '/60'"></span>
                    </div>
                    <input 
                        type="text" 
                        name="meta_title" 
                        x-model="metaTitle"
                        placeholder="Page title displayed in search engines"
                        class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- Meta Description -->
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">Meta Description</label>
                        <span class="text-[10px] font-mono" :class="metaDescription.length > 160 ? 'text-amber-400' : 'text-slate-400'" x-text="metaDescription.length + '/160'"></span>
                    </div>
                    <textarea 
                        name="meta_description" 
                        x-model="metaDescription"
                        rows="3"
                        placeholder="Search snippet summary shown under the link in Google..."
                        class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                    ></textarea>
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Article Tags</label>
                    <input 
                        type="text" 
                        name="tags" 
                        value="{{ old('tags', $blog->tags ?? '') }}"
                        placeholder="Goethe A1, Germany, Visa (comma separated)"
                        class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                    >
                </div>

                <!-- Canonical URL -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Canonical URL (Optional)</label>
                    <input 
                        type="text" 
                        name="canonical_url" 
                        value="{{ old('canonical_url', $blog->canonical_url ?? '') }}"
                        placeholder="https://..."
                        class="w-full px-3 py-2 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-1 focus:ring-[#E2B842]"
                    >
                </div>
            </div>

            <!-- LIVE GOOGLE SERP PREVIEW CARD -->
            <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 space-y-3 shadow-xl">
                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                    </svg>
                    Google Search Preview (SERP)
                </h4>

                <div class="bg-white rounded-xl p-4 text-left shadow-md border border-slate-200">
                    <!-- SERP URL Line -->
                    <div class="flex items-center gap-1.5 text-[11px] text-[#202124] truncate">
                        <span class="w-4 h-4 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-[9px] font-bold text-slate-600">M</span>
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
