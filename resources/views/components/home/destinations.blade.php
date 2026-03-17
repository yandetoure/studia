<section id="destinations" class="py-32 bg-slate-950 overflow-hidden relative group">
    {{-- Decorative subtle glow --}}
    <div class="absolute inset-0 bg-gold-600/5 opacity-0 group-hover:opacity-100 transition-opacity duration-1000">
    </div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 mb-20">
        <div class="flex flex-col lg:flex-row justify-between items-end gap-12">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-4 px-4 py-2 rounded-full bg-white/5 border border-white/10">
                    <span class="w-1.5 h-1.5 rounded-full bg-gold-500"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-gold-500">Expansion
                        Globale</span>
                </div>
                <h2 class="text-5xl lg:text-[7rem] font-black text-white leading-[0.85] tracking-tighter italic">
                    Un Nouveau <br> <span class="text-gold-500 font-serif font-light lowercase">Campus.</span>
                </h2>
            </div>
            <p
                class="text-slate-400 font-medium max-w-sm italic pb-4 text-lg leading-relaxed border-l-2 border-gold-600/30 pl-8">
                Explorez des horizons sans limites au cœur des institutions les plus prestigieuses du globe.
            </p>
        </div>
    </div>

    <div class="relative flex overflow-hidden lg:py-10">
        {{-- Row 1: Left to Right --}}
        <div class="flex animate-marquee-premium gap-12 py-10 whitespace-nowrap">
            @php
                $destinations = [
                    ['name' => 'France', 'label' => 'Prestige & Culture', 'flag' => '🇫🇷'],
                    ['name' => 'Belgique', 'label' => 'Cœur de l’Europe', 'flag' => '🇧🇪'],
                    ['name' => 'Espagne', 'label' => 'Soleil & Excellence', 'flag' => '🇪🇸'],
                    ['name' => 'Malte', 'label' => 'Immersion Anglophone', 'flag' => '🇲🇹'],
                    ['name' => 'Angleterre', 'label' => 'Héritage & Prestige', 'flag' => '🇬🇧'],
                    ['name' => 'Suisse', 'label' => 'Qualité & Précision', 'flag' => '🇨🇭'],
                    ['name' => 'Allemagne', 'label' => 'Ingénierie & Rigueur', 'flag' => '🇩🇪'],
                    ['name' => 'Turquie', 'label' => 'Passerelle & Modernité', 'flag' => '🇹🇷'],
                    ['name' => 'Dubaï', 'label' => 'Luxe & Opportunités', 'flag' => '🇦🇪'],
                    ['name' => 'Inde', 'label' => 'Innovation & Savoir', 'flag' => '🇮🇳'],
                    ['name' => 'Maroc', 'label' => 'Hub Continental', 'flag' => '🇲🇦'],
                    ['name' => 'Tunisie', 'label' => 'Sciences & Ingénierie', 'flag' => '🇹🇳'],
                    ['name' => 'Égypte', 'label' => 'Histoire & Avenir', 'flag' => '🇪🇬'],
                    ['name' => 'Sénégal', 'label' => 'Leadership Africain', 'flag' => '🇸🇳'],
                ];
            @endphp
            @foreach(array_merge($destinations, $destinations) as $dest)
                <div
                    class="min-w-[380px] p-12 rounded-[3.5rem] bg-white/5 border border-white/10 backdrop-blur-2xl hover:bg-white/10 hover:border-gold-500/40 transition-all duration-700 group/card relative overflow-hidden">
                    {{-- Icon Overlay --}}
                    <div
                        class="absolute top-6 right-8 text-4xl opacity-20 group-hover/card:opacity-40 transition-opacity transform group-hover/card:scale-125 duration-700">
                        {{ $dest['flag'] }}
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-gold-600 text-slate-950 mb-10 flex items-center justify-center shadow-2xl transform group-hover/card:-translate-y-2 transition-transform duration-500 text-2xl">
                        {{ $dest['flag'] }}
                    </div>
                    <h4 class="text-4xl font-black text-white italic tracking-tighter mb-3">{{ $dest['name'] }}</h4>
                    <p class="text-[10px] font-black uppercase tracking-[0.4em] text-gold-500 italic">{{ $dest['label'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        @keyframes marquee-premium {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-marquee-premium {
            animation: marquee-premium 60s linear infinite;
        }

        .animate-marquee-premium:hover {
            animation-play-state: paused;
        }
    </style>
</section>