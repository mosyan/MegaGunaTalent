@extends('layouts.admin')

@section('title', 'Article Blog Management')
@section('page_title', 'Article Blog Management')

@section('content')
<div class="space-y-6">
    <!-- Header with Action -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-white border border-slate-200/90 rounded-2xl p-6 shadow-xs">
        <div>
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Articles & Blog Posts</h2>
            <p class="text-xs text-slate-500 mt-1">Publish insightful guides, study tips, and German career articles for your students and organic SEO.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.blog-categories.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold border border-slate-200 transition-all">
                Manage Categories
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="px-5 py-2.5 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] text-xs font-bold shadow-xs transition-all flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Write New Article
            </a>
        </div>
    </div>

    <!-- Filter & Search Toolbar -->
    <div class="bg-white border border-slate-200/90 rounded-2xl p-4 shadow-xs">
        <form action="{{ route('admin.blogs.index') }}" method="GET" class="flex flex-wrap items-center gap-4">
            <!-- Search -->
            <div class="flex-1 min-w-[200px]">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search articles by title, keywords..."
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 text-xs placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all"
                >
            </div>

            <!-- Category Filter -->
            <div class="w-48">
                <select 
                    name="category_id" 
                    onchange="this.form.submit()"
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-xs focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all"
                >
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
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
                    class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-xs focus:outline-none focus:bg-white focus:ring-2 focus:ring-[#E2B842]/40 focus:border-[#E2B842] transition-all"
                >
                    <option value="">All Statuses</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold border border-slate-200 transition-all cursor-pointer">
                Filter
            </button>

            @if(request()->hasAny(['search', 'category_id', 'status']))
                <a href="{{ route('admin.blogs.index') }}" class="text-xs font-semibold text-amber-600 hover:text-amber-700">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Articles Table Card -->
    <div class="bg-white border border-slate-200/90 rounded-2xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="text-xs uppercase bg-slate-50 text-slate-600 border-b border-slate-200 font-bold tracking-wider">
                    <tr>
                        <th class="px-6 py-4">Article</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">SEO Keyword</th>
                        <th class="px-6 py-4 text-center">Reading Time</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-800">
                    @forelse($blogs as $blog)
                        <tr class="hover:bg-slate-50/70 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($blog->featured_image)
                                        <img src="{{ $blog->featured_image }}" alt="" class="w-12 h-12 rounded-lg object-cover bg-slate-100 shrink-0 border border-slate-200">
                                    @else
                                        <div class="w-12 h-12 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400 shrink-0">
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div class="min-w-0">
                                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="font-bold text-slate-900 hover:text-amber-700 transition-colors line-clamp-1">
                                            {{ $blog->title }}
                                        </a>
                                        <div class="flex items-center gap-2 mt-0.5 text-xs text-slate-500">
                                            <span>By {{ $blog->author?->name ?? 'Admin' }}</span>
                                            <span>&bull;</span>
                                            <span>{{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Draft' }}</span>
                                            @if($blog->is_featured)
                                                <span>&bull;</span>
                                                <span class="text-amber-800 font-bold text-[10px] uppercase bg-amber-50 border border-amber-200 px-1.5 py-0.2 rounded">Featured</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-600">
                                <span class="px-2.5 py-1 rounded-md bg-slate-100 border border-slate-200 font-medium">
                                    {{ $blog->category?->name ?? 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <span class="px-2.5 py-1 font-semibold rounded-md border
                                    @if($blog->status === 'published') bg-emerald-50 text-emerald-800 border-emerald-200
                                    @else bg-slate-100 text-slate-600 border-slate-200 @endif">
                                    {{ ucfirst($blog->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-500 font-mono">
                                {{ $blog->meta_keywords ?: '—' }}
                            </td>
                            <td class="px-6 py-4 text-xs text-center text-slate-600">
                                {{ $blog->reading_time }} min
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a 
                                        href="{{ route('blog.show', $blog->slug) }}" 
                                        target="_blank"
                                        class="p-1.5 text-slate-400 hover:text-slate-700 hover:bg-slate-100 rounded-lg transition-colors"
                                        title="Preview Live Article"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>
                                    <a 
                                        href="{{ route('admin.blogs.edit', $blog) }}" 
                                        class="p-1.5 text-slate-400 hover:text-amber-700 hover:bg-amber-50 rounded-lg transition-colors"
                                        title="Edit Article"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" onsubmit="return confirm('Delete this article permanently?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors cursor-pointer" title="Delete">
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
                            <td colspan="6" class="px-6 py-16 text-center text-slate-400">
                                No articles found. Write your first post using the button above.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($blogs->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
