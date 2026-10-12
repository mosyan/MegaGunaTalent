<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50 text-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Mega Guna Talent</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: rgba(0, 0, 0, 0.04); }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, 0.4); border-radius: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(100, 116, 139, 0.6); }
    </style>
</head>
<body class="h-full bg-slate-50 font-['Plus_Jakarta_Sans',sans-serif] text-slate-900 antialiased overflow-x-hidden" x-data="{ sidebarOpen: false }">
    <div class="flex h-screen overflow-hidden">
        
        <!-- Mobile Sidebar Overlay -->
        <div 
            x-show="sidebarOpen" 
            x-cloak
            @click="sidebarOpen = false" 
            class="fixed inset-0 z-40 bg-black/70 backdrop-blur-sm lg:hidden transition-opacity"
        ></div>

        <!-- Sidebar -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'" 
            class="fixed inset-y-0 left-0 z-50 w-64 bg-[#1e0715] border-r border-white/10 flex flex-col transition-transform duration-300 ease-in-out lg:static shrink-0"
        >
            <!-- Logo Header -->
            <div class="h-16 flex items-center justify-between px-6 border-b border-white/10 bg-[#280a1c]">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-[#E2B842] to-[#b38b1f] text-[#2C0B1E] font-black flex items-center justify-center text-lg shadow-md shadow-[#E2B842]/20">
                        M
                    </div>
                    <div>
                        <div class="font-bold text-sm text-white tracking-wide leading-tight">Mega Guna</div>
                        <div class="text-[10px] text-[#E2B842] font-semibold tracking-wider uppercase">Admin Portal</div>
                    </div>
                </a>
                <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white p-1">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex-1 overflow-y-auto px-4 py-5 space-y-6 custom-scrollbar">
                <!-- Group: Main -->
                <div>
                    <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Core</p>
                    <div class="space-y-1">
                        <a 
                            href="{{ route('admin.dashboard') }}" 
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-[#E2B842] text-[#2C0B1E] shadow-lg shadow-[#E2B842]/20' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 11a2 2 0 012-2h2a2 2 0 012 2v9a2 2 0 01-2 2h-2a2 2 0 01-2-2v-9zM9 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"/>
                            </svg>
                            <span>Dashboard</span>
                        </a>

                        <a 
                            href="{{ route('admin.settings.index') }}" 
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.settings.*') ? 'bg-[#E2B842] text-[#2C0B1E] shadow-lg shadow-[#E2B842]/20' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                            </svg>
                            <span>Page Customizer</span>
                        </a>

                        <a 
                            href="{{ route('admin.enrollments.index') }}" 
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.enrollments.*') ? 'bg-[#E2B842] text-[#2C0B1E] shadow-lg shadow-[#E2B842]/20' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            <span>Enrollments</span>
                        </a>
                    </div>
                </div>

                <!-- Group: Article Blog -->
                <div>
                    <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Article Blog</p>
                    <div class="space-y-1">
                        <a 
                            href="{{ route('admin.blogs.index') }}" 
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.blogs.index') || request()->routeIs('admin.blogs.edit') ? 'bg-[#E2B842] text-[#2C0B1E] shadow-lg shadow-[#E2B842]/20' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            <span>All Articles</span>
                        </a>

                        <a 
                            href="{{ route('admin.blogs.create') }}" 
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.blogs.create') ? 'bg-[#E2B842] text-[#2C0B1E] shadow-lg shadow-[#E2B842]/20' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Add New Article</span>
                        </a>

                        <a 
                            href="{{ route('admin.blog-categories.index') }}" 
                            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('admin.blog-categories.*') ? 'bg-[#E2B842] text-[#2C0B1E] shadow-lg shadow-[#E2B842]/20' : 'text-slate-300 hover:bg-white/5 hover:text-white' }}"
                        >
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            <span>Categories</span>
                        </a>
                    </div>
                </div>

                <!-- Group: Live Site Links -->
                <div>
                    <p class="px-3 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-2">Live Preview</p>
                    <div class="space-y-1">
                        <a 
                            href="{{ route('home') }}" 
                            target="_blank" 
                            class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-all group"
                        >
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-[#E2B842]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                <span>Main Landing Page</span>
                            </span>
                            <span class="text-[10px] uppercase font-bold text-slate-500 group-hover:text-[#E2B842]">Live</span>
                        </a>

                        <a 
                            href="{{ route('blog.index') }}" 
                            target="_blank" 
                            class="flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium text-slate-300 hover:bg-white/5 hover:text-white transition-all group"
                        >
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-slate-400 group-hover:text-[#E2B842]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                <span>Public Blog</span>
                            </span>
                            <span class="text-[10px] uppercase font-bold text-slate-500 group-hover:text-[#E2B842]">Live</span>
                        </a>
                    </div>
                </div>
            </nav>

            <!-- User Footer -->
            <div class="p-4 border-t border-white/10 bg-[#170510] flex items-center justify-between">
                <a href="{{ route('admin.profile') }}" class="flex items-center gap-3 min-w-0 hover:opacity-80 transition-opacity">
                    <div class="w-8 h-8 rounded-full bg-[#E2B842] text-[#2C0B1E] font-bold flex items-center justify-center text-xs shrink-0">
                        {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-xs font-semibold text-white truncate">{{ Auth::user()->name ?? 'Administrator' }}</p>
                        <p class="text-[10px] text-slate-400 truncate">{{ Auth::user()->email ?? '' }}</p>
                    </div>
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" title="Logout" class="p-2 text-slate-400 hover:text-rose-400 hover:bg-white/5 rounded-lg transition-colors cursor-pointer">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50">
            <!-- Topbar -->
            <header class="h-16 bg-white border-b border-slate-200/90 px-6 flex items-center justify-between shrink-0 shadow-xs">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = true" class="lg:hidden text-slate-600 hover:text-slate-900 p-1 cursor-pointer">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <div>
                        <h1 class="text-lg font-bold text-slate-900 tracking-tight">@yield('page_title', 'Dashboard')</h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200/80 border border-slate-200 text-xs font-semibold text-slate-700 transition-colors">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span>View Website</span>
                    </a>
                </div>
            </header>

            <!-- Main scrollable view -->
            <main class="flex-1 overflow-y-auto p-6 lg:p-8 custom-scrollbar text-slate-900">
                <!-- Notifications -->
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center justify-between shadow-xs">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm font-medium flex items-center gap-3 shadow-xs">
                        <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>

