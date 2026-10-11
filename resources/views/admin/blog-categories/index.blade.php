@extends('layouts.admin')

@section('title', 'Blog Categories')
@section('page_title', 'Blog Categories')

@section('content')
<div class="space-y-6" x-data="{ editingCategory: null }">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-[#240919] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">Article Categories</h2>
            <p class="text-xs text-slate-400 mt-1">Organize your blog posts into focused topics and thematic pillars.</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}" class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/15 text-slate-200 text-xs font-semibold transition-all flex items-center gap-2">
            &larr; Back to Articles
        </a>
    </div>

    <!-- 2 Column Layout: Add Category Form & Categories List -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Col 1: Add New Category Form -->
        <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 shadow-xl h-fit">
            <h3 class="text-base font-bold text-white mb-4 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#E2B842]"></span>
                Add New Category
            </h3>

            <form action="{{ route('admin.blog-categories.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Category Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        required 
                        placeholder="e.g. Visa & Immigration"
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Slug (Optional)</label>
                    <input 
                        type="text" 
                        name="slug" 
                        placeholder="auto-generated from name"
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Description</label>
                    <textarea 
                        name="description" 
                        rows="3" 
                        placeholder="Brief summary of articles in this topic..."
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    ></textarea>
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3 px-4 bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] font-bold text-xs rounded-xl shadow-lg shadow-[#E2B842]/20 transition-all cursor-pointer"
                >
                    Create Category
                </button>
            </form>
        </div>

        <!-- Col 2: Categories Table -->
        <div class="lg:col-span-2 bg-[#240919] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
            <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
                <h3 class="font-bold text-white text-base">Existing Categories</h3>
                <span class="text-xs text-slate-400">{{ $categories->total() }} total</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="text-xs uppercase bg-white/5 text-slate-400 border-b border-white/10">
                        <tr>
                            <th class="px-6 py-3.5 font-semibold">Name</th>
                            <th class="px-6 py-3.5 font-semibold">Slug</th>
                            <th class="px-6 py-3.5 font-semibold text-center">Articles</th>
                            <th class="px-6 py-3.5 font-semibold text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-slate-300">
                        @forelse($categories as $category)
                            <tr class="hover:bg-white/5 transition-colors">
                                <td class="px-6 py-4 font-semibold text-white">
                                    <div>{{ $category->name }}</div>
                                    @if($category->description)
                                        <div class="text-xs text-slate-400 font-normal mt-0.5 line-clamp-1">{{ $category->description }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-xs font-mono text-slate-400">
                                    {{ $category->slug }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-white/10 text-white">
                                        {{ $category->blogs_count }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right whitespace-nowrap">
                                    <div class="flex items-center justify-end gap-2">
                                        <button 
                                            type="button" 
                                            @click="editingCategory = {{ json_encode($category) }}"
                                            class="p-1.5 text-slate-400 hover:text-[#E2B842] hover:bg-white/10 rounded-lg transition-colors cursor-pointer"
                                            title="Edit"
                                        >
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                            </svg>
                                        </button>

                                        @if($category->blogs_count === 0)
                                            <form action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-400 hover:bg-white/10 rounded-lg transition-colors cursor-pointer" title="Delete">
                                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-8 text-center text-slate-400">
                                    No categories created yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($categories->hasPages())
                <div class="p-4 border-t border-white/10">
                    {{ $categories->links() }}
                </div>
            @endif
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div 
        x-show="editingCategory !== null" 
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
    >
        <div 
            @click.away="editingCategory = null"
            class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 max-w-md w-full shadow-2xl space-y-4"
        >
            <div class="flex items-center justify-between pb-3 border-b border-white/10">
                <h3 class="font-bold text-white text-base">Edit Category</h3>
                <button @click="editingCategory = null" class="text-slate-400 hover:text-white">&times;</button>
            </div>

            <form :action="'{{ url('admin/blog-categories') }}/' + editingCategory?.id" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Category Name</label>
                    <input 
                        type="text" 
                        name="name" 
                        :value="editingCategory?.name"
                        required 
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Slug</label>
                    <input 
                        type="text" 
                        name="slug" 
                        :value="editingCategory?.slug"
                        required 
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    >
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Description</label>
                    <textarea 
                        name="description" 
                        rows="3" 
                        x-text="editingCategory?.description"
                        class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                    ></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-3 border-t border-white/10">
                    <button 
                        type="button" 
                        @click="editingCategory = null"
                        class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/15 text-slate-300 text-xs font-semibold transition-all cursor-pointer"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="px-5 py-2 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] font-bold text-xs shadow-lg shadow-[#E2B842]/20 transition-all cursor-pointer"
                    >
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
