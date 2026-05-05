<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscription', function (Blueprint $table) {
            $table->id();

            $table->string('nom_etudiant');
            $table->string('prenom_etudiant');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('adresse');

            $table->date('date_inscription');

            // Relation avec formations
            $table->foreignId('formation_id')
                  ->constrained('formations')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscription');
    }
};
