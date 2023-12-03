<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('genre', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Nom');
            $table->unsignedInteger('Id_concert');

            $table->foreign('Id_concert')->references('ID')->on('concert')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('genre');
    }
};

