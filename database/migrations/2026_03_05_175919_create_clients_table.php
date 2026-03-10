<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
