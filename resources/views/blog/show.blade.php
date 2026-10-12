@extends('layouts.app')

@section('title', $blog->meta_title ?: $blog->title . ' - Mega Guna Talent')
@section('meta_description', $blog->meta_description ?: ($blog->excerpt ?: Str::limit(strip_tags($blog->content), 150)))

@push('styles')
    <!-- Open Graph & Twitter SEO -->
    <meta property="og:title" content="{{ $blog->meta_title ?: $blog->title }}">
    <meta property="og:description" content="{{ $blog->meta_description ?: ($blog->excerpt ?: Str::limit(strip_tags($blog->content), 150)) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($blog->featured_image)
        <meta property="og:image" content="{{ asset($blog->featured_image) }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->meta_title ?: $blog->title }}">
    <meta name="twitter:description" content="{{ $blog->meta_description ?: ($blog->excerpt ?: Str::limit(strip_tags($blog->content), 150)) }}">
    @if($blog->canonical_url)
        <link rel="canonical" href="{{ $blog->canonical_url }}">
    @endif

    <!-- JSON-LD Structured Data: BlogPosting -->
    @php
        $postingSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $blog->title,
            'description' => $blog->meta_description ?: ($blog->excerpt ?: Str::limit(strip_tags($blog->content), 150)),
            'image' => $blog->featured_image ? asset($blog->featured_image) : asset('images/logo.png'),
            'author' => [
                '@type' => 'Organization',
                'name' => $blog->author?->name ?? 'Mega Guna Talent',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Mega Guna Talent',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('images/logo.png'),
                ],
            ],
            'datePublished' => $blog->published_at?->toIso8601String() ?? now()->toIso8601String(),
            'dateModified' => $blog->updated_at->toIso8601String(),
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($postingSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @if(!empty($blog->faq_schema) && is_array($blog->faq_schema) && count($blog->faq_schema) > 0)
        @php
            $faqEntities = [];
            foreach ($blog->faq_schema as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $faqEntities[] = [
                        '@type' => 'Question',
                        'name' => $faq['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['answer'],
                        ],
                    ];
                }
            }
            $faqPageSchema = [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => $faqEntities,
            ];
        @endphp
        @if(count($faqEntities) > 0)
            <script type="application/ld+json">
            {!! json_encode($faqPageSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
            </script>
        @endif
    @endif

    <style>
        .article-content h2 {
            font-family: 'Yeseva One', serif;
            font-size: 1.875rem;
            line-height: 2.25rem;
            color: #ffffff;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(253, 192, 79, 0.2);
        }
        .article-content h3 {
            font-family: 'Arsenal', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: #fdc04f;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        .article-content p {
            font-family: 'Arsenal', sans-serif;
            font-size: 1.15rem;
            line-height: 1.85;
            color: rgba(242, 235, 253, 0.9);
            margin-bottom: 1.5rem;
        }
        .article-content ul, .article-content ol {
            font-family: 'Arsenal', sans-serif;
            font-size: 1.15rem;
            line-height: 1.8;
            color: rgba(242, 235, 253, 0.9);
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }
        .article-content ul { list-style-type: disc; }
        .article-content ol { list-style-type: decimal; }
        .article-content li { margin-bottom: 0.5rem; }
        .article-content strong { color: #fdc04f; font-weight: 700; }
        .article-content blockquote {
            border-left: 4px solid #fdc04f;
            padding-left: 1.25rem;
            margin: 2rem 0;
            font-style: italic;
            color: #fdc04f;
        }
    </style>
@endpush

@section('content')
<article class="pt-32 sm:pt-40 pb-20 px-6 sm:px-12 max-w-5xl mx-auto">
    @if($blog->status !== 'published')
        <div class="mb-8 p-4 rounded-2xl bg-amber-500/20 border border-amber-500/40 text-amber-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 shadow-xl">
            <div class="flex items-center gap-3">
                <span class="px-2.5 py-1 rounded-lg bg-amber-400 text-slate-900 text-xs font-black uppercase tracking-wider shrink-0">Draft Mode</span>
                <span class="text-xs sm:text-sm font-medium">This article is currently a private draft. Only administrators can view this preview.</span>
            </div>
            <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-xs font-bold text-amber-300 hover:text-white flex items-center gap-1 transition-colors shrink-0">
                Edit in Admin Panel &rarr;
            </a>
        </div>
    @endif

    <!-- Breadcrumbs -->
    <nav class="flex items-center gap-2 text-xs text-[#fdc04f] mb-8 overflow-x-auto whitespace-nowrap">
        <a href="{{ route('home') }}" class="hover:underline">{{ __('Home') }}</a>
        <span>&rsaquo;</span>
        <a href="{{ route('blog.index') }}" class="hover:underline">{{ __('Blog') }}</a>
        @if($blog->category)
            <span>&rsaquo;</span>
            <a href="{{ route('blog.category', $blog->category->slug) }}" class="hover:underline">{{ $blog->category->name }}</a>
        @endif
        <span>&rsaquo;</span>
        <span class="text-white/60 truncate max-w-xs">{{ $blog->title }}</span>
    </nav>

    <!-- Header Section -->
    <header class="space-y-6 text-center max-w-4xl mx-auto mb-10">
        @if($blog->category)
            <div class="inline-block">
                <a href="{{ route('blog.category', $blog->category->slug) }}" class="px-3.5 py-1 rounded-full bg-[#fdc04f]/15 border border-[#fdc04f]/30 text-[#fdc04f] text-xs font-bold uppercase tracking-wider hover:bg-[#fdc04f]/25 transition-colors">
                    {{ $blog->category->name }}
                </a>
            </div>
        @endif

        <h1 class="font-yeseva text-3xl sm:text-5xl md:text-6xl text-white tracking-tight leading-tight">
            {{ $blog->title }}
        </h1>

        @if($blog->excerpt)
            <p class="font-arsenal text-lg sm:text-2xl text-[#f2ebfd]/85 leading-relaxed font-normal">
                {{ $blog->excerpt }}
            </p>
        @endif

        <!-- Author, Date & Reading Time Meta -->
        <div class="flex flex-wrap items-center justify-center gap-4 text-xs sm:text-sm text-[#fdc04f] pt-4 border-t border-[#fdc04f]/20">
            <span class="flex items-center gap-1.5 font-bold">
                <span class="w-6 h-6 rounded-full bg-[#fdc04f] text-[#321f47] flex items-center justify-center font-bold text-xs">M</span>
                {{ $blog->author?->name ?? 'Mega Guna Talent' }}
            </span>
            <span>&bull;</span>
            <span>{{ $blog->published_at?->translatedFormat('d F Y') ?? __('Recently') }}</span>
            <span>&bull;</span>
            <span>{{ __(':min min read', ['min' => $blog->reading_time]) }}</span>
            @if($blog->view_count > 0)
                <span>&bull;</span>
                <span>{{ number_format($blog->view_count) }} {{ __('views') }}</span>
            @endif
        </div>
    </header>

    <!-- Featured Banner Image -->
    @if($blog->featured_image)
        <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl border border-white/10 max-h-[520px] bg-black/40">
            <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover">
        </div>
    @endif

    <!-- Key Takeaways Highlight Box -->
    @if(!empty($blog->key_takeaways) && is_array($blog->key_takeaways) && count($blog->key_takeaways) > 0)
        <div class="mb-12 p-6 sm:p-8 rounded-2xl bg-gradient-to-br from-[#240919] to-[#381129] border border-[#fdc04f]/40 shadow-xl">
            <div class="flex items-center gap-2 mb-4 text-[#fdc04f]">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <h3 class="font-yeseva text-xl text-white">{{ __('Key Takeaways') }}</h3>
            </div>
            <ul class="space-y-2.5 font-arsenal text-base sm:text-lg text-[#f2ebfd]/90">
                @foreach($blog->key_takeaways as $takeaway)
                    <li class="flex items-start gap-3">
                        <span class="text-[#fdc04f] text-lg font-bold shrink-0">&check;</span>
                        <span>{{ $takeaway }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Main Article Body -->
    <div class="article-content max-w-4xl mx-auto">
        {!! $blog->content !!}
    </div>

    <!-- Interactive FAQ Section -->
    @if(!empty($blog->faq_schema) && is_array($blog->faq_schema) && count($blog->faq_schema) > 0)
        <div class="mt-16 pt-12 border-t border-[#fdc04f]/20 max-w-4xl mx-auto" x-data="{ openFaq: null }">
            <div class="text-center mb-8">
                <span class="text-xs font-bold uppercase tracking-wider text-[#fdc04f]">{{ __('Frequently Asked Questions') }}</span>
                <h3 class="font-yeseva text-2xl sm:text-3xl text-white mt-1">{{ __('Common Questions About This Topic') }}</h3>
            </div>

            <div class="space-y-4">
                @foreach($blog->faq_schema as $index => $faq)
                    <div class="bg-[#240919] border border-white/10 rounded-2xl overflow-hidden transition-colors">
                        <button 
                            type="button"
                            @click="openFaq = (openFaq === {{ $index }} ? null : {{ $index }})"
                            class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 font-bold text-white text-base sm:text-lg hover:text-[#fdc04f] transition-colors cursor-pointer"
                        >
                            <span>{{ $faq['question'] }}</span>
                            <svg 
                                class="w-5 h-5 text-[#fdc04f] transition-transform duration-200 shrink-0" 
                                :class="openFaq === {{ $index }} ? 'rotate-180' : ''"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openFaq === {{ $index }}" 
                            x-cloak 
                            x-collapse
                            class="px-6 pb-5 pt-1 text-sm sm:text-base text-[#f2ebfd]/80 font-arsenal leading-relaxed border-t border-white/5"
                        >
                            {{ $faq['answer'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Tags & Social Share Footer -->
    <div class="mt-16 pt-8 border-t border-white/10 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6 max-w-4xl mx-auto">
        <!-- Tags -->
        @if($blog->tags)
            <div class="flex flex-wrap items-center gap-2">
                <span class="text-xs font-bold text-slate-400">{{ __('Tags') }}:</span>
                @foreach(array_map('trim', explode(',', $blog->tags)) as $tag)
                    @if(!empty($tag))
                        <span class="px-3 py-1 rounded-lg bg-white/5 border border-white/10 text-xs text-[#fdc04f]">
                            #{{ $tag }}
                        </span>
                    @endif
                @endforeach
            </div>
        @endif

        <!-- Share Links -->
        <div class="flex items-center gap-3">
            <span class="text-xs font-bold text-slate-400">{{ __('Share') }}:</span>
            <a 
                href="https://wa.me/?text={{ urlencode($blog->title . ' ' . url()->current()) }}" 
                target="_blank" 
                class="p-2 rounded-lg bg-emerald-500/20 text-emerald-300 hover:bg-emerald-500/30 transition-colors"
                title="Share on WhatsApp"
            >
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.54 1.789.78 2.791.78h.005c3.18 0 5.767-2.587 5.768-5.766 0-1.54-.6-2.99-1.69-4.08-1.09-1.09-2.54-1.69-4.084-1.69zm5.214 7.271c-.22.618-1.08 1.139-1.503 1.18-.387.037-.878.077-2.836-.713-1.758-.709-2.91-2.457-3-2.576-.089-.12-1.842-2.452-1.842-4.676 0-2.224 1.164-3.318 1.579-3.763.415-.445.908-.557 1.211-.557.303 0 .606.003.87.016.28.013.655-.106 1.025.782.38 1.037.914 2.227 1.002 2.38.089.153.149.333.03.568-.119.235-.179.382-.358.591-.178.21-.375.469-.537.63-.178.178-.364.372-.157.727.207.355.92 1.516 1.974 2.456 1.357 1.21 2.502 1.586 2.857 1.764.355.178.563.148.77-.089.208-.237.89-1.036 1.127-1.392.237-.356.474-.297.792-.178.318.118 2.016.951 2.362 1.124.346.173.577.26.662.404.085.144.085.834-.135 1.452z"/></svg>
            </a>
            <a 
                href="https://facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                target="_blank" 
                class="p-2 rounded-lg bg-blue-500/20 text-blue-300 hover:bg-blue-500/30 transition-colors"
                title="Share on Facebook"
            >
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg>
            </a>
            <a 
                href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($blog->title) }}" 
                target="_blank" 
                class="p-2 rounded-lg bg-slate-500/20 text-slate-300 hover:bg-slate-500/30 transition-colors"
                title="Share on X"
            >
                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
        </div>
    </div>

    <!-- Course Enrollment CTA Box -->
    <div class="mt-16 bg-gradient-to-r from-[#2C0B1E] via-[#3f122d] to-[#2C0B1E] border border-[#fdc04f]/40 rounded-3xl p-8 sm:p-12 text-center shadow-2xl space-y-6">
        <span class="inline-block px-3 py-1 rounded-full bg-[#fdc04f]/15 border border-[#fdc04f]/30 text-[#fdc04f] text-xs font-bold uppercase tracking-wider">
            {{ __('Ready to Speak Fluent German?') }}
        </span>
        <h2 class="font-yeseva text-3xl sm:text-4xl text-white tracking-tight">
            {{ __('Accelerate Your Goethe Certification with Native Mentors') }}
        </h2>
        <p class="font-arsenal text-[#f2ebfd]/80 text-base sm:text-xl max-w-2xl mx-auto leading-relaxed">
            {{ __('From A1 basics to professional C1 German, join our interactive programs with flexible online and offline classes designed for Indonesian students and career seekers.') }}
        </p>
        <div>
            <a href="{{ route('enroll') }}" class="btn-brand-double inline-block">
                {{ __("Enroll in Next Month's Batch") }}
            </a>
        </div>
    </div>

    <!-- Related Articles -->
    @if($relatedBlogs->count() > 0)
        <div class="mt-20 pt-16 border-t border-white/10">
            <h3 class="font-yeseva text-2xl sm:text-3xl text-white mb-8 text-center sm:text-left">
                {{ __('Related Articles') }}
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedBlogs as $related)
                    <a href="{{ route('blog.show', $related->slug) }}" class="bg-[#240919] border border-white/10 rounded-2xl p-5 hover:border-[#fdc04f]/50 hover:-translate-y-1 transition-all duration-200 flex flex-col justify-between group">
                        <div>
                            <span class="text-[11px] font-bold text-[#fdc04f] uppercase tracking-wider">
                                {{ $related->category?->name }}
                            </span>
                            <h4 class="font-yeseva text-base text-white group-hover:text-[#fdc04f] transition-colors mt-2 line-clamp-2">
                                {{ $related->title }}
                            </h4>
                        </div>
                        <div class="mt-4 pt-3 border-t border-white/5 flex items-center justify-between text-xs text-slate-400">
                            <span>{{ __(':min min read', ['min' => $related->reading_time]) }}</span>
                            <span class="text-[#fdc04f] font-bold">&rarr;</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</article>
@endsection
