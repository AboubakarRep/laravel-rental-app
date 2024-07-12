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
        //
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->enum('reception', ['Agence', 'Au travail', 'A la maison','Aéroport'])->default('Agence');
            $table->enum('recuperation', ['Agence', 'Au travail', 'A la maison','Aéroport'])->default('Agence');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('locations');
    }
};
