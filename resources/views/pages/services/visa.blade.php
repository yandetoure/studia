@extends('layouts.app')

@section('title', 'Visa & Mobilité Internationale - STUDIA')

@section('content')
    <section class="pt-40 pb-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">Assistance Administrative</h1>
                <h2 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight">Procédure <br> <span
                        class="text-gold-600">Visa</span>.</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium">
                    Les procédures de visa sont souvent complexes. STUDIA vous accompagne dans chaque démarche
                    administrative pour sécuriser votre départ.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $visas = [
                        [
                            'title' => 'Préparation du dossier consulaire',
                            'desc' => 'Audit et assemblage stratégique de vos pièces selon les exigences strictes des consulats.',
                            'icon' => '<path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>'
                        ],
                        [
                            'title' => 'Accompagnement administratif',
                            'desc' => 'Gestion de la relation avec les organismes officiels et suivi rigoureux de votre dossier.',
                            'icon' => '<path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                        ],
                        [
                            'title' => 'Préparation aux entretiens',
                            'desc' => 'Simulations et coaching intensif pour aborder vos entretiens consulaires avec assurance.',
                            'icon' => '<path d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>'
                        ]
                    ];
                @endphp
                @foreach($visas as $visa)
                    <div
                        class="p-10 rounded-[3rem] bg-white border border-slate-100 shadow-xl shadow-black/5 hover:-translate-y-2 transition-all group">
                        <div
                            class="w-14 h-14 rounded-2xl bg-gold-50 text-gold-600 mb-8 flex items-center justify-center group-hover:bg-gold-600 group-hover:text-slate-950 transition-all">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">{!! $visa['icon'] !!}</svg>
                        </div>
                        <h4 class="text-xl font-black text-slate-900 italic mb-4 tracking-tighter">{{ $visa['title'] }}</h4>
                        <p class="text-sm text-slate-500 leading-relaxed italic font-medium">{{ $visa['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Stats/Trust --}}
    <section class="py-24 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-6 text-center space-y-12">
            <h3 class="text-3xl lg:text-5xl font-black italic italic">Notre engagement : Rigueur & Rapidité.</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <p class="text-5xl font-black text-gold-500 mb-2">95%</p>
                    <p class="text-sm font-bold uppercase tracking-widest text-slate-400">Taux de réussite</p>
                </div>
                <div>
                    <p class="text-5xl font-black text-gold-500 mb-2">+2000</p>
                    <p class="text-sm font-bold uppercase tracking-widest text-slate-400">Dossiers / an</p>
                </div>
                <div>
                    <p class="text-5xl font-black text-gold-500 mb-2">0</p>
                    <p class="text-sm font-bold uppercase tracking-widest text-slate-400">Fausse promesse</p>
                </div>
            </div>
        </div>
    </section>
@endsection