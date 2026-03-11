@extends('layouts.app')

@section('title', 'À propos de STUDIA - Cabinet Premium d’Orientation')

@section('content')
    {{-- Hero --}}
    <section class="pt-40 pb-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">À propos de STUDIA</h1>
                <h2 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight">Ouvrir le monde, <span
                        class="text-gold-600">guider</span> l’avenir.</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium">
                    STUDIA est un cabinet premium d’orientation scolaire, de soutien académique et d’accompagnement à la
                    mobilité académique internationale.
                </p>
            </div>
        </div>
    </section>

    {{-- Fondateur --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="space-y-8">
                    <div class="space-y-4">
                        <h3 class="text-sm font-bold tracking-[0.2em] text-slate-400 uppercase italic">Le Fondateur</h3>
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-900 italic tracking-tighter">Mamadou Diaw</h2>
                        <p class="text-gold-600 font-black italic tracking-wide uppercase text-xs">Professionnel de
                            l’orientation et de la mobilité académique internationale</p>
                    </div>
                    <div class="text-slate-600 space-y-6 leading-relaxed font-medium italic">
                        <p>STUDIA a été fondé par Mamadou Diaw, engagé depuis près de dix années dans l’accompagnement
                            d’élèves, d’étudiants et de professionnels africains vers des parcours de formation à
                            l’étranger.</p>
                        <p>Au fil des années, Mamadou Diaw a accompagné des centaines de profils dans leurs projets d’études
                            internationales : orientation scolaire et universitaire, choix stratégique des filières et des
                            pays, constitution de dossiers d’admission, accompagnement aux procédures de visa, et
                            préparation à l’installation à l’étranger.</p>
                        <p>Son expérience couvre plusieurs destinations majeures telles que la <span
                                class="text-slate-900 font-bold">France, le Canada, la Turquie, l’Inde, les États-Unis, le
                                Maroc, la Tunisie, la Belgique, l’Espagne, le Royaume-Uni</span> et d’autres pays
                            stratégiques pour la mobilité académique africaine.</p>
                    </div>
                </div>
                <div class="relative group">
                    <div
                        class="absolute -inset-4 border-2 border-slate-100 rounded-[3rem] -rotate-3 group-hover:rotate-0 transition-transform">
                    </div>
                    <div class="relative bg-slate-900 aspect-[4/5] rounded-[3rem] overflow-hidden shadow-2xl">
                        <img src="{{ asset('images/pdg3.jpg') }}" alt="Mamadou Diaw" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Expertise fondée sur le terrain --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="order-2 lg:order-1">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="p-8 bg-white rounded-[2.5rem] shadow-xl shadow-black/5 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4
                                class="font-black text-slate-900 italic tracking-tight underline decoration-gold-500/10 underline-offset-4">
                                Étudiants & Familles</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium italic">Contact direct et
                                accompagnement empathique.</p>
                        </div>
                        <div class="p-8 bg-white rounded-[2.5rem] shadow-xl shadow-black/5 mt-8 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2-2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <h4
                                class="font-black text-slate-900 italic tracking-tight underline decoration-gold-500/10 underline-offset-4">
                                Établissements</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium italic">Réseau d'écoles et
                                universités mondiales.</p>
                        </div>
                        <div class="p-8 bg-white rounded-[2.5rem] shadow-xl shadow-black/5 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <h4
                                class="font-black text-slate-900 italic tracking-tight underline decoration-gold-500/10 underline-offset-4">
                                Dossiers Complexes</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium italic">Rigueur et stratégie face
                                aux blocages consulaires.</p>
                        </div>
                        <div class="p-8 bg-white rounded-[2.5rem] shadow-xl shadow-black/5 mt-8 space-y-4">
                            <div class="w-12 h-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h4
                                class="font-black text-slate-900 italic tracking-tight underline decoration-gold-500/10 underline-offset-4">
                                Réalités Terrain</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-medium italic">Maîtrise des attentes des
                                universités étrangères.</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-12 order-1 lg:order-2">
                    <div class="space-y-6">
                        <h2 class="text-sm font-bold tracking-[0.3em] text-gold-600 uppercase italic">L'Expérience
                            Authentique</h2>
                        <h3 class="text-4xl lg:text-5xl font-black text-slate-900 leading-tight italic tracking-tighter">Une
                            expertise fondée sur la <span class="text-gold-600">Pratique Réelle.</span></h3>
                        <p class="text-lg text-slate-500 italic font-medium leading-relaxed">
                            Ce qui distingue Mamadou Diaw, c’est une expertise fondée sur la pratique réelle, et non sur une
                            approche théorique.
                        </p>
                    </div>
                    <div
                        class="space-y-8 bg-white p-12 rounded-[3.5rem] border border-slate-100 shadow-2xl shadow-gold-500/5">
                        <h4 class="text-2xl font-black italic tracking-tighter">Pourquoi STUDIA est né</h4>
                        <p class="text-slate-500 font-medium italic leading-relaxed text-sm">
                            STUDIA est né d’un constat clair : trop d’étudiants africains se lancent dans des projets
                            d’études à l’étranger sans accompagnement structuré, fiable et humain. Mamadou Diaw a créé
                            STUDIA pour changer cette réalité.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Philosophie --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-4">
                <h2 class="text-sm font-bold tracking-[0.3em] text-gold-600 uppercase italic">Nos Fondements</h2>
                <h3 class="text-4xl font-black text-slate-900 italic tracking-tighter">La Philosophie <span
                        class="text-gold-600">STUDIA.</span></h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div
                    class="p-12 rounded-[3rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:shadow-gold-500/10 transition-all group">
                    <div
                        class="text-7xl font-black text-gold-100 mb-8 font-serif group-hover:text-gold-600/20 transition-colors">
                        01.</div>
                    <h4 class="text-2xl font-black mb-4 italic tracking-tighter">Clarté</h4>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium italic">Chaque étudiant doit comprendre son
                        parcours, ses options et ses chances réelles.</p>
                </div>
                <div class="p-12 rounded-[3rem] bg-slate-900 text-white shadow-2xl shadow-gold-900/10 group">
                    <div
                        class="text-7xl font-black text-white/5 mb-8 font-serif group-hover:text-gold-600 transition-colors">
                        02.</div>
                    <h4 class="text-2xl font-black mb-4 italic tracking-tighter text-gold-500">Accompagnement humain</h4>
                    <p class="text-sm text-slate-300 leading-relaxed font-medium italic">Chaque dossier est suivi avec
                        sérieux, écoute et responsabilité.</p>
                </div>
                <div
                    class="p-12 rounded-[3rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl hover:shadow-gold-500/10 transition-all group">
                    <div
                        class="text-7xl font-black text-gold-100 mb-8 font-serif group-hover:text-gold-600/20 transition-colors">
                        03.</div>
                    <h4 class="text-2xl font-black mb-4 italic tracking-tighter">Vision internationale</h4>
                    <p class="text-sm text-slate-500 leading-relaxed font-medium italic">Chaque projet est pensé à l’échelle
                        mondiale, avec une stratégie adaptée au profil.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <x-home.testimonials />

    {{-- Call to Action / Engagement --}}
    <section class="py-24 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl font-black leading-tight italic">Une entreprise bâtie sur l’expérience.</h2>
                    <p class="text-slate-400 font-medium">STUDIA n’est pas une startup opportuniste. C’est une entreprise
                        bâtie sur l’expérience, la crédibilité et la maîtrise du terrain.</p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span class="text-sm font-bold uppercase tracking-wider">Accompagnement professionnel &
                                transparent</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span class="text-sm font-bold uppercase tracking-wider">Respect de la réglementation</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                            <span class="text-sm font-bold uppercase tracking-wider">Intérêt réel de l’étudiant</span>
                        </div>
                    </div>
                </div>
                <div class="bg-gold-600 p-12 rounded-[3.5rem] space-y-8 shadow-2xl shadow-gold-500/20 text-center">
                    <h3 class="text-3xl font-black text-slate-950">Prêt à construire <br> votre avenir ?</h3>
                    <p class="text-slate-950/70 italic">Mamadou Diaw et son équipe vous attendent pour transformer votre
                        projet
                        en succès.</p>
                    <a href="{{ route('contact') }}"
                        class="inline-block px-10 py-5 rounded-3xl bg-slate-900 text-white font-black hover:bg-white hover:text-gold-600 transition-all transform hover:scale-105 active:scale-95 shadow-xl">
                        Nous contacter
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection