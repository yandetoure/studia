<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // MODULE 1: Clients
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_number')->unique();
            $table->string('last_name');
            $table->string('first_name');
            $table->enum('gender', ['M', 'F']);
            $table->date('birth_date');
            $table->string('nationality');
            $table->text('address');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->enum('status', ['eleve', 'etudiant', 'professionnel']);
            $table->string('education_level');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Dossier Responsible
            $table->softDeletes();
            $table->timestamps();
        });

        // MODULE 2: Dossiers
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('service_type'); // orientation, admission, visa, etc.
            $table->string('target_country');
            $table->string('institution')->nullable();
            $table->enum('status', ['en_cours', 'valide', 'refuse', 'cloture'])->default('en_cours');
            $table->json('checklist')->nullable();
            $table->json('key_dates')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Dossier Responsible
            $table->timestamps();
        });

        // MODULE 3: Documents
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dossier_id')->constrained()->onDelete('cascade');
            $table->string('file_path');
            $table->string('category'); // Identity, Degrees, Transcripts, etc.
            $table->string('display_name');
            $table->timestamps();
        });

        // MODULE 4: Notes
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dossier_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('content');
            $table->timestamps();
        });

        // MODULE 5 & 6: Invoices & Payments
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['bank', 'cash_main', 'cash_secondary']);
            $table->decimal('balance', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->foreignId('dossier_id')->nullable()->constrained()->onDelete('set null');
            $table->string('invoice_number')->unique();
            $table->enum('type', ['devis', 'facture']);
            $table->decimal('total_amount', 15, 2);
            $table->enum('status', ['draft', 'pending', 'paid', 'partial', 'cancelled'])->default('draft');
            $table->date('due_date')->nullable();
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 15, 2);
            $table->string('method'); // Cash, Mobile Money, Virement
            $table->date('payment_date');
            $table->string('reference')->nullable();
            $table->timestamps();
        });

        Schema::create('account_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['credit', 'debit']);
            $table->decimal('amount', 15, 2);
            $table->string('description');
            $table->nullableMorphs('transactionable'); // Link to Payment or Expense
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_transactions');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('notes');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('dossiers');
        Schema::dropIfExists('clients');
    }
};
