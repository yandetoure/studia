@extends('layouts.dashboard')

@section('content')
    <header>
        <h1>Gestion des Clients</h1>
        <button class="btn-gold" onclick="document.getElementById('addClientModal').style.display='flex'">+ Nouveau
            Client</button>
    </header>

    <div class="premium-card" style="padding: 0; overflow: hidden;">
        <div class="table-container" style="margin-top: 0; border: none; border-radius: 0;">
            <table>
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Client</th>
                        <th>Contact</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clients as $client)
                        <tr>
                            <td style="font-family: monospace; font-size: 13px; color: var(--gold);">
                                {{ $client->client_number }}
                            </td>
                            <td>
                                <div style="font-weight: 600; font-size: 16px;">{{ $client->first_name }}
                                    {{ $client->last_name }}
                                </div>
                                <div style="font-size: 12px; color: var(--text-dim);">Dakar, Sénégal</div>
                            </td>
                            <td>
                                <div style="font-size: 14px;">{{ $client->email }}</div>
                                <div style="font-size: 13px; color: var(--text-dim);">{{ $client->phone }}</div>
                            </td>
                            <td>
                                <span class="badge"
                                    style="background: var(--gold-soft); color: var(--gold); border: 1px solid rgba(212, 175, 55, 0.2);">
                                    {{ $client->status }}
                                </span>
                            </td>
                            <td>
                                <div style="display: flex; gap: 8px;">
                                    <a href="{{ route('dashboard.clients.show', $client->id) }}" class="btn-small"
                                        style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); transition: 0.3s; color: var(--text-main); text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">👁️</a>
                                    <button class="btn-small"
                                        style="background: var(--glass); padding: 8px; border-radius: 8px; border: 1px solid var(--glass-border); transition: 0.3s; color: var(--text-main);">✏️</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 50px;">Aucun client
                                trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($clients->hasPages())
        <div style="margin-top: 30px;">
            {{ $clients->links() }}
        </div>
    @endif

    <!-- Modal Ajout Client -->
    <div id="addClientModal" class="modal">
        <div class="modal-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h2>Nouveau Client</h2>
                <button onclick="document.getElementById('addClientModal').style.display='none'"
                    style="background: none; border: none; color: var(--text-dim); cursor: pointer; font-size: 24px;">&times;</button>
            </div>
            <form action="{{ route('dashboard.clients.store') }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label>Prénom</label>
                        <input type="text" name="first_name" placeholder="Ex: Jean" required>
                    </div>
                    <div>
                        <label>Nom</label>
                        <input type="text" name="last_name" placeholder="Ex: Dupont" required>
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" placeholder="jean.dupont@email.com">
                    </div>
                    <div>
                        <label>Téléphone</label>
                        <input type="text" name="phone" placeholder="+221 ..." required>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label>Genre</label>
                        <select name="gender" required>
                            <option value="M">Masculin</option>
                            <option value="F">Féminin</option>
                        </select>
                    </div>
                    <div>
                        <label>Date de Naissance</label>
                        <input type="date" name="birth_date" required>
                    </div>
                </div>

                <label>Nationalité</label>
                <input type="text" name="nationality" value="Sénégalaise" required>

                <label>Adresse</label>
                <textarea name="address" placeholder="Dakar, Plateau..." required></textarea>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div>
                        <label>Statut</label>
                        <select name="status" required>
                            <option value="eleve">Élève</option>
                            <option value="etudiant">Étudiant</option>
                            <option value="professionnel">Professionnel</option>
                        </select>
                    </div>
                    <div>
                        <label>Niveau d'études</label>
                        <input type="text" name="education_level" placeholder="Ex: Master 2" required>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                    <button type="button" class="nav-link" style="margin-bottom: 0;"
                        onclick="document.getElementById('addClientModal').style.display='none'">Annuler</button>
                    <button type="submit" class="btn-gold">🚀 Créer le Client</button>
                </div>
            </form>
        </div>
    </div>
@endsection