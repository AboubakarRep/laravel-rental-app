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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            // $table->enum('genre', ['homme', 'femme', 'autre'])->default('autre');
            // $table->string('sexe');
            $table->date('naissance');
            $table->string('habitation');
            $table->integer('experience');
            $table->string('motivation');
            $table->string('profil');
            $table->string('permis');
            $table->enum('etat', ['candidat', 'chauffeur'])->default('candidat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidats');
    }
};
