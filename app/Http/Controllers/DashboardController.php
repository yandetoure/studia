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
        ];

        return view('pages.dashboard.index', compact('stats'));
    }

    public function clients()
    {
        $clients = Client::latest()->paginate(10);
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

    public function dossiers()
    {
        $dossiers = Dossier::with('client')->latest()->paginate(10);
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

    public function finances()
    {
        $accounts = Account::all();
        $invoices = Invoice::with('client')->latest()->paginate(10);
        return view('pages.dashboard.finances.index', compact('accounts', 'invoices'));
    }

    public function showClient(Client $client)
    {
        $client->load(['dossiers', 'invoices.payments']);
        return view('pages.dashboard.clients.show', compact('client'));
    }
}
