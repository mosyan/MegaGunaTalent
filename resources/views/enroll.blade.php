@extends('layouts.app')

@section('title', 'Enroll Now - Start Your German Learning Journey')
@section('meta_description', 'Enroll now in our German language courses and let us discuss your language goals.')

@section('content')
    <div class="relative min-h-screen pt-36 sm:pt-48 pb-20 sm:pb-32 px-6 sm:px-12 bg-cover bg-top bg-no-repeat overflow-hidden"
         style="background-image: url('{{ asset('images/global-bg.jpg') }}'); background-color: #0b4555;">
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl mx-auto">
            
            <!-- Page Header -->
            <div class="text-center">
                <h1 class="font-yeseva text-white text-3xl sm:text-5xl md:text-6xl tracking-tight leading-tight drop-shadow-[0_4px_16px_rgba(0,0,0,0.7)]">
                    Start Your Learning Journey
                </h1>
                
                <p class="font-arsenal text-white text-lg sm:text-2xl mt-4 sm:mt-6 font-normal drop-shadow-[0_2px_8px_rgba(0,0,0,0.6)]">
                    Enroll now and let's discuss your German language goals.
                </p>

                <!-- Thin Divider Line -->
                <div class="w-full max-w-xl mx-auto my-8 sm:my-10 border-b border-white/40"></div>
            </div>

            <!-- Flash Success Alert -->
            @if(session('success'))
                <div class="mb-8 p-6 rounded-none bg-[#fdc04f] text-[#321f47] border-4 double border-[#321f47] font-arsenal text-center shadow-2xl">
                    <div class="flex items-center justify-center gap-3 font-bold text-xl sm:text-2xl mb-1">
                        <svg class="w-7 h-7 text-[#321f47]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span>Success!</span>
                    </div>
                    <p class="text-lg">{{ session('success') }}</p>
                </div>
            @endif

            <!-- Errors Alert -->
            @if ($errors->any())
                <div class="mb-8 p-6 rounded-none bg-red-900/90 text-white border-2 border-red-500 font-arsenal">
                    <div class="font-bold text-lg mb-2">Please check the required fields:</div>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Enrollment Card Form -->
            <div class="bg-white/95 backdrop-blur-md text-[#321f47] p-8 sm:p-12 shadow-2xl border-4 border-[#fdc04f]">
                <form action="{{ route('enroll.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block font-arsenal font-bold text-lg text-[#321f47] mb-2">
                                First name <span class="text-red-600">*</span>
                            </label>
                            <input type="text" 
                                   id="first_name" 
                                   name="first_name" 
                                   value="{{ old('first_name') }}"
                                   required 
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-300 focus:border-[#321f47] focus:ring-2 focus:ring-[#fdc04f] focus:outline-none font-arsenal text-lg transition-colors"
                                   placeholder="Your first name">
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block font-arsenal font-bold text-lg text-[#321f47] mb-2">
                                Last name <span class="text-red-600">*</span>
                            </label>
                            <input type="text" 
                                   id="last_name" 
                                   name="last_name" 
                                   value="{{ old('last_name') }}"
                                   required 
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-300 focus:border-[#321f47] focus:ring-2 focus:ring-[#fdc04f] focus:outline-none font-arsenal text-lg transition-colors"
                                   placeholder="Your last name">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block font-arsenal font-bold text-lg text-[#321f47] mb-2">
                                Email address <span class="text-red-600">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   required 
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-300 focus:border-[#321f47] focus:ring-2 focus:ring-[#fdc04f] focus:outline-none font-arsenal text-lg transition-colors"
                                   placeholder="your.email@example.com">
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phone" class="block font-arsenal font-bold text-lg text-[#321f47] mb-2">
                                Phone number
                            </label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone" 
                                   value="{{ old('phone') }}"
                                   class="w-full px-4 py-3 bg-gray-50 border border-gray-300 focus:border-[#321f47] focus:ring-2 focus:ring-[#fdc04f] focus:outline-none font-arsenal text-lg transition-colors"
                                   placeholder="+49 or local phone">
                        </div>
                    </div>

                    <!-- Program Level -->
                    <div>
                        <label for="program_level" class="block font-arsenal font-bold text-lg text-[#321f47] mb-2">
                            Select Program
                        </label>
                        <select id="program_level" 
                                name="program_level" 
                                class="w-full px-4 py-3 bg-gray-50 border border-gray-300 focus:border-[#321f47] focus:ring-2 focus:ring-[#fdc04f] focus:outline-none font-arsenal text-lg transition-colors">
                            <option value="Beginner" {{ old('program_level') == 'Beginner' ? 'selected' : '' }}>Beginner (A1 - A2) - Travel & Foundations</option>
                            <option value="Intermediate" {{ old('program_level') == 'Intermediate' ? 'selected' : '' }}>Intermediate (B1 - B2) - Grammar & Conversational Fluency</option>
                            <option value="Advanced" {{ old('program_level') == 'Advanced' ? 'selected' : '' }}>Advanced (C1 - C2) - Career & Technical German</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block font-arsenal font-bold text-lg text-[#321f47] mb-2">
                            Message <span class="text-red-600">*</span>
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="4" 
                                  required 
                                  class="w-full px-4 py-3 bg-gray-50 border border-gray-300 focus:border-[#321f47] focus:ring-2 focus:ring-[#fdc04f] focus:outline-none font-arsenal text-lg transition-colors"
                                  placeholder="Tell us about your learning goals and preferred schedule...">{{ old('message') }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center pt-4">
                        <button type="submit" class="btn-brand-double w-full sm:w-auto px-12">
                            Send
                        </button>
                    </div>
                </form>
            </div>

            <!-- Back to Home -->
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center text-[#fdc04f] hover:text-white transition-colors text-lg font-bold">
                    ← Back to Home
                </a>
            </div>

        </div>
    </div>
@endsection
