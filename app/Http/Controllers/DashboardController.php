<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Dossier;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Account;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_clients' => Client::count(),
            'active_dossiers' => Dossier::where('status', 'en_cours')->count(),
            'total_invoices' => Invoice::where('type', 'facture')->sum('total_amount'),
            'recent_payments' => Payment::with('invoice.client')->latest()->limit(5)->get(),
            'recent_invoices' => Invoice::with('client')->latest()->limit(5)->get(),
        ];

        return view('pages.dashboard.index', compact('stats'));
    }

    public function clients(Request $request)
    {
        $query = Client::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('client_number', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $clients = $query->latest()->paginate(10)->withQueryString();
        return view('pages.dashboard.clients.index', compact('clients'));
    }

    public function storeClient(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:M,F',
            'birth_date' => 'required|date',
            'nationality' => 'required|string|max:255',
            'address' => 'required|string',
            'status' => 'required|in:eleve,etudiant,professionnel',
            'education_level' => 'required|string|max:255',
        ]);

        $validated['client_number'] = 'CLT-' . strtoupper(uniqid());
        $validated['user_id'] = auth()->id() ?? 1; // Fallback to 1 if not logged in (for dev)

        Client::create($validated);

        return redirect()->back()->with('success', 'Client créé avec succès.');
    }

    public function dossiers(Request $request)
    {
        $query = Dossier::with('client');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('client', function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('service_type')) {
            $query->where('service_type', $request->service_type);
        }

        $dossiers = $query->latest()->paginate(10)->withQueryString();
        $clients = Client::all();
        return view('pages.dashboard.dossiers.index', compact('dossiers', 'clients'));
    }

    public function storeDossier(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'service_type' => 'required|string',
            'target_country' => 'required|string',
            'status' => 'required|in:en_cours,valide,refuse,cloture',
        ]);

        $validated['user_id'] = auth()->id() ?? 1;

        Dossier::create($validated);

        return redirect()->back()->with('success', 'Dossier créé avec succès.');
    }

    public function finances(Request $request)
    {
        $accounts = Account::all();
        $query = Payment::with(['invoice.client']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('invoice.client', function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            })->orWhereHas('invoice', function ($q) use ($search) {
                $q->where('invoice_number', 'like', "%{$search}%");
            });
        }

        if ($request->filled('method')) {
            $query->where('method', $request->method);
        }

        $payments = $query->latest()->paginate(10)->withQueryString();
        return view('pages.dashboard.finances.index', compact('accounts', 'payments'));
    }

    public function invoices(Request $request)
    {
        $accounts = Account::all();
        $query = Invoice::with(['client', 'payments'])->where('type', 'facture');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('invoice_number', 'like', "%{$search}%")
                    ->orWhereHas('client', function ($subQ) use ($search) {
                        $subQ->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $invoices = $query->latest()->paginate(10)->withQueryString();
        return view('pages.dashboard.finances.index', compact('accounts', 'invoices'));
    }

    public function devis(Request $request)
    {
        $accounts = Account::all();
        $query = Invoice::with(['client', 'payments'])->where('type', 'devis');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('invoice_number', 'like', "%{$search}%")
                    ->orWhereHas('client', function ($subQ) use ($search) {
                        $subQ->where('first_name', 'like', "%{$search}%")
                            ->orWhere('last_name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $invoices = $query->latest()->paginate(10)->withQueryString();
        return view('pages.dashboard.finances.index', compact('accounts', 'invoices'));
    }

    public function showClient(Client $client)
    {
        $client->load(['dossiers', 'invoices.payments']);
        return view('pages.dashboard.clients.show', compact('client'));
    }

    public function updateDossier(Request $request, Dossier $dossier)
    {
        $validated = $request->validate([
            'service_type' => 'required|string',
            'target_country' => 'required|string',
            'status' => 'required|in:en_cours,valide,refuse,cloture',
            'institution' => 'nullable|string',
        ]);

        $dossier->update($validated);

        return redirect()->back()->with('success', 'Dossier mis à jour avec succès.');
    }

    public function storeInvoice(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'dossier_id' => 'nullable|exists:dossiers,id',
            'type' => 'required|in:devis,facture',
            'total_amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
        ]);

        $validated['invoice_number'] = ($validated['type'] == 'facture' ? 'FAC-' : 'DEV-') . strtoupper(uniqid());
        $validated['status'] = 'pending';

        Invoice::create($validated);

        return redirect()->back()->with('success', ucfirst($validated['type']) . ' créée avec succès.');
    }

    public function updateInvoice(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'type' => 'required|in:devis,facture',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|in:draft,pending,paid,partial,cancelled',
            'due_date' => 'required|date',
        ]);

        $invoice->update($validated);

        return redirect()->back()->with('success', 'Facture mise à jour avec succès.');
    }

    public function destroyInvoice(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->back()->with('success', 'Facture supprimée avec succès.');
    }

    public function storePayment(Request $request)
    {
        $validated = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'account_id' => 'required|exists:accounts,id',
            'amount' => 'required|numeric|min:0',
            'method' => 'required|string',
            'payment_date' => 'required|date',
            'reference' => 'nullable|string',
        ]);

        $payment = Payment::create($validated);

        // Update Account Balance
        $account = Account::find($validated['account_id']);
        $account->balance += $validated['amount'];
        $account->save();

        // Update Invoice Status
        $this->updateInvoiceStatus($payment->invoice_id);

        return redirect()->back()->with('success', 'Paiement enregistré avec succès.');
    }

    public function destroyPayment(Payment $payment)
    {
        $invoiceId = $payment->invoice_id;
        $accountId = $payment->account_id;
        $amount = $payment->amount;

        $payment->delete();

        // Revert Account Balance
        $account = Account::find($accountId);
        if ($account) {
            $account->balance -= $amount;
            $account->save();
        }

        // Update Invoice Status
        $this->updateInvoiceStatus($invoiceId);

        return redirect()->back()->with('success', 'Paiement supprimé avec succès.');
    }

    private function updateInvoiceStatus($invoiceId)
    {
        $invoice = Invoice::with('payments')->find($invoiceId);
        if (!$invoice)
            return;

        $totalPaid = $invoice->payments->sum('amount');

        if ($totalPaid >= $invoice->total_amount) {
            $invoice->status = 'paid';
        } elseif ($totalPaid > 0) {
            $invoice->status = 'partial';
        } else {
            $invoice->status = 'pending';
        }
        $invoice->save();
    }
}
