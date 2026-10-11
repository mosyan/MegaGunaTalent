@extends('layouts.admin')

@section('title', 'Admin Profile & Security')
@section('page_title', 'Admin Profile & Security')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 shadow-xl">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-2xl bg-[#E2B842] text-[#2C0B1E] flex items-center justify-center font-bold text-2xl shadow-lg shadow-[#E2B842]/20">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-xl font-bold text-white tracking-tight">{{ auth()->user()->name }}</h2>
                <p class="text-xs text-slate-400 mt-0.5">{{ auth()->user()->email }} &bull; <span class="text-[#E2B842] font-semibold uppercase">Super Administrator</span></p>
            </div>
        </div>
    </div>

    <!-- Change Password Form -->
    <div class="bg-[#240919] border border-white/10 rounded-2xl p-6 sm:p-8 shadow-xl space-y-6">
        <div>
            <h3 class="text-base font-bold text-white flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-[#E2B842]"></span>
                Change Password & Security
            </h3>
            <p class="text-xs text-slate-400 mt-1">Ensure your admin account uses a long, secure passphrase to protect administrative access.</p>
        </div>

        @if($errors->any())
            <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-300 text-xs space-y-1">
                @foreach($errors->all() as $error)
                    <div>&bull; {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Current Password</label>
                <input 
                    type="password" 
                    name="current_password" 
                    required 
                    placeholder="Enter current password"
                    class="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-[#E2B842]"
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">New Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        required 
                        minlength="8"
                        placeholder="At least 8 characters"
                        class="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-[#E2B842]"
                    >
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2">Confirm New Password</label>
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        minlength="8"
                        placeholder="Repeat new password"
                        class="w-full px-4 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 text-sm focus:outline-none focus:border-[#E2B842]"
                    >
                </div>
            </div>

            <div class="pt-4 border-t border-white/10 flex justify-end">
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] text-xs font-bold transition-all shadow-lg shadow-[#E2B842]/20 cursor-pointer">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
