<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id()->primary();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->enum('statut', ['Confirmé', 'En cours', 'Annulé'])->default('En cours');
            $table->decimal('cout', 10, 2);
            $table->integer('code_reservation');
            $table->integer('contactClient');
            $table->string('lieu_recup');
            $table->string('lieu_depot');
            $table->timestamps();


             // Définition des contraintes de clé étrangère
            // $table->foreign('vehicule_id')->references('id')->on('vehicules')->onDelete('set null');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
