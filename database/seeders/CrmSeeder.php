<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Client;
use App\Models\Dossier;
use App\Models\Account;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CrmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Admin User
        $admin = User::updateOrCreate(
            ['email' => 'admin@studia.com'],
            [
                'name' => 'Admin Studia',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Create Accounts
        $bankAccount = Account::create([
            'name' => 'Compte Bancaire (BOA)',
            'type' => 'bank',
            'balance' => 5000000,
        ]);

        $cashMain = Account::create([
            'name' => 'Caisse Principale',
            'type' => 'cash_main',
            'balance' => 150000,
        ]);

        // 3. Create Clients & Dossiers
        $clientsData = [
            [
                'first_name' => 'Jean',
                'last_name' => 'Dupont',
                'email' => 'jean.dupont@email.com',
                'phone' => '+221 77 123 45 67',
                'gender' => 'M',
                'birth_date' => '2002-05-15',
                'nationality' => 'Sénégalaise',
                'address' => 'Dakar, Plateau',
                'status' => 'etudiant',
                'education_level' => 'Licence 2',
            ],
            [
                'first_name' => 'Marie',
                'last_name' => 'Sarr',
                'email' => 'marie.sarr@email.com',
                'phone' => '+221 78 987 65 43',
                'gender' => 'F',
                'birth_date' => '2005-09-20',
                'nationality' => 'Sénégalaise',
                'address' => 'Mermoz, Dakar',
                'status' => 'eleve',
                'education_level' => 'Terminale',
            ],
        ];

        foreach ($clientsData as $data) {
            $data['client_number'] = 'CLT-' . strtoupper(uniqid());
            $data['user_id'] = $admin->id;
            $client = Client::create($data);

            // Create a Dossier for each client
            $dossier = Dossier::create([
                'client_id' => $client->id,
                'service_type' => 'admission',
                'target_country' => 'France',
                'status' => 'en_cours',
                'user_id' => $admin->id,
            ]);

            // Create an Invoice for each dossier
            $invoice = Invoice::create([
                'client_id' => $client->id,
                'dossier_id' => $dossier->id,
                'invoice_number' => 'FAC-' . date('Y') . '-' . rand(1000, 9999),
                'type' => 'facture',
                'total_amount' => 150000,
                'status' => 'partial',
                'due_date' => now()->addDays(30),
            ]);

            // Create a Payment
            Payment::create([
                'invoice_id' => $invoice->id,
                'account_id' => $cashMain->id,
                'amount' => 50000,
                'method' => 'Cash',
                'payment_date' => now(),
                'reference' => 'PAY-' . rand(100, 999),
            ]);
        }
    }
}
