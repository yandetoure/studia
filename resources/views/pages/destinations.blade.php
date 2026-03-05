@extends('layouts.app')

@section('title', 'Nos Destinations - Étudier à l’International - STUDIA')

@section('content')
    <section class="pt-40 pb-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">Le Monde vous appartient</h1>
                <h2 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight">Nos <span
                        class="text-gold-600">Destinations</span>.</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium">
                    Nous travaillons avec un réseau de partenaires éducatifs internationaux fiables et reconnus à travers
                    plus de 13 pays.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @php
                    $destInfo = [
                        ['name' => 'Europe', 'countries' => 'France, Belgique, Espagne, Malte, Angleterre, Royaume-Uni'],
                        ['name' => 'Amérique du Nord', 'countries' => 'Canada, États-Unis'],
                        ['name' => 'Afrique & Maghreb', 'countries' => 'Maroc, Tunisie, Égypte, Sénégal'],
                        ['name' => 'Asie & Moyen-Orient', 'countries' => 'Turquie, Inde, Dubaï']
                    ];
                @endphp
                @foreach($destInfo as $region)
                    <div
                        class="p-10 rounded-[3rem] bg-white border border-slate-100 space-y-8 shadow-xl shadow-black/5 hover:-translate-y-2 transition-all group">
                        <div
                            class="w-16 h-16 rounded-2xl bg-slate-900 text-white flex items-center justify-center group-hover:bg-gold-600 group-hover:text-slate-950 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2 2 2 0 012 2v.105m.397-3.056l1.411 1.411a2 2 0 010 2.828l-7.071 7.071a2 2 0 01-2.828 0L9.414 18.414a2 2 0 00-2.828 0L5.172 19.828a2 2 0 01-2.828 0l-.105-.105">
                                </path>
                            </svg>
                        </div>
                        <div class="space-y-4">
                            <h4 class="text-3xl font-black italic tracking-tighter">{{ $region['name'] }}</h4>
                            <p class="text-slate-500 font-bold italic tracking-wide text-sm">{{ $region['countries'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-home.destinations />
    <x-home.partners />
@endsection