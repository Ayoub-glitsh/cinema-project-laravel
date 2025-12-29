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
        Schema::create('Films', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description');
            $table->integer('annee_sortie');
            $table->integer('duree');
            $table->integer('categories_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Films');
    }
};
