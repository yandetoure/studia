<section id="testimonials" class="py-32 bg-slate-900 overflow-hidden relative">
    {{-- Decorative Background --}}
    <div class="absolute top-0 left-0 w-full h-96 bg-gradient-to-b from-gold-600/10 to-transparent"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        {{-- Section Header --}}
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-12 mb-24">
            <div class="space-y-6">
                <div
                    class="inline-flex items-center gap-4 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-md">
                    <svg class="w-4 h-4 text-gold-500" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-white italic">Success
                        Stories</span>
                </div>
                <h2 class="text-5xl lg:text-7xl font-black text-white leading-[0.8] tracking-tighter italic">
                    Chaque Parcours est <br> <span class="text-gold-500 font-serif font-light lowercase">Unique.</span>
                </h2>
            </div>
            <p
                class="text-slate-400 font-medium max-w-sm italic text-lg leading-relaxed border-l-2 border-gold-600 pl-8">
                Découvrez comment nous avons transformé les ambitions de nos étudiants en carrières internationales
                d'exception.
            </p>
        </div>

        {{-- Testimonials Layout: Bento Grid / Asymmetrical --}}
        <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8">
            @php
                $testimonials = [
                    [
                        'name' => 'Oumou DIALLO',
                        'program' => 'Sciences Politiques – HEIP',
                        'text' => 'Grâce à STUDIA, j’ai bénéficié d’une orientation stratégique. L’équipe m’a accompagnée à chaque étape. Aujourd’hui, à HEIP, je suis convaincue que sans cet accompagnement, je n’aurais pas fait les bons choix.',
                        'img' => 'https://i.pravatar.cc/150?u=oumou',
                        'rating' => 5,
                        'className' => 'bg-white/5'
                    ],
                    [
                        'name' => 'Aminata SORE',
                        'program' => 'Licence AES – Poitiers',
                        'text' => 'STUDIA m’a aidée à structurer mon projet universitaire. Accompagnement sérieux et équipe toujours disponible.',
                        'img' => 'https://i.pravatar.cc/150?u=aminata',
                        'rating' => 5,
                        'className' => 'bg-gold-600/10 border-gold-600/20'
                    ],
                    [
                        'name' => 'Yannis ADINGRA',
                        'program' => 'Bachelor Business – Excelia',
                        'text' => 'Leur professionnalisme et leur maîtrise des procédures m’ont beaucoup rassuré. Je recommande STUDIA à tous.',
                        'img' => 'https://i.pravatar.cc/150?u=yannis',
                        'rating' => 5,
                        'className' => 'bg-white/5'
                    ],
                    [
                        'name' => 'Drissa SOW',
                        'program' => 'Dev. Commercial – Ascencia',
                        'text' => 'Une approche très structurée sur mon dossier. Leurs conseils m’ont permis d’aborder les démarches avec sérénité.',
                        'img' => 'https://i.pravatar.cc/150?u=drissa',
                        'rating' => 5,
                        'className' => 'bg-white/5'
                    ],
                    [
                        'name' => 'Noufra Médine',
                        'program' => 'Grande École – ISTEC',
                        'text' => 'Accompagnement de très haut niveau. Ils m’ont aidée à me présenter de manière convaincante.',
                        'img' => 'https://i.pravatar.cc/150?u=noufra',
                        'rating' => 5,
                        'className' => 'bg-gold-600/10 border-gold-600/20'
                    ],
                    [
                        'name' => 'Ulrich DOFFOU',
                        'program' => 'Lettres – Jean Monnet',
                        'text' => 'Ils ont su comprendre mon profil spécifique et m’orienter vers une formation cohérente.',
                        'img' => 'https://i.pravatar.cc/150?u=ulrich',
                        'rating' => 5,
                        'className' => 'bg-white/5'
                    ]
                ];
            @endphp

            @foreach($testimonials as $item)
                <div
                    class="break-inside-avoid relative p-10 rounded-[2.5rem] border border-white/5 backdrop-blur-3xl hover:border-gold-500/30 transition-all duration-500 group {{ $item['className'] }}">
                    {{-- Large Elegant Quote Icon --}}
                    <span
                        class="absolute top-6 right-8 text-8xl font-serif text-gold-500/10 group-hover:text-gold-500/20 transition-colors pointer-events-none">“</span>

                    <div class="space-y-8 relative z-10">
                        {{-- Stars --}}
                        <div class="flex gap-1">
                            @for($i = 0; $i < $item['rating']; $i++)
                                <svg class="w-3 h-3 text-gold-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>

                        <p class="text-slate-300 text-lg leading-relaxed italic font-medium leading-snug">
                            {{ $item['text'] }}
                        </p>

                        <div class="flex items-center gap-5 pt-4">
                            <div class="relative">
                                <img src="{{ $item['img'] }}" alt="{{ $item['name'] }}"
                                    class="w-14 h-14 rounded-2xl object-cover ring-2 ring-gold-600/20 shadow-xl group-hover:scale-110 transition-transform duration-500">
                                <div
                                    class="absolute -bottom-1 -right-1 w-5 h-5 bg-gold-600 rounded-full border-2 border-slate-900 flex items-center justify-center">
                                    <svg class="w-2.5 h-2.5 text-slate-900" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-black text-white italic tracking-tight">{{ $item['name'] }}</h4>
                                <p class="text-[10px] uppercase font-black tracking-widest text-gold-500 italic">
                                    {{ $item['program'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Verification Batch --}}
        <div class="mt-20 flex justify-center opacity-30">
            <div class="flex items-center gap-8 border-y border-white/10 py-8 px-12">
                <span class="text-[10px] font-black text-white uppercase tracking-[1em]">Authenticité . Excellence .
                    Succès</span>
            </div>
        </div>
    </div>
</section>