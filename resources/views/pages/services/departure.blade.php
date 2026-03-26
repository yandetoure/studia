@extends('layouts.app')

@section('title', __('services_pages.dep_title'))

@section('content')
    <section class="pt-40 pb-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">{{ __('services_pages.dep_hero_subtitle') }}</h1>
                    <h2 class="text-5xl lg:text-7xl font-black leading-tight italic text-slate-900">{!! __('services_pages.dep_hero_title_1') !!}</h2>
                    <p class="text-xl text-slate-600 leading-relaxed font-medium">
                        {{ __('services_pages.dep_hero_desc') }}
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ route('contact') }}"
                            class="px-8 py-4 rounded-2xl bg-gold-600 text-slate-950 font-bold shadow-xl shadow-gold-500/20 hover:scale-105 transition-all">{{ __('services_pages.dep_contact') }}</a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gold-600 rounded-[3rem] blur-[80px] opacity-10"></div>
                        <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2070&auto=format&fit=crop"
                            class="relative rounded-[3rem] border border-slate-100 shadow-2xl" alt="Préparation au départ">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center space-y-8">
                <h3 class="text-4xl font-black text-slate-900 italic tracking-tighter">{!! __('services_pages.dep_arrive_title') !!}</h3>
                <p class="text-lg text-slate-500 font-medium">
                    {{ __('services_pages.dep_arrive_desc') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-16">
                <div class="p-12 rounded-[3rem] bg-white border border-slate-100 shadow-xl shadow-black/5 space-y-6">
                    <div class="w-16 h-16 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-slate-900 italic tracking-tighter">{{ __('services_pages.dep_housing_title') }}</h4>
                    <p class="text-slate-500 italic font-medium">{{ __('services_pages.dep_housing_desc') }}</p>
                    <a href="{{ route('housing') }}"
                        class="inline-flex items-center gap-2 text-gold-600 font-bold hover:translate-x-2 transition-transform">
                        {{ __('services_pages.dep_housing_link') }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                <div class="p-12 rounded-[3rem] bg-white border border-slate-100 shadow-xl shadow-black/5 space-y-6">
                    <div class="w-16 h-16 rounded-2xl bg-slate-900 text-white flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-slate-900 italic tracking-tighter">{{ __('services_pages.dep_integ_title') }}</h4>
                    <p class="text-slate-500 italic font-medium">{{ __('services_pages.dep_integ_desc') }}</p>
                    <a href="{{ route('housing') }}"
                        class="inline-flex items-center gap-2 text-gold-600 font-bold hover:translate-x-2 transition-transform">
                        {{ __('services_pages.dep_integ_link') }}
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <x-home.partners />
@endsection