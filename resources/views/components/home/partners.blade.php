<section id="partners" class="py-32 bg-slate-50 border-y border-slate-100 overflow-hidden relative">
    {{-- Background Decorative Element --}}
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-gold-500/5 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 mb-20 text-center lg:text-left">
        <div class="flex flex-col lg:flex-row justify-between items-end gap-12">
            <div class="space-y-6">
                <div
                    class="inline-flex items-center gap-4 px-4 py-2 rounded-full bg-gold-600/5 border border-gold-600/10">
                    <span class="w-2 h-2 rounded-full bg-gold-600 animate-pulse"></span>
                    <span class="text-[10px] font-black uppercase tracking-widest text-gold-700">Réseau d'Élite</span>
                </div>
                <h2 class="text-4xl lg:text-6xl font-black text-slate-900 leading-[0.9] tracking-tighter italic">
                    Ils nous ont fait <br> <span
                        class="text-gold-600 underline decoration-gold-600/20 underline-offset-8">Confiance.</span>
                </h2>
            </div>
            <p class="text-slate-500 font-medium max-w-sm italic opacity-80 leading-relaxed text-lg">
                Des établissements reconnus mondialement, pour des parcours académiques sécurisés et prestigieux.
            </p>
        </div>
    </div>

    {{-- Infinite Scrolling Ticker Layout --}}
    <div class="relative flex flex-col gap-8">
        {{-- Row 1: Moving Left --}}
        <div class="flex overflow-hidden group">
            <div class="flex animate-marquee-slow gap-8 py-4 px-4 whitespace-nowrap group-hover:pause">
                @php
                    $logos = [
                        'EU Business School (1).png',
                        'Media School.png',
                        'Safe House.png',
                        'abs.png',
                        'britts.png',
                        'cdp.png',
                        'eaa.jpeg',
                        'em lyon.png',
                        'excelia.png',
                        'galileo.png',
                        'i2l.png',
                        'ifh.png',
                        'igensia groupe.png',
                        'istec.png',
                        'lasalle.jpeg',
                        'neoma.png',
                        'omnes.png',
                        'skema.png',
                        'studely.png'
                    ];
                    $row1 = array_slice($logos, 0, 10);
                    $row2 = array_slice($logos, 10);
                @endphp
                @foreach(array_merge($row1, $row1) as $logo)
                    <div
                        class="flex items-center justify-center px-12 py-8 rounded-[2.5rem] bg-white border border-slate-100 shadow-sm transition-all hover:border-gold-500/30 hover:shadow-2xl hover:shadow-gold-500/10 group/logo min-w-[280px] h-32">
                        <img src="{{ asset('images/Logos écoles partenaires/' . $logo) }}" alt="Partner Logo"
                            class="h-16 w-auto object-contain transition-all duration-500">
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Row 2: Moving Right --}}
        <div class="flex overflow-hidden group">
            <div class="flex animate-marquee-reverse-slow gap-8 py-4 px-4 whitespace-nowrap group-hover:pause">
                @foreach(array_merge($row2, $row2) as $logo)
                    <div
                        class="flex items-center justify-center px-12 py-8 rounded-[2.5rem] bg-white border border-slate-100 shadow-sm transition-all hover:border-gold-500/30 hover:shadow-2xl hover:shadow-gold-500/10 group/logo min-w-[280px] h-32">
                        <img src="{{ asset('images/Logos écoles partenaires/' . $logo) }}" alt="Partner Logo"
                            class="h-16 w-auto object-contain transition-all duration-500">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        @keyframes marquee-slow {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes marquee-reverse-slow {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(0);
            }
        }

        .animate-marquee-slow {
            animation: marquee-slow 60s linear infinite;
        }

        .animate-marquee-reverse-slow {
            animation: marquee-reverse-slow 60s linear infinite;
        }

        .pause {
            animation-play-state: paused !important;
        }
    </style>
</section>