@extends('layouts.admin')

@section('title', 'Student Enrollments')
@section('page_title', 'Student Enrollments')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-[#240919] border border-white/10 rounded-2xl p-6 shadow-lg">
        <div>
            <h2 class="text-xl font-bold text-white tracking-tight">Student Enrollments & Inquiries</h2>
            <p class="text-xs text-slate-400 mt-1">Review student applications, course interest levels, and update follow-up statuses.</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-3.5 py-1.5 rounded-xl bg-white/10 text-slate-200 text-xs font-semibold">
                {{ $enrollments->total() }} Total Applications
            </span>
            <a 
                href="{{ route('admin.enrollments.export', request()->query()) }}" 
                class="px-4 py-2 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] text-xs font-bold transition-all flex items-center gap-2 shadow-lg shadow-[#E2B842]/20 cursor-pointer"
                title="Download leads as CSV"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
                Export CSV
            </a>
        </div>
    </div>

    <!-- Search & Filters -->
    <div class="bg-[#240919] border border-white/10 rounded-2xl p-4 shadow-md">
        <form action="{{ route('admin.enrollments.index') }}" method="GET" class="flex flex-wrap items-center gap-4">
            <div class="flex-1 min-w-[200px]">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    placeholder="Search by name, email, or phone..."
                    class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-xs placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
            </div>

            <div class="w-40">
                <select 
                    name="program_level" 
                    onchange="this.form.submit()"
                    class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
                    <option value="" class="bg-[#1e0715]">All Levels</option>
                    <option value="Beginner" class="bg-[#1e0715]" {{ request('program_level') === 'Beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="Intermediate" class="bg-[#1e0715]" {{ request('program_level') === 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                    <option value="Advanced" class="bg-[#1e0715]" {{ request('program_level') === 'Advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>

            <div class="w-40">
                <select 
                    name="status" 
                    onchange="this.form.submit()"
                    class="w-full px-4 py-2.5 bg-white/5 border border-white/10 rounded-xl text-white text-xs focus:outline-none focus:ring-2 focus:ring-[#E2B842]"
                >
                    <option value="" class="bg-[#1e0715]">All Statuses</option>
                    <option value="pending" class="bg-[#1e0715]" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="contacted" class="bg-[#1e0715]" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="enrolled" class="bg-[#1e0715]" {{ request('status') === 'enrolled' ? 'selected' : '' }}>Enrolled</option>
                    <option value="rejected" class="bg-[#1e0715]" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/15 text-slate-200 text-xs font-semibold cursor-pointer">
                Filter
            </button>

            @if(request()->hasAny(['search', 'program_level', 'status']))
                <a href="{{ route('admin.enrollments.index') }}" class="text-xs text-[#E2B842] hover:underline">
                    Reset
                </a>
            @endif
        </form>
    </div>

    <!-- Table -->
    <div class="bg-[#240919] border border-white/10 rounded-2xl overflow-hidden shadow-xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="text-xs uppercase bg-white/5 text-slate-400 border-b border-white/10">
                    <tr>
                        <th class="px-6 py-4 font-semibold">Student</th>
                        <th class="px-6 py-4 font-semibold">Contact Info</th>
                        <th class="px-6 py-4 font-semibold">Course Level</th>
                        <th class="px-6 py-4 font-semibold">Status</th>
                        <th class="px-6 py-4 font-semibold">Date Submitted</th>
                        <th class="px-6 py-4 font-semibold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-slate-300">
                    @forelse($enrollments as $enrollment)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-bold text-white">{{ $enrollment->first_name }} {{ $enrollment->last_name }}</div>
                                <div class="text-xs text-slate-400 italic mt-0.5 line-clamp-1 max-w-sm">"{{ $enrollment->message }}"</div>
                                @if($enrollment->admin_notes)
                                    <div class="mt-1.5 flex items-center gap-1.5 text-[11px] text-[#E2B842]">
                                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                        </svg>
                                        <span class="truncate max-w-xs font-sans text-slate-300">Note: {{ $enrollment->admin_notes }}</span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <div class="text-white">{{ $enrollment->email }}</div>
                                <div class="text-slate-400 mt-0.5">{{ $enrollment->phone ?? '—' }}</div>
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <span class="px-2.5 py-1 font-bold rounded-full 
                                    @if($enrollment->program_level === 'Beginner') bg-emerald-500/20 text-emerald-300 border border-emerald-500/30
                                    @elseif($enrollment->program_level === 'Intermediate') bg-blue-500/20 text-blue-300 border border-blue-500/30
                                    @else bg-purple-500/20 text-purple-300 border border-purple-500/30 @endif">
                                    {{ $enrollment->program_level }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-xs">
                                <form action="{{ route('admin.enrollments.status', $enrollment) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select 
                                        name="status" 
                                        onchange="this.form.submit()"
                                        class="px-2.5 py-1 text-xs rounded-lg bg-white/10 border border-white/10 font-semibold focus:outline-none focus:ring-1 focus:ring-[#E2B842] 
                                        @if($enrollment->status === 'pending') text-amber-400 
                                        @elseif($enrollment->status === 'contacted') text-blue-400
                                        @elseif($enrollment->status === 'enrolled') text-emerald-400
                                        @else text-rose-400 @endif"
                                    >
                                        <option value="pending" class="bg-[#1e0715] text-amber-400" {{ $enrollment->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="contacted" class="bg-[#1e0715] text-blue-400" {{ $enrollment->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                        <option value="enrolled" class="bg-[#1e0715] text-emerald-400" {{ $enrollment->status === 'enrolled' ? 'selected' : '' }}>Enrolled</option>
                                        <option value="rejected" class="bg-[#1e0715] text-rose-400" {{ $enrollment->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-xs text-slate-400">
                                <div>{{ $enrollment->created_at->format('M d, Y') }}</div>
                                <div class="text-[10px] text-slate-500">{{ $enrollment->created_at->format('H:i') }}</div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2" x-data="{ showNotesModal: false }">
                                    <!-- CRM Notes Modal Trigger -->
                                    <button 
                                        type="button" 
                                        @click="showNotesModal = true"
                                        class="p-1.5 rounded-lg transition-colors cursor-pointer {{ $enrollment->admin_notes ? 'text-[#E2B842] bg-[#E2B842]/10 hover:bg-[#E2B842]/20' : 'text-slate-400 hover:text-[#E2B842] hover:bg-white/10' }}"
                                        title="{{ $enrollment->admin_notes ? 'View/Edit Notes' : 'Add Note' }}"
                                    >
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>

                                    <!-- CRM Notes Modal Dialog -->
                                    <div 
                                        x-show="showNotesModal" 
                                        x-cloak 
                                        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm"
                                    >
                                        <div 
                                            @click.away="showNotesModal = false" 
                                            class="bg-[#240919] border border-[#E2B842]/30 rounded-2xl p-6 w-full max-w-lg shadow-2xl space-y-4 text-left"
                                        >
                                            <div class="flex items-center justify-between border-b border-white/10 pb-3">
                                                <div>
                                                    <h3 class="text-sm font-bold text-white">Lead Follow-up Notes</h3>
                                                    <p class="text-xs text-slate-400 mt-0.5">{{ $enrollment->first_name }} {{ $enrollment->last_name }} ({{ $enrollment->email }})</p>
                                                </div>
                                                <button type="button" @click="showNotesModal = false" class="text-slate-400 hover:text-white text-lg font-bold">&times;</button>
                                            </div>

                                            <form action="{{ route('admin.enrollments.notes', $enrollment) }}" method="POST" class="space-y-4">
                                                @csrf
                                                @method('PATCH')
                                                <div>
                                                    <label class="block text-xs font-semibold text-slate-300 mb-1.5 uppercase tracking-wider">Internal Admin & Counselor Notes</label>
                                                    <textarea 
                                                        name="admin_notes" 
                                                        rows="4" 
                                                        placeholder="Record counseling notes, preferred class times, or WhatsApp chat summary..."
                                                        class="w-full px-3.5 py-2.5 rounded-xl bg-white/5 border border-white/10 text-white placeholder-slate-500 text-xs focus:outline-none focus:border-[#E2B842]"
                                                    >{{ $enrollment->admin_notes }}</textarea>
                                                </div>

                                                <div class="flex items-center justify-end gap-3 pt-2">
                                                    <button type="button" @click="showNotesModal = false" class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-slate-300 text-xs font-semibold">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="px-5 py-2 rounded-xl bg-[#E2B842] hover:bg-[#cfa230] text-[#2C0B1E] text-xs font-bold shadow-lg shadow-[#E2B842]/20">
                                                        Save Notes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    @if($enrollment->phone)
                                        <a 
                                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $enrollment->phone) }}?text={{ urlencode('Hello ' . $enrollment->first_name . ', thank you for contacting Mega Guna Talent regarding German courses.') }}" 
                                            target="_blank"
                                            class="p-1.5 text-emerald-400 hover:bg-emerald-500/10 rounded-lg transition-colors"
                                            title="Chat WhatsApp"
                                        >
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.54 1.789.78 2.791.78h.005c3.18 0 5.767-2.587 5.768-5.766 0-1.54-.6-2.99-1.69-4.08-1.09-1.09-2.54-1.69-4.084-1.69zm5.214 7.271c-.22.618-1.08 1.139-1.503 1.18-.387.037-.878.077-2.836-.713-1.758-.709-2.91-2.457-3-2.576-.089-.12-1.842-2.452-1.842-4.676 0-2.224 1.164-3.318 1.579-3.763.415-.445.908-.557 1.211-.557.303 0 .606.003.87.016.28.013.655-.106 1.025.782.38 1.037.914 2.227 1.002 2.38.089.153.149.333.03.568-.119.235-.179.382-.358.591-.178.21-.375.469-.537.63-.178.178-.364.372-.157.727.207.355.92 1.516 1.974 2.456 1.357 1.21 2.502 1.586 2.857 1.764.355.178.563.148.77-.089.208-.237.89-1.036 1.127-1.392.237-.356.474-.297.792-.178.318.118 2.016.951 2.362 1.124.346.173.577.26.662.404.085.144.085.834-.135 1.452z"/></svg>
                                        </a>
                                    @endif

                                    <form action="{{ route('admin.enrollments.destroy', $enrollment) }}" method="POST" onsubmit="return confirm('Delete this enrollment record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-slate-400 hover:text-rose-400 hover:bg-white/10 rounded-lg transition-colors cursor-pointer" title="Delete">
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
                                No student applications found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($enrollments->hasPages())
            <div class="p-4 border-t border-white/10">
                {{ $enrollments->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
