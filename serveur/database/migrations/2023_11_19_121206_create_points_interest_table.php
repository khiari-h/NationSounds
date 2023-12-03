<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pointsInterest', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Type');
            $table->string('Nom');
            $table->unsignedInteger('Id_lieu');

            $table->foreign('Id_lieu')->references('Id')->on('lieu')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pointsInterest');
    }
};

