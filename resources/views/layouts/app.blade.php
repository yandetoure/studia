<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="STUDIA - Cabinet d’orientation scolaire, de soutien académique et de mobilité internationale. Ouvrir le Monde, Guider l’Avenir.">
    <title>@yield('title', 'STUDIA - Ouvrir le Monde, Guider l’Avenir')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-slate-50 text-slate-900 selection:bg-gold-100 selection:text-slate-900 overflow-x-hidden">
    {{-- Navigation --}}
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')

    {{-- Mobile Menu --}}
    <div id="mobile-menu"
        class="fixed inset-0 z-50 bg-white/95 backdrop-blur-md translate-x-full transition-transform duration-300 lg:hidden">
        <div class="p-6">
            <div class="flex justify-end">
                <button id="close-menu" class="p-2 text-slate-900">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <nav class="mt-8 flex flex-col gap-6 text-xl font-medium">
                <a href="{{ route('home') }}" class="hover:text-gold-600">Accueil</a>
                <a href="{{ route('about') }}" class="hover:text-gold-600">À propos</a>
                <a href="{{ route('services') }}" class="hover:text-gold-600">Nos services</a>
                <a href="{{ route('destinations') }}" class="hover:text-gold-600">Destinations d’études</a>
                <a href="{{ route('housing') }}" class="hover:text-gold-600">Logement & intégration</a>
                <a href="{{ route('home') }}#testimonials" class="hover:text-gold-600">Témoignages</a>
                <a href="#" class="hover:text-gold-600">Blog / Conseils</a>
                <a href="{{ route('contact') }}" class="hover:text-gold-600">Contact / Prendre rendez-vous</a>
                <div class="mt-4 pt-6 border-t border-slate-100">
                    <a href="{{ route('contact') }}#appointment"
                        class="w-full py-4 text-center rounded-2xl bg-gold-600 text-slate-950 font-bold shadow-xl shadow-gold-200">Prendre
                        RDV</a>
                </div>
            </nav>
        </div>
    </div>

    <script>
        // Simple menu toggle logic
        const mobileMenu = document.getElementById('mobile-menu');
        const openMenu = document.getElementById('open-menu');
        const closeMenu = document.getElementById('close-menu');

        if (openMenu && closeMenu && mobileMenu) {
            openMenu.addEventListener('click', () => {
                mobileMenu.classList.remove('translate-x-full');
            });
            closeMenu.addEventListener('click', () => {
                mobileMenu.classList.add('translate-x-full');
            });
        }
    </script>
    
    @stack('scripts')
</body>

</html>