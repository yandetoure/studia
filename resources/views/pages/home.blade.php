@extends('layouts.app')

@section('title', 'STUDIA - Ouvrir le Monde, Guider l’Avenir')

@section('content')
    {{-- Premium Hero Section with Photo Overlay & Gold Theme --}}
    <section class="relative min-h-screen flex items-center overflow-hidden bg-slate-950">
        {{-- Hero Background with Advanced Overlay --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero_gold.png') }}" alt="STUDIA Premium" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-transparent"></div>
            <div class="absolute inset-x-0 bottom-0 h-40 bg-gradient-to-t from-slate-950 to-transparent"></div>
        </div>

        <div
            class="max-w-[1400px] mx-auto px-8 lg:px-12 grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-center z-10 relative">
            {{-- Text Content --}}
            <div class="lg:col-span-7 space-y-10 py-20">
                <div class="space-y-6">

                    <h1 class="text-7xl lg:text-[7.5rem] font-black text-white leading-[0.9] tracking-[-0.04em]">
                        Ouvrir le <br>
                        <span class="text-gold-500 italic font-serif font-light lowercase">Monde.</span>
                    </h1>

                    <p class="text-xl lg:text-2xl text-slate-300 max-w-xl leading-relaxed font-light">
                        Cabinet d’orientation scolaire, de soutien académique et de mobilité internationale. Nous
                        accompagnons les élèves, étudiants et professionnels africains dans leurs projets d’études et de
                        formation à l’étranger.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-6">
                    <a href="{{ route('contact') }}#appointment"
                        class="relative group overflow-hidden px-10 py-5 rounded-full bg-gold-600 text-slate-950 font-black transition-all hover:bg-gold-500 hover:scale-105 active:scale-95 shadow-2xl shadow-gold-600/20 text-center">
                        Prendre rendez-vous
                    </a>
                    <a href="#services"
                        class="px-10 py-5 rounded-full bg-white/5 backdrop-blur-sm text-white font-bold border border-white/20 hover:bg-white/10 transition-all text-center flex items-center justify-center gap-3 group">
                        Découvrir nos services
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>

                {{-- Hero Contact Box (White Cards) --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-10">
                    <div
                        class="p-6 rounded-3xl bg-white shadow-2xl shadow-black/10 transition-transform hover:-translate-y-2">
                        <p class="text-[10px] font-black text-gold-600 uppercase tracking-widest mb-1 italic">Localisation
                        </p>
                        <p class="text-sm font-bold text-slate-900 leading-tight">Côte d’Ivoire</p>
                    </div>
                    <div
                        class="p-6 rounded-3xl bg-white shadow-2xl shadow-black/10 transition-transform hover:-translate-y-2">
                        <p class="text-[10px] font-black text-gold-600 uppercase tracking-widest mb-1 italic">Contact Direct
                        </p>
                        <p class="text-sm font-bold text-slate-900 leading-tight">+225 07 67 93 93 93</p>
                        <p class="text-[10px] text-slate-400 font-medium italic">Available 24/7</p>
                    </div>
                    <div
                        class="p-6 rounded-3xl bg-white shadow-2xl shadow-black/10 transition-transform hover:-translate-y-2">
                        <p class="text-[10px] font-black text-gold-600 uppercase tracking-widest mb-1 italic">Email Officiel
                        </p>
                        <p class="text-sm font-bold text-slate-900 leading-tight">contact@studia-edu.com</p>
                    </div>
                </div>
            </div>

            {{-- Floating Feature Cards --}}
            <div class="lg:col-span-5 relative hidden lg:block">
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute bottom-10 left-1/2 -content-x-1/2 flex flex-col items-center gap-4 text-white/30">
            <div class="w-px h-16 bg-gradient-to-b from-gold-600 to-transparent"></div>
        </div>
    </section>

    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>

    {{-- Redesigned Qui sommes-nous Section: Storytelling --}}
    <section class="py-32 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 lg:gap-32 items-center">
                {{-- Visual Composition --}}
                <div class="relative order-2 lg:order-1">
                    <div class="relative z-10 rounded-[3rem] overflow-hidden shadow-2xl scale-105 transform translate-y-6">
                        <img src="{{ asset('images/pdg.jpg') }}" alt="Expertise STUDIA"
                            class="w-full h-full object-cover">
                    </div>
                    <div
                        class="absolute -top-12 -right-12 w-2/3 aspect-square rounded-[3rem] overflow-hidden shadow-xl z-0 hidden lg:block border-[12px] border-white">
                        <img src="{{ asset('images/campus.png') }}" alt="Success Abroad"
                            class="w-full h-full object-cover grayscale">
                    </div>

                    {{-- Heritage Badge --}}
                </div>

                {{-- Content --}}
                <div class="space-y-10 order-1 lg:order-2">
                    <div class="space-y-6">
                        <h2 class="text-sm font-bold tracking-[0.3em] text-gold-600 uppercase italic">L'Héritage STUDIA</h2>
                        <h3 class="text-5xl lg:text-6xl font-black text-slate-900 leading-tight italic tracking-tighter">
                            Une Vision <span
                                class="text-gold-600 underline decoration-gold-200 underline-offset-[12px]">Humaine</span>
                            du Succès.
                        </h3>
                        <p class="text-xl text-slate-500 leading-relaxed font-medium italic">
                            STUDIA n'est pas qu'un cabinet de conseil. C'est l'histoire d'un engagement profond envers la
                            réussite de la jeunesse africaine.
                        </p>
                    </div>

                    <div class="space-y-8 text-slate-600">
                        <div class="flex gap-8 group">
                            <div class="w-px h-16 bg-gold-100 group-hover:bg-gold-600 transition-colors"></div>
                            <div>
                                <h4
                                    class="font-black text-slate-900 italic tracking-tight text-lg mb-2 underline decoration-gold-500/10 underline-offset-4">
                                    Plus qu'une Admission</h4>
                                <p class="text-sm leading-relaxed capitalize">Nous bâtissons des projets de vie. Chaque
                                    étudiant est unique, chaque parcours est une stratégie sur-mesure.</p>
                            </div>
                        </div>
                        <div class="flex gap-8 group">
                            <div class="w-px h-16 bg-gold-100 group-hover:bg-gold-600 transition-colors"></div>
                            <div>
                                <h4
                                    class="font-black text-slate-900 italic tracking-tight text-lg mb-2 underline decoration-gold-500/10 underline-offset-4">
                                    Un Accompagnement Structuré</h4>
                                <p class="text-sm leading-relaxed mb-6">Nous accompagnons chaque étudiant de manière
                                    structurée, depuis la réflexion sur son projet jusqu’à son installation dans son pays
                                    d’études.</p>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-3">
                                    @php
                                        $steps = [
                                            'Orientation stratégique',
                                            'Choix de la formation et de l’établissement',
                                            'Constitution du dossier',
                                            'Admission',
                                            'Procédure visa',
                                            'Préparation du départ',
                                            'Logement et intégration'
                                        ];
                                    @endphp
                                    @foreach($steps as $index => $step)
                                        <li class="flex items-center gap-3 text-sm font-bold text-slate-700 italic group/step">
                                            <span class="text-gold-600 font-black text-xs">{{ $index + 1 }}.</span>
                                            <span class="group-hover/step:text-gold-600 transition-colors">{{ $step }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6">
                        <a href="{{ route('about') }}"
                            class="inline-flex items-center gap-4 text-slate-900 font-black italic group text-lg">
                            <span>Découvrir notre histoire</span>
                            <div
                                class="w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center group-hover:bg-slate-900 group-hover:text-white transition-all">
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services section will go here --}}
    <x-home.services />

    {{-- Destinations section will go here --}}
    <x-home.destinations />

    {{-- Why Studia section will go here --}}
    <x-home.why-studia />

    {{-- Testimonials section will go here --}}
    <x-home.testimonials />

    {{-- Partners section will go here --}}
    <x-home.partners />

    {{-- Redesigned Premium CTA --}}
    <section class="py-32 max-w-7xl mx-auto px-6">
        <div
            class="relative p-12 lg:p-24 rounded-[4rem] bg-slate-900 border border-white/5 overflow-hidden group shadow-2xl">
            {{-- Animated light effects --}}
            <div
                class="absolute -top-24 -right-24 w-96 h-96 bg-gold-600/30 rounded-full blur-[120px] group-hover:bg-gold-600/40 transition-all duration-1000">
            </div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-600/20 rounded-full blur-[100px]"></div>

            <div class="relative z-10 text-center space-y-12">
                <div class="space-y-6">
                    <h2 class="text-4xl lg:text-7xl font-black text-white italic leading-tight tracking-tighter">
                        Votre Avenir n'attend pas. <br> <span
                            class="text-gold-500 underline decoration-gold-500/20 underline-offset-8">Prêts à décoller
                            ?</span>
                    </h2>
                    <p class="text-xl text-slate-400 max-w-2xl mx-auto font-medium italic">
                        Rejoignez les centaines d'étudiants qui ont fait confiance à l'expertise STUDIA pour leurs projets
                        d'études internationaux.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-center gap-8 pt-4">
                    <a href="{{ route('contact') }}"
                        class="px-12 py-6 rounded-full bg-gold-600 text-slate-950 font-black text-xl shadow-2xl shadow-gold-500/30 hover:bg-white hover:text-slate-950 transition-all transform hover:scale-110 active:scale-95">
                        Démarrer mon projet
                    </a>
                    <a href="tel:+2250767939393"
                        class="px-12 py-6 rounded-full bg-white/5 border border-white/10 text-white font-black text-xl backdrop-blur-md hover:bg-white/10 transition-all flex items-center justify-center gap-4">
                        <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        +225 07 67 93 93 93
                    </a>
                </div>

                <div class="pt-12 border-t border-white/5 flex flex-wrap justify-center gap-12 grayscale opacity-40">
                    <p class="text-[10px] font-bold uppercase tracking-[0.5em] text-white">Confiance . Rigueur . Excellence
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection