<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournoisTable extends Migration
{
    public function up()
    {
        Schema::create('tournois', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_tournois');
            $table->integer('nombre_d_equipes');
            $table->date('date_de_debut');
            $table->date('date_de_fin');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
