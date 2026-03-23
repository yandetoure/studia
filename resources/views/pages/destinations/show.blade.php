@extends('layouts.app')

@section('title', $destination['name'] . ' - Étudier à l’International - STUDIA')

@section('content')
    {{-- Hero Section --}}
    <section class="relative pt-40 pb-24 bg-slate-950 overflow-hidden">
        {{-- Background Glow --}}
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gold-600/10 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-gold-600/5 rounded-full blur-[120px] translate-y-1/2 -translate-x-1/2"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="flex-1 space-y-8">
                    <div class="inline-flex items-center gap-4 px-4 py-2 rounded-full bg-white/5 border border-white/10 backdrop-blur-sm">
                        <span class="text-3xl">{{ $destination['flag'] }}</span>
                        <span class="text-xs font-black uppercase tracking-[0.3em] text-gold-500 italic">{{ $destination['label'] }}</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-7xl font-black text-white leading-[0.9] tracking-tighter italic">
                        {{ $destination['hero_title'] }}
                    </h1>
                    
                    <p class="text-xl text-slate-400 leading-relaxed font-medium max-w-2xl">
                        {{ $destination['intro'] }}
                    </p>

                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="{{ route('contact') }}" class="px-8 py-4 rounded-2xl bg-gold-600 text-slate-950 font-bold hover:bg-gold-500 transition-all shadow-xl shadow-gold-600/20">
                            Commencer mon projet
                        </a>
                        <a href="#details" class="px-8 py-4 rounded-2xl bg-white/5 text-white border border-white/10 font-bold hover:bg-white/10 transition-all">
                            Voir les détails
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block w-1/3">
                    <div class="relative group">
                        <div class="absolute inset-0 bg-gold-600/20 blur-[80px] rounded-full group-hover:bg-gold-600/30 transition-all duration-700"></div>
                        <div class="relative aspect-square rounded-[4rem] bg-slate-900 border border-white/10 flex items-center justify-center text-[10rem] p-12 overflow-hidden shadow-2xl">
                            <span class="transform group-hover:scale-110 transition-transform duration-700">{{ $destination['flag'] }}</span>
                            {{-- Decorative Lines --}}
                            <div class="absolute inset-0 opacity-10">
                                <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white to-transparent"></div>
                                <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-white to-transparent"></div>
                                <div class="absolute left-0 top-0 h-full w-px bg-gradient-to-b from-transparent via-white to-transparent"></div>
                                <div class="absolute right-0 top-0 h-full w-px bg-gradient-to-b from-transparent via-white to-transparent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Content Sections --}}
    <section id="details" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                {{-- Main Content --}}
                <div class="lg:col-span-8 space-y-20">
                    @foreach($destination['sections'] as $section)
                        <div class="space-y-8">
                            <h3 class="text-3xl lg:text-4xl font-black text-slate-900 italic tracking-tighter flex items-center gap-4">
                                <span class="w-12 h-1 rounded-full bg-gold-600"></span>
                                {{ $section['title'] }}
                            </h3>

                            @if(isset($section['subtitle']))
                                <p class="text-lg text-slate-600 font-medium italic">{{ $section['subtitle'] }}</p>
                            @endif

                            @if($section['type'] === 'list')
                                <ul class="space-y-4">
                                    @foreach($section['items'] as $item)
                                        <li class="flex items-start gap-4 p-6 rounded-3xl bg-slate-50 border border-slate-100 group hover:border-gold-300 hover:bg-white transition-all">
                                            <div class="mt-1.5 w-5 h-5 rounded-full bg-gold-600 flex-shrink-0 flex items-center justify-center">
                                                <svg class="w-3 h-3 text-slate-950" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                            <span class="text-slate-600 font-medium leading-relaxed">{!! $item !!}</span>
                                        </li>
                                    @endforeach
                                </ul>

                            @elseif($section['type'] === 'table')
                                <div class="overflow-x-auto rounded-[2rem] border border-slate-100 shadow-xl shadow-black/5">
                                    <table class="w-full text-left">
                                        <thead class="bg-slate-900 text-white">
                                            <tr>
                                                @foreach($section['headers'] as $header)
                                                    <th class="px-8 py-6 font-black uppercase tracking-wider text-xs">{{ $header }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100">
                                            @foreach($section['rows'] as $row)
                                                <tr class="hover:bg-slate-50 transition-colors">
                                                    @foreach($row as $cell)
                                                        <td class="px-8 py-6 text-slate-600 font-medium leading-relaxed">{{ $cell }}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            @elseif($section['type'] === 'steps')
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    @foreach($section['items'] as $index => $item)
                                        <div class="p-8 rounded-[2.5rem] bg-slate-900 text-white space-y-4 relative overflow-hidden group">
                                            <div class="absolute top-0 right-0 p-8 text-8xl font-black text-white/5 group-hover:text-gold-600/10 transition-colors duration-500">
                                                {{ $index + 1 }}
                                            </div>
                                            <div class="w-12 h-12 rounded-2xl bg-gold-600 text-slate-950 flex items-center justify-center font-black text-xl">
                                                {{ $index + 1 }}
                                            </div>
                                            <p class="relative z-10 text-lg font-medium leading-relaxed">{!! $item !!}</p>
                                        </div>
                                    @endforeach
                                </div>

                            @elseif($section['type'] === 'docs')
                                <div class="space-y-8">
                                    @foreach($section['levels'] as $level => $docs)
                                        <div class="p-8 rounded-[3rem] border border-slate-100 bg-slate-50 space-y-6">
                                            <h4 class="text-xl font-black text-slate-900 italic tracking-tight flex items-center gap-3">
                                                <span class="w-2 h-2 rounded-full bg-gold-600"></span>
                                                {{ $level }}
                                            </h4>
                                            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                @foreach($docs as $doc)
                                                    <li class="flex items-center gap-3 text-slate-600 font-medium">
                                                        <svg class="w-5 h-5 text-gold-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                        {{ $doc }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                {{-- Sidebar --}}
                <div class="lg:col-span-4">
                    <div class="sticky top-32 space-y-8">
                        {{-- CTA Card --}}
                        <div class="p-10 rounded-[3rem] bg-slate-950 text-white space-y-8 relative overflow-hidden">
                            <div class="absolute top-0 right-0 p-10 opacity-10">
                                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z" />
                                </svg>
                            </div>
                            <h4 class="text-3xl font-black italic tracking-tighter leading-none">Prêt à partir pour la {{ $destination['name'] }} ?</h4>
                            <p class="text-slate-400 font-medium">Nos conseillers experts vous accompagnent de A à Z dans vos démarches.</p>
                            <a href="{{ route('contact') }}" class="block w-full py-5 text-center rounded-2xl bg-gold-600 text-slate-950 font-black hover:bg-gold-500 transition-all shadow-xl shadow-gold-600/20">
                                Prendre Rendez-vous
                            </a>
                        </div>

                        {{-- Quick Info --}}
                        <div class="p-10 rounded-[3rem] border border-slate-100 bg-white space-y-6">
                            <h4 class="text-lg font-black uppercase tracking-widest text-gold-600 italic">Infos Pratiques</h4>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center py-4 border-b border-slate-50">
                                    <span class="text-slate-500 font-medium">Destination</span>
                                    <span class="font-bold text-slate-900">{{ $destination['name'] }}</span>
                                </div>
                                <div class="flex justify-between items-center py-4 border-b border-slate-50">
                                    <span class="text-slate-500 font-medium">Flag</span>
                                    <span class="text-2xl">{{ $destination['flag'] }}</span>
                                </div>
                                <div class="flex justify-between items-center py-4 border-b border-slate-50">
                                    <span class="text-slate-500 font-medium">Expertise</span>
                                    <span class="font-bold text-gold-600 italic">STUDIA Verified</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Other Destinations --}}
    <x-home.destinations />
@endsection
