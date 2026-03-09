@extends('layouts.app')

@section('title', 'Logement & Intégration - STUDIA')

@section('content')
    <section class="pt-40 pb-24 bg-slate-900 text-white relative overflow-hidden">
        {{-- Decorative background --}}
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gold-600/10 rounded-full blur-[120px] -mr-32 -mt-32">
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-3xl space-y-8">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-500 uppercase italic">Installation & Sérénité</h1>
                <h2 class="text-5xl lg:text-7xl font-black leading-tight italic">Préparer votre <br> <span
                        class="text-gold-500">Installation</span> dans votre pays d’études.</h2>
                <p class="text-xl text-slate-400 leading-relaxed font-medium">
                    Trouver un logement dans un nouveau pays peut être complexe lorsque l’on est à distance. STUDIA
                    accompagne les étudiants dans la recherche de solutions fiables.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-12">
                    <div class="space-y-6">
                        <h3 class="text-4xl font-black text-slate-900 italic tracking-tighter">Une transition <span
                                class="text-gold-600">sereine</span>.</h3>
                        <p class="text-lg text-slate-600 leading-relaxed font-medium">
                            L’objectif est d’assurer une transition fluide vers votre nouvelle vie étudiante internationale.
                            Nous vous aidons à identifier les meilleures options selon votre budget et vos besoins.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-6">
                        @php
                            $options = [
                                'Résidences étudiantes' => 'Des solutions sécurisées et conviviales, souvent situées à proximité des campus.',
                                'Logements privés' => 'Studios ou appartements en ville pour plus d\'indépendance.',
                                'Solutions temporaires' => 'Aide à la réservation d\'un hébergement pour vos premiers jours à l\'arrivée.'
                            ];
                        @endphp

                        @foreach($options as $title => $desc)
                            <div
                                class="p-8 rounded-[2.5rem] bg-slate-50 border border-slate-100 flex items-start gap-6 group hover:bg-white hover:shadow-xl transition-all">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-gold-600 text-slate-950 flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-black text-slate-900 italic mb-2">{{ $title }}</h4>
                                    <p class="text-slate-500 font-medium">{{ $desc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 bg-gold-600 rounded-[3.5rem] blur-[100px] opacity-10"></div>
                    <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=2070&auto=format&fit=crop"
                        class="relative rounded-[3.5rem] shadow-2xl border border-slate-100" alt="Logement étudiant">

                    <div
                        class="absolute -bottom-10 -left-10 p-8 rounded-[2rem] bg-slate-900 text-white shadow-2xl space-y-2">
                        <p class="text-3xl font-black text-gold-500">100%</p>
                        <p class="text-sm font-bold uppercase tracking-widest italic">Accompagnement Garanti</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Checklist section --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6 text-center space-y-16">
            <h3 class="text-4xl font-black text-slate-900 italic tracking-tighter">Votre Pack <span
                    class="text-gold-600">Intégration</span>.</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-xl shadow-black/5 space-y-6">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-slate-900 italic">Conseils administratifs</h4>
                    <p class="text-slate-500 font-medium">Ouverture de compte bancaire, assurance, titre de séjour.</p>
                </div>

                <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-xl shadow-black/5 space-y-6">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-slate-900 text-white flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-slate-900 italic">Vie étudiante</h4>
                    <p class="text-slate-500 font-medium">Préparation aux codes culturels et académiques du pays d’accueil.
                    </p>
                </div>

                <div class="bg-white p-10 rounded-[3rem] border border-slate-100 shadow-xl shadow-black/5 space-y-6">
                    <div class="w-16 h-16 mx-auto rounded-2xl bg-gold-600 text-slate-950 flex items-center justify-center">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h4 class="text-2xl font-black text-slate-900 italic">Orientation locale</h4>
                    <p class="text-slate-500 font-medium">Repères dans la ville d’accueil, réseaux de transport, job
                        étudiant.</p>
                </div>
            </div>
        </div>
    </section>

    <x-home.partners />
@endsection