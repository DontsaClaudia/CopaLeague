<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStadesTable extends Migration
{
    public function up()
    {
        Schema::table('stades', function (Blueprint $table) {
            $table->unsignedBigInteger('match_1_id')->nullable();
            $table->foreign('match_1_id', 'match_1_fk_8396538')->references('id')->on('matches');
        });
    }

    public function down(): void
    {
        Schema::table('stades', function (Blueprint $table) {
            //
        });
    }
}

    /**
     * Reverse the migrations.
     */


