@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>Vue d'ensemble</h1>
        <div class="user-info">
            <span>Admin</span>
        </div>
    </header>

    <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px;">
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
            <div style="font-size: 32px; font-weight: 700; color: var(--gold);">{{ number_format($stats['total_invoices'], 0, ',', ' ') }} <small style="font-size: 14px; opacity: 0.7;">FCFA</small></div>
        </div>
    </div>

    <div class="premium-card" style="padding: 0; overflow: hidden;">
        <div style="padding: 30px; border-bottom: 1px solid var(--glass-border); display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-size: 20px; font-weight: 600;">Paiements Récents</h2>
            <a href="{{ route('dashboard.finances.index') }}" style="color: var(--gold); text-decoration: none; font-size: 14px; font-weight: 500;">Voir tout →</a>
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
                                <div style="font-weight: 500;">{{ $payment->invoice->client->first_name }} {{ $payment->invoice->client->last_name }}</div>
                                <div style="font-size: 12px; color: var(--text-dim);">{{ $payment->invoice->invoice_number }}</div>
                            </td>
                            <td style="font-weight: 600; color: var(--gold);">{{ number_format($payment->amount, 0, ',', ' ') }} FCFA</td>
                            <td>
                                <span class="badge" style="background: var(--glass-strong); color: var(--text-main);">
                                    {{ $payment->method }}
                                </span>
                            </td>
                            <td style="color: var(--text-dim);">{{ \Carbon\Carbon::parse($payment->payment_date)->format('d M, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun paiement récent</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection