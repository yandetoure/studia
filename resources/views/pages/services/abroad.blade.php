@extends('layouts.app')

@section('title', 'Étudier à l’étranger - Destinations & Admissions - STUDIA')

@section('content')
    <section class="pt-40 pb-24 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="max-w-4xl space-y-8">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">Mobilité Académique</h1>
                <h2 class="text-5xl lg:text-8xl font-black text-slate-900 leading-tight italic">Admission <br> <span
                        class="text-gold-600">Internationale</span>.</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium max-w-2xl">
                    STUDIA accompagne les étudiants africains dans leurs projets d’études à l’international. De la recherche
                    d'établissements à la soumission des candidatures.
                </p>
            </div>
        </div>
    </section>

    {{-- Destinations Grid --}}
    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @php
                    $destinations = [
                        ['name' => 'France', 'desc' => 'Prestige & Culture', 'flag' => '🇫🇷'],
                        ['name' => 'Belgique', 'desc' => 'Cœur de l’Europe', 'flag' => '🇧🇪'],
                        ['name' => 'Espagne', 'desc' => 'Soleil & Excellence', 'flag' => '🇪🇸'],
                        ['name' => 'Malte', 'desc' => 'Immersion Anglophone', 'flag' => '🇲🇹'],
                        ['name' => 'Angleterre', 'desc' => 'Héritage & Prestige', 'flag' => '🇬🇧'],
                        ['name' => 'Suisse', 'label' => 'Qualité & Précision', 'flag' => '🇨🇭'],
                        ['name' => 'Allemagne', 'desc' => 'Ingénierie & Rigueur', 'flag' => '🇩🇪'],
                        ['name' => 'Turquie', 'desc' => 'Passerelle & Modernité', 'flag' => '🇹🇷'],
                        ['name' => 'Dubaï', 'desc' => 'Luxe & Opportunités', 'flag' => '🇦🇪'],
                        ['name' => 'Inde', 'desc' => 'Innovation & Savoir', 'flag' => '🇮🇳'],
                        ['name' => 'Maroc', 'desc' => 'Hub Continental', 'flag' => '🇲🇦'],
                        ['name' => 'Tunisie', 'desc' => 'Sciences & Ingénierie', 'flag' => '🇹🇳'],
                        ['name' => 'Égypte', 'desc' => 'Histoire & Avenir', 'flag' => '🇪🇬'],
                        ['name' => 'Sénégal', 'desc' => 'Leadership Africain', 'flag' => '🇸🇳'],
                    ];
                @endphp
                @foreach($destinations as $dest)
                    <div
                        class="p-8 rounded-[2.5rem] bg-white border border-slate-100 hover:border-gold-200 hover:shadow-2xl hover:shadow-gold-500/5 transition-all group">
                        <div
                            class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-100 mb-6 flex items-center justify-center group-hover:bg-gold-600 transition-all transform group-hover:rotate-12 text-2xl">
                            {{ $dest['flag'] }}
                        </div>
                        <h4 class="text-xl font-black text-slate-900 italic tracking-tighter mb-2">{{ $dest['name'] }}</h4>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-widest italic">{{ $dest['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Accompagnement --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-20">
                <div class="lg:w-1/2 space-y-12">
                    <h3 class="text-4xl font-black italic tracking-tighter">Notre accompagnement <span
                            class="text-gold-600">stratégique</span>.</h3>
                    <div class="space-y-8">
                        @php
                            $steps = [
                                'Recherche d’établissements' => 'Identification des meilleures universités et écoles selon votre profil.',
                                'Préparation du dossier' => 'Audit et optimisation de vos documents académiques.',
                                'CV académique' => 'Conception d\'un CV percutant respectant les standards internationaux.',
                                'Lettre de motivation' => 'Rédaction personnalisée pour valoriser votre projet d\'études.',
                                'Soumission des candidatures' => 'Gestion complète des dépôts sur les plateformes dédiées.'
                            ];
                        @endphp
                        @foreach($steps as $title => $desc)
                            <div class="relative pl-10 group">
                                <div
                                    class="absolute left-0 top-1.5 w-6 h-6 rounded-full border-2 border-gold-600 bg-white group-hover:bg-gold-600 transition-colors">
                                </div>
                                <h4 class="font-bold text-lg mb-1 italic tracking-tight">{{ $title }}</h4>
                                <p class="text-sm text-slate-500 font-medium leading-relaxed">{{ $desc }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <div class="p-12 rounded-[3.5rem] bg-slate-900 text-white space-y-8 relative overflow-hidden group">
                        <div
                            class="absolute bottom-0 right-0 w-64 h-64 bg-gold-600 opacity-20 blur-[100px] group-hover:scale-150 transition-transform duration-1000">
                        </div>
                        <h4 class="text-2xl font-black italic">Une vision multi-pays.</h4>
                        <p class="text-slate-400 italic">STUDIA travaille avec un réseau de partenaires éducatifs
                            internationaux fiables et reconnus. Nous ne nous limitons pas à une destination, nous cherchons
                            le meilleur pour VOUS.</p>
                        <ul class="space-y-4 text-sm font-bold capitalize">
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-gold-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg> Accords privilèges avec certaines écoles</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-gold-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg> Maîtrise des calendriers d'admissions</li>
                            <li class="flex items-center gap-3"><svg class="w-5 h-5 text-gold-500" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg> Conseils sur les bourses et financements</li>
                        </ul>
                        <div class="pt-4">
                            <a href="{{ route('contact') }}"
                                class="inline-block px-10 py-5 rounded-3xl bg-white text-slate-900 font-black hover:bg-gold-600 hover:text-slate-950 transition-all transform hover:translate-x-2">Démarrer
                                mon projet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection