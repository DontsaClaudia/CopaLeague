<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJoueursTable extends Migration
{
    public function up()
    {
        Schema::table('joueurs', function (Blueprint $table) {
            $table->unsignedBigInteger('equipe_id')->nullable();
            $table->foreign('equipe_id', 'equipe_fk_8392764')->references('id')->on('equipes');
        });
    }
}
