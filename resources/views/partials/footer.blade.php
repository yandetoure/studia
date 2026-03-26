<footer class="bg-slate-900 text-slate-400 py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
            {{-- Brand Column --}}
            <div class="space-y-6">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <img src="{{ asset('images/logo.png') }}" alt="STUDIA Logo"
                        class="w-10 h-10 object-contain group-hover:scale-110 transition-transform">
                    <span class="text-2xl font-bold tracking-tight text-white">STUDIA</span>
                </a>
                <p class="text-sm leading-relaxed">
                    {{ __('footer.description') }}
                </p>
                <div class="flex gap-4">
                    {{-- Social links... --}}
                    {{-- ... --}}
                </div>
            </div>

            {{-- Links Column --}}
            <div>
                <h4 class="text-white font-bold mb-6">{{ __('footer.navigation') }}</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">{{ __('nav.home') }}</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">{{ __('nav.about') }}</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white transition-colors">{{ __('footer.services') }}</a>
                    </li>
                    <li><a href="{{ route('home') }}#destinations" class="hover:text-white transition-colors">{{ __('footer.study_destinations') }}</a></li>
                    <li><a href="{{ route('housing') }}" class="hover:text-white transition-colors">{{ __('footer.housing_integration') }}</a></li>
                    <li><a href="{{ route('home') }}#testimonials"
                            class="hover:text-white transition-colors">{{ __('footer.testimonials') }}</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">{{ __('footer.blog_advice') }}</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">{{ __('footer.contact_appointment') }}</a></li>
                </ul>
            </div>

            {{-- Services Column --}}
            <div>
                <h4 class="text-white font-bold mb-6">{{ __('footer.expertise') }}</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="{{ route('services.orientation') }}"
                            class="hover:text-white transition-colors">{{ __('footer.school_orientation') }}</a></li>
                    <li><a href="{{ route('services.abroad') }}" class="hover:text-white transition-colors">{{ __('footer.study_abroad') }}</a></li>
                    <li><a href="{{ route('services.visa') }}" class="hover:text-white transition-colors">{{ __('footer.visa_assistance') }}</a></li>
                    <li><a href="{{ route('services.flight') }}" class="hover:text-white transition-colors">{{ __('footer.flight_tickets') }}</a></li>
                </ul>
            </div>

            {{-- Contact Column --}}
            <div>
                <h4 class="text-white font-bold mb-6">{{ __('footer.contact') }}</h4>
                <ul class="space-y-4 text-sm">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-gold-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <a href="https://maps.google.com/?q=C%C3%B4te+d%27Ivoire" target="_blank" class="hover:text-gold-500 transition-colors">{{ __('footer.ivory_coast') }}</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        <a href="tel:+2250767939393" class="hover:text-gold-500 transition-colors">+225 07 67 93 93 93</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <a href="mailto:contact@studia-edu.com" class="hover:text-gold-500 transition-colors">contact@studia-edu.com</a>
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
            <p>© {{ date('Y') }} STUDIA. {{ __('footer.all_rights_reserved') }}</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition-colors">{{ __('footer.legal_notice') }}</a>
                <a href="#" class="hover:text-white transition-colors">{{ __('footer.privacy_policy') }}</a>
            </div>
        </div>
    </div>
</footer>