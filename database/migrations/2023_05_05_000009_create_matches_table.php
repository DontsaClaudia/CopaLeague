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
            $table->integer('resultat_1')->nullable();
            $table->integer('resultat_2')->nullable();
            $table->datetime('date_et_heure')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
