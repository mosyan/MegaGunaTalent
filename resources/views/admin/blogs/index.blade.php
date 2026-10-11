@extends('layouts.admin')

@section('title', 'Article Blog Management')
@section('page_title', 'Article Blog Management')

@section('content')
<div class="space-y-6">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-[#240919] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">Articles & Blog Posts</h2>
            <p class="text-xs text-slate-400 mt-1">Publish insightful guides, study tips, and German career articles for your students and organic SEO.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.blog-categories.index') }}" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/15 text-slate-200 text-xs font-semibold transition-all">
                Manage Categories
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="px-5 py-2.5 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] text-xs font-bold shadow-lg shadow-[#E2B842]/20 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Write New Article
            </a>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-[#240919] border border-white/10 rounded-2xl p-4 shadow-md">
        <form action="{{ route('admin.blogs.index') }}" method="GET" class="flex flex-wrap items-center gap-4">
            <!-- Search -->
            <div class="flex-1 min-w-[200px]">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search articles by title, keywords..."
                    class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-xs placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
            </div>

            <!-- Category Filter -->
            <div class="w-48">
                <select 
                    name="category_id" 
                    onchange="this.form.submit()"
                    class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
                    <option value="" class="bg-[#1e0715]">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" class="bg-[#1e0715]" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter -->
            <div class="w-36">
                <select 
                    name="status" 
                    onchange="this.form.submit()"
                    class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
                    <option value="" class="bg-[#1e0715]">All Statuses</option>
                    <option value="published" class="bg-[#1e0715]" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" class="bg-[#1e0715]" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/15 text-slate-200 text-xs font-semibold cursor-pointer">
                Filter
            </button>

            @if(request()->hasAny(['search', 'category_id', 'status']))
                <a href="{{ route('admin.blogs.index') }}" class="text-xs text-[#E2B842] hover:underline">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Articles Table Card -->
    <div class="bg-[#240919] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="text-xs uppercase bg-white/5 text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Article</th>
                        <th class="px-6 py-4 font-semibold">Category</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold">SEO Keyword</th>
                        <th class="px-6 py-4 font-semibold text-center">Reading Time</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-300">
                    @forelse($blogs as $blog)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($blog->featured_image)
                                        <img src="{{ $blog->featured_image }}" alt="" class="w-12 h-12 rounded-lg object-cover bg-white/10 shrink-0">
                                    @else
                                        <div class="w-12 h-12 rounded-lg bg-white/10 flex items-center justify-center text-slate-500 shrink-0">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="font-bold text-white hover:text-[#E2B842] transition-colors line-clamp-1">
                                            {{ $blog->title }}
                                        </a>
                                        <div class="flex items-center gap-2 mt-0.5 text-xs text-slate-400">
                                            <span>By {{ $blog->author?->name ?? 'Admin' }}</span>
                                            <span>&bull;</span>
                                            <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft' }}</span>
                                            @if($blog->is_featured)
                                                <span>&bull;</span>
                                                <span class="text-[#E2B842] font-bold text-[10px] uppercase">Featured</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <span class="px-2.5 py-1 rounded-md bg-white/5 text-slate-300 border border-white/5">
                                    {{ $blog->category?->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full 
                                    @if($blog->status === 'published') bg-emerald-500/20 text-emerald-300 border border-emerald-500/30
                                    @else bg-slate-500/20 text-slate-400 border border-slate-500/30 @endif">
                                    {{ ucfirst($blog->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs font-mono text-slate-400">
                                {{ $blog->focus_keyword ?? '—' }}
                            </td>
                            <td class="px-6 py-4 text-center text-xs text-slate-400">
                                {{ $blog->reading_time }} min
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    @if($blog->status === 'published')
                                        <a 
                                            href="{{ route('blog.show', $blog->slug) }}" 
                                            target="_blank" 
                                            class="p-2 text-slate-400 hover:text-[#E2B842] hover:bg-white/10 rounded-lg transition-colors"
                                            title="View Public Post"
                                        >
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                            </svg>
                                        </a>
                                    @endif

                                    <a 
                                        href="{{ route('admin.blogs.edit', $blog) }}" 
                                        class="p-2 text-slate-400 hover:text-[#E2B842] hover:bg-white/10 rounded-lg transition-colors"
                                        title="Edit Article"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </a>

                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-slate-400 hover:text-rose-400 hover:bg-white/10 rounded-lg transition-colors cursor-pointer" title="Delete">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                <div class="max-w-sm mx-auto space-y-3">
                                    <p class="text-base font-semibold text-white">No articles found</p>
                                    <p class="text-xs text-slate-500">Get started by creating your very first article with SEO metadata.</p>
                                    <a href="{{ route('admin.blogs.create') }}" class="inline-block px-4 py-2 bg-[#E2B842] text-[#2C0B1E] font-bold text-xs rounded-xl shadow-md">
                                        Create Article
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($blogs->hasPages())
            <div class="p-4 border-t border-white/10">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
