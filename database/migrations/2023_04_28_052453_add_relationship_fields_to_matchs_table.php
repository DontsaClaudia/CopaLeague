<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMatchsTable extends Migration
{
    public function up()
    {
        Schema::table('matchs', function (Blueprint $table) {
            $table->unsignedBigInteger('equipe_1_id')->nullable();
            $table->foreign('equipe_1_id', 'equipe_1_fk_8392775')->references('id')->on('equipes');
            $table->unsignedBigInteger('equipe_2_id')->nullable();
            $table->foreign('equipe_2_id', 'equipe_2_fk_8392776')->references('id')->on('equipes');
        });
    }

    public function down(): void
    {
        Schema::table('matchs', function (Blueprint $table) {
            //
        });
    }
}

    /**
     * Reverse the migrations.
     */


