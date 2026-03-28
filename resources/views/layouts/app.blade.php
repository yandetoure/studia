<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="STUDIA - Cabinet d’orientation scolaire, de soutien académique et de mobilité internationale. {{ __('home.page_title') }}.">
    <title>@yield('title', 'STUDIA - ' . __('home.page_title'))</title>

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
                <a href="{{ route('home') }}" class="hover:text-gold-600">{{ __('nav.home') }}</a>
                <a href="{{ route('about') }}" class="hover:text-gold-600">{{ __('nav.about') }}</a>
                <a href="{{ route('services') }}" class="hover:text-gold-600">{{ __('footer.services') }}</a>
                <a href="{{ route('home') }}#destinations" class="hover:text-gold-600">{{ __('footer.study_destinations') }}</a>
                <a href="{{ route('housing') }}" class="hover:text-gold-600">{{ __('footer.housing_integration') }}</a>
                <a href="{{ route('home') }}#testimonials" class="hover:text-gold-600">{{ __('footer.testimonials') }}</a>
                <a href="#" class="hover:text-gold-600">{{ __('footer.blog_advice') }}</a>
                <a href="{{ route('contact') }}" class="hover:text-gold-600">{{ __('footer.contact_appointment') }}</a>
                <div class="mt-4 pt-6 border-t border-slate-100 flex flex-col gap-4">
                    <div class="flex items-center gap-3 mb-4">
                        <a href="{{ route('locale.set', 'fr') }}" class="flex-1 py-3 text-center rounded-xl border {{ app()->getLocale() == 'fr' ? 'border-gold-600 text-gold-600 bg-gold-50' : 'border-slate-200 text-slate-600' }} font-bold text-sm">FR</a>
                        <a href="{{ route('locale.set', 'en') }}" class="flex-1 py-3 text-center rounded-xl border {{ app()->getLocale() == 'en' ? 'border-gold-600 text-gold-600 bg-gold-50' : 'border-slate-200 text-slate-600' }} font-bold text-sm">EN</a>
                        <a href="{{ route('locale.set', 'es') }}" class="flex-1 py-3 text-center rounded-xl border {{ app()->getLocale() == 'es' ? 'border-gold-600 text-gold-600 bg-gold-50' : 'border-slate-200 text-slate-600' }} font-bold text-sm">ES</a>
                    </div>
                    <a href="{{ route('contact') }}#appointment"
                        class="w-full py-4 text-center rounded-2xl bg-gold-600 text-slate-950 font-bold shadow-xl shadow-gold-200">{{ __('nav.book_appointment') }}</a>
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

    {{-- Floating WhatsApp Button --}}
    <a href="https://wa.me/2250767939393" target="_blank" 
       class="fixed bottom-6 right-6 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-lg hover:bg-[#128C7E] hover:scale-110 hover:shadow-xl transition-all flex items-center justify-center group"
       aria-label="Contactez-nous sur WhatsApp">
        <svg class="w-8 h-8 font-bold" fill="currentColor" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
        </svg>
    </a>
    
    @stack('scripts')
</body>

</html>