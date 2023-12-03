<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lieu', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Localisation_GPS');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lieu');
    }
};

