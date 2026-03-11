<nav class="fixed top-0 left-0 right-0 z-40 px-6 py-4 transition-all duration-300" id="navbar">
    <div
        class="max-w-7xl mx-auto flex items-center justify-between px-6 py-3 rounded-2xl bg-white/80 backdrop-blur-xl border border-white/20 shadow-lg shadow-black/5">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('images/logo.png') }}" alt="STUDIA Logo"
                class="w-10 h-10 object-contain group-hover:scale-110 transition-transform">
            <span
                class="text-2xl font-bold tracking-tight text-slate-900 group-hover:text-gold-600 transition-colors">STUDIA</span>
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden lg:flex items-center gap-8 text-sm font-semibold text-slate-600">
            <a href="{{ route('home') }}"
                class="hover:text-gold-600 transition-colors {{ request()->routeIs('home') ? 'text-gold-600' : '' }}">Accueil</a>
            <a href="{{ route('about') }}"
                class="hover:text-gold-600 transition-colors {{ request()->routeIs('about') ? 'text-gold-600' : '' }}">À
                propos</a>

            <div class="relative group">
                <button class="flex items-center gap-1 hover:text-gold-600 transition-colors py-2">
                    Services
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div
                    class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-64 bg-white rounded-2xl shadow-2xl border border-slate-100 p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all transform group-hover:translate-y-0 translate-y-2">
                    <a href="{{ route('services.orientation') }}"
                        class="block px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="font-bold text-slate-900">Orientation & Soutien</p>
                        <p class="text-xs text-slate-500">Réussir son parcours académique</p>
                    </a>
                    <a href="{{ route('services.abroad') }}"
                        class="block px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="font-bold text-slate-900">Étudier à l'étranger</p>
                        <p class="text-xs text-slate-500">Destinations & admissions</p>
                    </a>
                    <a href="{{ route('services.visa') }}"
                        class="block px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="font-bold text-slate-900">Visa & Mobilité</p>
                        <p class="text-xs text-slate-500">Accompagnement administratif</p>
                    </a>
                    <a href="{{ route('services.flight') }}"
                        class="block px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="font-bold text-slate-900">Billets d'avion</p>
                        <p class="text-xs text-slate-500">Voyagez en toute sérénité</p>
                    </a>
                    <a href="{{ route('housing') }}"
                        class="block px-4 py-3 rounded-xl hover:bg-slate-50 transition-colors">
                        <p class="font-bold text-slate-900">Logement & Intégration</p>
                        <p class="text-xs text-slate-500">Installation & Sérénité</p>
                    </a>
                </div>
            </div>

            <a href="{{ route('destinations') }}"
                class="hover:text-gold-600 transition-colors {{ request()->routeIs('destinations') ? 'text-gold-600' : '' }}">Destinations</a>
            <a href="{{ route('contact') }}"
                class="hover:text-gold-600 transition-colors {{ request()->routeIs('contact') ? 'text-gold-600' : '' }}">Contact</a>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('contact') }}#appointment"
                class="hidden sm:flex items-center gap-2 px-5 py-2.5 rounded-xl bg-gold-600 text-slate-950 text-sm font-black shadow-lg shadow-gold-500/20 hover:bg-gold-500 transition-all active:scale-95">
                Prendre rendez-vous
            </a>
            <button id="open-menu" class="lg:hidden p-2 text-slate-600 hover:text-gold-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</nav>