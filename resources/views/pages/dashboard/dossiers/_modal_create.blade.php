<!-- Modal Ajout Dossier (Partial) -->
<div id="addDossierModal" class="modal">
    <div class="modal-content">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2>Ouverture de Dossier</h2>
            <button onclick="document.getElementById('addDossierModal').style.display='none'"
                style="background: none; border: none; color: var(--text-dim); cursor: pointer; font-size: 24px;">&times;</button>
        </div>
        <form action="{{ route('dashboard.dossiers.store') }}" method="POST">
            @csrf
            @if(isset($client))
                <input type="hidden" name="client_id" value="{{ $client->id }}">
                <div
                    style="margin-bottom: 25px; padding: 15px; background: rgba(212, 175, 55, 0.05); border-radius: 10px; border: 1px solid rgba(212, 175, 55, 0.1);">
                    <div style="color: var(--text-dim); font-size: 12px; text-transform: uppercase;">Dossier pour</div>
                    <div style="color: var(--gold); font-weight: 600; font-size: 16px;">{{ $client->first_name }}
                        {{ $client->last_name }}</div>
                </div>
            @else
                <label>Sélectionner le Client</label>
                <select name="client_id" required>
                    <option value="">-- Choisir un client --</option>
                    @foreach($clients as $c)
                        <option value="{{ $c->id }}">{{ $c->first_name }} {{ $c->last_name }} ({{ $c->client_number }})</option>
                    @endforeach
                </select>
            @endif

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Type de Service</label>
                    <select name="service_type" required>
                        <option value="orientation">Orientation Scolaire</option>
                        <option value="admission">Admission Université</option>
                        <option value="visa">Accompagnement Visa</option>
                        <option value="logement">Recherche Logement</option>
                    </select>
                </div>
                <div>
                    <label>Pays de Destination</label>
                    <select name="target_country" required>
                        <option value="">-- Choisir un pays --</option>
                        <option value="France">France</option>
                        <option value="Canada">Canada</option>
                        <option value="Sénégal">Sénégal</option>
                        <option value="Maroc">Maroc</option>
                        <option value="Belgique">Belgique</option>
                        <option value="Suisse">Suisse</option>
                        <option value="USA">USA</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>
            </div>

            <label>Statut Initial</label>
            <select name="status" required>
                <option value="en_cours">En cours de traitement</option>
                <option value="valide">Dossier Validé</option>
            </select>

            <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                <button type="button" class="nav-link" style="margin-bottom: 0;"
                    onclick="document.getElementById('addDossierModal').style.display='none'">Annuler</button>
                <button type="submit" class="btn-gold">📁 Ouvrir le Dossier</button>
            </div>
        </form>
    </div>
</div>