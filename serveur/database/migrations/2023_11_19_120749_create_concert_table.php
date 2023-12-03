<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('concert', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Groupe');
            $table->integer('Horaires');
            $table->string('Scene');
            $table->text('Descriptif');
            // Assurez-vous que la colonne 'Horaires' est correctement définie en fonction de vos besoins (int semble inapproprié pour des horaires).
        });
    }

    public function down()
    {
        Schema::dropIfExists('concert');
    }
};

