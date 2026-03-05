@extends('layouts.app')

@section('title', 'Consulting & Accompagnement Professionnel - STUDIA')

@section('content')
    <section class="pt-40 pb-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-4xl space-y-8">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-500 uppercase italic">Expertise Carrière</h1>
                <h2 class="text-5xl lg:text-7xl font-black leading-tight italic">Consulting <span class="text-gold-500">&
                        Accompagnement</span> Pro.</h2>
                <p class="text-xl text-slate-400 leading-relaxed font-medium max-w-2xl">
                    STUDIA accompagne également les professionnels en reconversion et les cadres souhaitant se former à
                    l’international.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="p-10 rounded-[3rem] bg-slate-50 border border-slate-100 space-y-6 group hover:bg-white hover:shadow-2xl transition-all">
                    <div
                        class="w-14 h-14 rounded-2xl bg-gold-600 text-slate-950 flex items-center justify-center font-black">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-black italic tracking-tighter">Conseil stratégique</h4>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed italic">Analyse de vos objectifs de
                        carrière et définition d'un plan de formation internationale cohérent.</p>
                </div>

                <div
                    class="p-10 rounded-[3rem] bg-slate-50 border border-slate-100 space-y-6 group hover:bg-white hover:shadow-2xl transition-all">
                    <div class="w-14 h-14 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-black">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-black italic tracking-tighter">Orientation Pro</h4>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed italic">Découverte de nouveaux secteurs et
                        opportunités de formation pour cadres et experts.</p>
                </div>

                <div
                    class="p-10 rounded-[3rem] bg-slate-50 border border-slate-100 space-y-6 group hover:bg-white hover:shadow-2xl transition-all">
                    <div
                        class="w-14 h-14 rounded-2xl bg-gold-600 text-slate-950 flex items-center justify-center font-black">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-xl font-black italic tracking-tighter">Projets de formation</h4>
                    <p class="text-sm text-slate-500 font-medium leading-relaxed italic">Accompagnement dans les dossiers
                        complèxes de Executive Education et MBA à l'international.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div
                class="bg-white p-16 rounded-[4rem] border border-slate-100 flex flex-col lg:flex-row gap-16 items-center shadow-2xl shadow-gold-500/5">
                <div class="lg:w-1/2 space-y-8">
                    <h3 class="text-4xl font-black italic tracking-tighter">Vous êtes un professionnel ?</h3>
                    <p class="text-slate-600 font-medium capitalize">Ne laissez pas votre carrière stagner. Prenez de la
                        hauteur avec une formation internationale reconnue. STUDIA vous aide à franchir cette nouvelle étape
                        en toute sérénité.</p>
                    <a href="{{ route('contact') }}"
                        class="inline-block px-10 py-5 rounded-3xl bg-gold-600 text-slate-950 font-black hover:bg-slate-900 hover:text-white transition-all shadow-xl shadow-gold-500/20">Demander
                        une étude de profil</a>
                </div>
                <div class="lg:w-1/2 relative">
                    <div class="absolute inset-0 bg-gold-100/50 rounded-[3rem] blur-3xl opacity-50"></div>
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop"
                        class="relative rounded-[3rem] shadow-2xl grayscale" alt="Consulting professionnel">
                </div>
            </div>
        </div>
    </section>
@endsection