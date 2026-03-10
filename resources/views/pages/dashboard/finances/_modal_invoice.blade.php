<!-- Modal Créer Facture -->
<div id="addInvoiceModal" class="modal">
    <div class="modal-content">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2>Nouvelle Facture / Devis</h2>
            <button onclick="document.getElementById('addInvoiceModal').style.display='none'"
                style="background: none; border: none; color: var(--text-dim); cursor: pointer; font-size: 24px;">&times;</button>
        </div>
        <form action="{{ route('dashboard.finances.invoices.store') }}" method="POST">
            @csrf

            <label>Sélectionner le Client</label>
            <select name="client_id" required onchange="updateDossierList(this.value)">
                <option value="">-- Choisir un client --</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->first_name }} {{ $client->last_name }}</option>
                @endforeach
            </select>

            <label>Dossier associé (Optionnel)</label>
            <select name="dossier_id" id="invoice_dossier_id">
                <option value="">-- Aucun --</option>
            </select>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Type de Document</label>
                    <select name="type" required>
                        <option value="facture">Facture</option>
                        <option value="devis">Devis</option>
                    </select>
                </div>
                <div>
                    <label>Montant Total (FCFA)</label>
                    <input type="number" name="total_amount" placeholder="0" required>
                </div>
            </div>

            <label>Date d'échéance</label>
            <input type="date" name="due_date" value="{{ date('Y-m-d', strtotime('+30 days')) }}" required>

            <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                <button type="button" class="nav-link" style="margin-bottom: 0;"
                    onclick="document.getElementById('addInvoiceModal').style.display='none'">Annuler</button>
                <button type="submit" class="btn-gold">📑 Créer le document</button>
            </div>
        </form>
    </div>
</div>

<script>
    function updateDossierList(clientId) {
        // Simple client-side filtering for demo (ideally would be AJAX)
        const select = document.getElementById('invoice_dossier_id');
        select.innerHTML = '<option value="">-- Aucun --</option>';
        // Logic to populate dossiers based on clientId would go here
    }
</script>