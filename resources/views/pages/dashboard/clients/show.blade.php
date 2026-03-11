@extends('layouts.dashboard')

@section('content')
    <header>
        <div style="display: flex; align-items: center; gap: 20px;">
            <a href="{{ route('dashboard.clients.index') }}"
                style="color: var(--text-dim); text-decoration: none; font-size: 24px;">←</a>
            <h1>Profil Client: {{ $client->first_name }} {{ $client->last_name }}</h1>
        </div>
        <div style="display: flex; gap: 15px;">
            <button class="btn-gold" onclick="document.getElementById('addDossierModal').style.display='flex'">+ Nouveau
                Dossier</button>
        </div>
    </header>

    <div style="display: grid; grid-template-columns: 350px 1fr; gap: 30px;">
        <!-- Left Column: Client Info -->
        <div style="display: flex; flex-direction: column; gap: 30px;">
            <div class="premium-card">
                <div style="text-align: center; margin-bottom: 25px;">
                    <div
                        style="width: 80px; height: 80px; background: var(--gold-soft); color: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; font-weight: 700; margin: 0 auto 15px;">
                        {{ substr($client->first_name, 0, 1) }}{{ substr($client->last_name, 0, 1) }}
                    </div>
                    <h2 style="font-size: 20px; color: var(--text-main);">{{ $client->first_name }} {{ $client->last_name }}
                    </h2>
                    <div style="color: var(--gold); font-size: 14px; font-weight: 600; margin-top: 5px;">
                        {{ $client->client_number }}</div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 15px;">
                    <div>
                        <div
                            style="color: var(--text-dim); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                            Email</div>
                        <div style="color: var(--text-main); font-size: 15px;">{{ $client->email }}</div>
                    </div>
                    <div>
                        <div
                            style="color: var(--text-dim); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                            Téléphone</div>
                        <div style="color: var(--text-main); font-size: 15px;">{{ $client->phone }}</div>
                    </div>
                    <div>
                        <div
                            style="color: var(--text-dim); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                            Statut</div>
                        <div
                            style="display: inline-block; background: var(--gold-soft); color: var(--gold); padding: 4px 12px; border-radius: 8px; font-size: 13px; font-weight: 600; margin-top: 5px; text-transform: capitalize;">
                            {{ $client->status }}</div>
                    </div>
                    <div>
                        <div
                            style="color: var(--text-dim); font-size: 12px; text-transform: uppercase; letter-spacing: 1px;">
                            Adresse</div>
                        <div style="color: var(--text-main); font-size: 14px;">{{ $client->address }}</div>
                    </div>
                </div>
            </div>

            <div class="premium-card">
                <h3 style="font-size: 16px; margin-bottom: 20px; color: var(--gold);">Actions Rapides</h3>
                <div style="display: flex; flex-direction: column; gap: 10px;">
                    <button class="nav-link" onclick="document.getElementById('addDossierModal').style.display='flex'"
                        style="width: 100%; border: 1px solid var(--glass-border); justify-content: center;">📂 Nouveau Dossier</button>
                    <button class="nav-link" onclick="openAddInvoiceWithClient('devis', {{ $client->id }})"
                        style="width: 100%; border: 1px solid var(--glass-border); justify-content: center;">📜 Générer un Devis</button>
                    <button class="nav-link" onclick="openAddInvoiceWithClient('facture', {{ $client->id }})"
                        style="width: 100%; border: 1px solid var(--glass-border); justify-content: center;">📑 Créer une Facture</button>
                    <button class="nav-link" onclick="document.getElementById('addPaymentModal').style.display='flex'"
                        style="width: 100%; border: 1px solid var(--glass-border); justify-content: center;">💰 Encaisser Paiement</button>
                </div>
            </div>
        </div>

        <!-- Right Column: Tabs -->
        <div style="display: flex; flex-direction: column; gap: 30px;">
            <!-- Simple Tab Bar -->
            <div class="tab-bar" style="display: flex; gap: 25px; border-bottom: 1px solid var(--glass-border); padding-bottom: 0; overflow-x: auto;">
                <div class="tab-item active" onclick="switchTab(event, 'dossiers-tab')"
                    style="color: var(--gold); border-bottom: 2px solid var(--gold); padding-bottom: 15px; font-weight: 600; cursor: pointer; white-space: nowrap;">
                    Dossiers ({{ $client->dossiers->count() }})</div>
                <div class="tab-item" onclick="switchTab(event, 'factures-tab')" style="color: var(--text-dim); padding-bottom: 15px; font-weight: 500; cursor: pointer; white-space: nowrap;">Factures ({{ $client->invoices->where('type', 'facture')->count() }})</div>
                <div class="tab-item" onclick="switchTab(event, 'devis-tab')" style="color: var(--text-dim); padding-bottom: 15px; font-weight: 500; cursor: pointer; white-space: nowrap;">Devis ({{ $client->invoices->where('type', 'devis')->count() }})</div>
                <div class="tab-item" onclick="switchTab(event, 'payments-tab')" style="color: var(--text-dim); padding-bottom: 15px; font-weight: 500; cursor: pointer; white-space: nowrap;">Paiements</div>
                <div class="tab-item" onclick="switchTab(event, 'docs-tab')" style="color: var(--text-dim); padding-bottom: 15px; font-weight: 500; cursor: pointer; white-space: nowrap;">Documents</div>
                <div class="tab-item" onclick="switchTab(event, 'notes-tab')" style="color: var(--text-dim); padding-bottom: 15px; font-weight: 500; cursor: pointer; white-space: nowrap;">Notes</div>
            </div>

            <div id="dossiers-tab" class="tab-content">
                <div class="premium-card" style="padding: 0; overflow: hidden;">
                    <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Dossier</th>
                                    <th>Destination</th>
                                    <th>Statut</th>
                                    <th>Progression</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($client->dossiers as $dossier)
                                    <tr>
                                        <td>
                                            <div style="font-weight: 600; text-transform: capitalize;">
                                                {{ str_replace('_', ' ', $dossier->service_type) }}</div>
                                            <div style="font-size: 12px; color: var(--text-dim);">Créé le
                                                {{ $dossier->created_at->format('d/m/Y') }}</div>
                                        </td>
                                        <td style="color: var(--gold); font-weight: 500;">📍 {{ $dossier->target_country }}</td>
                                        <td>
                                            <span class="badge status-{{ $dossier->status }}">
                                                {{ str_replace('_', ' ', $dossier->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div
                                                style="width: 100%; background: var(--glass-strong); height: 6px; border-radius: 3px;">
                                                <div
                                                    style="width: 40%; background: var(--gold-gradient); height: 100%; border-radius: 3px; box-shadow: 0 0 10px rgba(212, 175, 55, 0.3);">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.dossiers.show', $dossier->id) }}" class="btn-small"
                                                style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); color: var(--text-main); text-decoration: none;">👁️</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun
                                            dossier ouvert</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="factures-tab" class="tab-content" style="display: none;">
                <div class="premium-card" style="padding: 0; overflow: hidden;">
                    <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
                        <table>
                            <thead>
                                <tr>
                                    <th>N° Facture</th>
                                    <th>Total</th>
                                    <th>Payé</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($client->invoices->where('type', 'facture') as $invoice)
                                    <tr>
                                        <td style="font-family: monospace; color: var(--gold);">{{ $invoice->invoice_number }}</td>
                                        <td>{{ number_format($invoice->total_amount, 0, ',', ' ') }}</td>
                                        <td style="color: #2ecc71;">{{ number_format($invoice->paid_amount, 0, ',', ' ') }}</td>
                                        <td><span class="badge status-{{ $invoice->status }}">{{ $invoice->status }}</span></td>
                                        <td><button onclick="openEditInvoiceModal({{ $invoice }})" class="btn-small">✏️</button></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" style="text-align: center; padding: 40px; color: var(--text-dim);">Aucune facture</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="devis-tab" class="tab-content" style="display: none;">
                <div class="premium-card" style="padding: 0; overflow: hidden;">
                    <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
                        <table>
                            <thead>
                                <tr>
                                    <th>N° Devis</th>
                                    <th>Total</th>
                                    <th>Date Échéance</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($client->invoices->where('type', 'devis') as $invoice)
                                    <tr>
                                        <td style="font-family: monospace; color: var(--gold);">{{ $invoice->invoice_number }}</td>
                                        <td>{{ number_format($invoice->total_amount, 0, ',', ' ') }}</td>
                                        <td>{{ $invoice->due_date }}</td>
                                        <td><button onclick="openEditInvoiceModal({{ $invoice }})" class="btn-small">✏️</button></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" style="text-align: center; padding: 40px; color: var(--text-dim);">Aucun devis</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="payments-tab" class="tab-content" style="display: none;">
                <div class="premium-card" style="padding: 0; overflow: hidden;">
                    <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Document</th>
                                    <th>Montant</th>
                                    <th>Méthode</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $hasPayments = false; @endphp
                                @foreach($client->invoices as $invoice)
                                    @foreach($invoice->payments as $payment)
                                        @php $hasPayments = true; @endphp
                                        <tr>
                                            <td>{{ $payment->payment_date }}</td>
                                            <td style="color: var(--gold);">{{ $invoice->invoice_number }}</td>
                                            <td style="font-weight: 600;">{{ number_format($payment->amount, 0, ',', ' ') }}</td>
                                            <td>{{ $payment->method }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                @if(!$hasPayments)
                                    <tr><td colspan="4" style="text-align: center; padding: 40px; color: var(--text-dim);">Aucun paiement</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="docs-tab" class="tab-content" style="display: none;">
                <div class="premium-card">
                    <p style="color: var(--text-dim); text-align: center; padding: 40px;">Système de fichiers sécurisé en attente.</p>
                </div>
            </div>

            <div id="notes-tab" class="tab-content" style="display: none;">
                <div class="premium-card">
                    <p style="color: var(--text-dim); text-align: center; padding: 40px;">Journal des notes internes vide.</p>
                </div>
            </div>

            <!-- Finances Preview -->
            <div class="premium-card">
                <h3 style="font-size: 18px; margin-bottom: 25px; border-left: 3px solid var(--gold); padding-left: 15px;">
                    Résumé Financier</h3>
                <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                    <div
                        style="background: rgba(255, 255, 255, 0.02); padding: 20px; border-radius: 15px; border: 1px solid var(--glass-border);">
                        <div style="color: var(--text-dim); font-size: 13px; margin-bottom: 5px;">Total Facturé</div>
                        <div style="font-size: 18px; font-weight: 700;">
                            {{ number_format($client->invoices->sum('total_amount'), 0, ',', ' ') }} <small>FCFA</small>
                        </div>
                    </div>
                    <div
                        style="background: rgba(46, 204, 113, 0.05); padding: 20px; border-radius: 15px; border: 1px solid rgba(46, 204, 113, 0.1);">
                        <div style="color: var(--text-dim); font-size: 13px; margin-bottom: 5px;">Total Payé</div>
                        <div style="font-size: 18px; font-weight: 700; color: #2ecc71;">
                            {{ number_format($client->invoices->sum(fn($i) => $i->payments->sum('amount')), 0, ',', ' ') }}
                            <small>FCFA</small></div>
                    </div>
                    <div
                        style="background: rgba(231, 76, 60, 0.05); padding: 20px; border-radius: 15px; border: 1px solid rgba(231, 76, 60, 0.1);">
                        <div style="color: var(--text-dim); font-size: 13px; margin-bottom: 5px;">Reste à payer</div>
                        <div style="font-size: 18px; font-weight: 700; color: #e74c3c;">
                            {{ number_format($client->invoices->sum('total_amount') - $client->invoices->sum(fn($i) => $i->payments->sum('amount')), 0, ',', ' ') }}
                            <small>FCFA</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pages.dashboard.dossiers._modal_create', ['clients' => \App\Models\Client::all()])
    @include('pages.dashboard.dossiers._modal_edit')
    @include('pages.dashboard.finances._modal_invoice', ['clients' => \App\Models\Client::all()])
    @include('pages.dashboard.finances._modal_edit_invoice')
    @include('pages.dashboard.finances._modal_payment', [
        'invoices' => $client->invoices->where('status', '!=', 'paid'),
        'accounts' => \App\Models\Account::all()
    ])

    <script>
        function switchTab(evt, tabName) {
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

        function openAddInvoiceWithClient(type, clientId) {
            const modal = document.getElementById('addInvoiceModal');
            modal.style.display = 'flex';
            const typeSelect = modal.querySelector('select[name="type"]');
            const clientSelect = modal.querySelector('select[name="client_id"]');
            if (typeSelect) typeSelect.value = type;
            if (clientSelect) clientSelect.value = clientId;
        }
    </script>
    <style>
        .status-en_cours {
            background: rgba(52, 152, 219, 0.1);
            color: #3498db;
            border: 1px solid rgba(52, 152, 219, 0.2);
        }

        .status-valide {
            background: rgba(46, 204, 113, 0.1);
            color: #2ecc71;
            border: 1px solid rgba(46, 204, 113, 0.2);
        }
    </style>
@endsection