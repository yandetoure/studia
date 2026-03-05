@extends('layouts.app')

@section('title', 'FAQ - Questions Fréquentes - STUDIA')

@section('content')
    <section class="pt-40 pb-24 bg-slate-50 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6">
            <div class="max-w-3xl space-y-6">
                <h1 class="text-sm font-bold tracking-[0.2em] text-gold-600 uppercase italic">Support & Aide</h1>
                <h2 class="text-5xl lg:text-7xl font-black text-slate-900 leading-tight">Questions <span
                        class="text-gold-600">Fréquentes</span>.</h2>
                <p class="text-xl text-slate-600 leading-relaxed font-medium">
                    Une FAQ complète, pensée pour répondre aux attentes des parents, étudiants et professionnels.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white" id="faq">
        <div class="max-w-4xl mx-auto px-6">
            <div class="space-y-6">
                @php
                    $faqs = [
                        ['q' => 'À qui s’adressent les services de STUDIA ?', 'a' => 'Les services de STUDIA s’adressent : aux élèves du secondaire (collège et lycée), aux étudiants universitaires (Bac à Bac+5), aux professionnels souhaitant se former ou se reconvertir à l’international, aux parents recherchant un accompagnement sérieux et sécurisé pour leurs enfants.'],
                        ['q' => 'Dans quels pays puis-je étudier avec STUDIA ?', 'a' => 'STUDIA accompagne les projets d’études vers plus de 13 destinations, notamment : France, Canada, États-Unis, Royaume-Uni, Belgique, Espagne, Turquie, Inde, Maroc, Tunisie, Égypte, Sénégal, Dubaï.'],
                        ['q' => 'STUDIA garantit-elle l’obtention du visa ou de l’admission ?', 'a' => 'Non. Aucune structure sérieuse ne peut garantir un visa ou une admission. En revanche, STUDIA garantit : un dossier conforme et complet, une préparation rigoureuse, une orientation réaliste, un accompagnement professionnel, une réduction significative des risques de refus.'],
                        ['q' => 'Qu’est-ce qui différencie STUDIA des autres agences ?', 'a' => 'STUDIA se distingue par : près de 10 ans d’expérience terrain, un positionnement premium, une approche humaine et personnalisée, une transparence totale, un accompagnement de A à Z, une expertise multi-pays.'],
                        ['q' => 'Puis-je bénéficier uniquement d’une orientation sans partir à l’étranger ?', 'a' => 'Oui. STUDIA propose des services d’orientation scolaire et universitaire, ainsi que du soutien scolaire, même sans projet de mobilité internationale.'],
                        ['q' => 'Comment se déroule l’accompagnement chez STUDIA ?', 'a' => 'L’accompagnement se déroule en plusieurs étapes : Premier échange et analyse du profil, Orientation et choix du parcours, Constitution du dossier académique, Admission et suivi, Assistance visa (si nécessaire), Installation et suivi post-départ (selon le pack).'],
                        ['q' => 'Les parents peuvent-ils être impliqués dans le suivi ?', 'a' => 'Oui. STUDIA accorde une grande importance à l’implication des parents, notamment : lors de la définition du projet académique, pendant les étapes clés (admission, visa), à travers des sessions d’information dédiées.'],
                        ['q' => 'Quels documents dois-je fournir pour commencer ?', 'a' => 'Les documents varient selon le profil et la destination, mais généralement : relevés de notes, diplômes ou attestations, pièce d’identité ou passeport, CV académique, lettre de motivation, documents financiers (selon le pays).'],
                        ['q' => 'STUDIA accompagne-t-elle les dossiers Campus France ?', 'a' => 'Oui. STUDIA propose un accompagnement complet Campus France, incluant : la création du compte, le choix stratégique des formations, la préparation à l’entretien, le suivi administratif.'],
                        ['q' => 'Proposez-vous un accompagnement pour les professionnels ?', 'a' => 'Oui. STUDIA accompagne également : les professionnels en reconversion, les cadres souhaitant se former à l’étranger, les porteurs de projets académiques ou professionnels internationaux.'],
                        ['q' => 'À quel moment dois-je contacter STUDIA ?', 'a' => 'Le plus tôt possible. Idéalement 6 à 12 mois avant le départ, afin de maximiser les chances de réussite.'],
                        ['q' => 'Quels sont les coûts des services STUDIA ?', 'a' => 'Les tarifs varient selon le service et le niveau d’accompagnement choisi. STUDIA propose : des packs clairs et transparents, adaptés à chaque profil et à chaque budget. Un devis est établi après analyse du dossier.'],
                        ['q' => 'Y a-t-il un paiement échelonné possible ?', 'a' => 'Selon le service et le pack choisi, un paiement échelonné peut être proposé. Les modalités sont définies au cas par cas.'],
                        ['q' => 'STUDIA travaille-t-elle avec des universités partenaires ?', 'a' => 'STUDIA collabore avec : des universités, des écoles, des instituts de formation, des partenaires éducatifs internationaux, dans le respect des règles et des exigences académiques.'],
                        ['q' => 'STUDIA est-elle une agence de voyage ?', 'a' => 'Non. STUDIA n’est pas une agence de voyage. La vente et l’assistance billets d’avion sont proposées en partenariat avec des agences agréées, conformément à la réglementation.'],
                        ['q' => 'Puis-je suivre mon dossier à distance ?', 'a' => 'Oui. L’accompagnement peut se faire : en présentiel à Cocody, à distance (WhatsApp, visioconférence, e-mail), selon votre situation géographique.'],
                        ['q' => 'Que se passe-t-il en cas de refus de visa ou d’admission ?', 'a' => 'STUDIA analyse chaque situation au cas par cas et peut : proposer une alternative réaliste, ajuster la stratégie, accompagner dans un nouveau projet, selon les conditions prévues dans le contrat.'],
                        ['q' => 'Comment prendre rendez-vous avec STUDIA ?', 'a' => 'Vous pouvez : remplir le formulaire de contact sur le site, appeler ou écrire via WhatsApp au +225 07 67 93 93 93, envoyer un email à infos@studia.com.'],
                        ['q' => 'Où est situé STUDIA ?', 'a' => '📍 Cocody, Abidjan – Côte d’Ivoire. STUDIA reçoit sur rendez-vous.'],
                        ['q' => 'Comment être sûr que STUDIA est une structure sérieuse ?', 'a' => 'STUDIA est : une entreprise légalement constituée, dirigée par un professionnel expérimenté, transparente sur ses services et ses limites, engagée dans une démarche éthique et responsable.'],
                    ];
                @endphp

                @foreach($faqs as $faq)
                    <div
                        class="p-8 rounded-[2.5rem] bg-slate-50 border border-slate-100 hover:bg-white hover:shadow-2xl transition-all group">
                        <h4
                            class="text-xl font-black text-slate-900 italic mb-4 tracking-tighter flex items-center justify-between pointer-events-none">
                            {{ $faq['q'] }}
                            <svg class="w-6 h-6 text-gold-600 group-hover:rotate-180 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </h4>
                        <div class="text-slate-500 font-medium italic leading-relaxed text-sm">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div
                class="mt-20 p-12 rounded-[3.5rem] bg-gold-600 text-slate-950 text-center space-y-8 shadow-2xl shadow-gold-500/20">
                <h3 class="text-3xl font-black italic">Vous avez une autre question ?</h3>
                <div class="flex flex-col sm:flex-row justify-center gap-8 font-bold italic">
                    <p class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg> +225 07 67 93 93 93</p>
                    <p class="flex items-center gap-2"><svg class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg> infos@studia.com</p>
                </div>
                <div class="pt-4">
                    <a href="{{ route('contact') }}"
                        class="inline-block px-10 py-5 rounded-3xl bg-slate-900 text-white font-black hover:bg-white hover:text-gold-600 transition-all shadow-xl">Prendre
                        rendez-vous</a>
                </div>
            </div>
        </div>
    </section>
@endsection