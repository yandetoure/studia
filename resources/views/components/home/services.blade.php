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
                        'title' => 'Orientation & Soutien',
                        'desc' => 'Bilans de compétences et coaching académique pour bâtir des fondations solides.',
                        'route' => 'services.orientation',
                        'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        'color' => 'gold'
                    ],
                    [
                        'title' => 'Étudier à l’Étranger',
                        'desc' => 'Admissions dans les meilleures universités à travers plus de 13 destinations mondiales.',
                        'route' => 'services.abroad',
                        'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2 2 2 0 012 2v.105m.397-3.056l1.411 1.411a2 2 0 010 2.828l-7.071 7.071a2 2 0 01-2.828 0L9.414 18.414a2 2 0 00-2.828 0L5.172 19.828a2 2 0 01-2.828 0l-.105-.105',
                        'color' => 'slate'
                    ],
                    [
                        'title' => 'Visa & Mobilité',
                        'desc' => 'Assistance administrative rigoureuse pour l\'obtention de votre visa d\'études.',
                        'route' => 'services.visa',
                        'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                        'color' => 'gold'
                    ],
                    [
                        'title' => 'Billets d’Avion',
                        'desc' => 'Logistique de voyage simplifiée pour un départ en toute sérénité vers votre campus.',
                        'route' => 'services.flight',
                        'icon' => 'M12 19l9 2-9-18-9 18 9-2zm0 0v-8',
                        'color' => 'slate'
                    ],
                    [
                        'title' => 'Consulting Pro',
                        'desc' => 'Accompagnement stratégique pour les cadres et professionnels en reconversion.',
                        'route' => 'services.consulting',
                        'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                        'color' => 'gold'
                    ],
                    [
                        'title' => 'Accompagnement',
                        'desc' => 'Suivi personnalisé après le départ pour garantir une intégration réussie.',
                        'route' => 'services',
                        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                        'color' => 'slate'
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