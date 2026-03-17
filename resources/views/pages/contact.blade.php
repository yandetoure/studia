@extends('layouts.app')

@section('title', 'Contactez STUDIA - Côte d’Ivoire')

@section('content')
    <section class="pt-40 pb-24 bg-slate-900 text-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-500 uppercase italic">Nous Sommes à votre Écoute
                </h1>
                <h2 class="text-5xl lg:text-7xl font-black leading-tight italic">Contactez <span
                        class="text-gold-500">STUDIA</span>.</h2>
                <p class="text-xl text-slate-400 leading-relaxed font-medium">
                    Une question ? Un projet ? Notre équipe d’experts est prête à vous accompagner dans votre réussite
                    internationale.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white" id="appointment">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                {{-- Contact Info --}}
                <div class="space-y-16">
                    <div class="space-y-8">
                        <h3 class="text-3xl font-black italic tracking-tighter">Nos coordonnées.</h3>
                        <div class="space-y-8">
                            <div class="flex gap-6 items-start group">
                                <div
                                    class="w-14 h-14 shrink-0 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center font-black group-hover:bg-gold-600 group-hover:text-slate-950 transition-all">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 mb-1 italic">Localisation</h4>
                                    <p class="text-slate-500 font-medium capitalize prose prose-sm">Côte
                                        d’Ivoire<br>STUDIA reçoit sur rendez-vous.</p>
                                </div>
                            </div>

                            <div class="flex gap-6 items-start group">
                                <div
                                    class="w-14 h-14 shrink-0 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-black group-hover:bg-gold-600 group-hover:text-slate-950 transition-all">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 mb-1 italic">Téléphone & WhatsApp</h4>
                                    <p class="text-slate-500 font-black italic text-xl tracking-tight">+225 07 67 93 93 93
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-6 items-start group">
                                <div
                                    class="w-14 h-14 shrink-0 rounded-2xl bg-gold-50 text-gold-600 flex items-center justify-center font-black group-hover:bg-gold-600 group-hover:text-slate-950 transition-all">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 mb-1 italic">Email</h4>
                                    <p class="text-slate-500 font-medium">contact@studia-edu.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-10 rounded-[3rem] bg-slate-50 border border-slate-100 flex items-center gap-8">
                        <div
                            class="w-20 h-20 rounded-full bg-gold-600 flex items-center justify-center text-slate-950 italic font-black text-2xl rotate-12 shadow-lg shadow-gold-500/20">
                            !</div>
                        <p class="text-sm text-slate-500 font-bold italic leading-relaxed uppercase tracking-widest">Conseil
                            : Le plus tôt possible. <br> Idéalement 6 à 12 mois avant le départ.</p>
                    </div>
                </div>

                {{-- Contact Form --}}
                <div class="bg-slate-900 p-12 lg:p-16 rounded-[4rem] text-white space-y-10 shadow-2xl shadow-gold-500/10">
                    <h3 class="text-4xl font-black italic tracking-tighter">Votre projet d'études.</h3>
                    <form action="#" class="space-y-6">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-400 italic">Nom
                                    complet</label>
                                <input type="text" placeholder="Ex: Jean Kouadio"
                                    class="w-full bg-slate-800 border-none rounded-2xl p-4 text-white focus:ring-2 focus:ring-gold-500 transition-all font-medium">
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-bold uppercase tracking-widest text-slate-400 italic">Téléphone</label>
                                <input type="text" placeholder="+225 ..."
                                    class="w-full bg-slate-800 border-none rounded-2xl p-4 text-white focus:ring-2 focus:ring-gold-500 transition-all font-medium">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-400 italic">Email</label>
                            <input type="email" placeholder="votre@email.com"
                                class="w-full bg-slate-800 border-none rounded-2xl p-4 text-white focus:ring-2 focus:ring-gold-500 transition-all font-medium">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label class="text-xs font-bold uppercase tracking-widest text-slate-400 italic">Votre
                                    Projet</label>
                                <select
                                    class="w-full bg-slate-800 border-none rounded-2xl p-4 text-white focus:ring-2 focus:ring-gold-500 transition-all font-medium">
                                    <option>Orientation</option>
                                    <option>Études à l'étranger</option>
                                    <option>Assistance Visa</option>
                                    <option>Soutien scolaire</option>
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label
                                    class="text-xs font-bold uppercase tracking-widest text-slate-400 italic">Destination</label>
                                <input type="text" placeholder="Ex: France, Belgique..."
                                    class="w-full bg-slate-800 border-none rounded-2xl p-4 text-white focus:ring-2 focus:ring-gold-500 transition-all font-medium">
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-slate-400 italic">Message /
                                Détails</label>
                            <textarea rows="4" placeholder="Parlez-nous de votre parcours..."
                                class="w-full bg-slate-800 border-none rounded-2xl p-4 text-white focus:ring-2 focus:ring-gold-500 transition-all font-medium"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full py-5 rounded-3xl bg-gold-600 hover:bg-white hover:text-slate-950 transition-all font-black text-xl shadow-xl shadow-gold-500/20 active:scale-95 transform text-slate-950">
                            Envoyer ma demande
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection