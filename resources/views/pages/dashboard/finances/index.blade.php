@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>
            @if(request()->routeIs('dashboard.finances.invoices')) Gestion des Factures
            @elseif(request()->routeIs('dashboard.finances.devis')) Gestion des Devis
            @else Finances & Trésorerie
            @endif
        </h1>
        <div style="display: flex; gap: 15px;">
            <button class="nav-link"
                style="margin-bottom: 0; background: var(--glass); border: 1px solid var(--glass-border);"
                onclick="document.getElementById('addInvoiceModal').style.display='flex'">+ Nouveau Devis/Facture</button>
            <button class="btn-gold" onclick="document.getElementById('addPaymentModal').style.display='flex'">💰
                Enregistrer un Paiement</button>
        </div>
    </header>

    @if(request()->routeIs('dashboard.finances.index'))
    <div class="stats-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">
        @foreach($accounts as $account)
            <div class="premium-card">
                <div style="color: var(--text-dim); font-size: 14px; margin-bottom: 8px;">{{ $account->name }}</div>
                <div style="font-size: 24px; color: var(--gold); font-weight: 700;">
                    {{ number_format($account->balance, 0, ',', ' ') }} <small
                        style="font-size: 12px; opacity: 0.7;">FCFA</small>
                </div>
            </div>
        @endforeach
    </div>
    @endif

    <form action="{{ url()->current() }}" method="GET" style="margin-bottom: 30px; display: flex; gap: 15px; align-items: flex-end;">
        <div style="flex: 1;">
            <label style="display: block; color: var(--text-dim); font-size: 13px; margin-bottom: 8px;">Recherche</label>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, N° document..." 
                style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
        </div>

        @if(isset($invoices))
        <div style="width: 200px;">
            <label style="display: block; color: var(--text-dim); font-size: 13px; margin-bottom: 8px;">Statut</label>
            <select name="status" onchange="this.form.submit()" 
                style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
                <option value="">Tous les statuts</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="partial" {{ request('status') == 'partial' ? 'selected' : '' }}>Partiel</option>
                <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Payée</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Annulée</option>
            </select>
        </div>
        @else
        <div style="width: 200px;">
            <label style="display: block; color: var(--text-dim); font-size: 13px; margin-bottom: 8px;">Méthode</label>
            <select name="method" onchange="this.form.submit()" 
                style="width: 100%; background: var(--glass); border: 1px solid var(--glass-border); padding: 12px 15px; border-radius: 12px; color: var(--text-main); font-family: inherit;">
                <option value="">Toutes les méthodes</option>
                <option value="Espèces" {{ request('method') == 'Espèces' ? 'selected' : '' }}>Espèces</option>
                <option value="Virement" {{ request('method') == 'Virement' ? 'selected' : '' }}>Virement</option>
                <option value="Chèque" {{ request('method') == 'Chèque' ? 'selected' : '' }}>Chèque</option>
                <option value="Mobile Money" {{ request('method') == 'Mobile Money' ? 'selected' : '' }}>Mobile Money</option>
            </select>
        </div>
        @endif

        <button type="submit" class="btn-gold" style="padding: 12px 25px; border-radius: 12px;">🔍 Filtrer</button>
        @if(request()->anyFilled(['search', 'status', 'method']))
            <a href="{{ url()->current() }}" class="nav-link" style="margin-bottom: 0; padding: 12px 20px; background: rgba(255,255,255,0.05); border: 1px solid var(--glass-border); border-radius: 12px; text-decoration: none; color: var(--text-dim); font-size: 13px;">Réinitialiser</a>
        @endif
    </form>

    <div class="premium-card" style="padding: 0; overflow: hidden;">
        <div
            style="padding: 30px; border-bottom: 1px solid var(--glass-border); display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 20px; font-weight: 600;">
                @if(isset($invoices)) Liste des {{ request()->routeIs('dashboard.finances.devis') ? 'Devis' : 'Factures' }}
                @else Historique des Paiements
                @endif
            </h2>
            <div style="font-size: 13px; color: var(--text-dim);">Dernières transactions</div>
        </div>
        <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
            <table>
                <thead>
                    @if(isset($invoices))
                    <tr>
                        <th>N° Document</th>
                        <th>Client</th>
                        <th>Total</th>
                        <th>Payé</th>
                        <th>Reste</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                    @else
                    <tr>
                        <th>Client</th>
                        <th>N° Facture</th>
                        <th>Montant</th>
                        <th>Méthode</th>
                        <th>Compte</th>
                        <th>Date</th>
                    </tr>
                    @endif
                </thead>
                <tbody>
                    @if(isset($invoices))
                        @forelse($invoices as $invoice)
                            <tr>
                                <td style="font-family: monospace; font-size: 13px; color: var(--gold);">
                                    {{ $invoice->invoice_number }}
                                </td>
                                <td style="font-weight: 500;">
                                    <a href="{{ route('dashboard.clients.show', $invoice->client_id) }}"
                                        style="color: var(--text-main); text-decoration: none;">
                                        {{ optional($invoice->client)->first_name }} {{ optional($invoice->client)->last_name }}
                                    </a>
                                </td>
                                <td style="font-weight: 600;">{{ number_format($invoice->total_amount, 0, ',', ' ') }}</td>
                                <td style="color: #2ecc71;">{{ number_format($invoice->paid_amount, 0, ',', ' ') }}</td>
                                <td style="color: {{ $invoice->remaining_amount > 0 ? '#e74c3c' : 'var(--text-dim)' }};">
                                    {{ number_format($invoice->remaining_amount, 0, ',', ' ') }}</td>
                                <td>
                                    <span class="badge status-{{ $invoice->status }}">
                                        {{ str_replace('paid', 'Payée', str_replace('pending', 'En attente', str_replace('partial', 'Partiel', $invoice->status))) }}
                                    </span>
                                </td>
                                <td>
                                    <div style="display: flex; gap: 8px;">
                                        <button onclick="openEditInvoiceModal({
                                            id: {{ $invoice->id }},
                                            invoice_number: '{{ $invoice->invoice_number }}',
                                            type: '{{ $invoice->type }}',
                                            total_amount: {{ $invoice->total_amount }},
                                            status: '{{ $invoice->status }}',
                                            due_date: '{{ $invoice->due_date }}'
                                        })" class="btn-small" style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); color: var(--text-main);">✏️</button>
                                        <form action="{{ route('dashboard.finances.invoices.destroy', $invoice->id) }}" method="POST" onsubmit="return confirm('Supprimer ?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn-small" style="background: rgba(231, 76, 60, 0.1); padding: 8px; border-radius: 8px; border: 1px solid rgba(231, 76, 60, 0.2); color: #e74c3c;">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun document trouvé</td></tr>
                        @endforelse
                    @else
                        @forelse($payments as $payment)
                            <tr>
                                <td>{{ optional($payment->invoice->client)->first_name }} {{ optional($payment->invoice->client)->last_name }}</td>
                                <td style="color: var(--gold);">{{ $payment->invoice->invoice_number }}</td>
                                <td style="font-weight: 600;">{{ number_format($payment->amount, 0, ',', ' ') }} FCFA</td>
                                <td><span class="badge" style="background: var(--glass-strong);">{{ $payment->method }}</span></td>
                                <td>{{ optional($payment->account)->name }}</td>
                                <td style="color: var(--text-dim);">{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun paiement trouvé</td></tr>
                        @endforelse
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 30px;">
        {{ isset($invoices) ? $invoices->links() : $payments->links() }}
    </div>

    @include('pages.dashboard.finances._modal_invoice', ['clients' => \App\Models\Client::all()])
    @include('pages.dashboard.finances._modal_edit_invoice')
    @include('pages.dashboard.finances._modal_payment', [
        'invoices' => isset($invoices) ? $invoices : \App\Models\Invoice::where('status', '!=', 'paid')->get(),
        'accounts' => $accounts
    ])

    <style>
        .status-paid { background: rgba(46, 204, 113, 0.1); color: #2ecc71; border: 1px solid rgba(46, 204, 113, 0.2); }
        .status-pending { background: rgba(241, 196, 15, 0.1); color: #f1c40f; border: 1px solid rgba(241, 196, 15, 0.2); }
        .status-partial { background: rgba(230, 126, 34, 0.1); color: #e67e22; border: 1px solid rgba(230, 126, 34, 0.2); }
        .status-cancelled { background: rgba(231, 76, 60, 0.1); color: #e74c3c; border: 1px solid rgba(231, 76, 60, 0.2); }
    </style>
@endsection