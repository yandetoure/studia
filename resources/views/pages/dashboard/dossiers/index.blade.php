@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>Gestion des Dossiers</h1>
        <button class="btn-gold" onclick="document.getElementById('addDossierModal').style.display='flex'">+ Nouveau
            Dossier</button>
    </header>

    <div class="premium-card" style="padding: 0; overflow: hidden;">
        <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
            <table>
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Service & Destination</th>
                        <th>Statut</th>
                        <th>Date Création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dossiers as $dossier)
                        <tr>
                            <td>
                                <div style="font-weight: 600; font-size: 15px;">{{ $dossier->client->first_name }} {{ $dossier->client->last_name }}</div>
                                <div style="font-size: 12px; color: var(--text-dim);">{{ $dossier->client->client_number }}</div>
                            </td>
                            <td>
                                <div style="font-weight: 500; text-transform: capitalize;">{{ str_replace('_', ' ', $dossier->service_type) }}</div>
                                <div style="font-size: 13px; color: var(--gold);">📍 {{ $dossier->target_country }}</div>
                            </td>
                            <td>
                                <span class="badge status-{{ $dossier->status }}">
                                    @if($dossier->status == 'en_cours') 🔄 @elseif($dossier->status == 'valide') ✅ @else ⏹ @endif
                                    {{ str_replace('_', ' ', $dossier->status) }}
                                </span>
                            </td>
                            <td style="color: var(--text-dim);">{{ \Carbon\Carbon::parse($dossier->created_at)->format('d M, Y') }}</td>
                            <td>
                                <div style="display: flex; gap: 8px;">
                                    <a href="{{ route('dashboard.clients.show', $dossier->client_id) }}" class="btn-small" 
                                        style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); transition: 0.3s; color: var(--text-main); text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">👁️</a>
                                    <button onclick="openEditDossierModal({
                                        id: {{ $dossier->id }},
                                        client_name: '{{ $dossier->client->first_name }} {{ $dossier->client->last_name }}',
                                        service_type: '{{ $dossier->service_type }}',
                                        target_country: '{{ $dossier->target_country }}',
                                        status: '{{ $dossier->status }}',
                                        institution: '{{ $dossier->institution }}'
                                    })" class="btn-small" 
                                        style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); transition: 0.3s; color: var(--text-main);">✏️</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun dossier trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($dossiers->hasPages())
        <div style="margin-top: 30px;">
            {{ $dossiers->links() }}
        </div>
    @endif

    @include('pages.dashboard.dossiers._modal_create', ['clients' => $clients])
    @include('pages.dashboard.dossiers._modal_edit')

    <style>
        .status-en_cours { background: rgba(52, 152, 219, 0.1); color: #3498db; border: 1px solid rgba(52, 152, 219, 0.2); }
        .status-valide { background: rgba(46, 204, 113, 0.1); color: #2ecc71; border: 1px solid rgba(46, 204, 113, 0.2); }
        .status-refuse { background: rgba(231, 76, 60, 0.1); color: #e74c3c; border: 1px solid rgba(231, 76, 60, 0.2); }
        .status-cloture { background: rgba(149, 165, 166, 0.1); color: #95a5a6; border: 1px solid rgba(149, 165, 166, 0.2); }
    </style>
@endsection