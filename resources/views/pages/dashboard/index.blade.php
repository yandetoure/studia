@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>Vue d'ensemble</h1>
        <div class="user-info">
            <span>Admin</span>
        </div>
    </header>

    <div class="stats-grid"
        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px;">
        <div class="premium-card">
            <div style="color: var(--text-dim); font-size: 14px; margin-bottom: 10px;">Total Clients</div>
            <div style="font-size: 32px; font-weight: 700; color: var(--gold);">{{ $stats['total_clients'] }}</div>
        </div>
        <div class="premium-card">
            <div style="color: var(--text-dim); font-size: 14px; margin-bottom: 10px;">Dossiers Actifs</div>
            <div style="font-size: 32px; font-weight: 700; color: var(--gold);">{{ $stats['active_dossiers'] }}</div>
        </div>
        <div class="premium-card">
            <div style="color: var(--text-dim); font-size: 14px; margin-bottom: 10px;">Chiffre d'affaires</div>
            <div style="font-size: 32px; font-weight: 700; color: var(--gold);">
                {{ number_format($stats['total_invoices'], 0, ',', ' ') }} <small
                    style="font-size: 14px; opacity: 0.7;">FCFA</small>
            </div>
        </div>
    </div>

    <div class="premium-card" style="padding: 0; overflow: hidden;">
        <div
            style="padding: 30px; border-bottom: 1px solid var(--glass-border); display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 20px; font-weight: 600;">Paiements Récents</h2>
            <a href="{{ route('dashboard.finances.index') }}"
                style="color: var(--gold); text-decoration: none; font-size: 14px; font-weight: 500;">Voir tout →</a>
        </div>
        <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Montant</th>
                        <th>Méthode</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stats['recent_payments'] as $payment)
                        <tr>
                            <td>
                                <div style="font-weight: 500;">
                                    <a href="{{ route('dashboard.clients.show', $payment->invoice->client_id) }}"
                                        style="color: var(--text-main); text-decoration: none;">
                                        {{ $payment->invoice->client->first_name }} {{ $payment->invoice->client->last_name }}
                                    </a>
                                </div>
                                <div style="font-size: 12px; color: var(--text-dim);">{{ $payment->invoice->invoice_number }}
                                </div>
                            </td>
                            <td style="font-weight: 600; color: var(--gold);">{{ number_format($payment->amount, 0, ',', ' ') }}
                                FCFA</td>
                            <td>
                                <span class="badge" style="background: var(--glass-strong); color: var(--text-main);">
                                    {{ $payment->method }}
                                </span>
                            </td>
                            <td style="color: var(--text-dim);">
                                {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M, Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun paiement
                                récent</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="premium-card" style="padding: 0; overflow: hidden; margin-top: 40px;">
        <div
            style="padding: 30px; border-bottom: 1px solid var(--glass-border); display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 15px;">
                <h2 style="font-size: 20px; font-weight: 600;">Factures & Devis Récents</h2>
                <button onclick="document.getElementById('addInvoiceModal').style.display='flex'" class="btn-gold" style="padding: 5px 15px; font-size: 12px; height: auto;">
                    + Nouveau
                </button>
            </div>
            <a href="{{ route('dashboard.finances.index') }}"
                style="color: var(--gold); text-decoration: none; font-size: 14px; font-weight: 500;">Voir tout →</a>
        </div>
        <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
            <table>
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Client</th>
                        <th>Type</th>
                        <th>Montant</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stats['recent_invoices'] as $invoice)
                        <tr>
                            <td style="font-weight: 600; color: var(--gold);">{{ $invoice->invoice_number }}</td>
                            <td>
                                <a href="{{ route('dashboard.clients.show', $invoice->client_id) }}"
                                    style="color: var(--text-main); text-decoration: none; font-weight: 500;">
                                    {{ optional($invoice->client)->first_name }} {{ optional($invoice->client)->last_name }}
                                </a>
                            </td>
                            <td>
                                <span class="badge"
                                    style="background: var(--glass-strong); color: var(--text-main); text-transform: capitalize;">
                                    {{ $invoice->type }}
                                </span>
                            </td>
                            <td style="font-weight: 600;">{{ number_format($invoice->total_amount, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <div style="display: flex; gap: 8px;">
                                    <button onclick="openEditInvoiceModal({
                                                        id: {{ $invoice->id }},
                                                        invoice_number: '{{ $invoice->invoice_number }}',
                                                        type: '{{ $invoice->type }}',
                                                        total_amount: {{ $invoice->total_amount }},
                                                        status: '{{ $invoice->status }}',
                                                        due_date: '{{ json_encode($invoice->due_date) }}'
                                                    })" class="btn-small"
                                        style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); color: var(--text-main);">✏️</button>

                                    <form action="{{ route('dashboard.finances.invoices.destroy', $invoice->id) }}"
                                        method="POST" onsubmit="return confirm('Supprimer ce document ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-small"
                                            style="background: rgba(231, 76, 60, 0.1); padding: 8px; border-radius: 8px; border: 1px solid rgba(231, 76, 60, 0.2); color: #e74c3c;">🗑️</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun document
                                récent</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @include('pages.dashboard.finances._modal_invoice', ['clients' => \App\Models\Client::all()])
    @include('pages.dashboard.finances._modal_edit_invoice')
    @include('pages.dashboard.finances._modal_payment', [
        'invoices' => \App\Models\Invoice::with('client')->where('status', '!=', 'paid')->get(),
        'accounts' => \App\Models\Account::all()
    ])
@endsection