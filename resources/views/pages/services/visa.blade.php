@extends('layouts.app')

@section('title', 'Visa & Mobilité Internationale - STUDIA')

@section('content')
    <section class="pt-40 pb-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">Assistance Administrative</h1>
                <h2 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight">Visa & Mobilité <br> <span
                        class="text-gold-600">Internationale</span>.</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium">
                    Les procédures de visa sont souvent complexes et stressantes. STUDIA vous accompagne à chaque étape pour
                    maximiser vos chances de réussite.
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
                            'title' => 'Vérification des documents',
                            'desc' => 'Audit complet de vos pièces pour éviter toute erreur de fond ou de forme.',
                            'icon' => '<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                        ],
                        [
                            'title' => 'Constitution du dossier visa',
                            'desc' => 'Assemblage stratégique de votre dossier selon les exigences consulaires.',
                            'icon' => '<path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>'
                        ],
                        [
                            'title' => 'Préparation aux entretiens',
                            'desc' => 'Simulations et coaching pour aborder vos entretiens avec confiance.',
                            'icon' => '<path d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>'
                        ],
                        [
                            'title' => 'Suivi administratif',
                            'desc' => 'Gestion de la relation avec les organismes (Campus France, TLS, etc.).',
                            'icon' => '<path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>'
                        ],
                        [
                            'title' => 'Conseils installation',
                            'desc' => 'Accompagnement dans la recherche de logement et l’ouverture de comptes.',
                            'icon' => '<path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>'
                        ],
                        [
                            'title' => 'Mobilité professionnelle',
                            'desc' => 'Détachement, formation pro et projets internationaux pour cadres.',
                            'icon' => '<path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>'
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
                    <p class="text-5xl font-black text-gold-500 mb-2">+100</p>
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