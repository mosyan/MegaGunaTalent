@extends('layouts.app')

@section('title', isset($currentCategory) ? $currentCategory->name . ' - German Articles & Insights' : 'Article Blog - German Language & Career Insights')
@section('meta_description', 'Discover helpful guides, Goethe exam strategies, study abroad opportunities, and Ausbildung tips for Germany with Mega Guna Talent.')

@section('content')
<div class="pt-32 sm:pt-40 pb-20 px-6 sm:px-12 max-w-7xl mx-auto">
    <!-- Header Banner -->
    <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-16">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#fdc04f]/15 border border-[#fdc04f]/30 text-[#fdc04f] text-xs font-bold uppercase tracking-wider mb-4">
            {{ isset($currentCategory) ? 'Category: ' . $currentCategory->name : 'Mega Guna Talent Blog' }}
        </div>
        <h1 class="font-yeseva text-3xl sm:text-5xl md:text-6xl text-white tracking-tight leading-tight">
            {{ isset($currentCategory) ? $currentCategory->name : 'Insights, Tips & Career in Germany' }}
        </h1>
        <p class="font-arsenal text-lg sm:text-xl text-[#f2ebfd]/80 mt-4 leading-relaxed">
            {{ isset($currentCategory) && $currentCategory->description ? $currentCategory->description : 'Your go-to knowledge hub for mastering the German language, passing Goethe certifications, studying tuition-free, and building a rewarding career in Germany.' }}
        </p>

        <!-- Search Bar -->
        <div class="mt-8 max-w-xl mx-auto">
            <form action="{{ route('blog.index') }}" method="GET" class="relative">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="{{ __('Search articles by topic, exam, keywords...') }}"
                    class="w-full px-5 py-3.5 pl-12 rounded-2xl bg-white/10 border border-[#fdc04f]/30 text-white placeholder-[#f2ebfd]/50 text-sm focus:outline-none focus:ring-2 focus:ring-[#fdc04f] backdrop-blur-md"
                >
                <svg class="w-5 h-5 text-[#fdc04f] absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </form>
        </div>

        <!-- Category Pills -->
        <div class="mt-6 flex flex-wrap items-center justify-center gap-2">
            <a 
                href="{{ route('blog.index') }}" 
                class="px-4 py-1.5 rounded-full text-xs font-bold transition-all {{ !isset($currentCategory) && !request('category') ? 'bg-[#fdc04f] text-[#321f47]' : 'bg-white/10 text-white hover:bg-white/20' }}"
            >
                {{ __('All Topics') }}
            </a>
            @foreach($categories as $cat)
                <a 
                    href="{{ route('blog.category', $cat->slug) }}" 
                    class="px-4 py-1.5 rounded-full text-xs font-bold transition-all {{ (isset($currentCategory) && $currentCategory->id === $cat->id) || request('category') === $cat->slug ? 'bg-[#fdc04f] text-[#321f47]' : 'bg-white/10 text-white hover:bg-white/20' }}"
                >
                    {{ $cat->name }} ({{ $cat->blogs_count }})
                </a>
            @endforeach
        </div>
    </div>

    <!-- Featured Post Hero Card (if available and on homepage) -->
    @if($featuredBlog)
        <div class="mb-16">
            <div class="relative bg-gradient-to-br from-[#240919] to-[#3d122b] border border-[#fdc04f]/30 rounded-3xl overflow-hidden shadow-2xl group hover:border-[#fdc04f]/60 transition-all">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center p-6 sm:p-10">
                    <div class="order-2 lg:order-1 space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="px-3 py-1 rounded-full bg-[#fdc04f] text-[#321f47] text-[11px] font-extrabold uppercase tracking-wider">
                                {{ __('Featured Story') }}
                            </span>
                            <span class="text-xs text-[#fdc04f]">
                                {{ $featuredBlog->category?->name }}
                            </span>
                        </div>

                        <h2 class="font-yeseva text-2xl sm:text-4xl text-white tracking-tight leading-snug group-hover:text-[#fdc04f] transition-colors">
                            <a href="{{ route('blog.show', $featuredBlog->slug) }}">
                                {{ $featuredBlog->title }}
                            </a>
                        </h2>

                        <p class="font-arsenal text-[#f2ebfd]/80 text-base sm:text-lg line-clamp-3 leading-relaxed">
                            {{ $featuredBlog->excerpt }}
                        </p>

                        <div class="flex items-center gap-4 text-xs text-[#fdc04f]/80 pt-2">
                            <span>{{ $featuredBlog->author?->name ?? 'Mega Guna Talent' }}</span>
                            <span>&bull;</span>
                            <span>{{ $featuredBlog->published_at?->format('M d, Y') }}</span>
                            <span>&bull;</span>
                            <span>{{ __(':min min read', ['min' => $featuredBlog->reading_time]) }}</span>
                        </div>

                        <div class="pt-4">
                            <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#fdc04f] group-hover:translate-x-1 transition-transform">
                                {{ __('Read Complete Article') }} &rarr;
                            </a>
                        </div>
                    </div>

                    <div class="order-1 lg:order-2 h-64 sm:h-80 rounded-2xl overflow-hidden bg-black/30">
                        @if($featuredBlog->featured_image)
                            <img src="{{ $featuredBlog->featured_image }}" alt="{{ $featuredBlog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-[#fdc04f]/20 to-[#fdc04f]/5 text-[#fdc04f] font-yeseva text-4xl">
                                Mega Guna
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Articles Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($blogs as $blog)
            <article class="bg-[#240919] border border-white/10 rounded-2xl overflow-hidden shadow-xl flex flex-col group hover:border-[#fdc04f]/50 hover:-translate-y-1 transition-all duration-300">
                <!-- Thumbnail -->
                <a href="{{ route('blog.show', $blog->slug) }}" class="block h-52 overflow-hidden bg-black/40 relative">
                    @if($blog->featured_image)
                        <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-white/5 text-[#fdc04f] font-yeseva text-2xl">
                            German Study
                        </div>
                    @endif
                    <div class="absolute top-3 left-3">
                        <span class="px-2.5 py-1 rounded-lg bg-[#321f47]/90 backdrop-blur-md text-[#fdc04f] text-[11px] font-bold border border-[#fdc04f]/30">
                            {{ $blog->category?->name ?? 'General' }}
                        </span>
                    </div>
                </a>

                <!-- Content -->
                <div class="p-6 flex-1 flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-xs text-slate-400">
                            <span>{{ $blog->published_at?->format('M d, Y') }}</span>
                            <span>&bull;</span>
                            <span>{{ __(':min min read', ['min' => $blog->reading_time]) }}</span>
                        </div>
                        <h3 class="font-yeseva text-xl text-white group-hover:text-[#fdc04f] transition-colors line-clamp-2 leading-snug">
                            <a href="{{ route('blog.show', $blog->slug) }}">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        <p class="font-arsenal text-sm text-[#f2ebfd]/75 line-clamp-3 leading-relaxed">
                            {{ $blog->excerpt }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-white/10 flex items-center justify-between text-xs">
                        <span class="text-slate-400 font-medium">By {{ $blog->author?->name ?? 'Admin' }}</span>
                        <a href="{{ route('blog.show', $blog->slug) }}" class="text-[#fdc04f] font-bold inline-flex items-center gap-1 group-hover:translate-x-0.5 transition-transform">
                            {{ __('Read') }} &rarr;
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full py-16 text-center text-slate-400">
                <p class="text-lg font-bold text-white mb-2">{{ __('No articles found') }}</p>
                <p class="text-sm">{{ __('Try adjusting your search criteria or explore other categories.') }}</p>
                <div class="mt-6">
                    <a href="{{ route('blog.index') }}" class="btn-brand-double inline-block">
                        {{ __('View All Articles') }}
                    </a>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($blogs->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $blogs->links() }}
        </div>
    @endif
</div>
@endsection
