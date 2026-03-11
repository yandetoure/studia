@extends('layouts.dashboard')

@section('content')
    <header>
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="{{ route('dashboard.clients.show', $dossier->client_id) }}"
                style="color: var(--text-dim); text-decoration: none; font-size: 24px;">←</a>
            <h1>Dossier: {{ str_replace('_', ' ', $dossier->service_type) }} - {{ $dossier->client->last_name }}</h1>
        </div>
        <div style="display: flex; gap: 15px;">
            <button class="nav-link"
                style="margin-bottom: 0; background: var(--glass); border: 1px solid var(--glass-border);"
                onclick="openEditDossierModal({{ $dossier }})">✏️ Modifier le Dossier</button>
            <button class="btn-gold"
                onclick="openAddInvoiceWithDossier('facture', {{ $dossier->client_id }}, {{ $dossier->id }})">📑 Créer une
                Facture</button>
        </div>
    </header>

    <div style="display: grid; grid-template-columns: 350px 1fr; gap: 30px;">
        <!-- Left Column: Dossier Info -->
        <div style="display: flex; flex-direction: column; gap: 30px;">
            <div class="premium-card">
                <div style="text-align: center; margin-bottom: 25px;">
                    <div
                        style="width: 80px; height: 80px; background: var(--gold-soft); color: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 700; margin: 0 auto 15px;">
                        📂
                    </div>
                    <h2 style="font-size: 20px; color: var(--text-main); text-transform: capitalize;">
                        {{ str_replace('_', ' ', $dossier->service_type) }}
                    </h2>
                    <div style="color: var(--gold); font-size: 14px; font-weight: 600; margin-top: 5px;">
                        📍 {{ $dossier->target_country }}</div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 15px;">
                    <div>
                        <div
                            style="color: var(--text-dim); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                            Client</div>
                        <div style="color: var(--text-main); font-size: 15px; font-weight: 600;">
                            <a href="{{ route('dashboard.clients.show', $dossier->client_id) }}"
                                style="color: var(--text-main); text-decoration: none;">
                                {{ $dossier->client->first_name }} {{ $dossier->client->last_name }}
                            </a>
                        </div>
                    </div>
                    <div>
                        <div
                            style="color: var(--text-dim); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                            Institution</div>
                        <div style="color: var(--text-main); font-size: 15px;">
                            {{ $dossier->institution ?? 'Non spécifiée' }}
                        </div>
                    </div>
                    <div>
                        <div
                            style="color: var(--text-dim); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                            Statut</div>
                        <div class="badge status-{{ $dossier->status }}" style="margin-top: 5px; display: inline-block;">
                            {{ str_replace('_', ' ', $dossier->status) }}
                        </div>
                    </div>
                    <div>
                        <div
                            style="color: var(--text-dim); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                            Date de Création</div>
                        <div style="color: var(--text-main); font-size: 14px;">{{ $dossier->created_at->format('d M, Y') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="premium-card">
                <h3 style="font-size: 16px; margin-bottom: 20px; color: var(--gold);">Actions Rapides</h3>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <button class="nav-link"
                        onclick="openAddInvoiceWithDossier('devis', {{ $dossier->client_id }}, {{ $dossier->id }})"
                        style="width: 100%; border: 1px solid var(--glass-border); justify-content: center;">📜 Générer un
                        Devis</button>
                    <button class="nav-link" onclick="document.getElementById('addDocumentModal').style.display='flex'"
                        style="width: 100%; border: 1px solid var(--glass-border); justify-content: center;">📎 Joindre un
                        Fichier</button>
                    <button class="nav-link" onclick="document.getElementById('addNoteModal').style.display='flex'"
                        style="width: 100%; border: 1px solid var(--glass-border); justify-content: center;">📝 Ajouter une
                        Note</button>
                </div>
            </div>
        </div>

        <!-- Right Column: Details & Tabs -->
        <div style="display: flex; flex-direction: column; gap: 30px;">
            <!-- Tab Bar -->
            <div class="tab-bar"
                style="display: flex; gap: 30px; border-bottom: 1px solid var(--glass-border); padding-bottom: 0;">
                <div class="tab-item active" onclick="switchTab(event, 'checklist-tab')"
                    style="color: var(--gold); border-bottom: 2px solid var(--gold); padding-bottom: 15px; font-weight: 600; cursor: pointer;">
                    Checklist & Étapes</div>
                <div class="tab-item" onclick="switchTab(event, 'finances-tab')"
                    style="color: var(--text-dim); padding-bottom: 15px; font-weight: 500; cursor: pointer;">
                    Paiements & Factures</div>
                <div class="tab-item" onclick="switchTab(event, 'docs-tab')"
                    style="color: var(--text-dim); padding-bottom: 15px; font-weight: 500; cursor: pointer;">
                    Documents ({{ $dossier->documents->count() }})</div>
                <div class="tab-item" onclick="switchTab(event, 'notes-tab')"
                    style="color: var(--text-dim); padding-bottom: 15px; font-weight: 500; cursor: pointer;">
                    Notes ({{ $dossier->notes->count() }})</div>
            </div>

            <div id="checklist-tab" class="tab-content">
                <div class="premium-card" style="margin-bottom: 30px;">
                    <h3 style="font-size: 18px; margin-bottom: 20px;">Progression du Dossier</h3>
                    @php
                        $checklist = $dossier->checklist ?? [
                            ['label' => 'Inscription & Documents de base', 'done' => true],
                            ['label' => 'Paiement des frais de service', 'done' => $dossier->invoices->where('status', 'paid')->count() > 0],
                            ['label' => 'Soumission admission / Demande', 'done' => false],
                            ['label' => 'Réception lettre d\'acceptation', 'done' => false],
                            ['label' => 'Préparation dossier Visa', 'done' => false],
                        ];
                        $doneCount = collect($checklist)->where('done', true)->count();
                        $percent = count($checklist) > 0 ? ($doneCount / count($checklist)) * 100 : 0;
                    @endphp
                    <div
                        style="width: 100%; background: var(--glass-strong); height: 12px; border-radius: 6px; margin-bottom: 15px;">
                        <div
                            style="width: {{ $percent }}%; background: var(--gold-gradient); height: 100%; border-radius: 6px; box-shadow: 0 0 15px rgba(212, 175, 55, 0.4); transition: 0.5s;">
                        </div>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; font-size: 13px; color: var(--text-dim); margin-bottom: 30px;">
                        <span>{{ $doneCount }} sur {{ count($checklist) }} étapes complétées</span>
                        <span style="color: var(--gold);">{{ round($percent) }}%</span>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 15px;">
                        @foreach($checklist as $item)
                            <div
                                style="display: flex; align-items: center; gap: 15px; padding: 12px; background: rgba(255,255,255,0.02); border-radius: 10px; border: 1px solid var(--glass-border);">
                                <div
                                    style="width: 20px; height: 20px; border-radius: 50%; border: 2px solid {{ $item['done'] ? 'var(--gold)' : 'var(--text-dim)' }}; display: flex; align-items: center; justify-content: center; color: var(--gold);">
                                    @if($item['done']) ✓ @endif
                                </div>
                                <span
                                    style="color: {{ $item['done'] ? 'var(--text-main)' : 'var(--text-dim)' }};">{{ $item['label'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="premium-card">
                    <h3 style="font-size: 18px; margin-bottom: 20px;">Dates Clés</h3>
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px;">
                        <div
                            style="padding: 15px; background: rgba(255,255,255,0.02); border-radius: 12px; border: 1px solid var(--glass-border);">
                            <div style="color: var(--text-dim); font-size: 12px; margin-bottom: 5px;">Rentrée Prévue</div>
                            <div style="font-weight: 600; color: var(--gold);">Septembre 2024</div>
                        </div>
                        <div
                            style="padding: 15px; background: rgba(255,255,255,0.02); border-radius: 12px; border: 1px solid var(--glass-border);">
                            <div style="color: var(--text-dim); font-size: 12px; margin-bottom: 5px;">Limite Dépôt</div>
                            <div style="font-weight: 600; color: #e74c3c;">15 Mai 2024</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="finances-tab" class="tab-content" style="display: none;">
                <div class="premium-card" style="padding: 0; overflow: hidden;">
                    <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
                        <table>
                            <thead>
                                <tr>
                                    <th>N° Document</th>
                                    <th>Type</th>
                                    <th>Total</th>
                                    <th>Payé</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dossier->invoices as $invoice)
                                    <tr>
                                        <td style="font-family: monospace; color: var(--gold);">{{ $invoice->invoice_number }}
                                        </td>
                                        <td style="text-transform: capitalize;">{{ $invoice->type }}</td>
                                        <td>{{ number_format($invoice->total_amount, 0, ',', ' ') }}</td>
                                        <td style="color: #2ecc71;">{{ number_format($invoice->paid_amount, 0, ',', ' ') }}</td>
                                        <td><span class="badge status-{{ $invoice->status }}">{{ $invoice->status }}</span></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-dim);">
                                            Aucune finance liée</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="docs-tab" class="tab-content" style="display: none;">
                <div class="premium-card" style="padding: 0; overflow: hidden;">
                    <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nom du Document</th>
                                    <th>Catégorie</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dossier->documents as $doc)
                                    <tr>
                                        <td style="font-weight: 500;">📄 {{ $doc->display_name }}</td>
                                        <td><span class="badge"
                                                style="background: var(--glass-strong); color: var(--text-dim);">{{ $doc->category }}</span>
                                        </td>
                                        <td style="color: var(--text-dim);">{{ $doc->created_at->format('d M, Y') }}</td>
                                        <td>
                                            <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                                class="btn-small" style="text-decoration: none;">👁️ Voir</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" style="text-align: center; padding: 40px; color: var(--text-dim);">Aucun
                                            document attaché.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="notes-tab" class="tab-content" style="display: none;">
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    @forelse($dossier->notes->sortByDesc('created_at') as $note)
                        <div class="premium-card" style="border-left: 3px solid var(--gold);">
                            <div
                                style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <div
                                        style="width: 30px; height: 30px; background: var(--gold-soft); color: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700;">
                                        {{ substr($note->user->name ?? 'A', 0, 1) }}
                                    </div>
                                    <div style="font-weight: 600; font-size: 14px;">{{ $note->user->name ?? 'Admin' }}</div>
                                </div>
                                <div style="font-size: 12px; color: var(--text-dim);">
                                    {{ $note->created_at->format('d/m/Y H:i') }}</div>
                            </div>
                            <div style="color: var(--text-main); font-size: 14px; line-height: 1.5; white-space: pre-wrap;">
                                {{ $note->content }}</div>
                        </div>
                    @empty
                        <div class="premium-card">
                            <p style="color: var(--text-dim); text-align: center; padding: 20px;">Aucune note pour ce dossier.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @include('pages.dashboard.dossiers._modal_edit')
    @include('pages.dashboard.finances._modal_invoice', ['clients' => \App\Models\Client::all()])

    <!-- Modal Ajouter Document -->
            <div id="addDocumentModal" class="modal">
                <div class="modal-content">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <h2>Ajouter un Document</h2>
                        <button onclick="document.getElementById('addDocumentModal').style.display='none'"
                            style="background: none; border: none; color: var(--text-dim); cursor: pointer; font-size: 24px;">&times;</button>
                    </div>
                    <form action="{{ route('dashboard.dossiers.documents.store', $dossier->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <label>Nom de l'affichage</label>
                        <input type="text" name="display_name" placeholder="Ex: Lettre d'admission, Passport..." required>

                        <label>Catégorie</label>
                        <select name="category" required>
                            <option value="Admission">Admission</option>
                            <option value="Visa">Visa</option>
                            <option value="Logement">Logement</option>
                            <option value="Identité">Identité</option>
                            <option value="Paiement">Paiement</option>
                            <option value="Autre">Autre</option>
                        </select>

                        <label>Fichier</label>
                        <input type="file" name="file" required
                            style="padding: 10px; background: var(--glass-strong); border-radius: 8px; border: 1px solid var(--glass-border); width: 100%; margin-bottom: 20px;">

                        <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                            <button type="button" class="nav-link" style="margin-bottom: 0;"
                                onclick="document.getElementById('addDocumentModal').style.display='none'">Annuler</button>
                            <button type="submit" class="btn-gold">📎 Télécharger</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Ajouter Note -->
            <div id="addNoteModal" class="modal">
                <div class="modal-content">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                        <h2>Ajouter une Note</h2>
                        <button onclick="document.getElementById('addNoteModal').style.display='none'"
                            style="background: none; border: none; color: var(--text-dim); cursor: pointer; font-size: 24px;">&times;</button>
                    </div>
                    <form action="{{ route('dashboard.dossiers.notes.store', $dossier->id) }}" method="POST">
                        @csrf
                        <label>Contenu de la note</label>
                        <textarea name="content" rows="6" placeholder="Saisissez votre note ici..." required
                            style="width: 100%; background: var(--glass-strong); color: var(--text-main); border: 1px solid var(--glass-border); padding: 15px; border-radius: 12px; margin-bottom: 20px; font-family: inherit; resize: vertical;"></textarea>

                        <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                            <button type="button" class="nav-link" style="margin-bottom: 0;"
                                onclick="document.getElementById('addNoteModal').style.display='none'">Annuler</button>
                            <button type="submit" class="btn-gold">📝 Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

            <script>
                    function switchTab(evt, tabName)           {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tab-content");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tab-item");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].classList.remove("active");
                            tablinks[i].style.color = "var(--text-dim)";
                            tablinks[i].style.borderBottom = "none";
                        }
                        document.getElementById(tabName).style.display = "block";
                        evt.currentTarget.classList.add("active");
                        evt.currentTarget.style.color = "var(--gold)";
                        evt.currentTarget.style.borderBottom = "2px solid var(--gold)";
                    }

                    function openAddInvoiceWithDossier(type, clientId, dossierId) {
                        const modal = document.getElementById('addInvoiceModal');
                        modal.style.display = 'flex';
                        const typeSelect = modal.querySelector('select[name="type"]');
                        const clientSelect = modal.querySelector('select[name="client_id"]');
                        const dossierSelect = modal.querySelector('select[name="dossier_id"]');

                        if (typeSelect) typeSelect.value = type;
                        if (clientSelect) clientSelect.value = clientId;
                        if (dossierSelect) dossierSelect.value = dossierId;
                    }

                    function openEditDossierModal(dossier) {
                        const modal = document.getElementById('editDossierModal');
                        modal.style.display = 'flex';
                        modal.querySelector('form').action = `/dashboard/dossiers/${dossier.id}`;
                        modal.querySelector('select[name="service_type"]').value = dossier.service_type;
                        modal.querySelector('input[name="target_country"]').value = dossier.target_country;
                        modal.querySelector('input[name="institution"]').value = dossier.institution || '';
                        modal.querySelector('select[name="status"]').value = dossier.status;
                    }
                </script>

                <style>
                    .status-en_cours { background: rgba(52, 152, 219, 0.1); color: #3498db; border: 1px solid rgba(52, 152, 219, 0.2); }
                    .status-valide { background: rgba(46, 204, 113, 0.1); color: #2ecc71; border: 1px solid rgba(46, 204, 113, 0.2); }
                    .status-refuse { background: rgba(231, 76, 60, 0.1); color: #e74c3c; border: 1px solid rgba(231, 76, 60, 0.2); }
                    .status-cloture { background: rgba(149, 165, 166, 0.1); color: #95a5a6; border: 1px solid rgba(149, 165, 166, 0.2); }
                    .status-paid { background: rgba(46, 204, 113, 0.1); color: #2ecc71; border: 1px solid rgba(46, 204, 113, 0.2); }
                    .status-pending { background: rgba(241, 196, 15, 0.1); color: #f1c40f; border: 1px solid rgba(241, 196, 15, 0.2); }
                    .status-partial { background: rgba(230, 126, 34, 0.1); color: #e67e22; border: 1px solid rgba(230, 126, 34, 0.2); }
                </style>
@endsection
