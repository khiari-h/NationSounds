<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('commentaire', function (Blueprint $table) {
            $table->increments('Id');
            $table->unsignedBigInteger('Id_user');
            $table->unsignedBigInteger('Id_concert');
            $table->text('Texte');
            $table->integer('Note');
            $table->dateTime('Date');
            $table->foreign('Id_user')->references('Id')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('Id_concert')->references('Id')->on('concerts')->onDelete('cascade');
            $table->index('Id_user');
            $table->index('Id_concert');
        });
    }

    public function down()
    {
        Schema::dropIfExists('commentaire');
    }
};
