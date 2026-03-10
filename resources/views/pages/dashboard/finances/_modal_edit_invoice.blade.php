<!-- Modal Modification Facture -->
<div id="editInvoiceModal" class="modal">
    <div class="modal-content">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2>Modifier le Document</h2>
            <button onclick="document.getElementById('editInvoiceModal').style.display='none'"
                style="background: none; border: none; color: var(--text-dim); cursor: pointer; font-size: 24px;">&times;</button>
        </div>
        <form id="editInvoiceForm" method="POST">
            @csrf
            @method('PUT')

            <div
                style="margin-bottom: 25px; padding: 15px; background: rgba(212, 175, 55, 0.05); border-radius: 10px; border: 1px solid rgba(212, 175, 55, 0.1);">
                <div style="color: var(--text-dim); font-size: 12px; text-transform: uppercase;">Référence</div>
                <div id="edit_invoice_number" style="color: var(--gold); font-weight: 600; font-size: 16px;">--</div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Type de Document</label>
                    <select name="type" id="edit_invoice_type" required>
                        <option value="facture">Facture</option>
                        <option value="devis">Devis</option>
                    </select>
                </div>
                <div>
                    <label>Montant Total (FCFA)</label>
                    <input type="number" name="total_amount" id="edit_invoice_amount" required>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div>
                    <label>Statut</label>
                    <select name="status" id="edit_invoice_status" required>
                        <option value="draft">Brouillon</option>
                        <option value="pending">En attente</option>
                        <option value="paid">Payée</option>
                        <option value="partial">Partiel</option>
                        <option value="cancelled">Annulée</option>
                    </select>
                </div>
                <div>
                    <label>Date d'échéance</label>
                    <input type="date" name="due_date" id="edit_invoice_due_date" required>
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 15px; margin-top: 20px;">
                <button type="button" class="nav-link" style="margin-bottom: 0;"
                    onclick="document.getElementById('editInvoiceModal').style.display='none'">Annuler</button>
                <button type="submit" class="btn-gold">💾 Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditInvoiceModal(invoice) {
        const form = document.getElementById('editInvoiceForm');
        form.action = `/dashboard/invoices/${invoice.id}`;

        document.getElementById('edit_invoice_number').innerText = invoice.invoice_number;
        document.getElementById('edit_invoice_type').value = invoice.type;
        document.getElementById('edit_invoice_amount').value = invoice.total_amount;
        document.getElementById('edit_invoice_status').value = invoice.status;
        document.getElementById('edit_invoice_due_date').value = invoice.due_date;

        document.getElementById('editInvoiceModal').style.display = 'flex';
    }
</script>