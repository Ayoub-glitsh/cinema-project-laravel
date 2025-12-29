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
        Schema::create('Acteur_Film', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_id')->constrained('Films')->ondelete('cascade');
            $table->foreignId('acteur_id')->constrained('Acteurs')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Acteur_Film');
    }
};
