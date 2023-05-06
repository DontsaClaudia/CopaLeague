<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMatchesTable extends Migration
{
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            $table->unsignedBigInteger('equipe_1_id')->nullable();
            $table->foreign('equipe_1_id', 'equipe_1_fk_8437623')->references('id')->on('equipes');
            $table->unsignedBigInteger('equipe_2_id')->nullable();
            $table->foreign('equipe_2_id', 'equipe_2_fk_8437624')->references('id')->on('equipes');
            $table->unsignedBigInteger('stade_id')->nullable();
            $table->foreign('stade_id', 'stade_fk_8437628')->references('id')->on('stades');
        });
    }
}
