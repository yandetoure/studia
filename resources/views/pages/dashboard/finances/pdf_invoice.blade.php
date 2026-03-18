<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture {{ $invoice->invoice_number }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; margin: 0; padding: 20px; font-size: 14px; }
        .header { width: 100%; margin-bottom: 40px; }
        .header td { vertical-align: top; }
        .logo { max-width: 150px; }
        .company-info { text-align: right; color: #555; }
        .invoice-title { font-size: 28px; font-weight: bold; color: #d4af37; margin-bottom: 5px; text-transform: uppercase; }
        .invoice-meta { margin-bottom: 40px; width: 100%; border-collapse: collapse; }
        .invoice-meta td { vertical-align: top; width: 50%; }
        .box { border: 1px solid #eee; padding: 15px; border-radius: 5px; background: #fafafa; }
        .box h3 { margin-top: 0; color: #444; font-size: 16px; border-bottom: 1px solid #ddd; padding-bottom: 8px; margin-bottom: 10px; }
        table.items { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        table.items th { background: #d4af37; color: white; padding: 10px; text-align: left; }
        table.items td { padding: 10px; border-bottom: 1px solid #eee; }
        table.items tr:last-child td { border-bottom: none; }
        .totals { width: 40%; margin-left: auto; border-collapse: collapse; }
        .totals td { padding: 8px; text-align: right; }
        .totals .total-row { font-weight: bold; font-size: 18px; color: #000; border-top: 2px solid #333; }
        .footer { margin-top: 60px; text-align: center; color: #888; font-size: 12px; border-top: 1px solid #eee; padding-top: 20px; }
        .status-badge { display: inline-block; padding: 5px 10px; border-radius: 3px; font-weight: bold; font-size: 12px; text-transform: uppercase; }
        .status-paid { background: #d4edda; color: #155724; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-partial { background: #cce5ff; color: #004085; }
        .status-draft { background: #e2e3e5; color: #383d41; }
    </style>
</head>
<body>

    <table class="header">
        <tr>
            <td>
                <!-- Fallback Base64 Logo or direct public path if accessible -->
                <!-- <img src="{{ public_path('images/logo.png') }}" alt="STUDIA" class="logo"> -->
                <h1 style="color: #d4af37; margin:0; font-size: 36px; letter-spacing: -1px;">STUDIA.</h1>
            </td>
            <td class="company-info">
                <strong>Cabinet STUDIA</strong><br>
                Adresse complète de Studia<br>
                contact@studia.com<br>
                +221 00 000 00 00<br>
                NINEA: XXXXXXXX
            </td>
        </tr>
    </table>

    <table class="invoice-meta">
        <tr>
            <td style="padding-right: 15px;">
                <div class="invoice-title">{{ $invoice->type == 'devis' ? 'Devis' : 'Facture' }}</div>
                <p style="margin: 0; color: #777;">
                    N° : <strong>{{ $invoice->invoice_number }}</strong><br>
                    Date d'émission : {{ $invoice->created_at->format('d/m/Y') }}<br>
                    Date d'échéance : {{ \Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y') }}<br>
                    <br>
                    Statut : 
                    @php
                        $statusClass = [
                            'paid' => 'status-paid',
                            'pending' => 'status-pending',
                            'partial' => 'status-partial',
                            'draft' => 'status-draft',
                            'cancelled' => 'status-draft'
                        ][$invoice->status] ?? 'status-draft';
                        $statusText = [
                            'paid' => 'Payée',
                            'pending' => 'En attente',
                            'partial' => 'Partielle',
                            'draft' => 'Brouillon',
                            'cancelled' => 'Annulée'
                        ][$invoice->status] ?? ucfirst($invoice->status);
                    @endphp
                    <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                </p>
            </td>
            <td style="padding-left: 15px;">
                <div class="box">
                    <h3>Facturé à</h3>
                    <strong>{{ optional($invoice->client)->first_name ?? 'Client' }} {{ optional($invoice->client)->last_name ?? 'Inconnu' }}</strong><br>
                    {{ optional($invoice->client)->address ?? 'Adresse non spécifiée' }}<br>
                    {{ optional($invoice->client)->email ?? 'Email non spécifié' }}<br>
                    {{ optional($invoice->client)->phone ?? 'Téléphone non spécifié' }}
                </div>
            </td>
        </tr>
    </table>

    <table class="items">
        <thead>
            <tr>
                <th>Description</th>
                <th style="text-align: right;">Montant</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>Prestation de services STUDIA</strong><br>
                    <span style="color: #666; font-size: 12px;">
                        @if($invoice->dossier)
                            Dossier {{ ucfirst(str_replace('_', ' ', $invoice->dossier->service_type)) }} - {{ $invoice->dossier->target_country }}
                        @else
                            Service général
                        @endif
                    </span>
                </td>
                <td style="text-align: right;">{{ number_format($invoice->total_amount, 0, ',', ' ') }} FCFA</td>
            </tr>
        </tbody>
    </table>

    <table class="totals">
        <tr>
            <td>Sous-total :</td>
            <td>{{ number_format($invoice->total_amount, 0, ',', ' ') }} FCFA</td>
        </tr>
        <tr>
            <td>TVA (0%) :</td>
            <td>0 FCFA</td>
        </tr>
        @if($invoice->type == 'facture' && optional($invoice)->paid_amount > 0)
        <tr>
            <td>Montant payé :</td>
            <td style="color: #28a745;">- {{ number_format(optional($invoice)->paid_amount ?? 0, 0, ',', ' ') }} FCFA</td>
        </tr>
        @endif
        <tr class="total-row">
            <td>NET À PAYER :</td>
            <td>{{ number_format(optional($invoice)->remaining_amount ?? $invoice->total_amount, 0, ',', ' ') }} FCFA</td>
        </tr>
    </table>

    <div class="footer">
        Ouvrir le Monde, Guider l'Avenir. <br>
        Merci de votre confiance. <br>
        Les paiements peuvent être effectués en espèces, par Mobile Money ou Virement Bancaire.
    </div>

</body>
</html>
