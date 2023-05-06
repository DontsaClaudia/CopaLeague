<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoueursTable extends Migration
{
    public function up()
    {
        Schema::create('joueurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_et_prenom');
            $table->date('date_de_naissance');
            $table->integer('age');
            $table->integer('dossard');
            $table->string('poste');
            $table->string('email');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
