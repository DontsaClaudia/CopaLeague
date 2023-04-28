<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStadesTable extends Migration
{
    public function up()
    {
        Schema::create('stades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('lieu')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stades');
    }
}
    /**
     * Reverse the migrations.
     */


