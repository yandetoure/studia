<section id="services" class="py-32 bg-white relative overflow-hidden">
    {{-- Decorative backgrounds --}}
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gold-50/30 rounded-full blur-[120px] -mr-64 -mt-64"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="flex flex-col lg:flex-row justify-between items-end gap-12 mb-24">
            <div class="max-w-2xl space-y-6">
                <h2 class="text-sm font-bold tracking-[0.3em] text-gold-600 uppercase italic">Expertises du Cabinet</h2>
                <h3 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight italic tracking-tighter">
                    Solutions pour une <br> <span class="text-gold-600">Mobilité Sans Faille.</span>
                </h3>
            </div>
            <div class="pb-4">
                <p class="text-slate-500 font-medium max-w-sm italic">
                    Un accompagnement 360° pour sécuriser chaque étape de votre parcours international.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $services = [
                    [
                        'title' => 'Orientation Académique',
                        'desc' => 'Analyse du profil, choix de destination et stratégie académique sur mesure.',
                        'route' => 'services.orientation',
                        'icon' => 'M12 14l9-5-9-5-9 5 9 5z M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z',
                        'color' => 'gold'
                    ],
                    [
                        'title' => 'Admission Internationale',
                        'desc' => 'Recherche d’établissements et préparation rigoureuse de vos dossiers de candidature.',
                        'route' => 'services.abroad',
                        'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        'color' => 'slate'
                    ],
                    [
                        'title' => 'Procédure Visa',
                        'desc' => 'Accompagnement complet aux démarches administratives et préparation aux entretiens.',
                        'route' => 'services.visa',
                        'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        'color' => 'gold'
                    ],
                    [
                        'title' => 'Préparation au Départ',
                        'desc' => 'Organisation logistique et préparation pratique pour faciliter votre installation.',
                        'route' => 'services.departure',
                        'icon' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8',
                        'color' => 'slate'
                    ],
                    [
                        'title' => 'Logement & Intégration',
                        'desc' => 'Recherche de solutions de logement fiables et aide à l’intégration locale.',
                        'route' => 'housing',
                        'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
                        'color' => 'gold'
                    ]
                ];
            @endphp


            @foreach($services as $service)
                <a href="{{ route($service['route']) }}"
                    class="group relative p-12 rounded-[3.5rem] bg-white border border-slate-100 shadow-xl shadow-black/5 hover:shadow-2xl hover:shadow-gold-500/10 transition-all duration-500 hover:-translate-y-4 overflow-hidden">
                    {{-- Hover background effect --}}
                    <div
                        class="absolute inset-x-0 bottom-0 h-2 bg-gold-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left">
                    </div>
                    <div
                        class="absolute -right-12 -top-12 w-48 h-48 bg-gold-50 rounded-full blur-3xl opacity-0 group-hover:opacity-100 transition-opacity">
                    </div>

                    <div class="relative z-10 space-y-8">
                        <div
                            class="w-16 h-16 rounded-2xl {{ $service['color'] === 'gold' ? 'bg-gold-600 text-slate-950' : 'bg-slate-900 text-white' }} flex items-center justify-center shadow-lg transform group-hover:rotate-12 transition-transform duration-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $service['icon'] }}"></path>
                            </svg>
                        </div>

                        <div class="space-y-4">
                            <h4 class="text-2xl font-black text-slate-900 italic tracking-tighter">{{ $service['title'] }}
                            </h4>
                            <p class="text-slate-500 leading-relaxed font-medium italic text-sm">
                                {{ $service['desc'] }}
                            </p>
                        </div>

                        <div
                            class="pt-4 flex items-center gap-3 text-sm font-bold uppercase tracking-widest text-slate-400 group-hover:text-gold-600 transition-colors">
                            <span>Savoir plus</span>
                            <svg class="w-4 h-4 transform group-hover:translate-x-2 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>