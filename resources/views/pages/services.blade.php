@extends('layouts.app')

@section('title', 'Nos Services - STUDIA - Accompagnement Complet')

@section('content')
    <section class="pt-40 pb-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">Nos Services</h1>
                <h2 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight">Chez STUDIA, nous proposons un
                    accompagnement <span class="text-gold-600">complet</span> et structuré.</h2>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Card 1: Orientation --}}
                <div
                    class="group p-12 rounded-[3rem] bg-white border border-slate-100 hover:shadow-2xl transition-all hover:-translate-y-2 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div class="w-16 h-16 rounded-[1.5rem] bg-gold-50 text-gold-600 flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 italic">Orientation académique</h3>
                        <p class="text-slate-500 italic font-medium text-sm">Analyse du profil, choix de la destination,
                            choix de la formation et stratégie académique.</p>
                    </div>
                    <div class="mt-12">
                        <a href="{{ route('services.orientation') }}"
                            class="inline-flex items-center gap-2 font-bold text-gold-600 hover:text-slate-900 transition-colors">
                            En savoir plus
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card 2: Admission --}}
                <div
                    class="group p-12 rounded-[3rem] bg-white border border-slate-100 hover:shadow-2xl transition-all hover:-translate-y-2 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div class="w-16 h-16 rounded-[1.5rem] bg-slate-900 text-white flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 italic">Admission internationale</h3>
                        <p class="text-slate-500 italic font-medium text-sm">Recherche d’établissements, préparation du
                            dossier, CV académique et lettre de motivation.</p>
                    </div>
                    <div class="mt-12">
                        <a href="{{ route('services.abroad') }}"
                            class="inline-flex items-center gap-2 font-bold text-gold-600 hover:text-slate-900 transition-colors">
                            En savoir plus
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card 3: Visa --}}
                <div
                    class="group p-12 rounded-[3rem] bg-white border border-slate-100 hover:shadow-2xl transition-all hover:-translate-y-2 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div class="w-16 h-16 rounded-[1.5rem] bg-gold-600 text-slate-950 flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 italic">Procédure visa</h3>
                        <p class="text-slate-500 italic font-medium text-sm">Préparation du dossier consulaire, démarche
                            administrative et préparation aux entretiens.</p>
                    </div>
                    <div class="mt-12">
                        <a href="{{ route('services.visa') }}"
                            class="inline-flex items-center gap-2 font-bold text-gold-600 hover:text-slate-900 transition-colors">
                            En savoir plus
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card 4: Départ --}}
                <div
                    class="group p-12 rounded-[3rem] bg-white border border-slate-100 hover:shadow-2xl transition-all hover:-translate-y-2 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div class="w-16 h-16 rounded-[1.5rem] bg-gold-50 text-gold-600 flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 italic">Préparation au départ</h3>
                        <p class="text-slate-500 italic font-medium text-sm">Accompagnement pratique pour faciliter votre
                            installation dans le pays de destination.</p>
                    </div>
                    <div class="mt-12">
                        <a href="{{ route('services.departure') }}"
                            class="inline-flex items-center gap-2 font-bold text-gold-600 hover:text-slate-900 transition-colors">
                            En savoir plus
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- Card 5: Logement --}}
                <div
                    class="group p-12 rounded-[3rem] bg-white border border-slate-100 hover:shadow-2xl transition-all hover:-translate-y-2 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div class="w-16 h-16 rounded-[1.5rem] bg-slate-900 text-white flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-black text-slate-900 italic">Logement & Intégration</h3>
                        <p class="text-slate-500 italic font-medium text-sm">Solutions de logement adaptées et aide à
                            l’installation pour une transition sereine.</p>
                    </div>
                    <div class="mt-12">
                        <a href="{{ route('housing') }}"
                            class="inline-flex items-center gap-2 font-bold text-gold-600 hover:text-slate-900 transition-colors">
                            En savoir plus
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- CTA --}}
    <x-home.partners />
@endsection