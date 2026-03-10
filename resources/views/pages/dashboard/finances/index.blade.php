@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>Finances</h1>
    </header>

    <div class="stats-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">
        @foreach($accounts as $account)
            <div class="premium-card">
                <div style="color: var(--text-dim); font-size: 14px; margin-bottom: 8px;">{{ $account->name }}</div>
                <div style="font-size: 24px; color: var(--gold); font-weight: 700;">
                    {{ number_format($account->balance, 0, ',', ' ') }} <small style="font-size: 12px; opacity: 0.7;">FCFA</small>
                </div>
            </div>
        @endforeach
    </div>

    <div class="premium-card" style="padding: 0; overflow: hidden;">
        <div style="padding: 30px; border-bottom: 1px solid var(--glass-border);">
            <h2 style="font-size: 20px; font-weight: 600;">Factures Récentes</h2>
        </div>
        <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
            <table>
                <thead>
                    <tr>
                        <th>N° Facture</th>
                        <th>Client</th>
                        <th>Montant</th>
                        <th>Statut</th>
                        <th>Date d'échéance</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $invoice)
                        <tr>
                            <td style="font-family: monospace; font-size: 13px;">{{ $invoice->invoice_number }}</td>
                            <td style="font-weight: 500;">{{ $invoice->client->first_name }} {{ $invoice->client->last_name }}</td>
                            <td style="font-weight: 600; color: var(--gold);">{{ number_format($invoice->total_amount, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <span class="badge status-{{ $invoice->status }}">
                                    @if($invoice->status == 'paid') ✓ @elseif($invoice->status == 'pending') ⌛ @else ◒ @endif
                                    {{ $invoice->status }}
                                </span>
                            </td>
                            <td style="color: var(--text-dim);">{{ \Carbon\Carbon::parse($invoice->due_date)->format('d M, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucune facture trouvée</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($invoices->hasPages())
        <div style="margin-top: 30px;">
            {{ $invoices->links() }}
        </div>
    @endif

    <style>
        .status-paid { background: rgba(46, 204, 113, 0.1); color: #2ecc71; border: 1px solid rgba(46, 204, 113, 0.2); }
        .status-pending { background: rgba(241, 196, 15, 0.1); color: #f1c40f; border: 1px solid rgba(241, 196, 15, 0.2); }
        .status-partial { background: rgba(230, 126, 34, 0.1); color: #e67e22; border: 1px solid rgba(230, 126, 34, 0.2); }
        .status-cancelled { background: rgba(231, 76, 60, 0.1); color: #e74c3c; border: 1px solid rgba(231, 76, 60, 0.2); }
    </style>
@endsection