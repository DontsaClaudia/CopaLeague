<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('resultat_1');
            $table->integer('resultat_2');
            $table->datetime('date_de_matchs');
            $table->integer('carton_rouge')->nullable();
            $table->integer('carton_jaune')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
