<!-- Modal Modification Dossier -->
<div id="editDossierModal" class="modal">
    <div class="modal-content">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2>Modifier le Dossier</h2>
            <button onclick="document.getElementById('editDossierModal').style.display='none'"
                style="background: none; border: none; color: var(--text-dim); cursor: pointer; font-size: 24px;">&times;</button>
        </div>
        <form id="editDossierForm" method="POST">
            @csrf
            @method('PUT')

            <div
                style="margin-bottom: 25px; padding: 15px; background: rgba(212, 175, 55, 0.05); border-radius: 10px; border: 1px solid rgba(212, 175, 55, 0.1);">
                <div style="color: var(--text-dim); font-size: 12px; text-transform: uppercase;">Dossier pour</div>
                <div id="edit_client_name" style="color: var(--gold); font-weight: 600; font-size: 16px;">--</div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Type de Service</label>
                    <select name="service_type" id="edit_service_type" required>
                        <option value="orientation">Orientation Scolaire</option>
                        <option value="admission">Admission Université</option>
                        <option value="visa">Accompagnement Visa</option>
                        <option value="logement">Recherche Logement</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>
                <div>
                    <label>Pays de Destination</label>
                    <select name="target_country" id="edit_target_country" required>
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

            <label>Établissement (Optionnel)</label>
            <input type="text" name="institution" id="edit_institution" placeholder="Ex: Université de Lyon">

            <label>Statut</label>
            <select name="status" id="edit_status" required>
                <option value="en_cours">En cours de traitement</option>
                <option value="valide">Dossier Validé</option>
                <option value="refuse">Dossier Refusé</option>
                <option value="cloture">Dossier Clôturé</option>
            </select>

            <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                <button type="button" class="nav-link" style="margin-bottom: 0;"
                    onclick="document.getElementById('editDossierModal').style.display='none'">Annuler</button>
                <button type="submit" class="btn-gold">💾 Enregistrer les modifications</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditDossierModal(dossier) {
        const form = document.getElementById('editDossierForm');
        form.action = `/dashboard/dossiers/${dossier.id}`;

        document.getElementById('edit_client_name').innerText = dossier.client_name;
        document.getElementById('edit_service_type').value = dossier.service_type;
        document.getElementById('edit_target_country').value = dossier.target_country;
        document.getElementById('edit_status').value = dossier.status;
        document.getElementById('edit_institution').value = dossier.institution || '';

        document.getElementById('editDossierModal').style.display = 'flex';
    }
</script>