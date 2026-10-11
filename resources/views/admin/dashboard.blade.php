@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('page_title', 'Dashboard Overview')

@section('content')
<div class="space-y-8">
    <!-- Stat Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <!-- Stat 1: Total Enrollments -->
        <div class="bg-[#240919] border border-white/10 rounded-2xl p-5 shadow-lg relative overflow-hidden group hover:border-[#E2B842]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Enrollments</p>
                    <h3 class="text-3xl font-extrabold text-white mt-2">{{ number_format($totalEnrollments) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 text-[#E2B842] flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between text-xs text-slate-400 border-t border-white/5 pt-3">
                <span class="inline-flex items-center gap-1.5 text-amber-400">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span>
                    {{ $pendingEnrollments }} pending review
                </span>
                <a href="{{ route('admin.enrollments.index') }}" class="text-[#E2B842] hover:underline">View all &rarr;</a>
            </div>
        </div>

        <!-- Stat 2: Total Articles -->
        <div class="bg-[#240919] border border-white/10 rounded-2xl p-5 shadow-lg relative overflow-hidden group hover:border-[#E2B842]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Blog Articles</p>
                    <h3 class="text-3xl font-extrabold text-white mt-2">{{ number_format($totalBlogs) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/20 text-blue-400 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between text-xs text-slate-400 border-t border-white/5 pt-3">
                <span class="text-emerald-400">{{ $publishedBlogs }} published</span>
                <a href="{{ route('admin.blogs.index') }}" class="text-[#E2B842] hover:underline">Manage &rarr;</a>
            </div>
        </div>

        <!-- Stat 3: Blog Categories -->
        <div class="bg-[#240919] border border-white/10 rounded-2xl p-5 shadow-lg relative overflow-hidden group hover:border-[#E2B842]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Categories</p>
                    <h3 class="text-3xl font-extrabold text-white mt-2">{{ number_format($totalCategories) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-500/10 border border-amber-500/20 text-amber-400 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between text-xs text-slate-400 border-t border-white/5 pt-3">
                <span>Active topics</span>
                <a href="{{ route('admin.blog-categories.index') }}" class="text-[#E2B842] hover:underline">View &rarr;</a>
            </div>
        </div>

        <!-- Stat 4: Page Views (Redis) -->
        <div class="bg-[#240919] border border-white/10 rounded-2xl p-5 shadow-lg relative overflow-hidden group hover:border-[#E2B842]/40 transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Redis Page Hits</p>
                    <h3 class="text-3xl font-extrabold text-white mt-2">{{ number_format($pageViews) }}</h3>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center justify-between text-xs text-slate-400 border-t border-white/5 pt-3">
                <span class="text-slate-400">Cached in Redis</span>
                <span class="text-emerald-400 font-semibold">Active</span>
            </div>
        </div>
    </div>

    <!-- Quick Action Banner -->
    <div class="bg-gradient-to-r from-[#2C0B1E] via-[#3d122b] to-[#2C0B1E] border border-[#E2B842]/30 rounded-2xl p-6 sm:p-8 flex flex-col md:flex-row md:items-center justify-between gap-6 shadow-xl">
        <div class="space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#E2B842]/10 border border-[#E2B842]/20 text-[#E2B842] text-xs font-bold uppercase tracking-wider">
                Full Page Customization
            </div>
            <h2 class="text-xl sm:text-2xl font-bold text-white">Customize All Texts, Buttons & Images</h2>
            <p class="text-sm text-slate-300 max-w-2xl">
                Update every single button label, hero badge, program title, CTA banner, logo, favicon, and contact info live without touching code.
            </p>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <a href="{{ route('admin.settings.index') }}" class="px-5 py-3 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] font-bold text-sm shadow-lg shadow-[#E2B842]/20 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Launch Customizer
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="px-5 py-3 rounded-xl bg-white/10 hover:bg-white/15 text-white font-semibold text-sm transition-all border border-white/10 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Write Article
            </a>
        </div>
    </div>

    <!-- 2 Columns: Recent Enrollments & Recent Blog Posts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent Student Inquiries -->
        <div class="bg-[#240919] border border-white/10 rounded-2xl overflow-hidden shadow-lg">
            <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-white text-base">Recent Student Inquiries</h3>
                    <p class="text-xs text-slate-400">Latest course registrations and queries</p>
                </div>
                <a href="{{ route('admin.enrollments.index') }}" class="text-xs text-[#E2B842] hover:underline font-semibold">View All</a>
            </div>

            <div class="divide-y divide-white/5">
                @forelse($recentEnrollments as $item)
                    <div class="p-4 hover:bg-white/5 transition-colors flex items-center justify-between gap-4">
                        <div class="min-w-0">
                            <div class="flex items-center gap-2">
                                <h4 class="text-sm font-semibold text-white truncate">{{ $item->first_name }} {{ $item->last_name }}</h4>
                                <span class="px-2 py-0.5 text-[10px] font-bold rounded-full 
                                    @if($item->program_level === 'Beginner') bg-emerald-500/20 text-emerald-300 border border-emerald-500/30
                                    @elseif($item->program_level === 'Intermediate') bg-blue-500/20 text-blue-300 border border-blue-500/30
                                    @else bg-purple-500/20 text-purple-300 border border-purple-500/30 @endif">
                                    {{ $item->program_level }}
                                </span>
                            </div>
                            <p class="text-xs text-slate-400 truncate mt-0.5">{{ $item->email }} @if($item->phone) &bull; {{ $item->phone }} @endif</p>
                            <p class="text-xs text-slate-500 italic truncate mt-1">"{{ Str::limit($item->message, 60) }}"</p>
                        </div>
                        <div class="text-right shrink-0">
                            <span class="px-2 py-1 text-[11px] font-semibold rounded-md 
                                @if($item->status === 'pending') bg-amber-500/20 text-amber-300
                                @elseif($item->status === 'contacted') bg-blue-500/20 text-blue-300
                                @else bg-emerald-500/20 text-emerald-300 @endif">
                                {{ ucfirst($item->status) }}
                            </span>
                            <div class="text-[10px] text-slate-500 mt-1">{{ $item->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-slate-400 text-sm">
                        No enrollment submissions recorded yet.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Blog Posts -->
        <div class="bg-[#240919] border border-white/10 rounded-2xl overflow-hidden shadow-lg">
            <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-white text-base">Latest Articles</h3>
                    <p class="text-xs text-slate-400">Content publication & SEO status</p>
                </div>
                <a href="{{ route('admin.blogs.index') }}" class="text-xs text-[#E2B842] hover:underline font-semibold">View All</a>
            </div>

            <div class="divide-y divide-white/5">
                @forelse($recentBlogs as $blog)
                    <div class="p-4 hover:bg-white/5 transition-colors flex items-center justify-between gap-4">
                        <div class="min-w-0">
                            <h4 class="text-sm font-semibold text-white truncate hover:text-[#E2B842] transition-colors">
                                <a href="{{ route('admin.blogs.edit', $blog) }}">{{ $blog->title }}</a>
                            </h4>
                            <div class="flex items-center gap-2 mt-1 text-xs text-slate-400">
                                <span>{{ $blog->category?->name ?? 'Uncategorized' }}</span>
                                <span>&bull;</span>
                                <span>{{ $blog->reading_time }} min read</span>
                                @if($blog->is_featured)
                                    <span>&bull;</span>
                                    <span class="text-[#E2B842] font-semibold text-[10px] uppercase">Featured</span>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-2 shrink-0">
                            <span class="px-2 py-0.5 text-[11px] font-semibold rounded-md 
                                @if($blog->status === 'published') bg-emerald-500/20 text-emerald-300
                                @else bg-slate-500/20 text-slate-400 @endif">
                                {{ ucfirst($blog->status) }}
                            </span>
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="p-1.5 text-slate-400 hover:text-white hover:bg-white/10 rounded-lg">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-slate-400 text-sm">
                        No articles published yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
