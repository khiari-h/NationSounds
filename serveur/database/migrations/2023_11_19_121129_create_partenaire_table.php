<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('partenaire', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Catégories');
            $table->string('Nom');
            $table->unsignedInteger('Logo'); // Assuming 'Logo' is meant to be an integer reference to an image ID
            $table->string('Url');
        });
    }

    public function down()
    {
        Schema::dropIfExists('partenaire');
    }
};
