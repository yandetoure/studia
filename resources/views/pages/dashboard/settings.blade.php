@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>Paramètres Système</h1>
    </header>

    <div style="display: grid; grid-template-columns: 1fr 350px; gap: 40px;">
        <div style="display: flex; flex-direction: column; gap: 40px;">
            <!-- Accounts Management -->
            <div class="premium-card" style="padding: 0; overflow: hidden;">
                <div
                    style="padding: 30px; border-bottom: 1px solid var(--glass-border); display: flex; justify-content: space-between; align-items: center;">
                    <h2 style="font-size: 20px; font-weight: 600;">Comptes & Caisses</h2>
                    <button class="btn-gold" style="padding: 8px 20px; font-size: 14px; height: auto;">+ Nouveau
                        Compte</button>
                </div>
                <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
                    <table>
                        <thead>
                            <tr>
                                <th>Nom du Compte</th>
                                <th>Type</th>
                                <th>Solde Actuel</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($accounts as $account)
                                <tr>
                                    <td style="font-weight: 600; color: var(--gold);">{{ $account->name }}</td>
                                    <td style="text-transform: capitalize;">{{ $account->type }}</td>
                                    <td style="font-weight: 700;">{{ number_format($account->balance, 0, ',', ' ') }} FCFA</td>
                                    <td>
                                        <button class="btn-small"
                                            style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border);">✏️</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="text-align: center; padding: 40px; color: var(--text-dim);">Aucun
                                        compte configuré</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Profile / Info -->
            <div class="premium-card">
                <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 25px;">Informations de l'Agence</h2>
                <form action="#" method="POST" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label>Nom de l'agence</label>
                        <input type="text" value="STUDIA" readonly>
                    </div>
                    <div>
                        <label>Email de contact</label>
                        <input type="email" value="contact@studia-edu.com" readonly>
                    </div>
                    <div>
                        <label>Téléphone</label>
                        <input type="text" value="+221 ..." readonly>
                    </div>
                    <div>
                        <label>Adresse</label>
                        <input type="text" value="Dakar, Sénégal" readonly>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar Stats -->
        <div style="display: flex; flex-direction: column; gap: 30px;">
            <div class="premium-card" style="text-align: center;">
                <div style="color: var(--text-dim); font-size: 14px; margin-bottom: 10px;">Documents Stockés</div>
                <div style="font-size: 32px; font-weight: 700; color: var(--gold);">{{ $stats['total_documents'] }}</div>
            </div>
            <div class="premium-card" style="text-align: center;">
                <div style="color: var(--text-dim); font-size: 14px; margin-bottom: 10px;">Notes Internes</div>
                <div style="font-size: 32px; font-weight: 700; color: var(--gold);">{{ $stats['total_notes'] }}</div>
            </div>

            <div class="premium-card">
                <h3 style="font-size: 16px; margin-bottom: 15px; color: var(--gold);">Version du Système</h3>
                <p style="font-size: 14px; color: var(--text-dim);">V 2.1.0 Premium Beta</p>
                <p style="font-size: 12px; color: var(--text-dim); margin-top: 10px;">Dernière mise à jour: Aujourd'hui</p>
            </div>
        </div>
    </div>
@endsection