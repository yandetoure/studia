@extends('layouts.app')

@section('title', __('faq.page_title'))

@section('content')
    <section class="pt-40 pb-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">{{ __('faq.hero_subtitle') }}</h1>
                <h2 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight">{!! __('faq.hero_title') !!}</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium">
                    {{ __('faq.hero_desc') }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white" id="faq">
        <div class="max-w-4xl mx-auto px-6">
            <div class="space-y-6">
                @php
                    $faqs = [
                        ['q' => __('faq.q1'), 'a' => __('faq.a1')],
                        ['q' => __('faq.q2'), 'a' => __('faq.a2')],
                        ['q' => __('faq.q3'), 'a' => __('faq.a3')],
                        ['q' => __('faq.q4'), 'a' => __('faq.a4')],
                        ['q' => __('faq.q5'), 'a' => __('faq.a5')],
                        ['q' => __('faq.q6'), 'a' => __('faq.a6')],
                        ['q' => __('faq.q7'), 'a' => __('faq.a7')],
                        ['q' => __('faq.q8'), 'a' => __('faq.a8')],
                        ['q' => __('faq.q9'), 'a' => __('faq.a9')],
                        ['q' => __('faq.q10'), 'a' => __('faq.a10')],
                        ['q' => __('faq.q11'), 'a' => __('faq.a11')],
                        ['q' => __('faq.q12'), 'a' => __('faq.a12')],
                        ['q' => __('faq.q13'), 'a' => __('faq.a13')],
                        ['q' => __('faq.q14'), 'a' => __('faq.a14')],
                        ['q' => __('faq.q15'), 'a' => __('faq.a15')],
                        ['q' => __('faq.q16'), 'a' => __('faq.a16')],
                        ['q' => __('faq.q17'), 'a' => __('faq.a17')],
                        ['q' => __('faq.q18'), 'a' => __('faq.a18')],
                        ['q' => __('faq.q19'), 'a' => __('faq.a19')],
                        ['q' => __('faq.q20'), 'a' => __('faq.a20')],
                    ];
                @endphp

                @foreach($faqs as $faq)
                    <div
                        class="p-8 rounded-[2.5rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl transition-all group">
                        <h4
                            class="text-xl font-black text-slate-900 italic mb-4 tracking-tighter flex items-center justify-between pointer-events-none">
                            {{ $faq['q'] }}
                            <svg class="w-6 h-6 text-gold-600 group-hover:rotate-180 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </h4>
                        <div class="text-slate-500 font-medium italic leading-relaxed text-sm">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div
                class="mt-20 p-12 rounded-[3.5rem] bg-gold-600 text-slate-950 text-center space-y-8 shadow-2xl shadow-gold-500/20">
                <h3 class="text-3xl font-black italic">{{ __('faq.contact_title') }}</h3>
                <div class="flex flex-col sm:flex-row justify-center gap-8 font-bold italic">
                    <p class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg> +225 07 67 93 93 93</p>
                    <p class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg> contact@studia-edu.com</p>
                </div>
                <div class="pt-4">
                    <a href="{{ route('contact') }}"
                        class="inline-block px-10 py-5 rounded-3xl bg-slate-900 text-white font-black hover:bg-white hover:text-gold-600 transition-all shadow-xl">{{ __('faq.book_appt') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection