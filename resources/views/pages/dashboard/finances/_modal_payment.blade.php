<!-- Modal Enregistrer Paiement -->
<div id="addPaymentModal" class="modal">
    <div class="modal-content">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2>Enregistrer un Paiement</h2>
            <button onclick="document.getElementById('addPaymentModal').style.display='none'"
                style="background: none; border: none; color: var(--text-dim); cursor: pointer; font-size: 24px;">&times;</button>
        </div>
        <form action="{{ route('dashboard.finances.payments.store') }}" method="POST">
            @csrf

            <label>Facture Concernée</label>
            <select name="invoice_id" id="payment_invoice_id" required>
                @foreach($invoices as $invoice)
                    @if($invoice->status != 'paid')
                        <option value="{{ $invoice->id }}">
                            {{ $invoice->invoice_number }} - {{ $invoice->client->last_name }}
                            ({{ number_format($invoice->total_amount, 0, ',', ' ') }} FCFA)
                        </option>
                    @endif
                @endforeach
            </select>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Compte / Caisse</label>
                    <select name="account_id" required>
                        @foreach($accounts as $account)
                            <option value="{{ $account->id }}">{{ $account->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Montant du Paiement (FCFA)</label>
                    <input type="number" name="amount" placeholder="0" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Méthode de Paiement</label>
                    <select name="method" required>
                        <option value="Espèces">Espèces</option>
                        <option value="Orange Money">Orange Money</option>
                        <option value="Wave">Wave</option>
                        <option value="Virement">Virement</option>
                        <option value="Chèque">Chèque</option>
                    </select>
                </div>
                <div>
                    <label>Date du Paiement</label>
                    <input type="date" name="payment_date" value="{{ date('Y-m-d') }}" required>
                </div>
            </div>

            <label>Référence (Optionnel)</label>
            <input type="text" name="reference" placeholder="Ex: N° Transaction, N° Chèque">

            <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                <button type="button" class="nav-link" style="margin-bottom: 0;"
                    onclick="document.getElementById('addPaymentModal').style.display='none'">Annuler</button>
                <button type="submit" class="btn-gold">💰 Enregistrer</button>
            </div>
        </form>
    </div>
</div>