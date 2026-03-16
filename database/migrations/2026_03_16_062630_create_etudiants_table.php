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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->constrained('parents');
            $table->string('nom');
            $table->string('prenom');
            $table->string('niveau');
            $table->integer('nomberHifz');
            $table->string('email')->unique();
            $table->string('telephone')->unique()->nullable();
            $table->string('password');
            $table->enum('statut', ['active', 'desactive']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
