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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enseignant_id')->constrained('users');
            $table->foreignId('etudiant_id')->constrained('etudiants');
            $table->integer('hizb');
            $table->integer('huitieme');
            $table->decimal('note', 5, 2);
            $table->text('remarque')->nullable();
            $table->enum('presence', ['present', 'absent', 'retard']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
