<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Mega Guna Talent</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Yeseva+One&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full flex items-center justify-center p-4 bg-[#1a0612] bg-[radial-gradient(#e2b84215_1px,transparent_1px)] [background-size:20px_20px] font-['Plus_Jakarta_Sans',sans-serif]">
    <div class="w-full max-w-md">
        <!-- Logo & Title -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-[#E2B842] to-[#b38b1f] text-[#2C0B1E] font-extrabold text-2xl shadow-xl shadow-[#E2B842]/20 mb-4">
                M
            </div>
            <h1 class="text-2xl font-bold text-white tracking-tight">Mega Guna Talent</h1>
            <p class="text-sm text-slate-400 mt-1">Admin Portal & Content Manager</p>
        </div>

        <!-- Login Card -->
        <div class="bg-[#240919]/90 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8 sm:p-10">
            <h2 class="text-lg font-semibold text-white mb-2">Sign in to your account</h2>
            <p class="text-xs text-slate-400 mb-6">Enter your administrative credentials to continue.</p>

            @if(session('status'))
                <div class="mb-5 p-3.5 rounded-xl bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 text-xs font-medium">
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-5 p-3.5 rounded-xl bg-rose-500/15 border border-rose-500/30 text-rose-300 text-xs font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email', 'admin@megagunatalent.com') }}"
                        required 
                        autofocus
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842] focus:border-transparent transition-all"
                        placeholder="admin@megagunatalent.com"
                    >
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">Password</label>
                    </div>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        value="password123"
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl text-white placeholder-slate-500 text-sm focus:outline-none focus:ring-2 focus:ring-[#E2B842] focus:border-transparent transition-all"
                        placeholder="••••••••"
                    >
                </div>

                <div class="flex items-center justify-between text-xs">
                    <label class="flex items-center text-slate-300 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-white/20 bg-white/5 text-[#E2B842] focus:ring-[#E2B842]">
                        <span class="ml-2">Remember this device</span>
                    </label>
                </div>

                <button 
                    type="submit" 
                    class="w-full py-3.5 px-4 bg-gradient-to-r from-[#E2B842] to-[#c79c29] hover:from-[#cfa230] hover:to-[#b38b1f] text-[#2C0B1E] font-bold text-sm rounded-xl shadow-lg shadow-[#E2B842]/20 hover:shadow-xl hover:shadow-[#E2B842]/30 transition-all duration-200 cursor-pointer"
                >
                    Sign In to Admin
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-white/10 text-center">
                <a href="{{ route('home') }}" class="text-xs text-slate-400 hover:text-[#E2B842] transition-colors inline-flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Main Website
                </a>
            </div>
        </div>

        <p class="text-center text-xs text-slate-500 mt-6">
            &copy; {{ date('Y') }} Mega Guna Talent. All rights reserved.
        </p>
    </div>
</body>
</html>
