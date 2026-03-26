@extends('layouts.app')

@section('title', __('why_studia.page_title') . ' - Notre Excellence')

@section('content')
    <section class="pt-40 pb-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">{{ __('why_studia.hero_subtitle') }}</h1>
                <h2 class="text-5xl lg:text-7xl font-black leading-tight italic text-slate-900">{!! __('why_studia.hero_title') !!}</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium">
                    {{ __('why_studia.hero_desc') }}
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @php
                    $reasons = [
                        ['title' => '10 ans d’expérience', 'desc' => 'Une expertise éprouvée dans la mobilité académique et les procédures consulaires.', 'icon' => '10'],
                        ['title' => 'Accompagnement de A à Z', 'desc' => 'Un suivi personnalisé et stratégique de l\'orientation jusqu\'à l\'installation.', 'icon' => 'AZ'],
                        ['title' => 'Expertise Afrique-Inter', 'desc' => 'Une compréhension profonde des défis locaux et des exigences internationales.', 'icon' => '🌍'],
                        ['title' => 'Méthodes fiables', 'desc' => 'Des processus structurés et éprouvés pour maximiser vos chances de succès.', 'icon' => '✓'],
                        ['title' => 'Transparence totale', 'desc' => 'Un professionnalisme rigoureux et une clarté absolue sur les chances réelles.', 'icon' => '⚖'],
                        ['title' => 'Suivi permanent', 'desc' => 'Nous vous accompagnons avant, pendant et même après votre départ.', 'icon' => '∞']
                    ];
                @endphp
                @foreach($reasons as $reason)
                    <div class="p-12 rounded-[3.5rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl transition-all group">
                        <div class="w-16 h-16 rounded-2xl bg-gold-600 text-slate-950 flex items-center justify-center font-black text-2xl mb-8 group-hover:scale-110 transition-transform italic">{{ $reason['icon'] }}</div>
                        <h4 class="text-2xl font-black text-slate-900 italic mb-4 tracking-tighter">{{ $reason['title'] }}</h4>
                        <p class="text-sm text-slate-500 leading-relaxed italic font-medium capitalize">{{ $reason['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-home.why-studia />
    <x-home.testimonials />
@endsection
