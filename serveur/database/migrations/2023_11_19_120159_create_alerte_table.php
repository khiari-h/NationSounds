<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alerte', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Titre');
            $table->string('Type');
            $table->text('Texte');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('alerte');
    }
};

