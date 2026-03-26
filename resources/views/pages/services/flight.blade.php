@extends('layouts.app')

@section('title', __('services_pages.flight_title'))

@section('content')
    <section class="pt-40 pb-24 bg-gold-600 text-slate-950 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-3xl space-y-8">
                <h1 class="text-sm font-bold tracking-[0.2em] text-slate-950/70 uppercase italic">{{ __('services_pages.flight_hero_subtitle') }}</h1>
                <h2 class="text-5xl lg:text-7xl font-black leading-tight italic">{!! __('services_pages.flight_hero_title_1') !!}</h2>
                <p class="text-xl text-slate-950/70 leading-relaxed font-medium">
                    {{ __('services_pages.flight_hero_desc') }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-12">
                    <h3 class="text-3xl font-black italic tracking-tighter">{{ __('services_pages.flight_serenity') }}</h3>
                    <div class="grid grid-cols-1 gap-8">
                        <div class="flex gap-6">
                            <div
                                class="w-12 h-12 shrink-0 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1 italic uppercase tracking-widest text-xs">{{ __('services_pages.flight_feat1_title') }}</h4>
                                <p class="text-sm text-slate-500 font-medium">{{ __('services_pages.flight_feat1_desc') }}</p>
                            </div>
                        </div>
                        <div class="flex gap-6">
                            <div
                                class="w-12 h-12 shrink-0 rounded-2xl bg-slate-50 text-slate-900 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1 italic uppercase tracking-widest text-xs">{{ __('services_pages.flight_feat2_title') }}</h4>
                                <p class="text-sm text-slate-500 font-medium">{{ __('services_pages.flight_feat2_desc') }}</p>
                            </div>
                        </div>
                        <div class="flex gap-6">
                            <div
                                class="w-12 h-12 shrink-0 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1 italic uppercase tracking-widest text-xs">{{ __('services_pages.flight_feat3_title') }}</h4>
                                <p class="text-sm text-slate-500 font-medium">{{ __('services_pages.flight_feat3_desc') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 p-12 rounded-[3.5rem] border border-slate-100 text-center space-y-8">
                    <div
                        class="w-20 h-20 bg-gold-600 rounded-full mx-auto flex items-center justify-center text-slate-950 shadow-2xl shadow-gold-500/30">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black italic">{{ __('services_pages.flight_need_ticket') }}</h4>
                    <p class="text-slate-500 italic font-medium capitalize">{{ __('services_pages.flight_need_desc') }}</p>
                    <a href="{{ route('contact') }}"
                        class="inline-block px-10 py-5 rounded-3xl bg-slate-900 text-white font-black hover:bg-gold-600 hover:text-slate-950 transition-all">{{ __('services_pages.flight_contact_logistics') }}</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Info --}}
    <section class="py-12 bg-slate-50 border-t border-slate-100 italic">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-xs text-slate-400 font-bold uppercase tracking-widest">{{ __('services_pages.flight_disclaimer') }}</p>
        </div>
    </section>
@endsection