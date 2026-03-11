@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>Documents</h1>
        <div style="display: flex; gap: 15px;">
            <button class="btn-gold" onclick="alert('Veuillez passer par un dossier pour ajouter un document spécifique.')">
                📎 Nouveau Document
            </button>
        </div>
    </header>

    <div class="premium-card" style="margin-bottom: 30px;">
        <form action="{{ route('dashboard.documents') }}" method="GET"
            style="display: flex; gap: 20px; align-items: flex-end;">
            <div style="flex: 1;">
                <label>Rechercher un document ou client</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom du fichier, client..."
                    style="margin-bottom: 0;">
            </div>
            <div style="width: 200px;">
                <label>Catégorie</label>
                <select name="category" onchange="this.form.submit()" style="margin-bottom: 0;">
                    <option value="">Toutes</option>
                    <option value="Admission" {{ request('category') == 'Admission' ? 'selected' : '' }}>Admission</option>
                    <option value="Visa" {{ request('category') == 'Visa' ? 'selected' : '' }}>Visa</option>
                    <option value="Logement" {{ request('category') == 'Logement' ? 'selected' : '' }}>Logement</option>
                    <option value="Identité" {{ request('category') == 'Identité' ? 'selected' : '' }}>Identité</option>
                    <option value="Paiement" {{ request('category') == 'Paiement' ? 'selected' : '' }}>Paiement</option>
                </select>
            </div>
            <button type="submit" class="nav-link" style="margin-bottom: 0; padding: 14px 25px;">🔍 Filtrer</button>
        </form>
    </div>

    <div class="premium-card" style="padding: 0; overflow: hidden;">
        <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
            <table>
                <thead>
                    <tr>
                        <th>Document</th>
                        <th>Client / Dossier</th>
                        <th>Catégorie</th>
                        <th>Date d'ajout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $doc)
                        <tr>
                            <td>
                                <div style="font-weight: 600; color: var(--gold);">📄 {{ $doc->display_name }}</div>
                            </td>
                            <td>
                                <div style="font-weight: 500;">
                                    {{ $doc->dossier->client->first_name }} {{ $doc->dossier->client->last_name }}
                                </div>
                                <div style="font-size: 12px; color: var(--text-dim);">
                                    Dossier: {{ str_replace('_', ' ', $doc->dossier->service_type) }}
                                </div>
                            </td>
                            <td>
                                <span class="badge" style="background: var(--glass-strong); color: var(--text-main);">
                                    {{ $doc->category }}
                                </span>
                            </td>
                            <td style="color: var(--text-dim);">
                                {{ $doc->created_at->format('d M, Y') }}
                            </td>
                            <td>
                                <div style="display: flex; gap: 8px;">
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn-small"
                                        style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); text-decoration: none;">👁️</a>
                                    <a href="{{ route('dashboard.dossiers.show', $doc->dossier_id) }}" class="btn-small"
                                        style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); text-decoration: none;">📂</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun document
                                trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div style="margin-top: 30px;">
        {{ $documents->links() }}
    </div>
@endsection