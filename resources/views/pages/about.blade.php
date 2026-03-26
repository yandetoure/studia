@extends('layouts.app')

@section('title', 'À propos de STUDIA - Cabinet Premium d’Orientation')

@section('content')
    {{-- Hero --}}
    <section class="pt-40 pb-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">{{ __('about.title') }}</h1>
                <h2 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight">{{ __('about.hero_title_1') }} <span
                        class="text-gold-600">{{ __('about.hero_title_2') }}</span> {{ __('about.hero_title_3') }}</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium">
                    {{ __('about.hero_desc') }}
                </p>
            </div>
        </div>
    </section>

    {{-- Fondateur --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h3 class="text-sm font-bold tracking-[0.2em] text-slate-400 uppercase italic">{{ __('about.founder_section') }}</h3>
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-900 italic tracking-tighter">{{ __('about.founder_name') }}</h2>
                        <p class="text-gold-600 font-black italic tracking-wide uppercase text-xs">{{ __('about.founder_role') }}</p>
                    </div>
                    <div class="text-slate-600 space-y-6 leading-relaxed font-medium italic">
                        <p>{{ __('about.founder_p1') }}</p>
                        <p>{{ __('about.founder_p2') }}</p>
                        <p>{{ __('about.founder_p3_1') }} <span
                                class="text-slate-900 font-bold">{{ __('about.founder_p3_destinations') }}</span> {{ __('about.founder_p3_2') }}</p>
                    </div>
                </div>
                <div class="relative group">
                    <div
                        class="absolute -inset-4 border-2 border-slate-100 rounded-[3rem] -rotate-3 group-hover:rotate-0 transition-transform">
                    </div>
                    <div class="relative bg-slate-900 aspect-[4/5] rounded-[3rem] overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/pdg3.jpg') }}" alt="Mamadou Diaw" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Expertise fondée sur le terrain --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="order-2 lg:order-1">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-8 bg-white rounded-[2.5rem] shadow-xl shadow-black/5 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4
                                class="font-black text-slate-900 italic tracking-tight underline decoration-gold-500/10 underline-offset-4">
                                {{ __('about.students_families') }}</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium italic">{{ __('about.students_families_desc') }}</p>
                        </div>
                        <div class="p-8 bg-white rounded-[2.5rem] shadow-xl shadow-black/5 mt-8 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2-2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <h4
                                class="font-black text-slate-900 italic tracking-tight underline decoration-gold-500/10 underline-offset-4">
                                {{ __('about.institutions') }}</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium italic">{{ __('about.institutions_desc') }}</p>
                        </div>
                        <div class="p-8 bg-white rounded-[2.5rem] shadow-xl shadow-black/5 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <h4
                                class="font-black text-slate-900 italic tracking-tight underline decoration-gold-500/10 underline-offset-4">
                                {{ __('about.complex_files') }}</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium italic">{{ __('about.complex_files_desc') }}</p>
                        </div>
                        <div class="p-8 bg-white rounded-[2.5rem] shadow-xl shadow-black/5 mt-8 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h4
                                class="font-black text-slate-900 italic tracking-tight underline decoration-gold-500/10 underline-offset-4">
                                {{ __('about.field_realities') }}</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium italic">{{ __('about.field_realities_desc') }}</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-12 order-1 lg:order-2">
                    <div class="space-y-6">
                        <h2 class="text-sm font-bold tracking-[0.3em] text-gold-600 uppercase italic">{{ __('about.authentic_exp') }}</h2>
                        <h3 class="text-4xl lg:text-5xl font-black text-slate-900 leading-tight italic tracking-tighter">{{ __('about.expertise_founded_1') }}
                            <span class="text-gold-600">{{ __('about.expertise_founded_2') }}</span></h3>
                        <p class="text-lg text-slate-500 italic font-medium leading-relaxed">
                            {{ __('about.expertise_desc') }}
                        </p>
                    </div>
                    <div
                        class="space-y-8 bg-white p-12 rounded-[3.5rem] border border-slate-100 shadow-2xl shadow-gold-500/5">
                        <h4 class="text-2xl font-black italic tracking-tighter">{{ __('about.why_born') }}</h4>
                        <p class="text-slate-500 font-medium italic leading-relaxed text-sm">
                            {{ __('about.why_born_desc') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Philosophie --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <h2 class="text-sm font-bold tracking-[0.3em] text-gold-600 uppercase italic">{{ __('about.our_foundings') }}</h2>
                <h3 class="text-4xl font-black text-slate-900 italic tracking-tighter">{{ __('about.philosophy_1') }} <span
                        class="text-gold-600">{{ __('about.philosophy_2') }}</span></h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div
                    class="p-12 rounded-[3rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:shadow-gold-500/10 transition-all group">
                    <div
                        class="text-7xl font-black text-gold-100 mb-8 font-serif group-hover:text-gold-600/20 transition-colors">
                        01.</div>
                    <h4 class="text-2xl font-black mb-4 italic tracking-tighter">{{ __('about.clarity') }}</h4>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium italic">{{ __('about.clarity_desc') }}</p>
                </div>
                <div class="p-12 rounded-[3rem] bg-slate-900 text-white shadow-2xl shadow-gold-900/10 group">
                    <div
                        class="text-7xl font-black text-white/5 mb-8 font-serif group-hover:text-gold-600 transition-colors">
                        02.</div>
                    <h4 class="text-2xl font-black mb-4 italic tracking-tighter text-gold-500">{{ __('about.human_support') }}</h4>
                    <p class="text-sm text-slate-300 leading-relaxed font-medium italic">{{ __('about.human_support_desc') }}</p>
                </div>
                <div
                    class="p-12 rounded-[3rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:shadow-gold-500/10 transition-all group">
                    <div
                        class="text-7xl font-black text-gold-100 mb-8 font-serif group-hover:text-gold-600/20 transition-colors">
                        03.</div>
                    <h4 class="text-2xl font-black mb-4 italic tracking-tighter">{{ __('about.international_vision') }}</h4>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium italic">{{ __('about.international_vision_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <x-home.testimonials />

    {{-- Call to Action / Engagement --}}
    <section class="py-24 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl font-black leading-tight italic">{{ __('about.company_built') }}</h2>
                    <p class="text-slate-400 font-medium">{{ __('about.company_desc') }}</p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span class="text-sm font-bold uppercase tracking-wider">{{ __('about.prof_support') }}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span class="text-sm font-bold uppercase tracking-wider">{{ __('about.respect_rules') }}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span class="text-sm font-bold uppercase tracking-wider">{{ __('about.real_interest') }}</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gold-600 p-12 rounded-[3.5rem] space-y-8 shadow-2xl shadow-gold-500/20 text-center">
                    <h3 class="text-3xl font-black text-slate-950">{{ __('about.ready_build_1') }} <br> {{ __('about.ready_build_2') }}</h3>
                    <p class="text-slate-950/70 italic">{{ __('about.ready_desc') }}</p>
                    <a href="{{ route('contact') }}"
                        class="inline-block px-10 py-5 rounded-3xl bg-slate-900 text-white font-black hover:bg-white hover:text-gold-600 transition-all transform hover:scale-105 active:scale-95 shadow-xl">
                        {{ __('about.contact_us') }}
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection