@extends('layouts.app')

@section('title', __('services_pages.orientation_title'))

@section('content')
    <section class="pt-40 pb-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h1 class="text-sm font-bold tracking-[0.2em] text-gold-500 uppercase italic">{{ __('services_pages.orientation_hero_subtitle') }}</h1>
                    <h2 class="text-5xl lg:text-7xl font-black leading-tight italic">{!! __('services_pages.orientation_hero_title_1') !!}</h2>
                    <p class="text-xl text-slate-400 leading-relaxed font-medium">
                        {{ __('services_pages.orientation_hero_desc') }}
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ route('contact') }}#appointment"
                            class="px-8 py-4 rounded-2xl bg-gold-600 text-slate-950 font-bold shadow-xl shadow-gold-500/20 hover:scale-105 transition-all">{{ __('services_pages.book_appointment') }}</a>
                    </div>
                </div>
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gold-600 rounded-[3rem] blur-[80px] opacity-20"></div>
                        <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=1974&auto=format&fit=crop"
                            class="relative rounded-[3rem] border border-slate-800 shadow-2xl" alt="Soutien scolaire">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                <div class="space-y-12">
                    <div class="space-y-4">
                        <h3 class="text-3xl font-black text-slate-900 uppercase italic tracking-tighter">{{ __('services_pages.our_approach') }}</h3>
                        <p class="text-slate-600 leading-relaxed italic font-medium">{{ __('services_pages.approach_desc') }}</p>
                    </div>

                    <div class="space-y-6">
                        @php
                            $items = [
                                __('services_pages.item_1_title') => __('services_pages.item_1_desc'),
                                __('services_pages.item_2_title') => __('services_pages.item_2_desc'),
                                __('services_pages.item_3_title') => __('services_pages.item_3_desc'),
                                __('services_pages.item_4_title') => __('services_pages.item_4_desc')
                            ];
                        @endphp

                        @foreach($items as $title => $desc)
                            <div
                                class="flex gap-6 p-6 rounded-3xl bg-slate-50 border border-slate-100 group hover:bg-white hover:shadow-xl transition-all">
                                <div
                                    class="w-12 h-12 shrink-0 rounded-2xl bg-gold-600 text-slate-950 flex items-center justify-center font-black">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 mb-1 italic tracking-tight">{{ $title }}</h4>
                                    <p class="text-sm text-slate-500">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-slate-50 rounded-[3.5rem] p-12 space-y-8 border border-slate-100">
                    <h3 class="text-3xl font-black text-slate-900">{{ __('services_pages.why_crucial') }}</h3>
                    <div class="space-y-6 text-slate-600 leading-relaxed font-medium capitalize">
                        <p>{{ __('services_pages.crucial_p1') }}</p>
                        <p>{{ __('services_pages.crucial_p2') }}</p>
                        <p>{{ __('services_pages.crucial_p3') }}</p>
                    </div>
                    <div class="pt-8">
                        <div class="p-8 rounded-[2rem] bg-white shadow-xl shadow-black/5 flex items-center gap-6">
                            <div
                                class="w-16 h-16 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center italic font-black text-2xl">
                                100%</div>
                            <div>
                                <p class="font-black text-slate-900">{{ __('services_pages.support_100') }}</p>
                                <p class="text-xs text-slate-500 italic">{{ __('services_pages.from_college') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-home.testimonials />
@endsection